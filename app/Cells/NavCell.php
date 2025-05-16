<?php

namespace App\Cells;

class NavCell
{
    public function mostrar(array $params = [])
    {
        $data = [
            'title' => $params['title'] ?? 'Administrador de tareas',
        ];
        return view('componentes/nav', $data);
    }
}
