<?php namespace ProcessWire; 

$pagegrid->renderOptions(["children" => true]);

// you can set optional children array at runtime
$children = $page->pgChildren ? $page->pgChildren : $page->children();

foreach($children as $item) {
  echo $pagegrid->renderItem($item); 
}

?>
