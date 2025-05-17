<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?> Mis Tareas <?= $this->endSection() ?>

<?= $this->section('nav') ?>
<?= view_cell('NavCell::mostrar', ['title' => 'Administrador de Tareas']) ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="bg-gradient-to-l from-gray-600 to-<?= esc($tarea['color']) ?> p-4 rounded-md shadow-md mb-12">
    <div class="flex justify-between items-center">
        <h2 class="text-white font-bold text-lg mb-4"><?= esc($tarea['asunto']) ?></h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-gray-900 rounded-md shadow-sm p-4">
            <h4 class="font-semibold mb-2">Definido</h4>
            <?php foreach (esc($subtareas) as $subtarea):
                if ($subtarea['estado'] == 'Definida'): ?>
                    <div class="space-y-2 mb-2">
                        <?= view_cell('SubtareaCell::mostrar', [
                            'asunto' => $subtarea['asunto'],
                            'estado' => $subtarea['estado'],
                            'prioridad' => $subtarea['prioridad'],
                            'descripcion' => $subtarea['descripcion'],
                            'usuario' => $subtarea['id_responsable'],
                            'fecha_vencimiento' => $subtarea['fecha_vencimiento'],
                            'color' => $subtarea['color']
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
                            'asunto' => $subtarea['asunto'],
                            'estado' => $subtarea['estado'],
                            'prioridad' => $subtarea['prioridad'],
                            'descripcion' => $subtarea['descripcion'],
                            'usuario' => $subtarea['id_responsable'],
                            'fecha_vencimiento' => $subtarea['fecha_vencimiento'],
                            'color' => $subtarea['color']
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
                            'asunto' => $subtarea['asunto'],
                            'estado' => $subtarea['estado'],
                            'prioridad' => $subtarea['prioridad'],
                            'descripcion' => $subtarea['descripcion'],
                            'usuario' => $subtarea['id_responsable'],
                            'fecha_vencimiento' => $subtarea['fecha_vencimiento'],
                            'color' => $subtarea['color']
                        ]) ?>
                    </div>
            <?php endif;
            endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>