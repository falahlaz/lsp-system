<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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
        User::create([
            'name' => 'Admin1',
            'username' => 'Admin',
            'password' => bcrypt('admin'),
            'email' => 'admin1@gmail.com',
            'id_position' => '1',
            'token' => 'abcdefgh',
            'status' => '1'
            
        ]);
    }
}
