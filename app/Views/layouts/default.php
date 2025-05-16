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
</body>

</html>