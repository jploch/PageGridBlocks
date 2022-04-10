<?php
namespace ProcessWire;
?>

<?php 
// when user selects item directly under admin
//if($page->pg_reference) {
//echo $modules->get('InputfieldPageGrid')->renderItem($page->pg_reference, false); 
//}

//
if($page->pg_reference) {
  
// when user selects a page from tree
$parentGrid = $page->pg_reference;
  
foreach($parentGrid->pg as $item) {
echo $modules->get('InputfieldPageGrid')->renderItem($item, $parentGrid, $wrapper = true, $context = 'reference'); 
}

}

?>
