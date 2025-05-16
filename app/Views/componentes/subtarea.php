<div class="bg-gray-800 rounded-md p-3">
    <p class="font-semibold"><?= esc($title) ?></p>
    <div class="flex justify-between items-center text-sm text-gray-600">
        <div class="flex items-center space-x-2">
            <img src="<?= base_url('icons/icon_user.svg') ?>" alt="Icono de usuario" class="w-4 h-4">
            <span><?= esc($usuario) ?></span>
        </div>
        <div class="flex items-center space-x-2">
            <div class="bg-gray-700 rounded-full px-2 py-1 text-gray-300">
                <span><?= esc($prioridad) ?></span>
            </div>
            <img src="<?= base_url('icons/timer.svg') ?>" alt="fecha" class="w-4 h-4">
            <span><?= esc($fecha) ?></span>
        </div>
    </div>
</div>