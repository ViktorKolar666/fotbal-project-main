<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<div class="container mt-4">
    <h1>Zápasy v sezóně <?= esc($season->start) ?>/<?= esc($season->finish) ?></h1>
    <?php if (empty($gamesByRound)): ?>
        <p>V této sezóně nejsou evidovány žádné zápasy.</p>
    <?php else: ?>
        <?php foreach ($gamesByRound as $leagueSeasonId => $rounds): ?>
            <h3 class="mt-4"><?= esc($leagueNames[$leagueSeasonId] ?? 'Soutěž') ?></h3>
            <?php foreach ($rounds as $round => $games): ?>
                <h5 class="mt-3">Kolo <?= esc($round) ?></h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Datum</th>
                            <th>Domácí</th>
                            <th>Výsledek</th>
                            <th>Hosté</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($games as $game): ?>
                            <tr>
                                <td><?= date('d.m.', strtotime($game->date)) ?></td>
                                <td>
                                    <img src="<?= base_url('obrazky/logos/' . esc($teams[$game->home]->logo ?? '')) ?>" alt="<?= esc($teams[$game->home]->name ?? $game->home) ?>" class="team-logo" style="height:32px;width:auto;margin-right:10px;">
                                    <a href="<?= site_url('team/' . esc($game->home)) ?>">
                                        <?= esc($teams[$game->home]->name ?? $game->home) ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?= site_url('game/' . esc($game->id)) ?>">
                                        <?= esc($game->goals_home) ?> : <?= esc($game->goals_away) ?>
                                    </a>
                                </td>
                                <td>
                                    <img src="<?= base_url('obrazky/logos/' . esc($teams[$game->away]->logo ?? '')) ?>" alt="<?= esc($teams[$game->away]->name ?? $game->away) ?>" class="team-logo" style="height:32px;width:auto;margin-right:10px;">
                                    <a href="<?= site_url('team/' . esc($game->away)) ?>">
                                        <?= esc($teams[$game->away]->name ?? $game->away) ?>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endforeach; ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <a href="<?= site_url('season') ?>" class="btn btn-secondary mt-3">Zpět na přehled sezón</a>
</div>
<?= $this->endSection() ?>