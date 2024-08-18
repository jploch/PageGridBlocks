<?php

namespace ProcessWire;
?>

<!-- Ajax update can cause JS errors with custom code -->
<?php if ($pagegrid->isBackend() && $config->ajax) { ?>
<code>Reload your browser to see custom code changes.</code>
<?php return; } ?>

<?php if ($pagegrid->isBackend()) { ?>
    <style>
        .pg-code *:not(.ui-resizable-handle) {
            pointer-events: none !important;
        }
    </style>
<?php } ?>

<!-- render code -->
 <?php if(!$page->pg_code) { ?>
    <code>Custom Code</code>
 <?php } ?>
<?= $page->pg_code ?>