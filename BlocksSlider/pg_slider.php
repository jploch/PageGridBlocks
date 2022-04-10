<?php namespace ProcessWire; 

$modules->get('InputfieldPageGrid')->renderOptions(array("children" => true));

?>

<!--Note: slider template must have family option and name set to allow one template to auto generate title-->

<div class="glide">
    <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides">

            <?php foreach ($page->children() as $item) { ?>
            <li class="glide__slide">
                <?php                                      
                                                         
               // needed for page ref fields to work
$parentGrid = $pages->get("pg=$page");

  if(isset($parentGrid)){

  } else {
  $parentGrid = null;
  }
                                        
                 echo $modules->get('InputfieldPageGrid')->renderItem($item, $parentGrid);
               ?>

            </li>
            <?php }; ?>

        </ul>
    </div>
    <div class="glide__arrows" data-glide-el="controls">
        <button id="slide-arrow-left" class="glide__arrow glide__arrow--left slide-arrow-left pg-style-panel" data-glide-dir="<">left</button>
        <button id="slide-arrow-right" class="glide__arrow glide__arrow--right slide-arrow-right pg-style-panel" data-glide-dir=">">right</button>
    </div>
</div>
