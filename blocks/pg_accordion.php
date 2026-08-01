<?php

namespace ProcessWire;

$numbering = $page->pg_accordion_numbering->value ? $page->pg_accordion_numbering->value : 'none';
$i = 0;
?>
<!-- Learn more about PAGEGRID's wrapper element: https://page-grid.com/docs/#/developer/blocks?id=wrapper-element -->
<div pg-children="true" pg-children-label="Accordion Items" pg-children-tab="append" pg-autotitle="false" pg-wrapper>
    <?php foreach ($page->children() as $item) : $i++; ?>
        <div class="accordion-header" data-class="accordion-header">
            <div class="accordion-headline" data-class="accordion-headline">
                <?php if ($numbering !== 'none'): ?>
                    <?php
                    $wrapping = $numbering;
                    $padding = null;
                    if ($wrapping[0] === '(' && substr($wrapping, -1) === ')') {
                        $padding = substr($wrapping, 1, -1);
                        $wrapLeft = '(';
                        $wrapRight = ')';
                    } elseif ($wrapping[0] === '[' && substr($wrapping, -1) === ']') {
                        $padding = substr($wrapping, 1, -1);
                        $wrapLeft = '[';
                        $wrapRight = ']';
                    } else {
                        $padding = $wrapping;
                        $wrapLeft = '';
                        $wrapRight = '';
                    }
                    $padLen = strlen($padding);
                    $num = $padLen ? str_pad($i, $padLen, '0', STR_PAD_LEFT) : $i;
                    ?>
                    <span class="accordion-number" data-class="accordion-number"><?= $wrapLeft . $num . $wrapRight ?></span>
                <?php endif; ?>
                <?= $pagegrid->isBackend() ? $item->edit('title') : $item->title ?>
            </div>
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