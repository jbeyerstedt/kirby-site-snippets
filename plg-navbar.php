<?php
// -------------------------------------------
// kirby snippet GENERAL
// Title:  plg-navbar
// funct:  create a twitter bootstrap navbar

// copyright: Jannik Beyerstedt | http://jannikbeyerstedt.de | jtByt.Pictures@gmail.com
// license: http://www.gnu.org/licenses/gpl-3.0.txt GPLv3 License

// version: 1.0 (16.11.2014)
// changelog: 
// -------------------------------------------
?>

<div class="navbar-wrapper" >
<div class="container">
<nav class="navbar navbar-inverse" role="navigation">
  
  <!-- Brand and toggle get grouped for better mobile display -->
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
  
</nav>
</div>
</div>