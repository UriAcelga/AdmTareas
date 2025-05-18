<?php

namespace App\Controllers;

use App\Models\ColaboracionModel;

class ColaboracionController extends BaseController
{
    public function aceptar() {
        return redirect()->back();
    }

    public function rechazar() {
        return redirect()->back();
    }
}