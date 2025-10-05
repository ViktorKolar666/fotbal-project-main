<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="<?= site_url() ?>">Fotbal</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('article') ?>">Články</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('season') ?>">Sezóny</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php if (session()->get('isAdmin')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('admin') ?>">Administrace</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('admin/logout') ?>">Odhlásit</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('admin/login') ?>">Přihlášení</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>