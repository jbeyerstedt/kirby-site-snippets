<?php
// -------------------------------------------
// kirby snippet GENERAL
// Title:  plg-navbar
// funct:  create a twitter bootstrap navbar

// copyright: Jannik Beyerstedt | http://jannikbeyerstedt.de | code@jannikbeyerstedt.de
// license: http://www.gnu.org/licenses/gpl-3.0.txt GPLv3 License

// usage:
// snippet('plg-navbar');
// in the config.php:
// c::set('navbar-class', 'navbar-default');
// c::set('navbar-affix', true); //needs some boostrap script!
// c::set('navbar-ignoreChildren', true); //disable dropdowns for children pages

// version: 1.2.1 (14.05.2015)
// changelog:
// v1.1.0: add config option for the navbar style class
// v1.2.0: move .container in nav.navbar for affix scripts
// v1.2.1: make menu_title optional (remove button if text is empty)
// -------------------------------------------

// add default navbar-class if not set in config.php
$class = c::get('navbar-class');
if(!isset($class)) $class = 'navbar-inverse';

$ignoreChildren = c::get('navbar-ignoreChildren');
if(!isset($ignoreChildren)) $ignoreChildren = false;
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
<?php if( !empty((string)$site->menu_title()->html()) ) : ?>
    <a class="navbar-brand" href="<?php echo url() ?>"><?php echo $site->menu_title()->html()?></a>
<?php endif; ?>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
<?php foreach($pages->listed() AS $p): ?>
<?php $subs = ($p->hasListedChildren()) ? $p->children() : false ?>

<?php if ($subs && $subs->count() && !$ignoreChildren): ?>
      <li class="dropdown <?php echo ($p->isOpen()) ? 'active' : '' ?>"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo html($p->title()) ?> <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
<?php foreach($subs->listed() AS $s): ?>
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
