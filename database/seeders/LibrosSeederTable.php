<?php

namespace Database\Seeders;

use App\Models\Libro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LibrosSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Libro::factory()->count(180)->create();
    }
}