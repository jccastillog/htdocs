<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Provider;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Provider::create([
            'type_legal_id' => 'NIT',
            'legal_id' => '800-000-000-1',
            'name' => 'Empresa de Turismo',
            'email' => 'empresadeturismo@guavio.com',
            'phone' => '123456789',
            'address' => 'Vereda la montaña',
            'social_media' => [],
            'status' => 1,
            'score' => 0,
        ]);
        Provider::create([
            'type_legal_id' => 'CC',
            'legal_id' => '800-000-000-2',
            'name' => 'Empresa de Turismo 2',
            'email' => '',
            'phone' => '123456789',
            'address' => 'Vereda la montaña',
            'social_media' => '{"facebook":{"enabled":"1","account":"@prestador.facebook.com.co"},"instagram":{"enabled":"1","account":"@prestador"}}',
            'status' => 1,
            'score' => 0,
        ]);
        Provider::factory(count: 10)->create();
    }
}
