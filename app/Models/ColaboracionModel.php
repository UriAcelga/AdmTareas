<?php
namespace App\Models;
use CodeIgniter\Model;

class ColaboracionModel extends Model
{
    protected $table = 'colaboracion';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id', 'emailColaborador', 'idTarea'];
    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function nueva_colaboracion($data) {
        return $this->insert($data);
    }
}