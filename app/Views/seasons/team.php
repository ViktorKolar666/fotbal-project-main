<?php

use function PHPUnit\Framework\stringContains;
?>
<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<div class="container mt-4">
    <h1>Stránka týmu <?= stringContains(esc($teamName)) ?></h1>
    <p>Logo týmu: <img src="<?= base_url('obrazky/logos/' . esc($teamLogo)) ?>" alt="<?= esc($teamName) ?>" class="team-logo" style="height:32px;width:auto;margin-right:10px;"></p>
    <p>ID týmu: <?= esc($teamId) ?></p>
    <p>Obsah bude doplněn.</p>
    <a href="javascript:history.back()" class="btn btn-secondary mt-3">Zpět</a>
</div>
<?= $this->endSection() ?>