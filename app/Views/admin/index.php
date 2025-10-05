<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<div class="container mt-4">
    <h1>Administrace článků</h1>
    <a href="<?= site_url('admin/create') ?>" class="btn btn-success mb-3">Přidat nový článek</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nadpis</th>
                <th>Publikováno</th>
                <th>Top</th>
                <th>Datum</th>
                <th>Akce</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($article as $article): ?>
            <tr>
                <td><?= $article->id ?></td>
                <td><?= esc($article->title) ?></td>
                <td>
                    <input type="checkbox" class="form-check-input publish-switch" data-id="<?= $article->id ?>" <?= $article->published ? 'checked' : '' ?>>
                </td>
                <td>
                    <input type="checkbox" class="form-check-input top-switch" data-id="<?= $article->id ?>" <?= $article->top ? 'checked' : '' ?>>
                </td>
                <td><?= date('d.m.Y', $article->date) ?></td>
                <td>
                    <a href="<?= site_url('admin/edit/' . $article->id) ?>" class="btn btn-sm btn-primary">Upravit</a>
                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $article->id ?>">Smazat</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal pro mazání -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Smazat článek</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zavřít"></button>
      </div>
      <div class="modal-body">
        Opravdu chcete smazat tento článek?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zrušit</button>
        <a href="#" id="confirmDeleteBtn" class="btn btn-danger">Smazat</a>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var articleId = button.getAttribute('data-id');
        var confirmBtn = document.getElementById('confirmDeleteBtn');
        confirmBtn.href = "<?= site_url('admin/delete/') ?>" + articleId;
    });

    // Switch pro publikování
    document.querySelectorAll('.publish-switch').forEach(function(switchEl) {
        switchEl.addEventListener('change', function() {
            fetch('<?= site_url('admin/toggle-published') ?>', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({id: this.dataset.id, published: this.checked ? 1 : 0})
            });
        });
    });

    // Switch pro top
    document.querySelectorAll('.top-switch').forEach(function(switchEl) {
        switchEl.addEventListener('change', function() {
            fetch('<?= site_url('admin/toggle-top') ?>', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({id: this.dataset.id, top: this.checked ? 1 : 0})
            });
        });
    });
});
</script>
<?= $this->endSection() ?>
