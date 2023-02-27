<?php
/*
Plugin Name: Breakdance Shortcode URL Plugin
Plugin Slug: bde-shortcode-plugin
Description: Add the possibility to use shortcode in Dynamic Data for URLs
Version: 1.00.000
Author: Alexandre GUASCH
Author URI: https://www.outil-gestion-pro.com/
License: GPL-3.0+
*/

add_action('init', function () {
    // Check if Breakdance is installed and class/function exists
    if (!function_exists('\Breakdance\DynamicData\registerField') || !class_exists('\Breakdance\DynamicData\Field')) {
        return;
    }

    require_once(__DIR__.'/dynamic-data/shortcode-url.php');
    
    \Breakdance\DynamicData\registerField(new ShortcodeUrlField());
});
