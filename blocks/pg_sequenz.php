<?php namespace ProcessWire; ?>


<?php if($page->pg_sequenz->first()) { ?>

<canvas id="pg-sequenz-canvas" data-count="<?= $page->pg_sequenz->count() ?>" data-url="<?= $page->pg_sequenz->url() ?>" data-type="jpg" />

<!--load js inside backend-->
<?php if($pagegrid->isBackend()){ 
$filename= wire('config')->urls->templates.'blocks/'.$page->template->name.'.js';
echo '<script type="text/javascript" src="'.$filename.'"></script>';
} 
?>
<!--END load js inside backend-->

<?php } ?>
