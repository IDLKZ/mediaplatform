<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([[

                "role_id"=>1,
                "email"=>"admin@gmail.com",
                "password"=>bcrypt("admin123"),
                "phone"=>"+8777777777",
                "name"=>"Админов Админ Админович",
                "status"=>1
            ],
                [

                    "role_id"=>2,
                    "email"=>"mistier.famous@gmail.com",
                    "password"=>bcrypt("admin123"),
                    "phone"=>"+8777777777",
                    "name"=>"Mistier Famous",
                    "status"=>1
                ],
                [

                    "role_id"=>3,
                    "email"=>"nurbarkit_5496@mail.ru",
                    "password"=>bcrypt("admin123"),
                    "phone"=>"+8777777777",
                    "name"=>"Mistier Famous",
                    "status"=>1
                ],]



        );
    }
}
