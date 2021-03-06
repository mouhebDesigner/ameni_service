<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            "name" => "admin",
            "email" => "admin@gmail.com",
            "phone_number" => "26321120",
            "password" => "$2y$10$3zGrIdD/aYq8VaxBcbbZyuP9W.U4N8lXhneO.k5TRcrhjf0Oq2MkK",
            "grade" => "admin",
        ]);
    }
}
