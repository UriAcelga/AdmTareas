<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TareaModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class TareaController extends BaseController
{
    public function index($id)
    {
        $modeloTareas = new TareaModel();
        $tarea = $modeloTareas->where('id', $id)->first();

        if(!$tarea) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('tarea', $tarea);
    }
}
