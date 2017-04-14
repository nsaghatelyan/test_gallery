<?= "<style>" ?>
<?php
    $album_view = Photo_Gallery_WP()->settings->album_style;
    if($album_view == 1){
        $grid = Photo_Gallery_WP()->settings->album_popup_grid_style;
        $count_style = Photo_Gallery_WP()->settings->album_popup_count_style;
        $cat_style = Photo_Gallery_WP()->settings->album_popup_category_style;
        $thumb_width = Photo_Gallery_WP()->settings->album_popup_thumbnail_width_size;
        $thumb_height = Photo_Gallery_WP()->settings->album_popup_thumbnail_height_size;
        $thumb_container_bg_color = Photo_Gallery_WP()->settings->album_popup_thumbnail_background;
        $thumb_border_width = Photo_Gallery_WP()->settings->album_popup_thumbnail_image_border_width;
        $thumb_border_color = Photo_Gallery_WP()->settings->album_popup_thumbnail_image_border_color;
        $thumb_border_radius = Photo_Gallery_WP()->settings->album_popup_thumbnail_image_border_radius;

    }
    elseif($album_view == 2){
        $grid = Photo_Gallery_WP()->settings->album_grid_style;
        $count_style = Photo_Gallery_WP()->settings->album_count_style;
        $cat_style = Photo_Gallery_WP()->settings->album_category_style;
        $thumb_width = Photo_Gallery_WP()->settings->album_thumbnail_width_size;
        $thumb_height = Photo_Gallery_WP()->settings->album_thumbnail_height_size;
        $thumb_container_bg_color = Photo_Gallery_WP()->settings->album_thumbnail_background;
        $thumb_border_width = Photo_Gallery_WP()->settings->album_thumbnail_image_border_width;
        $thumb_border_color = Photo_Gallery_WP()->settings->album_thumbnail_image_border_color;
        $thumb_border_radius = Photo_Gallery_WP()->settings->album_thumbnail_image_border_radius;
    }
?>

/*===== general options =========*/
a {
    box-shadow: none !important;
}

/* ====================== album onhover styles ==========================*/

.album_images_count {

    font-size: 21px !important;
    font-family: sans-serif !important;
    background-repeat: no-repeat !important;
    background-size: cover !important;
    z-index: 2;
    width: 50px;
    height: 50px;
    padding-top: 10px !important;
<?php
    switch($count_style)
    {
    case 0:
       $count = 0;
       $color = "#565656";
       break;
    case 1:
       $count = 1;
       $color = "#565656";
       echo "width: 65px;";
       echo "background-size: contain !important;";
       break;
    case 2:
       $count = 2;
       $color = "#ffffff";
       break;
    case 3:
       $count = 3;
       $color = "#ffffff";
       break;
    case 4:
       $count = 4;
       $color = "#ffffff";
       echo "background-size: contain !important; width: 87px; height: 30px; text-align: right;padding:0px !important; padding-right: 12px !important;";
       break;
    default:
       $count = 3;
       $color = "#ffffff";
       break;
    }

?> background-image: url('<?= PHOTO_GALLERY_WP_IMAGES_URL."/albums/count/".$count.".png" ?>') !important;
    color: <?= $color; ?>;
}

/* ====================== album onhover styles ==========================*/

#album_list .view {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    -o-box-sizing: border-box;
    display: none;

}

<?php

switch($grid) {
    case '0':
        $view_width = "width:100%;";
        $img_height = "height:auto;";
        $visibility = "display:block;";
        break;
    case '1':
        $view_width = "width:47%;";
        $img_height = "height:185px;";
        //$img_height = "height:auto;";
        $visibility = "display:block;";
        break;
    case '2':
        $view_width = "width:30%;";
        $img_height = "height:135px;";
        $visibility = "display:none;";
        break;
    case '3':
        $view_width = "width:23%;";
        $img_height = "height:115px;";
        $visibility = "display:none;";
        break;
    case '4':
        $view_width = "width:".$thumb_width."px;";
        $img_height = "height:".$thumb_height."px;";
        echo "
        #album_list, .gallery_images, .album_image_place{background-color:#".$thumb_container_bg_color."; 
        text-align:center;
        }";
        echo ".view {display: inline-block; max-width:98%}
        .view{
            border: ".$thumb_border_width."px solid !important;
            border-color: #".$thumb_border_color." !important;
            border-radius: ".$thumb_border_radius."px !important;
        }
        ";

        break;
    case '5':
        $view_width = "width:100%;";
        $img_height = "height:auto;";
        echo ".mosaicflow__column {float:left;}";
        break;
     case '6':
        $view_width = "width:100%;";
        $img_height = "height:auto;";
        echo ".mosaicflow__column {float:left;}";
        break;
    default:
        $view_width = "width:49%;";
        $img_height = "height:165px;";
        break;
}

?>

.view {
    color: #fff;
    margin: 0px;
    overflow: hidden;
    position: relative;
    text-align: center;
    /*box-shadow: 1px 1px 2px #e6e6e6;*/
<?php if($grid != 4) {?> float: left;
<?php } ?><?php if($grid != 5){ ?> border: 1px solid #ececec;
    border-radius: 5px;
    margin: 1%;
<?php } ?> cursor: default;
<?php if($grid == 6){ ?> padding: 3px;
<?php } ?><?= $view_width ?><?= $img_height ?>
}

.view .mask,
.view .content {
    width: 100%;
    height: 100%;
    position: absolute;
    overflow: hidden;
    top: 0;
    left: 0;
}

.view img {
    display: block;
    position: relative
    transition: all 0.2s linear;
    max-width: 100%;
    width: <?php echo ($grid == 4 || $grid == 5) ? "100%" : "auto" ?>;
    margin: 0 auto;
<?php
    echo ($grid == 4) ? "height: 100%" : "height: 100%";
if($grid == 6){
    echo "padding:4px;";
} ?>
}

.view h2 {
    text-transform: uppercase;
    color: #fff;
    text-align: center;
    position: relative;
    font-size: 17px;
    font-family: Raleway, serif;
    padding: 10px;
    /*background: rgba(0, 0, 0, 0.8);*/
    margin: 0px;
<?= $visibility ?>
}

.view .text-category, .view .album_socials {
<?= $visibility ?>
}

.view p {
    font-family: Merriweather, serif;
    font-style: italic;
    font-size: 14px;
    position: relative;
    color: #fff;
    padding: 0px 20px 0px;
    text-align: center;
<?= $visibility ?>
}

.view a.info {
    display: inline-block;
    text-decoration: none;
    font-size: 13px;
    padding: 2px 14px;
    margin-bottom: 3px;
    background: #000;
    color: #fff;
    font-family: Raleway, serif;
    text-transform: uppercase;
    box-shadow: 0 0 1px #000
}

.view a.info:hover {
    box-shadow: 0 0 5px #000
}

.view .mask-bg {
    height: 100%;
}

.view .album_social {
    color: #fff;
    position: absolute;
    bottom: 3px;
    left: 3px;
    border: 1px solid #ffffff;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    padding: 3px 5px;

}

.view .album_social:active, .view .album_social:focus, .view .album_social:hover {
    color: #ffffff;
    outline: none;
}

/*1*/

.view .info {
    margin-top: 5px;
}

.view-first .mask {
    opacity: 0;
    background-color: rgba(0, 0, 0, 0.7);
    transition: all 0.4s ease-in-out;
}

.view-first h2 {
    transform: translateY(-100px);
    opacity: 0;
    font-family: Raleway, serif;
    transition: all 0.2s ease-in-out;
}

.view-first p {
    transform: translateY(100px);
    opacity: 0;
    transition: all 0.2s linear;
}

.view-first a.info {
    opacity: 0;
    transition: all 0.2s ease-in-out;
}

/* */

.view-first:hover img {
    /*transform: scale(1.1);*/
}

.view-first:hover .mask {
    opacity: 1;
}

.view-first:hover h2,
.view-first:hover p,
.view-first:hover a.info {
    opacity: 1;
    transform: translateY(0px);
}

.view-first:hover p {
    transition-delay: 0.1s;
}

.view-first:hover a.info {
    transition-delay: 0.2s;
}

.view-first .text-category, .view-first .mask-text h2 {
    color: #ffffff;
}

/*2*/
.view-second img {
    -webkit-filter: grayscale(0) blur(0);
    filter: grayscale(0) blur(0);
    -webkit-transition: .3s ease-in-out;
    transition: .3s ease-in-out;
}

.view-second .mask {
    background-color: rgba(226, 200, 127, 0.2);
    transition: all 0.5s linear;
    opacity: 0;
}

.view-second h2 {
    border-bottom: 1px solid rgba(0, 0, 0, 0.3);
    background: transparent;
    margin: 20px 40px 0px 40px;
    transform: scale(0);
    color: #333;
    transition: all 0.5s linear;
    opacity: 0;
}

.view-second p {
    color: #333;
    opacity: 0;
    transform: scale(0);
    transition: all 0.5s linear;
}

.view-second a.info {
    opacity: 0;
    transform: scale(0);
    transition: all 0.5s linear;
}

.view-second:hover img {
    -webkit-filter: grayscale(100%) blur(3px);
    filter: grayscale(100%) blur(3px);
}

.view-second:hover .mask {
    opacity: 1;
}

.view-second:hover h2,
.view-second:hover p,
.view-second:hover a.info {
    transform: scale(1);
    opacity: 1;
}

.view-second img {
    -webkit-filter: grayscale(0) blur(0);
    filter: grayscale(0) blur(0);
    -webkit-transition: .3s ease-in-out;
    transition: .3s ease-in-out;
}

.view-second:hover img {
    -webkit-filter: grayscale(100%) blur(3px);
    filter: grayscale(100%) blur(3px);
}

.view-second .text-category, .view-second .mask-text h2 {
    color: #000;
}

/*3*/

.view-third img {
    transform: scaleY(1);
    transition: all .7s ease-in-out;
}

.view-third .mask {
    background-color: rgba(66, 60, 46, 0.53);
    transition: all 0.5s linear;
    opacity: 0;
}

.view-third h2 {
    border-bottom: 1px solid rgba(0, 0, 0, 0.3);
    background: transparent;
    margin: 5px 40px 0px 40px;
    transform: scale(0);
    color: #333;
    transition: all 0.5s linear;
    opacity: 0;
}

.view-third p {
    color: #333;
    opacity: 0;
    transform: scale(0);
    transition: all 0.5s linear;
}

.view-third a.info {
    opacity: 0;
    transform: scale(0);
    transition: all 0.5s linear;
}

.view-third .text-category {
    color: #333;
}

.view-third:hover img {
    -webkit-transform: scale(10);
    transform: scale(10);
    opacity: 0;
}

.view-third:hover .mask {
    opacity: 1;
}

.view-third:hover h2,
.view-third:hover p,
.view-third:hover a.info {
    transform: scale(1);
    opacity: 1;
}

/* ==== view 4 ===*/

.view-forth-wrapper {
    overflow: hidden;
    position: relative !important;
    height: 100%;
    /* cursor: pointer;*/
}

.view-forth img {
    max-width: 100%;
    position: relative;
    top: 0;
    -webkit-transition: all 600ms cubic-bezier(0.645, 0.045, 0.355, 1);
    transition: all 600ms cubic-bezier(0.645, 0.045, 0.355, 1);
}

.view-forth .mask {
    position: absolute;
    width: 100%;
    height: 70px;
    bottom: -70px;
    -webkit-transition: all 300ms cubic-bezier(0.645, 0.045, 0.355, 1);
    transition: all 300ms cubic-bezier(0.645, 0.045, 0.355, 1);
    top: inherit;
}

.view-forth .mask-bg {
    background: #e95a44;
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
}

.view-forth .mask-text {
    color: #fff;
    position: relative;
    z-index: 500;
    padding: 5px 8px;
}

.view-forth .mask-text h2 {
    margin: 0px;
    font-size: 13px;
    padding: 2px;
}

.view-forth .mask-text h2:hover {
    cursor: pointer;
}

.view-forth .text-category {
    display: block;
    font-size: 9px;
    color: #fff;
}

.view-forth:hover .mask {
    bottom: 0;
}

.view-forth:hover img {
    top: -30px;
}

/*==  view 5 ==*/

.album_list .view-fifth .view-fifth-wrapper,
.album_list .view-fifth .view-fifth-wrapper img {
    display: block;
    position: relative;
}

.album_list .view-fifth .view-fifth-wrapper {
    overflow: hidden;
    height: 100%;
}

.album_list .view-fifth .view-fifth-wrapper .mask {
    display: none;
    position: absolute;
    background: #333;
    background: rgba(75, 75, 75, 0.7);
    width: 100%;
    height: 100%;
}

.view-fifth .text-category, .view-fifth .text-category *, .view-fifth .mask-text h2 {
    color: #ffffff;
}

/* ====================== album category styles ==========================*/

#filters {
    margin: 1%;
    padding: 0;
    list-style: none;
}

#filters li {
    float: left;
}

#filters li span {
    display: block;
    text-decoration: none;
    cursor: pointer;
}

.album_categories {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    padding-top: 5px;
}

.album_categories li span {
    float: left;
    margin: 0 5px 5px 5px;
    display: block;
    text-align: center;
    padding: 7px 16px;
    text-decoration: none;
<?php if($cat_style == 0){ ?> background-color: #43454f;
    color: white;
    border-radius: 3px;
<?php }elseif($cat_style == 1){ ?> background-color: #e9515f;
    border-radius: 7px;
    color: #fff;
<?php }elseif($cat_style == 2){ ?> background-color: #fff;
    border: 2px solid #43454f;
    border-radius: 3px;
    color: #43454f;
<?php }elseif($cat_style == 3){ ?> background-image: url("<?= PHOTO_GALLERY_WP_IMAGES_URL."/albums/category/bg_3.png"; ?>");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: 50%;
    color: #fff;
    border-radius: 4px;
    border: 2px solid #7b2436;
    box-shadow: -1px -2px 4px rgba(4, 4, 4, 0.42);
<?php }elseif($cat_style == 4){ ?> background-image: url("<?= PHOTO_GALLERY_WP_IMAGES_URL."/albums/category/bg_4.png"; ?>");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: 50%;
    color: #fff;
    border-radius: 4px;
    border: 2px solid #78985d;
    border-bottom-color: #758865;
    box-shadow: 0px 1px 4px rgba(4, 4, 4, 0.42);
<?php }elseif($cat_style == 5){ ?> background-color: #ed1b52;
    border-radius: 3px;
    color: #ffffff;
<?php }elseif($cat_style == 6){ ?> background-color: #42cb6f;
    color: #fff;
    border-bottom: 4px solid #3ab75c;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
<?php } ?>
}

.album_categories li span.active, .album_categories li span:hover {
    cursor: pointer;

<?php if($cat_style == 0){ ?> background-color: #2e303c;
<?php }elseif($cat_style == 1){ ?> background-color: #b93642;
<?php }elseif($cat_style == 2){ ?> background-color: #43454f;
    color: #ffffff;
<?php }elseif($cat_style == 3){ ?> color: #fff683;
<?php }elseif($cat_style == 4){ ?> color: #2f4a18;
<?php }elseif($cat_style == 5){ ?> background-color: #ab1b41;
<?php }elseif($cat_style == 6){ ?> background-color: #3ab75c;
<?php } ?>
}

/*=========  sharing buttons  ============*/

.album_socials {
    position: relative;
    top: 3px;
    width: 100px;
    height: 28px;
    margin: 0 auto;
}

.album_socials .rwd-share-buttons {
    top: 0px !important;
}

.album_socials a {
    text-decoration: underline !important;
}

.gallery_images, .album_image_place {
    margin-top: 15px;
}

#rwd-share-facebook:hover {
    background-position: 0 -31px !important;
}

#rwd-share-twitter:hover {
    background-position: -31px 32px !important;
}

#rwd-share-googleplus:hover {
    background-position: -66px -31px !important;
}

.rwd-share-buttons li, .rwd-share-buttons li a {
    width: 26px !important;
}

<?= "</style>" ?>