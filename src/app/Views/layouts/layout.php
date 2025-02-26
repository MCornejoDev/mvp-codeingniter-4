<!doctype html>
<html>

<head>
    <title><?= $this->renderSection('page_title', true) ?></title>
    <link rel="stylesheet" href="<?= base_url('css/output.css') ?>">
</head>

<body class="flex flex-col min-h-screen">

    <!-- Header -->
    <?= $this->include('layouts/header') ?>

    <!-- Mensajes -->
    <div class="w-full max-w-4xl mx-auto mt-4">
        <?= $this->include('components/messages') ?>
    </div>

    <!-- Contenido Principal -->
    <main class="flex-1 px-4 mt-5">
        <div class="container mx-auto text-center">
            <?= $this->renderSection('content') ?>
        </div>
    </main>

    <!-- Footer -->
    <?= $this->include('layouts/footer') ?>

</body>

</html>