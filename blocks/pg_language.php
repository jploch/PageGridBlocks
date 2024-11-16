<?php

namespace ProcessWire;

if (!$templates->get('language')) return 'no language found!';
if (!$modules->isInstalled('LanguageSupport')) return 'no language found!';
if (!$modules->isInstalled('LanguageSupportPageNames')) return 'please install the LanguageSupportPageNames module!';
if (!$page->parents()->get('template=pg_container')->id) return;

// check if there are more languages then the default language
$languageCount = count($pages->find('template=language, include=all'));
if ($languageCount <= 1) return 'no language found!';

// get main document page for this item ($page in this context is the block item)
$mainPage = $pagegrid->getPage($page);
if (!$mainPage || !$mainPage->id) return;

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
