=== Prefer ===

Contributors: templatesell
Theme URI: https://www.templatesell.com/item/prefer-grid-layout-wordpress-theme/
Author URI: https://www.templatesell.com/
Tags: grid-layout, one-column, two-columns, three-columns, four-columns, left-sidebar, right-sidebar, custom-background, custom-logo, custom-menu, featured-images, translation-ready, footer-widgets, custom-colors, custom-header, editor-style, rtl-language-support, theme-options, threaded-comments, blog, news
Requires at least: 6.0
Requires PHP: 7.4
Tested up to: 7.1
Stable tag: 1.1.11
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Description: A perfect theme for blog and magazine site. With masonry layout and multiple blog page layout, this theme is the awesome and minimal theme. This theme has search option, off-canvas sidebar, multiple sidebar options, footer options, featured slider, promo boxed, footer widgets and many more. Besides that, this theme comes with added custom widgets for author information, featured posts, social icons, etc. It comes with primary color option to change the whole site color with a single click. If you are looking for best feminine and SEO ready theme then this will be the perfect choice for you. Demo: https://templatesell.net/demo/prefer/ 


== Description ==

A perfect theme for blog and magazine site. With masonry layout and multiple blog page layout, this theme is the awesome and minimal theme.

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload Theme and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= Does this theme support any plugins? =

Prefer includes support for Infinite Scroll in Jetpack.

== Notes ==
* Custom pagination for numeric is made.

== Changelog ==
= 1.1.11 - August 20 2026 =
* Fixed - Fatal error on pages with non-ASCII permalinks. Percent-encoded characters in a URL were read as sprintf() format specifiers, which threw an uncaught ArgumentCountError on PHP 8 and returned a 500 for the whole page.
* Fixed - The featured slider never received its configuration. The markup read a variable that was never assigned, so data-slick was always empty and Slick fell back to its own defaults.
* Fixed - The View More pagination button sent the literal text "esc_attr($output_page)" as its page number, because the escaping call sat inside a quoted string.
* Fixed - The licence in style.css and readme.txt read "GNU General Prefer License", the result of a find and replace that caught the licence statement.
* Fixed - Stable tag said 1.0.0 while the theme was at 1.1.10, and threaded-comments was listed twice in the tags.
* Fixed - A stray echo inside a pre_get_posts filter, which risked sending output before the headers.
* Fixed - The widget script passed true where wp_register_script() expects a version, so it was versioned "1" and never moved to the footer.
* Fixed - Blockquotes referenced Playfair Display and the mobile menu referenced Roboto; neither was ever loaded, so both fell back to generic system fonts. Playfair Display is now bundled and the mobile menu uses the theme's own body font.
* Security - Added nonce and capability checks to the Upgrade To Pro notice dismissal, which previously wrote user meta straight from a GET parameter.
* Security - Escaped all remaining theme output, including the Customizer category control and the social sharing links.
* Changed - Google Fonts are now bundled with the theme instead of being requested from fonts.googleapis.com on every page view, so no visitor data is sent to a third party.
* Changed - Typography. Body copy and headings shared a line-height of 1.5, which was tight for 16px body text and loose for a 29px heading. Body copy is now 1.75 and headings 1.25, headings gained a little negative tracking, the top of the size scale was opened up so h1 reads clearly larger than h3, and font smoothing is enabled.
* Accessibility - Darkened the muted grey used for post meta from #989ea6 to #70757b, raising it from 2.7:1 to 4.65:1 against white.
* Accessibility - The primary colour #EF9D87 measured 2.13:1 against white and was used for link hover and focus states, post dates and tag links, so hovering a link made it harder to read. The default is now #ce461d at 4.65:1, which is the lightest colour on the same hue that meets WCAG AA. The old value can be restored in Customizer > Colors.
* Accessibility - Removed the blanket "outline: none !important" on links, which prevented child themes and plugins from providing focus indicators.
* Added - Block patterns and block styles, and add_editor_style() so the editor-style tag the theme has always advertised is finally backed by real editor styles.
* Added - Recommended plugins notice for the free Template Sell plugins. Nothing is bundled or installed automatically.
* Added - languages/prefer.pot so the theme can be translated.
* Changed - Every enqueued asset now carries the theme version instead of the copied 4.5.0 and 4.6.0 strings, and render-blocking scripts were moved to the footer.
* Changed - Requires PHP raised to 7.4 and Requires at least set to 6.0.
* Tested with WP 7.1

= 1.1.10 - January 09 2024 =
* Tested with WP 6.4
* Change copyright text
* Fixed customizer issue

= 1.1.9 - July 20 2022 =
* Tested with WP 6.0

= 1.1.8 - January 25 2022 =
* Fixed Copyright date
* Tested with WP 5.9

= 1.1.7 - November 01 2021 =
* Fixed Undefined variable in slider
* Fixed docs link url
* Fixed widget issues

= 1.1.6 - August 26 2021 =
* Fixed upgrade to pro link

= 1.1.5 - August 11 2021 =
* Tested with WP 5.8
* Disable new widget screen

= 1.1.4 - April 06 2021 =
* Added Rank Math breadcrumb compaibility

= 1.1.3 - March 14 2021 =
* Tested with WP 5.7

= 1.1.2 - February 09 2021 =
* Added pagination in search page

= 1.1.1 - January 30 2021 =
* Added option for header overlay color
* Added option to change the header image height

= 1.1.0 - January 01 2021 =
* Added option to show hide tags in single page
* Added option to change Menu text in mobile
* Added option to change the menu text to hamberger menu in mobile
* Tested with WordPress 5.6
* Tested with php 7.4
* Fixed some minor CSS issues

= 1.0.9 - October 19 2020 =
* Added link on blog page featured image

= 1.0.8 - October 18 2020 =
* Fixed Featured Image Option 
* Fixed customizer call back issues
* Removed the unwanted menu from functions file

= 1.0.7 - September 23 2020 =
* Fixed Read More in the content 
* Fixed some minor CSS issues

= 1.0.6 - September 06 2020 =
* Fixed Masonry Issue
* Tested with latest WP version. 
* Fixed some minor CSS issues

= 1.0.5 - August 24 2020 =
* Fixed Masonry Issue
* Fixed Keyboard Navigation
* Fixed some minor css issues

= 1.0.4 - August 13 2020 =
* Default value of customizer changed
* Fixed some minor css
* Changed logo width default value

= 1.0.3 - August 10 2020 =
* Fixed Reviewer Issues

= 1.0.2 - August 03 2020 =
* Changed `add_theme_page` to `add_menu_page`
* Screenshot Changed
* Fixed some minor CSS issues
* Tags Added

= 1.0.1 - July 22 2020 =
* Fixed breadcrumb issues
* Added breadcrumb for plugin support
* Added theme info page
* Added upgrade to pro 
* Added pro notice

= 1.0.0 - July 16 2020 =
* Initial release

== Credits ==

Prefer is free WordPress theme by, Template Sell.
Prefer is distributed under the terms of the GNU GPL v2 or later.


* Based on Underscores https://underscores.me/, (C) 2012-2017 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css https://necolas.github.io/normalize.css/, (C) 2012-2016 Nicolas Gallagher and Jonathan Neal, [MIT](https://opensource.org/licenses/MIT)
* BreadcrumbTrail, Copyright (c) 2008 - 2015, Justin Tadlock http://themehybrid.com/plugins/breadcrumb-trail
* Theia Sticky Sidebar https://github.com/WeCodePixels/theia-sticky-sidebar [MIT license]
* Slick Slider https://github.com/kenwheeler/slick/blob/master/LICENSE [The MIT License (MIT)]
* Font-Awesome https://github.com/FortAwesome/Font-Awesome FontAwesome 4.6.3 Copyright 2012 Dave Gandy Font License: SIL OFL 1.1 Code License: MIT License http://fontawesome.io/license/
* imagesLoaded MIT License https://imagesloaded.desandro.com/#mit-license
* Canvi The MIT License (MIT) https://github.com/thepinecode/canvi/blob/master/LICENSE.txt
* Pro notice - Theme Grill Demo Importer Plugin - GPL License
* Muli, Copyright (c) Vernon Adams, SIL Open Font License 1.1 https://fonts.google.com/specimen/Muli
* Josefin Sans, Copyright (c) Santiago Orozco, SIL Open Font License 1.1 https://fonts.google.com/specimen/Josefin+Sans
* Monsieur La Doulaise, Copyright (c) Sudtipos, SIL Open Font License 1.1 https://fonts.google.com/specimen/Monsieur+La+Doulaise
* Playfair Display, Copyright (c) Claus Eggers Sorensen, SIL Open Font License 1.1 https://fonts.google.com/specimen/Playfair+Display
  All four are bundled in assets/fonts/ and served locally rather than from fonts.googleapis.com.

== Screenshot Images [CCO License] ==
Image for theme screenshot, Copyright Bruce Mars
License: CC0 1.0 Universal (CC0 1.0)
Source: https://stocksnap.io/photo/man-celebrating-RMOCSAQNUG

Image for theme screenshot, Copyright Camila Cordeiro
License: CC0 1.0 Universal (CC0 1.0)
Source: https://stocksnap.io/photo/girl-woman-EPDJ57Y4TC

Image for theme screenshot, Copyright Brooke Cagle
License: CC0 1.0 Universal (CC0 1.0)
Source: https://stocksnap.io/photo/white-wall-U2CLPC1BKA

Image for theme screenshot, Copyright Pxhere
License: CC0 1.0 Universal (CC0 1.0)
Source: https://pxhere.com/en/photo/928515

* Sidbear icons for the customizer are self created and license under GPL.
