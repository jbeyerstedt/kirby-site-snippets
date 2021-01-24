<?php
// -------------------------------------------
// kirby snippet GENERAL
// Title:  plg-carousel
// funct:  twitter bootstap carousel for photos in carousel subpage (folder)
//         modified for bootstrap 4 !

// copyright: Jannik Beyerstedt | http://jannikbeyerstedt.de | code@jannikbeyerstedt.de
// license: http://www.gnu.org/licenses/gpl-3.0.txt GPLv3 License

// usage:
// snippet('plg-carousel', array('currentPage'=>$page,
//                               'preNormal'=>'optional html to add before carousel',
//                               'preAlt'=>'html if snippet is not displayed (for other styles)'))
// -------------------------------------------

// display carousel only if there are images
$carouselFiles = $currentPage->carousel()->toFiles();
if (!isset($preNormal)) {$preNormal="";}
if (!isset($preAlt)) {$preAlt="";}

$carousel_class = c::get('plg_carousel.class', '');

// if the file selection is not empty
if (!$carouselFiles->isEmpty()) : echo $preNormal
?>

  <div id="myCarousel" class="carousel slide <?php echo $carousel_class ?>" data-ride="carousel">

    <!-- Indicators -->
    <ol class="carousel-indicators">
<?php $n=-1; foreach($carouselFiles as $image): $n++; ?>
        <li data-target="#myCarousel" data-slide-to="<?php echo $n ?>" class="<?php if($n==0) echo ' active' ?>"></li>
<?php endforeach ?>
    </ol>

    <div class="carousel-inner" role="listbox">
<?php $n=-1; foreach($carouselFiles as $image): $n++; ?>
      <div class="carousel-item<?php if($n==0) echo ' active' ?>">
        <img src="<?php echo $image->url() ?>" class="d-block w-100" alt="<?php echo $image->title()->html() ?>" />
        <?php if(($image->heading() != "") || ($image->caption() != "")) : ?>
        <div class="carousel-caption">
          <?php if($image->heading() != "") : ?><h3><?php echo $image->heading()->kirbytext() ?></h3><?php endif; ?>
          <?php echo $image->caption()->kirbytext() ?>
        </div>
        <?php endif; ?>
      </div>
<?php endforeach ?>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

<?php else : echo $preAlt ?>

<?php endif ?>
