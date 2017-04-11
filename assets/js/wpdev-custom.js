jQuery(document).ready(function ($) {
    jQuery("#mosaic_show_content_by").on("change", function () {
        if (jQuery(this).val() === 'count') {
            jQuery("#mosaic_image_column_count").removeClass('hidden').parent().removeClass('hidden');
            jQuery("#mosaic_image_max_width_in_px").addClass('hidden').parent().addClass('hidden');
        } else if (jQuery(this).val() === 'width') {
            jQuery("#mosaic_image_max_width_in_px").removeClass('hidden').parent().removeClass('hidden');
            jQuery("#mosaic_image_column_count").addClass('hidden').parent().addClass('hidden');
        }
    });

    for (var i = 8; i < 14; i++) {
        jQuery(".wpdev-settings-section:nth-child(" + i + ")").hide();
    }

    var view = jQuery("#album_style");
    switch_options(view.val());

    jQuery(view).on("change", function () {
        switch_options(jQuery(this).val());
        if (jQuery(this).val() == 1) {

        }
        var id = (jQuery(this).val() == 1) ? "album_style" : "album_popup_count_style-0";
        goToByScroll(id);
    });

    function switch_options(view) {
        if (view == 1) {
            for (var i = 2; i < 14; i++) {
                if (i < 8) {
                    jQuery(".wpdev-settings-section:nth-child(" + i + ")").hide();
                }
                else {
                    jQuery(".wpdev-settings-section:nth-child(" + i + ")").show();
                }
            }
        }
        else {
            for (var i = 1; i < 14; i++) {
                if (i < 8) {
                    jQuery(".wpdev-settings-section:nth-child(" + i + ")").show();
                }
                else {
                    jQuery(".wpdev-settings-section:nth-child(" + i + ")").hide();
                }
            }
        }
    }

    function goToByScroll(id) {
        // Remove "link" from the ID
        id = id.replace("link", "");
        // Scroll
        jQuery('html,body').animate({
                scrollTop: jQuery("#" + id).offset().top
            },
            'slow');
    }


    if (jQuery("#album_grid_style").val() != 4) {
        jQuery("#album_thumbnail_width_size").attr("disabled", "disabled").css("background-color", "#ccc").attr("title", 'This option available for "Thumbnail" grid view');
        jQuery("#album_thumbnail_height_size").attr("disabled", "disabled").css("background-color", "#ccc").attr("title", 'This option available for "Thumbnail" grid view');
    }

    jQuery("#album_grid_style").on("change", function () {
        if (jQuery(this).val() == 4) {
            jQuery("#album_thumbnail_width_size").removeAttr("disabled").css("background-color", "#fff").attr("title", "");
            jQuery("#album_thumbnail_height_size").removeAttr("disabled").css("background-color", "#fff").attr("title", "");
        }
        else {
            jQuery("#album_thumbnail_width_size").attr("disabled", "disabled").css("background-color", "#ccc").attr("title", 'This option available for "Thumbnail" grid view');
            jQuery("#album_thumbnail_height_size").attr("disabled", "disabled").css("background-color", "#ccc").attr("title", 'This option available for "Thumbnail" grid view');
        }
    })


    /* $("#album_style").on("change", function (e) {
     var data = $(this).val();
     e.preventDefault();


     $.ajax({
     "action": "post_word_count",
     dataType: "JSON",
     type: 'POST',
     url: MyAjax.ajaxurl,
     data: {
     data: data,
     nonce: MyAjax.nonce
     },
     success: function (response) {
     if (response.result) {
     console.log("success");
     }
     },
     error: function (error) {
     console.log("error");
     }
     });

     });*/
});
