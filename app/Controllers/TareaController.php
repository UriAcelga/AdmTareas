<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TareaModel;
use App\Models\SubtareaModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class TareaController extends BaseController
{
    public function index($id)
    {
        $modeloTareas = new TareaModel();
        $modeloSubtareas = new SubtareaModel();
        $tarea = $modeloTareas->buscar_por_id($id);
        $subtareas = $modeloSubtareas->get_subtareas_por_tarea_id($id); 

        if(!$tarea) {
            throw PageNotFoundException::forPageNotFound();
        }
        $data = [
            'tarea' => $tarea,
            'subtareas' => $subtareas
        ];

        return view('tarea', $data);
    }

    public function completar_subtarea()
    {
        $idSubtarea = $this->request->getPost('completar');
        $modeloSubtareas = new SubtareaModel();
        $subtarea = $modeloSubtareas->get_estado_por_id($idSubtarea);
        if($subtarea['estado'] == 'En Proceso' || $subtarea['estado'] == 'Definida') {
            $modeloSubtareas->completar_subtarea($idSubtarea);

        }
        
        
        return redirect()->back();
    }
}
