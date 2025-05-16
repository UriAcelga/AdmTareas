<?php

namespace App\Controllers;
use App\Models\UsuarioModel;

class Auth extends BaseController
{
    public function index() {
        return view('login');
    }

    public function login() {
        $modeloUsuario = new UsuarioModel();
        $email = $this->request->getPost('email');
        $pwd = $this->request->getPost('pwd');

        $usuario = $modeloUsuario->where('email', $email)->first();
        if ($usuario && ($pwd == $usuario['pwd'])) {
            $sessionData = [
                'id_usuario' => $usuario['id'],
                'email' => $usuario['email'],
                'loggeado' => true,
            ];
            session()->set($sessionData);
            return redirect()->to(base_url('home'));
        } else {
            session()->setFlashdata('error', 'Credenciales inválidas');
            return redirect()->back()->withInput();
        }
    }

    public function logout() {
        session()->destroy();
        return redirect()->to(base_url(""));
    }
}