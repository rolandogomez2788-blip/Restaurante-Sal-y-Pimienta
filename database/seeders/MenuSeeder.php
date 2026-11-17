<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Platillo;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menu = [
            'Entradas' => [1, [
                ['Tostadas de guacamole', 'Tres tostadas con guacamole fresco y limón.', 28],
                ['Sopa de pollo', 'Caldo casero con verduras de temporada.', 32],
                ['Chicharrones con limón', 'Crujientes, con salsa picante aparte.', 35],
            ]],
            'Platos fuertes' => [2, [
                ['Pepián de pollo', 'Con arroz y tortillas hechas a mano.', 68],
                ['Hilachas', 'Carne deshebrada en salsa de tomate, con arroz.', 62],
                ['Churrasco', 'Con chimichurri, frijoles y guarnición.', 98],
                ['Pasta cremosa con pollo', 'Salsa de crema, ajo y un toque de pimienta.', 58],
            ]],
            'Postres' => [3, [
                ['Rellenitos de plátano', 'Rellenos de frijol dulce, con azúcar.', 25],
                ['Flan de caramelo', null, 22],
            ]],
            'Bebidas' => [4, [
                ['Limonada con soda', null, 15],
                ['Horchata', null, 14],
                ['Café', null, 12],
                ['Agua pura', null, 10],
            ]],
        ];

        foreach ($menu as $nombre => [$orden, $platillos]) {
            $categoria = Categoria::firstOrCreate(['nombre' => $nombre], ['orden' => $orden]);

            foreach ($platillos as [$plato, $descripcion, $precio]) {
                Platillo::firstOrCreate(
                    ['categoria_id' => $categoria->id, 'nombre' => $plato],
                    ['descripcion' => $descripcion, 'precio' => $precio, 'disponible' => true]
                );
            }
        }
    }
}
