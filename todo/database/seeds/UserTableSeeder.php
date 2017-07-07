<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->name = "Bundit Sirichai";
        $user->User_Type_id = 1;
        $user->username = "admin";
        $user->email = "sirichaimeemana20014@gmail.com";
        $user->password = bcrypt("1234");
        $user->save();
    }
}
