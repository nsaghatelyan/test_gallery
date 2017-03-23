<?php $galleryID.$pID = esc_html($galleryID.$pID); ?>
<style>
    #ph_mosaic_photos {
        line-height: 0;
        -webkit-column-count: <?php echo absint( Photo_Gallery_WP()->settings->mosaic_image_column_count ); ?>;
        -webkit-column-gap:   0px;
        -moz-column-count:    <?php echo absint( Photo_Gallery_WP()->settings->mosaic_image_column_count ); ?>;
        -moz-column-gap:      0px;
        column-count:         <?php echo absint( Photo_Gallery_WP()->settings->mosaic_image_column_count ); ?>;
        column-gap:           0px;
    }

    #ph_mosaic_photos img {
        width: 100% !important;
        height: auto !important;
        border: <?php echo absint( Photo_Gallery_WP()->settings->mosaic_image_border_width_in_px ); ?>px solid #<?php echo sanitize_hex_color_no_hash(Photo_Gallery_WP()->settings->mosaic_image_border_color)?>;
        border-radius: <?php echo absint( Photo_Gallery_WP()->settings->mosaic_image_border_radius ); ?>px;
    }

    <?php if(absint( Photo_Gallery_WP()->settings->mosaic_image_column_count ) > 8){ ?>
    @media (max-width: 2000px) {
        #ph_mosaic_photos {
            -moz-column-count:    8;
            -webkit-column-count: 8;
            column-count:         8;
        }
    }
    <?php } ?>

    <?php if(absint( Photo_Gallery_WP()->settings->mosaic_image_column_count ) > 7){ ?>
    @media (max-width: 1800px) {
        #ph_mosaic_photos {
            -moz-column-count:    7;
            -webkit-column-count: 7;
            column-count:         7;
        }
    }
    <?php } ?>

    <?php if(absint( Photo_Gallery_WP()->settings->mosaic_image_column_count ) > 6){ ?>
    @media (max-width: 1600px) {
        #ph_mosaic_photos {
            -moz-column-count:    6;
            -webkit-column-count: 6;
            column-count:         6;
        }
    }
    <?php } ?>

    <?php if(absint( Photo_Gallery_WP()->settings->mosaic_image_column_count ) > 5){ ?>
    @media (max-width: 1400px) {
        #ph_mosaic_photos {
            -moz-column-count:    5;
            -webkit-column-count: 5;
            column-count:         5;
        }
    }
    <?php } ?>

    <?php if(absint( Photo_Gallery_WP()->settings->mosaic_image_column_count ) > 4){ ?>
    @media (max-width: 1200px) {
        #ph_mosaic_photos {
            -moz-column-count:    4;
            -webkit-column-count: 4;
            column-count:         4;
        }
    }
    <?php } ?>

    <?php if(absint( Photo_Gallery_WP()->settings->mosaic_image_column_count ) > 3){ ?>
    @media (max-width: 1000px) {
        #ph_mosaic_photos {
            -moz-column-count:    3;
            -webkit-column-count: 3;
            column-count:         3;
        }
    }
    <?php } ?>

    <?php if(absint( Photo_Gallery_WP()->settings->mosaic_image_column_count ) > 2){ ?>
    @media (max-width: 800px) {
        #ph_mosaic_photos {
            -moz-column-count:    2;
            -webkit-column-count: 2;
            column-count:         2;
        }
    }
    <?php } ?>

    @media (max-width: 400px) {
        #ph_mosaic_photos {
            -moz-column-count:    1;
            -webkit-column-count: 1;
            column-count:         1;
        }
    }

    .title-mosaic-image {
        position: absolute;
        width: 100%;
        height: 30px;
        overflow: hidden;
        opacity: <?php echo floatval(Photo_Gallery_WP()->settings->mosaic_title_background_opacity/100); ?>;
        bottom: -36px;
        background-color: #<?php echo sanitize_hex_color_no_hash(Photo_Gallery_WP()->settings->mosaic_title_background_color); ?>;
        transition: all 0.3s linear;
    }

    .ph_mosaic_div {
        position: relative;
        overflow: hidden;
        margin-bottom: <?php echo absint( Photo_Gallery_WP()->settings->mosaic_image_margin_bottom_in_px ); ?>px;
        margin-right: <?php echo absint( Photo_Gallery_WP()->settings->mosaic_image_margin_right_in_px ); ?>px;
    }

    .title-mosaic-image a {
        font-size: <?php echo absint( Photo_Gallery_WP()->settings->mosaic_title_font_size_in_px ); ?>px;
        color: #<?php echo sanitize_hex_color_no_hash(Photo_Gallery_WP()->settings->mosaic_title_font_color); ?>;
        text-decoration: none;
        top: 13px;
        position: absolute;
        padding-left: 5px;
    }

    .ph_mosaic_div:hover .title-mosaic-image {
        bottom: 0;
    }

    .title-mosaic-image a:hover {
        color: #<?php echo sanitize_hex_color_no_hash(Photo_Gallery_WP()->settings->mosaic_title_font_hover_color); ?>;
        text-decoration: none;
    }



   //
    .grid {
        max-width: 1200px;
        margin: 0 auto;
    }

    .ph-gallery-wp-loading-icon {
        width: 100%;
        height: 100%;
        position: absolute;
        z-index: 1;
        background: url(<?php echo PHOTO_GALLERY_WP_IMAGES_URL.'/loading/loading-'.$loading_type.'.svg'; ?>) center top ;
        background-repeat: no-repeat;
        background-size: 60px auto;
    }

    /* clearfix */
    .grid:after {
        content: '';
        display: block;
        clear: both;
    }

    .paginate8 {
        font-size: <?php echo floatval(Photo_Gallery_WP()->settings->masonry_pagination_font_size_in_px); ?>px;
        color: #<?php echo sanitize_hex_color_no_hash(Photo_Gallery_WP()->settings->masonry_pagination_font_color); ?>;
    }

    .pagination_align {
        <?php
switch (Photo_Gallery_WP()->settings->masonry_pagination_position) {
    case 'left':
       ?>text-align: left;<?php
        break;
    case 'right':
       ?>text-align: right;<?php
        break;
    case 'center':
        ?>text-align: center;<?php
        break;
}
 ?>

    }

    .paginate8 i {
        font-size: <?php echo floatval(Photo_Gallery_WP()->settings->masonry_pagination_icons_size_in_px); ?>px;
        color: #<?php echo sanitize_hex_color_no_hash(Photo_Gallery_WP()->settings->masonry_pagination_icons_color); ?>;
    }

    .load_more8 {
        margin: 10px 0;
        position:relative;
        text-align:<?php if(Photo_Gallery_WP()->settings->masonry_load_more_position == 'left') {echo 'left';}
			elseif (Photo_Gallery_WP()->settings->masonry_load_more_position == 'center') { echo 'center'; }
			elseif(Photo_Gallery_WP()->settings->masonry_load_more_position == 'right') { echo 'right'; }?>;
        width:100%;
    }

    .load_more_button8 {
        border-radius: 10px;
        display:inline-block;
        padding:5px 15px;
        font-size:<?php echo floatval(Photo_Gallery_WP()->settings->masonry_load_more_font_size_in_px); ?>px !important;;
        color:<?php echo '#'.sanitize_hex_color_no_hash(Photo_Gallery_WP()->settings->masonry_load_more_font_color); ?> !important;;
        background:<?php echo '#'.sanitize_hex_color_no_hash(Photo_Gallery_WP()->settings->masonry_load_more_button_color); ?> !important;
        cursor:pointer;
    }

    .load_more_button8:hover{
        color:<?php echo '#'.sanitize_hex_color_no_hash(Photo_Gallery_WP()->settings->masonry_load_more_font_font_hover_color); ?> !important;
        background:<?php echo '#'.sanitize_hex_color_no_hash(Photo_Gallery_WP()->settings->masonry_load_more_background_hover_color); ?> !important;
    }

    .loading8 {
        display:none;
    }

    .clear{
        clear:both;
    }

    .ph-g-wp_gallery_like_cont_<?php echo $galleryID.$pID; ?>{
        opacity: <?php echo floatval(Photo_Gallery_WP()->settings->masonry_ratings_background_color_opacity/100); ?> ;
    }
    //
</style>