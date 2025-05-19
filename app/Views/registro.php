<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="<?= base_url('css/output.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="icon" href="<?= base_url('icons/mail.svg') ?>"></link>
    <meta charset="UTF-8">
</head>

<body class="bg-gray-800 text-white">
    <div class="flex items-center justify-center min-h-screen">
        <div class="flex w-full max-w-4xl">
            <div class="bg-gray-900 rounded-lg shadow-lg p-8 pb-12 w-full max-w-md flex-shrink-0 mr-8">
                <h2 class="text-2xl font-bold mb-6 text-center">Registrar Usuario</h2>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="text-red-500">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url('registrar') ?>" method="post" class="space-y-5 mb-4" id="form-registro">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium">Correo electrónico:</label>
                        <input type="email" id="email" name="email" value="<?= old('email') ?>" required class="w-full px-4 py-2 rounded-md bg-gray-800 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        <span id="email-error" class="text-red-500 text-sm hidden">Por favor, introduce un correo electrónico válido.</span>
                        <?php if (isset(session()->getFlashdata('errors')['email'])): ?>
                            <div class="text-red-500 text-sm">
                                <?= session()->getFlashdata('errors')['email'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label for="pwd" class="block mb-2 text-sm font-medium">Contraseña:</label>
                        <input type="password" id="pwd" name="pwd" required minlength="8" maxlength="30" class="w-full px-4 py-2 rounded-md bg-gray-800 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        <span id="pwd-error" class="text-red-500 text-sm hidden">La contraseña debe tener entre 8 y 30 caracteres.</span>

                        <?php if (isset(session()->getFlashdata('errors')['pwd'])): ?>
                            <div class="text-red-500 text-sm">
                                <?= session()->getFlashdata('errors')['pwd'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <button type="button" class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 rounded-md font-semibold" id="submit-btn" onclick="validar_form()">Crear Cuenta</button>

                </form>
                <span class="block text-sm font-medium">Ya tenés cuenta?
                    <a href="<?= base_url('') ?>" class="text-blue-500 hover:underline">Iniciar Sesión</a>
                </span>
            </div>
            <div class="flex flex-col justify-center items-center flex-1">
                <h1 class="text-4xl font-extrabold mb-4 text-center">Administrador de tareas</h1>
                <div class="bg-gray-900 rounded-md shadow-sm p-4">
                    <div class="space-y-2 mb-2">
                        <?= view_cell('SubtareaCell::mostrar', [
                            'asunto' => 'Interfaz simple',
                            'descripcion' => 'Para organizar tu trabajo como gustes',
                            'fecha_vencimiento' => '2025/30/6',
                            'color' => 'green-500'
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function validar_form() {
            const form = document.getElementById('form-registro');
            const emailInput = document.getElementById('email');
            const pwdInput = document.getElementById('pwd');
            let valid = true;
            document.getElementById('email-error').classList.add('hidden');
            document.getElementById('pwd-error').classList.add('hidden');

            if (!emailInput.checkValidity()) {
                document.getElementById('email-error').classList.remove('hidden');
                valid = false;
            }
            if (!pwdInput.checkValidity()) {
                document.getElementById('pwd-error').classList.remove('hidden');
                valid = false;
            }
            if (valid) {
                form.submit();
            }
        }
    </script>
</body>

</html>