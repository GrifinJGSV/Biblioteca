<?php

namespace Database\Seeders;
use App\models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuariosSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        Usuario::factory()->count(160)->create();
    }
}
