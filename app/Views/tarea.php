<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?> Mis Tareas <?= $this->endSection() ?>

<?= $this->section('nav') ?>
<?= view_cell('NavCell::mostrar', ['title' => 'Administrador de Tareas']) ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<a href="<?= base_url('home') ?>" class="text-white font-bold text-xl hover:underline"><<< Volver a Principal</a>
<div class="bg-gradient-to-l from-gray-600 to-<?= esc($tarea['color']) ?> p-4 rounded-md shadow-md my-8">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-white font-bold text-lg"><?= esc($tarea['asunto']) ?></h2>
        <img src="<?= base_url('icons/edit.svg') ?>" alt="modificar tarea" class="w-6 h-6 mr-4">
        <?= null // view_cell('ModalCell::modificarTarea') ?>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-gray-900 rounded-md shadow-sm p-4 min-h-[250px]">
            <h4 class="font-semibold mb-2">Definido</h4>
            <?php foreach (esc($subtareas) as $subtarea):
                if ($subtarea['estado'] == 'Definida'): ?>
                    <div class="space-y-2 mb-2">
                        <?= view_cell('SubtareaCell::mostrar', [
                            'id' => $subtarea['id'],
                            'es_dueño' => esc($tarea['idDueño']) ? esc($tarea['idDueño']) == session()->get('id_usuario') : false,
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
                            'es_dueño' => esc($tarea['idDueño']) ? esc($tarea['idDueño']) == session()->get('id_usuario') : false,
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
            <h4 class="font-semibold mb-2">Finalizado</h4>
            <?php foreach (esc($subtareas) as $subtarea):
                if ($subtarea['estado'] == 'Finalizada'): ?>
                    <div class="space-y-2 mb-2">
                        <?= view_cell('SubtareaCell::mostrar', [
                            'id' => $subtarea['id'],
                            'es_dueño' => esc($tarea['idDueño']) ? esc($tarea['idDueño']) == session()->get('id_usuario') : false,
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
    </div>
</div>
<?= $this->endSection() ?>