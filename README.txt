Historiador WordPress theme
===========================
A fork of the Twenty Seventeen WordPress theme, geared towards making 
a modern, full-featured personal website for use by Rui Tavares.


Developer information
---------------------
Developers: Protesilaos Stavrou, André Góis Fernandes
Requires at least: WordPress 4.7
Tested up to: WordPress 5.0
Version: 1.0
License: GNU General Public License Version 3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Tags: one-column, two-columns, right-sidebar, flexible-header, 
accessibility-ready, custom-colors, custom-header, custom-menu, 
custom-logo, editor-style, featured-images, footer-widgets, 
post-formats, sticky-post, theme-options, threaded-comments, 
translation-ready


About this theme
----------------
The main departure from the base theme is the incorporation of SCSS and 
Gulp build frameworks.  Emphasis is placed on the portability and 
maintainability of the code base, as this theme is intended to be used 
at least for five/six years, starting from the summer of 2018.

Further major changes pertain to the introduction of a WCAG AAA 
compliant colour palette, a consistent font scale, fluid font sizes, and 
accompanying spacing measurements.

The use of SCSS + Gulp delivers some important benefits, from the point
of view of a developer:

	* Faster development cycles.
	* More portable code.
	* The DRY principle (Don't Repeat Yourself) by using SCSS variables
	  and mixins.
	* Media queries are written in each component, instead of
	  replicating them in a separate style sheet, making for a more
	  readable source code.

In terms of performance optimisations, the following are the headline 
features:

	* Minification of output CSS.
	* Self host web fonts, instead of making an API call to Google
	  Fonts.



TODO Update documentation after this point.  Last reviewed on
2018-12-02.







Historiador build instructions
==============================
This tutorial assumes you have a working `git` environment and have already set up `nodejs`. It is also assumed that you are familiar with the command line.

If you do not satisfy these criteria, but still wish to work on Historiador, make sure you contact me about any questions you may have:
https://protesilaos.com/contact

Prior notice
------------
I am using GNU/Linux. The following will work on the following distros: Ubuntu 18.04, Linux Mint 19, Debian Buster/Sid (up-to-date as of 2018-06-28).

NOTE. Debian, Ubuntu, Linux Mint users (including those running Debian Buster/Sid) should *not use the Debian/apt packages* for nodejs, npm, gulp. Follow these instructions, instead:
https://nodejs.org/en/download/package-manager/#debian-and-ubuntu-based-linux-distributions

NOTE 2. If node-sass throws an error after having already executed `npm install`, then run `npm rebuild node-sass`.

Clone Historiador
-----------------
Start by launching the terminal application. First step is to clone the Historiador repository.
    
    git clone https://gitlab.com:protesilaos/historiador.git

This creates a folder "historiador" at your home user directory. If you already have such a folder, then use the following command instead:
    
    git clone https://gitlab.com:protesilaos/historiador.git ~/historiador-wordpress-theme

Now you get a folder named "historiador-wordpress-theme" at your user home directory.

Enter the new directory
-----------------------
Depending on which clone command you used (above step), you must now use the terminal to access the new directory.

If you used the first clone command, run the following:

    cd historiador

Else:

    cd historiador-wordpress-theme

Install node dependencies
-------------------------
You need to install all the build dependencies. Everything you need is already defined in `package.json`. Just run the following:

    npm install

Prepare gulp environment
------------------------
The above command will include the packages needed to develop the theme. But you need to also have a system-wide framework for `gulp`. Do the following:

    npm install -g gulp

This operation will most likely require escalated privileges (you need to be admin), so prepend `sudo` as follows:

    sudo npm install -g gulp



Editing Historiador
===================
REMEMBER: Historiador is a fork of Twenty Seventeen. The intention is to leave all the PHP-related code mostly in tact and focus on the styling part instead. Those PHP files provide the templates we work on, so it is assumed they will not need any major adjustments over the expected life cycle of this theme (approx. 2018-2024)

All build-related tasks (repetitive jobs) are handled by the `gulp` task runner. See the `gulpfile.js` file at the root of the project's directory for all the available tasks. Here is an example (lines starting with # are comments)

    # Make sure you are in the historiador directory
    cd historiador

    # Suppose you edited some .scss files
    # Now you need to convert them to the main style.css
    # Use this gulp task
    gulp style

In the `src` directory you will find the style sheet modules that go into the final style sheet that is read by WordPress. These are written in SCSS, which is a CSS pre-processor.

The `_variables.scss` file contains valuable inline documentation about some of the design decisions that govern this theme. In general, the source files are sufficiently documented, to provide for a smoother familiarisation with the code base.






--- ORIGINAL README BELOW ---

=== Twenty Seventeen ===
Contributors: the WordPress team
Requires at least: WordPress 4.7
Tested up to: WordPress 5.0-trunk
Version: 1.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: one-column, two-columns, right-sidebar, flexible-header, accessibility-ready, custom-colors, custom-header, custom-menu, custom-logo, editor-style, featured-images, footer-widgets, post-formats, rtl-language-support, sticky-post, theme-options, threaded-comments, translation-ready

== Description ==

Twenty Seventeen brings your site to life with header video and immersive featured images. With a focus on business sites, it features multiple sections on the front page as well as widgets, navigation and social menus, a logo, and more. Personalize its asymmetrical grid with a custom color scheme and showcase your multimedia content with post formats. Our default theme for 2017 works great in many languages, for any abilities, and on any device.

For more information about Twenty Seventeen please go to https://codex.wordpress.org/Twenty_Seventeen.

== Installation ==

1. In your admin panel, go to Appearance -> Themes and click the 'Add New' button.
2. Type in Twenty Seventeen in the search form and press the 'Enter' key on your keyboard.
3. Click on the 'Activate' button to use your new theme right away.
4. Go to https://codex.wordpress.org/Twenty_Seventeen for a guide on how to customize this theme.
5. Navigate to Appearance > Customize in your admin panel and customize to taste.

== Copyright ==

Twenty Seventeen WordPress Theme, Copyright 2016 WordPress.org
Twenty Seventeen is distributed under the terms of the GNU GPL

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

Twenty Seventeen bundles the following third-party resources:

HTML5 Shiv, Copyright 2014 Alexander Farkas
Licenses: MIT/GPL2
Source: https://github.com/aFarkas/html5shiv

jQuery scrollTo, Copyright 2007-2015 Ariel Flesler
License: MIT
Source: https://github.com/flesler/jquery.scrollTo

normalize.css, Copyright 2012-2016 Nicolas Gallagher and Jonathan Neal
License: MIT
Source: https://necolas.github.io/normalize.css/

Font Awesome icons, Copyright Dave Gandy
License: SIL Open Font License, version 1.1.
Source: http://fontawesome.io/

Bundled header image, Copyright Alvin Engler
License: CC0 1.0 Universal (CC0 1.0)
Source: https://unsplash.com/@englr?photo=bIhpiQA009k

== Changelog ==

= 1.6 =
* Released: May 17, 2018

https://codex.wordpress.org/Twenty_Seventeen_Theme_Changelog#Version_1.6

= 1.5 =
* Released: April 4, 2018

https://codex.wordpress.org/Twenty_Seventeen_Theme_Changelog#Version_1.5

= 1.4 =
* Released: November 14, 2017

https://codex.wordpress.org/Twenty_Seventeen_Theme_Changelog#Version_1.4

= 1.3 =
* Released: June 8, 2017

https://codex.wordpress.org/Twenty_Seventeen_Theme_Changelog#Version_1.3

= 1.2 =
* Released: April 18, 2017

https://codex.wordpress.org/Twenty_Seventeen_Theme_Changelog#Version_1.2

= 1.1 =
* Released: January 6, 2017

https://codex.wordpress.org/Twenty_Seventeen_Theme_Changelog#Version_1.1

= 1.0 =
* Released: December 6, 2016

Initial release
