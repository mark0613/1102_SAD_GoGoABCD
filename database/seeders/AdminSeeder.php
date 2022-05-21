<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $user = [
            "username" => "admin",
            "email" => "admin2000@gmail.com",
            "password" => bcrypt("aabbcc123"),
            "u_type" => "merchant",
        ];
        $merchant = [
            "u_id" => 1,
            "m_type" => "a",
        ];
        DB::table("users")->insert($user);
        DB::table("merchant")->insert($merchant);
    }
}
