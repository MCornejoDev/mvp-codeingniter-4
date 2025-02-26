<?php if (session()->getFlashdata('success')): ?>
    <div class="p-4 text-white bg-green-500 rounded-lg shadow-md">
        <?= esc(session()->getFlashdata('success')) ?>
    </div>
<?php endif; ?>