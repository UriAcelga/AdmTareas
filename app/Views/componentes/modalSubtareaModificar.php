<!-- Modal toggle -->
<img src="<?= base_url('icons/edit.svg') ?>" alt="modificar subtarea" class="w-6 h-6 mr-4 cursor-pointer" data-modal-target="subtarea-<?= esc($id) ?>-modificar-modal" data-modal-toggle="subtarea-<?= esc($id) ?>-modificar-modal">
<!-- Main modal -->
<div id="subtarea-<?= esc($id) ?>-modificar-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Modificar Subtarea
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="subtarea-<?= esc($id) ?>-modificar-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <?= form_open('modificarSubtarea', ['id' => 'formModificarSubtarea' . esc($id), 'class' => 'p-4 md:p-5', 'method' => 'post']) ?>
            <div class="grid gap-4 mb-4 grid-cols-2">
                <?php if (session()->getFlashdata('errors')):
                    foreach (session()->getFlashdata('errors') as $error): ?>
                        <div class="text-red-500">
                            <?= $error ?>
                        </div>
                <?php endforeach;
                endif; ?>
                <div class="col-span-2">
                    <input type="hidden" name="id" value="<?= esc($id) ?>">
                    <input type="hidden" name="id_tarea" value="<?= esc($id_tarea) ?>">
                    <label for="asunto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asunto:</label>
                    <input type="text" name="asunto" id="asunto" value="<?= esc($asunto) ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Comprar globos" required="">
                    <?php if (isset(session()->getFlashdata('errors')['asunto'])): ?>
                        <div class="text-red-500 text-sm">
                            <?= session()->getFlashdata('errors')['asunto'] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-span-2">
                    <label for="prioridad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prioridad:</label>
                    <select name="prioridad" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option disabled>Seleccionar prioridad</option>
                        <option value="Baja" <?= esc($prioridad) == 'Baja' ? 'selected' : '' ?>>Baja</option>
                        <option value="Normal" <?= esc($prioridad) == 'Normal' ? 'selected' : '' ?>>Normal</option>
                        <option value="Alta" <?= esc($prioridad) == 'Alta' ? 'selected' : '' ?>>Alta</option>
                    </select>
                    <?php if (isset(session()->getFlashdata('errors')['prioridad'])): ?>
                        <div class="text-red-500 text-sm">
                            <?= session()->getFlashdata('errors')['prioridad'] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="vencimiento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de vencimiento:</label>
                    <input type="date" name="vencimiento" value="<?= esc($fecha_vencimiento) ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                    <?php if (isset(session()->getFlashdata('errors')['fecha_vencimiento'])): ?>
                        <div class="text-red-500 text-sm">
                            <?= session()->getFlashdata('errors')['fecha_vencimiento'] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="recordatorio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recordatorio: (Opcional)</label>
                    <input type="date" name="recordatorio" value="<?= esc($fecha_recordatorio) ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <?php if (isset(session()->getFlashdata('errors')['fecha_recordatorio'])): ?>
                        <div class="text-red-500 text-sm">
                            <?= session()->getFlashdata('errors')['fecha_recordatorio'] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-span-2">
                    <?php if (isset(session()->getFlashdata('errors')['color'])): ?>
                        <div class="text-red-500 text-sm">
                            <?= session()->getFlashdata('errors')['color'] ?>
                        </div>
                    <?php endif; ?>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Color:</label>
                    <div class="flex flex-row gap-4 flex-wrap">
                        <div class="flex flex-row gap-4 w-full">
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="color" value="red" class="accent-red-500" <?= esc($color) == 'to-red-500' ? 'checked' : '' ?> required>
                                <span class="text-red-500">Rojo</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="color" value="green" class="accent-green-500" <?= esc($color) == 'to-green-500' ? 'checked' : '' ?> required>
                                <span class="text-green-500">Verde</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="color" value="indigo" class="accent-indigo-500" <?= esc($color) == 'to-indigo-500' ? 'checked' : '' ?> required>
                                <span class="text-blue-500">Azul</span>
                            </label>
                        </div>
                        <div class="flex flex-row gap-4 w-full mt-2">
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="color" value="purple" class="accent-purple-600" <?= esc($color) == 'to-purple-600' ? 'checked' : '' ?> required>
                                <span class="text-purple-600">Purp</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="color" value="yellow" class="accent-yellow-500" <?= esc($color) == 'to-yellow-500' ? 'checked' : '' ?> required>
                                <span class="text-yellow-500">Amar</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="color" value="pink" class="accent-pink-400" <?= esc($color) == 'to-pink-400' ? 'checked' : '' ?> required>
                                <span class="text-pink-400">Rosa</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-span-2">
                    <?php if (isset(session()->getFlashdata('errors')['descripcion'])): ?>
                        <div class="text-red-500 text-sm">
                            <?= session()->getFlashdata('errors')['descripcion'] ?>
                        </div>
                    <?php endif; ?>
                    <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción: (opcional)</label>
                    <textarea name="descripcion" rows="4" maxlength="100" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Al menos 100"><?= esc($descripcion) ?></textarea>
                </div>
            </div>
            <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
                Modificar Subtarea
            </button>
            <?= form_close() ?>
        </div>
    </div>
</div>