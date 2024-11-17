<?php

namespace ProcessWire;
?>

<?php if ($page->pg_lottie) { ?>
    <div class="pg-lottie-file pg-media-responsive" data-lottie="<?= $page->pg_lottie->url ?>" data-event="<?= $page->pg_lottie_event->value ?>" data-loop="<?= $page->pg_lottie_loop ?>" data-autoplay="<?= $page->pg_lottie_autoplay ?>" data-reverse="<?= $page->pg_lottie_reverse ?>"></div>

    <!-- update animation after PAGEGRID ajax request -->
    <?php if ($pagegrid->isBackend() && $config->ajax) { ?>
        <script type="text/javascript" src="/site/modules/PageGridBlocks/blocks/pg_lottie.js"></script>
    <?php  } ?>

<?php } ?>