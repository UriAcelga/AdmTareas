<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Auth extends BaseController
{
    public function index()
    {
        if (session()->get('loggeado')) {
            return redirect()->to(base_url('home'));
        }
        return view('login');
    }

    public function registro()
    {
        if (session()->get('loggeado')) {
            return redirect()->to(base_url('home'));
        }
        return view('registro');
    }

    public function login()
    {
        $modeloUsuario = new UsuarioModel();
        $email = $this->request->getPost('email');
        $pwd = $this->request->getPost('pwd');

        $usuario = $modeloUsuario->find_por_email($email);
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

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url(""));
    }

    public function registrar_usuario()
    {
        $modeloUsuario = new UsuarioModel();
        $modeloUsuario->setValidationRules($modeloUsuario->validationRules);
        $modeloUsuario->setValidationMessages($modeloUsuario->validationMessages);
        $data = [
            'email' => $this->request->getPost('email'),
            'pwd' => $this->request->getPost('pwd')
        ];

        if ($data['email'] && $data['pwd']) {
            if (!$modeloUsuario->validate($data)) {
                session()->setFlashdata('errors', $modeloUsuario->errors());
                return redirect()->back()->withInput();
            }
            $idNuevoUsuario = $modeloUsuario->registrar_usuario($data);
            if (!$idNuevoUsuario) {
                session()->setFlashdata('error', 'Error al crear el usuario');
                return redirect()->back()->withInput();
            }

            $nuevoUsuario = $modeloUsuario->get_usuario_by_id($idNuevoUsuario);
            $sessionData = [
                'id_usuario' => $nuevoUsuario['id'],
                'email' => $nuevoUsuario['email'],
                'loggeado' => true,
            ];
            session()->set($sessionData);
            return redirect()->to(base_url('home'));
        }
        session()->setFlashdata('error', 'Hay campos vacíos');
        return redirect()->back()->withInput();
    }
}
