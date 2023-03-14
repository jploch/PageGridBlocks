<?php

namespace ProcessWire;

$parentPageID = $page->closest('template=pg_container');
$parentPageID = preg_replace('/[^0-9]/', '', $parentPageID->name);
$page = $pages->get($parentPageID);

if (!$page || $page->id == 0) return;

?>
<div class="prev">
    <a class="prev-link" href="<?php $prev = $page->prev->id ? $page->prev : $page->siblings->last();
                                echo $prev->url; ?>#top">
        <span class="prev-icon">
            <svg height="55px" viewBox="0 0 81 55" width="81px" xmlns="http://www.w3.org/2000/svg">
                <g fill="none" stroke="#000000" stroke-width="6">
                    <path d="m3.698 27.698h78" />
                    <path d="m2.121 26.121 27.577 27.577" />
                    <path d="m0 0 27.577 27.577" transform="matrix(0 -1 1 0 2.121 29.698)" />
                </g>
            </svg>
        </span>
        <span class="prev-title"><?php $prev = $page->prev->id ? $page->prev : $page->siblings->last();
                                    echo $prev->title; ?></span>
    </a>
</div>

<div class="index">
    <a class="index-link" href="<?= $page->parent()->url() ?>">Index</a>
</div>
<div class="next">
    <a class="next-link" href="<?php $next = $page->next->id ? $page->next : $page->siblings->first();
                                echo $next->url; ?>#top">
        <span class="next-title"><?php $prev = $page->prev->id ? $page->prev : $page->siblings->last();
                                    echo $next->title; ?></span>
        <span class="next-icon">
            <svg height="55px" viewBox="0 0 81 55" width="81px" xmlns="http://www.w3.org/2000/svg">
                <g fill="none" stroke="#000000" stroke-width="6">
                    <path d="m0 0h78" transform="matrix(-1 0 0 -1 78 28.121)" />
                    <path d="m0 0 27.577 27.577" transform="matrix(-1 0 0 -1 79.577 29.698)" />
                    <path d="m0 0 27.577 27.577" transform="matrix(0 1 -1 0 79.577 26.121)" />
                </g>
            </svg>
        </span>
    </a>
</div>