<?php

namespace ProcessWire;

// get settings from block template
$link = $page->pg_group_link_page ? $pages->get($page->pg_group_link_page)->url : $page->pg_group_link;
$linkTarget = $link && substr($link, 0, 4) == "http" ? "target=blank" : "";
?>

<!-- set wrapper -->
<?php if ($link) { ?>
  <a href="<?= $link ?>" <?= $linkTarget ?> pg-children="true" pg-children-tab="append" pg-wrapper>
  <?php } else { ?>
    <div pg-tags="div section article header footer nav" pg-children="true" pg-children-tab="append" pg-wrapper>
    <?php } ?>
    <!-- render children -->
    <?php foreach ($page->children() as $item) { ?>
      <?= $pagegrid->renderItem($item); ?>
    <?php } ?>
    <?php if ($link) { ?>
  </a>
<?php } else { ?>
  </div>
<?php } ?>