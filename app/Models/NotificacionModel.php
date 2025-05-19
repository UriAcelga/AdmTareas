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
        return $this->insert($data);
    }

    public function get_notificaciones_no_leidas_by_email($emailUsuario) {
        return $this->where('email_usuario', $emailUsuario)->where('leido', 0)->orderBy('created_at', 'DESC')->findAll();
    }

    public function usuario_ya_invitado($idTarea, $email_usuario) {
        return $this->where('id_tarea', $idTarea)->where('email_usuario', $email_usuario)->countAllResults() > 0;
    }

}