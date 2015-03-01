<?php
// -------------------------------------------
// kirby snippet GENERAL
// Title:  plg-navbar-level2
// funct:  twitter bootstap navbar on lower level

// copyright: Jannik Beyerstedt | http://jannikbeyerstedt.de | code@jannikbeyerstedt.de
// license: http://www.gnu.org/licenses/gpl-3.0.txt GPLv3 License

// usage:
// snippet('plg-navbar-level2', array('invisible'=>false, 'sub_home'=>false)); 
// in the config.php:
// c::set('navbar-class', 'navbar-default navbar-fixed-top');

// version: 1.1.1 (01.03.2015)
// changelog: 
// v1.1.0: add config option for the navbar style class
// v1.1.1: bugfixes with default values
// -------------------------------------------

// add default navbar-class if not set in config.php
$class = c::get('navbar-class');
if(!isset($class)) $class = 'navbar-inverse navbar-fixed-top';

// defaults
$sub_home = false;
$invisible = false;

// find the open/active page on the first level
$root  = $pages->findOpen();
if ($invisible==true) {
  $items = ($root) ? $root->children() : false; 
}else {
  $items = ($root) ? $root->children()->visible() : false; 
}
?>

<nav class="navbar <?php echo $class ?>" role="navigation">
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
<?php if($sub_home==true) : ?>
        <li <?php echo ($page->isChildOf($root)) ? '' : ' class="active"'?>><a href="<?php echo $root->url() ?>"> <i class="icon-home icon-large"></i> </a></li>
<?php endif; ?>
      
<?php foreach($items AS $item): ?>
        <li <?php echo ($item->isOpen()) ? ' class="active"' : '' ?>><a href="<?php echo $item->url() ?>"><?php echo html($item->title()) ?></a></li>
<?php endforeach ?>        
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
