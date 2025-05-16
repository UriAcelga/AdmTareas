<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('es_ES');
        for ($i = 0; $i < 6; $i++) {
            $data = [
                'email' => $faker->unique()->safeEmail(),
                'pwd' => password_hash('123456', PASSWORD_BCRYPT),
            ];
            $this->db->table('usuario')->insert($data);
        }
    }
}
