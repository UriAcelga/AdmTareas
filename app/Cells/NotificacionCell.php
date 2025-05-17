<?php

namespace App\Cells;

class NotificacionCell
{
    public function mostrarPush(array $params = [])
    {
        $params = [
            'asunto' => $params['asunto'] ?? 'Subtarea',
            'estado' => $params['estado'] ?? 'Definida',
            'prioridad' => $params['prioridad'] ?? 'Normal',
            'descripcion' => $params['descripcion'] ?? '',
            'usuario' => $params['usuario'] ?? '-',
            'fecha' => $params['fecha_vencimiento'] ?? '2030/01/01',
            'color' => $params['color'] ?? 'red-500'
        ];

        return view('componentes/notificacionPush', $params);
    }

    public function mostrarSideBar(array $params = [])
    {
        return view('componentes/notificacionSideBar', $params);
    }
}
