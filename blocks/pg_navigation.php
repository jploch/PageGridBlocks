<?php

namespace ProcessWire;

// breakpoint var when the hamburger is shown
$showHamburger = $page->pg_navigation_showHamburger ? $page->pg_navigation_showHamburger : 640;
$showHamburger .= 'px';
// wire('page') returns parent page
// $page returns block page
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
            transition: all 600ms cubic-bezier(0.645, 0.045, 0.355, 1);
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
    <button id="hamburger-button" class="hamburger-button hamburger hamburger--spin" type="button">
        <span class="hamburger-box">
            <span class="hamburger-inner hamburger-<?= $page->id ?>" data-class="hamburger-<?= $page->id ?>"></span>
        </span>
    </button>

    <!--Main nav-->
    <div id="pg-nav-menu" class="pg-nav-menu" data-class="pg-nav-menu">
        <ul id="nav-main" class="nav-main" data-class="nav-main">
            <?php foreach ($pages->get('/')->children() as $p) { ?>
                <?php $active = wire('page')->id == $p->id ? 'nav-active' : ''; ?>
                <li class="nav-<?= $p->name ?> nav-li">
                    <a href="<?= $p->url() ?>" class="<?= $active ?>"><?= $p->title ?></a>
                </li>
            <?php } ?>
            <?php foreach ($page->pg_navigation_links as $l) { ?>
                <?php $active = wire('page')->title == $l->pg_navigation_link_label ? 'nav-active' : ''; ?>
                <?php $target = str_starts_with($l->pg_navigation_link, 'http') ? 'target="_blank"' : ''; ?>
                <li class="nav-<?= $l->pg_navigation_link_label ?> nav-li">
                    <a href="<?= $l->pg_navigation_link ?>" <?= $target ?> class="<?= $active ?>"><?= $l->pg_navigation_link_label ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>

</nav>