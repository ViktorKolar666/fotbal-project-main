<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<div class="container mt-5" style="max-width:400px;">
    <h2>Přihlášení do administrace</h2>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= esc($error) ?></div>
    <?php endif; ?>
    <form method="post" action="<?= site_url('admin/login') ?>">
        <div class="mb-3">
            <label for="username" class="form-label">Uživatelské jméno</label>
            <input type="text" class="form-control" id="username" name="username" required autofocus>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Heslo</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Přihlásit se</button>
    </form>
</div>
<?= $this->endSection() ?>