<?php $pager->setSurroundCount(2) ?>

<div>
    <nav aria-label="Page navigation">
        <ul class="flex items-center space-x-2">
            <!-- Enlace a la primera página -->
            <?php if ($pager->hasPrevious()) : ?>
                <li>
                    <a href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        <span aria-hidden="true"><?= lang('Pager.first') ?></span>
                    </a>
                </li>
            <?php endif ?>

            <!-- Enlace a la página anterior -->
            <?php if ($pager->hasPrevious()) : ?>
                <li>
                    <a href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        <span aria-hidden="true"><?= lang('Pager.previous') ?></span>
                    </a>
                </li>
            <?php endif ?>

            <!-- Enlaces de las páginas -->
            <?php foreach ($pager->links() as $link): ?>
                <li>
                    <a href="<?= $link['uri'] ?>" class="px-4 py-2 text-sm font-medium <?= $link['active'] ? 'bg-blue-500 text-white' : 'text-gray-700 bg-white border border-gray-300' ?> rounded-lg hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        <?= $link['title'] ?>
                    </a>
                </li>
            <?php endforeach ?>

            <!-- Enlace a la página siguiente -->
            <?php if ($pager->hasNext()) : ?>
                <li>
                    <a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        <span aria-hidden="true"><?= lang('Pager.next') ?></span>
                    </a>
                </li>
            <?php endif ?>

            <!-- Enlace a la última página -->
            <?php if ($pager->hasNext()) : ?>
                <li>
                    <a href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        <span aria-hidden="true"><?= lang('Pager.last') ?></span>
                    </a>
                </li>
            <?php endif ?>
        </ul>
    </nav>
</div>