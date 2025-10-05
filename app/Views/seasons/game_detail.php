<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<div class="container mt-4">
    <h1>Detail zápasu</h1>
    <table class="table">
        <tr>
            <th>Domácí</th>
            <td>
                <?php

use function PHPUnit\Framework\stringContains;

 if (!empty($homeTeam->logo)): ?>
                    <img src="<?= base_url('obrazky/logos/' . esc($homeTeam->logo)) ?>" alt="<?= esc($homeTeam->name) ?>" class="team-logo" style="height:32px;width:auto;margin-right:10px;">
                <?php endif; ?>
                <a href="<?= site_url('team/' . esc($homeTeam->id)) ?>">
                    <?= esc($homeTeam->name ?? $game->home) ?>
                </a>
            </td>
        </tr>
        <tr>
            <th>Hosté</th>
            <td>
                <?php if (!empty($awayTeam->logo)): ?>
                    <img src="<?= base_url('obrazky/logos/' . esc($awayTeam->logo)) ?>" alt="<?= esc($awayTeam->name) ?>" class="team-logo " style="height:32px;width:auto;margin-right:10px;">
                <?php endif; ?>
                <a href="<?= site_url('team/' . esc($awayTeam->id)) ?>">
                    <?= esc($awayTeam->name ?? $game->away) ?>
                </a>
            </td>
        </tr>
        <tr>
            <th>Výsledek</th>
            <td><?= esc($game->goals_home) ?> : <?= esc($game->goals_away) ?></td>
        </tr>
        <tr>
            <th>Poločas</th>
            <td><?= esc($game->ht_goals_home) ?> : <?= esc($game->ht_goals_away) ?></td>
        </tr>
        <tr>
            <th>Datum</th>
            <td><?= date('d.m.', strtotime($game->date)) ?></td>
        </tr>
        <tr>
            <th>Čas</th>
            <td>
                <?php if ($game->time !== null): ?>
                    <?= date('H:i', strtotime($game->time)) ?>
                <?php else: ?>
                    <span class="text-muted">Není známý</span>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>Stadion</th>
            <td><?= stringContains(esc($game->stadium)) ? esc($game->stadium) : '<span class="text-muted">Není známo</span>' ?></td>
        </tr>
        <tr>
            <th>Návštěva</th>
            <td><?= intval(esc($game->attendance)) ? esc($game->attendance) : '<span class="text-muted">Není známo</span>' ?></td>
        </tr>
    </table>
    <a href="javascript:history.back()" class="btn btn-secondary mt-3">Zpět</a>
</div>
<?= $this->endSection() ?>