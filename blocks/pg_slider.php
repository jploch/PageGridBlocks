<?php

namespace ProcessWire;

$pagegrid->renderOptions(["children" => ['pg_image', 'pg_video', 'pg_editor', 'pg_group'], 'childrenTab' => 'append', 'childrenLabel' => 'Slides']);
?>

<div class="glide" data-autoplay="<?= $page->pg_slider_autoplay ?>">
    <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides">

            <?php foreach ($page->children() as $item) { ?>
                <li class="glide__slide">
                    <?php echo $pagegrid->renderItem($item); ?>
                </li>
            <?php }; ?>
        </ul>
    </div>
    <div class="glide__arrows" data-glide-el="controls">
        <button id="slide-arrow-left" class="glide__arrow glide__arrow--left slide-arrow-left pg-style-panel" data-glide-dir="<">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26.4 44.2">
                <path d="M24.2 42.1l-20-20 20-20" />
            </svg>
        </button>
        <button id="slide-arrow-right" class="glide__arrow glide__arrow--right slide-arrow-right pg-style-panel" data-glide-dir=">">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26.4 44.2">
                <path d="M2.1 2.1l20 20-20 20"/>
            </svg>
        </button>
    </div>
    <div class="glide__bullets" data-class="glide__bullets" data-glide-el="controls[nav]">
        <?php foreach ($page->children() as $key => $value) { ?>
            <button class="glide__bullet" data-class="glide__bullet" data-glide-dir="=<?= $key ?>"></button>
        <?php }; ?>
    </div>
</div>