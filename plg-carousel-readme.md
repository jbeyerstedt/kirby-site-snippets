# kirby-site-snippets: plg-carousel
**license:** GNU GPL v3

## ATTENTION: incompatible update from v1.1.1 to v1.2.0
I’ve added some options to this plugin, which lead to the first (and probably only) incompatible update. With this update I’ve unified the option names and adapted them to the "namespacing" which kirby uses.
There are these changes:
`enable_carousel` to `plg_carousel.enable`


## User Manual

### Prerequisites:
(Twitter) Bootstrap included in your template. With everything for the carousel enabled. (e.g. standard CSS and js file included)

The snippet code itself must be placed in the `site/snippets` folder. Of course you can add them in a subdirectory if this folder. (Especially useful if you use git submodules.)


### Additional code to put in your snippets/ templates:

##### in your config
```php
//c::set('plg_carousel.enable', true);
//c::set('plg_carousel.sort', 'title');
//c::set('plg_carousel.dir', 'desc');
//c::set('plg_carousel.interval', 2000); // image changing interval in milliseconds
```
`plg_carousel.enable`: enables the additional javascript, if you use my code examples. This is not relevant if your template containes all relevant scripts every time.  
Additionally there are options for kirby’s `sortBy` method, which sorts the images.  
`plg_carousel.sort`: sort images by this field  
`plg_carousel.dir`: sort images in this direction  


##### before you closing body tag
```php
<?php if (c::get('plg_carousel.enable')) : ?>
  <script type="text/javascript">
    $(document).ready(function () {
      $('.carousel').carousel({
        interval: <?php echo c::get('plg_carousel.interval', 2000); ?>
      });
      $('.carousel').carousel('cycle');
    });
  </script>
<?php endif; ?>
```
Additionally you need to include jquery.


### Usage:
If eveythig is set up, including the snippet in your template is quite ease. Simple put
```php
snippet('plg-carousel', array('currentPage'=>$page));
```
surrounded by php tags.

#### Attention
**Then the snippet displays all your images contained a folder called `carousel` in your pages directory!** This is chossen to separate the carosuel images from all other files the page containes.

#### Additional Features
To change your pages style if the carousel is displayed or not, there are two additional options you can add to the options array. These can contain html code, which is inserted right before the carousel code.  
This is not switched by the `enable_carousel` constant of the config file, but whether the `carousel` folder exists and containes images!

- `preNormal` html code when carousel is displayed
- `preAlt` alternative code when there are no images, so that the carousel code is skipped.

Then your code looks something like this:
```php
snippet('plg-carousel', array('currentPage'=>$page,
                              'preNormal'=>'some string or empty',
                              'preAlt'=>'some other string or empty'));
```


## Contribution
Feel free to fork this repository and make it better.
