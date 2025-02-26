<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>
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
            <?php foreach ($links['links'] as $link): ?>
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
<?= view('components/pagination', ['pager' => $links['pager']]) ?>
<script>
    let links = document.querySelectorAll('.links-update-clicks');

    for (let i = 0; i < links.length; i++) {
        links[i].addEventListener('click', function(e) {
            e.preventDefault();
            let link_id = this.getAttribute('id').replace('link-', '');

            fetch('/dashboard/updateClicks', {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-Requested-With": "XMLHttpRequest"
                    },
                    body: JSON.stringify({
                        link_id: link_id
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success") {
                        window.open(this.href, '_blank');
                        window.location.reload();
                    }
                })
                .catch(error => console.error("Error en la solicitud:", error));
        });
    }
</script>
<?= $this->endSection() ?>