<link href="https://fonts.googleapis.com/css?family=Marvel" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
    body {
        font-family: 'Marvel', sans-serif;
    }
    .listing-container {
        margin: 3px;
        text-align: center;
        position: relative;
        height: 233px;
        width: 32%;
        display:inline-block;
        float: left;
        border: 2px solid white;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        margin-bottom: 10px;
    }

    @media(max-width:1150px){
        .listing-container {
            width: 48%;
        }
    }
    @media(max-width:900px){
        .listing-container {
            width: 98%;
        }
    }
    @media(max-width:567px){
        .listing-container {
            width: 98%;
        }
    }


    .listing-image {
        display: block;
        max-width: 100%;
        max-height: 100%;
        margin: auto;
    }

    .listing-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.7);
        overflow: hidden;
        width: 100%;
        height: 23%;
        transition: .3s;
    }

    .listing-container:hover .listing-overlay {
        height: 50%;
    }
    .listing-overlay1 {
        position: absolute;
        bottom: 23%;
        left: 0;
        right: 0;
        background-color: rgba(255, 255, 255, 0.9);
        overflow: hidden;
        width: 100%;
        height: 10%;
        transition: 0.3s;
        font-size:16px;
        text-align: center;
    }

    .listing-container:hover .listing-overlay1 {
        bottom: 50%;
    }
    .c33{
        text-align: center;
        width: 31%;
        display: inline-block;
    }
    .c25{
        text-align: center;
        width: 24%;
        display: inline-block;
    }
    .c100{
        text-align: center;
        width:100%;
    }
</style>
<div class="wrap">
    <div id="search-container">
        <input id="search-term" type="search">
        <button onclick="search_listings();">Search</button>
    </div>
    <div id="listing-division"></div>
</div>
<?php
$myFile = wp_get_upload_dir()['baseurl'] . "/data.json";
$site_url = site_url();
?>
<script>
    jQuery(document).ready(function ($) {
        site_url = '<?php echo $site_url; ?>';
        var listings_data;
        search = {};
        search.title = '';
        $.urlParam = function (name) {
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
            return (results ? results[1] : 0);
        }
        x = $.urlParam('search');
        if ((x == '0') || (x == '')) {
            search.title = '';
        } else {
            search.title = x;
        }
        property_listings();
    });

    function search_listings() {
        term = $('#search-term').val();
        search.title = term;
        show_listings(search);
    }
    function show_listings(search_term) {
        count = 0;
        $('#listing-division').html('');
        $.each(listings_data, function (i, listing) {
            count++;
            if (count > 100) {
                return false;
            }
            skip = false;
            found = false;
            title = listing.title;
            var searchwords = search_term.title.split(" ");
            $.each(searchwords, function (i, word) {
                if (title.toLowerCase().indexOf(word.toLowerCase()) == -1) {
                    skip = true;
                    return
                } else {
                    found = true;
                }
            });
            if (skip && !found) {
                return true;
            }

            content = '';
            //console.log(listing);
            content += '<div class="listing-container">';
            content += '<a target="blank" href="' + site_url + '/property/?property=' + listing.id + '"><img src="' + ((listing.featured_image != '') ? listing.featured_image : '') + '" alt="Property Featured Image" class="listing-image"></a>';
            content += '<div class="listing-overlay1">';
            content += '<div><a target="blank" href="' + site_url + '/property/?property=' + listing.id + '" style="color:black"><b>' + listing.title + '</b></a></div>';
            content += '</div>';
            content += '<div class="listing-overlay">';
            content += '<div style="width: 100%;color:white;">';
            content += '<div class="c100" style="padding: 10px;font-size: 16px;padding-bottom: 18px">';
            content += '<div class="c33">';
            content += '<span style="color:green">&#x20b9;</span> ' + listing.rent + '';
            content += '</div>';
            content += '<div class="c33">';
            content += listing.locality;
            content += '</div>';
            content += '<div class="c33">';
            content += 'Contact';
            content += '</div>';
            content += '</div>';
            content += '<div class="c100">';
            content += '<div class="c25">Area<br>' + listing.built_up_area + 'SqFt</div>';
            content += '<div class="c25">BHK<br>' + listing.bhk_type + '</div>';
            content += '<div class="c25">Bedrooms<br>' + listing.bedrooms + '</div>';
            content += '<div class="c25">Parking<br>' + (listing.parking == 1 ? 'Yes' : 'No') + '</div>';
            content += '</div>';
            content += '</div>';
            content += '</div>';
            content += '</div>';
            $('#listing-division').append(content);
        });
    }

    function property_listings() {
        jQuery(document).ready(function ($) {
            $.getJSON("<?php echo $myFile; ?>", function (result) {
                listings_data = result;
                show_listings(search);
            });
        });
        return true;
    }
</script>