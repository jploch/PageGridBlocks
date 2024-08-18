<?php

namespace ProcessWire;
?>

<!-- Ajax update can cause JS errors with custom code -->
<?php if ($pagegrid->isBackend() && $config->ajax) { ?>
<code>Reload your browser to see your custom code changes.</code>
<?php return; } ?>

<?php if ($pagegrid->isBackend()) { ?>
    <style>
        .pg-code *:not(.ui-resizable-handle) {
            pointer-events: none !important;
        }
    </style>
<?php } ?>

<!-- render code -->
<?= $page->pg_code ?>