<?php
namespace App\Models;
use CodeIgniter\Model;

class TareaModel extends Model
{
    protected $table = 'tarea';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id', 'idDueño', 'asunto', 'descripcion', 'prioridad', 'estado', 'fecha_vencimiento', 'fecha_recordatorio', 'color'];
    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [
        'asunto' => 'required|max_length[60]',
        'descripcion' => 'max_length[100]',
        'prioridad' => 'required|in_list[Baja,Normal,Alta]',
        'estado' => 'required|in_list[Definida,En proceso,Completada,Archivada]',
        'fecha_vencimiento' => 'required|valid_date[Y-m-d H:i:s]|',
        'fecha_recordatorio' => 'valid_date[Y-m-d H:i:s]|',
        'color' => 'regex_match[/^#[0-9A-Fa-f]{6}$/]',
    ];
    protected $validationMessages = [
        'asunto' => [
            'required' => 'Asunto es obligatorio.',
            'max_length' => 'Asunto no puede exceder los 60 caracteres.',
        ],
        'descripcion' => [
            'max_length' => 'Descripción no puede exceder los 100 caracteres.',
        ],
        'prioridad' => [
            'required' => 'Prioridad es obligatoria.',
            'in_list' => 'Prioridad debe ser una de las siguientes: Baja, Normal, Alta.',
        ],
        'estado' => [
            'required' => 'Estado es obligatorio.',
            'in_list' => 'El estado debe ser uno de los siguientes: Definida, En proceso, Completada, Archivada.',
        ],
        'fecha_vencimiento' => [
            'required' => 'La fecha de vencimiento es obligatoria.',
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
    protected $colores = [
            'yellow' => 'yellow-500',
            'red' => 'red-500',
            'pink' => 'pink-400',
            'indigo' => 'indigo-600',
            'purple' => 'purple-500',
            'green' => 'green-500'
        ];

    public function get_clase_color($id) {
        $row = $this->where('id', $id)->select('color')->first();
        $color = $row ? $row['color'] : null;
        return ($color) ? $this->colores[$color] : null;
    }

    public function usuario_es_dueño($idTarea, $idUsuario) {
        $tarea = $this->where('id', $idTarea)->findAll();
        return $tarea['idDueño'] == $idUsuario;
    }

    public function get_dueño($id) {
        return $this->where('id', $id)->select('idDueño')->first();
    }

    public function get_tareas_por_dueño($id) {
        $tareas = $this->where('idDueño', $id)->orderBy('prioridad', 'DESC')->findAll();
        foreach ($tareas as &$tarea) {
            $tarea['color'] = $this->colores[$tarea['color']];
        }
        unset($tarea);
        return $tareas;
    }

    public function get_tareas_por_colaborador($email) {
        $tareas = $this->select('tarea.*')
            ->join('colaboracion', 'colaboracion.idTarea = tarea.id')
            ->where('colaboracion.emailColaborador', $email)
            ->findAll();
        foreach ($tareas as &$tarea) {
            $tarea['color'] = $this->colores[$tarea['color']];
        }
        unset($tarea);
        return $tareas;
    }
}