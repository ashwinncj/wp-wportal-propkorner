<?php

function search_function() {
    wp_enqueue_script('propkorner-search-js');
    ob_start();
    require_once WPORTAL__PLUGIN_DIR . './templates/search-tpl.php';
    return ob_get_clean();
}

?>