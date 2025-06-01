<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehiculo;
use Faker\Factory as Faker;

class VehiculosSeeder extends Seeder
{
    public function run(): void
    {
        $vehiculos = [
            [
                'placa' => 'P123-456',
                'marca' => 'Toyota',
                'modelo' => 'Corolla',
                'año' => 2020,
                'estado' => 'activo',
            ],
            [
                'placa' => 'P234-567',
                'marca' => 'Honda',
                'modelo' => 'Civic',
                'año' => 2019,
                'estado' => 'activo',
            ],
            [
                'placa' => 'P345-678',
                'marca' => 'Nissan',
                'modelo' => 'Sentra',
                'año' => 2021,
                'estado' => 'inactivo',
            ],
            [
                'placa' => 'P456-789',
                'marca' => 'Mazda',
                'modelo' => '3',
                'año' => 2022,
                'estado' => 'activo',
            ],
            [
                'placa' => 'P567-890',
                'marca' => 'Ford',
                'modelo' => 'Focus',
                'año' => 2018,
                'estado' => 'inactivo',
            ],
            [
                'placa' => 'P678-901',
                'marca' => 'Toyota',
                'modelo' => 'Hilux',
                'año' => 2017,
                'estado' => 'activo',
            ],
            [
                'placa' => 'P789-012',
                'marca' => 'Chevrolet',
                'modelo' => 'Cruze',
                'año' => 2016,
                'estado' => 'inactivo',
            ],
            [
                'placa' => 'P890-123',
                'marca' => 'Kia',
                'modelo' => 'Rio',
                'año' => 2020,
                'estado' => 'activo',
            ],
            [
                'placa' => 'P901-234',
                'marca' => 'Hyundai',
                'modelo' => 'Elantra',
                'año' => 2023,
                'estado' => 'activo',
            ],
            [
                'placa' => 'P012-345',
                'marca' => 'Volkswagen',
                'modelo' => 'Jetta',
                'año' => 2021,
                'estado' => 'inactivo',
            ],
        ];

        foreach ($vehiculos as $vehiculo) {
            Vehiculo::create($vehiculo);
        }
    }
}
