jQuery(document).ready(function () {

    var day = jQuery("#ajax_test");

    day.on("click", function () {
        var data = {
            action: 'get_album_images',
            nonce: hg_album_page_view_obj.front_nonce,
            day: 'aaa'
        }
        jQuery.ajax({
            url: hg_album_page_view_obj.ajax_url,
            type: 'get',
            data: data,
            dataType: 'json',
            success: function (response) {
                console.log(response);
            },
            error: function (error) {
                console.log("error");
            }
        });
    });
});
