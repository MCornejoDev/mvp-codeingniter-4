<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>
<h1 class="mb-5">Listado de usuarios</h1>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Username</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users['users'] as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['username']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= view('layouts/pagination', ['pager' => $users['pager']]) ?>

<?= $this->endSection() ?>