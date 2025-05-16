<?php

namespace App\Cells;

class NavCell
{
    public function mostrar(array $params = [])
    {
        $data = [
            'title' => $params['title'] ?? 'Administrador de tareas',
            'hayPendientes' => $params['hayPendientes'] ?? true,
        ];
        return view('componentes/nav', $data);
    }
}
