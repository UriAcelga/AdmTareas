<a href="<?= base_url('tareas/' . esc($id)) ?>" class="block">
    <div class="bg-gradient-to-l from-gray-600 to-<?= esc($color) ?> p-4 rounded-md shadow-md mb-12 mx-4 cursor-pointer transition hover:shadow-lg">
        <div class="flex flex-col justify-between items-start w-full lg:w-1/2 min-h-[6rem]">
            <div class="flex justify-between w-full mb-4">
                <h2 class="text-white font-bold text-lg"><?= esc($asunto) ?></h2>
                <div class="flex items-center space-x-2">
                    <span class="text-white text-sm">Prioridad: </span>
                    <?php if ($prioridad == 'Baja'): ?>
                        <span class="px-3 py-1 border border-gray-200 rounded-full text-sm min-w-[70px] text-center inline-block">Baja</span>
                    <?php elseif ($prioridad == 'Normal'): ?>
                        <span class="px-3 py-1 border border-yellow-300 text-yellow-300 rounded-full text-sm">Normal</span>
                    <?php else: ?>
                        <span class="px-3 py-1 border border-red-400 text-red-400 min-w-[70px] text-center inline-block rounded-full text-sm">Alta</span>
                    <?php endif; ?>
                    <span class="text-white text-sm"><?= esc($fecha) ?></span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
            <p><?= esc($descripcion) ?></p>
        </div>
    </div>
</a>