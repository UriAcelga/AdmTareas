<?php

namespace App\Controllers;

use App\Models\NotificacionModel;
use App\Models\TareaModel;

class HomeController extends BaseController
{
    public function __construct() 
    {
        helper(['form', 'url', 'text']);
    }

    public function index(): string
    {
        $modeloTareas = new TareaModel();
        $modeloNotif = new NotificacionModel();
        $data = [
            'tareasPropias' => $modeloTareas->get_tareas_por_dueño(session()->get('id_usuario')),
            'tareasColaborando' => $modeloTareas->get_tareas_por_colaborador(session()->get('email')),
            'notificaciones' => $modeloNotif->get_notificaciones_no_leidas_by_email(session()->get('email'))
        ];
        return view('home', $data);
    }
}
