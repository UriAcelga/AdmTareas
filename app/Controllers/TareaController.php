<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TareaModel;
use App\Models\SubtareaModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class TareaController extends BaseController
{
    public function __construct()
    {
        helper(['form']);
    }

    public function index($id)
    {
        $modeloTareas = new TareaModel();
        $modeloSubtareas = new SubtareaModel();
        $tarea = $modeloTareas->buscar_por_id($id);
        $subtareas = $modeloSubtareas->get_subtareas_por_tarea_id($id);

        if (!$tarea) {
            throw PageNotFoundException::forPageNotFound();
        }
        $data = [
            'tarea' => $tarea,
            'subtareas' => $subtareas
        ];
        $data['es_dueño'] = $data['tarea']['idDueño'] == session()->get('id_usuario');

        return view('tarea', $data);
    }

    public function completar_subtarea()
    {
        $idSubtarea = $this->request->getPost('completar');
        $modeloSubtareas = new SubtareaModel();
        $subtarea = $modeloSubtareas->get_estado_por_id($idSubtarea);
        if ($subtarea['estado'] == 'En Proceso' || $subtarea['estado'] == 'Definida') {
            $modeloSubtareas->completar_subtarea($idSubtarea);
        }


        return redirect()->back();
    }

    public function crear()
    {
        $asunto = $this->request->getPost('asunto');
        $prioridad = $this->request->getPost('prioridad');
        $fecha_vencimiento = $this->request->getPost('vencimiento');
        $fecha_recordatorio = $this->request->getPost('recordatorio');
        $color = $this->request->getPost('color');
        $descripcion = $this->request->getPost('descripcion');

        $modeloTareas = new TareaModel();
        $modeloTareas->setValidationRules($modeloTareas->validationRules);
        $modeloTareas->setValidationMessages($modeloTareas->validationMessages);


        $data = [
            'idDueño' => session()->get('id_usuario'),
            'asunto' => $this->request->getPost('asunto'),
            'descripcion' => $this->request->getPost('descripcion') ?? "",
            'prioridad' => $this->request->getPost('prioridad'),
            'estado' => 'Definida',
            'fecha_vencimiento' => $this->request->getPost('vencimiento'),
            'fecha_recordatorio' => $this->request->getPost('recordatorio') ?? null,
            'color' => $this->request->getPost('color'),
        ];
        if (!$modeloTareas->validate($data)) {
            session()->setFlashdata('errors', $modeloTareas->errors());
            return redirect()->back()->withInput();
        }
        $hoy = date('Y-m-d');
        if ($data['fecha_vencimiento'] <= $hoy) {
            session()->setFlashdata('errors', ['fecha_vencimiento' => 'La fecha de vencimiento debe ser posterior a hoy.']);
            return redirect()->back()->withInput();
        } 
        if($data['fecha_recordatorio']) {
            if ( $data['fecha_recordatorio'] <= $hoy) {
                session()->setFlashdata('errors', ['fecha_recordatorio' => 'La fecha de recordatorio debe ser posterior a hoy.']);
                return redirect()->back()->withInput();
            }
            if ($data['fecha_recordatorio'] > $data['fecha_vencimiento']) {
                session()->setFlashdata('errors', ['fecha_recordatorio' => 'La fecha de recordatorio debe ser anterior al vencimiento.']);
                return redirect()->back()->withInput();
            }
        }
        
        $modeloTareas->insert($data);
        $idNuevaTarea = $modeloTareas->nueva_tarea($data);
        $nuevaTarea = $modeloTareas->buscar_por_id($idNuevaTarea);

        return redirect()->to(base_url('tareas/' . $nuevaTarea['id']));
    }

    public function modificar() {
        $tarea = $this->request->getPost();
        $modeloTareas = new TareaModel();
        $modeloTareas->setValidationRules($modeloTareas->validationRules);
        $modeloTareas->setValidationMessages($modeloTareas->validationMessages);

        $data = [
            'asunto' => $tarea['asunto'],
            'descripcion' => $tarea['descripcion'] ?? "",
            'prioridad' => $tarea['prioridad'],
            'fecha_vencimiento' => $tarea['vencimiento'],
            'fecha_recordatorio' => $tarea['recordatorio'] == '0000-00-00' ? null : $tarea['recordatorio'],
            'color' => $tarea['color'],
        ];
        var_dump($data);

        if (!$modeloTareas->validate($data)) {
            session()->setFlashdata('errors', $modeloTareas->errors());
            var_dump(session()->getFlashdata('errors')); die;
            return redirect()->back()->withInput();
        }
        $hoy = date('Y-m-d');
        if ($data['fecha_vencimiento'] <= $hoy) {
            session()->setFlashdata('errors', ['fecha_vencimiento' => 'La fecha de vencimiento debe ser posterior a hoy.']);
            var_dump(session()->getFlashdata('errors')); die;
            return redirect()->back()->withInput();
        } 
        if($data['fecha_recordatorio']) {
            if ( $data['fecha_recordatorio'] <= $hoy) {
                session()->setFlashdata('errors', ['fecha_recordatorio' => 'La fecha de recordatorio debe ser posterior a hoy.']);
                var_dump(session()->getFlashdata('errors')); die;
                return redirect()->back()->withInput();
            }
            if ($data['fecha_recordatorio'] > $data['fecha_vencimiento']) {
                session()->setFlashdata('errors', ['fecha_recordatorio' => 'La fecha de recordatorio debe ser anterior al vencimiento.']);
                var_dump(session()->getFlashdata('errors')); die;
                return redirect()->back()->withInput();
            }
        }
        if (!$modeloTareas->update($tarea['id'], $data)) {
            session()->setFlashdata('errors', $modeloTareas->errors());
            var_dump($modeloTareas->errors()); die();
            return redirect()->back()->withInput();
        }
        
        return redirect()->to(base_url('tareas/' . $tarea['id']));
    }
}
