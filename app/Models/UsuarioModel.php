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
            'is_unique' => 'El email ya está registrado.',
        ],
    ];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;
}