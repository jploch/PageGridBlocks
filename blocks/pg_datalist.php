<?php

namespace ProcessWire;

$parent = $page->pg_datalist;
$limit = $page->pg_datalist_limit;

if (!$parent || !$parent->id) {
  return;
}

//add fields to template
if (count($page->pg_datalist_fields) && $parent->hasChildren()) {
  $t = $parent->children()->first()->template;
  $fs = ["pg_datalist_tab", "pg_datalist_date", "pg_datalist_image", "pg_datalist_video", "pg_datalist_text", "pg_datalist_tab_END"];
  $preF = $t->fieldgroup->fields->get("title");

  foreach ($fs as $f) {
    if ($preF && $preF->id && !$t->hasField($f)) {
      $t->fieldgroup->insertAfter($fields->get($f), $preF);
      $t->fieldgroup->save();
    }
    $preF = $t->fieldgroup->fields->get($f);
  }
}
//END add fields to template
?>

<?php foreach ($parent->children("sort=sort, limit=$limit") as $child) {
  //needed for ajax modal to work, make sure output formating is on after saving children
  $child->of(true);
?>
  <a class="datalist-item-<?= $child->id ?> datalist-item pg-item pg-item-resizable pg-item-draggable <?= $pagegrid->getCssClasses($page, null, 'datalist-item-' . $child->id) ?>" data-class="datalist-item-<?= $child->id ?>" data-page="<?= $child->id ?>" href="<?= $child->url() ?>">

    <?= $pagegrid->renderItemHeader($child, $child->title) ?>

    <?php if (!count($page->pg_datalist_fields)) echo '<h3>' . $child->title . '</h3>' ?>

    <?php foreach ($page->pg_datalist_fields as $item) {  ?>

      <!-- image/video -->
      <?php if ($item->value === 'image') { ?>
        <pg-edit page="<?= $child->id ?>" field="pg_datalist_image">

          <!-- get image or placeholder -->
          <?php
          $image = $child->pg_datalist_image;

          if (!$child->pg_datalist_image && !$child->pg_datalist_video) {
            $childItems = $pages->get('pg-' . $child->id);

            if ($childItems && $childItems->id) {
              $placeholder = $childItems->find('template=pg_image')->first();
              if ($placeholder && $placeholder->id) {
                $image = $placeholder->pg_image;
              }
            }
          }
          ?>
          <!-- render image -->
          <?php if ($image && !$child->pg_datalist_video) { ?>
            <img src="<?= $image->size(10, 0, ['quality' => 1])->url ?>" data-sizes="auto" data-srcset="
            <?= $image->size(300, 0)->url ?> 300w,
            <?= $image->size(600, 0)->url ?> 600w,
            <?= $image->size(1000, 0)->url ?> 1000w,
            <?= $image->size(1500, 0)->url ?> 1500w,
            <?= $image->size(2000, 0)->url ?> 2000w" class="lazyload" alt="<?= $image->description ?>" />
          <?php } ?>

          <?php if ($child->pg_datalist_video) {
            $video = $child->pg_datalist_video;
            $image = $child->pg_datalist_image;
          ?>
            <video title="<?= $video->description ?>" muted loop data-autoplay="" webkit-playsinline playsinline class="lazyload" preload="none" poster="<?= $image ? $image->url : '' ?>">;
              <source src="<?= $video->url ?>" type="video/mp4">
              Your browser does not support the video tag.
            </video>

          <?php } ?>
        </pg-edit>
      <?php } ?>

      <!-- title -->
      <?php if ($item->value === 'title') { ?>
        <h3><?= $child->title ?></h3>
      <?php } ?>
      <!-- date -->
      <?php if ($item->value === 'date' && $child->pg_datalist_date) { ?>
        <h6><?= $child->pg_datalist_date ?></h6>
      <?php } ?>
      <!-- text -->
      <?php if ($item->value === 'text' && $child->pg_datalist_text) { ?>
        <?= $user->hasPermission('PageFrontEdit') ? '<pg-ptag>' : '<p>' ?>
        <?= $child->pg_datalist_text ?>
        <?= $user->hasPermission('PageFrontEdit') ? '</pg-ptag>' : '</p>' ?>
      <?php } ?>

    <?php } ?>

  </a>

<?php } ?>