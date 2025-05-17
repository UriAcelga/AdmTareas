<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="<?= base_url('css/output.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <meta charset="UTF-8">
</head>

<body class="bg-gray-800 text-white">
    <h1 class="text-4xl font-extrabold text-center my-8 mb-12">Administrador de tareas</h1>
    <div class="flex items-center justify-center">
        <div class="bg-gray-900 rounded-lg shadow-lg p-8 pb-12 w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Iniciar Sesión</h2>
            
            <?php if (session()->getFlashdata('error')): ?>
                <div class="text-red-500">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            <form action="<?= base_url('auth') ?>" method="post" class="space-y-5 mb-4">
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium">Correo electrónico:</label>
                    <input type="email" id="email" name="email" required class="w-full px-4 py-2 rounded-md bg-gray-800 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <div>
                    <label for="pwd" class="block mb-2 text-sm font-medium">Contraseña:</label>
                    <input type="password" id="pwd" name="pwd" required minlength="8" maxlength="30" class="w-full px-4 py-2 rounded-md bg-gray-800 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <button type="submit" class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 rounded-md font-semibold">Entrar</button>
            </form>
            <span class="block text-sm font-medium">No estás registrado? 
                <a href="<?= base_url('registro') ?>" class="text-blue-500 hover:underline">Crear cuenta</a>
            </span>
        </div>
    </div>
</body>

</html>