<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>URL</th>
                <th>URL corto</th>
                <th>Clicks</th>
                <th>Creador</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($links as $link): ?>
                <tr>
                    <td><?= htmlspecialchars($link['url']) ?></td>
                    <td><?= htmlspecialchars($link['url_short']) ?></td>
                    <td><?= htmlspecialchars($link['clicks']) ?></td>
                    <td><?= htmlspecialchars($link['user']['username']) ?> (<?= htmlspecialchars($link['user']['email']) ?>)</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>