<?php

namespace ProcessWire;

//allow children (https://page-grid.com/docs/#/developer/blocks?id=render-options)
$pagegrid->renderOptions(["children" => true, 'childrenLabel' => 'Accordion Items', 'childrenTab' => 'append', "autoTitle" => false]);
?>

<?php foreach ($page->children('sort=sort') as $item) : ?>
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