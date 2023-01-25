<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class PollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Poll::Create([
            'uuid' => Str::uuid(),
            'ip_address' => '192.168.3422',
            'title' => "Xiaomi Redmi 10 atau Infinix ? ",
            'description' => "Kaum Mendang Mending coba kumpul",
            'deadline' => '2022-12-05'
        ]);

        \App\Models\Choice::insert([
            ['choice' => "Infinix", "id_poll" => 1],
            ['choice' => "Redmi 10", "id_poll" => 1],
            ['choice' => "Mending Nabung lagi beli Poco", "id_poll" => 1]
        ]);
    }
}
