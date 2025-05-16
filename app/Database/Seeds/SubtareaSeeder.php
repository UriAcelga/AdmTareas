<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class SubtareaSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('es_ES');
        for ($i = 1; $i <= 20; $i++) {
            for ($j = 0; $j < 5; $j++) {
                $venc = $faker->dateTimeBetween('+5 days', '+30 days')->format('Y-m-d');
                $data = [
                    'id_tarea' => $i,
                    'asunto' => $faker->sentence(3),
                    'fecha_vencimiento' => $venc,
                    'fecha_recordatorio' => $faker->boolean(50) ? $faker->dateTimeBetween('now', $venc)->format('Y-m-d') : null,
                    'color' => $faker->randomElement(['yellow', 'red', 'pink', 'indigo', 'purple', 'green']),
                    'prioridad' => $faker->randomElement(['Baja', 'Media', 'Alta']),
                    'descripcion' => $faker->boolean(10) ? $faker->sentence(14, true) : null,
                ];
                $this->db->table('subtarea')->insert($data);
            }
        }
    }
}
