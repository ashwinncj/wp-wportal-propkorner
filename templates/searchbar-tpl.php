<div class="wrap">
    <div id="search-container">
        <form action="search">
            <input id="search-term" placeholder="Type here to search..." name="search" type="search">
            <input type="submit"id="search-term-button" style="display: none">
        </form>
    </div>
</div>
<?php
$myFile = wp_get_upload_dir()['baseurl'] . "/data.json";
$site_url = site_url();
?>
<script>
    jQuery(document).ready(function ($) {
        $('#search-term').keypress(function (e) {
            if (e.which == 13) {//Enter key pressed
                $('#search-term-button').click();//Trigger search button click event
            }
        });
    });
</script>