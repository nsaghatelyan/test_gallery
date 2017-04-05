<?= "<style>" ?>

/* ====================== album onhover styles ==========================*/

.album_images_count {
    padding: 7px 15px 15px 15px !important;
    font-size: 21px !important;
    background-repeat: no-repeat !important;
    background-size: contain !important;
    z-index: 2;
<?php switch(Photo_Gallery_WP()->settings->album_count_style)
{
case 0:
   $count = 0;
   $color = "#565656";
   break;
case 1:
   $count = 1;
   $color = "#565656";
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
   break;
default:
   $count = 3;
   $color = "#ffffff";
   break;
}
?> background-image: url('<?= PHOTO_GALLERY_WP_IMAGES_URL."/albums/count/".$count.".png" ?>' !important);
    color: <?= $color; ?>
}

/* ====================== album onhover styles ==========================*/

.view {
    margin: 10px;
    float: left;
    overflow: hidden;
    position: relative;
    text-align: center;
    box-shadow: 1px 1px 2px #e6e6e6;
    cursor: default;
}

.view .mask,
.view .content {
    width: 300px;
    height: 200px;
    position: absolute;
    overflow: hidden;
    top: 0;
    left: 0
}

.view img {
    display: block;
    position: relative
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
    margin: 20px 0 0 0
}

.view p {
    font-family: Merriweather, serif;
    font-style: italic;
    font-size: 14px;
    position: relative;
    color: #fff;
    padding: 0px 20px 0px;
    text-align: center
}

.view a.info {
    display: inline-block;
    text-decoration: none;
    padding: 7px 14px;
    background: #000;
    color: #fff;
    font-family: Raleway, serif;
    text-transform: uppercase;
    box-shadow: 0 0 1px #000
}

.view a.info:hover {
    box-shadow: 0 0 5px #000
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

.view img {
    /*1*/
    transition: all 0.2s linear;
    width: 300px;
    height: 200px;
}

.view .info {
    margin-top: 10px;
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
    transform: scale(1.1);
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
    margin: 20px 40px 0px 40px;
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

/* ====================== album category styles ==========================*/

.album_categories {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    padding-top: 5px;
}

.album_categories li {
    float: left;
    margin: 0 5px 5px 5px;
    display: block;
    text-align: center;
    padding: 7px 16px;
    text-decoration: none;
<?php if(Photo_Gallery_WP()->settings->album_category_style == 0){ ?> background-color: #43454f;
    color: white;
    border-radius: 3px;
<?php }elseif(Photo_Gallery_WP()->settings->album_category_style == 1){ ?> background-color: #e9515f;
    border-radius: 7px;
    color: #fff;
<?php }elseif(Photo_Gallery_WP()->settings->album_category_style == 2){ ?> background-color: #fff;
    border: 2px solid #43454f;
    border-radius: 3px;
    color: #43454f;
<?php }elseif(Photo_Gallery_WP()->settings->album_category_style == 3){ ?> background-image: url("<?= PHOTO_GALLERY_WP_IMAGES_URL."/albums/category/bg_3.png"; ?>");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: 50%;
    color: #fff;
    border-radius: 4px;
    border: 2px solid #7b2436;
    box-shadow: -1px -2px 4px rgba(4, 4, 4, 0.42);
<?php }elseif(Photo_Gallery_WP()->settings->album_category_style == 4){ ?> background-image: url("<?= PHOTO_GALLERY_WP_IMAGES_URL."/albums/category/bg_4.png"; ?>");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: 50%;
    color: #fff;
    border-radius: 4px;
    border: 2px solid #78985d;
    border-bottom-color: #758865;
    box-shadow: 0px 1px 4px rgba(4, 4, 4, 0.42);
<?php }elseif(Photo_Gallery_WP()->settings->album_category_style == 5){ ?> background-color: #ed1b52;
    border-radius: 3px;
    color: #ffffff;
<?php }elseif(Photo_Gallery_WP()->settings->album_category_style == 6){ ?> background-color: #42cb6f;
    color: #fff;
    border-bottom: 4px solid #3ab75c;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
<?php } ?>
}

.album_categories li.active, .album_categories li:hover {
    cursor: pointer;

<?php if(Photo_Gallery_WP()->settings->album_category_style == 0){ ?> background-color: #2e303c;
<?php }elseif(Photo_Gallery_WP()->settings->album_category_style == 1){ ?> background-color: #b93642;
<?php }elseif(Photo_Gallery_WP()->settings->album_category_style == 2){ ?> background-color: #43454f;
    color: #ffffff;
<?php }elseif(Photo_Gallery_WP()->settings->album_category_style == 3){ ?> color: #fff683;
<?php }elseif(Photo_Gallery_WP()->settings->album_category_style == 4){ ?> color: #2f4a18;
<?php }elseif(Photo_Gallery_WP()->settings->album_category_style == 5){ ?> background-color: #ab1b41;
<?php }elseif(Photo_Gallery_WP()->settings->album_category_style == 6){ ?> background-color: #3ab75c;
<?php } ?>
}

<?= "</style>" ?>