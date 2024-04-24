<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        DB::table('categories')->insert([
            [
                'name' => 'fiksi',
            ],
            [
                'name' => 'non-fiksi',
            ],
        ]);

        DB::table('users')->insert([
            [
                'name' => 'admin',
                'username' => 'admin',
                'password' => bcrypt('12345678'),
                'role' => 'admin',
            ],
            [
                'name' => 'librarian',
                'username' => 'librarian',
                'password' => bcrypt('12345678'),
                'role' => 'librarian',
            ],
            [
                'name' => 'irpan',
                'username' => 'irpan',
                'password' => bcrypt('12345678'),
                'role' => 'member',
            ],
        ]);
    }
}
