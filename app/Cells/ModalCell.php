<?php

namespace App\Cells;

use App\Models\NotificacionModel;

class ModalCell
{
    public function crearTarea()
    {
        return view('componentes/modalTareaCrear');
    }

    public function modificarTarea(array $params = [])
    {
        $data = [
            'id' => $params['id'],
            'asunto' => $params['asunto'],
            'descripcion' => $params['descripcion'],
            'prioridad' => $params['prioridad'],
            'fecha_vencimiento' => $params['fecha_vencimiento'],
            'fecha_recordatorio' => $params['fecha_recordatorio'] != '0000-00-00' ? $params['fecha_recordatorio'] : "",
            'color' => $params['color'],
        ];
        return view('componentes/modalTareaModificar', $data);
    }

    public function crearSubtarea()
    {
        return view('componentes/modalSubtareaModificar');
    }
    public function modificarSubtarea(array $params = [])
    {
        $data = [];
        var_dump($data);
        die;
        return view('componentes/modalSubtareaModificar', $data);
    }
}
