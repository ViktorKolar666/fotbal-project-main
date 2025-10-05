<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<div class="container mt-4">
    <?php if ($article->photo): ?>
        <div class="mb-4 position-relative" style="height: 350px; background: url('<?= base_url('obrazky/sigma/' . esc($article->photo)) ?>') center/cover no-repeat; border-radius: 10px; overflow: hidden;">
            <div class="position-absolute bottom-0 w-100 p-3" style="background: linear-gradient(transparent, rgba(0,0,0,0.7));">
                <h1 class="text-white mb-1" style="font-size: 2.5rem; text-shadow: 0 2px 8px #000;">
                    <?= esc($article->title) ?>
                </h1>
                <div class="text-white" style="text-shadow: 0 1px 4px #000;">
                    <?= date('d.m.Y', strtotime($article->date)) ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <h1><?= esc($article->title) ?></h1>
        <div><?= date('d.m.Y', strtotime($article->date)) ?></div>
    <?php endif; ?>
    <div class="mt-4">
        <?= $article->text ?>
    </div>
</div>
<?= $this->endSection() ?>