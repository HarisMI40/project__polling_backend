<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(5)->create();
        \App\Models\User::truncate();
        \App\Models\User::insert([
            [
            'division_id' => 1,
            'username' => 'admin',
            'role' => 'admin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'created_at' => now(),
            'updated_at' => now()

            ],
            [
            'division_id' => 1,
            'username' => 'user',
            'role' => 'user',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'created_at' => now(),
            'updated_at' => now()
            ],
        ]
    );
        // \App\Models\Poll::Create([
        //     'user_id' => 1,
        //     'title' => "Xiaomi Redmi 10 atau Infinix ? ",
        //     'description' => "Kaum Mendang Mending coba kumpul",
        //     'deadline' => '2022-07-07',
        //     'choices' => "Xiaomi|Infinix"
        // ]);
        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
