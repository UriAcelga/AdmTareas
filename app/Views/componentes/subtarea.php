<div class="relative flex bg-gray-800 rounded-md p-3">
    <div class="w-1 bg-<?= esc($color) ?> rounded-l-md absolute left-0 top-0 bottom-0"></div>
    <div class="flex-1 pl-3">
        <p class="font-semibold"><?= esc($asunto) ?></p>
        <div class="text-gray-400 text-xs mb-1">
            <?= esc($descripcion) ?>
        </div>
        <div class="flex justify-between items-center text-sm text-gray-600">
            <div class="flex items-center space-x-2">
            <img src="<?= base_url('icons/icon_user.svg') ?>" alt="Icono de usuario" class="w-4 h-4">
            <span><?= esc($usuario) ?></span>
            </div>
            <div class="flex items-center space-x-2">
            <?php if ($prioridad == 'Baja'): ?>
                <span class="px-3 py-1 border border-gray-200 bg-gray-300 rounded-full text-sm min-w-[70px] text-center inline-block">Baja</span>
            <?php elseif ($prioridad == 'Normal'): ?>
                <span class="px-3 py-1 border border-yellow-700 bg-yellow-100 text-yellow-700 rounded-full text-sm">Normal</span>
            <?php else: ?>
                <span class="px-3 py-1 border border-red-600 bg-red-100 text-red-600 min-w-[70px] text-center inline-block rounded-full text-sm">Alta</span>
            <?php endif; ?>
            <img src="<?= base_url('icons/timer.svg') ?>" alt="fecha" class="w-4 h-4">
            <span><?= esc($fecha) ?></span>
            </div>
        </div>
    </div>
</div>