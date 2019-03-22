<?php
//Propkorner Plugin basic functions here

require_once WPORTAL__PLUGIN_DIR . '/shortcodes.php';
add_action('wp_enqueue_scripts', 'plugin_styles');
add_action('admin_enqueue_scripts', 'plugin_styles');

function plugin_styles() {
    wp_register_style('radel-css', WPORTAL__PLUGIN_URL . '/assets/css/radel-css.css', false, '1.1', 'all');
    wp_register_script('media-uploader', WPORTAL__PLUGIN_URL . '/assets/js/media-uploader.js', false, '1.1', 'all');
    wp_register_script('radel-js', WPORTAL__PLUGIN_URL . '/assets/js/radel-js.js', false, '1.1', 'all');
    wp_register_script('propkorner-search-js', WPORTAL__PLUGIN_URL . '/assets/js/propkorner-search.js', false, '1.1', 'all');
    wp_enqueue_style('radel-css');
    wp_enqueue_script('media-uploader');
    wp_enqueue_script('radel-js');
    wp_enqueue_media();
}

function plugin_activation() {
    update_option('portal_activated', 'yes');
    add_role('propkorner_user', 'Propkorner User', array('read' => TRUE));
    $role = get_role('propkorner_user');
    $role->add_cap('upload_files');
    //$role->add_cap('edit_posts');
//    $role->add_cap('edit_files');
    create_database();
}

function create_database() {
    global $wpdb;
    $sql = 'CREATE TABLE `wp_propkorner_listings` ( `id` INT NOT NULL AUTO_INCREMENT , `user_id` VARCHAR(10) NOT NULL , `active` BOOLEAN NOT NULL DEFAULT TRUE , `ready_to_move` BOOLEAN NOT NULL DEFAULT FALSE , `title` VARCHAR(150) NOT NULL ,`listing_type` VARCHAR(20) NOT NULL , `property_type` VARCHAR(20) NOT NULL , `bhk_type` VARCHAR(20) NOT NULL , `built_up_area` INT(10) NOT NULL , `bedrooms` INT(2) NOT NULL , `rent` INT(10) NOT NULL , `deposit` INT(10) NOT NULL , `negotiable` BOOLEAN NOT NULL DEFAULT FALSE , `maintenance_charges` BOOLEAN NOT NULL DEFAULT FALSE , `carpet_area` INT(10) NOT NULL , `balconies` INT(2) NOT NULL , `available_from` DATE NOT NULL , `building_name` VARCHAR(20) NOT NULL , `address` VARCHAR(100) NOT NULL , `pincode` VARCHAR(6) NOT NULL , `locality` VARCHAR(20) NOT NULL , `city` VARCHAR(20) NOT NULL , `state` VARCHAR(20) NOT NULL , `parking` BOOLEAN NOT NULL DEFAULT FALSE , `gym` BOOLEAN NOT NULL DEFAULT FALSE , `cctv` BOOLEAN NOT NULL DEFAULT FALSE , `clubhouse` BOOLEAN NOT NULL DEFAULT FALSE , `indoor_games` BOOLEAN NOT NULL DEFAULT FALSE , `kids_area` BOOLEAN NOT NULL DEFAULT FALSE , `lift` BOOLEAN NOT NULL DEFAULT FALSE , `swimming_pool` BOOLEAN NOT NULL DEFAULT FALSE , `water_harvesting` BOOLEAN NOT NULL DEFAULT FALSE , `power_backup` BOOLEAN NOT NULL DEFAULT FALSE , `water_sewage` BOOLEAN NOT NULL DEFAULT FALSE , `party_hall` BOOLEAN NOT NULL DEFAULT FALSE , `facing` VARCHAR(20) NOT NULL , `preferred_family` BOOLEAN NOT NULL DEFAULT FALSE , `preferred_bachelor` BOOLEAN NOT NULL DEFAULT FALSE , `preferred_commercial` BOOLEAN NOT NULL DEFAULT FALSE , `furnished` VARCHAR(20) NOT NULL , `store_room` BOOLEAN NOT NULL DEFAULT FALSE , `prayer_room` BOOLEAN NOT NULL DEFAULT FALSE , `floor_number` INT(2) NOT NULL , `total_floors` INT(2) NOT NULL , `featured_image` VARCHAR(200) NOT NULL , `image_1` VARCHAR(200) NOT NULL , `image_2` VARCHAR(200) NOT NULL , `image_3` VARCHAR(200) NOT NULL , `image_4` VARCHAR(200) NOT NULL , `image_5` VARCHAR(200) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;';
    $results = $wpdb->get_results($sql);
}

function plugin_deactivation() {
    update_option('portal_activated', 'no');
}

//Removing admin bar
add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}

//No admin access to customer and CSR
add_action('admin_init', 'no_admin_access', 100);

function no_admin_access() {
    $user = wp_get_current_user();
    if (in_array('propkorner_user', (array) $user->roles) && !defined('DOING_AJAX')) {
        wp_redirect(home_url());
        exit();
    }
}

//Access only to own files
add_filter('ajax_query_attachments_args', 'wpb_show_current_user_attachments');

function wpb_show_current_user_attachments($query) {
    $user_id = get_current_user_id();
    if ($user_id && !current_user_can('activate_plugins') && !current_user_can('edit_others_posts')) {
        $query['author'] = $user_id;
    }
    return $query;
}

//RADEL Upload files code

add_shortcode('radel-media', 'radel_media_upload');

function radel_media_upload() {
    ob_start();
    ?>
    <form id="featured_upload" method="post" action="#" enctype="multipart/form-data">
        <input type="file" name="my_image_upload" id="my_image_upload"  multiple="false" />
        <input type="hidden" name="post_id" id="post_id" value="" />
        <?php wp_nonce_field('my_image_upload', 'my_image_upload_nonce'); ?>
        <input id="submit_my_image_upload" name="submit_my_image_upload" type="submit" value="Upload" />
    </form>
    <?php
// Check that the nonce is valid, and the user can edit this post.
    if (isset($_POST['my_image_upload_nonce'], $_POST['post_id']) && wp_verify_nonce($_POST['my_image_upload_nonce'], 'my_image_upload') && current_user_can('edit_post', $_POST['post_id'])) {
        // The nonce was valid and the user has the capabilities, it is safe to continue.
        // These files need to be included as dependencies when on the front end.
        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        require_once( ABSPATH . 'wp-admin/includes/media.php' );
        // Let WordPress handle the upload.
        // Remember, 'my_image_upload' is the name of our file input in our form above.
        $attachment_id = media_handle_upload('my_image_upload', $_POST['post_id']);
        echo wp_get_attachment_url($attachment_id);
        if (is_wp_error($attachment_id)) {

            echo 'Some error happened!';
            // There was an error uploading the image.
        } else {
            // The image was uploaded successfully!
        }
    } else {
        // The security check failed, maybe show the user an error.
    }
    return ob_get_clean();
}

//Automatic redirect to loginpage
function my_page_template_redirect() {
    if (!is_page('login') && !is_user_logged_in()) {
        wp_redirect(home_url('/login/'));
        die;
    }
}

//add_action('template_redirect', 'my_page_template_redirect');
