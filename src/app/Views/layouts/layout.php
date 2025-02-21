<!doctype html>
<html>

<head>
    <title><?= $this->renderSection('page_title', true) ?></title>
</head>

<body>
    <?= $this->include('layouts/header') ?>
    <div><?= $this->renderSection('content') ?></div>
    <?= $this->include('layouts/footer') ?>
</body>

</html>