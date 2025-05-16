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
        'mensaje',
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

}