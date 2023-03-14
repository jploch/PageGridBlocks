<?php namespace ProcessWire; 

//allow children and to change tag
$pagegrid->renderOptions(['page' => $page, "children" => true, 'tag' => 'div', 'tags' => 'div section article header footer nav']);

// you can set optional children array at runtime
$children = $page->pgChildren ? $page->pgChildren : $page->children();

foreach($children as $item) {
  echo $pagegrid->renderItem($item); 
}

?>
