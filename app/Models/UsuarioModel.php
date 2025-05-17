<?php
namespace App\Models;
use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id', 'email', 'pwd'];
    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [
        'email' => 'required|valid_email|is_unique[usuario.email]',
        'pwd' => 'required|min_length[8]|max_length[30]',
    ];
    protected $validationMessages = [
        'email' => [
            'required' => 'Email es obligatorio.',
            'valid_email' => 'Email debe ser una dirección de correo electrónico válida.',
            'is_unique' => 'Esa dirección de correo electrónico ya está registrada.',
        ],

        'pwd' => [
            'required' => 'Contraseña es obligatoria.',
            'min_length' => 'La contraseña debe incluir un mínimo de 8 caracteres',
            'max_length' => 'La contraseña debe incluir no más de 30 caracteres'
        ]
    ];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function get_usuario_by_id($id) {
        return $this->where('id', $id)->first();
    }

    public function find_por_email($email) {
        return $this->where('email', $email)->first();
    }

    public function email_registrado($email) {
        return $this->where('email', $email)->countAllResults() > 0;
    }

    public function get_un_email() {
        return $this->orderBy('RAND()')->select('email')->first();
    }

    public function get_email_by_id($id) {
        return $this->where('id', $id)->select('email')->first();
    }

    public function registrar_usuario($data) {
        return $this->insert($data);
    }
}