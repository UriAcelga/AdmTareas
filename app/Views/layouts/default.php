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
        <?= $this->renderSection('nav') ?>

        <?= $this->renderSection('content') ?>


        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    
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
        document.getElementById('toggle-active-2').addEventListener('click', function() {
            this.classList.add('bg-blue-900', 'text-white');
            this.classList.remove('text-gray-300', 'hover:bg-blue-600');
            document.getElementById('toggle-archived-2').classList.remove('bg-blue-900', 'text-white');
            document.getElementById('toggle-archived-2').classList.add('text-gray-300');
        });
        document.getElementById('toggle-archived-2').addEventListener('click', function() {
            this.classList.add('bg-blue-900', 'text-white');
            this.classList.remove('text-gray-300', 'hover:bg-blue-600');
            document.getElementById('toggle-active-2').classList.remove('bg-blue-900', 'text-white');
            document.getElementById('toggle-active-2').classList.add('text-gray-300');
        });
    </script>
    <?= $this->renderSection('scripts') ?>
</body>

</html>