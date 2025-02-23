<div>
    <h1>Formulario para crear enlaces</h1>
    <form action="<?= site_url('dashboard/postLink') ?>" method="post">
        <?= csrf_field() ?>
        <div class="d-flex gap-2">
            <input type="text" class="form-control" name="url" placeholder="Ingrese la URL" required>
            <button type="submit" class="btn btn-success">Añadir</button>
        </div>
    </form>
</div>