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
                    <td>
                        <a href="<?= htmlspecialchars($link['url']) ?>" id="link-<?= htmlspecialchars($link['id']) ?>"
                            class="links-update-clicks">
                            <?= htmlspecialchars($link['url']) ?></a>
                    </td>
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
                        window.location.reload();
                    }
                })
                .catch(error => console.error("Error en la solicitud:", error));
        });
    }
</script>
<?= $this->endSection() ?>