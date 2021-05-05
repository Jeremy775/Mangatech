<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'user_id' => 'admin101',
            'role_id' => 1,
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' =>  bcrypt('admin'),
        ]);
        // $user = User::create([
        //     'user_id' => 'user101',
        //     'role_id' => 2,
        //     'name' => 'User',
        //     'email' => 'user@example.com',
        //     'password' =>  bcrypt('user'),
        // ]);
    }
    
}
