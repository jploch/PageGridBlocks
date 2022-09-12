<?php namespace ProcessWire; 

$modules->get('InputfieldPageGrid')->renderOptions(array("children" => true));

foreach($page->children() as $item) {
  echo $modules->get('InputfieldPageGrid')->renderItem($item); 
}

?>
