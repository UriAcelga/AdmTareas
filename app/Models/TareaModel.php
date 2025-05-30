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
        'estado' => 'in_list[Definida,En proceso,Completada,Archivada]',
        'fecha_vencimiento' => 'required|valid_date[Y-m-d]|',
        'color' => 'in_list[red,purple,indigo,yellow,green,pink]',
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
            'in_list' => 'Prioridad debe ser: Baja, Normal, Alta.',
        ],
        'estado' => [
            'in_list' => 'El estado debe ser: Definida, En proceso, Completada, Archivada.',
        ],
        'fecha_vencimiento' => [
            'required' => 'La fecha de vencimiento es obligatoria.',
            'valid_date' => 'Formato inválido para la fecha de vencimiento',
        ],
        'color' => [
            'in_list' => 'El color ingresado no es válido',
        ],
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
        return $this->select('idDueño')->find($id)['idDueño'];
    }

    public function get_fecha_vencimiento($id) {
        return $this->select('fecha_vencimiento')->find($id)['fecha_vencimiento'];
    }

    public function get_fecha_recordatorio($id) {
        return $this->select('fecha_recordatorio')->find($id)['fecha_recordatorio'];
    }

    public function get_asunto($id) {
        return $this->select('asunto')->find($id)['asunto'];
    }

    public function estado_es_completada($id) {
        return $this->where('id', $id)->select('estado')->first()['estado'] == 'Completada';
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

    public function get_id_tareas_posibles_notificaciones_por_dueño($id) {
        $tareas = $this->where('idDueño', $id)
              ->select('id')
              ->where('fecha_recordatorio <=', date('Y-m-d'))
              ->where('fecha_recordatorio IS NOT NULL')
              ->whereIn('estado', ['Definida', 'En proceso'])
              ->findAll();
        return $tareas;
    }

    public function get_id_tareas_posibles_notificaciones_por_colaborador($email) {
        $tareas = $this->select('tarea.id')
              ->join('colaboracion', 'colaboracion.idTarea = tarea.id')
              ->where('colaboracion.emailColaborador', $email)
              ->where('tarea.fecha_recordatorio <=', date('Y-m-d'))
              ->whereIn('estado', ['Definida', 'En proceso'])
              ->findAll();
        return $tareas;
    }

    public function buscar_por_id($id) {
        $tarea = $this->where('id', $id)->first();
        $tarea['color'] = $this->colores[$tarea['color']];
        return $tarea;
    }

    public function nueva_tarea($data) {
        return $this->insert($data);
    }

    public function set_estado_definida($id) {
        return $this->update($id, ['estado' => 'Definida']);
    }

    public function set_estado_en_proceso($id) {
        return $this->update($id, ['estado' => 'En proceso']);
    }

    public function set_estado_completada($id) {
        return $this->update($id, ['estado' => 'Completada']);
    }

    public function set_estado_archivada($id) {
        return $this->update($id, ['estado' => 'Archivada']);
    }

}