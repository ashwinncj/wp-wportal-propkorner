<link href="https://fonts.googleapis.com/css?family=Marvel" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<style>   
    .c33{
        width: 31%;
        display: inline-block;
    }

    .c16{
        width: 16%;
        display: inline-block;
    }
    .c20{
        width: 19%;
        display: inline-block;
    }
    .c25{
        width: 24%;
        display: inline-block;
    }
    .c75{        
        width:74%;
        display: inline-block;
    }
    .c50{        
        width:48%;
        display: inline-block;
    }
    .c100{
        width:100%;
    }
    .info-heading{
        font-weight: bold;
        text-decoration: underline;
        text-transform: uppercase;
        font-size: 18px;
    }
    .amenities > div{
        padding: 10px;
        display: none;
    }
    .property-information > p{
        font-weight: 400;
    }
    .amenities img{
        width: 35px;
        padding: 0px;
        margin-right: 10px;
    }
    .amenities span{
        vertical-align: bottom;
    }
    .hide-additional-image{
        display: none;
    }
    .additional-images > div{
        text-align: center;
        height: 120px;
        cursor: pointer;
    }
    .additional-images > div > img{
        max-width: 100%;
        max-height: 120px;
        text-align: center;
        padding: 10px;
    }
    .amenities{
        column-count: 4;
    }
    @media(max-width:796px){

        .c75{        
            width:100%;
            display: inline-block;
        }
        .additional-images > div > img{
            padding: 1px;
        }
        .c16{
            width: 15%;
        }
        .c25{
            width: 100%;
        }

        .amenities{
            column-count: 2;
        }

    }
</style>
<div class="wrap">

    <div id="property-listing" radel-scope="property" style="font-family: Raleway">
        <div class="c75">
            <div class="c100" rs="title" style="font-weight: bold;font-size: 20px"></div>
            <div class="c100" rs="locality"></div>
            <div class="c100" rs="featured-image" style="text-align: center;margin-top: 25px">
                <img id="featured-image" src="" style="max-height: 400px;max-width: 100%">
            </div>
            <div class="c100 additional-images">
                <div rs="image-1" onclick="shift_image(this);" class="c16 hide-additional-image"><img src=""></div>
                <div rs="image-featured" onclick="shift_image(this);" class="c16 hide-additional-image"><img src=""></div>
                <div rs="image-2" onclick="shift_image(this);" class="c16 hide-additional-image"><img src=""></div>
                <div rs="image-3" onclick="shift_image(this);" class="c16 hide-additional-image"><img src=""></div>
                <div rs="image-4" onclick="shift_image(this);" class="c16 hide-additional-image"><img src=""></div>
                <div rs="image-5" onclick="shift_image(this);" class="c16 hide-additional-image"><img src=""></div>
            </div>
        </div>
        <div class="c25" style="vertical-align: top;">
            <div class="c100" style="vertical-align: top;background-color: #f0f0f0;padding: 15px;margin-top: 20px">
                <div>
                    <p class="info-heading">Get Contact Info</p>
                    <hr>
                    <label>Name:</label><br>
                    <input type="text" name="name"><br>

                    <label>Email:</label><br>
                    <input type="email" name="email"><br>

                    <label>Mobile:</label><br>
                    <input type="text" name="mobile"><br>
                    <input type="submit" value="submit">
                </div>
            </div>
        </div>
        <div class="c100" style="text-align: center;margin-top: 25px; background-color: #f0f0f0;padding: 20px">
            <div class="c100" style="text-align: center"><p class="info-heading">Property Information</p></div>
            <div class="c100" style="text-align: center; border-bottom: 1px solid; padding-bottom: 20px;">
                <div class="c100 property-information" style="column-count: 2">
                    <p>Price: <span rs="price"></span> INR</p>
                    <p>Status: <span rs="status"></span></p>
                    <p>Area: <span rs="area"></span> INR</p>
                    <p>BHK: <span rs="bhk-type"></span></p>
                    <p>Furnishing: <span rs="furnished"></span></p>
                </div>
            </div>

            <div class="c100" style="text-align: center;margin-top: 25px; background-color: #f0f0f0">
                <div class="c100" style="text-align: center"><p class="info-heading">Amenities</p></div>
                <div class="c100 amenities" style="text-align: left">
                    <div rs="cctv"><img src="<?php echo WPORTAL__PLUGIN_URL . '/assets/img/cctv.png'; ?>"><span>CCTV</span></div>
                    <div rs="clubhouse"><img src="<?php echo WPORTAL__PLUGIN_URL . '/assets/img/clubhouse.png'; ?>"><span>CLUB HOUSE</span></div>
                    <div rs="gym"><img src="<?php echo WPORTAL__PLUGIN_URL . '/assets/img/gym.png'; ?>"><span>GYM</span></div>
                    <div rs="indoor-games"><img src="<?php echo WPORTAL__PLUGIN_URL . '/assets/img/indoorgames.png'; ?>"><span>INDOOR GAMES</span></div>
                    <div rs="kids-area"><img src="<?php echo WPORTAL__PLUGIN_URL . '/assets/img/kidsarea.png'; ?>"><span>KIDS AREA</span></div>
                    <div rs="lift"><img src="<?php echo WPORTAL__PLUGIN_URL . '/assets/img/lift.png'; ?>"><span>LIFT</span></div>
                    <div rs="parking"><img src="<?php echo WPORTAL__PLUGIN_URL . '/assets/img/parking.png'; ?>"><span>PARKING</span></div>
                    <div rs="party-hall"><img src="<?php echo WPORTAL__PLUGIN_URL . '/assets/img/partyhall.png'; ?>"><span>PARTY HALL</span></div>
                    <div rs="power-backup"><img src="<?php echo WPORTAL__PLUGIN_URL . '/assets/img/powerbackup.png'; ?>"><span>POWER BACKUP</span></div>
                    <div rs="swimming"><img src="<?php echo WPORTAL__PLUGIN_URL . '/assets/img/swimming.png'; ?>"><span>SWIMMING POOL</span></div>
                    <div rs="water-harvesting"><img src="<?php echo WPORTAL__PLUGIN_URL . '/assets/img/waterharvesting.png'; ?>"><span>WATER HARVESTING</span></div>
                    <div rs="water-sewage"><img src="<?php echo WPORTAL__PLUGIN_URL . '/assets/img/sewage.png'; ?>"><span>SEWAGE</span></div>
                </div>  
            </div>
        </div>
    </div>
</div>
<?php
$myFile = wp_get_upload_dir()['baseurl'] . "/data.json";
?>
<script>
    jQuery(document).ready(function ($) {
        $.urlParam = function (name) {
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
            return (results ? results[1] : 0);
        }
        property_listings();
    });
    function shift_image(input) {
        changeimage = ($(input).children().attr('src'));
        $('#featured-image').attr('src', changeimage);

    }
    function property_listings() {
        var listings_data;
        jQuery(document).ready(function ($) {
            $.getJSON("<?php echo $myFile; ?>", function (result) {
                listings_data = result;
                search = {};
                search.title = 'bh'
                show_property(1);
            });

            function show_property() {
                x = $.urlParam('property');
                if ((x == '0') || (x == '') || !(x in listings_data)) {
                    console.log(x);
                    $('#property-listing').html('Property Listing not found!');
                    return true;
                }
                console.log(listings_data[x]);
                $('[rs=title]').html(listings_data[x].title);
                $('[rs=locality]').html(listings_data[x].locality + ', ' + listings_data[x].city);
                $('[id=featured-image]').attr('src', listings_data[x].featured_image);
                //Additional Images
                ((listings_data[x].image_1 == '') ? '' : $('[rs=image-1]').removeClass('hide-additional-image')), $('[rs=image-1] img').attr('src', listings_data[x].image_1);
                ((listings_data[x].featured_image == '') ? '' : $('[rs=image-featured]').removeClass('hide-additional-image')), $('[rs=image-featured] img').attr('src', listings_data[x].featured_image);
                ((listings_data[x].image_2 == '') ? '' : $('[rs=image-2]').removeClass('hide-additional-image')), $('[rs=image-2] img').attr('src', listings_data[x].image_2);
                ((listings_data[x].image_3 == '') ? '' : $('[rs=image-3]').removeClass('hide-additional-image')), $('[rs=image-3] img').attr('src', listings_data[x].image_3);
                ((listings_data[x].image_4 == '') ? '' : $('[rs=image-4]').removeClass('hide-additional-image')), $('[rs=image-4] img').attr('src', listings_data[x].image_4);
                ((listings_data[x].image_5 == '') ? '' : $('[rs=image-5]').removeClass('hide-additional-image')), $('[rs=image-5] img').attr('src', listings_data[x].image_5);
                $('[rs=price]').html(listings_data[x].rent);
                $('[rs=status]').html(((listings_data[x].ready_to_move == '1') ? 'Available' : 'Under Construction'));
                $('[rs=area]').html(listings_data[x].built_up_area);
                $('[rs=bhk-type]').html(listings_data[x].bhk_type);
                $('[rs=furnished]').html(listings_data[x].furnished);
                ((listings_data[x].cctv == '0') ? '' : $('[rs=cctv]').show());
                ((listings_data[x].clubhouse == '0') ? '' : $('[rs=clubhouse]').show());
                ((listings_data[x].gym == '0') ? '' : $('[rs=gym]').show());
                ((listings_data[x].indoor_games == '0') ? '' : $('[rs=indoor-games]').show());
                ((listings_data[x].kids_area == '0') ? '' : $('[rs=kids-area]').show());
                ((listings_data[x].lift == '0') ? '' : $('[rs=lift]').show());
                ((listings_data[x].swimming_pool == '0') ? '' : $('[rs=swimming]').show());
                ((listings_data[x].water_harvesting == '0') ? '' : $('[rs=harvesting]').show());
                ((listings_data[x].parking == '0') ? '' : $('[rs=parking]').show());
                ((listings_data[x].water_sewage == '0') ? '' : $('[rs=water-sewage]').show());
                ((listings_data[x].power_backup == '0') ? '' : $('[rs=power-backup]').show());
                ((listings_data[x].party_hall == '0') ? '' : $('[rs=party-hall]').show());
            }
        });
        return true;
    }
</script>