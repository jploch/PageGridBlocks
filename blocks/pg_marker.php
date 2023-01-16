<?php namespace ProcessWire;?>

<div id="marker-pin-<?= $page->id ; ?>" class="marker-pin-<?= $page->id ; ?> marker-pin pg-style-panel">
  <span id="marker-number" class="marker-number pg-style-panel">
    <?= $page->pg_marker_label; ?>
  </span>
  <div id="marker-content" class="marker-content pg-style-panel">
    <?= $page->pg_marker; ?>
  </div>
</div>
