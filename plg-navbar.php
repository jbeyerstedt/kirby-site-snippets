<?php
// -------------------------------------------
// kirby snippet GENERAL
// Title:  plg-navbar
// funct:  create a twitter bootstrap navbar

// copyright: Jannik Beyerstedt | http://jannikbeyerstedt.de | jtByt.Pictures@gmail.com
// license: http://www.gnu.org/licenses/gpl-3.0.txt GPLv3 License

// usage:
// snippet('plg-navbar-level3'); 
// in the config.php:
// c::set('navbar-class', 'navbar-default');

// version: 1.2.0 (20.02.2015)
// changelog: 
// v1.1.0: add config option for the navbar style class
// v1.2.0: move .container in nav.navbar for affix scripts
// -------------------------------------------

// add default navbar-class if not set in config.php
$class = c::get('navbar-class');
if(!isset($class)) $class = 'navbar-inverse';
?>

<div class="navbar-wrapper">
<nav class="navbar <?php echo $class ?>" role="navigation">
<div class="container">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?php echo url() ?>"><?php echo html($site->menu_title())?></a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">        
<?php foreach($pages->visible() AS $p): ?>
<?php $subs = ($p->hasChildren()) ? $p->children() : false ?>

<?php if ($subs && $subs->count()): ?>
      <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo html($p->title()) ?> <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
<?php foreach($subs->visible() AS $s): ?>
          <li><a href="<?php echo $s->url() ?>"> <?php echo $s->title()?> </a></li>
<?php endforeach ?>
        </ul>
      </li>
<?php else: ?>
        <li <?php echo ($p->isOpen()) ? ' class="active"' : '' ?>> <a href="<?php echo $p->url() ?>"><?php echo html($p->title()) ?></a></li>
<?php endif ?>
<?php endforeach ?>
    </ul>
  </div><!-- /.navbar-collapse -->
  
</div>
</nav>
</div>