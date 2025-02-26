<header class="text-white bg-black">
    <nav class="flex items-center justify-between px-4 py-4 mx-auto max-w-7xl">
        <div class="flex items-center space-x-4">
            <a href="<?= site_url('dashboard') ?>" class="text-2xl font-bold">
                Codeigniter 4 - <?= session()->get('username') ?>
            </a>
        </div>

        <div class="lg:hidden">
            <button class="text-white focus:outline-none" id="navbar-toggle">
                <span class="block w-6 h-0.5 bg-white mb-1"></span>
                <span class="block w-6 h-0.5 bg-white mb-1"></span>
                <span class="block w-6 h-0.5 bg-white"></span>
            </button>
        </div>

        <div class="hidden space-x-6 lg:flex">
            <ul class="flex space-x-6">
                <?php if (session()->get('is_admin')): ?>
                    <li>
                        <a href="<?= site_url('dashboard/users') ?>" class="hover:text-gray-400">Listado de usuarios</a>
                    </li>
                <?php endif; ?>
                <li>
                    <a href="<?= site_url('dashboard/links') ?>" class="hover:text-gray-400">Listado de enlaces</a>
                </li>
                <li>
                    <a href="<?= site_url('logout') ?>" class="hover:text-gray-400">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="hidden text-white bg-black lg:hidden" id="navbar-collapse">
        <ul class="px-6 py-4 space-y-4">
            <?php if (session()->get('is_admin')): ?>
                <li>
                    <a href="<?= site_url('dashboard/users') ?>" class="block">Listado de usuarios</a>
                </li>
            <?php endif; ?>
            <li>
                <a href="<?= site_url('dashboard/links') ?>" class="block">Listado de enlaces</a>
            </li>
            <li>
                <a href="<?= site_url('logout') ?>" class="block">Logout</a>
            </li>
        </ul>
    </div>
</header>

<script>
    const toggleButton = document.getElementById('navbar-toggle');
    const navbarCollapse = document.getElementById('navbar-collapse');

    toggleButton.addEventListener('click', () => {
        navbarCollapse.classList.toggle('hidden');
    });
</script>