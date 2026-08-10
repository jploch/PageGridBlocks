<?php

$isVideo = $page->pg_gallery_video ? true : false;
$caption = $page->pg_gallery_caption ?: $page->pg_gallery_video_caption ?: '';
$pattern = '~^(?:\xC2\xA0|&nbsp;| |\r|\n|\t)*(.*?)(?:\xC2\xA0|&nbsp;| |\r|\n|\t)*$~';
$hasCaption = strip_tags(preg_replace($pattern, '$1', $caption));

//add classes to rich text elements, so they can be styles individually in the style panel
$caption = $pagegrid->addRichTextClasses($caption, 'caption');

?>

<div pg-wrapper>
    <figure class="photoswipe-item" data-pswp-theme="<?= $page->pg_gallery_theme ? $page->pg_gallery_theme->value : 'dark' ?>">

        <?php if ($isVideo) : ?>

            <a href="<?= $page->pg_gallery_video->url ?>" itemprop="contentUrl" data-size="1024x768" data-type="video" data-video='<div class="video-wrapper-main"><div class="video-wrapper"><video title="<?= $page->description ?>" width="960" class="pswp__video" src="<?= $page->pg_gallery_video->url ?>" <?= $page->pg_gallery_video_options ? $page->pg_gallery_video_options : 'autoplay muted loop' ?> ></video></div></div>'>
            <pg-edit page="<?= $page->id ?>" field="pg_gallery_video">
                <video title="<?= $page->pg_gallery_video->description ?>" <?= $page->pg_gallery_video_options ? $page->pg_gallery_video_options : 'muted loop' ?> webkit-playsinline playsinline class='lazyload photoswipe-item-content' data-autoplay="" preload="none" poster="<?= $page->pg_gallery_video_poster ? $page->pg_gallery_video_poster->url : '' ?>">
                    <source src="<?= $page->pg_gallery_video->url ?>" type="video/mp4" class="pg-fileupload swipe-item">
                    Your browser does not support the video tag.
                </video>
            </pg-edit>
            </a>

        <?php else : ?>
            <?php if ($page->pg_gallery) : ?><a href="<?= $page->pg_gallery->size(0, 1000)->url(); ?>" itemprop="contentUrl" data-size="<?= $page->pg_gallery->size(0, 1000)->width(); ?>x<?= $page->pg_gallery->size(0, 1000)->height(); ?>"><?php endif; ?>
            <pg-edit page="<?= $page->id ?>" field="pg_gallery">
                <?php if ($page->pg_gallery) { ?>
                    <img src="<?= $page->pg_gallery->size(0, 300)->url(); ?>" data-srcset="<?= $page->pg_gallery->size(0, 300)->url(); ?> 300w, <?= $page->pg_gallery->size(0, 600)->url(); ?> 600w" data-sizes="auto" class="lazyload photoswipe-item-content pg-fileupload" />
                <?php } ?>
            </pg-edit>
            <?php if ($page->pg_gallery) : ?></a><?php endif; ?>
        <?php endif; ?>

        <?php if ($hasCaption) { ?>
        <div class="caption <?= $pagegrid->getCssClasses($page, 'caption') ?>" data-class="caption"><?= $caption ?></div>
        <?php } ?>

    </figure>
</div>
