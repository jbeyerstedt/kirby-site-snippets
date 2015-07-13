#kirby-site-snippets: plg-carousel

## how to use


### prerequisites:
(Twitter) Bootstrap included in your template. With everything for the carousel enabled. (e.g. standard CSS and js file included)

The snippet code itself must be placed in the `site/snippets` folder. Of course you can add them in a subdirectory if this folder. (Especially useful if you use git submodules.)


### additional code to put in your snippets/ templates:

#### in your config
```php
// enable carousel
//c::set('enable_carousel', true);
```
Enable carousel. This is not relevant if your template containes all relevant scripts every time.

Additionally you need to include jquery.

#### before you closing body tag
```php
<?php if (c::get('enable_carousel')) : ?>
  <script type="text/javascript">
    $(document).ready(function () {
      $('.carousel').carousel('cycle');
    });
  </script>
<?php endif; ?>
```


### usage:
If eveythig is set up, including the snippet in your template is quite ease. Simple put
```php
snippet('plg-carousel', array('currentPage'=>$page));
```
surrounded by php tags.

#### Attention
**Then the snippet displays all your images contained a folder called `carousel` in your pages directory!** This is chossen to separate the carosuel images from all other files the page containes.

#### additional features
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



## contribution
Feel free to fork this repository an make it better.
