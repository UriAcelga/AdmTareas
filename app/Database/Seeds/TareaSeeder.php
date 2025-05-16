<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class TareaSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('es_ES');
        for ($i = 0; $i < 30; $i++) {
            $venc = $faker->dateTimeBetween('+31 days', '+60 days')->format('Y-m-d');
            $data = [
                'idDueño' => $faker->numberBetween(1,15),
                'asunto' => $faker->sentence(3),
                'descripcion' => $faker->sentence(14, true),
                'fecha_vencimiento' => $venc,
                'fecha_recordatorio' => $faker->dateTimeBetween('now', $venc)->format('Y-m-d'),
                'color' => $faker->randomElement(['yellow', 'red', 'pink', 'indigo', 'purple', 'green']),
                'prioridad' => $faker->randomElement(['Baja', 'Media', 'Alta']),
                'usuario' => $faker->name(),
            ];
            $this->db->table('subtarea')->insert($data);
        }
    }
}
