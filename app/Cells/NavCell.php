<?php

namespace App\Cells;
use App\Models\NotificacionModel;

class NavCell
{
    public function mostrar(array $params = [])
    {
        $modeloNotif = new NotificacionModel();
        
        $data = [
            'title' => $params['title'] ?? 'Administrador de tareas',
            'hayPendientes' => $modeloNotif->usuario_tiene_notificaciones_no_leidas(session()->get('email')) ?? false,
            'notifs' => $modeloNotif->get_by_email(session()->get('email'))
        ];
        return view('componentes/nav', $data);
    }
}
