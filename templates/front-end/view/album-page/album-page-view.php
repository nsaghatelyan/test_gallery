<?php

debug::trace("page view");


switch (Photo_Gallery_WP()->settings->album_onhover_effects) {
    case 0:
        $hover_class = "view-first";
        break;
    case 1:
        $hover_class = "view-second";
        break;
    case 2:
        $hover_class = "view-third";
        break;
    case 3:
        $hover_class = "view-forth";
        break;
    case 4:
        $hover_class = "view-fifth";
        break;
    default:
        $hover_class = "view-first";
        break;
}

?>


<div id="main">
    <div class="container">
        <div id="gallery_images"></div>
        <div id="album_list">
            <div class="row album_categories">
                <ul class="simplefilter album_categories">
                    <li class="active" data-filter="all"><?= __("All", "gallery-images") ?></li>
                    <?php foreach ($album_categories as $key => $cat) { ?>
                        <li data-filter="<?= $cat->id ?>"><?= $cat->name ?></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="row filtr-container">
                <?php
                /// gallery list with hover effects
                foreach ($albums as $key => $album) { ?>
                    <div class="view <?= $hover_class; ?> filtr-item" data-category="<?= $album->category ?>">
                        <?php if (Photo_Gallery_WP()->settings->album_show_image_count !== "false") { ?>
                            <span class="album_images_count"><?= $album->image_count ?></span>
                        <?php } ?>
                        <img src="<?= $album->image_url ?>"/>
                        <div class="mask">
                            <?php if (Photo_Gallery_WP()->settings->album_show_title !== 'false') { ?>
                                <h2><?= $album->name ?></h2>
                            <?php }
                            if (Photo_Gallery_WP()->settings->album_show_description !== 'false') { ?>
                                <p><?= $album->description ?></p>
                            <?php } ?>
                            <a href="#"
                               class="envira-album-gallery-<?= $album->id ?> envira-gallery-link info get_galleries"
                               data-id="<?= $album->id ?>"><?= __("More", "gallery-images") ?></a>
                            <?php if (Photo_Gallery_WP()->settings->album_show_sharing_buttons !== "false") { ?>
                                <a href="#" class="album_social"><?= __("Social", "gallery-images") ?></a>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<style>
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
     echo "background-image: url('".PHOTO_GALLERY_WP_IMAGES_URL."/albums/count/".$count.".png') !important;";
    echo "color:".$color;
?>
    }
</style>

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('.simplefilter li').click(function () {
            $('.simplefilter li').removeClass('active');
            $(this).addClass('active');
        });
        //Multifilter controls
        $('.multifilter li').click(function () {
            $(this).toggleClass('active');
        });
        //Shuffle control
        $('.shuffle-btn').click(function () {
            $('.sort-btn').removeClass('active');
        });
        //Sort controls
        $('.sort-btn').click(function () {
            $('.sort-btn').removeClass('active');
            $(this).addClass('active');
        });

        $('.filtr-container').filterizr();
    });
</script>
