<?php

//Shortcode registration here

add_shortcode('radel-login', 'login_function');
add_shortcode('radel-register', 'register_function');
add_shortcode('propkorner-edit-listing', 'edit_listing_shortcode_function');
add_shortcode('propkorner-search', 'search_function');
add_shortcode('propkorner-property', 'property_function');

// run it before the headers and cookies are sent
require_once WPORTAL__PLUGIN_DIR . './functions/register.php';
require_once WPORTAL__PLUGIN_DIR . './functions/login.php';
require_once WPORTAL__PLUGIN_DIR . './functions/editlisting.php';
require_once WPORTAL__PLUGIN_DIR . './functions/search.php';
require_once WPORTAL__PLUGIN_DIR . './functions/property.php';
