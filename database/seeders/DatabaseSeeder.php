<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Категория 1',
            ],
            [
                'name' => 'Категория 2',
            ],
            [
                'name' => 'Категория 3',
            ],
            [
                'name' => 'Категория 4',
            ],
            [
                'name' => 'Категория 5',
            ],
            [
                'name' => 'Категория 6',
            ],
            [
                'name' => 'Категория 7',
            ]
        ]);
    }
}
