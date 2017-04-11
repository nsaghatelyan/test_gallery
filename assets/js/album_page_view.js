jQuery(document).ready(function () {

    var album_view = jQuery("input[name='album_view']").val();
    if (album_view == 2) {


        var share_enable = jQuery("input[name='sharing_buttons']").val();
        var mosaic_enable = jQuery("input[name='mosaic']").val();

        var shareButtons = "";

        if (share_enable == 1) {
            shareButtons += '<ul class="rwd-share-buttons" style="display: block;">';
            shareButtons += '<li><a title="Facebook" class="album_social_fb" id="rwd-share-facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=' + (encodeURIComponent(document.URL)) + '"></a></li>';
            shareButtons += '<li><a title="Twitter" class="album_social_twitter" id="rwd-share-twitter" target="_blank" href="https://twitter.com/intent/tweet?text=&url=' + (encodeURIComponent(document.URL)) + '"></a></li>';
            shareButtons += '<li><a title="Google Plus" class="album_social_google" id="rwd-share-googleplus" target="_blank" href="https://twitter.com/intent/tweet?text=&url=' + (encodeURIComponent(document.URL)) + '"></a></li>';
            shareButtons += '</ul>';
        }

        jQuery(".album_socials").prepend(shareButtons);

        var get_galleries = jQuery(".get_galleries");
        var hover_class = get_galleries.attr("data-hover");

        get_galleries.on("click", function (e) {
            e.preventDefault();
            var data = {
                action: 'get_album_images',
                nonce: hg_album_page_view_obj.front_nonce,
                album_id: jQuery(this).attr("data-id"),
                type: "get_galleries"
            }
            jQuery.ajax({
                url: hg_album_page_view_obj.ajax_url,
                type: 'post',
                data: data,
                dataType: 'json',
                success: function (response) {
                    jQuery("#album_list_container").hide();
                    jQuery("#gallery_images").show();
                    jQuery("#gallery_images").append("<div class='album_back_button'><a href='#' id='back_to_albums'>back to albums</a>" +
                        "<div class='album_socials'>" + shareButtons + "</div></div><div class='gallery_images'></div>");
                    jQuery.each(response.gallerys, function (key, val) {
                        jQuery(".gallery_images").append('' +
                            '<div class="view ' + hover_class + '">' +
                            '<a href="#" class="get_images" data-id="' + val.id + '">' +
                            '<div class="' + hover_class + '-wrapper">' +
                            '<img src="' + val.image_url.image_url + '"/>' +
                            '<div class="mask">' +
                            '<div class="mask-text">' +
                            '<h2>' + val.name + '</h2>' +
                            '<span class="text-category">' + val.description + '</span></div><div class="mask-bg"></div></div></div></a></div>');
                    });

                    jQuery(' .gallery_images > .view-fifth ').each(function () {
                        jQuery(this).hoverdir();
                    });

                    if (mosaic_enable == 1 || mosaic_enable == 2) {
                        jQuery(".gallery_images").mosaicflow();
                    }
                },
                error: function (error) {
                    console.log("error");
                }
            });

        });

        jQuery("#back_to_albums").live("click", function (event) {
            event.preventDefault();
            jQuery("#gallery_images").hide();
            jQuery("#gallery_images").empty();
            jQuery("#album_list_container").show();
        });

        jQuery("#back_to_galleries").live("click", function (event) {
            event.preventDefault();
            jQuery("#album_image_place").hide();
            jQuery("#album_image_place").empty();
            jQuery("#gallery_images").show();
        });


        jQuery(".get_images").live("click", function (ev) {
            ev.preventDefault();

            var hover_class = jQuery(".get_galleries").attr("data-hover");

            var data = {
                action: 'get_album_images',
                nonce: hg_album_page_view_obj.front_nonce,
                gallery_id: jQuery(this).attr("data-id"),
                type: "get_images"
            };


            jQuery.ajax({
                url: hg_album_page_view_obj.ajax_url,
                type: 'post',
                data: data,
                dataType: 'json',
                success: function (response) {
                    jQuery("#gallery_images").hide();
                    jQuery("#album_list_container").hide();
                    jQuery("#album_image_place").show();

                    jQuery("#album_image_place").append("<div class='album_back_button'><a href='#' id='back_to_galleries'>back to galleries</a>" +
                        "<div class='album_socials'>" + shareButtons + "</div></div><div class='album_image_place'></div>");
                    jQuery.each(response.images, function (key, val) {
                        jQuery(".album_image_place").append('' +
                            '<div class="view ' + hover_class + '">' +
                            '<a href="' + val.image_url + '"  title="' + val.name + '" class="ph-lightbox gallery_group1">' +
                            '<div class="' + hover_class + '-wrapper">' +
                            '<img src="' + val.image_url + '" alt="' + val.name + '" />' +
                            '<div class="mask"><div class="mask-text">' +
                            '<h2>' + val.name + '</h2>' +
                            '<span class="text-category">' + val.description + '</span></div><div class="mask-bg"></div></div></div></a></div>');
                    });

                    jQuery('.ph-lightbox').lightbox();
                    jQuery(' .album_image_place > .view-fifth ').each(function () {
                        jQuery(this).hoverdir();
                    });

                    if (mosaic_enable == 1 || mosaic_enable == 2) {
                        jQuery('.album_image_place').mosaicflow();
                    }

                },
                error: function (error) {
                    console.log("error");
                }
            });
        });
    }
});















