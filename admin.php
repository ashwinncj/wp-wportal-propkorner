<?php

//Admin section functions included here

add_action('admin_menu', 'wportal_menus');

function wportal_menus() {
    add_menu_page('Propkorner', 'Propkorner', 'manage_options', 'propkorner_dashboard', 'dashboard_function', '', '100');

    //Products page
    add_submenu_page('propkorner_dashboard', 'Propkorner', 'Propkorner', 'manage_options', 'propkorner_listing', 'listing_function');
    add_submenu_page('propkorner_dashboard', 'Propkorner', 'Propkorner //temp', 'manage_options', 'propkorner_edit_listing', 'edit_listing_function');
}

function dashboard_function() {
    require_once WPORTAL__PLUGIN_DIR . './templates/dashboard-tpl.php';
}

function listing_function() {
    require_once WPORTAL__PLUGIN_DIR . './functions/listing.php';
}

function edit_listing_function() {
    require_once WPORTAL__PLUGIN_DIR . './functions/editlisting.php';
}
