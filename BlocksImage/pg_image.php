<?php namespace ProcessWire; 
$placeholder='data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
?>

<?php if($page->getFormatted('pg_image')) { ?>

<?php if($page->page_reference) { ?>
<a href="<?= $page->page_reference->url() ?>">
    <?php } ?>

    <img src="<?= $page->getFormatted('pg_image')->size(10,0)->url ?>" data-sizes="auto" data-srcset="
            <?= $page->getFormatted('pg_image')->size(300, 0)->url ?> 300w,
            <?= $page->getFormatted('pg_image')->size(600, 0)->url ?> 600w,
            <?= $page->getFormatted('pg_image')->size(1000, 0)->url ?> 1000w,
            <?= $page->getFormatted('pg_image')->size(1500, 0)->url ?> 1500w,
            <?= $page->getFormatted('pg_image')->size(2000, 0)->url ?> 2000w" class="lazyload pg-style-panel pg-fileupload" alt="<?= $page->getFormatted('pg_image')->description ?>" />

    <?php if($page->page_reference) { ?>
</a>
<?php } ?>

<?php } ?>

<?php if( !($page->getFormatted('pg_image')) && $pageGrid['backend'] ) { ?>
<img src="<?= $placeholder ?>" data-sizes="auto" data-srcset="" class="pg-fileupload pg-style-panel" />

<?php } ?>
