<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Column;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Column::factory()->createMany([
            ['title' => 'To Do'],
            ['title' => 'In Progress'],
            ['title' => 'Done'],
        ]);
    }
}
