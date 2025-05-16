<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?> Mis Tareas <?= $this->endSection() ?>
<?= $this->section('nav') ?>
    <?= view_cell('NavCell::mostrar', ['title' => 'Administrador de Tareas']) ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="flex items-center mb-4 relative">
            <div class="absolute left-1/2 transform -translate-x-1/2">
            <h2 class="text-xl font-semibold">Mis Tareas</h2>
            </div>
            <div class="inline-flex rounded-full bg-gray-700 p-1 ml-auto">
            <button class="px-4 py-2 rounded-full focus:outline-none font-bold text-sm transition-colors bg-blue-900 text-white" id="toggle-active">
                Activas
            </button>
            <button class="px-4 py-2 rounded-full focus:outline-none font-bold text-sm transition-colors text-gray-300 hover:text-white hover:bg-blue-600" id="toggle-archived">
                Archivadas
            </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-16">
            <?php foreach($tareasPropias as $tarea): ?>
            <?= view_cell('TareaCell::mostrar', [
            'asunto' => $tarea['asunto'],
            'color' => $tarea['color'],
            'prioridad' => $tarea['prioridad'],
            'fecha' =>  $tarea['fecha_vencimiento'],
            'descripcion' =>  $tarea['descripcion']
            ]); ?>
            <?php endforeach; ?>

        </div>

        <div class="flex items-center mb-4 relative">
            <div class="absolute left-1/2 transform -translate-x-1/2">
            <h2 class="text-xl font-semibold">Colaborando en</h2>
            </div>
            <div class="inline-flex rounded-full bg-gray-700 p-1 ml-auto">
            <button class="px-4 py-2 rounded-full focus:outline-none font-bold text-sm transition-colors bg-blue-900 text-white" id="toggle-active-2">
                Activas
            </button>
            <button class="px-4 py-2 rounded-full focus:outline-none font-bold text-sm transition-colors text-gray-300 hover:text-white hover:bg-blue-600" id="toggle-archived-2">
                Archivadas
            </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <?php foreach($tareasColaborando as $tarea): ?>
            <?= view_cell('TareaCell::mostrar', [
            'id' => $tarea['id'],
            'asunto' => $tarea['asunto'],
            'color' => $tarea['color'],
            'prioridad' => $tarea['prioridad'],
            'fecha' =>  $tarea['fecha_vencimiento'],
            'descripcion' =>  $tarea['descripcion']
            ]); ?>
            <?php endforeach; ?>

        </div>
<?= $this->endSection() ?>