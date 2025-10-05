<?php

use function PHPUnit\Framework\stringContains;
?>
<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<div class="container mt-4">
    <h1>Stránka týmu <?= esc($teamName) ?></h1>
    <p>Logo týmu: </p>
    <p>
        <?php if (!empty($teamLogo)): ?>
            <img src="<?= base_url('obrazky/logos/' . esc($teamLogo)) ?>" alt="<?= esc($teamName) ?>" class="team-logo">
        <?php else: ?>
            <span class="text-muted">Není k dispozici</span>
        <?php endif; ?>
    </p>
    <p>ID týmu: <?= esc($teamId) ?></p>
    <p>Obsah bude doplněn.</p>
    <a href="javascript:history.back()" class="btn btn-secondary mt-3">Zpět</a>
</div>
<?= $this->endSection() ?>