<?php

namespace App\Cells;

class SubtareaCell
{
    public function mostrar(array $params = [])
    {
        $params = [
            'title' => $params['title'] ?? 'Subtarea',
            'prioridad' => $params['prioridad'] ?? 'Baja',
            'usuario' => $params['usuario'] ?? 'Usuario',
            'fecha' => $params['fecha'] ?? 'Fecha',
        ];

        return view('componentes/subtarea', $params);
    }
}
