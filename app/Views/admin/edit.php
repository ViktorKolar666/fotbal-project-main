<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({ selector:'#text', height: 400, menubar: false });
</script>
<div class="container mt-4">
    <h1>Upravit článek</h1>
    <form action="<?= site_url('admin/update/' . $article->id) ?>" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Nadpis</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= esc($article->title) ?>" required>
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Odkaz (slug)</label>
            <input type="text" class="form-control" id="link" name="link" value="<?= esc($article->link) ?>" required>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Foto (název souboru)</label>
            <input type="text" class="form-control" id="photo" name="photo" value="<?= esc($article->photo) ?>">
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Datum</label>
            <input type="date" class="form-control" id="date" name="date" value="<?= date('Y-m-d', $article->date) ?>" required>
        </div>
        <div class="mb-3">
            <label for="text" class="form-label">Text článku</label>
            <textarea class="form-control" id="text" name="text"><?= esc($article->text) ?></textarea>
        </div>
        <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" id="published" name="published" value="1" <?= $article->published ? 'checked' : '' ?>>
            <label class="form-check-label" for="published">Publikováno</label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="top" name="top" value="1" <?= $article->top ? 'checked' : '' ?>>
            <label class="form-check-label" for="top">Top článek</label>
        </div>
        <button type="submit" class="btn btn-primary">Uložit změny</button>
        <a href="<?= site_url('admin') ?>" class="btn btn-secondary">Zpět</a>
    </form>
</div>
<?= $this->endSection() ?>