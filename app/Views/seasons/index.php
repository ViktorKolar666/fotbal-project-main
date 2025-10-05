<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<div class="container mt-4">
    <h1>Sezóny</h1>
    <div class="row gx-3 gy-3">
        <?php if (!empty($seasons)): ?>
            <?php foreach ($seasons as $season): ?>
                <div class="col-md-4 col-lg-3 mb-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title">Sezóna <?= esc($season->start) ?>/<?= esc($season->finish) ?></h5>
                            <a href="<?= site_url('season/' . $season->id) ?>" class="btn btn-primary mt-2">Detail sezóny</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-info">Žádné sezóny nejsou k dispozici.</div>
            </div>
        <?php endif; ?>
    </div>
    <div class="mt-4">
        <?= $pager->links('seasons', 'bootstrap') ?>
    </div>
</div>
<?= $this->endSection() ?>
