<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Perro;

class PerroSeeder extends Seeder
{
    public function run()
    {
        Perro::create([
            'id' => '3',
            'nombre' => 'Diego',
            'foto_url' => 'https://ejemplo.com/foto2.jpg',
            'descripcion' => 'Este es Diego, un perro Labrador muy juguetón.',
            // Otros campos del modelo "perro"
        ]);

        Perro::create([
            'id' => '4',
            'nombre' => 'Max',
            'foto_url' => 'https://ejemplo.com/foto3.jpg',
            'descripcion' => 'Max es un perro Bulldog de buen carácter.',
           
        ]);

       
    }
}
