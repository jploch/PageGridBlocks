<?php

namespace ProcessWire;

//render options (https://page-grid.com/docs/#/developer/blocks?id=render-options)
$options = ["children" => true, "childrenTab" => "append", "tag" => "div", "tags" => "div section article header footer nav"];

//get settings from block template
$link = $page->pg_group_link_page ? $pages->get($page->pg_group_link_page)->url : $page->pg_group_link;
$linkTarget = $link && substr($link, 0, 4) == "http" ? "target=blank" : "";

//if link is set change tag for wrapper to "a"
if ($link) {
  $options = ["children" => true, "childrenTab" => "append", "tag" => "a", "attributes" => "href='$link' $linkTarget"];
}

//set render options
$pagegrid->renderOptions($options);

//render children
foreach ($page->children() as $item) {
  echo $pagegrid->renderItem($item);
}
