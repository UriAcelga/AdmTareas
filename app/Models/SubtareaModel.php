<?php
namespace App\Models;
use CodeIgniter\Model;

class SubtareaModel extends Model
{
    protected $table = 'subtarea';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id', 'asunto', 'descripcion', 'estado', 'prioridad', 'fecha_vencimiento', 'fecha_recordatorio', 'color', 'idTarea'];
    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [
        'asunto' => 'required|max_length[30]',
        'descripcion' => 'max_length[100]',
        'estado' => 'required|in_list[Definida,En proceso,Completada]',
        'prioridad'=> 'required|in_list[Baja,Normal,Alta]',
        'fecha_vencimiento' => 'required|valid_date[Y-m-d H:i:s]|',
        'fecha_recordatorio' => 'valid_date[Y-m-d H:i:s]|',
        'color' => 'regex_match[/^#[0-9A-Fa-f]{6}$/]',
    ];
    protected $validationMessages = [
        'asunto' => [
            'required' => 'Asunto es obligatorio.',
            'max_length' => 'Asunto no puede tener más de 30 caracteres.',
        ],
        'descripcion' => [
            'max_length' => 'Descripción no puede tener más de 100 caracteres.',
        ],
        'estado' => [
            'required' => 'Estado es obligatorio.',
            'in_list' => 'Estado debe ser uno de los siguientes: Definida, En proceso, Completada.',
        ],
        'prioridad' => [
            'required' => 'Prioridad es obligatoria.',
            'in_list' => 'Prioridad debe ser una de las siguientes: Baja, Normal, Alta.',
        ],
        'fecha_vencimiento' => [
            'required' => 'Fecha de vencimiento es obligatoria.',
            'valid_date' => 'Formato inválido para la fecha de vencimiento',
        ],
        'fecha_recordatorio' => [
            'valid_date' => 'Formato inválido para la fecha de recordatorio',
        ],
        'color' => [
            'regex_match' => 'El color debe ser un código hexadecimal válido',
        ],
    ];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;
}