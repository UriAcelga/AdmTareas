<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TareaModel;
use App\Models\SubtareaModel;

class SubtareaController extends BaseController
{
    public function __construct()
    {
        helper(['form']);
    }

    public function crear() {
        return redirect()->back();
    }

    public function modificar() {
        return redirect()->back();
    }

    public function borrar() {
        return redirect()->back();
    }
    
    public function desarrollar() {
        $idSubtarea = $this->request->getPost('id');
        $idTarea = $this->request->getPost('id_tarea');
        $modeloSubtarea = new SubtareaModel();
        $modeloTarea = new TareaModel();
        $modeloSubtarea->desarrollar_subtarea($idSubtarea);
        if($modeloSubtarea->hay_subtareas_en_proceso_para_tarea($idTarea)) {
            $modeloTarea->set_estado_en_proceso($idTarea);
        }
        return redirect()->to(base_url('tareas/' . $idTarea));
    }

    public function completar() {
        $idSubtarea = $this->request->getPost('id');
        $idTarea = $this->request->getPost('id_tarea');
        $modeloSubtarea = new SubtareaModel();
        $modeloTarea = new TareaModel();
        $modeloSubtarea->completar_subtarea($idSubtarea);
        if($modeloSubtarea->todas_tareas_completadas_para_tarea($idTarea)) {
            $modeloTarea->set_estado_completada($idTarea);
        }
        return redirect()->to(base_url('tareas/' . $idTarea));
    }
    
    public function al_backlog() {
        $idSubtarea = $this->request->getPost('id');
        $idTarea = $this->request->getPost('id_tarea');
        $modeloSubtarea = new SubtareaModel();
        $modeloTarea = new TareaModel();
        $modeloSubtarea->subtarea_al_backlog($idSubtarea);
        if($modeloSubtarea->todas_tareas_definidas_para_tarea($idTarea)) {
            $modeloTarea->set_estado_definida($idTarea);
        } else {
            $modeloTarea->set_estado_en_proceso($idTarea);
        }
        return redirect()->to(base_url('tareas/' . $idTarea));

    }
}