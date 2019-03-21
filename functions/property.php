<?php

function property_function() {
    ob_start();
    require_once WPORTAL__PLUGIN_DIR . './templates/property-tpl.php';
    return ob_get_clean();
}

?>