<?php

namespace App\Cells;

class SubtareaCell
{
    public function mostrar(array $params = [])
    {
        $params = [
            'id' => $params['id'] ?? 1,
            'es_dueño' => $params['es_dueño'] ?? false,
            'asunto' => $params['asunto'] ?? 'Subtarea',
            'descripcion' => $params['descripcion'] ?? '',
            'estado' => $params['estado'] ?? 'Definida',
            'prioridad' => $params['prioridad'] ?? 'Normal',
            'fecha_vencimiento' => $params['fecha_vencimiento'] ?? '2030/01/01',
            'fecha_recordatorio' => $params['fecha_recordatorio'] ?? '2030/01/01',
            'usuario' => $params['usuario'] ?? '-',
            'color' => $params['color'] ?? 'red-500',
            'id_tarea' => $params['id_tarea']
        ];

        return view('componentes/subtarea', $params);
    }
}
