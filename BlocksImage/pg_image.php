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
            <?= $image ->size(0, 300)->url ?> 300w,
            <?= $image ->size(0, 600)->url ?> 600w,
            <?= $image ->size(0, 1000)->url ?> 1000w,
            <?= $image ->size(0, 1500)->url ?> 1500w" class="lazyload pg-style-panel pg-fileupload" alt="<?= $image ->description ?>" />

        <?php if ($link) { ?>
        </a>
    <?php } ?>

<?php } ?>

<?php if (!($image ) && $pageGrid['backend']) { ?>
    <img src="<?= $placeholder ?>" data-sizes="auto" data-srcset="" class="pg-fileupload pg-style-panel" />

<?php } ?>