<?php namespace ProcessWire;

//allow to change tag
$modules->get('InputfieldPageGrid')->renderOptions(array('pageId' => $page->id, 'tag' => 'h2', 'tags' => 'h1 h2 h3 h4 h5 h6 p'));

// textarea: remove all tags but br (keep "editor" tag for editor to work)
$value = strip_tags(html_entity_decode($page->pg_text), '<br><editor>');

echo $value;

?>
