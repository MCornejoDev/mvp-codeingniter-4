<!doctype html>
<html>

<head>
    <title><?= $this->renderSection('page_title', true) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content {
            flex: 1;
        }
    </style>
</head>

<body>
    <?= $this->include('layouts/header') ?>
    <div class="content container text-center mt-5"><?= $this->renderSection('content') ?></div>
    <?= $this->include('layouts/footer') ?>
</body>

</html>