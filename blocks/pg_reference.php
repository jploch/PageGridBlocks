<?php

namespace ProcessWire;
?>

<?php
// when user selects item directly under admin
if ($page->pg_reference) {
    echo $pagegrid->renderItem($page->pg_reference);
    // echo $page->pg_reference->render();
}
?>
