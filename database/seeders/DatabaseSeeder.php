<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        \App\Models\User::updateOrCreate(
            ["email" => "abdalmoaen@gmail.com"],
            [
                "name" => "عبد المعين",
                "password" => bcrypt("acount123"),
                "role" => "accountant"
            ]
        );
    }
}
