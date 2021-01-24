# kirby-site-snippets: plg-carousel
**license:** GNU GPL v3


## User Manual

### Prerequisites:
(Twitter) Bootstrap 4 included in your template, with everything for the carousel enabled.

The snippet code itself must be placed in the `site/snippets` folder. Of course you can add them in a subdirectory of this folder. (Especially useful if you use git submodules.)


### Usage:
Add a file selection field named `carousel` in your blueprint, like:
```yml
carousel:
  type: fields
  fields:
    carousel:
      label: Carousel
      type: files
      query: page.images
      max: 10
```

Include the snippen in the corresponding template, like:
```php
snippet('plg-carousel', array('currentPage'=>$page));
```

If you like to have different html code in front of the carousel depending, whether there are files in it, use the advanced options:
```php
snippet('plg-carousel', array('currentPage'=>$page,
                              'preNormal'=>'some string or empty',
                              'preAlt'=>'some other string or empty'));
```

Optionally add more classes to the top-most div of the carousel by adding to the config.php:
```php
c::set('plg_carousel.class', 'carousel-fade'); // additional class on top-most div
```


## Contribution
Feel free to fork this repository and make it better.
