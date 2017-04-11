<?= "<style>" ?>
.ph_element_<?php echo $galleryID; ?> {
    width: 100%;
    max-width: <?php echo Photo_Gallery_WP()->settings->view2_element_width+2*Photo_Gallery_WP()->settings->view2_element_border_width; ?>px;
    height: <?php echo Photo_Gallery_WP()->settings->view2_element_height+45+2*Photo_Gallery_WP()->settings->view2_element_border_width; ?>px;
    margin: 0 10px 10px 0;
    background: #<?php echo Photo_Gallery_WP()->settings->view2_element_background_color; ?>;
    border: <?php echo Photo_Gallery_WP()->settings->view2_element_border_width; ?> px solid #<?php echo Photo_Gallery_WP()->settings->view2_element_border_color; ?>;
    outline: none;
}

.ph_element_<?php echo $galleryID; ?>.no-title {
    height: <?php echo Photo_Gallery_WP()->settings->view2_element_height+2*Photo_Gallery_WP()->settings->view2_element_border_width; ?>px;
}

.ph_element_<?php echo $galleryID; ?> .image-block_<?php echo $galleryID; ?> {
<?php if(Photo_Gallery_WP()->settings->image_natural_size_contentpopup=='resize'){?> position: relative;
    width: 100%;
<?php }elseif(Photo_Gallery_WP()->settings->image_natural_size_contentpopup=='natural'){?> position: relative;
    width: 100%;
    overflow: hidden;
    height: <?php echo Photo_Gallery_WP()->settings->view2_element_height; ?>px !important;
<?php }?>
}

.ph_element_<?php echo $galleryID; ?> .image-block_<?php echo $galleryID; ?> img {
<?php if(Photo_Gallery_WP()->settings->image_natural_size_contentpopup=='resize'){?> width: 100% !important;
    height: <?php echo Photo_Gallery_WP()->settings->view2_element_height; ?>px !important;
    display: block;
    border-radius: 0 !important;
    box-shadow: 0 0 0 rgba(0, 0, 0, 0) !important;
<?php }elseif(Photo_Gallery_WP()->settings->image_natural_size_contentpopup=='natural'){?> display: block;
    max-width: none !important;
    border-radius: 0 !important;
    box-shadow: 0 0 0 rgba(0, 0, 0, 0) !important;
<?php }?>
}

.ph_element_<?php echo $galleryID; ?> .image-block_<?php echo $galleryID; ?> .ph-g-wp-gallery-image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: <?php
			list($r,$g,$b) = array_map('hexdec',str_split(Photo_Gallery_WP()->settings->view2_element_overlay_color,2));
				$titleopacity=Photo_Gallery_WP()->settings->view2_element_overlay_transparency/100;
				echo 'rgba('.$r.','.$g.','.$b.','.$titleopacity.')  !important';
	?>;
    display: none;
}

.ph_element_<?php echo $galleryID; ?>:hover .image-block_<?php echo $galleryID; ?> .ph-g-wp-gallery-image-overlay {
    display: block;
}

.ph_element_<?php echo $galleryID; ?> .image-block_<?php echo $galleryID; ?> .ph-g-wp-gallery-image-overlay a {
    position: absolute;
    top: 0;
    left: 0;
    display: block;
    width: 100%;
    height: 100%;
    box-shadow: none !important;
    background: url('<?php echo  PHOTO_GALLERY_WP_IMAGES_URL.'/admin_images/zoom.'.Photo_Gallery_WP()->settings->view2_zoombutton_style.'.png'; ?>') center center no-repeat;
}

.ph_element_<?php echo $galleryID; ?> .title-block_<?php echo $galleryID; ?> {
    position: relative;
    height: 30px;
    margin: 0;
    padding: 15px 0 15px 0;
    -webkit-box-shadow: inset 0 1px 0 rgba(0, 0, 0, .1);
    box-shadow: inset 0 1px 0 rgba(0, 0, 0, .1);
}

.ph_element_<?php echo $galleryID; ?> .title-block_<?php echo $galleryID; ?> h3 {
    position: relative;
    margin: 0 !important;
    padding: 0 1% 5px 1% !important;
    width: 98%;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
    font-weight: normal;
    font-size: <?php echo Photo_Gallery_WP()->settings->view2_element_title_font_size;?>px !important;
    line-height: <?php echo Photo_Gallery_WP()->settings->view2_popup_title_font_size;?>px !important;
    color: #<?php echo Photo_Gallery_WP()->settings->view2_element_title_font_color;?>;
}

.ph_element_<?php echo $galleryID; ?> .title-block_<?php echo $galleryID; ?> .button-block {
    position: absolute;
    right: 0;
    top: 0;
    display: none;
    vertical-align: middle;
    padding: 10px 10px 4px 10px;

    border-left: 1px solid rgba(0, 0, 0, .05);
}

.ph_element_<?php echo $galleryID; ?>:hover .title-block_<?php echo $galleryID; ?> .button-block {
    display: block;
}

.ph_element_<?php echo $galleryID; ?> .title-block_<?php echo $galleryID; ?> a, .ph_element_ .title-block_<?php echo $galleryID; ?> a:link, .ph_element .title-block_<?php echo $galleryID; ?> a:visited,
.ph_element_<?php echo $galleryID; ?> .title-block_<?php echo $galleryID; ?> a:hover, .ph_element_<?php echo $galleryID; ?> .title-block_<?php echo $galleryID; ?> a:focus, .ph_element_<?php echo $galleryID; ?> .title-block_<?php echo $galleryID; ?> a:active {
    position: relative;
    display: block;
    vertical-align: middle;
    padding: 3px 10px 3px 10px;
    border-radius: 3px;
    font-size: <?php echo Photo_Gallery_WP()->settings->view2_element_linkbutton_font_size;?>px;
    background: #<?php echo Photo_Gallery_WP()->settings->view2_element_linkbutton_background_color;?>;
    color: #<?php echo Photo_Gallery_WP()->settings->view2_element_linkbutton_color;?>;
    text-decoration: none !important;
}

.load_more5 {
    margin: 10px 0;
    position: relative;
    text-align: <?php if(Photo_Gallery_WP()->settings->video_view1_loadmore_position == 'left') {echo 'left';}
			elseif (Photo_Gallery_WP()->settings->video_view1_loadmore_position == 'center') { echo 'center'; }
			elseif(Photo_Gallery_WP()->settings->video_view1_loadmore_position == 'right') { echo 'right'; }?>;
    width: 100%;
}

.load_more_button5 {
    border-radius: 10px;
    display: inline-block;
    padding: 5px 15px;
    font-size: <?php echo Photo_Gallery_WP()->settings->video_view1_loadmore_fontsize; ?>px !important;;
    color: <?php echo '#'.Photo_Gallery_WP()->settings->video_view1_loadmore_font_color; ?> !important;;
    background: <?php echo '#'.Photo_Gallery_WP()->settings->video_view1_button_color; ?> !important;
    cursor: pointer;
}

.load_more_button5:hover {
    color: <?php echo '#'.Photo_Gallery_WP()->settings->video_view1_loadmore_font_color_hover; ?> !important;
    background: <?php echo '#'.Photo_Gallery_WP()->settings->video_view1_button_color_hover; ?> !important;
}

.loading5 {
    display: none;
}

.paginate5 {
    font-size: <?php echo Photo_Gallery_WP()->settings->video_view1_paginator_fontsize; ?>px !important;
    color: <?php echo '#'.Photo_Gallery_WP()->settings->video_view1_paginator_color; ?> !important;
    text-align: <?php echo Photo_Gallery_WP()->settings->video_view1_paginator_position; ?>;
    margin-top: 15px;
}

.paginate5 a {
    border-bottom: none !important;
}

.icon-style5 {
    font-size: <?php echo Photo_Gallery_WP()->settings->video_view1_paginator_icon_size; ?>px !important;
    color: <?php echo '#'.Photo_Gallery_WP()->settings->video_view1_paginator_icon_color; ?> !important;
}

.clear {
    clear: both;
}

/*#####POPUP#####*/
#huge_it_gallery_popup_list_<?php echo $galleryID; ?> {
    position: fixed;
    display: table;
    width: 80%;
    top: 7%;
    left: 7%;
    margin: 0 !important;
    padding: 0 !important;
    list-style: none;
    z-index: 100000000;
    display: none;
    height: 85%;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?>.active {
    display: table;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> li.pupup-element {
    position: relative;
    display: none;
    width: 100%;
    padding: 40px 0 20px 0;
    min-height: 100%;
    position: relative;
    background: #<?php echo Photo_Gallery_WP()->settings->view2_popup_background_color;?>;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> li.pupup-element.active {
    display: block;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .heading-navigation_<?php echo $galleryID; ?> {
    position: absolute;
    width: 100%;
    height: 40px;
    top: 0;
    left: 0;
    z-index: 2001;
    background: url('<?php echo  PHOTO_GALLERY_WP_IMAGES_URL.'/admin_images/divider.line.png'; ?>') center bottom repeat-x;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .heading-navigation_<?php echo $galleryID; ?> .close, #huge_it_gallery_popup_list_<?php echo $galleryID; ?> .heading-navigation_<?php echo $galleryID; ?> .close:link, #huge_it_gallery_popup_list_<?php echo $galleryID; ?> .heading-navigation_<?php echo $galleryID; ?> .close:visited {
    position: relative;
    float: right;
    width: 40px;
    height: 40px;
    display: block;
    background: url('<?php echo  PHOTO_GALLERY_WP_IMAGES_URL.'/admin_images/close.popup.'.Photo_Gallery_WP()->settings->view2_popup_closebutton_style.'.png'; ?>') center center no-repeat;
    border-left: 1px solid #ccc;
    opacity: .65;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .heading-navigation_<?php echo $galleryID; ?> .close:hover, #huge_it_gallery_popup_list_<?php echo $galleryID; ?> .heading-navigation_<?php echo $galleryID; ?> .close:focus, #huge_it_gallery_popup_list_<?php echo $galleryID; ?> .heading-navigation_<?php echo $galleryID; ?> .close:active {
    opacity: 1;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> li.pupup-element .popup-wrapper_<?php echo $galleryID; ?> {
    position: relative;
    width: 98%;
    height: 98%;
    padding: 2% 0% 0% 2%;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .image-block_<?php echo $galleryID; ?> {
    width: 55%;
<?php if(Photo_Gallery_WP()->settings->view2_popup_full_width == 'no') { echo "height:100%;"; }
	else { echo "height:100%;"; }?> position: relative;
    float: left;
    margin-right: 2%;
    border-right: 1px solid #ccc;
    min-width: 200px;
    min-height: 100%;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .image-block_<?php echo $galleryID; ?> img {
<?php
	if(Photo_Gallery_WP()->settings->view2_popup_full_width == 'no') { echo "max-width:100% !important; max-height:100% !important;margin: 0 auto !important; position:relative !important; display:block;"; }
	else { echo "width:100% !important;"; }
?> display: block;
    padding: 0 !important;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .image-block_<?php echo $galleryID; ?> iframe {
    width: 100% !important;
    height: 100%;
    display: block;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block {
    width: 42.8%;
    height: 100%;
    position: relative;
    float: left;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> li.pupup-element .popup-wrapper_<?php echo $galleryID; ?> .right-block > div {
    padding-top: 10px;
    padding-right: 4%;
    margin-bottom: 10px;
<?php if(Photo_Gallery_WP()->settings->view2_show_separator_lines=="yes") {?> background: url('<?php echo  PHOTO_GALLERY_WP_IMAGES_URL.'/admin_images/divider.line.png'; ?>') center top repeat-x;
<?php } ?>
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> li.pupup-element .popup-wrapper_<?php echo $galleryID; ?> .right-block > div:last-child {
    background: none;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block .title {
    position: relative;
    display: block;
    margin: 0 0 10px 0 !important;
    font-size: <?php echo Photo_Gallery_WP()->settings->view2_popup_title_font_size;?>px !important;
    line-height: <?php echo Photo_Gallery_WP()->settings->view2_popup_title_font_size;?>px !important;
    color: #<?php echo Photo_Gallery_WP()->settings->view2_popup_title_font_color;?>;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block .description {
    clear: both;
    position: relative;
    font-weight: normal;
    text-align: justify;
    font-size: <?php echo Photo_Gallery_WP()->settings->view2_description_font_size;?>px !important;
    color: #<?php echo Photo_Gallery_WP()->settings->view2_description_color;?>;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block .description h1,
#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block .description h2,
#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block .description h3,
#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block .description h4,
#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block .description h5,
#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block .description h6,
#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block .description p,
#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block .description strong,
#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block .description span {
    padding: 2px !important;
    margin: 0 !important;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block .description ul,
#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block .description li {
    padding: 2px 0 2px 5px;
    margin: 0 0 0 8px;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block ul.thumbs-list {
    list-style: none;
    display: table;
    position: relative;
    clear: both;
    width: 100%;
    margin: 0 auto;
    padding: 0;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block ul.thumbs-list li {
    display: block;
    float: left;
    width: <?php echo Photo_Gallery_WP()->settings->view2_thumbs_width;?>px;
    height: <?php echo Photo_Gallery_WP()->settings->view2_thumbs_height;?>px;
    margin: 0 2% 5px 1% !important;
    opacity: 0.45;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block ul.thumbs-list li.active, #huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block ul.thumbs-list li:hover {
    opacity: 1;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block ul.thumbs-list li a {
    display: block;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block ul.thumbs-list li img {
    width: <?php echo Photo_Gallery_WP()->settings->view2_thumbs_width;?>px !important;
    height: <?php echo Photo_Gallery_WP()->settings->view2_thumbs_height;?>px !important;
}

/**/
#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .heading-navigation_<?php echo $galleryID; ?> .left-change, #huge_it_gallery_popup_list_<?php echo $galleryID; ?> .heading-navigation_<?php echo $galleryID; ?> .right-change {
    width: 40px;
    height: 39px;
    font-size: 25px;
    display: inline-block;
    text-align: center;
    border: 1px solid #eee;
    border-bottom: none;
    border-top: none;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .heading-navigation_<?php echo $galleryID; ?> .right-change {
    positio: relative;
    margin-left: -6px;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .heading-navigation_<?php echo $galleryID; ?> .right-change:hover, #huge_it_gallery_popup_list_<?php echo $galleryID; ?> .heading-navigation_<?php echo $galleryID; ?> .left-change:hover {
    background: #ddd;
    border-color: #ccc;
    color: #000 !important;
    cursor: pointer;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .heading-navigation_<?php echo $galleryID; ?> .right-change a, #huge_it_gallery_popup_list_<?php echo $galleryID; ?> .heading-navigation_<?php echo $galleryID; ?> .left-change a {
    position: absolute;
    top: 50%;
    transform: translate(-50%, -50%);
    color: #777;
    text-decoration: none;
    width: 12px;
    height: 24px;
    line-height: 1;
    display: inline-block;
}

/**/
.pupup-element .button-block {
    position: relative;
}

.pupup-element .button-block a, .pupup-element .button-block a:link, .pupup-element .button-block a:visited {
    position: relative;
    display: inline-block;
    padding: 6px 12px;
    background: #<?php echo Photo_Gallery_WP()->settings->view2_popup_linkbutton_background_color;?>;
    color: #<?php echo Photo_Gallery_WP()->settings->view2_popup_linkbutton_color;?>;
    font-size: <?php echo Photo_Gallery_WP()->settings->view2_popup_linkbutton_font_size;?>px;
    text-decoration: none;
}

.pupup-element .button-block a:hover, .pupup-element .button-block a:focus, .pupup-element .button-block a:active {
    background: #<?php echo Photo_Gallery_WP()->settings->view2_popup_linkbutton_background_hover_color;?>;
    color: #<?php echo Photo_Gallery_WP()->settings->view2_popup_linkbutton_font_hover_color;?>;
}

#ph-g-wp-popup-overlay-image {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 199;
    background: <?php
			list($r,$g,$b) = array_map('hexdec',str_split(Photo_Gallery_WP()->settings->view2_popup_overlay_color,2));
				$titleopacity=Photo_Gallery_WP()->settings->view2_popup_overlay_transparency_color/100;
				echo 'rgba('.$r.','.$g.','.$b.','.$titleopacity.')  !important';
	?>
}

@media only screen and (max-width: 767px) {
    #huge_it_gallery_popup_list_<?php echo $galleryID; ?> {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: auto !important;
        left: 0;
    }

    #huge_it_gallery_popup_list_<?php echo $galleryID; ?> li.pupup-element {
        margin: 0;
        height: auto !important;
        position: absolute;
        left: 0;
        top: 0;
    }

    #huge_it_gallery_popup_list_<?php echo $galleryID; ?> li.pupup-element .popup-wrapper_<?php echo $galleryID; ?> {
        height: auto !important;
    }

    #huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .image-block_<?php echo $galleryID; ?> {
        width: 100%;
        float: none;
        clear: both;
        margin-right: 0;
        border-right: 0;
    }

    #huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block {
        width: 100%;
        float: none;
        clear: both;
        margin-right: 0;
        border-right: 0;
    }

    #ph-g-wp-popup-overlay-image_<?php echo $galleryID; ?> {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 199;
    }
}

<?php switch ($like_dislike) {
case "dislike":
?>
/*/////Like/Dislike Styles BEGIN//////Dislike//////*/
#huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> {
    float: right;
    color: #<?php echo Photo_Gallery_WP()->settings->popup_likedislike_font_color; ?>;
}

#huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .ph-g-wp_gallery_like_wrapper,
#huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_gallery_dislike_wrapper {
    position: relative;
    background: <?php
			list($r,$g,$b) = array_map('hexdec',str_split(Photo_Gallery_WP()->settings->popup_likedislike_bg,2));
				$titleopacity=Photo_Gallery_WP()->settings->popup_likedislike_bg_trans/100;
				echo 'rgba('.$r.','.$g.','.$b.','.$titleopacity.')  !important';
	?>;
    display: inline-block;
    border-radius: 3px;
    font-size: 0;
}

#huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .ph-g-wp_gallery_like_wrapper {
    margin: 3px;
    cursor: pointer;
}

#huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_gallery_dislike_wrapper {
    margin: 3px 3px 3px 0;
    cursor: pointer;
}

#huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_like {
    font-size: 0;
}

#huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_like .huge_it_like_thumb {
    display: block;
    float: left;
    padding: 4px 4px 4px 18px;
    font-size: 12px;
    font-weight: 700;
    position: relative;
    height: 28px;
}

#huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .ph-g-wp_like_count,
#huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_dislike_count {
    display: block;
    float: left;
    padding: 4px 4px 4px 4px;
    font-size: 12px;
    font-weight: 700;
}

#huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_dislike {
    font-size: 0;
}

#huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_dislike .huge_it_dislike_thumb {
    display: block;
    float: left;
    padding: 4px 4px 4px 18px;
    font-size: 12px;
    font-weight: 700;
    position: relative;
    height: 28px;
}

#huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .like_thumb_up {
    font-size: 17px;
    position: absolute;
    top: 5px;
    left: 4px;
    color: #<?php echo Photo_Gallery_WP()->settings->popup_likedislike_thumb_color; ?>;
}

#huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .dislike_thumb_down {
    font-size: 17px;
    position: absolute;
    top: 4px;
    left: 4px;
    color: #<?php echo Photo_Gallery_WP()->settings->popup_likedislike_thumb_color; ?>;
}

#huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_hide {
    display: none !important;
}

#huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .like_thumb_active {
    color: # <?php echo Photo_Gallery_WP()->settings->popup_likedislike_thumb_active_color; ?> !important;
}

#huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .like_font_active {
    color: # <?php echo Photo_Gallery_WP()->settings->popup_active_font_color; ?> !important;
}

@media screen and (min-width: 768px) {
    #huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .ph-g-wp_gallery_like_wrapper:hover .huge_it_like {
        color: # <?php echo Photo_Gallery_WP()->settings->popup_active_font_color; ?> !important;
    }

    #huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .ph-g-wp_gallery_like_wrapper:hover .like_thumb_up {
        color: # <?php echo Photo_Gallery_WP()->settings->popup_likedislike_thumb_active_color; ?> !important;
    }

    #huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_gallery_dislike_wrapper:hover .huge_it_dislike {
        color: # <?php echo Photo_Gallery_WP()->settings->popup_active_font_color; ?> !important;
    }

    #huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_gallery_dislike_wrapper:hover .dislike_thumb_down {
        color: # <?php echo Photo_Gallery_WP()->settings->popup_likedislike_thumb_active_color; ?> !important;
    }
}

/*///////////////////POPUP////////////////*/
#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> {
    color: #<?php echo Photo_Gallery_WP()->settings->popup_likedislike_font_color; ?>;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .ph-g-wp_gallery_like_wrapper,
#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_gallery_dislike_wrapper {
    position: relative;
    background: <?php
			list($r,$g,$b) = array_map('hexdec',str_split(Photo_Gallery_WP()->settings->popup_likedislike_bg,2));
				$titleopacity=Photo_Gallery_WP()->settings->popup_likedislike_bg_trans/100;
				echo 'rgba('.$r.','.$g.','.$b.','.$titleopacity.')  !important';
	?>;
    display: inline-block;
    border-radius: 3px;
    font-size: 0;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .ph-g-wp_gallery_like_wrapper {
    margin: 3px;
    cursor: pointer;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_gallery_dislike_wrapper {
    margin: 3px 3px 3px 0;
    cursor: pointer;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_like {
    font-size: 0;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_like .huge_it_like_thumb {
    display: block;
    float: left;
    padding: 4px 4px 4px 18px;
    font-size: 12px;
    font-weight: 700;
    position: relative;
    height: 28px;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .ph-g-wp_like_count,
#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_dislike_count {
    display: block;
    float: left;
    padding: 4px 4px 4px 4px;
    font-size: 12px;
    font-weight: 700;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_dislike {
    font-size: 0;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_dislike .huge_it_dislike_thumb {
    display: block;
    float: left;
    padding: 4px 4px 4px 18px;
    font-size: 12px;
    font-weight: 700;
    position: relative;
    height: 28px;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .like_thumb_up {
    font-size: 17px;
    position: absolute;
    top: 5px;
    left: 4px;
    color: #<?php echo Photo_Gallery_WP()->settings->popup_likedislike_thumb_color; ?>;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .dislike_thumb_down {
    font-size: 17px;
    position: absolute;
    top: 4px;
    left: 4px;
    color: #<?php echo Photo_Gallery_WP()->settings->popup_likedislike_thumb_color; ?>;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_hide {
    display: none !important;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .like_thumb_active {
    color: # <?php echo Photo_Gallery_WP()->settings->popup_likedislike_thumb_active_color; ?> !important;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .like_font_active {
    color: # <?php echo Photo_Gallery_WP()->settings->popup_active_font_color; ?> !important;
}

@media screen and (min-width: 768px) {
    #huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .ph-g-wp_gallery_like_wrapper:hover .huge_it_like {
        color: # <?php echo Photo_Gallery_WP()->settings->popup_active_font_color; ?> !important;
    }

    #huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .ph-g-wp_gallery_like_wrapper:hover .like_thumb_up {
        color: # <?php echo Photo_Gallery_WP()->settings->popup_likedislike_thumb_active_color; ?> !important;
    }

    #huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_gallery_dislike_wrapper:hover .huge_it_dislike {
        color: # <?php echo Photo_Gallery_WP()->settings->popup_active_font_color; ?> !important;
    }

    #huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_gallery_dislike_wrapper:hover .dislike_thumb_down {
        color: # <?php echo Photo_Gallery_WP()->settings->popup_likedislike_thumb_active_color; ?> !important;
    }
}

<?php break; ?>
/*///////////////////POPUP////////////////*/
/*/////Like/Dislike Styles END//////Dislike//////*/
<?php case "heart":
?>
/*/////Like/Dislike Styles BEGIN//////Heart//////*/
#huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> {
    float: right;
}

#huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .ph-g-wp_gallery_like_wrapper {
    position: relative;
    background: <?php
			list($r,$g,$b) = array_map('hexdec',str_split(Photo_Gallery_WP()->settings->popup_likedislike_bg,2));
				$titleopacity=Photo_Gallery_WP()->settings->popup_likedislike_bg_trans/100;
				echo 'rgba('.$r.','.$g.','.$b.','.$titleopacity.')  !important';
	?>;
    display: inline-block;
    border-radius: 8px;
    font-size: 0;
}

#huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .ph-g-wp_gallery_like_wrapper:hover {
    background: #<?php echo Photo_Gallery_WP()->settings->popup_heart_hov_bg_color; ?>;
}

#huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .ph-g-wp_gallery_like_wrapper {
    margin: 3px;
}

#huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_like {
    font-size: 0;
}

#huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_like .huge_it_like_thumb {
    display: block;
    float: left;
<?php $heartCount='';
if(Photo_Gallery_WP()->settings->popup_rating_count=='no'){
	$heartCount="transparent";
}else{
	$heartCount='#'.Photo_Gallery_WP()->settings->popup_likedislike_font_color;
}
?> color: <?php echo $heartCount.';'; ?> width: 38px;
    height: 38px;
    padding: 8px 0;
    font-size: 12px;
    text-align: center;
    font-weight: 700;
    position: relative;
    cursor: pointer;
}

#huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_like .huge_it_like_thumb:after {
    color: #fff;
}

#huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .ph-g-wp_like_count {
    display: none;
}

#huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_like .huge_it_like_thumb:hover:after {
    opacity: 1;
}

#huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_like .likeheart {
    font-size: 32px;
    color: #<?php echo Photo_Gallery_WP()->settings->popup_heart_likedislike_thumb_color; ?>;
    position: absolute;
    top: 4px;
    left: 3px;
    transition: 0.3s ease;
}

#huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .like_thumb_active {
    color: # <?php echo Photo_Gallery_WP()->settings->popup_heart_likedislike_thumb_active_color; ?> !important;
}

#huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .like_font_active {
<?php if(Photo_Gallery_WP()->settings->popup_rating_count!='no'):?> color: # <?php echo Photo_Gallery_WP()->settings->popup_active_font_color; ?> !important;
<?php endif; ?>
}

@media screen and (min-width: 768px) {
    #huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .ph-g-wp_gallery_like_wrapper:hover .huge_it_like_thumb {
    <?php if(Photo_Gallery_WP()->settings->popup_rating_count!='no'):?> color: # <?php echo Photo_Gallery_WP()->settings->popup_active_font_color; ?> !important;
    <?php endif; ?>
    }

    #huge_it_gallery_content_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .ph-g-wp_gallery_like_wrapper:hover .likeheart {
        color: # <?php echo Photo_Gallery_WP()->settings->popup_heart_likedislike_thumb_active_color; ?> !important;
    }
}

/*///////////////POPUP//////////////////*/
#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> {
    position: absolute;
    top: 0;
    right: 0;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .ph-g-wp_gallery_like_wrapper {
    position: relative;
    background: <?php
			list($r,$g,$b) = array_map('hexdec',str_split(Photo_Gallery_WP()->settings->popup_likedislike_bg,2));
				$titleopacity=Photo_Gallery_WP()->settings->popup_likedislike_bg_trans/100;
				echo 'rgba('.$r.','.$g.','.$b.','.$titleopacity.')  !important';
	?>;
    display: inline-block;
    border-radius: 8px;
    font-size: 0;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .ph-g-wp_gallery_like_wrapper:hover {
    background: #<?php echo Photo_Gallery_WP()->settings->popup_heart_hov_bg_color; ?>;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .ph-g-wp_gallery_like_wrapper {
    margin: 3px;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_like {
    font-size: 0;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_like .huge_it_like_thumb {
    display: block;
    float: left;
<?php $heartCount='';
if(Photo_Gallery_WP()->settings->popup_rating_count=='no'){
	$heartCount="transparent";
}else{
	$heartCount='#'.Photo_Gallery_WP()->settings->popup_likedislike_font_color;
}
?> color: <?php echo $heartCount.';'; ?> width: 38px;
    height: 38px;
    padding: 8px 0;
    font-size: 12px;
    text-align: center;
    font-weight: 700;
    position: relative;
    cursor: pointer;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_like .huge_it_like_thumb:after {
    color: #fff;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .ph-g-wp_like_count {
    display: none;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_like .huge_it_like_thumb:hover:after {
    opacity: 1;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .huge_it_like .likeheart {
    font-size: 32px;
    color: #<?php echo Photo_Gallery_WP()->settings->popup_heart_likedislike_thumb_color; ?>;
    position: absolute;
    top: 4px;
    left: 3px;
    transition: 0.3s ease;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .like_thumb_active {
    color: # <?php echo Photo_Gallery_WP()->settings->popup_heart_likedislike_thumb_active_color; ?> !important;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .like_font_active {
<?php if(Photo_Gallery_WP()->settings->popup_rating_count!='no'):?> color: # <?php echo Photo_Gallery_WP()->settings->popup_active_font_color; ?> !important;
<?php endif; ?>
}

@media screen and (min-width: 768px) {
    #huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .ph-g-wp_gallery_like_wrapper:hover .huge_it_like_thumb {
    <?php if(Photo_Gallery_WP()->settings->popup_rating_count!='no'):?> color: # <?php echo Photo_Gallery_WP()->settings->popup_active_font_color; ?> !important;
    <?php endif; ?>
    }

    #huge_it_gallery_popup_list_<?php echo $galleryID; ?> .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?> .ph-g-wp_gallery_like_wrapper:hover .likeheart {
        color: # <?php echo Photo_Gallery_WP()->settings->popup_heart_likedislike_thumb_active_color; ?> !important;
    }
}

/*/////Like/Dislike Styles END//////Heart//////*/
<?php break;
}?>

.ph-gallery-wp-loading-icon {
    width: 100%;
    height: 100%;
    position: absolute;
    z-index: 1;
    background: url(<?php echo PHOTO_GALLERY_WP_IMAGES_URL.'/loading/loading-'.$loading_type.'.svg'; ?>) center top;
    background-repeat: no-repeat;
    background-size: 60px auto;
}

/* ==========================================================================
   Envira Gallery Styles
   ========================================================================== */
/**
* Envira Gallery - Reset
*/
.envira-gallery-wrap,
.envira-gallery-wrap *,
.envira-tags-filter-list,
.envira-tags-filter-list * {
    background: none;
    border: 0 none;
    border-radius: 0;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    float: none;
    font-size: 100%;
    height: auto;
    letter-spacing: normal;
    /*list-style:none;*/
    outline: none;
    position: static;
    text-decoration: none;
    text-indent: 0;
    text-shadow: none;
    text-transform: none;
    width: auto;
    visibility: visible;
    overflow: visible;
    margin: 0;
    padding: 0;
    line-height: 1;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    -ms-box-shadow: none;
    -o-box-shadow: none;
    box-shadow: none;
    -webkit-appearance: none;
    transition: none;
    -webkit-transition: none;
    -moz-transition: none;
    -o-transition: none;
    -ms-transition: none;
}

/**
* Tags Addon
*/
.envira-tags-filter-list {
    clear: both;
    margin: 0 0 10px 0;
}

.envira-tags-filter-list li.envira-tags-filter,
.envira-tags-filter-list li.envira-tag-filter {
    float: left;
    margin: 0 20px 10px 0;
}

.envira-tags-filter-list .envira-tag-filter-link {
    font-size: 13px;
    font-weight: bold;
}

/**
* Breadcrumbs Addon
*/
.envira-breadcrumbs {
    display: block;
    margin: 0 0 20px 0;
    padding: 10px;
    background: #eee;
    clear: both;
}

.envira-breadcrumbs a {
    text-decoration: none;
}

/**
* WooCommerce Addon
*/
.envira-hidden {
    display: none;
}

/**
* Main Wrapper
*/
.envira-gallery-wrap {
    width: 100%;
    margin: 0 auto 20px auto;
    /**
    * Pagination Addon
    */
    /**
    * Description
    */
    /**
    * Inner Wrapper
    */
}

.envira-gallery-wrap .envira-pagination {
    margin: 0 0 20px 0;
}

.envira-gallery-wrap .envira-gallery-description {
    clear: both;
}

.envira-gallery-wrap .envira-gallery-public {
    width: 100%;
    margin: 0 auto 20px auto;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    /**
    * Clearing
    */
    /**
    * Inner
    */
    /**
    * Gallery Item
    */
    /**
    * Column Widths and Clearing
    */
    /**
    * Optional: Isotope
    * - if enabled, .enviratope is added to .envira-gallery-public
    * - no clearing on gallery items
    */
    /**
    * Optional: CSS Animations
    * - if enabled, .envira-gallery-css-animations is added to .envira-gallery-public
    */
}

.envira-gallery-wrap .envira-gallery-public.envira-clear {
    clear: both;
}

.envira-gallery-wrap .envira-gallery-public.envira-clear:after {
    clear: both;
    content: '.';
    display: block;
    height: 0;
    line-height: 0;
    overflow: auto;
    visibility: hidden;
    zoom: 1;
}

.envira-gallery-wrap .envira-gallery-public .envira-gallery-item-inner {
    position: relative;
    /**
    * Dynamic Positioning
    */
}

.envira-gallery-wrap .envira-gallery-public .envira-gallery-item-inner .envira-gallery-position-overlay {
    box-sizing: border-box;
    position: absolute;
    overflow: visible;
    z-index: 999;
    /**
    * Top Left
    */
    /**
    * Top Right
    */
    /**
    * Bottom Left
    */
    /**
    * Bottom Right
    */
}

.envira-gallery-wrap .envira-gallery-public .envira-gallery-item-inner .envira-gallery-position-overlay.envira-gallery-top-left {
    top: 0;
    left: 0;
    padding: 5px 0 0 5px;
}

.envira-gallery-wrap .envira-gallery-public .envira-gallery-item-inner .envira-gallery-position-overlay.envira-gallery-top-right {
    top: 0;
    right: 0;
    padding: 5px 5px 0 0;
    text-align: right;
}

.envira-gallery-wrap .envira-gallery-public .envira-gallery-item-inner .envira-gallery-position-overlay.envira-gallery-bottom-left {
    bottom: 0;
    left: 0;
    padding: 0 0 5px 5px;
}

.envira-gallery-wrap .envira-gallery-public .envira-gallery-item-inner .envira-gallery-position-overlay.envira-gallery-bottom-right {
    bottom: 0;
    right: 0;
    padding: 0 5px 5px 0;
    text-align: right;
}

.envira-gallery-wrap .envira-gallery-public .envira-gallery-item {
    float: left;
    /**
    * Link
    */
    /**
    * Image
    */
    /**
    * Videos
    */
}

.envira-gallery-wrap .envira-gallery-public .envira-gallery-item > .envira-gallery-link {
    display: block;
    outline: none;
    border: 0 none;
    position: relative;
}

.envira-gallery-wrap .envira-gallery-public .envira-gallery-item img {
    float: none;
    display: block;
    margin: 0 auto;
    padding: 0;
    max-width: 100%;
}

.envira-gallery-wrap .envira-gallery-public .envira-gallery-item iframe, .envira-gallery-wrap .envira-gallery-public .envira-gallery-item video {
    display: block;
    margin: 0 auto;
    width: 100%;
}

.envira-gallery-wrap .envira-gallery-public.envira-gallery-1-columns .envira-gallery-item {
    clear: both;
    width: 100%;
}

.envira-gallery-wrap .envira-gallery-public.envira-gallery-2-columns .envira-gallery-item {
    width: 50%;
}

.envira-gallery-wrap .envira-gallery-public.envira-gallery-2-columns .envira-gallery-item:nth-child(2n+1) {
    clear: both;
}

.envira-gallery-wrap .envira-gallery-public.envira-gallery-3-columns .envira-gallery-item {
    width: 33.33%;
}

.envira-gallery-wrap .envira-gallery-public.envira-gallery-3-columns .envira-gallery-item:nth-child(3n+1) {
    clear: both;
}

.envira-gallery-wrap .envira-gallery-public.envira-gallery-4-columns .envira-gallery-item {
    width: 25%;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.envira-gallery-wrap .envira-gallery-public.envira-gallery-4-columns .envira-gallery-item:nth-child(4n+1) {
    clear: both;
}

.envira-gallery-wrap .envira-gallery-public.envira-gallery-5-columns .envira-gallery-item {
    width: 20%;
}

.envira-gallery-wrap .envira-gallery-public.envira-gallery-5-columns .envira-gallery-item:nth-child(5n+1) {
    clear: both;
}

.envira-gallery-wrap .envira-gallery-public.envira-gallery-6-columns .envira-gallery-item {
    width: 16.66%;
}

.envira-gallery-wrap .envira-gallery-public.envira-gallery-6-columns .envira-gallery-item:nth-child(6n+1) {
    clear: both;
}

.envira-gallery-wrap .envira-gallery-public.enviratope .envira-gallery-item {
    clear: none !important;
}

.envira-gallery-wrap .envira-gallery-public.envira-gallery-css-animations {
    /**
    * Gallery Item
    */
}

.envira-gallery-wrap .envira-gallery-public.envira-gallery-css-animations .envira-gallery-item {
    /**
    * Image
    */
    /**
    * Image Hover
    * - Always force opacity: 1, as the CSS Opacity setting for images may be less e.g. 0.5
    */
}

.envira-gallery-wrap .envira-gallery-public.envira-gallery-css-animations .envira-gallery-item img {
    opacity: 0;
    transition: all .2s ease-in-out;
}

.envira-gallery-wrap .envira-gallery-public.envira-gallery-css-animations .envira-gallery-item a:hover img {
    opacity: 1 !important;
}

/**
* Main Wrapper
*/
.envira-gallery-public.envira-justified-gallery {
    /**
    * Inner
    */
    /*    .envira-gallery-description {
            &.envira-gallery-description-above {
                display: table;
            }
        }*/
}

.envira-gallery-public.envira-justified-gallery .envira-gallery-item-inner {
    position: absolute;
}

.envira-gallery-public.envira-gallery-1-columns .envira-title,
.envira-gallery-public.envira-gallery-1-columns .envira-caption,
.envira-gallery-public.envira-gallery-2-columns .envira-title,
.envira-gallery-public.envira-gallery-2-columns .envira-caption,
.envira-gallery-public.envira-gallery-3-columns .envira-title,
.envira-gallery-public.envira-gallery-3-columns .envira-caption,
.envira-gallery-public.envira-gallery-4-columns .envira-title,
.envira-gallery-public.envira-gallery-4-columns .envira-caption,
.envira-gallery-public.envira-gallery-5-columns .envira-title,
.envira-gallery-public.envira-gallery-5-columns .envira-caption,
.envira-gallery-public.envira-gallery-6-columns .envira-title,
.envira-gallery-public.envira-gallery-6-columns .envira-caption {
    text-align: center;
    width: 100%;
    font-size: 14px;
    line-height: 24px;
    display: inline-block;
}

.envira-gallery-public.envira-gallery-1-columns .envira-title,
.envira-gallery-public.envira-gallery-2-columns .envira-title,
.envira-gallery-public.envira-gallery-3-columns .envira-title,
.envira-gallery-public.envira-gallery-4-columns .envira-title,
.envira-gallery-public.envira-gallery-5-columns .envira-title,
.envira-gallery-public.envira-gallery-6-columns .envira-title {
    font-size: 18px;
    line-height: 26px;
    font-weight: 600;
}

.envira-gallery-public.envira-gallery-1-columns .envira-caption,
.envira-gallery-public.envira-gallery-2-columns .envira-caption,
.envira-gallery-public.envira-gallery-3-columns .envira-caption,
.envira-gallery-public.envira-gallery-4-columns .envira-caption,
.envira-gallery-public.envira-gallery-5-columns .envira-caption,
.envira-gallery-public.envira-gallery-6-columns .envira-caption {
    font-weight: 200;
}

/**
* RTL Support
*/
.envira-gallery-wrap.envira-gallery-rtl {
    /**
    * Inner Wrapper
    */
}

.envira-gallery-wrap.envira-gallery-rtl .envira-gallery-public {
    /**
    * Gallery Item
    */
}

.envira-gallery-wrap.envira-gallery-rtl .envira-gallery-public .envira-gallery-item {
    float: right;
}

/**
* Mobile Landscape Size to Tablet Portrait (devices and browsers)
* - Envira Gallery Columns: If 4, 5 or 6, reduce to 3 columns. Isotope will detect change + resize automatically.
*/
@media only screen and (max-width: 767px) {
    /**
    * Main Wrapper
    */
    .envira-gallery-wrap {
        /**
        * Inner Wrapper
        */
    }

    .envira-gallery-wrap .envira-gallery-public {
        /**
        * Column Widths and Clearing
        */
        /**
        * Optional: Isotope
        * - if enabled, .enviratope is added to .envira-gallery-public
        * - no clearing on gallery items
        */
    }

    .envira-gallery-wrap .envira-gallery-public.envira-gallery-4-columns .envira-gallery-item {
        width: 33%;
    }

    .envira-gallery-wrap .envira-gallery-public.envira-gallery-4-columns .envira-gallery-item:nth-child(4n+1) {
        clear: none;
    }

    .envira-gallery-wrap .envira-gallery-public.envira-gallery-4-columns .envira-gallery-item:nth-child(3n+1) {
        clear: both;
    }

    .envira-gallery-wrap .envira-gallery-public.envira-gallery-5-columns .envira-gallery-item {
        width: 33%;
    }

    .envira-gallery-wrap .envira-gallery-public.envira-gallery-5-columns .envira-gallery-item:nth-child(5n+1) {
        clear: none;
    }

    .envira-gallery-wrap .envira-gallery-public.envira-gallery-5-columns .envira-gallery-item:nth-child(3n+1) {
        clear: both;
    }

    .envira-gallery-wrap .envira-gallery-public.envira-gallery-6-columns .envira-gallery-item {
        width: 33%;
    }

    .envira-gallery-wrap .envira-gallery-public.envira-gallery-6-columns .envira-gallery-item:nth-child(6n+1) {
        clear: none;
    }

    .envira-gallery-wrap .envira-gallery-public.envira-gallery-6-columns .envira-gallery-item:nth-child(3n+1) {
        clear: both;
    }

    .envira-gallery-wrap .envira-gallery-public.enviratope .envira-gallery-item {
        clear: none !important;
    }
}

/**
* Mobile Landscape (devices and browsers)
* - Envira Gallery Columns: Reduce to 2 column. Isotope will detect change + resize automatically.
*/
@media only screen and (max-width: 459px) {
    /**
    * Main Wrapper
    */
    .envira-gallery-wrap {
        /**
        * Inner Wrapper
        */
    }

    .envira-gallery-wrap .envira-gallery-public {
        /**
        * Column Widths and Clearing
        */
        /**
        * Optional: Isotope
        * - if enabled, .enviratope is added to .envira-gallery-public
        * - no clearing on gallery items
        */
    }

    .envira-gallery-wrap .envira-gallery-public.envira-gallery-2-columns .envira-gallery-item, .envira-gallery-wrap .envira-gallery-public.envira-gallery-3-columns .envira-gallery-item, .envira-gallery-wrap .envira-gallery-public.envira-gallery-4-columns .envira-gallery-item, .envira-gallery-wrap .envira-gallery-public.envira-gallery-5-columns .envira-gallery-item, .envira-gallery-wrap .envira-gallery-public.envira-gallery-6-columns .envira-gallery-item {
        width: 50%;
    }

    .envira-gallery-wrap .envira-gallery-public.envira-gallery-2-columns .envira-gallery-item:nth-child(3n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-2-columns .envira-gallery-item:nth-child(4n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-2-columns .envira-gallery-item:nth-child(5n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-2-columns .envira-gallery-item:nth-child(6n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-3-columns .envira-gallery-item:nth-child(3n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-3-columns .envira-gallery-item:nth-child(4n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-3-columns .envira-gallery-item:nth-child(5n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-3-columns .envira-gallery-item:nth-child(6n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-4-columns .envira-gallery-item:nth-child(3n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-4-columns .envira-gallery-item:nth-child(4n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-4-columns .envira-gallery-item:nth-child(5n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-4-columns .envira-gallery-item:nth-child(6n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-5-columns .envira-gallery-item:nth-child(3n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-5-columns .envira-gallery-item:nth-child(4n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-5-columns .envira-gallery-item:nth-child(5n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-5-columns .envira-gallery-item:nth-child(6n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-6-columns .envira-gallery-item:nth-child(3n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-6-columns .envira-gallery-item:nth-child(4n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-6-columns .envira-gallery-item:nth-child(5n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-6-columns .envira-gallery-item:nth-child(6n+1) {
        clear: none;
    }

    .envira-gallery-wrap .envira-gallery-public.envira-gallery-2-columns .envira-gallery-item:nth-child(2n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-3-columns .envira-gallery-item:nth-child(2n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-4-columns .envira-gallery-item:nth-child(2n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-5-columns .envira-gallery-item:nth-child(2n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-6-columns .envira-gallery-item:nth-child(2n+1) {
        clear: both;
    }

    .envira-gallery-wrap .envira-gallery-public.enviratope .envira-gallery-item {
        clear: none !important;
    }
}

/**
* Mobile Portrait (devices and browsers)
* - Envira Gallery Columns: Reduce to 1 column. Isotope will detect change + resize automatically.
*/
@media only screen and (max-width: 320px) {
    /**
    * Main Wrapper
    */
    .envira-gallery-wrap {
        /**
        * Inner Wrapper
        */
    }

    .envira-gallery-wrap .envira-gallery-public {
        /**
        * Column Widths and Clearing
        */
        /**
        * Optional: Isotope
        * - if enabled, .enviratope is added to .envira-gallery-public
        * - no clearing on gallery items
        */
    }

    .envira-gallery-wrap .envira-gallery-public.envira-gallery-1-columns .envira-gallery-item, .envira-gallery-wrap .envira-gallery-public.envira-gallery-2-columns .envira-gallery-item, .envira-gallery-wrap .envira-gallery-public.envira-gallery-3-columns .envira-gallery-item, .envira-gallery-wrap .envira-gallery-public.envira-gallery-4-columns .envira-gallery-item, .envira-gallery-wrap .envira-gallery-public.envira-gallery-5-columns .envira-gallery-item, .envira-gallery-wrap .envira-gallery-public.envira-gallery-6-columns .envira-gallery-item {
        width: 100%;
    }

    .envira-gallery-wrap .envira-gallery-public.envira-gallery-1-columns .envira-gallery-item:nth-child(2n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-1-columns .envira-gallery-item:nth-child(3n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-1-columns .envira-gallery-item:nth-child(4n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-1-columns .envira-gallery-item:nth-child(5n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-1-columns .envira-gallery-item:nth-child(6n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-2-columns .envira-gallery-item:nth-child(2n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-2-columns .envira-gallery-item:nth-child(3n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-2-columns .envira-gallery-item:nth-child(4n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-2-columns .envira-gallery-item:nth-child(5n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-2-columns .envira-gallery-item:nth-child(6n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-3-columns .envira-gallery-item:nth-child(2n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-3-columns .envira-gallery-item:nth-child(3n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-3-columns .envira-gallery-item:nth-child(4n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-3-columns .envira-gallery-item:nth-child(5n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-3-columns .envira-gallery-item:nth-child(6n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-4-columns .envira-gallery-item:nth-child(2n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-4-columns .envira-gallery-item:nth-child(3n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-4-columns .envira-gallery-item:nth-child(4n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-4-columns .envira-gallery-item:nth-child(5n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-4-columns .envira-gallery-item:nth-child(6n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-5-columns .envira-gallery-item:nth-child(2n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-5-columns .envira-gallery-item:nth-child(3n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-5-columns .envira-gallery-item:nth-child(4n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-5-columns .envira-gallery-item:nth-child(5n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-5-columns .envira-gallery-item:nth-child(6n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-6-columns .envira-gallery-item:nth-child(2n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-6-columns .envira-gallery-item:nth-child(3n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-6-columns .envira-gallery-item:nth-child(4n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-6-columns .envira-gallery-item:nth-child(5n+1), .envira-gallery-wrap .envira-gallery-public.envira-gallery-6-columns .envira-gallery-item:nth-child(6n+1) {
        clear: both;
    }

    .envira-gallery-wrap .envira-gallery-public.enviratope .envira-gallery-item {
        clear: none !important;
    }
}

/* ==========================================================================
   Envira Lightbox Gallery Styles
   ========================================================================== */
/*! envirabox v2.1.5 fancyapps.com | fancyapps.com/envirabox/#license */
.envirabox-wrap,
.envirabox-skin,
.envirabox-outer,
.envirabox-inner,
.envirabox-image,
.envirabox-wrap iframe,
.envirabox-wrap object,
.envirabox-nav,
.envirabox-nav span,
.envirabox-tmp,
.envirabox-buttons,
.envirabox-thumbs,
.envirabox-wrap *,
.envirabox-thumbs *,
.envirabox-buttons * {
    background: none;
    border: 0 none;
    border-radius: 0;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    float: none;
    font-size: 100%;
    height: auto;
    letter-spacing: normal;
    list-style: none;
    outline: none;
    position: static;
    text-decoration: none;
    text-indent: 0;
    text-shadow: none;
    text-transform: none;
    width: auto;
    visibility: visible;
    overflow: visible;
    margin: 0;
    padding: 0;
    line-height: 1;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    -ms-box-shadow: none;
    -o-box-shadow: none;
    box-shadow: none;
    -webkit-appearance: none;
    transition: none;
    -webkit-transition: none;
    -moz-transition: none;
    -o-transition: none;
    -ms-transition: none;
}

.envirabox-wrap {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 988020;
}

.envirabox-skin {
    position: relative;
    background: #f9f9f9;
    color: #444;
    text-shadow: none;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}

.envirabox-opened {
    z-index: 988030;
}

.envirabox-opened .envirabox-skin {
    -webkit-box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
    -moz-box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
}

.envirabox-outer, .envirabox-inner {
    position: relative;
}

.envirabox-inner {
    overflow: hidden;
    /**
     * Actions
     */
    /**
    * Dynamic Positioning
    */
}

.envirabox-inner .envirabox-actions {
    position: absolute;
    z-index: 988050;
}

.envirabox-inner .envirabox-position-overlay {
    box-sizing: border-box;
    position: absolute;
    overflow: visible;
    z-index: 988041;
    /* Beat the prev/next controls */
    padding: 0;
    /**
    * Top Left
    */
    /**
    * Top Right
    */
    /**
    * Bottom Left
    */
    /**
    * Bottom Right
    */
}

.envirabox-inner .envirabox-position-overlay.envira-gallery-top-left {
    top: 0;
    left: 0;
    text-align: left;
}

.envirabox-inner .envirabox-position-overlay.envira-gallery-top-right {
    top: 0;
    right: 0;
    text-align: right;
}

.envirabox-inner .envirabox-position-overlay.envira-gallery-bottom-left {
    bottom: 0;
    left: 0;
    text-align: left;
}

.envirabox-inner .envirabox-position-overlay.envira-gallery-bottom-right {
    bottom: 0;
    right: 0;
    text-align: right;
}

.envirabox-type-iframe .envirabox-inner {
    -webkit-overflow-scrolling: touch;
    height: 100%;
}

.envirabox-type-iframe .envirabox-inner .envirabox-iframe {
    width: 100%;
    height: 100%;
}

.envirabox-error {
    color: #444;
    font: 13px/20px "Helvetica Neue", Helvetica, Arial, sans-serif;
    margin: 0;
    padding: 15px;
    white-space: nowrap;
}

.envirabox-image, .envirabox-iframe {
    display: block;
    width: 100%;
    height: 100%;
}

.envirabox-image {
    max-width: 100%;
    max-height: 100%;
}

#envirabox-loading, .envirabox-close, .envirabox-prev span, .envirabox-next span {
    background-image: url("images/envirabox_sprite.png");
}

#envirabox-loading {
    position: absolute;
    top: 50%;
    left: 50%;
    margin-top: -22px;
    margin-left: -22px;
    background-position: 0 -108px;
    opacity: 0.8;
    cursor: pointer;
    z-index: 988060;
}

#envirabox-loading div {
    width: 44px;
    height: 44px;
    background: url("images/envirabox_loading.gif") center center no-repeat;
}

.envirabox-close {
    position: absolute;
    top: -18px;
    right: -18px;
    width: 36px;
    height: 36px;
    cursor: pointer;
    z-index: 988040;
}

.envirabox-nav {
    position: absolute;
    top: 0;
    width: 40%;
    height: 100%;
    cursor: pointer;
    text-decoration: none;
    background: transparent url("images/blank.gif");
    /* helps IE */
    -webkit-tap-highlight-color: transparent;
    z-index: 988040;
}

.envirabox-nav:focus {
    outline: none;
}

.envirabox-prev {
    left: 0;
}

.envirabox-next {
    right: 0;
}

.envirabox-prev.envirabox-arrows-outside {
    left: -100px;
}

.envirabox-next.envirabox-arrows-outside {
    right: -100px;
}

.envirabox-nav span {
    position: absolute;
    top: 50%;
    width: 36px;
    height: 34px;
    margin-top: -18px;
    cursor: pointer;
    z-index: 988040;
    visibility: hidden;
}

body.envira-touch .envirabox-nav span {
    visibility: visible;
}

.envirabox-prev span {
    left: 10px;
    background-position: 0 -36px;
}

.envirabox-next span {
    right: 10px;
    background-position: 0 -72px;
}

.envirabox-nav:hover span {
    visibility: visible;
}

.envirabox-tmp {
    position: absolute;
    top: -99999px;
    left: -99999px;
    max-width: 99999px;
    max-height: 99999px;
    overflow: visible !important;
}

a.envirabox-close,
a.envirabox-nav,
a.fancy-close:hover,
a.envirabox-nav:hover {
    border: 0;
}

/* Overlay helper */
.envirabox-lock {
    overflow: visible !important;
    width: auto;
}

.envirabox-lock body {
    overflow: hidden !important;
}

.envirabox-lock-test {
    overflow-y: hidden !important;
}

.envirabox-overlay {
    position: absolute;
    top: 0;
    left: 0;
    overflow: hidden;
    display: none;
    z-index: 988010;
    /*background: url("images/envirabox_overlay.png");*/
    background-color: rgba(0, 0, 0, 0.7);
}

.envirabox-overlay-fixed {
    position: fixed;
    bottom: 0;
    right: 0;
}

/* Title helper */
.envirabox-title {
    visibility: hidden;
    font-size: 13px;
    line-height: 20px;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    position: relative;
    text-shadow: none;
    z-index: 988090;
}

.envirabox-opened .envirabox-title {
    visibility: visible;
}

.envirabox-title-float-wrap {
    position: absolute;
    bottom: auto;
    right: 50%;
    margin-top: 20px;
    z-index: 988050;
    text-align: center;
}

.envirabox-title-float-wrap .child {
    display: inline-block;
    margin-right: -100%;
    padding: 2px 20px;
    background: transparent;
    /* Fallback for web browsers that doesn't support RGBa */
    background: rgba(0, 0, 0, 0.8);
    -webkit-border-radius: 15px;
    -moz-border-radius: 15px;
    border-radius: 15px;
    text-shadow: 0 1px 2px #222;
    color: #FFF;
    line-height: 24px;
    white-space: normal;
}

.envirabox-title-float-wrap.envirabox-title-text-wrap .child {
    white-space: normal;
}

.envirabox-title-outside-wrap {
    position: relative;
    margin-top: 10px;
    color: #fff;
}

.envirabox-title-inside-wrap {
    padding-top: 10px;
}

.envirabox-title-over-wrap {
    position: absolute;
    bottom: 0;
    left: 0;
    color: #fff;
    padding: 10px;
    background: #000;
    background: rgba(0, 0, 0, 0.8);
}

#envirabox-buttons {
    position: fixed;
    left: 0;
    width: 100%;
    z-index: 988050;
}

#envirabox-buttons.top {
    top: 10px;
}

#envirabox-buttons.bottom {
    bottom: 10px;
}

/* Allows for thumbnails to be displayed */
#envirabox-buttons.bottom.has-padding {
    bottom: 80px;
}

#envirabox-buttons.top.has-padding {
    top: 80px;
}

#envirabox-buttons ul {
    display: block;
    width: auto;
    height: 30px;
    margin: 0 auto;
    padding: 0;
    list-style: none;
    border: 1px solid #111;
    border-radius: 3px;
    -webkit-box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.05);
    -moz-box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.05);
    box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.05);
    background: #323232;
    background: -moz-linear-gradient(top, #444444 0%, #343434 50%, #292929 50%, #333333 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #444444), color-stop(50%, #343434), color-stop(50%, #292929), color-stop(100%, #333333));
    background: -webkit-linear-gradient(top, #444444 0%, #343434 50%, #292929 50%, #333333 100%);
    background: -o-linear-gradient(top, #444444 0%, #343434 50%, #292929 50%, #333333 100%);
    background: -ms-linear-gradient(top, #444444 0%, #343434 50%, #292929 50%, #333333 100%);
    background: linear-gradient(top, #444444 0%, #343434 50%, #292929 50%, #333333 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#444444', endColorstr='#222222', GradientType=0);
}

#envirabox-buttons ul li {
    float: left;
    margin: 0;
    padding: 0;
}

#envirabox-buttons ul li#envirabox-buttons-title span {
    display: block;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 13px;
    line-height: 30px;
    padding: 0 10px;
    color: #fff;
}

#envirabox-buttons a {
    display: block;
    width: 30px;
    height: 30px;
    text-indent: -9999px;
    background-color: transparent;
    background-image: url("images/envirabox_buttons.png");
    background-repeat: no-repeat;
    outline: none;
    opacity: 0.8;
}

#envirabox-buttons a:hover {
    opacity: 1;
}

#envirabox-buttons a.btnPrev {
    background-position: 5px 0;
}

#envirabox-buttons a.btnNext {
    background-position: -33px 0;
    border-right: 1px solid #3e3e3e;
}

#envirabox-buttons a.btnPlay {
    background-position: 0 -30px;
}

#envirabox-buttons a.btnPlayOn {
    background-position: -30px -30px;
}

#envirabox-buttons a.btnToggle,
#envirabox-buttons a.btnFullscreen {
    background-position: 3px -60px;
    border-left: 1px solid #111;
    border-right: 1px solid #3e3e3e;
    width: 35px;
}

#envirabox-buttons a.btnToggleOn,
#envirabox-buttons a.btnFullscreenOn {
    background-position: -27px -60px;
}

#envirabox-buttons a.btnClose {
    border-left: 1px solid #111;
    width: 35px;
    background-position: -56px 0px;
}

#envirabox-buttons a.btnDisabled {
    opacity: 0.4;
    cursor: default;
}

/**
 * Lightbox: Thumbnails Helper
 */
#envirabox-thumbs {
    position: fixed;
    left: 0;
    width: 100%;
    overflow: hidden;
    z-index: 988050;
    box-sizing: border-box;
}

#envirabox-thumbs.top {
    top: 2px;
}

#envirabox-thumbs.top.has-other-content {
    top: 50px;
}

#envirabox-thumbs.bottom {
    bottom: 2px;
}

#envirabox-thumbs.bottom.has-other-content {
    bottom: 50px;
}

#envirabox-thumbs.inline {
    position: absolute;
}

#envirabox-thumbs * {
    box-sizing: border-box;
}

#envirabox-thumbs ul {
    position: relative;
    list-style: none;
    margin: 0;
    padding: 0;
}

#envirabox-thumbs ul li {
    border: 3px solid #fff;
    float: left;
    margin: 5px;
    opacity: 1;
}

#envirabox-thumbs ul li.active {
    opacity: 0.75;
    border: 3px solid #888;
}

#envirabox-thumbs ul li:hover {
    opacity: 0.75;
}

#envirabox-thumbs ul li a {
    display: block;
    position: relative;
    overflow: hidden;
    border: 1px solid #222;
    background: #111;
    outline: none;
}

#envirabox-thumbs ul li img {
    display: block;
    position: relative;
    border: 0;
    padding: 0;
    max-width: none;
    width: 100%;
    height: auto;
}

/* Retina stuff */
@media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
    #envirabox-loading, .envirabox-close, .envirabox-prev span, .envirabox-next span {
        background-image: url("images/envirabox_sprite%402x.png");
        background-size: 44px 152px;
    }

    #envirabox-loading div {
        background-image: url("images/envirabox_loading%402x.gif");
        background-size: 24px 24px;
    }
}

@media only screen and (max-width: 600px) {
    .envirabox-prev.envirabox-arrows-outside {
        left: -75px;
        width: 12%;
    }

    .envirabox-next.envirabox-arrows-outside {
        right: -75px;
        width: 12%;
    }
}

.album_images_count {
    float: right;
    position: absolute;
    top: 3px;
    right: 3px;
}

#hover {
    color: rgba(188, 175, 204, 0.9);
}

h2#testimonials {
    color: #fffae3;
}

div#all {
    width: 100%;
    height: 100%;
}

.album_back_button .album_socials {
    float: right;
    top: -8px
}

.album_back_button {
    margin-bottom: 15px;
}

.album_back_button .rwd-share-buttons {
    margin: 0px;
    padding: 6px 1px 0px 5px;
    background: rgba(0, 0, 0, 0.7);
    border-radius: 3px;
}

#back_to_albums, #back_to_galleries {
    background: #616161;
    padding: 10px;
    color: #fff;
    border-radius: 3px;
}

#back_to_albums:hover, #back_to_galleries:hover {
    background-color: #000;
}

<?= "</style>" ?>

