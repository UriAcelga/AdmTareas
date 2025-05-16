<?php

namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
use Faker\Factory;
use App\Models\NotificacionModel;


class NotificacionSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('es_ES');
        for($i = 0; $i < 10; $i++) {
            $data = [
                'asunto' => $faker->sentence(3),
                'mensaje' => $faker->sentence(10),
                'tipo' => $faker->randomElement(['invitacion', 'borrado', 'modificado', 'completado', 'asignado', 'recordatorio'])
            ];
        }
        
        $this->db->table('notificaciones')->insert($data);
    }
}