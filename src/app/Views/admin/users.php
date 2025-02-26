<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>
<h1 class="mb-5 text-3xl font-semibold text-gray-800">Listado de usuarios</h1>

<div class="overflow-x-auto bg-white rounded-lg shadow-md">
    <table class="min-w-full table-auto">
        <thead class="text-white bg-gray-800">
            <tr>
                <th class="px-4 py-2">Username</th>
                <th class="px-4 py-2">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users['users'] as $user): ?>
                <tr class="border-b">
                    <td class="px-4 py-2"><?= htmlspecialchars($user['username']) ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($user['email']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= view('components/pagination', ['pager' => $users['pager']]) ?>

<?= $this->endSection() ?>