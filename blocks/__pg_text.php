<?php namespace ProcessWire;

//allow to change tag
$pagegrid->renderOptions(array('page' => $page, 'tag' => 'h2', 'tags' => 'h1 h2 h3 h4 h5 h6 p'));

// remove all tags but br
$value = $sanitizer->textarea(nl2br($page->pg_text), ['allowableTags' => '<br>']);

 // remove all tags but br, keep div tag for editor to work
if($user->hasPermission('PageFrontEdit')) {
    $value = $sanitizer->textarea(nl2br($page->pg_text), ['allowableTags' => '<br><div>']);
} 

echo $value;

?>
