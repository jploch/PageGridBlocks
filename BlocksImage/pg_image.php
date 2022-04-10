<?php namespace ProcessWire; 
$placeholder='data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
?>

<?php if($page->getFormatted('pg_image')) { ?>

<?php if($page->page_reference) { ?>
<a href="<?= $page->page_reference->url() ?>">
    <?php } ?>

    <img src="<?= $page->getFormatted('pg_image')->size(0,10)->url ?>" data-sizes="auto" data-srcset="
            <?= $page->getFormatted('pg_image')->size(0,300)->url ?> 300w,
            <?= $page->getFormatted('pg_image')->size(0,600)->url ?> 600w,
            <?= $page->getFormatted('pg_image')->size(0,1000)->url ?> 1000w,
            <?= $page->getFormatted('pg_image')->size(0,1500)->url ?> 1500w" class="lazyload pg-style-panel pg-fileupload" alt="<?= $page->getFormatted('pg_image')->description ?>" />

    <?php if($page->page_reference) { ?>
</a>
<?php } ?>

<?php } ?>

<?php if( !($page->getFormatted('pg_image')) && $pageGrid['backend'] ) { ?>
<img src="<?= $placeholder ?>" data-sizes="auto" data-srcset="" class="pg-fileupload pg-style-panel" />

<?php } ?>
