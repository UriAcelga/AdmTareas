<?php 
namespace App\Models;
use CodeIgniter\Model;

class NotificacionModel extends Model {
    protected $table = 'notificacion';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'email_usuario',
        'id_tarea',
        'id_subtarea',
        'tipo',
        'email_invitador',
        'created_at',
        'leido'
    ];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [
        'tipo' => 'required|in_list[invitacion,borrado,modificado,completado,asignado,recordatorio]'
    ];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;


    public function get_by_email($email_usuario) {
        return $this->where('email_usuario', $email_usuario)->orderBy('created_at', 'DESC');
    }

    public function usuario_tiene_notificaciones_no_leidas($email_usuario) {
        return $this->where('email_usuario', $email_usuario)
                    ->where('leido', 0)
                    ->countAllResults() > 0;
    }

    public function marcar_como_leida($id) {
        return $this->where('id', $id)
                    ->where('leido', 0)
                    ->set(['leido' => 1])
                    ->update();
    }

    public function nueva_notificacion($data) {
        $sql = "INSERT INTO `{$this->table}` (`email_usuario`, `id_tarea`, `id_subtarea`, `tipo`, `email_invitador`, `leido`) VALUES (?, ?, ?, ?, ?, ?)";
        $this->db->query($sql, [
            $data['email_usuario'],
            $data['id_tarea'] ?? null,
            $data['id_subtarea'] ?? null,
            $data['tipo'],
            $data['email_invitador'] ?? null,
            $data['leido'] ?? 0,
        ]);

        return $this->db->insertID();
    }

    public function get_notificaciones_no_leidas_by_email($emailUsuario) {
        $tareaModel = new \App\Models\TareaModel();
        $subtareaModel = new \App\Models\SubtareaModel(); 
        $data = $this->where('email_usuario', $emailUsuario)->where('leido', 0)->orderBy('created_at', 'DESC')->findAll();
        foreach($data as &$notif) {
            if($notif['id_tarea']) {
                $notif['asunto'] = $tareaModel->get_asunto($notif['id_tarea']);
                $notif['fecha_recordatorio'] = $tareaModel->get_fecha_recordatorio($notif['id_tarea']);
            }
            if($notif['id_subtarea']) {
                $notif['asunto'] = $subtareaModel->get_asunto($notif['id_subtarea']);
                $notif['fecha_recordatorio'] = $subtareaModel->get_fecha_recordatorio($notif['id_subtarea']);
            }
        }
        return $data;
    }

    public function usuario_ya_invitado($idTarea, $email_usuario) {
        return $this->where('id_tarea', $idTarea)
                    ->where('email_usuario', $email_usuario)
                    ->where('tipo', 'invitacion')
                    ->countAllResults() > 0;
    }

    public function usuario_ya_recordado($idTarea, $email_usuario) {
        return $this->where('id_tarea', $idTarea)
                    ->where('email_usuario', $email_usuario)
                    ->where('tipo', 'recordatorio') 
                    ->countAllResults() > 0;
    }
    public function usuario_ya_recordado_subtarea($idSubtarea, $email_usuario) {
        return $this->where('id_subtarea', $idSubtarea)
                    ->where('email_usuario', $email_usuario)
                    ->where('tipo', 'recordatorio') 
                    ->countAllResults() > 0;
    }

}