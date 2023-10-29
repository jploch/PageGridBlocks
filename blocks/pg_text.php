<?php namespace ProcessWire;

//allow to change tag
$pagegrid->renderOptions(array('page' => $page, 'tag' => 'h2', 'tags' => 'h1 h2 h3 h4 h5 h6 p'));
?>

<?= $page->pg_text ?>