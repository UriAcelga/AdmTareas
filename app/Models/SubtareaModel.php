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
        'color' => 'required|max_length[7]',
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
    protected $colores = [
            'yellow' => 'yellow-500',
            'red' => 'red-500',
            'pink' => 'pink-400',
            'indigo' => 'indigo-600',
            'purple' => 'purple-500',
            'green' => 'green-500'
        ];

    public function get_clase_color_by_id($id) {
        $row = $this->select('color')->find($id);
        $color = $row ? $row['color'] : null;
        return $color ? $this->colores[$color] : null;
    }

    public function get_clase_color($color) {
        return $this->colores[$color] ?? $this->colores['red'];
    }

    public function get_fecha_vencimiento_string($id) {
        return $this->select("DATE_FORMAT(fecha_vencimiento, '%m/%d') as fecha_vencimiento_string")
                ->where('id', $id)
                ->first()['fecha_vencimiento_string'] ?? null;
    }

    public function recordatorio_debe_notificarse($id) {
        $subtarea = $this->find($id);
        if (!$subtarea) {
            return false;
        }
        $now = date('Y-m-d H:i:s');
        return (
            !empty($subtarea['fecha_recordatorio']) &&
            $subtarea['fecha_recordatorio'] <= $now &&
            $subtarea['estado'] === 'En proceso'
        );
    }

    public function get_subtareas_por_tarea_id($id) {
        $tareas = $this->where('id_tarea', $id)->findAll();
        foreach($tareas as &$tarea) {
            $tarea['color'] = $this->get_clase_color($tarea['color']);
        }
        return $tareas;
    }

    public function completar_subtarea($id) {
        if(! $this->update($id, ['estado' => 'Finalizada'])) {
            $error = $this->db->error();
            return log_message('error', 'Error al completar la tarea: ' . $error['message']);
        }
        return null;
    }

    public function get_estado_por_id($id) {
        return $this->where('id', $id)->select('estado')->first();
    }
}