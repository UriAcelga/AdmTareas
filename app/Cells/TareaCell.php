<?php

namespace App\Cells;

class TareaCell
{
    public function mostrar(array $params = [])
    {
        $params = [
            'id' => $params['id'] ?? '1',
            'asunto' => $params['asunto'] ?? 'Tarea',
            'color' => $params['color'] ?? 'red-500',
            'prioridad' => $params['prioridad'] ?? 'Baja',
            'usuario' => $params['usuario'] ?? 'Usuario',
            'fecha' => $params['fecha'] ?? '20/6',
            'descripcion' => $params['descripcion'] ?? ""
        ];

        return view('componentes/tareaCard', $params);
    }
}
