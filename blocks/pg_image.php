<?php namespace ProcessWire;

$placeholder = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$linkInternal = $page->pg_image_link ? $page->pg_image_link->url() : 0;
$link = $linkInternal ? $linkInternal : $page->pg_image_link_external;
$image = $page->getFormatted('pg_image') ;
?>

<?php if ($image ) { ?>

    <?php if ($link) { ?>
        <a href="<?= $link ?>" <?= $linkInternal ? '' : 'target="blank"' ?> >
        <?php } ?>

        <img src="<?= $image ->size(0, 10)->url ?>" data-sizes="auto" data-srcset="
            <?= $image->size(300, 0)->url ?> 300w,
            <?= $image->size(600, 0)->url ?> 600w,
            <?= $image->size(1000, 0)->url ?> 1000w,
            <?= $image->size(1500, 0)->url ?> 1500w,
            <?= $image->size(2000, 0)->url ?> 2000w" class="lazyload pg-style-panel pg-fileupload" alt="<?= $image ->description ?>" />

        <?php if ($link) { ?>
        </a>
    <?php } ?>

<?php } ?>

<?php if (!($image ) && $pagegrid->isBackend()) { ?>
    <img src="<?= $placeholder ?>" data-sizes="auto" data-srcset="" class="pg-fileupload pg-style-panel" />

<?php } ?>