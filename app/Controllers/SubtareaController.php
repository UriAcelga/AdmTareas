<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TareaModel;
use App\Models\SubtareaModel;

class TareaController extends BaseController
{
    public function __construct()
    {
        helper(['form']);
    }

    public function modificar() {
        return redirect()->back();
    }
}