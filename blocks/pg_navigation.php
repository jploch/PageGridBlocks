<?php namespace ProcessWire;
require_once 'pg_navigation_functions.php';
?>

<nav id="pg-nav" class="pg-nav" role="navigation">

    <!--mobile nav buttom-->
    <button id="hamburger-button" class="hamburger hamburger--spin" type="button">
        <span class="hamburger-box">
            <span class="hamburger-inner hamburger-<?= $page->id ?>" data-class="hamburger-<?= $page->id ?>"></span>
        </span>
    </button>

    <!--Main nav-->
    <div id="pg-nav-menu" class="pg-nav-menu" data-class="pg-nav-menu">
        <?php echo renderSubnav($pages->get("/")); ?>
    </div>

</nav>
