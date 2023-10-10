<?php namespace ProcessWire;?>

<div data-class="marker-pin-<?= $page->id ; ?>" class="marker-pin-<?= $page->id ; ?> marker-pin pg-style-panel">
  <span data-class="marker-number" class="marker-number pg-style-panel">
    <?= $page->pg_marker_label; ?>
  </span>
  <div data-class="marker-content" class="marker-content pg-style-panel">
    <?= $page->pg_marker; ?>
  </div>
</div>
