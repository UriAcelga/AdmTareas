<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?> Mis Tareas <?= $this->endSection() ?>
<?= $this->section('nav') ?>
<?= view_cell('NavCell::mostrar', ['title' => 'Administrador de Tareas']) ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?php if (session()->getFlashdata('tareaBorrada')): ?>
    <div class="bg-green-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto max-w-lg">
        <svg viewBox="0 0 24 24" class="text-green-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
            <path fill="currentColor"
            d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
        </path>
    </svg>
    <span class="text-green-800">Tarea borrada correctamente</span>
</div>
    <?php endif; ?>
<div class="flex items-center mb-4 relative">
    <?= view_cell('ModalCell::crearTarea') ?>
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
    <?php foreach ($tareasPropias as $tarea): ?>
        <?= view_cell('TareaCell::mostrar', [
            'id' => $tarea['id'],
            'idDueño' => $tarea['idDueño'],
            'es_dueño' => session()->get('id_usuario') == $tarea['idDueño'],
            'asunto' => $tarea['asunto'],
            'descripcion' =>  $tarea['descripcion'],
            'prioridad' => $tarea['prioridad'],
            'estado' => $tarea['estado'],
            'color' => $tarea['color'],
            'fecha' =>  $tarea['fecha_vencimiento'],
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
    <?php foreach ($tareasColaborando as $tarea): ?>
        <?= view_cell('TareaCell::mostrar', [
            'id' => $tarea['id'],
            'idDueño' => $tarea['idDueño'],
            'es_dueño' => session()->get('id_usuario') == $tarea['idDueño'],
            'asunto' => $tarea['asunto'],
            'descripcion' =>  $tarea['descripcion'],
            'prioridad' => $tarea['prioridad'],
            'estado' => $tarea['estado'],
            'color' => $tarea['color'],
            'fecha' =>  $tarea['fecha_vencimiento'],
        ]); ?>
    <?php endforeach; ?>

</div>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php if (session()->has('errors')) : ?>
            // Obtener el elemento del modal por su ID
            const modalElement = document.getElementById('tarea-crear-modal');

            if (modalElement) {
                // Crear una instancia del modal de Flowbite
                const modal = new flowbite.Modal(modalElement);

                // Mostrar el modal
                modal.show();
            }
        <?php endif; ?>
    });
</script>
<?= $this->endSection() ?>