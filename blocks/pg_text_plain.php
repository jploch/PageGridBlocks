<?php namespace ProcessWire;

//allow to change tag
$pagegrid->renderOptions(array('page' => $page, 'tag' => 'h2', 'tags' => 'h1 h2 h3 h4 h5 h6 p'));

// sanitize value, allow div for inline editor to work (field should use TextformatterEntities formatter and strip tags option)
$value = $sanitizer->textarea($page->pg_text_plain, ['allowableTags' => '<div>']);

echo $value;

?>
