<?php

namespace App\Controllers;

use App\Models\ColaboracionModel;
use App\Models\NotificacionModel;

class NotificacionController extends BaseController
{
     public function __construct()
    {
        helper(['form']);
    }

    public function invitar()
    {
        $id_tarea = $this->request->getPost('id_tarea');
        $email_dueño = $this->request->getPost('email_dueño');
        $email_colaborador = $this->request->getPost('colaborador');
        $modeloNotif = new NotificacionModel();

        $data = [
            'email_usuario' => $email_colaborador,
            'id_tarea' => $id_tarea,
            'tipo' => 'invitacion',
            'email_invitador' => $email_dueño,
            'leido' => 0,
        ];

        if($email_dueño == $email_colaborador) {
            session()->setFlashdata('colaborador', 'El email ingresado no puede ser el tuyo.' . $modeloNotif->errors());
            return redirect()->back();
        }

        if(!$modeloNotif->nueva_notificacion($data)) {
            session()->setFlashdata('errorInvitacion', 'Error al crear la invitacion: ' . $modeloNotif->errors());
            return redirect()->back();
        }

        session()->setFlashdata('invitacionSuccess', 'Invitación enviada con éxito');
        return redirect()->back();
    }

    public function aceptarInvitacion()
    {
        $id = $this->request->getPost('id_notif');
        $id_tarea = $this->request->getPost('id_tarea');
        $email_usuario = $this->request->getPost('email_usuario');
        $modeloColab = new ColaboracionModel();
        $modeloNotif = new NotificacionModel();

        $data = [
            'idTarea' => $id_tarea,
            'emailColaborador' => $email_usuario
        ];

        if(! $modeloColab->nueva_colaboracion($data)) {
            session()->setFlashdata('errorAceptarInvitacion', 'Error inesperado al aceptar la invitacion');
        }

        $modeloNotif->marcar_como_leida($id);
        return redirect()->to('tareas/' . $id_tarea);

    }

    public function rechazarInvitacion()
    {
        $id = $this->request->getPost('id_notif');
        $modeloNotif = new NotificacionModel();

        $modeloNotif->marcar_como_leida($id);
        return redirect()->back();
    }

    public function marcar_como_leidas() 
    {

    }
}