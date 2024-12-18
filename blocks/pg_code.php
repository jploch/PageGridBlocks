<?php

namespace ProcessWire;
?>

<!-- Custom JS code can cause JS errors in backend, so we only load it for the frontend -->
<?php if ($pagegrid->isBackend() && str_contains($page->pg_code, '<script')) { ?>
    <code>Custom JS code will only be executed on the frontend.</code>
<?php return;
} ?>

<?php if ($pagegrid->isBackend()) { ?>
    <style>
        .pg-code *:not(.ui-resizable-handle, svg, path, g) {
            pointer-events: none !important;
        }
    </style>
<?php } else { ?>
    <style>
        .pg-item.pg-code {
            display: none !important;
        }
    </style>
<?php } ?>

<!-- render code -->
<?php if ($pagegrid->isBackend() && !$page->pg_code) { ?>
    <code>Custom Code</code>
<?php } ?>
<?= $page->pg_code ?>