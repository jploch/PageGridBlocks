<?php

namespace ProcessWire;
?>

<div pg-wrapper>
    <?php if ($page->pg_lottie) { ?>
        <div class="pg-lottie-file pg-media-responsive" data-lottie="<?= $page->pg_lottie->url ?>" data-event="<?= $page->pg_lottie_event->value ?>" data-loop="<?= $page->pg_lottie_loop ?>" data-autoplay="<?= $page->pg_lottie_autoplay ?>" data-reverse="<?= $page->pg_lottie_reverse ?>"></div>
    <?php } ?>
</div>