<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>
<h1 class="mb-5">Listado de enlaces</h1>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>URL</th>
                <th>Clicks</th>
                <?php if (session()->get('is_admin')): ?>
                    <th>URL corto</th>
                    <th>Creador</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($links['links'] as $link): ?>
                <tr>
                    <td><?= htmlspecialchars($link['url']) ?></td>
                    <td><?= htmlspecialchars($link['clicks']) ?></td>
                    <?php if (session()->get('is_admin')): ?>
                        <td><?= htmlspecialchars($link['url_short']) ?></td>
                        <td><?= htmlspecialchars($link['user']['username']) ?> (<?= htmlspecialchars($link['user']['email']) ?>)</td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= view('layouts/pagination', ['pager' => $links['pager']]) ?>
<?= $this->endSection() ?>