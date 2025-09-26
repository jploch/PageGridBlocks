<?php

namespace ProcessWire;

// breakpoint var when the hamburger is shown
$showHamburger = $page->pg_navigation_showHamburger ? $page->pg_navigation_showHamburger : 640;
$showHamburger .= 'px';
$collapse = $page->pg_navigation_collapse;

//get page links, level has to be one more because of root page
$treeLevel = $page->pg_navigation_pages_level === '' ? 2 : $page->pg_navigation_pages_level + 1;
$rootPage = $page->pg_navigation_pages_root ? $page->pg_navigation_pages_root : $pages->get('/');
$pageLinksMarkup = $modules->get('BlocksNavigation')->renderPageTree($rootPage, $treeLevel, $collapse);

//get custom links with depth from repeater
$rpa = $page->pg_navigation_links;
$repeater_structure = $modules->get('BlocksNavigation')->getDepthStructure($page, $page->rootParent);
$customLinksMarkup = $modules->get('BlocksNavigation')->outputNestedList($repeater_structure, $rpa, $collapse);

// wire('page') returns parent page
// $page returns block page
?>

<!-- hamburger styles defined here so breakpoint var can be set -->
<style>
    @media (max-width: <?= $showHamburger ?>) {
        :where(.<?= $page->name ?>) .pg-nav-menu {
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

        :where(.<?= $page->name ?>) li {
            margin: 0;
            padding: 0;
        }

        :where(.<?= $page->name ?>) ul {
            display: block;
        }

        :where(.<?= $page->name ?>) ul ul ul,
        :where(.<?= $page->name ?>) ul ul {
            position: relative;
            left: 0;
            top: 0;
            opacity: 1;
            margin: 0 15px;
            visibility: visible;
        }

        :where(.<?= $page->name ?>) a {
            padding: 10px 0 10px 15px;
            display: inline-block;
        }

        :where(.<?= $page->name ?>) ul ul a {
            padding: 8px 0 8px 15px;
        }

        :where(.<?= $page->name ?>) .hamburger {
            display: block;
        }

        :where(.<?= $page->name ?>) .nav-expand {
            display: block;
            opacity: 0.5;
        }

        :where(.<?= $page->name ?>) li:has(> .nav-expand) ul {
            display: none;
        }

        :where(.<?= $page->name ?>) li:has(> .nav-expanded)>ul {
            display: block;
        }

    }
</style>

<nav class="pg-nav" role="navigation" pg-wrapper>
    <!--mobile nav buttom-->
    <button id="hamburger-button" aria-haspopup="true" aria-expanded="false" aria-label="Menu" aria-controls="pg-nav-menu" class="hamburger-button hamburger hamburger--spin" type="button"
        onclick="
            document.querySelector('body').classList.toggle('nav-active');
            this.classList.toggle('is-active');
            this.setAttribute('aria-expanded', this.classList.contains('is-active') ? 'true' : 'false');
        "
    >
        <span class="hamburger-box">
            <span class="hamburger-inner hamburger-<?= $page->id ?>" data-class="hamburger-<?= $page->id ?>"></span>
        </span>
    </button>
    <!--Main nav-->
    <div id="pg-nav-menu" class="pg-nav-menu" data-class="pg-nav-menu">
        <ul id="nav-main" class="nav-main ul-level-1" data-class="nav-main">
            <?= $pageLinksMarkup ?>
            <?= $customLinksMarkup ?>
        </ul>
    </div>
</nav>