<button class="bg-green-600 text-white px-4 py-4 font-bold rounded hover:bg-green-700 mr-4 cursor-pointer" data-modal-target="modal-invitacion" data-modal-toggle="modal-invitacion">
    <span class="flex items-center">
        <img src="<?= base_url('icons/add.svg') ?>" alt="invitarColaborador"  class="w-6 h-6 checkbox-unchecked mr-2">
        Invitar un Colaborador
    </span>
</button>
<!-- Main modal -->
<div id="modal-invitacion" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Invita un colaborador
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="modal-invitacion">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <?= form_open('invitarColaborador', ['id' => 'formCrearSubtarea', 'class' => 'p-4 md:p-5', 'method' => 'post']) ?>
            <input type="hidden" name="id_tarea" value="<?= esc($id_tarea) ?>">
            <input type="hidden" name="email_dueño" value="<?= esc($email_dueño) ?>">

            <div class="col-span-2">
                <label for="colaborador" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email colaborador:</label>
                <input type="text" name="colaborador" id="colaborador" value="<?= old('colaborador') ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 mb-4" placeholder="persona@ejemplo.com" required="">
                <?php if ($error = session()->getFlashdata('colaborador')): ?>
                    <div class="text-red-500 text-sm">
                        <?= $error ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                    Invitar
                </button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>