<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>

<div class="flex-row space-y-5">
    <h1 class="mb-5 text-3xl font-semibold text-gray-800">Listado de enlaces</h1>
    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="min-w-full table-auto">
            <thead class="text-white bg-gray-800">
                <tr>
                    <th class="px-4 py-2">URL</th>
                    <th class="px-4 py-2">URL corta</th>
                    <th class="px-4 py-2">Clicks</th>
                    <?php if (session()->get('is_admin')): ?>
                        <th class="px-4 py-2">Creador</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->data['links'] as $link): ?>
                    <tr>
                        <td class="px-4 py-2">
                            <a href="<?= htmlspecialchars($link['url']) ?>" id="link-<?= htmlspecialchars($link['id']) ?>"
                                class="links-update-clicks">
                                <?= htmlspecialchars($link['url']) ?></a>
                        </td>
                        <td class="px-4 py-2">
                            <a href="<?= site_url('s/' . $link['url_short']) ?>" id="link-<?= htmlspecialchars($link['id']) ?>">
                                <?= htmlspecialchars($link['url_short']) ?></a>
                        </td>
                        <td class="px-4 py-2"><?= htmlspecialchars($link['clicks']) ?></td>
                        <?php if (session()->get('is_admin')): ?>
                            <td class="px-4 py-2"><?= htmlspecialchars($link['user']['username']) ?> (<?= htmlspecialchars($link['user']['email']) ?>)</td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $this->data['pager']->links('default', 'pagination_tailwind') ?>
</div>

<script src="<?= site_url('js/links.js') ?>"></script>
<?= $this->endSection() ?>