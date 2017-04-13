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


    thumbnail_oprions("#album_grid_style", "#album_thumbnail_width_size", "#album_thumbnail_height_size");
    thumbnail_oprions("#album_popup_grid_style", "#album_popup_thumbnail_width_size", "#album_popup_thumbnail_height_size");

    function thumbnail_oprions(grid, width, height) {
        if (jQuery(grid).val() != 4) {
            jQuery(width).attr("disabled", "disabled").css("background-color", "#ccc").attr("title", 'This option available for "Thumbnail" grid view');
            jQuery(height).attr("disabled", "disabled").css("background-color", "#ccc").attr("title", 'This option available for "Thumbnail" grid view');
        }

        jQuery(grid).on("change", function () {
            if (jQuery(this).val() == 4) {
                jQuery(width).removeAttr("disabled").css("background-color", "#fff").attr("title", "");
                jQuery(height).removeAttr("disabled").css("background-color", "#fff").attr("title", "");
            }
            else {
                jQuery(width).attr("disabled", "disabled").css("background-color", "#ccc").attr("title", 'This option available for "Thumbnail" grid view');
                jQuery(height).attr("disabled", "disabled").css("background-color", "#ccc").attr("title", 'This option available for "Thumbnail" grid view');
            }
        });
    }


    jQuery("#album_count_style-4").parent().find("img").height("40px");
    jQuery("#album_popup_count_style-4").parent().find("img").height("40px");


    var view = jQuery("#album_style");
    switch_options(view.val());

    jQuery(view).on("change", function () {
        switch_options(jQuery(this).val());
        if (jQuery(this).val() == 1) {

        }
        var id = (jQuery(this).val() == 1) ? "album_style" : "album_popup_count_style-0";
    });

    function switch_options(view) {

        var top_arr = [];
        var left_arr = [];

        for (var i = 2; i < 14; i++) {
            if (i < 8) {
                top_arr.push(jQuery("#albums .wpdev-settings-section:nth-child(" + i + ")").css("top"));
                left_arr.push(jQuery("#albums .wpdev-settings-section:nth-child(" + i + ")").css("left"));
                if (view == 1) {
                    jQuery("#albums .wpdev-settings-section:nth-child(" + i + ")").hide();
                }
                else {
                    jQuery("#albums .wpdev-settings-section:nth-child(" + i + ")").show();
                }
            }
            else {
                if (view == 1) {
                    var new_index = i - 8;
                    var top = jQuery("#albums > .wpdev-settings-section:nth-child(" + i + ")").css("top");
                    var new_top = Math.abs(parseInt(top) - 500) + "px";
                    jQuery("#albums .wpdev-settings-section:nth-child(" + i + ")").css({
                        "top": top_arr[new_index],
                        "left": left_arr[new_index]
                    }).show();
                }
                else {
                    jQuery("#albums .wpdev-settings-section:nth-child(" + i + ")").css("top", new_top).hide();
                }
            }
        }
    }

});

/* */


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

 });
 });*/
