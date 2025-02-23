<div pg-wrapper>
    <figure class="photoswipe-item">
        <?php if ($page->pg_gallery) { ?>
            <a href="<?= $page->pg_gallery->size(0, 1000)->url(); ?>" itemprop="contentUrl" data-size="<?= $page->pg_gallery->size(0, 1000)->width(); ?>x<?= $page->pg_gallery->size(0, 1000)->height(); ?>">
            <?php }; ?>
            <pg-edit page="<?= $page->id ?>" field="pg_gallery">
                <?php if ($page->pg_gallery) { ?>
                    <img src="<?= $page->pg_gallery->size(0, 300)->url(); ?>" data-srcset="<?= $page->pg_gallery->size(0, 300)->url(); ?> 300w, <?= $page->pg_gallery->size(0, 600)->url(); ?> 600w" data-sizes="auto" class="lazyload photoswipe-item-content pg-fileupload" />
                <?php }; ?>
            </pg-edit>
            <?php if ($page->pg_gallery) { ?>
            </a>
        <?php }; ?>
        <!--     <figcaption itemprop="caption description">Image caption</figcaption>-->
    </figure>
</div>