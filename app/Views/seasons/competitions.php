<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<div class="container mt-4">
    <h1>Soutěže v sezóně <?= esc($season->start) ?>/<?= esc($season->finish) ?></h1>
    <?php if (empty($competitions)): ?>
        <p>V této sezóně nejsou evidovány žádné soutěže.</p>
    <?php else: ?>
        <ul class="list-group">
            <?php foreach ($competitions as $competition): ?>
                <li class="list-group-item d-flex align-items-center">
                    <?php if (!empty($competition->logo)): ?>
                        <img src="<?= base_url('obrazky/league/' . $competition->logo) ?>" alt="<?= esc($competition->name) ?>" style="height:32px;width:auto;margin-right:10px;">
                    <?php endif; ?>
                    <strong><?= esc($competition->name) ?></strong>
                    <span class="ms-2 text-muted">(úroveň: <?= esc($competition->level) ?>)</span>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <a href="<?= site_url('season') ?>" class="btn btn-secondary mt-3">Zpět na přehled sezón</a>
</div>
<?= $this->endSection() ?>
