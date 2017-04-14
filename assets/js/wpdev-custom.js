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


    thumbnail_opt("#album_popup_grid_style");
    thumbnail_opt("#album_grid_style");

    // console.log(jQuery("#album_popup_grid_style").parent().parent().find(".control-container-number").length);

    function thumbnail_opt(grid) {
        if (jQuery(grid).val() == 4) {
            jQuery(grid).parent().parent().find(".control-container-number, .control-container-color").show();
        }
        else {
            jQuery(grid).parent().parent().find(".control-container-number, .control-container-color").hide();
        }


        jQuery(grid).on("change", function () {
            if (jQuery(grid).val() == 4) {
                jQuery(grid).parent().parent().find(".control-container-number, .control-container-color").fadeIn();
            }
            else {
                jQuery(grid).parent().parent().find(".control-container-number, .control-container-color").fadeOut();
            }
        })

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

        for (var i = 2; i < 13; i++) {
            if (i < 7) {
                top_arr.push(jQuery("#albums .wpdev-settings-section:nth-child(" + i + ")").css("top"));
                left_arr.push(jQuery("#albums .wpdev-settings-section:nth-child(" + i + ")").css("left"));
                if (view == 1) {
                    jQuery("#albums .wpdev-settings-section:nth-child(" + i + ")").hide();
                }
                else {
                    jQuery("#albums .wpdev-settings-section:nth-child(" + i + ")").fadeIn();
                }
            }
            else {
                if (view == 1) {
                    var new_index = i - 7;
                    var top = jQuery("#albums > .wpdev-settings-section:nth-child(" + i + ")").css("top");
                    var new_top = Math.abs(parseInt(top) - 500) + "px";
                    jQuery("#albums .wpdev-settings-section:nth-child(" + i + ")").css({
                        "top": top_arr[new_index],
                        "left": left_arr[new_index]
                    }).fadeIn();
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
