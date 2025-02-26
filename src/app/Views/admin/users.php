<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>
<div class="flex-row space-y-6">
    <div>
        <h1 class="text-3xl font-semibold text-gray-800">Listado de usuarios</h1>
    </div>

    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="min-w-full table-auto">
            <thead class="text-white bg-gray-800">
                <tr>
                    <th class="px-4 py-2">Username</th>
                    <th class="px-4 py-2">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->data['users'] as $user): ?>
                    <tr class="border-b">
                        <td class="px-4 py-2"><?= htmlspecialchars($user['username']) ?></td>
                        <td class="px-4 py-2"><?= htmlspecialchars($user['email']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?= $this->data['pager']->links('default', 'tailwindCSS') ?>
</div>

<?= $this->endSection() ?>