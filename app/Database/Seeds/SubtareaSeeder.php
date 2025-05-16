<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class SubtareaSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('es_ES');
        for ($i = 0; $i < 10; $i++) {
            $data = [
                'asunto' => $faker->sentence(3),
                'color' => $faker->hexColor(),
                'prioridad' => $faker->randomElement(['Baja', 'Media', 'Alta']),
                'usuario' => $faker->name(),
                'fecha' => $faker->date(),
            ];
            $this->db->table('subtarea')->insert($data);
        }
    }
}
