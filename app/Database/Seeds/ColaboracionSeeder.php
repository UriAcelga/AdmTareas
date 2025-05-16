<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
use Faker\Factory;
use App\Models\UsuarioModel;
use App\Models\TareaModel;

class ColaboracionSeeder extends Seeder
{
    public function run()
    {
        $usuarioModel = new UsuarioModel();
        $tareaModel = new TareaModel();
        $faker = Factory::create('es_ES');
        for ($i = 1; $i <= 20; $i++) {
            $dueño = $tareaModel->get_dueño($i);
            $emailDueño = $usuarioModel->get_email_by_id($dueño);
            for($j = 0; $j < 2; $j++) {
                do {
                    $emailColaborador = $usuarioModel->get_un_email();
                } while ($emailColaborador == $emailDueño);
                $data = [
                    'emailColaborador' => $emailColaborador,
                    'idTarea' => $i,
                ];
                $this->db->table('colaboracion')->insert($data);

            }
        }

    }
}