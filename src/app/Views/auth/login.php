<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">

    <div class="w-full max-w-sm p-6 bg-white rounded-lg shadow-md card">
        <h3 class="mb-6 text-2xl font-semibold text-center text-gray-700">Iniciar sesión</h3>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="p-2 mb-4 text-red-700 bg-red-100 border border-red-400 rounded alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('login') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                <input type="email" name="email" id="email" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" name="password" id="password" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <button type="submit" class="w-full py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Ingresar
            </button>

            <p class="mt-3 text-sm text-center text-gray-600">¿No tienes cuenta? <a href="<?= site_url('register') ?>" class="text-blue-500 hover:text-blue-700">Regístrate</a></p>
        </form>
    </div>

</body>

</html>