<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="row gx-3 gy-3">
        <?php $articles = $article; ?>
        <?php if (!empty($articles)): ?>
            <?php $main = array_shift($articles); ?>
            <div class="col-lg-6 col-md-12 d-flex align-items-stretch">
                <a href="<?= site_url('article/' . $main->id) ?>" class="d-block w-100 text-decoration-none">
                    <div class="position-relative w-100 h-100" style="border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(0,0,0,0.12);aspect-ratio:1/1;min-width:260px;min-height:260px;">
                        <?php if ($main->photo): ?>
                            <img src="<?= base_url('obrazky/sigma/' . esc($main->photo)) ?>" alt="<?= esc($main->title) ?>" style="object-fit:cover;width:100%;height:100%;aspect-ratio:1/1;filter:brightness(0.75);">
                        <?php endif; ?>
                        <div class="position-absolute bottom-0 w-100 p-4" style="background:linear-gradient(transparent,rgba(0,0,0,0.7));">
                            <h2 class="text-white mb-2" style="font-size:2rem;text-shadow:0 2px 8px #000;">
                                <?= esc($main->title) ?>
                            </h2>
                            <div class="text-white" style="text-shadow:0 1px 4px #000;">
                                <?= date('j.n.Y', $main->date) ?>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-12 d-flex align-items-stretch">
                <div class="w-100 h-100 d-grid" style="grid-template-columns: 1fr 1fr; grid-template-rows: 1fr 1fr; gap: 16px; min-width:260px;min-height:260px;">
                    <?php foreach (array_slice($articles, 0, 4) as $item): ?>
                        <a href="<?= site_url('article/' . $item->id) ?>" class="d-block text-decoration-none">
                            <div class="position-relative w-100 h-100" style="border-radius:16px;overflow:hidden;box-shadow:0 4px 16px rgba(0,0,0,0.10);aspect-ratio:1/1;">
                                <?php if ($item->photo): ?>
                                    <img src="<?= base_url('obrazky/sigma/' . esc($item->photo)) ?>" alt="<?= esc($item->title) ?>" style="object-fit:cover;width:100%;height:100%;aspect-ratio:1/1;filter:brightness(0.7);">
                                <?php endif; ?>
                                <div class="position-absolute bottom-0 w-100 p-3" style="background:linear-gradient(transparent,rgba(0,0,0,0.7));">
                                    <div class="text-white fw-bold mb-1" style="font-size:1rem;text-shadow:0 2px 8px #000;">
                                        <?= esc($item->title) ?>
                                    </div>
                                    <div class="text-white" style="text-shadow:0 1px 4px #000;">
                                        <?= date('j.n.Y', $item->date) ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>
