<div class="flex items-center justify-between mb-12">
    <h1 class="text-2xl font-bold"><?= esc($title) ?></h1>
    <div class="flex items-center space-x-4">
        <button type="button" class="hover:underline" onclick="window.location.href='<?= base_url('logout') ?>'">Cerrar sesión</button>
        <button type="button" class="ml-12 flex items-center space-x-2" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" data-drawer-placement="right" aria-controls="drawer-navigation">
            <span
                style="position: relative; display: inline-block; cursor: pointer;">
                <img src="<?= base_url('icons/mail.svg') ?>" alt="notificaciones" class="w-8 h-8" style="color:white;">
                <?php if (esc($hayPendientes)): ?>
                    <span style="position: absolute; top: 0; right: 0; width: 14px; height: 14px; background: red; border-radius: 50%; border: 2px solid white; z-index: 10;"></span>
                <?php endif; ?>
            </span>
        </button>
    </div>
</div>



<!-- drawer component -->
<div id="drawer-navigation" class="fixed top-0 right-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-navigation-label" data-drawer-placement="right">
    <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">Notificaciones</h5>
    <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Cerrar Menú</span>
    </button>
    <div class="py-4 overflow-y-auto">
        <ul class="space-y-2 font-medium">
            <!-- ... menu items ... -->
            <?php /* if (!empty($notifs)):
                foreach (esc($notifs) as $notif):
                    if ($notif['leido'] == 0):*/ ?>
                        <li class="bg-gray-700 rounded-lg shadow p-2 flex flex-col space-y-2">
                            <div>
                                <p class="text-sm font-medium text-white">Notificación dinámica</p>
                                <p class="text-xs text-gray-400">Aquí va la descripción o el dato dinámico.</p>
                            </div>
                            <div class="flex flex-col space-y-2 mt-2">
                                <button onclick="window.location.href='<?= base_url('aceptarNotif') ?>'" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs">Aceptar</button>
                                <button onclick="window.location.href='<?= base_url('rechazarNotif') ?>'" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">Rechazar</button>
                            </div>
                        </li>
            <?php /* endif;
                endforeach;
            endif;*/ ?>
        </ul>

    </div>
</div>