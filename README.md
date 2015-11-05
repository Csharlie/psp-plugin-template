# A WordPress Plugin Template #

A template for creating plugins in WordPress.

## Requirements

| Prerequisite    | How to check | How to install
| --------------- | ------------ | ------------- |
| PHP >= 5.4.x    | `php -v`     | [php.net](http://php.net/manual/en/install.php) |
| Node.js 0.12.x  | `node -v`    | [nodejs.org](http://nodejs.org/) |
| gulp >= 3.8.10  | `gulp -v`    | `npm install -g gulp` |
| Bower >= 1.3.12 | `bower -v`   | `npm install -g bower` |

## Frontend Features

* [gulp](http://gulpjs.com/) build script that compiles both Sass and Less, checks for JavaScript errors, optimizes images, and concatenates and minifies files
* [Bower](http://bower.io/) for front-end package management
* [Sass](https://github.com/twbs/bootstrap-sass) [Bootstrap](http://getbootstrap.com/)

## WordPress Features

* [Custom Post Types](https://codex.wordpress.org/Post_Types) Custom post types are content types like posts and pages.
* [Custom Post Type Meta Boxes](https://codex.wordpress.org/Function_Reference/add_meta_box) It allows plugin developers to add meta boxes to the administrative interface.posts and pages.
* [Custom Taxonomies](https://codex.wordpress.org/Taxonomies) Taxonomy is a way to group things together.
* [Settings Page](https://codex.wordpress.org/Creating_Options_Pages) Settings page to customize its features, behaviour and styles.

## Installation

* Clone the git repo - `git clone https://github.com/Csharlie/psp-plugin-template.git` and then rename the directory to the name of your plugin.
* Activate the Plugin
* Add new Custom Post
* Add new Post and call Custom Posts with shortcode
* [custom-posts order="asc" orderby="title"]

## Plugin development

This Plugin uses [gulp](http://gulpjs.com/) as its build system and [Bower](http://bower.io/) to manage front-end packages.

### Install gulp and Bower

Building the theme requires [node.js](http://nodejs.org/download/). We recommend you update to the latest version of npm: `npm install -g npm@latest`.

From the command line:

1. Install [gulp](http://gulpjs.com) and [Bower](http://bower.io/) globally with `npm install -g gulp bower`
2. Navigate to the theme directory, then run `npm install`
3. Run `bower install`

### Available gulp commands

* `gulp` — Compile and optimize the files in your assets directory
* `gulp watch` — Compile assets when file changes are made

## Sources

** Original Template Release: **
[How to write a WordPress plugin](http://www.yaconiello.com/blog/how-to-write-wordpress-plugin/)
[Github Repo](https://github.com/fyaconiello/wp_plugin_template)

** Other Sources: **

[WordPress Plugin Development from Scratch](http://www.1stwebdesigner.com/wordpress-plugin-development-course-designers-1/)
[Create a Custom WordPress Plugin From Scratch](http://code.tutsplus.com/tutorials/create-a-custom-wordpress-plugin-from-scratch--net-2668)

[Getting started with gulp](https://markgoodyear.com/2014/01/getting-started-with-gulp/)
[http://callmenick.com/post/an-introduction-to-gulp](An Introduction To Gulp)
[Gulp for Beginners](https://css-tricks.com/gulp-for-beginners/)