<?php

namespace ProcessWire;
?>

<?php
// when user selects item directly under admin
if ($page->pg_reference) {
    echo $modules->get('InputfieldPageGrid')->renderItem($page->pg_reference);
    // echo $page->pg_reference->render();
}
?>
