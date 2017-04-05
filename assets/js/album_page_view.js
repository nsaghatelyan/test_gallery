jQuery(document).ready(function () {

    var get_galleries = jQuery(".get_galleries");

    get_galleries.on("click", function (e) {
        e.preventDefault();
        var data = {
            action: 'get_album_images',
            nonce: hg_album_page_view_obj.front_nonce,
            album_id: jQuery(this).attr("data-id")
        }
        jQuery.ajax({
            url: hg_album_page_view_obj.ajax_url,
            type: 'post',
            data: data,
            dataType: 'json',
            success: function (response) {
                jQuery("#album_list").hide();
                jQuery("#gallery_images").show();
                jQuery("#gallery_images").append("<a href='#' id='back_to_albums'>back to albums</a>");
                jQuery.each(response.gallerys, function (key, val) {
                    jQuery("#gallery_images").append('' +
                        '<div class="view view-gallery filtr-item">' +
                        '<img src="' + val.image_url.image_url + '"/>' +
                        '</div>');
                });
            },
            error: function (error) {
                console.log("error");
            }
        });

    });
});

jQuery(document).on("click", "#back_to_albums", function (evane) {
    event.preventDefault();
    jQuery("#gallery_images").hide();
    jQuery("#gallery_images").empty();
    jQuery("#album_list").show();
});

