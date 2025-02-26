<?php $field = $field ?? ''; ?>

<?php if (session()->has('errors')): ?>
    <div class="font-bold text-red-500">
        <?= esc(session('errors')[$field]) ?>
    </div>
<?php endif; ?>