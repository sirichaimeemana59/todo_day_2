<?php

use Illuminate\Database\Seeder;

class UserTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_type = new \App\UserType();//เพิ่มผู้ใช้
        $user_type ->name = "admin";
        $user_type->save();


        $user_type = new \App\UserType();//เพิ่มผู้ใช้
        $user_type ->name = "user";
        $user_type->save();
//        $user_type = new \App\UserType();
//        $user_type ->name = "sirichai";
//        $user_type->save();
//
//        \App\UserType::insert($user_type);//ตรวจสอบผู้ใช้

    }
}
