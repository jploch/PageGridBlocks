<?php

namespace ProcessWire;
?>

<!-- reload iframe when ajax so we execute custom jsvascript code again -->
<?php if ($pagegrid->isBackend() && $config->ajax) { ?>
    <script>
        let iframe = document.querySelector('.pg-iframe-canvas');
        if(iframe) iframe.contentWindow.location.reload();
    </script>
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