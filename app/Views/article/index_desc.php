<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="row g-3">
        <?php if (!empty($articles)): ?>
            <div class="col-lg-8">
                <?php $main = $articles[0]; ?>
                <div class="position-relative" style="height: 350px; background: url('<?= esc($main->photo) ?>') center/cover no-repeat; border-radius: 10px; overflow: hidden;">
                    <a href="<?= site_url('article/' . $main->id) ?>" style="text-decoration: none;">
                        <div class="position-absolute bottom-0 w-100 p-4" style="background: linear-gradient(transparent, rgba(0,0,0,0.7));">
                            <h2 class="text-white mb-2" style="font-size: 2rem; text-shadow: 0 2px 8px #000;">
                                <?= esc($main->title) ?>
                            </h2>
                            <div class="text-white" style="text-shadow: 0 1px 4px #000; font-size: 1.1rem;">
                                <?= date('j.n.Y', strtotime($main->date)) ?>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row g-3">
                    <?php foreach (array_slice($articles, 1) as $article): ?>
                        <div class="col-12">
                            <div class="position-relative" style="height: 160px; background: url('<?= esc($article->photo) ?>') center/cover no-repeat; border-radius: 10px; overflow: hidden;">
                                <a href="<?= site_url('article/' . $article->id) ?>" style="text-decoration: none;">
                                    <div class="position-absolute bottom-0 w-100 p-3" style="background: linear-gradient(transparent, rgba(0,0,0,0.7));">
                                        <h5 class="text-white mb-1" style="font-size: 1.1rem; text-shadow: 0 2px 8px #000;">
                                            <?= esc($article->title) ?>
                                        </h5>
                                        <div class="text-white" style="text-shadow: 0 1px 4px #000; font-size: 0.95rem;">
                                            <?= date('j.n.Y', strtotime($article->date)) ?>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>
