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
        'fecha_vencimiento' => 'required|valid_date[Y-m-d]|',
        'color' => 'required',
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
        'color' => [
            'required' => 'El color es obligatorio.',
        ]
    ];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;
    protected $colores = [
            'yellow' => 'to-yellow-500',
            'red' => 'to-red-500',
            'pink' => 'to-pink-400',
            'indigo' => 'to-indigo-600',
            'purple' => 'to-purple-500',
            'green' => 'to-green-500'
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
        if(! $this->update($id, ['estado' => 'Completada'])) {
            $error = $this->db->error();
            return log_message('error', 'Error al completar la tarea: ' . $error['message']);
        }
        return null;
    }

    public function desarrollar_subtarea($id) {
        if(! $this->update($id, ['estado' => 'En proceso'])) {
            $error = $this->db->error();
            return log_message('error', 'Error al desarrollar la tarea: ' . $error['message']);
        }
        return null;
    }

    public function subtarea_al_backlog($id) {
        if(! $this->update($id, ['estado' => 'Definida'])) {
            $error = $this->db->error();
            return log_message('error', 'Error al enviar la tarea al backlog: ' . $error['message']);
        }
        return null;
    }

    public function get_estado_por_id($id) {
        return $this->where('id', $id)->select('estado')->first();
    }

    
    public function hay_subtareas_en_proceso_para_tarea($idTarea) {
        return $this->where('estado', 'En proceso')
        ->where('id_tarea', $idTarea)
        ->countAllResults() > 0;
    }

    public function hay_subtareas_completadas_para_tarea($idTarea) {
        return $this->where('estado', 'Completada')
        ->where('id_tarea', $idTarea)
        ->countAllResults() > 0;
    }

    public function todas_tareas_definidas_para_tarea($idTarea) {
        $total = $this->where('id_tarea', $idTarea)->countAllResults();
        if ($total == 0) {
            return false;
        }
        $definidas = $this->where('id_tarea', $idTarea)
                    ->where('estado', 'Definida')
                    ->countAllResults();
        return $total === $definidas;
    }

    public function todas_tareas_completadas_para_tarea($idTarea) {
        $total = $this->where('id_tarea', $idTarea)->countAllResults();
        if ($total == 0) {
            return false;
        }
        $completadas = $this->where('id_tarea', $idTarea)
                    ->where('estado', 'Completada')
                    ->countAllResults();
        return $total === $completadas;
    }

    public function nueva_subtarea($data) {
        $sql = "INSERT INTO subtarea (asunto, descripcion, estado, prioridad, fecha_vencimiento, fecha_recordatorio, id_responsable, color, id_tarea)
            VALUES (:asunto:, :descripcion:, :estado:, :prioridad:, :fecha_vencimiento:, :fecha_recordatorio:, :id_responsable:, :color:, :id_tarea:)";
        $this->db->query($sql, [
            'asunto' => $data['asunto'],
            'descripcion' => $data['descripcion'] ?? null,
            'estado' => $data['estado'] ?? 'Definida',
            'prioridad' => $data['prioridad'],
            'fecha_vencimiento' => $data['fecha_vencimiento'],
            'fecha_recordatorio' => $data['fecha_recordatorio'] ?? null,
            'id_responsable' => $data['id_responsable'] ?? null,
            'color' => $data['color'],
            'id_tarea' => $data['id_tarea'],
        ]);
        return $this->db->insertID();
    }
}