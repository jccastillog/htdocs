<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'name' => 'Tour a la montaña',
            'description' => 'Un espectacular Tour a la Montaña de Siete Colores te espera!! Realiza una caminata a la montaña Vinicunca uno de los nuevos atractivos naturales del Cusco.',
            'coordenadas' => [
                'lat' => "4.657846",
                'lng' => "-74.096380",
            ],
            'images' => [],
            'status' => 1,
            'provider_id' => 1,
            'service_type_id' => 1,
        ]);
        Service::create([
            'name' => 'Observación geológica',
            'description' => 'Ubicación: Municipios de Acevedo y Palestin Caquetá: Municipio de San José del Fragua, Belén de los Andakie  Cauca: Municipio de Piamonte Superficie: 7135 ha Altura: 1630 y 2840 msnm Acceso: Terrestre Temperatura: 16º C Ecosistemas: Bosque andino y alto andino, bosque de roble y Subpáramo. Servicios Centro de visitantes, alojamiento, alimentación y recorridos guiados.',
            'coordenadas' => [
                'lat' => "4.825",
                'lng' => "-73.660",
            ],
            'images' => '[\"services\\/4Db2MUbIWtegSGe8MXcH9ZEurFeWDHwiQO4lDPZx.jpg\",\"services\\/0GQaug7VRu08YdWnfRGU6mLQhT3sbynBu9o1b6cY.jpg\",\"services\\/O9E5ExF46ankK0rNPlvNWlv4K3VdQYW6vwg9rMz4.jpg\"]',
            'status' => 1,
            'provider_id' => 1,
            'service_type_id' => 2,
        ]);
        Service::create([
            'name' => 'Observación fauna y flora.',
            'description' => 'El Parque protege poblaciones de peces de uso recreativo y de importancia comercial, haciendo un aporte significativo al mantenimiento del suministro pesquero en la región.',
            'coordenadas' => [
                'lat' => "4.675",
                'lng' => "-73.660",
            ],
            'images' => [],
            'status' => 1,
            'provider_id' => 2,
            'service_type_id' => 3,
        ]);
        Service::factory(count: 100)->create();
    }
}
