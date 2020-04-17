$(document).ready(function() {
    var slider_min = $('#searchPriceMin');
    var slider_max = $('#searchPriceMax');

    $('#val_price_min').text(slider_min.val());
    $('#val_price_max').text(slider_max.val());

    $(document).on('input change', '#searchPriceMin', function() {
        $('#val_price_min').text(slider_min.val());
    });

    $(document).on('input change', '#searchPriceMax', function() {
        $('#val_price_max').text(slider_max.val());
    });
});
