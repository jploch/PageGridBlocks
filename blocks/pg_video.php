<?php

$lazyload = 'lazyload';

if (strpos($page->pg_video_options, 'controls') !== false) {
  $lazyload = '';
}

?>

<!--preloading video with scroll play/pause-->
<pg-edit page="<?= $page->id ?>" field="pg_video">
  <?php if ($page->pg_video) { ?>
    <video title="<?= $page->pg_video->description ?>" <?= $page->pg_video_options ? $page->pg_video_options : 'muted loop' ?> data-autoplay="" webkit-playsinline playsinline class='<?= $lazyload ?>' preload="none" poster="<?= $page->pg_video_poster ? $page->pg_video_poster->url : '' ?>">
      <source src="<?= $page->pg_video->url ?>" type="video/mp4">
      Your browser does not support the video tag.
    </video>
  <?php } ?>
</pg-edit>

<?php if ($page->pg_video_caption) { ?>
    <div class="caption" data-class="caption"><?= $page->pg_video_caption ?></div>
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