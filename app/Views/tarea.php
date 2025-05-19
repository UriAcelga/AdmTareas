<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?> Mis Tareas <?= $this->endSection() ?>

<?= $this->section('nav') ?>
<?= view_cell('NavCell::mostrar', ['title' => 'Administrador de Tareas', 'notifs' => esc($notificaciones)]) ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex justify-between items-center mb-4">
    <a href="<?= base_url('home') ?>" class="text-white font-bold text-xl hover:underline">
        <span class="flex items-center">
            <img src="<?= base_url('icons/left-arrow.svg') ?>" alt="volver" class="w-6 h-6 mr-2">
            Volver a Principal
        </span>
    </a>
    <?php if (esc($es_dueño) && esc($tarea['estado']) != 'Archivada'): ?>
        <div>

            <?= view_cell('ModalCell::invitarColaborador', [
                'id_tarea' => esc($tarea['id']),
                'email_dueño' => esc($email_dueño)
            ]) ?>
        </div>
    <?php endif; ?>
</div>

<?php if (session()->getFlashdata('tareaInvalida')): ?>
    <div class="bg-red-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto max-w-lg">
        <svg viewBox="0 0 24 24" class="text-red-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
            <path fill="currentColor"
                d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
            </path>
        </svg>
        <span class="text-red-800"> Error al eliminar la tarea </span>
    </div>
<?php endif; ?>
<?php if ($error = session()->getFlashdata('subtareaInvalida')): ?>
    <div class="bg-red-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto max-w-lg">
        <svg viewBox="0 0 24 24" class="text-red-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
            <path fill="currentColor"
                d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
            </path>
        </svg>
        <span class="text-red-800"> Error al modificar la subtarea: </span>
    </div>
<?php endif; ?>
<?php if ($error = session()->getFlashdata('invitacionSuccess')): ?>
    <div class="bg-green-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto max-w-lg">
        <svg viewBox="0 0 24 24" class="text-green-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
            <path fill="currentColor"
                d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
            </path>
        </svg>
        <span class="text-green-800">Invitación enviada correctamente</span>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('subtareaBorrada')): ?>
    <div class="bg-green-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto max-w-lg">
        <svg viewBox="0 0 24 24" class="text-green-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
            <path fill="currentColor"
                d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
            </path>
        </svg>
        <span class="text-green-800">Subtarea borrada correctamente</span>
    </div>
<?php endif; ?>
<div class="bg-gradient-to-l from-gray-600 <?= esc($tarea['estado']) == 'Archivada' ? 'to-gray-500' : esc($tarea['color']) ?> p-4 rounded-md shadow-md my-8">
    <?php if (esc($tarea['estado']) != 'Archivada'): ?>
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-white font-bold text-lg"><?= esc($tarea['estado']) ?> - Prioridad <?= esc($tarea['prioridad']) ?></h3>

            <?php if (esc($es_dueño)): ?>
                <div class="flex items-center ml-auto space-x-2">
                    <?= view_cell('ModalCell::modificarTarea', [
                        'id' => esc($tarea['id']),
                        'asunto' => esc($tarea['asunto']),
                        'descripcion' => esc($tarea['descripcion']),
                        'prioridad' => esc($tarea['prioridad']),
                        'fecha_vencimiento' => esc($tarea['fecha_vencimiento']),
                        'fecha_recordatorio' => esc($tarea['fecha_recordatorio']),
                        'color' => esc($tarea['color']),
                    ]) ?>
                    <?= view_cell('ModalCell::borrarTarea', [
                        'id' => esc($tarea['id'])
                    ]) ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <div class="flex justify-center mb-4">
        <h2 class="text-white font-bold text-lg"><?= esc($tarea['asunto']) ?></h2>
        <h2 class="text-white text-md"><?= esc($tarea['descripcion']) ?></h2>
    </div>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <div class="bg-gray-900 rounded-md shadow-sm p-4 min-h-[250px]">
        <div class="flex justify-between items-center mb-2">
            <h4 class="font-semibold">Definido</h4>
            <?php if (esc($tarea['estado']) != 'Archivada'): ?>
                <?php if (esc($es_dueño)): ?>
                    <?= view_cell('ModalCell::crearSubtarea', ['id' => esc($tarea['id'])]) ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <?php foreach (esc($subtareas) as $subtarea):
            if ($subtarea['estado'] == 'Definida'): ?>
                <div class="space-y-2 mb-2">
                    <?= view_cell('SubtareaCell::mostrar', [
                        'id' => $subtarea['id'],
                        'es_dueño' => esc($es_dueño),
                        'asunto' => $subtarea['asunto'],
                        'descripcion' => $subtarea['descripcion'],
                        'estado' => $subtarea['estado'],
                        'prioridad' => $subtarea['prioridad'],
                        'fecha_vencimiento' => $subtarea['fecha_vencimiento'],
                        'fecha_recordatorio' => $subtarea['fecha_recordatorio'],
                        'usuario' => $subtarea['id_responsable'],
                        'color' => $subtarea['color'],
                        'id_tarea' => $subtarea['id_tarea'],
                    ]) ?>
                </div>
        <?php endif;
        endforeach; ?>
    </div>

    <div class="bg-gray-900 rounded-md shadow-sm p-4">
        <h4 class="font-semibold mb-2">En Proceso</h4>
        <?php foreach (esc($subtareas) as $subtarea):
            if ($subtarea['estado'] == 'En proceso'): ?>
                <div class="space-y-2 mb-2">
                    <?= view_cell('SubtareaCell::mostrar', [
                        'id' => $subtarea['id'],
                        'es_dueño' => esc($es_dueño),
                        'asunto' => $subtarea['asunto'],
                        'descripcion' => $subtarea['descripcion'],
                        'estado' => $subtarea['estado'],
                        'prioridad' => $subtarea['prioridad'],
                        'fecha_vencimiento' => $subtarea['fecha_vencimiento'],
                        'fecha_recordatorio' => $subtarea['fecha_recordatorio'],
                        'usuario' => $subtarea['id_responsable'],
                        'color' => $subtarea['color'],
                        'id_tarea' => $subtarea['id_tarea'],
                    ]) ?>
                </div>
        <?php endif;
        endforeach; ?>
    </div>

    <div class="bg-gray-900 rounded-md shadow-sm p-4">
        <div class="flex justify-between items-center mb-2">
            <h4 class="font-semibold">Completado</h4>
            <?php if (esc($tarea['estado']) == 'Completada'): ?>
                <div>
                    <?= view_cell('ModalCell::archivarTarea', ['id_tarea' => esc($tarea['id'])]) ?>
                </div>
            <?php endif; ?>
        </div>
        <?php foreach (esc($subtareas) as $subtarea):
            if ($subtarea['estado'] == 'Completada'): ?>
                <div class="space-y-2 mb-2">
                    <?= view_cell('SubtareaCell::mostrar', [
                        'id' => $subtarea['id'],
                        'es_dueño' => esc($es_dueño),
                        'asunto' => $subtarea['asunto'],
                        'descripcion' => $subtarea['descripcion'],
                        'estado' => $subtarea['estado'],
                        'estado_tarea' => esc($tarea['estado']),
                        'prioridad' => $subtarea['prioridad'],
                        'fecha_vencimiento' => $subtarea['fecha_vencimiento'],
                        'fecha_recordatorio' => $subtarea['fecha_recordatorio'],
                        'usuario' => $subtarea['id_responsable'],
                        'color' => $subtarea['color'],
                        'id_tarea' => $subtarea['id_tarea'],
                    ]) ?>
                </div>
        <?php endif;
        endforeach; ?>
    </div>
</div>
</div>
<?= $this->endSection() ?>