<?php

namespace ProcessWire;

$linkInternal = $page->pg_image_link ? $page->pg_image_link->url() : '';
$link = $linkInternal ? $linkInternal : $page->pg_image_link_external;
$caption = $page->pg_image_caption && strip_tags($page->pg_image_caption) ? $sanitizer->textarea(nl2br($page->pg_image_caption), ['allowableTags' => '<div><br><a>']) : '';
$ratioWidth = $page->pg_image_ratio_width;
$ratioHeight = $page->pg_image_ratio_height;
$image = $page->getFormatted('pg_image');
$srcset = "";
$sizes = [
    [300, 0],
    [600, 0],
    [1000, 0],
    [1500, 0],
    [2000, 0],
];

//inside backend only generate one size to render faster (optional)
if ($pagegrid->isBackend()) $sizes = [[1000, 0]];

//take aspect ratio field into account
if ($image && $ratioWidth && $ratioHeight) {
    $sizes = [
        [300, 300 * $ratioHeight / $ratioWidth],
        [600, 600 * $ratioHeight / $ratioWidth],
        [1000, 1000 * $ratioHeight / $ratioWidth],
        [1500, 1500 * $ratioHeight / $ratioWidth],
        [2000, 2000 * $ratioHeight / $ratioWidth],
    ];
    //inside backend only generate one size to render faster (optional)
    if ($pagegrid->isBackend()) $sizes = [[1000, 1000 * $ratioHeight / $ratioWidth]];
}

//build srcset string from sizes array
if ($image) {
    foreach ($sizes as $s) {
        $srcset .= $image->size($s[0], $s[1])->url . " $s[0]w, ";
    }
    if ($srcset) $srcset = substr($srcset, 0, -2);
}

?>

<div pg-wrapper>
    <?php if ($link && $image) { ?>
        <a href="<?= $link ?>" <?= $linkInternal ? '' : 'target="blank"' ?> class="image-link" data-class="image-link">
        <?php } ?>
        <pg-edit page="<?= $page->id ?>" field="pg_image">
            <?php if ($image) { ?>
                <?php if ($image->ext == "gif" || $image->ext == "GIF") { ?>
                    <img src="<?= $image->size(10, 0, ['quality' => 1])->url ?>" data-src="<?= $image->url ?>" class="lazyload pg-media-responsive <?= $pagegrid->getCssClasses($page, 'img') ?>" alt="<?= $image->description ?>" />
                <?php } else { ?>
                    <img src="<?= $image->size(10, 0, ['quality' => 1])->url ?>" data-sizes="auto" data-srcset="<?= $srcset ?>" class="lazyload pg-media-responsive <?= $pagegrid->getCssClasses($page, 'img') ?>" alt="<?= $image->description ?>" />
                <?php } ?>
            <?php } ?>
        </pg-edit>
        <?php if ($link && $image) { ?>
        </a>
    <?php } ?>

    <?php if ($caption) { ?>
        <div class="caption" data-class="caption"><?= $caption ?></div>
    <?php } ?>
</div>