<div class="relative flex bg-gray-800 rounded-md p-3 min-h-[120px]">
    <div class="w-1 <?= 'bg-' . str_replace('to-', "", esc($color)) ?> rounded-l-md absolute left-0 top-0 bottom-0"></div>
    <div class="flex-1 pl-3">
        <div class="flex justify-between items-center mb-1">
            <p class="font-semibold"><?= esc($asunto) ?></p>
            <?php if (esc($es_dueño)):   ?>
                <div class="flex space-x-2 ml-auto">
                    <?= view_cell('ModalCell::modificarSubtarea', [
                        'id' => esc($id),
                        'id_tarea' => esc($id_tarea),
                        'asunto' => esc($asunto),
                        'descripcion' => esc($descripcion),
                        'prioridad' => esc($prioridad),
                        'fecha_vencimiento' => esc($fecha_vencimiento),
                        'fecha_recordatorio' => esc($fecha_recordatorio),
                        'color' => esc($color),
                    ]) ?>
                    <?= view_cell('ModalCell::borrarSubtarea', ['id' => esc($id), 'id_tarea' => esc($id_tarea)]) ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="text-gray-400 text-xs mb-1 min-h-[30px]">
            <?= esc($descripcion) ?>
        </div>
        <div class="flex justify-between items-center text-sm text-gray-600">
            <?php if (esc($estado) == 'Definida' && esc($es_dueño)): ?>
                <?= form_open('desarrollarSubtarea', ['id' => 'desarrollarForm', 'method' => 'post']) ?>
                <input type="hidden" name="id" value="<?= esc($id) ?>">
                <input type="hidden" name="id_tarea" value="<?= esc($id_tarea) ?>">
                <button type="submit" class="flex items-center space-x-2 cursor-pointer bg-transparent border-none p-0 m-0 focus:outline-none" style="background: none;">
                    <img src="<?= base_url('icons/right-arrow.svg') ?>" alt="desarrollar" class="w-4 h-4 checkbox-unchecked">
                    <span class="font-semibold">Desarrollar</span>
                </button>
                <?= form_close() ?>
            <?php elseif (esc($estado) == 'En proceso'): ?>
                <?= form_open('completarSubtarea', ['id' => 'completarForm', 'method' => 'post']) ?>
                <input type="hidden" name="id" value="<?= esc($id) ?>">
                <input type="hidden" name="id_tarea" value="<?= esc($id_tarea) ?>">
                <button type="submit" class="flex items-center space-x-2 cursor-pointer bg-transparent border-none p-0 m-0 focus:outline-none" style="background: none;">
                    <img src="<?= base_url('icons/checkbox-unchecked.svg') ?>" alt="checkboxCompletar" class="w-4 h-4 checkbox-unchecked">
                    <span class="font-semibold">Completar</span>
                </button>
                <?= form_close() ?>
            <?php else: ?>
                <?= form_open('subtareaAlBacklog', ['id' => 'alBacklogForm', 'method' => 'post']) ?>
                <input type="hidden" name="id" value="<?= esc($id) ?>">
                <input type="hidden" name="id_tarea" value="<?= esc($id_tarea) ?>">
                <button type="submit" class="flex items-center space-x-2 cursor-pointer bg-transparent border-none p-0 m-0 focus:outline-none" style="background: none;">
                    <img src="<?= base_url('icons/left-arrow.svg') ?>" alt="checkboxCompletar" class="w-4 h-4 checkbox-unchecked">
                    <span class="font-semibold">Al Backlog</span>
                </button>
                <?= form_close() ?>
            <?php endif; ?>
            
            <?php if (esc($estado) != 'Completada'): ?>
            <div class="flex items-center space-x-2">
                <?php if ($prioridad == 'Baja'): ?>
                    <span class="px-3 py-1 border border-gray-200 bg-gray-300 rounded-full text-sm min-w-[70px] text-center inline-block">Baja</span>
                <?php elseif ($prioridad == 'Normal'): ?>
                    <span class="px-3 py-1 border border-yellow-700 bg-yellow-100 text-yellow-700 rounded-full text-sm">Normal</span>
                <?php else: ?>
                    <span class="px-3 py-1 border border-red-600 bg-red-100 text-red-600 min-w-[70px] text-center inline-block rounded-full text-sm">Alta</span>
                <?php endif; ?>
                <img src="<?= base_url('icons/timer.svg') ?>" alt="fecha" class="w-4 h-4">
                <span><?= esc($fecha_vencimiento) ?></span>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>