<div class="bg-gradient-to-l from-gray-600 to-<?= esc($color) ?> p-4 rounded-md shadow-md mb-12">
    <div class="flex justify-between items-center" onclick="toggleVisibility(this)">
        <h2 class="text-white font-bold text-lg mb-4"><?= esc($nombre) ?></h2>
        <img src="<?= base_url('icons/expand.svg') ?>" alt="Expandir tarea"class="w-8 h-8 mb-4">
        <script>
            function toggleVisibility(img) {
                const parentDiv = img.closest('.bg-gradient-to-l');
                const contentDivs = parentDiv.querySelectorAll('.grid');
                contentDivs.forEach(div => {
                    div.style.display = div.style.display === 'none' ? 'grid' : 'none';
                });
            }
        </script>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-gray-900 rounded-md shadow-sm p-4">
            <h4 class="font-semibold mb-2">Definido</h4>
            <div class="space-y-2 mb-2">
                <?= view_cell('SubtareaCell::mostrar', 'title=Amasar pan, prioridad=Alta,fecha=May 5') ?>
            </div>
            <div class="space-y-2 mb-2">
                <?= view_cell('SubtareaCell::mostrar', 'title=Comprar huevos, prioridad=Media,fecha=Feb 25') ?>
            </div>
            <div class="space-y-2 mb-2">
                <?= view_cell('SubtareaCell::mostrar', 'title=Comprar aceite, prioridad=Baja,fecha=Mar 17') ?>
            </div>
        </div>

        <div class="bg-gray-900 rounded-md shadow-sm p-4">
            <h4 class="font-semibold mb-2">En Progreso</h4>
            <div class="space-y-2 mb-2">
                <?= view_cell('SubtareaCell::mostrar', 'title=Amasar pan, prioridad=Alta,fecha=May 5') ?>
            </div>
            <div class="space-y-2 mb-2">
                <?= view_cell('SubtareaCell::mostrar', 'title=Comprar huevos, prioridad=Media,fecha=Feb 25') ?>
            </div>
            <div class="space-y-2 mb-2">
                <?= view_cell('SubtareaCell::mostrar', 'title=Comprar aceite, prioridad=Baja,fecha=Mar 17') ?>
            </div>
        </div>

        <div class="bg-gray-900 rounded-md shadow-sm p-4">
            <h4 class="font-semibold mb-2">Finalizado</h4>
            <div class="space-y-2 mb-2">
                <?= view_cell('SubtareaCell::mostrar', 'title=Amasar pan, prioridad=Alta,fecha=May 5') ?>
            </div>
            <div class="space-y-2 mb-2">
                <?= view_cell('SubtareaCell::mostrar', 'title=Comprar huevos, prioridad=Media,fecha=Feb 25') ?>
            </div>
            <div class="space-y-2 mb-2">
                <?= view_cell('SubtareaCell::mostrar', 'title=Comprar aceite, prioridad=Baja,fecha=Mar 17') ?>
            </div>
        </div>
    </div>
</div>