<?php

namespace ProcessWire;

//allow children
$pagegrid->renderOptions(['page' => $page, "children" => true, "autoTitle" => false]);
?>

<?php foreach ($page->children() as $item) : ?>
    <div class="accordion-header" data-class="accordion-header">
        <p class="accordion-headline" data-class="accordion-headline"><?= $item->title ?></p>
        <div class="accordion-icon" data-class="accordion-icon" >+</div>
    </div>
    <div class="accordion-content" data-class="accordion-content">
        <?= $pagegrid->renderItem($item) ?>
    </div>
<?php endforeach ?>