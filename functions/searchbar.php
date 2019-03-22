<?php

function searchbar_function() {
    ob_start();
    require_once WPORTAL__PLUGIN_DIR . './templates/searchbar-tpl.php';
    return ob_get_clean();
}

?>