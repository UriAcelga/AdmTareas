<?php

namespace App\Controllers;
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
        $data = [
            'tareasPropias' => $modeloTareas->get_tareas_por_dueño(session()->get('id_usuario')),
            'tareasColaborando' => $modeloTareas->get_tareas_por_colaborador(session()->get('email'))
        ];
        var_dump($data['tareasColaborando']);
        return view('home', $data);
    }
}
