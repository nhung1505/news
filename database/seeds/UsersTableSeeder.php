<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->id = 1;
        $user->name = 'admin';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('admin');
        $user->role = 'admin';
        $user->save();

        $user = new User();
        $user->id = 2;
        $user->name = 'editor';
        $user->email = 'editor@gmail.com';
        $user->password = bcrypt('editor');
        $user->role = 'editor';
        $user->save();

        $user = new User();
        $user->id = 3;
        $user->name = 'user';
        $user->email = 'user@gmail.com';
        $user->password = bcrypt('user');
        $user->role = 'user';
        $user->save();
    }
}
