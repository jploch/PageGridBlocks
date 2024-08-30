<?php

$lazyload = 'lazyload';

if (strpos($page->pg_video_options, 'controls') !== false) {
  $lazyload = '';
}

$linkInternal = $page->pg_video_link ? $page->pg_video_link->url() : '';
$link = $linkInternal ? $linkInternal : $page->pg_video_link_external;

?>

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

  <?php if ($page->pg_video_caption && strip_tags($page->pg_video_caption)) { ?>
    <div class="caption" data-class="caption"><?= $page->pg_video_caption ?></div>
  <?php } ?>
  <?php if ($link && $page->pg_video) { ?>
  </a>
<?php } ?>
<!--

<button class="video-mute" onclick="enableMute()" type="button">Play Sound</button>

<script>
  function enableMute() {
    document.querySelectorAll('video').forEach(video => {
      video.muted = false;
    });
  }

</script>
-->