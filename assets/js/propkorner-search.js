jQuery(document).ready(function ($) {
    site_url = $('#site-url').val();
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
        x = x.replace('+', ' ');
        search.title = x;
    }
    property_listings();
});
$('#search-term').keypress(function (e) {
    if (e.which == 13) {//Enter key pressed
        $('#search-term-button').click();//Trigger search button click event
    }
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
        bhk = listing.bhk_type;
        locality = listing.locality;
        console.log(locality);
        var searchwords = search_term.title.split(" ");
        $.each(searchwords, function (i, word) {
            if (title.toLowerCase().indexOf(word.toLowerCase()) == -1 && locality.toLowerCase().indexOf(word.toLowerCase()) == -1 && bhk.toLowerCase().indexOf(word.toLowerCase()) == -1) {
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
        content += '<div class="c33" style="width:27%">';
        content += '<span style="color:green">&#x20b9;</span> ' + listing.rent + '';
        content += '</div>';
        content += '<div class="c33" style="width:38%">';
        content += listing.locality;
        content += '</div>';
        content += '<div class="c33" style="width:26%">';
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
        $.getJSON($('#json-data').val(), function (result) {
            listings_data = result;
            show_listings(search);
        });
    });
    return true;
}