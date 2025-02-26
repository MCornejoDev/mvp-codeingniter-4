<div>
    <h1 class="mb-4 text-3xl font-semibold text-gray-800">Formulario para crear enlaces</h1>
    <form action="<?= site_url('dashboard/postLink') ?>" method="post">
        <?= csrf_field() ?>
        <div class="flex gap-2 mb-4">
            <input type="text" name="url" placeholder="Ingrese la URL" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" class="px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                Añadir
            </button>
        </div>
        <?= view('components/input-errors', ['field' => 'url']) ?>
    </form>
</div>