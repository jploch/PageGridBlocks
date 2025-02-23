<?php

namespace ProcessWire;

//get main page
$p = $pagegrid->getPage($page);
if (!$p || $p->id == 0) return;

$next = $p->next->id ? $p->next : $p->siblings->first();
$prev = $p->prev->id ? $p->prev : $p->siblings->last();
$indexLabel = $page->pg_prev_next_indexlabel ? $page->pg_prev_next_indexlabel : 'Index';
$prevLabel = $page->pg_prev_next_prevlabel ? $page->pg_prev_next_prevlabel : $prev->title;
$nextLabel = $page->pg_prev_next_nextlabel ? $page->pg_prev_next_nextlabel : $next->title;
$indexLink = $page->pg_prev_next_index ? $page->pg_prev_next_index->url() : $p->parent()->url();
?>
<div pg-wrapper>
    <div class="prev">
        <a class="prev-link" href="<?= $prev->url ?>">
            <span class="prev-icon">
                <svg height="55px" viewBox="0 0 81 55" width="81px" xmlns="http://www.w3.org/2000/svg">
                    <g fill="none" stroke="#000000" stroke-width="6">
                        <path d="m3.698 27.698h78" />
                        <path d="m2.121 26.121 27.577 27.577" />
                        <path d="m0 0 27.577 27.577" transform="matrix(0 -1 1 0 2.121 29.698)" />
                    </g>
                </svg>
            </span>
            <span class="prev-title"><?= $prevLabel; ?></span>
        </a>
    </div>

    <div class="index">
        <a class="index-link" href="<?= $indexLink ?>">
            <span class="index-title"><?= $indexLabel ?></span>
        </a>
    </div>

    <div class="next">
        <a class="next-link" href="<?= $next->url ?>">
            <span class="next-title"><?= $nextLabel ?></span>
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
</div>