<?php
// -------------------------------------------
// kirby snippet GENERAL
// Title:  plg-navbar-level3
// funct:  twitter bootstap navbar on lower level

// copyright: Jannik Beyerstedt | http://jannikbeyerstedt.de | jtByt.Pictures@gmail.com
// license: http://www.gnu.org/licenses/gpl-3.0.txt GPLv3 License

// usage:
// snippet('plg-navbar-level3'); 

// version: 1.0 (08.12.2014)
// changelog: 
// -------------------------------------------

// find the open/active page on the first level
$root  = $pages->children()->findOpen();
$items = ($root) ? $root->children()->visible() : false; 
?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?php echo url() ?>"><?php echo $site->menu_title()->html()?></a>
  </div>

  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
        <li <?php echo ($page->isChildOf($root)) ? '' : ' class="active"'?>><a href="<?php echo $root->url() ?>"> <i class="icon-home icon-large"></i> </a></li>
        
<?php foreach($items AS $item): ?>
        <li <?php echo ($item->isOpen()) ? ' class="active"' : '' ?>><a href="<?php echo $item->url() ?>"><?php echo html($item->title()) ?></a></li>
<?php endforeach ?>        
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
