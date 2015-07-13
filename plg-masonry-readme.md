#kirby-site-snippets: plg-masonry-*

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
c::set('enable_masonry', true);
c::set('masonry_width', 170);       // set a width for masonry images
c::set('masonry_limit_size', 1300); // limit the source image size (long edge)
// choose a lighbox type (both snippets required)
c::set('photo_lightbox', 'swipebox'); // preferred
//c::set('photo_lightbox', 'fancybox'); // only preferred, if v3 is used
```
Of course, only enable fancybox OR swipebox.

#### in your html head
```php
<head>
  [...]
    
<?php if (c::get('enable_masonry')) : $width = c::get('masonry_width'); ?>
  <style>
    #masonry {margin: 0 auto;}
      .masonryitem { width: <?php echo $width ?>px; margin-bottom: 10px;}
      .masonryitem.w2 { width: 40%; }
  </style>
<?php endif; ?>

<?php if (c::get('photo_lightbox')=='swipebox') : ?>
  <?php echo css('assets/swipebox/src/css/swipebox.css') ?>
<?php endif; ?>
</head>
```

#### before you closing body tag
```php
<?php if (c::get('enable_masonry')) : ?>
  <?php echo js('assets/masonry/dist/masonry.pkgd.min.js') ?>
<?php endif; ?>

<?php if (c::get('photo_lightbox')=='fancybox') : ?>
  <?php echo css('assets/fancybox/source/jquery.fancybox.css') ?>
  <?php echo js('assets/fancybox/source/jquery.fancybox.pack.js') ?>
<?php endif; ?>

<?php if (c::get('photo_lightbox')=='swipebox') : ?>
  <?php echo js('assets/swipebox/src/js/jquery.swipebox.min.js') ?>
<?php endif; ?>
```


### usage:
If eveythig is set up, including the snippet in your template is quite ease. Simple put
```php
snippet('plg-masonry-fb', array('currentPage'=>$page));
```
surrounded by php tags.

Then the snippet displays all your images contained in the pages directory.



## contribution
Feel free to fork this repository an make it better.
