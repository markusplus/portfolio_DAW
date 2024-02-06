<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LibrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('libros')->insert([
            'titulo' => 'El Quijote',
            'anyo_publicacion' => 1605,
        ]);
        DB::table('libros')->insert([
            'titulo' => 'El Buscón',
            'anyo_publicacion' => 1626,
        ]);
        DB::table('libros')->insert([
            'titulo' => 'El Lazarillo de Tormes',
            'anyo_publicacion' => 1554,
        ]);
        DB::table('libros')->insert([
            'titulo' => 'La Celestina',
            'anyo_publicacion' => 1499,
        ]);
        DB::table('libros')->insert([
            'titulo' => 'La vida es sueño',
            'anyo_publicacion' => 1635,
        ]);
        DB::table('libros')->insert([
            'titulo' => 'La Regenta',
            'anyo_publicacion' => 1884,
        ]);
    }
}
