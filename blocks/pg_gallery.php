<?php if ($page->pg_gallery) { ?>
<figure class="photoswipe-item">
    <a href="<?= $page->pg_gallery->size(0, 1000)->url(); ?>" itemprop="contentUrl" data-size="<?= $page->pg_gallery->size(0, 1000)->width(); ?>x<?= $page->pg_gallery->size(0, 1000)->height(); ?>">
        <img src="<?= $page->pg_gallery->size(0, 300)->url(); ?>" data-srcset="<?= $page->pg_gallery->size(0, 300)->url(); ?> 300w, <?= $page->pg_gallery->size(0,600)->url(); ?> 600w" data-sizes="auto" class="lazyload photoswipe-item-content pg-fileupload" />
    </a>
    <!--     <figcaption itemprop="caption description">Image caption</figcaption>-->
</figure>

<?php } else {; ?>
<img src="" class="pg-fileupload" />
<?php }; ?>


<?php 

?>
