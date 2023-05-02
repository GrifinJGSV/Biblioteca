<?php

namespace Database\Seeders;
use App\Models\Prestamo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrestamosSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prestamo::factory()->count(200)->create();
    }
}
