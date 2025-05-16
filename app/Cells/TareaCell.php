<?php

namespace App\Cells;

class TareaCell
{
    public function mostrar(array $params = [])
    {
        $params = [
            'nombre' => $params['nombre'] ?? 'Tarea',
            'color' => $params['color'] ?? 'red-500',
            'prioridad' => $params['prioridad'] ?? 'Baja',
            'usuario' => $params['usuario'] ?? 'Usuario',
            'fecha' => $params['fecha'] ?? 'Fecha',
        ];

        return view('componentes/tarea', $params);
    }
}
