<?php

use Illuminate\Database\Seeder;
use App\User;
class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
             'name'     =>   'Xico',
             'email'    =>   'xico@hotmail.com',
             'password' =>   bcrypt('123456'),
        ]);
    }
}
