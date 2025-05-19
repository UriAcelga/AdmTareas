<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TareaModel;
use App\Models\SubtareaModel;

class SubtareaController extends BaseController
{
    public function __construct()
    {
        helper(['form']);
    }

    public function crear()
    {
        $asunto = $this->request->getPost('asunto');
        $prioridad = $this->request->getPost('prioridad');
        $fecha_vencimiento = $this->request->getPost('vencimiento');
        $fecha_recordatorio = $this->request->getPost('recordatorio');
        $color = $this->request->getPost('color');
        $descripcion = $this->request->getPost('descripcion');
        $idTarea = $this->request->getPost('id_tarea');

        $modeloSubtarea = new SubtareaModel();
        $modeloTarea = new TareaModel();
        $modeloSubtarea->setValidationRules($modeloSubtarea->validationRules);
        $modeloSubtarea->setValidationMessages($modeloSubtarea->validationMessages);

        $data = [
            'asunto' => $asunto,
            'descripcion' => $descripcion ?? "",
            'prioridad' => $prioridad,
            'estado' => 'Definida',
            'fecha_vencimiento' => $fecha_vencimiento,
            'fecha_recordatorio' => $fecha_recordatorio && $fecha_recordatorio == '0000-00-00' ? $fecha_recordatorio : null,
            'id_responsable' => null,
            'id_tarea' => $idTarea,
            'color' => $color,
        ];

        if (!$modeloSubtarea->validate($data)) {
            session()->setFlashdata('errors', $modeloSubtarea->errors());
            return redirect()->back()->withInput();
        }
        $venc_tarea = $modeloTarea->get_fecha_vencimiento($idTarea);
        $hoy = date('Y-m-d');
        
        if ($data['fecha_vencimiento'] <= $hoy) {
            session()->setFlashdata('errors', ['fecha_vencimiento' => 'La fecha de vencimiento debe ser posterior a hoy.']);

            return redirect()->back()->withInput();
        } 
        if ($data['fecha_vencimiento'] > $venc_tarea) {
            session()->setFlashdata('errors', ['fecha_vencimiento' => 'La fecha de vencimiento no debe superar la fecha de vencimiento de la tarea: ' . $venc_tarea]);

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

        if($modeloSubtarea->todas_tareas_completadas_para_tarea($idTarea)) {
            $modeloTarea->set_estado_en_proceso($idTarea);
        }
        $modeloSubtarea->nueva_subtarea($data);
            return redirect()->to(base_url('tareas/' . $idTarea));
    }

    public function modificar()
    {
        $subtarea = $this->request->getPost();
        $modeloSubtarea = new SubtareaModel();
        $modeloTarea = new TareaModel();
        $modeloSubtarea->setValidationRules($modeloSubtarea->validationRules);
        $modeloSubtarea->setValidationMessages($modeloSubtarea->validationMessages);

        $id = $subtarea['id']; $id_tarea = $subtarea['id_tarea'];
        $data = [
            'asunto' => $subtarea['asunto'],
            'descripcion' => $subtarea['descripcion'] ?? "",
            'prioridad' => $subtarea['prioridad'],
            'fecha_vencimiento' => $subtarea['vencimiento'],
            'fecha_recordatorio' => $subtarea['recordatorio'] == '0000-00-00' ? null : $subtarea['recordatorio'],
            'color' => $subtarea['color'],
        ];

        if(!$modeloSubtarea->validate($data)) {
            session()->setFlashdata(('subtareaInvalida'), $modeloSubtarea->errors());
            return redirect()->back()->withInput();
        }
        $venc_tarea = $modeloTarea->get_fecha_vencimiento($id_tarea);
        $hoy = date('Y-m-d');
        
        if ($data['fecha_vencimiento'] <= $hoy) {
            session()->setFlashdata(('subtareaInvalida'), ['fecha_vencimiento' => 'La fecha de vencimiento debe ser posterior a hoy.']);
            return redirect()->back()->withInput();
        } 
        if ($data['fecha_vencimiento'] > $venc_tarea) {
            session()->setFlashdata(('subtareaInvalida'), ['fecha_vencimiento' => 'La fecha de vencimiento no debe superar la fecha de vencimiento de la tarea: ' . $venc_tarea]);
            return redirect()->back()->withInput();
        }
        if($data['fecha_recordatorio']) {
            if ( $data['fecha_recordatorio'] <= $hoy) {
                session()->setFlashdata(('subtareaInvalida'), ['fecha_recordatorio' => 'La fecha de recordatorio debe ser posterior a hoy.']);
                return redirect()->back()->withInput();
            }
            if ($data['fecha_recordatorio'] > $data['fecha_vencimiento']) {
                session()->setFlashdata(('subtareaInvalida'), ['fecha_recordatorio' => 'La fecha de recordatorio debe ser anterior al vencimiento.']);
                return redirect()->back()->withInput();
            }
        }
        
        if(!$modeloSubtarea->update($id, $data)) {
            session()->setFlashdata(('subtareaInvalida'), $modeloTarea->errors());
            return redirect()->back()->withInput();
        }

        if($modeloSubtarea->todas_tareas_completadas_para_tarea($id_tarea)) {
            $modeloTarea->set_estado_completada($id_tarea);
        } else if ($modeloSubtarea->todas_tareas_definidas_para_tarea($id_tarea)) {
            $modeloTarea->set_estado_definida($id_tarea);
        } else {
            $modeloTarea->set_estado_en_proceso($id_tarea);
        }

        return redirect()->to(base_url('tareas/' . $id_tarea));
    }

    public function borrar()
    {
        $id = $this->request->getPost('id');
        $idTarea = $this->request->getPost('id_tarea');
        $modeloSubtarea = new SubtareaModel();
        $modeloTarea = new TareaModel();
        if(!$modeloSubtarea->find($id)) {
            session()->setFlashdata('subtareaInvalida', 'Subtarea no encontrada');
            return redirect()->back();
        }

        $modeloSubtarea->delete($id);
        if(!$modeloSubtarea->hay_subtareas_completadas_para_tarea($idTarea)
        && !$modeloSubtarea->hay_subtareas_en_proceso_para_tarea($idTarea)) {
            $modeloTarea->set_estado_definida($idTarea);
        }
        session()->setFlashdata('subtareaBorrada', true);

        if(!$modeloSubtarea->todas_tareas_completadas_para_tarea($idTarea)) {
            $modeloTarea->set_estado_completada($idTarea);
        }
        return redirect()->to(base_url('tareas/' . $idTarea));
    }

    public function desarrollar()
    {
        $idSubtarea = $this->request->getPost('id');
        $idTarea = $this->request->getPost('id_tarea');
        $modeloSubtarea = new SubtareaModel();
        $modeloTarea = new TareaModel();
        $modeloSubtarea->desarrollar_subtarea($idSubtarea);
        if ($modeloSubtarea->hay_subtareas_en_proceso_para_tarea($idTarea)) {
            $modeloTarea->set_estado_en_proceso($idTarea);
        }
        return redirect()->to(base_url('tareas/' . $idTarea));
    }

    public function completar()
    {
        $idSubtarea = $this->request->getPost('id');
        $idTarea = $this->request->getPost('id_tarea');
        $modeloSubtarea = new SubtareaModel();
        $modeloTarea = new TareaModel();
        $modeloSubtarea->completar_subtarea($idSubtarea);
        if ($modeloSubtarea->todas_tareas_completadas_para_tarea($idTarea)) {
            $modeloTarea->set_estado_completada($idTarea);
        }
        return redirect()->to(base_url('tareas/' . $idTarea));
    }

    public function al_backlog()
    {
        $idSubtarea = $this->request->getPost('id');
        $idTarea = $this->request->getPost('id_tarea');
        $modeloSubtarea = new SubtareaModel();
        $modeloTarea = new TareaModel();
        $modeloSubtarea->subtarea_al_backlog($idSubtarea);
        if ($modeloSubtarea->todas_tareas_definidas_para_tarea($idTarea)) {
            $modeloTarea->set_estado_definida($idTarea);
        } else {
            $modeloTarea->set_estado_en_proceso($idTarea);
        }
        return redirect()->to(base_url('tareas/' . $idTarea));
    }
}
