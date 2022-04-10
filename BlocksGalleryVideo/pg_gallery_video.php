<!--render with first to work in page ref field-->
<?php if ($page->pg_gallery_video): ?>

<figure class="photoswipe-item">
    <a href="<?= $page->pg_gallery_video->url ?>" itemprop="contentUrl" data-size="1024x768" data-type="video" data-video='<div class="video-wrapper-main"><div class="video-wrapper"><video title="<?= $page->description ?>" width="960" class="pswp__video" src="<?= $page->pg_gallery_video->url ?>" <?php if($page->pg_gallery_video_options) {echo $page->pg_gallery_video_options;} else {echo "autoplay muted loop";}?>></video></div>
          </div>'>

        <video title="<?= $page->pg_gallery_video->description ?>" <?php if($page->pg_gallery_video_options) {echo $page->pg_gallery_video_options;} else {echo 'muted loop';}?> webkit-playsinline playsinline class='lazyload photoswipe-item-content' data-autoplay="" preload="none">
            <source src="<?= $page->pg_gallery_video->url ?>" type="video/mp4" class="pg-fileupload swipe-item">
            Your browser does not support the video tag.
        </video>

    </a>
    <!--     <figcaption itemprop="caption description">Image caption</figcaption>-->
</figure>


<?php endif; ?>
