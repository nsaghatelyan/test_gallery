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

    $("#album_style").on("change", function (e) {
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
});
