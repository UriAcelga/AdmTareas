<?php

namespace App\Cells;
use App\Models\NotificacionModel;

class ModalCell
{
    public function crearTarea() {
        return view('componentes/modalTareaCrear');
    }

    public function modificarTarea() {
        return view('componentes/modalTareaModificar');
    }

    public function crearSubtarea() {
        return view('componentes/modalSubtareaModificar');
    }
    public function modificarSubtarea() {
        return view('componentes/modalSubtareaModificar');
    }
}