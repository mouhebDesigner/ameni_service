<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "name" => "admin",
            "email" => "admin@gmail.com",
            "phone_number" => "26321120",
            "password" => "$2y$10$3zGrIdD/aYq8VaxBcbbZyuP9W.U4N8lXhneO.k5TRcrhjf0Oq2MkK",
            "grade" => "admin",
        ]);
    }
}
