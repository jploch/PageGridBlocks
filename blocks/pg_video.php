<?php

$lazyload = 'lazyload';

if (strpos($page->pg_video_options, 'controls') !== false) {
  $lazyload = '';
}

$linkInternal = $page->pg_video_link ? $page->pg_video_link->url() : '';
$link = $linkInternal ? $linkInternal : $page->pg_video_link_external;

$caption = $page->pg_video_caption ? $page->pg_video_caption : '';

//sometimes tinyMCE puts empty tags inside caption, so we use this to check if empty
$pattern = '~^(?:\xC2\xA0|&nbsp;| |\r|\n|\t)*(.*?)(?:\xC2\xA0|&nbsp;| |\r|\n|\t)*$~';
$hasCaption = strip_tags(preg_replace($pattern, '$1', $caption));

//add classes to rich text elements, so they can be styles individually in the style panel
$caption = $pagegrid->addRichTextClasses($caption, 'caption');

?>
<div pg-wrapper>
  <!--preloading video with scroll play/pause-->
  <?php if ($link && $page->pg_video) { ?>
    <a href="<?= $link ?>" <?= $linkInternal ? '' : 'target="blank"' ?> class="image-link" data-class="image-link">
    <?php } ?>
    <pg-edit page="<?= $page->id ?>" field="pg_video">
      <?php if ($page->pg_video) { ?>
        <video title="<?= $page->pg_video->description ?>" <?= $page->pg_video_options ? $page->pg_video_options : 'muted loop' ?> data-autoplay="" webkit-playsinline playsinline class="<?= $lazyload ?> <?= $pagegrid->getCssClasses($page, 'video') ?> pg-media-responsive" preload="none" poster="<?= $page->pg_video_poster ? $page->pg_video_poster->url : '' ?>">
          <source src="<?= $page->pg_video->url ?>" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      <?php } ?>
    </pg-edit>

    <?php if ($hasCaption) { ?>
      <div class="caption <?= $pagegrid->getCssClasses($page, 'caption') ?>" data-class="caption"><?= $caption ?></div>
    <?php } ?>
    <?php if ($link && $page->pg_video) { ?>
    </a>
  <?php } ?>
</div>