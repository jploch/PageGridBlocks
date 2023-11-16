<?php

namespace ProcessWire;

$linkInternal = $page->pg_image_link ? $page->pg_image_link->url() : 0;
$link = $linkInternal ? $linkInternal : $page->pg_image_link_external;
$image = $page->getFormatted('pg_image');
// $image = $page->pg_image;
?>

<?php if ($link && $image) { ?>
    <a href="<?= $link ?>" <?= $linkInternal ? '' : 'target="blank"' ?> class="image-link" data-class="image-link">
    <?php } ?>
    <pg-edit page="<?= $page->id ?>" field="pg_image">
        <?php if ($image) { ?>
            <img src="<?= $image->size(10, 0, ['quality' => 1])->url ?>" data-sizes="auto" data-srcset="
            <?= $image->size(300, 0)->url ?> 300w,
            <?= $image->size(600, 0)->url ?> 600w,
            <?= $image->size(1000, 0)->url ?> 1000w,
            <?= $image->size(1500, 0)->url ?> 1500w,
            <?= $image->size(2000, 0)->url ?> 2000w" class="lazyload" alt="<?= $image->description ?>" />
        <?php } ?>
    </pg-edit>
    <?php if ($link && $image) { ?>
    </a>
<?php } ?>

<?php if ($page->pg_image_caption && strip_tags($page->pg_image_caption)) {
    // remove all tags but br and a
    $value = $sanitizer->textarea(nl2br($page->pg_image_caption), ['allowableTags' => '<div><br><a>']);
?>
    <div class="caption" data-class="caption"><?= $value ?></div>
<?php } ?>