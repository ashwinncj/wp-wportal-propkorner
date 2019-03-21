<?php

function search_function() {
    ob_start();
    require_once WPORTAL__PLUGIN_DIR . './templates/search-tpl.php';
    return ob_get_clean();
}

?>