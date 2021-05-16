<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateChannelRequest;
use App\Models\Channel;
use Illuminate\Http\Request;

class ChannelsController extends Controller
{
    
    public function index()
    {
        return view('admin.channels.index')->with(['channels' => Channel::paginate(10)]);
    }

    
    public function create()
    {
        return view('admin.channels.create');
    }

    
    public function store(CreateChannelRequest $request)
    {
        $channel = Channel::create([
            'slug' => snake_case($request->name),
            'name' => $request->name
        ]);

        $channel->save();

        return redirect(route('admin.channels.index'));
    }

    
    public function edit($id)
    {
        return view('admin.channels.edit', 
        [
            'channel' => Channel::find($id) // pour passer $channel->id a la route update 
        ]);
    }

    
    public function update(Request $request, $id)
    {
        $channel = Channel::findOrFail($id);

        $channel->update([
            'name' => $request->name,
            'slug' => $request->slug
        ]);
        
        $channel->save();
        
        return redirect(route('admin.channels.index'));
    }

    
    public function destroy($id)
    {
        Channel::destroy($id);

        return redirect(route('admin.channels.index'));
    }
}
