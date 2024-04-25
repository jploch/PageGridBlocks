<?php

namespace ProcessWire;
if (!$templates->get('language')) return 'no language found!';
if (!$modules->isInstalled('LanguageSupport')) return 'no language found!';
if (!$page->parents()->get('template=pg_container')) return;

// get main document page for this item ($page in this context is the block item)
$mainPage = $pagegrid->getPage($page);
if(!$mainPage || !$mainPage->id) return;

foreach ($languages as $language) {
    $selected = '';

    // if this page isn't viewable (active) for the language, skip it
    if (!$mainPage->viewable($language)) continue;

    // if language is current user's language, make it selected
    if ($user->language->id == $language->id) $selected = "language-link-active";

    // determine the "local" URL for this language
    $url = $mainPage->localUrl($language);

    // output the option tag
    echo "<a href='$url' data-class='language-link' class='language-link $selected'>$language->title</a>";
}

