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

    public function borrarTarea(array $params = []) {
        $data = [
            'id' => $params['id'] ?? 0
        ];
        return view('componentes/confirmarBorrarTarea', $data);
    }

    public function crearSubtarea(array $params = [])
    {
        $data = [
            'id_tarea' => $params['id'] ?? 0
        ];
        return view('componentes/modalSubtareaCrear', $data);
    }
    public function modificarSubtarea(array $params = [])
    {
        $data = [
            'id' => $params['id'],
            'id_tarea' => $params['id_tarea'],
            'asunto' => $params['asunto'],
            'descripcion' => $params['descripcion'],
            'prioridad' => $params['prioridad'],
            'fecha_vencimiento' => $params['fecha_vencimiento'],
            'fecha_recordatorio' => $params['fecha_recordatorio'] != '0000-00-00' ? $params['fecha_recordatorio'] : "",
            'color' => $params['color'],
        ];
        return view('componentes/modalSubtareaModificar', $data);
    }

    public function borrarSubtarea(array $params = [])
    {
        $data = [
            'id' => $params['id']
        ];

        return view('componentes/confirmarBorrarSubtarea', $data);
    }

    public function invitarColaborador(array $params = [])
    {
        $data = [
            'id_tarea' => $params['id_tarea'],
            'email_dueño' => $params['email_dueño'],
        ];
        return view('componentes/modalInvitacion', $data);
    }
}
