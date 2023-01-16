<?php

$lazyload = 'lazyload';

if (strpos($page->pg_video_options, 'controls') !== false) {
  $lazyload = '';
}

?>

<!--preloading video with scroll play/pause-->
<video title="<?= $page->pg_video->description ?>" <?php if($page->pg_video_options) {echo $page->pg_video_options;} else {echo 'muted loop';}?> data-autoplay="" webkit-playsinline playsinline class='<?= $lazyload ?> pg-fileupload pg-style-panel' preload="none" poster="<?php if($page->pg_video_poster) {echo $page->pg_video_poster->url;} ?>">
    <source src="<?= $page->pg_video->url ?>" type="video/mp4">
    Your browser does not support the video tag.
</video>

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
