<?php namespace ProcessWire; 

 $modules->get('InputfieldPageGrid')->renderOptions(array("children" => true));

//echo $modules->get('InputfieldPageGrid')->renderGrid($page->pg); 

//foreach($page->pg as $item) {
//echo $modules->get('InputfieldPageGrid')->renderItem($item); 
//}

//echo '<div id="' . $this->sanitizer->attrName( $page->title ) . '" class="pg pg-drop pg-nested pg ' . $this->sanitizer->attrName( $page->title ) . '" data-id="'. $page->id .'">';

// needed for page ref fields to work
$parentGrid = $pages->get("pg=$page");

  if(isset($parentGrid)){

  } else {
  $parentGrid = null;
  }

foreach($page->children() as $item) {
echo $modules->get('InputfieldPageGrid')->renderItem($item, $parentGrid); 
}
//echo '</div>';

?>
