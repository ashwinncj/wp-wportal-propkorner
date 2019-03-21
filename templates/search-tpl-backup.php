<link href="https://fonts.googleapis.com/css?family=Marvel" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
    body {
        font-family: 'Marvel', sans-serif;
    }
    .listing-container {
        margin: 3px;
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
        width: 100%;
        height: 100%;
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
    <!--    <div class="listing-container">
            <img src="" alt="Avatar" class="listing-image">
            <div class="listing-overlay1">
                <div><b>Some Random TextSome Random Text Some Random Text regarding this particular flat</b></div>
            </div>
            <div class="listing-overlay">
                <div style="width: 100%;color:white;">
                    <div class="c100" style="padding: 10px;font-size: 16px;padding-bottom: 18px">
                        <div class="c33">
                            <span style="color:green">&#x20b9;</span> 33,00,000
                        </div>
                        <div class="c33">
                            Jayanagar
                        </div>
                        <div class="c33">
                            Contact
                        </div>
                    </div>                    
                    <div class="c100">
                        <div class="c25">Area<br>1080SqFt</div>
                        <div class="c25">BHK<br>1080SqFt</div>
                        <div class="c25">Bathrooms<br>3</div>
                        <div class="c25">Parking<br>Yes</div>
                    </div>
                </div>
            </div>
        </div> -->
    $
</div>
<?php
$myFile = wp_get_upload_dir()['baseurl'] . "/data.json";
?>
<script>
    function property_listings() {
        jQuery(document).ready(function ($) {
            $.getJSON("<?php echo $myFile; ?>", function (result) {
                $.each(result, function (i, listing) {
                    content = '';
                    //console.log(listing);
                    content += '<div class="listing-container">';
                    content += '<img src="" alt="Avatar" class="listing-image">';
                    content += '<div class="listing-overlay1">';
                    content += '<div><b>Some Random TextSome Random Text Some Random Text regarding this particular flat</b></div>';
                    content += '</div>';
                    content += '<div class="listing-overlay">';
                    content += '<div style="width: 100%;color:white;">';
                    content += '<div class="c100" style="padding: 10px;font-size: 16px;padding-bottom: 18px">';
                    content += '<div class="c33">';
                    content += '<span style="color:green">&#x20b9;</span> 33,00,000';
                    content += '</div>';
                    content += '<div class="c33">';
                    content += 'Jayanagar';
                    content += '</div>';
                    content += '<div class="c33">';
                    content += 'Contact';
                    content += '</div>';
                    content += '</div>';
                    content += '<div class="c100">';
                    content += '<div class="c25">Area<br>1080SqFt</div>';
                    content += '<div class="c25">BHK<br>1080SqFt</div>';
                    content += '<div class="c25">Bathrooms<br>3</div>';
                    content += '<div class="c25">Parking<br>Yes</div>';
                    content += '</div>';
                    content += '</div>';
                    content += '</div>';
                    content += '</div>';
                    
                });
            });
        });
        return true;
    }
</script>