<?php
// -------------------------------------------
// kirby snippet GENERAL
// Title:  plg-masonry-sb (with SWIPEBOX (http://brutaldesign.github.io/swipebox/))
// funct:  create a image masonry + swipebox (with js from: http://masonry.desandro.com)

// copyright: Jannik Beyerstedt | http://jannikbeyerstedt.de | code@jannikbeyerstedt.de
// license: http://www.gnu.org/licenses/gpl-3.0.txt GPLv3 License

// usage:
// snippet('plg-masonry-sb', array('currentPage'=>$page));

// and set these constants in config.php:
// c::set('plg_masonry.lightbox', 'fancybox');
// c::set('plg_masonry.enable', true);
// c::set('plg_masonry.width', 170);
// c::set('plg_masonry.quality', 75);
// c::set('plg_masonry.class');           // html class to be set
// c::set('plg_masonry.sizelimit', 1300); // limit the source image size (long edge)
// c::set('plg_masonry.sort', 'sort');    // sortBy parameter: sort, title, etc.
// c::set('plg_masonry.dir', 'asc');      // sortBy direction: asc, desc

// version: 1.3.0 (21.08.2015)
// changelog:
// v1.0.1: add global parameters
// v1.1.0: all logic now in this snippet
// v1.2.0: option to limit source image size
// v1.3.0: new options for sorting of the images. WARNING: INCOMPATIBLE!
// -------------------------------------------

$width = c::get('plg_masonry.width');
$quali = c::get('plg_masonry.quality', 75);
$limit = c::get('plg_masonry.sizelimit');
$class = c::get('plg_masonry.class');
if($limit != NULL)  $max_size = $limit;
$sort = c::get('plg_masonry.sort', 'title');
$sdir = c::get('plg_masonry.dir', 'desc');

// display masonry if there are pictures to display
if($currentPage->hasImages()) :
$images = $currentPage->images()->sortBy($sort, $sdir);
?>
<div id="masonry">
<?php foreach($images as $pic): ?>
  <div class="masonryitem">
<?php
if(isset($max_size)) :
  ($pic->width() > $pic->height()) ? $big_img = $pic->thumb(['width' => $max_size])
                                   : $big_img = $pic->thumb(['height' => $max_size]);
?>
    <a class="swipebox" rel="gallery" href="<?php echo $big_img->url() ?>">
<?php else: ?>
    <a class="swipebox" rel="gallery" href="<?php echo $pic->url() ?>">
<?php endif; ?>
      <?php
      $imgurl = $pic->url();
      $srcset = $pic->srcset([
        '1x' => ['width'=>$width, 'quality'=>$quali],
        '2x' => ['width'=>$width*2, 'quality'=>$quali],
        '3x' => ['width'=>$width*3, 'quality'=>$quali],
      ]);
      $alt = ((!$pic->alt()->isEmpty()) ? 'alt="'.$pic->alt()->html().'"' : "");
      echo '<img src="'.$imgurl.'" class="'.$class.'" '.$alt.' srcset="'.$srcset.'" />';
      ?></a>
  </div>
<?php endforeach ?>
</div>
<?php endif ?>
