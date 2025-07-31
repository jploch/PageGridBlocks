<?php

namespace ProcessWire; ?>
<!-- Learn more about PAGEGRID's wrapper element: https://page-grid.com/docs/#/developer/blocks?id=wrapper-element -->
<div pg-children="true" pg-children-label="Accordion Items" pg-children-tab="append" pg-autotitle="false" pg-wrapper>
    <?php foreach ($page->children() as $item) : ?>
        <div class="accordion-header" data-class="accordion-header">
            <div class="accordion-headline" data-class="accordion-headline"><?= $item->edit('title') ?></div>
            <div class="accordion-icon" data-class="accordion-icon">
                <div class="accordion-icon-inner" data-class="accordion-icon-inner"></div>
                <div class="accordion-icon-inner" data-class="accordion-icon-inner"></div>
            </div>
        </div>
        <div class="accordion-content" data-class="accordion-content">
            <div class="accordion-content-inner" data-class="accordion-content-inner">
                <?= $pagegrid->renderItem($item) ?>
            </div>
        </div>
    <?php endforeach ?>
</div>