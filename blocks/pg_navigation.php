<?php

namespace ProcessWire;

// breakpoint var when the hamburger is shown
$showHamburger = $page->pg_navigation_showHamburger ? $page->pg_navigation_showHamburger : 640;
$showHamburger .= 'px';

if (!function_exists("renderSubnav")) {
    function renderSubnav($pageItem) {

        $out = '<ul id="nav-main" class="nav-main" data-class="nav-main">';
        foreach ($pageItem->children() as $item) {
            $out .= renderSubnavItem($item);
        }
        $out .= '</ul>';
        return $out;
    }
}
if (!function_exists("renderSubnavItem")) {
    function renderSubnavItem($item) {
        $active = '';
        $subheadline = '';

        if (wire('page')->id == $item->id) {
            $active = 'nav-active';
        }

        $out = '<li class="nav-' . $item->name . ' nav-li nav-' . $item->name . '">';
        $out .= '<a href="' . $item->url() . '" class="' . $active . ' pg-style-panel">' . $item->title . '</a>';
        $out .= '</li>';
        return $out;
    }
}
?>

<!-- hamburger styles defined here so breakpoint var can be set -->
<style>
    @media (max-width: <?= $showHamburger ?>) {
        .pg-nav-menu {
            background-color: #fff;
            position: fixed;
            top: 0;
            align-items: center;
            width: 100vw;
            height: 100vh;
            right: 100vw;
            list-style-type: none;
            margin: 0;
            padding: 20px;
            display: flex;
            transition: all 500ms cubic-bezier(0.645, 0.045, 0.355, 1);
            z-index: 98;
        }

        .pg-nav li {
            margin: 0;
        }

        .pg-nav ul {
            display: block;
        }

        .pg-nav a {
            padding: 10px 0 10px 10px;
        }

        .pg-nav .hamburger {
            display: block;
        }

    }
</style>

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