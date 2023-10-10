<?php

namespace ProcessWire;

if (!$page->pg_iframe_url){
   echo '<div class="pg-iframe-empty-placeholder"></div>';
   return;
};

$vendor = '';
$title = $page->pg_iframe_title;
$thumbnail = $page->pg_iframe_thumbnail;
if (str_contains($page->pg_iframe_url, 'youtube')) $vendor = 'youtube';
if (str_contains($page->pg_iframe_url, 'vimeo')) $vendor = 'vimeo';

//get thumbnail and title from youtube and save to page meta, so no need to get it clientside (DSGVO)
if (!$thumbnail && ($vendor === 'youtube' || $vendor === 'vimeo') && $pagegrid->isBackend()) {

    if ($vendor === 'youtube') {
        $url = str_replace('watch?v=', 'embed/', $page->pg_iframe_url);
        $url = "https://noembed.com/embed?url=" . $url;
    }

    if ($vendor === 'vimeo') {
        $url = "https://noembed.com/embed?url=" . $page->pg_iframe_url;
    }

    $json = file_get_contents($url);
    $obj = json_decode($json);
    if (!$title && $obj && isset($obj->title)) $page->meta()->set('iframeTitle', $obj->title);
    if (!$thumbnail && $obj && isset($obj->thumbnail_url)) {
        //dwonload image
        $linkThumbnail = $obj->thumbnail_url;
        $imageFolder = $config->paths->files . $page->id;
        if (!is_dir($imageFolder)) mkdir($imageFolder); // create folder if it doesn't exist
        $img = file_get_contents($linkThumbnail);
        $imgName = basename($linkThumbnail);
        if ($img) file_put_contents($imageFolder . substr($linkThumbnail, strrpos($linkThumbnail, '/')), $img);
        $page->meta()->set('iframeThumbnail',  $config->urls->files . $page->id . '/' . $imgName);
    }
}



if ($vendor === 'youtube' || $vendor === 'vimeo') {
    if (!$title && $page->meta('iframeTitle')) $title = $page->meta('iframeTitle');
    if (!$thumbnail && $page->meta('iframeThumbnail')) $thumbnail = $page->meta('iframeThumbnail');
}

if (!$pagegrid->isBackend() && !$title) $title = ' ';
if (!$pagegrid->isBackend() && !$thumbnail) $thumbnail = ' ';

?>

<div class="lazyframe" data-vendor="<?= $vendor ?>" data-title="<?= $title ?>" data-thumbnail="<?= $thumbnail ?>" data-ratio="<?= $page->pg_iframe_ratio->title ?>" data-src="<?= $page->pg_iframe_url ?>"></div>