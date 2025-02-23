<div pg-wrapper>
    <figure class="photoswipe-item">
        <?php if ($page->pg_gallery_video) : ?>
            <a href="<?= $page->pg_gallery_video->url ?>" itemprop="contentUrl" data-size="1024x768" data-type="video" data-video='<div class="video-wrapper-main"><div class="video-wrapper"><video title="<?= $page->description ?>" width="960" class="pswp__video" src="<?= $page->pg_gallery_video->url ?>" <?= $page->pg_gallery_video_options ? $page->pg_gallery_video_options : 'autoplay muted loop' ?> ></video></div></div>'>
            <?php endif; ?>
            <pg-edit page="<?= $page->id ?>" field="pg_gallery_video">
                <?php if ($page->pg_gallery_video) : ?>
                    <video title="<?= $page->pg_gallery_video->description ?>" <?php if ($page->pg_gallery_video_options) {
                                                                                    echo $page->pg_gallery_video_options;
                                                                                } else {
                                                                                    echo 'muted loop';
                                                                                } ?> webkit-playsinline playsinline class=' lazyload photoswipe-item-content' data-autoplay="" preload="none">
                        <source src="<?= $page->pg_gallery_video->url ?>" type="video/mp4" class="pg-fileupload swipe-item">
                        Your browser does not support the video tag.
                    </video>
                <?php endif; ?>
            </pg-edit>
            <?php if ($page->pg_gallery_video) : ?>
            </a>
        <?php endif; ?>
        <!--     <figcaption itemprop="caption description">Image caption</figcaption>-->
    </figure>
</div>