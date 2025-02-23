<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="<?= site_url('dashboard') ?>">Codeigniter 4 - <?= session()->get('username') ?></a>

            <!-- Botón para dispositivos pequeños -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Menú">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Enlaces de navegación -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php if (session()->get('is_admin')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('dashboard/users') ?>">Listado de usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('dashboard/links') ?>">Listado de enlaces</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('dashboard') ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('logout') ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>