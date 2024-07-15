<?php

namespace ProcessWire; ?>

<?= $page->pg_code ?>

<?php if ($pagegrid->isBackend()) { ?>
    <style>
        .pg-code *:not(.ui-resizable-handle) {
            pointer-events: none !important;
        }
    </style>
<?php } ?>