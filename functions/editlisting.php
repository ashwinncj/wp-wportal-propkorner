<?php

function edit_listing_shortcode_function() {
    ob_start();
    global $wpdb;
    $listing = isset($_GET['listing']) ? $_GET['listing'] != '' ? $_GET['listing'] : 'new' : 'new';
    if (isset($_POST['upload_listing'])) {
        $insert_id = upload_listing($_POST);
        $error = 'Listing updated!';
        $listing = $insert_id;
    }
    if ($listing == 'new') {
        $page_name = 'Add a new Listing';
        $id = '';
        $user_id = get_current_user_id();
        $active = '0';
        $ready_to_move = '0';
        $title = '';
        $listing_type = '';
        $property_type = '';
        $bhk_type = '';
        $built_up_area = '';
        $bedrooms = '';
        $rent = '';
        $deposit = '';
        $negotiable = '0';
        $maintenance_charges = '0';
        $carpet_area = '';
        $balconies = '';
        $available_from = '';
        $building_name = '';
        $address = '';
        $pincode = '';
        $locality = '';
        $city = '';
        $state = '';
        $parking = '0';
        $gym = '0';
        $cctv = '0';
        $clubhouse = '0';
        $indoor_games = '0';
        $kids_area = '0';
        $lift = '0';
        $swimming_pool = '0';
        $water_harvesting = '0';
        $power_backup = '0';
        $water_sewage = '0';
        $party_hall = '0';
        $facing = '';
        $preferred_family = '0';
        $preferred_bachelor = '0';
        $preferred_commercial = '0';
        $furnished = '';
        $store_room = '0';
        $prayer_room = '0';
        $floor_number = '';
        $total_floors = '';
        $featured_image = '';
        $image_1 = '';
        $image_2 = '';
        $image_3 = '';
        $image_4 = '';
        $image_5 = '';
    } else {
        $page_name = 'Edit Listing';
        $id = $listing;
        $result = $wpdb->get_row("SELECT * FROM `wp_propkorner_listings` WHERE id = " . $listing);
        $user_id = $result->user_id;
        $active = $result->active;
        $ready_to_move = $result->ready_to_move;
        $title = $result->title;
        $listing_type = $result->listing_type;
        $property_type = $result->property_type;
        $bhk_type = $result->bhk_type;
        $built_up_area = $result->built_up_area;
        $bedrooms = $result->bedrooms;
        $rent = $result->rent;
        $deposit = $result->deposit;
        $negotiable = $result->negotiable;
        $maintenance_charges = $result->maintenance_charges;
        $carpet_area = $result->carpet_area;
        $balconies = $result->balconies;
        $available_from = $result->available_from;
        $building_name = $result->building_name;
        $address = $result->address;
        $pincode = $result->pincode;
        $locality = $result->locality;
        $city = $result->city;
        $state = $result->state;
        $parking = $result->parking;
        $gym = $result->gym;
        $cctv = $result->cctv;
        $clubhouse = $result->clubhouse;
        $indoor_games = $result->indoor_games;
        $kids_area = $result->kids_area;
        $lift = $result->lift;
        $swimming_pool = $result->swimming_pool;
        $water_harvesting = $result->water_harvesting;
        $power_backup = $result->power_backup;
        $water_sewage = $result->water_sewage;
        $party_hall = $result->party_hall;
        $facing = $result->facing;
        $preferred_family = $result->preferred_family;
        $preferred_bachelor = $result->preferred_bachelor;
        $preferred_commercial = $result->preferred_commercial;
        $furnished = $result->furnished;
        $store_room = $result->store_room;
        $prayer_room = $result->prayer_room;
        $floor_number = $result->floor_number;
        $total_floors = $result->total_floors;
        $featured_image = $result->featured_image;
        $image_1 = $result->image_1;
        $image_2 = $result->image_2;
        $image_3 = $result->image_3;
        $image_4 = $result->image_4;
        $image_5 = $result->image_5;
    }


    require_once WPORTAL__PLUGIN_DIR . './templates/editlisting-tpl.php';
    return ob_get_clean();
}

function upload_listing($_options = '') {
//    print_r($_options);
    global $wpdb;
    //default values
    $default_options = array(
        'id' => '',
        'user_id' => get_current_user_id(),
        'active' => '1',
        'ready_to_move' => '0',
        'title' => '',
        'listing_type' => '',
        'property_type' => '',
        'bhk_type' => '',
        'built_up_area' => '',
        'bedrooms' => '',
        'rent' => '',
        'deposit' => '',
        'negotiable' => '0',
        'maintenance_charges' => '0',
        'carpet_area' => '',
        'balconies' => '',
        'available_from' => '',
        'building_name' => '',
        'address' => '',
        'pincode' => '',
        'locality' => '',
        'city' => '',
        'state' => '',
        'parking' => '0',
        'gym' => '0',
        'cctv' => '0',
        'clubhouse' => '0',
        'indoor_games' => '0',
        'kids_area' => '0',
        'lift' => '0',
        'swimming_pool' => '0',
        'water_harvesting' => '0',
        'power_backup' => '0',
        'water_sewage' => '0',
        'party_hall' => '0',
        'facing' => '',
        'preferred_family' => '0',
        'preferred_bachelor' => '0',
        'preferred_commercial' => '0',
        'furnished' => '',
        'store_room' => '0',
        'prayer_room' => '0',
        'floor_number' => '',
        'total_floors' => '',
        'featured_image' => '',
        'image_1' => '',
        'image_2' => '',
        'image_3' => '',
        'image_4' => '',
        'image_5' => ''
    );
    is_array($_options) ? $options = array_merge($default_options, $_options) : $options = $default_options;
    $sql = "REPLACE INTO wp_wportal_products(" . $default_options . ") "
            . "VALUES (" . $options . ");";
    $sql = "REPLACE INTO `wp_propkorner_listings`(";
    foreach ($options as $key => $value) {
        $sql.=$key . ', ';
    }
    $sql = substr_replace($sql, '', -2);
    $sql = str_replace(', upload_listing', '', $sql);
    $sql.=") VALUES (";
    foreach ($options as $key => $value) {
        $sql.="'" . $value . "', ";
    }
    $sql = substr_replace($sql, '', -2);
    $sql = str_replace(", 'true'", '', $sql);
    $sql.= ');';
//    echo $sql;
    $results = $wpdb->get_results($sql);
    $myFile = wp_get_upload_dir()['basedir'] . "/data.json";
    $properties = array(); // create empty array
    $properties = $wpdb->get_results('SELECT * FROM `wp_propkorner_listings` WHERE 1;', ARRAY_A);
    $inputdata = array();
    foreach ($properties as $property) {
        $inputdata[$property['id']] = $property;
    }
    $jsondata = json_encode($inputdata, JSON_PRETTY_PRINT);
    file_put_contents($myFile, $jsondata);
    return $wpdb->insert_id;
}

?>