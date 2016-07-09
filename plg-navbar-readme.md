# kirby-site-snippets: plg-navbar and plg-navbar-level*
**license:** GNU GPL v3


## User Manual
There are three version of the navbar snippet. One "normal" navbar ant two for different levels.  
The normal navbar displays everything from root level, but sometimes there is a navbar needed, which displayes all site beginning at level 2 or 3 - e.g. for a site with several quite independent sections.

### Prerequisites:
(Twitter) Bootstrap included in your template. With everything for a navbar enabled.

The snippet code itself must be placed in the `site/snippets` folder. Of course you can add them in a subdirectory if this folder. (Especially useful if you use git submodules.)


### Additional code to put in your snippets/ templates:


##### in your config
```php
// twitter bootstap navbar color class
c::set('navbar-class', 'navbar-default');
c::set('navbar-affix', true); //needs some boostrap script!
// c::set('navbar-ignoreChildren', true); //disable dropdowns for children pages
```
Set the navbar class you want (toggles style and position). See the [boostrap docs](http://getbootstrap.com/components/#navbar) for more info.  
If you have content above your navbar and want your navbar affixed when scrolling down, set `navbar-addix`. But keep a look at <http://getbootstrap.com/javascript/#affix>.  
Additionally you can disable the dropdown menus for child pages.  

By default the navbar does only display visible pages.

##### before you closing body tag
```php
<?php if (c::get('navbar-affix')) : ?>
  <script>
    $('.navbar-wrapper').affix({
          offset: {
            top: $('header').height()
          }
    });
  </script>
<?php endif; ?>
```


### Usage:
If eveythig is set up, including the snippet in your template is quite easy. Simple put
```php
snippet('plg-navbar');
```
in your template code, or
```php
snippet('plg-navbar-level3');
```
for a navbar at level 3.
Of course this must be somewhere between php-tags, so that php interprets this code.

#### navbar-level-2
Currently there are some additional features for the navbar at level 2. I really need to maintain these plugins more often!

You can specify that all pages should be displayed, not only the visible ones. Add `invisible=>true` to the options array.

Another feature is to have your logo as the root link, but also another button for the home-page of your level 2 section. So you have your normal home page at root, but also a home page at level 1 which is the root of the level 2 pages this navbar displayes.  
You can enable this by setting `sub_home=>true`.

So the code to add is something like this:
```php
snippet('plg-navbar-level2', array('invisible'=>false, 'sub_home'=>false));
```


## Contribution
Feel free to fork this repository an make it better.
