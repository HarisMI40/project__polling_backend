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
        \App\Models\User::factory(5)->create();
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
