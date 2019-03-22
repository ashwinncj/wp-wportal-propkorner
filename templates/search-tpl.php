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
        vertical-align: top;
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
<?php
$myFile = wp_get_upload_dir()['baseurl'] . "/data.json";
$site_url = site_url();
?>
<div class="wrap">
    <div id="search-container">
        <input id="search-term" placeholder="Type here to search..." type="search">
        <button id="search-term-button" hidden onclick="search_listings();">Search</button>
    </div>
    <div id="listing-division"></div>
    <div id="parameters">
        <input id="site-url" type="text" hidden value="<?php echo $site_url; ?>">
        <input id="json-data" type="text" hidden value="<?php echo $myFile; ?>">
    </div>
</div>

<script>
    
</script>