<?php
// -------------------------------------------
// kirby snippet GENERAL
// Title:  plg-carousel
// funct:  twitter bootstap carousel for photos in carousel subpage (folder)

// copyright: Jannik Beyerstedt | http://jannikbeyerstedt.de | code@jannikbeyerstedt.de
// license: http://www.gnu.org/licenses/gpl-3.0.txt GPLv3 License

// usage:
// snippet('plg-carousel', array('currentPage'=>$page,
//                               'preNormal'=>'optional html to add before carousel',
//                               'preAlt'=>'html if snippet is not displayed (for other styles)'))

// and set these constants in config.php:
//c::set('plg_carousel.enable', true);
//c::set('plg_carousel.sort', 'sort'); // sortBy parameter: sort, title, etc.
//c::set('plg_carousel.dir', 'asc');   // sortBy direction: asc, desc

// version: 1.2.0 (21.08.2015)
// changelog: 
// v1.1.0: all logic now in this snippet
// v1.1.1: bugfix: fix error if no preNormal and preAlt attributes were set
// v1.2.0: new options for sorting of the images. WARNING: INCOMPATIBLE!
// -------------------------------------------

// display carousel only if there are images
$carouselFolder = $currentPage->children()->find('carousel');
if (!isset($preNormal)) {$preNormal="";}
if (!isset($preAlt)) {$preAlt="";}
$sort = c::get('plg_carousel.sort', 'title');
$sdir = c::get('plg_carousel.dir', 'desc');

// if folder exists
if (!(false==$carouselFolder) && ($carouselFolder->hasImages())) : echo $preNormal
?>
  
  <div id="myCarousel" class="carousel slide">

    <!-- Indicators -->
    <ol class="carousel-indicators">
<?php $n=0; foreach($carouselFolder->images()->sortBy($sort, $sdir) as $image): $n++; ?>
        <li data-target="#myCarousel" data-slide-to="<?php $n ?>" class="<?php if($n==1) echo ' active' ?>"></li>
<?php endforeach ?>
    </ol>

    <div class="carousel-inner">
<?php $n=0; foreach($carouselFolder->images()->sortBy($sort, $sdir) as $image): $n++; ?>
      <div class="item<?php if($n==1) echo ' active' ?>">
        <img src="<?php echo $image->url() ?>" alt="<?php echo $image->title()->html() ?>" />
        <div class="carousel-caption">
          <h3><?php echo $image->heading()->kirbytext() ?></h3>
          <?php echo $image->caption()->kirbytext() ?>
        </div>
      </div>
<?php endforeach ?>
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
  </div>

<?php else : echo $preAlt ?>

<?php endif ?>