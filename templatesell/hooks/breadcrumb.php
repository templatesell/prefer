<?php
/**
 * Functions to manage breadcrumbs
 */
if (!function_exists('prefer_breadcrumb_options')) :
    function prefer_breadcrumb_options()
    {
        global $prefer_theme_options;
        if (1 == $prefer_theme_options['prefer-extra-breadcrumb']) {
            prefer_breadcrumbs();
        }
    }
endif;
add_action('prefer_breadcrumb_options_hook', 'prefer_breadcrumb_options');

/**
 * BreadCrumb Settings
 */
if (!function_exists('prefer_breadcrumbs')):
    function prefer_breadcrumbs()
    {
        if (!function_exists('prefer_breadcrumb_trail')) {
            require get_template_directory() . '/templatesell/breadcrumbs/breadcrumbs.php';
        }
        $breadcrumb_args = array(
            'container' => 'div',
            'show_browse' => false
        );        
        prefer_breadcrumb_trail($breadcrumb_args);
    }
endif;
add_action('prefer_breadcrumbs_hook', 'prefer_breadcrumbs');