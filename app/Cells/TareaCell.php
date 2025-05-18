<?php

namespace App\Cells;

class TareaCell
{
    public function mostrar(array $params = [])
    {
        $params = [
            'id' => $params['id'] ?? '1',
            'idDueño' => $params['idDueño'],
            'es_dueño' => $params['es_dueño'] ?? false,
            'asunto' => $params['asunto'] ?? 'Tarea',
            'descripcion' => $params['descripcion'] ?? "",
            'prioridad' => $params['prioridad'] ?? 'Baja',
            'estado' => $params['estado'] ?? 'Definida',
            'fecha' => $params['fecha'] ?? '2026-20-6',
            'color' => $params['color'] ?? 'red-500',
        ];

        return view('componentes/tareaCard', $params);
    }
}
