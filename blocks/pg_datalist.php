<?php

namespace ProcessWire;

$parent = $page->pg_datalist;
$limit = $page->pg_datalist_limit;
$thumbnailSizes = [
  [300, 0],
  [600, 0],
  [1000, 0],
  [1500, 0],
  [2000, 0],
];

//inside backend only create one image size
if ($pagegrid->isBackend()) $thumbnailSizes = [[1000, 0]];

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
  <a id="datalist-item-<?= $child->id ?>" class="datalist-item-<?= $child->id ?> datalist-item pg-item pg-item-resizable pg-item-draggable <?= $pagegrid->getCssClasses($page, 'datalist-item-' . $child->id) ?>" data-class="datalist-item-<?= $child->id ?>" data-page="<?= $child->id ?>" href="<?= $child->url() ?>">

    <?= $pagegrid->renderItemHeader($child, $child->title) ?>

    <?php if (!count($page->pg_datalist_fields)) echo '<h3>' . $child->title . '</h3>' ?>

    <?php foreach ($page->pg_datalist_fields as $item) {  ?>

      <!-- image/video -->
      <?php if ($item->value === 'image') { ?>
        <pg-edit page="<?= $child->id ?>" field="<?= $child->pg_datalist_video ? 'pg_datalist_video' : 'pg_datalist_image' ?>">

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
          //build srcset string from sizes array
          $srcset = '';
          if ($image) {
            foreach ($thumbnailSizes as $s) {
              $srcset .= $image->size($s[0], $s[1])->url . " $s[0]w, ";
            }
            if ($srcset) $srcset = substr($srcset, 0, -2);
          }

          ?>
          <!-- render image -->
          <?php if ($image && !$child->pg_datalist_video) { ?>
            <img src="<?= $image->size(10, 0, ['quality' => 1])->url ?>" data-sizes="auto" data-srcset="<?= $srcset ?>" class="lazyload datalist-media pg-media-responsive" alt="<?= $image->description ?>" />
          <?php } ?>

          <?php if ($child->pg_datalist_video) {
            $video = $child->pg_datalist_video;
            $image = $child->pg_datalist_image;
          ?>
            <video title="<?= $video->description ?>" muted loop data-autoplay="" webkit-playsinline playsinline class="lazyload datalist-media pg-media-responsive" preload="none" poster="<?= $image ? $image->url : '' ?>">;
              <source src="<?= $video->url ?>" type="video/mp4">
              Your browser does not support the video tag.
            </video>

          <?php } ?>
        </pg-edit>
      <?php } ?>

      <!-- title -->
      <?php if ($item->value === 'title') { ?>
        <h3 class="datalist-item-title datalist-item-title-<?= $child->id ?>" data-class="datalist-item-title"><?= $child->edit('title') ?></h3>
      <?php } ?>
      <!-- date -->
      <?php if ($item->value === 'date' && $child->pg_datalist_date) { ?>
        <h6 class="datalist-item-date datalist-item-date-<?= $child->id ?>" data-class="datalist-item-date"><?= $child->pg_datalist_date ?></h6>
      <?php } ?>
      <!-- text -->
      <?php if ($item->value === 'text' && $child->pg_datalist_text) { ?>
        <h4 class="datalist-item-text datalist-item-text-<?= $child->id ?>" data-class="datalist-item-text"><?= $child->pg_datalist_text ?></h4>
      <?php } ?>

    <?php } ?>

  </a>

<?php } ?>