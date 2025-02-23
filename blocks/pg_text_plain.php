<?php

namespace ProcessWire;

// sanitize value, allow div for inline editor to work (field should use TextformatterEntities formatter and strip tags option)
$value = $sanitizer->textarea($page->pg_text_plain);

if ($user->hasPermission('page-edit-front')) {
    $value = $sanitizer->textarea($page->pg_text_plain, ['allowableTags' => '<div>']);
}
?>

<h2 pg-tags="h1 h2 h3 h4 h5 h6 p" pg-wrapper>
    <?= $value ?>
</h2>