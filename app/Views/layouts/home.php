<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?></title>
    <link rel="stylesheet" href="<?= base_url('css/output.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-800 text-white">
    <div class="container mx-auto p-8">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold">Administrador de Tareas</h1>
            <button type="button" class="flex items-center space-x-2" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" data-drawer-placement="right" aria-controls="drawer-navigation">
                <span
                    style="position: relative; display: inline-block; cursor: pointer;">
                    <img src="<?= base_url('icons/mail.svg') ?>" alt="notificaciones" class="w-8 h-8" style="color:white;">
                    <span style="position: absolute; top: 0; right: 0; width: 14px; height: 14px; background: red; border-radius: 50%; border: 2px solid white; z-index: 10;"></span>
                </span>
            </button>
        </div>



        <!-- drawer component -->
        <div id="drawer-navigation" class="fixed top-0 right-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-navigation-label" data-drawer-placement="right">
            <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">Notificaciones</h5>
            <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div class="py-4 overflow-y-auto">
                <ul class="space-y-2 font-medium">
                    <!-- ... menu items ... -->
                    <li class="bg-gray-700 rounded-lg shadow p-2 flex flex-col space-y-2">
                        <div>
                            <p class="text-sm font-medium text-white">Notificación dinámica</p>
                            <p class="text-xs text-gray-400">Aquí va la descripción o el dato dinámico.</p>
                        </div>
                        <div class="flex flex-col space-y-2 mt-2">
                            <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs">Aceptar</button>
                            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">Rechazar</button>
                        </div>
                    </li>
                    
                    <li class="bg-gray-700 rounded-lg shadow p-2 flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-white">Notificación dinámica</p>
                            <p class="text-xs text-gray-400">Aquí va la descripción o el dato dinámico.</p>
                        </div>
                    </li>
                </ul>
                
            </div>
        </div>


        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold">Mis Tareas</h2>
            <div class="inline-flex rounded-full bg-gray-700 p-1">
                <button class="px-4 py-2 rounded-full focus:outline-none font-bold text-sm transition-colors bg-blue-900 text-white" id="toggle-active">
                    Activas
                </button>
                <button class="px-4 py-2 rounded-full focus:outline-none font-bold text-sm transition-colors text-gray-300 hover:text-white hover:bg-blue-600" id="toggle-archived">
                    Archivadas
                </button>
            </div>
            <script>
                // Simple toggle logic (optional, for UI feedback)
                document.getElementById('toggle-active').addEventListener('click', function() {
                    this.classList.add('bg-blue-900', 'text-white');
                    this.classList.remove('text-gray-300', 'hover:bg-blue-600');
                    document.getElementById('toggle-archived').classList.remove('bg-blue-900', 'text-white');
                    document.getElementById('toggle-archived').classList.add('text-gray-300');
                });
                document.getElementById('toggle-archived').addEventListener('click', function() {
                    this.classList.add('bg-blue-900', 'text-white');
                    this.classList.remove('text-gray-300', 'hover:bg-blue-600');
                    document.getElementById('toggle-active').classList.remove('bg-blue-900', 'text-white');
                    document.getElementById('toggle-active').classList.add('text-gray-300');
                });
            </script>
        </div>

        <?= view_cell('TareaCell::mostrar', [
            'nombre' => 'Tarea 1',
            'color' => 'red-500'
        ]); ?>

        <?= view_cell('TareaCell::mostrar', [
            'nombre' => 'Tarea 1',
            'color' => 'green-500'
        ]) ?>

        <?= view_cell('TareaCell::mostrar', [
            'nombre' => 'Tarea 1',
            'color' => 'indigo-500'
        ]) ?>

        <?= view_cell('TareaCell::mostrar', [
            'nombre' => 'Tarea 1',
            'color' => 'purple-600'
        ]) ?>

        <?= view_cell('TareaCell::mostrar', [
            'nombre' => 'Tarea 1',
            'color' => 'pink-400'
        ]) ?>

        <?= view_cell('TareaCell::mostrar', [
            'nombre' => 'Tarea 1',
            'color' => 'yellow-500'
        ]) ?>



        <div class="mt-4 flex justify-end items-center space-x-4 text-sm text-gray-600">
            <button class="hover:text-gray-800">Filter <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 inline-block align-middle">
                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                </svg></button>
            <button class="hover:text-gray-800">Sort <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 inline-block align-middle">
                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                </svg></button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>

</html>