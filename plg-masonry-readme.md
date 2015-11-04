#kirby-site-snippets: plg-masonry-*

## ATTENTION: incompatible update from v1.2.0 to v1.3.0
I´ve added some options to this plugin, which lead to the first any probably only incompatible update. With this update I´ve unified the option names and adapted them to the "namespacing" which kirby uses.
There are these changes:
`enable_masonry` to `plg_masonry.enable`
`masonry_width` to `plg_masonry.width`
`masonry_limit_size` to `plg_masonry.sizelimit`
`photo_lightbox` to `plg_masonry.lightbox`


## how to use
There are two version of the masonry snippet. One for fancybox and another for swipebox.


### prerequisites:
- masonry: <http://masonry.desandro.com>
- swipebox: <http://brutaldesign.github.io/swipebox/>
- fancybox: <http://fancybox.net/>

The following code examples assume, these locations:

- masonry in `assets/masonry.pkgd.min.js`
- swipebox in `assets/swipebox`
- fancybox in `assets/fancybox`

Additionally you need to include jquery.

The snippet code itself must be placed in the `site/snippets` folder. Of course you can add them in a subdirectory if this folder. (Especially useful if you use git submodules.)


### additional code to put in your snippets/ templates:
All these examples are made to switch between swipebox and fancybox. If you only have one, you can ret rid of all the if-cases.


#### in your config
```php
c::set('plg_masonry.enable', true);         // enable additional scripts
c::set('plg_masonry.lightbox', 'swipebox'); // swipebox, fancybox
c::set('plg_masonry.width', 170);           // set a width for masonry images
c::set('plg_masonry.sizelimit', 1300);      // limit the source image size (long edge)
c::set('plg_masonry.sort', 'title');        // sortBy parameter: sort, title, etc.
c::set('plg_masonry.dir', 'desc');          // sortBy direction: asc, desc
```
`plg_masonry.enable`: enables the additional javascript, if you use my code examples. This is not relevant if your template containes all relevant scripts every time.

Additionally there are options for kirby´s `sortBy` method, which sorts the images.
`plg_masonry.sort`: sort images by this field
`plg_masonry.dir`: sort images in this direction


#### in your html head
```php
<head>
  [...]

<?php if (c::get('plg_masonry.enable')) : $width = c::get('plg_masonry.width'); ?>
  <style>
    #masonry {margin: 0 auto;}
      .masonryitem { width: <?php echo $width ?>px; margin-bottom: 10px;}
      .masonryitem.w2 { width: 40%; }
  </style>
<?php endif; ?>

<?php if (c::get('plg_masonry.lightbox')=='swipebox') : ?>
  <?php echo css('assets/swipebox/src/css/swipebox.css') ?>
<?php endif; ?>
</head>
```

#### before you closing body tag
```php
<?php if (c::get('plg_masonry.enable')) : ?>
  <?php echo js('assets/masonry/dist/masonry.pkgd.min.js') ?>
<?php endif; ?>

<?php if (c::get('plg_masonry.lightbox')=='fancybox') : ?>
  <?php echo css('assets/fancybox/source/jquery.fancybox.css') ?>
  <?php echo js('assets/fancybox/source/jquery.fancybox.pack.js') ?>
<?php endif; ?>

<?php if (c::get('plg_masonry.lightbox')=='swipebox') : ?>
  <?php echo js('assets/swipebox/src/js/jquery.swipebox.min.js') ?>
<?php endif; ?>

<?php if (c::get('plg_masonry.lightbox')=='fancybox') : ?>
  <script type="text/javascript">
    $(document).ready(function () {
      $('.fancybox').fancybox({
          nextEffect: 'fade',
          prevEffect: 'fade'
      });
    });
  </script>
<?php endif; ?>
<?php if (c::get('plg_masonry.lightbox')=='swipebox') : ?>
  <script type="text/javascript">
  $(document).ready(function () {
    $('.swipebox' ).swipebox();
  });
  </script>
<?php endif; ?>

<?php if (c::get('plg_masonry.enable')) : ?>
  <script type="text/javascript">
    $('#masonry').masonry({
      isFitWidth: true,
      columnWidth: <?php echo c::get('plg_masonry.width') ?>,
      gutter: 10,
      itemSelector: '.masonryitem'
    });
  </script>
<?php endif; ?>
```
If you don´t want to switch between fancybox and swipebox, you can of course delete not needed code.


### usage:
If eveythig is set up, including the snippet in your template is quite ease. Simple put
```php
snippet('plg-masonry-sb', array('currentPage'=>$page)); // for swipebox
// OR
snippet('plg-masonry-fb', array('currentPage'=>$page)); // for fancybox
```
surrounded by php tags.

Then the snippet displays all your images contained in the pages directory.



## contribution
Feel free to fork this repository an make it better.
