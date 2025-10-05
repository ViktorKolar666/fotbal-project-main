<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<div class="container mt-4">
    <h1>Administrace článků</h1>
    <a href="<?= site_url('admin/create') ?>" class="btn btn-success mb-3">Přidat nový článek</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nadpis</th>
                <th>Publikováno</th>
                <th>Datum</th>
                <th>Akce</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($article as $article): ?>
            <tr>
                <td><?= $article->id ?></td>
                <td><?= esc($article->title) ?></td>
                <td><?= date('d.m.Y', $article->date) ?></td>
                <td><?= $article->published ? 'Ano' : 'Ne' ?></td>
                <td>
                    <a href="<?= site_url('admin/edit/' . $article->id) ?>" class="btn btn-sm btn-primary">Upravit</a>
                    <a href="<?= site_url('admin/delete/' . $article->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Opravdu smazat?')">Smazat</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
