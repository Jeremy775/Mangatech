<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index()
    {
        return view('admin.users.index')->with(['users' => User::paginate(10)]);
    }

    
    public function create()
    {
        return view('admin.users.create', ['roles' => Role::all()]);
    }

    
    public function store(CreateUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->role()->associate($request->role);
        $user->save();

        return redirect(route('admin.users.index'));
    }

    
    public function edit($id)
    {
        return view('admin.users.edit', 
        [
            'roles' => Role::all(),
            'user' => User::find($id) // pour passer $user->id a la route update 
        ]);
    }

    
    public function update(Request $request, $id)
    {
        // return 404 error if User not found
        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        
        $user->role()->associate($request->role);
        $user->save();
        
        return redirect(route('admin.users.index'));
    }

    
    public function destroy($id)
    {
        User::destroy($id);

        return redirect(route('admin.users.index'));
    }
}
