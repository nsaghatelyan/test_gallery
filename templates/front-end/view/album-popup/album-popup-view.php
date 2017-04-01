<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/30/2017
 * Time: 9:24 AM
 */
?>


<?php

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

foreach ($albums as $key => $val) {
    foreach ($val->galleries as $k => $gallery) {
        ?>
        <div class="view <?= $hover_class; ?>">
            <?php if (Photo_Gallery_WP()->settings->album_show_image_count !== "false") { ?>
                <span class="album_images_count"><?= count($gallery->images) ?></span>
            <?php } ?>
            <img src="<?= $gallery->image_url ?>"/>
            <div class="mask">
                <h2><?= $gallery->name ?></h2>
                <p><?= $gallery->description ?></p>
                <a href="#"
                   class="envira-album-gallery-<?= $gallery->id ?> envira-gallery-link info"><?= __("More", "gallery-images") ?></a>
                <a href="#" class="album_social"><?= __("Social", "gallery-images") ?></a>
            </div>
        </div>
        <?php
    }
}
?>

<div id="main">
    <div class="container">
        <section class="has-sidebar">
            <article>
                <div id="envira-gallery-wrap-56458"
                     class="envira-album-wrap envira-gallery-wrap envira-gallery-theme-base envira-lightbox-theme-base">
                    <div id="envira-gallery-56458"
                         class="envira-gallery-public  envira-gallery-2-columns envira-clear envira-gallery-css-animations"
                         data-envira-columns="2">
                        <?php
                        foreach ($albums as $key => $album) {
                            foreach ($album->galleries as $gallery) {
                                ?>
                                <div id="envira-gallery-item-<?= $gallery->id ?> "
                                     class="envira-gallery-item enviratope-item envira-gallery-item-<?= $gallery->id ?>"
                                     style="padding-left: 5px; padding-bottom: 10px; padding-right: 5px;">
                                    <div class="envira-gallery-item-inner">
                                        <?php if (Photo_Gallery_WP()->settings->album_show_image_count !== "false") { ?>
                                            <span class="album_images_count"><?= count($gallery->images) ?></span>
                                        <?php } ?>
                                        <div class="envira-gallery-position-overlay  envira-gallery-top-left"></div>
                                        <div class="envira-gallery-position-overlay  envira-gallery-top-right"></div>
                                        <div class="envira-gallery-position-overlay  envira-gallery-bottom-left"></div>
                                        <div class="envira-gallery-position-overlay  envira-gallery-bottom-right"></div>
                                        <a href="#"
                                           class="envira-album-gallery-<?= $gallery->id ?> envira-gallery-link"
                                           title="">
                                            <img id="envira-gallery-image-<?= $gallery->id ?>"
                                                 class="envira-gallery-image envira-gallery-image-<?= $gallery->id ?>"
                                                 src="<?= $gallery->image_url ?>"
                                                 width="<?= Photo_Gallery_WP()->settings->album_thumbnail_width_size ?>"
                                                 height="<?= Photo_Gallery_WP()->settings->album_thumbnail_height_size ?>"
                                                 data-envira-src="<?= $gallery->image_url ?>"
                                                 alt="" data-envira-caption="" alt="" title=""/>
                                        </a>

                                    </div>
                                </div>
                            <?php }
                        } ?>

                        <?php foreach ($albums as $key => $album) { ?>

                            <div class="hugeit_albums_list">
                                <a href="#" title="" class="hugeit_album_item">
                                    <img
                                            src="<?= $album->image_url ?>"
                                            width="<?= Photo_Gallery_WP()->settings->album_thumbnail_width_size ?>"
                                            height="<?= Photo_Gallery_WP()->settings->album_thumbnail_height_size ?>"
                                            data-envira-src="<?= $album->image_url ?>"
                                            alt="" data-envira-caption="" alt="" title=""/>
                                </a>
                            </div>

                            <div id="envira-gallery-item-56190"
                                 class="envira-gallery-item enviratope-item envira-gallery-item-1"
                                 style="padding-left: 5px; padding-bottom: 10px; padding-right: 5px;">
                                <div class="envira-gallery-item-inner">
                                    <span class="album_images_count"><?= $album->image_count ?></span>
                                    <div class="envira-gallery-position-overlay  envira-gallery-top-left"></div>
                                    <div class="envira-gallery-position-overlay  envira-gallery-top-right"></div>
                                    <div class="envira-gallery-position-overlay  envira-gallery-bottom-left"></div>
                                    <div class="envira-gallery-position-overlay  envira-gallery-bottom-right"></div>
                                    <a href="#"
                                       class="envira-album-gallery-56190 envira-gallery-link" title="">
                                        <img id="envira-gallery-image-56190"
                                             class="envira-gallery-image envira-gallery-image-<?= $key ?>"
                                             src="<?= $album->image_url ?>"
                                             width="<?= Photo_Gallery_WP()->settings->album_thumbnail_width_size ?>"
                                             height="<?= Photo_Gallery_WP()->settings->album_thumbnail_height_size ?>"
                                             data-envira-src="<?= $album->image_url ?>"
                                             alt="" data-envira-caption="" alt="" title=""/>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <noscript></noscript>
                <p><a id="album-with-standalone-galleries"></a></p>
            </article>
        </section>
    </div>
</div>


<!-- envira script  -->

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
    var envira_albums_galleries = [],
        envira_albums_galleries_images = {},
        envira_albums_isotopes = [],
        envira_albums_isotopes_config = [],
        envira_albums_sort = {"56458": false, "56464": false, "56462": false};

    jQuery(document).ready(function ($) {

        $(".hugeit_album_item").click(function () {
        });

        var envira_container_56458 = '';

        envira_container_56458 = $('#envira-gallery-56458').enviraImagesLoaded(function () {
            $('.envira-gallery-item img').show();
        });


        envira_albums_galleries_images['56190'] = [];

        envira_albums_galleries_images['56190'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/Icelandic_Roads_16.jpg',
            id: 115181,
            gallery_id: '56190',
            alt: '',
            caption: '',
            title: 'Icelandic_Roads_16',
            index: 0,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/Icelandic_Roads_16-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/Icelandic_Roads_16-150x100_c.jpg'
        });
        envira_albums_galleries_images['56190'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/Icelandic_Roads_4.jpg',
            id: 115182,
            gallery_id: '56190',
            alt: '',
            caption: '',
            title: 'Icelandic_Roads_4',
            index: 1,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/Icelandic_Roads_4-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/Icelandic_Roads_4-150x100_c.jpg'
        });
        envira_albums_galleries_images['56190'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/Icelandic_Roads_5.jpg',
            id: 115183,
            gallery_id: '56190',
            alt: '',
            caption: '',
            title: 'Icelandic_Roads_5',
            index: 2,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/Icelandic_Roads_5-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/Icelandic_Roads_5-150x100_c.jpg'
        });
        envira_albums_galleries_images['56190'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/Icelandic_Roads_11.jpg',
            id: 115184,
            gallery_id: '56190',
            alt: '',
            caption: '',
            title: 'Icelandic_Roads_11',
            index: 3,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/Icelandic_Roads_11-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/Icelandic_Roads_11-150x100_c.jpg'
        });
        envira_albums_galleries_images['56190'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/Icelandic_Roads_10.jpg',
            id: 115185,
            gallery_id: '56190',
            alt: '',
            caption: '',
            title: 'Icelandic_Roads_10',
            index: 4,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/Icelandic_Roads_10-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/Icelandic_Roads_10-150x100_c.jpg'
        });
        envira_albums_galleries_images['56190'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/Icelandic_Roads_1-1.jpg',
            id: 115186,
            gallery_id: '56190',
            alt: '',
            caption: '',
            title: 'Icelandic_Roads_1',
            index: 5,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/Icelandic_Roads_1-1-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/Icelandic_Roads_1-1-150x100_c.jpg'
        });
        $(document).on('click', '.envira-album-gallery-56190', function (e) {
            e.preventDefault();

            envira_albums_galleries['56190'] = $.envirabox.open(envira_albums_galleries_images['56190'], {
                lightboxTheme: 'base',
                margin: 40,
                padding: 15,
                arrows: 1,
                aspectRatio: 1,
                loop: 1,
                mouseWheel: 1,
                preload: 1,
                openEffect: 'none',
                closeEffect: 'none',
                nextEffect: 'fade',
                prevEffect: 'fade',
                tpl: {
                    wrap: '<div class="envirabox-wrap" tabIndex="-1"><div class="envirabox-skin envirabox-theme-base"><div class="envirabox-outer"><div class="envirabox-inner"><div class="envirabox-actions base "></div><div class="envirabox-position-overlay envira-gallery-top-left"></div><div class="envirabox-position-overlay envira-gallery-top-right"></div><div class="envirabox-position-overlay envira-gallery-bottom-left"></div><div class="envirabox-position-overlay envira-gallery-bottom-right"></div></div></div></div></div>',
                    image: '<img class="envirabox-image" src="{href}" alt="" data-envira-title="" data-envira-caption="" data-envira-index="" data-envira-data="" />',
                    iframe: '<iframe id="envirabox-frame{rnd}" name="envirabox-frame{rnd}" class="envirabox-iframe" frameborder="0" vspace="0" hspace="0" allowtransparency="true"\></iframe>',
                    error: '<p class="envirabox-error">The requested content cannot be loaded.<br/>Please try again later.</p>',
                    closeBtn: '<a title="Close" class="envirabox-item envirabox-close" href="javascript:;"></a>',
                    next: '<a title="Next" class="envirabox-nav envirabox-next envirabox-arrows-inside" href="javascript:;"><span></span></a>',
                    prev: '<a title="Previous" class="envirabox-nav envirabox-prev envirabox-arrows-inside" href="javascript:;"><span></span></a>'
                },
                helpers: {
                    video: {
                        autoplay: 0,
                        playpause: 1,
                        progress: 1,
                        current: 1,
                        duration: 1,
                        volume: 1,
                    },
                    title: {
                        type: 'float',
                        alwaysShow: '',
                    },
                    thumbs: {
                        width: 75,
                        height: 50,
                        mobile_thumbs: 1,
                        mobile_width: 75,
                        mobile_height: 50,
                        source: function (current) {
                            /* current is our images_id array object */
                            return current.thumbnail;
                        },
                        mobileSource: function (current) {
                            /* current is our images_id array object */
                            return current.mobile_thumbnail;
                        },
                        dynamicMargin: false,
                        dynamicMarginAmount: 0,
                        position: 'bottom',
                    },
                    buttons: {
                        tpl: '<div id="envirabox-buttons"><ul><li><a class="btnPrev" title="Previous" href="javascript:;"></a></li><li><a class="btnNext" title="Next" href="javascript:;"></a></li><li><a class="btnClose" title="Close" href="javascript:;"></a></li></ul></div>',
                        position: 'top',
                        padding: ''
                    },
                    navDivsRoot: false,
                    actionDivRoot: false,
                },
                beforeLoad: function () {
                    if (typeof envira_albums_galleries_images['56190'][this.index].caption !== 'undefined') {
                        this.title = envira_albums_galleries_images['56190'][this.index].caption;
                    } else {
                        this.title = envira_albums_galleries_images['56190'][this.index].title;
                    }
                },
                afterLoad: function (current, previous) {
                },
                beforeShow: function () {

                    $(window).on({
                        'resize.envirabox': function () {
                            $.envirabox.update();
                        }
                    });

                    /* Set alt, data-envira-title, data-envira-caption and data-envira-index attributes on Lightbox image */
                    $('img.envirabox-image').attr('alt', envira_albums_galleries_images['56190'][this.index].alt)
                        .attr('data-envira-gallery-id', '56190')
                        .attr('data-envira-item-id', envira_albums_galleries_images['56190'][this.index].id)
                        .attr('data-envira-title', envira_albums_galleries_images['56190'][this.index].title)
                        .attr('data-envira-caption', envira_albums_galleries_images['56190'][this.index].caption)
                        .attr('data-envira-index', this.index);

                    $('.envirabox-overlay').addClass('envirabox-thumbs');


                    $('.envirabox-overlay').addClass('overlay-video');

                    var overlay_supersize = false;
                    if (overlay_supersize) {
                        $('.envirabox-overlay').addClass('overlay-supersize');
                        $('#envirabox-thumbs').addClass('thumbs-supersize');
                    }
                    $('.envira-close').click(function (event) {
                        event.preventDefault();
                        $.envirabox.close();
                    });
                    $('.envirabox-overlay').addClass('overlay-video');
                },
                afterShow: function (i) {
                    $('.envirabox-wrap').swipe({
                        swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
                            if (direction === 'left') {
                                $.envirabox.next(direction);
                            } else if (direction === 'right') {
                                $.envirabox.prev(direction);
                            } else if (direction === 'up') {
                            }
                        }
                    });

                    var overlay_supersize = false;
                    if (overlay_supersize) {
                        $('#envirabox-thumbs').addClass('thumbs-supersize');
                    }


                    if ($('#envira-gallery-wrap-56458 div.envira-pagination').length > 0) {
                        var envirabox_page = ( $('#envira-gallery-wrap-56458 div.envira-pagination').data('page') );
                    } else {
                        var envirabox_page = 0;
                    }
                    this.inner.find('img').attr('data-pagination-page', envirabox_page);
                    // console.log (envirabox_page);

                },
                beforeClose: function () {
                },
                afterClose: function () {
                    $(window).off('resize.envirabox');
                },
                onUpdate: function () {
                    var envira_buttons_56458 = $('#envirabox-buttons li').map(function () {
                            return $(this).width();
                        }).get(),
                        envira_buttons_total_56458 = 0;

                    $.each(envira_buttons_56458, function (i, val) {
                        envira_buttons_total_56458 += parseInt(val, 10);
                    });
                    envira_buttons_total_56458 += 1;

                    $('#envirabox-buttons ul').width(envira_buttons_total_56458);
                    $('#envirabox-buttons').width(envira_buttons_total_56458).css('left', ($(window).width() - envira_buttons_total_56458) / 2);
                },
                onCancel: function () {
                },
                onPlayStart: function () {
                },
                onPlayEnd: function () {
                }
            });

            $('.envirabox-overlay').addClass('overlay-base');

        });

        <?php
        foreach ($albums as $key => $album){
        foreach($album->galleries as $k => $gallery){
        ?>
        envira_albums_galleries_images[<?= $gallery->id ?>] = [];

        <?php foreach($gallery->images as $k_img => $image){ ?>
        envira_albums_galleries_images[<?= $gallery->id ?>].push({
            href: '<?= $image->image_url ?>',
            id: <?= $gallery->id ?> + <?= $image->id ?>,
            gallery_id: <?= $gallery->id ?>,
            alt: '',
            caption: '',
            title: '<?= $image->name ?>',
            index: <?= $k_img ?>,
            thumbnail: '<?= $image->image_url ?>',
            mobile_thumbnail: '<?= $image->image_url ?>'
        });

        <?php } ?>

        $(document).on('click', '.envira-album-gallery-' + <?= $gallery->id ?>, function (e) {
            e.preventDefault();

            envira_albums_galleries[<?= $gallery->id ?>] = $.envirabox.open(envira_albums_galleries_images[<?= $gallery->id ?>], {
                lightboxTheme: 'base',
                margin: 40,
                padding: 15,
                arrows: 1,
                aspectRatio: 1,
                loop: 1,
                mouseWheel: 1,
                preload: 1,
                openEffect: 'none',
                closeEffect: 'none',
                nextEffect: 'fade',
                prevEffect: 'fade',
                tpl: {
                    wrap: '<div class="envirabox-wrap" tabIndex="-1"><div class="envirabox-skin envirabox-theme-base"><div class="envirabox-outer"><div class="envirabox-inner"><div class="envirabox-actions base "></div><div class="envirabox-position-overlay envira-gallery-top-left"></div><div class="envirabox-position-overlay envira-gallery-top-right"></div><div class="envirabox-position-overlay envira-gallery-bottom-left"></div><div class="envirabox-position-overlay envira-gallery-bottom-right"></div></div></div></div></div>',
                    image: '<img class="envirabox-image" src="{href}" alt="" data-envira-title="" data-envira-caption="" data-envira-index="" data-envira-data="" />',
                    iframe: '<iframe id="envirabox-frame{rnd}" name="envirabox-frame{rnd}" class="envirabox-iframe" frameborder="0" vspace="0" hspace="0" allowtransparency="true"\></iframe>',
                    error: '<p class="envirabox-error">The requested content cannot be loaded.<br/>Please try again later.</p>',
                    closeBtn: '<a title="Close" class="envirabox-item envirabox-close" href="javascript:;"></a>',
                    next: '<a title="Next" class="envirabox-nav envirabox-next envirabox-arrows-inside" href="javascript:;"><span></span></a>',
                    prev: '<a title="Previous" class="envirabox-nav envirabox-prev envirabox-arrows-inside" href="javascript:;"><span></span></a>'
                },
                helpers: {
                    video: {
                        autoplay: 0,
                        playpause: 1,
                        progress: 1,
                        current: 1,
                        duration: 1,
                        volume: 1,
                    },
                    title: {
                        type: 'float',
                        alwaysShow: '',
                    },
                    thumbs: {
                        width: 75,
                        height: 50,
                        mobile_thumbs: 1,
                        mobile_width: 75,
                        mobile_height: 50,
                        source: function (current) {
                            /* current is our images_id array object */
                            return current.thumbnail;
                        },
                        mobileSource: function (current) {
                            /* current is our images_id array object */
                            return current.mobile_thumbnail;
                        },
                        dynamicMargin: false,
                        dynamicMarginAmount: 0,
                        position: 'bottom',
                    },
                    buttons: {
                        tpl: '<div id="envirabox-buttons"><ul><li><a class="btnPrev" title="Previous" href="javascript:;"></a></li><li><a class="btnNext" title="Next" href="javascript:;"></a></li><li><a class="btnClose" title="Close" href="javascript:;"></a></li></ul></div>',
                        position: 'top',
                        padding: ''
                    },
                    navDivsRoot: false,
                    actionDivRoot: false,
                },
                beforeLoad: function () {
                    if (typeof envira_albums_galleries_images[<?= $gallery->id ?>][this.index].caption !== 'undefined') {
                        this.title = envira_albums_galleries_images[<?= $gallery->id ?>][this.index].caption;
                    } else {
                        this.title = envira_albums_galleries_images[<?= $gallery->id ?>][this.index].title;
                    }
                },
                afterLoad: function (current, previous) {
                },
                beforeShow: function () {

                    $(window).on({
                        'resize.envirabox': function () {
                            $.envirabox.update();
                        }
                    });

                    /* Set alt, data-envira-title, data-envira-caption and data-envira-index attributes on Lightbox image */
                    $('img.envirabox-image').attr('alt', envira_albums_galleries_images[<?= $gallery->id ?>][this.index].alt)
                        .attr('data-envira-gallery-id', <?= $gallery->id ?>)
                        .attr('data-envira-item-id', envira_albums_galleries_images[<?= $gallery->id ?>][this.index].id)
                        .attr('data-envira-title', envira_albums_galleries_images[<?= $gallery->id ?>][this.index].title)
                        .attr('data-envira-caption', envira_albums_galleries_images[<?= $gallery->id ?>][this.index].caption)
                        .attr('data-envira-index', this.index);

                    $('.envirabox-overlay').addClass('envirabox-thumbs');


                    $('.envirabox-overlay').addClass('overlay-video');

                    var overlay_supersize = false;
                    if (overlay_supersize) {
                        $('.envirabox-overlay').addClass('overlay-supersize');
                        $('#envirabox-thumbs').addClass('thumbs-supersize');
                    }
                    $('.envira-close').click(function (event) {
                        event.preventDefault();
                        $.envirabox.close();
                    });
                    $('.envirabox-overlay').addClass('overlay-video');
                },
                afterShow: function (i) {
                    $('.envirabox-wrap').swipe({
                        swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
                            if (direction === 'left') {
                                $.envirabox.next(direction);
                            } else if (direction === 'right') {
                                $.envirabox.prev(direction);
                            } else if (direction === 'up') {
                            }
                        }
                    });

                    var overlay_supersize = false;
                    if (overlay_supersize) {
                        $('#envirabox-thumbs').addClass('thumbs-supersize');
                    }


                    if ($('#envira-gallery-wrap-56458 div.envira-pagination').length > 0) {
                        var envirabox_page = ( $('#envira-gallery-wrap-56458 div.envira-pagination').data('page') );
                    } else {
                        var envirabox_page = 0;
                    }
                    this.inner.find('img').attr('data-pagination-page', envirabox_page);
                    // console.log (envirabox_page);

                },
                beforeClose: function () {
                },
                afterClose: function () {
                    $(window).off('resize.envirabox');
                },
                onUpdate: function () {
                    var envira_buttons_56458 = $('#envirabox-buttons li').map(function () {
                            return $(this).width();
                        }).get(),
                        envira_buttons_total_56458 = 0;

                    $.each(envira_buttons_56458, function (i, val) {
                        envira_buttons_total_56458 += parseInt(val, 10);
                    });
                    envira_buttons_total_56458 += 1;

                    $('#envirabox-buttons ul').width(envira_buttons_total_56458);
                    $('#envirabox-buttons').width(envira_buttons_total_56458).css('left', ($(window).width() - envira_buttons_total_56458) / 2);
                },
                onCancel: function () {
                },
                onPlayStart: function () {
                },
                onPlayEnd: function () {
                }
            });

            $('.envirabox-overlay').addClass('overlay-base');

        });

        <?php
        }
        }

        ?>

        envira_albums_isotopes['56464'] = envira_container_56464 = $('#envira-gallery-56464').enviratope(envira_albums_isotopes_config['56464']);
        envira_albums_isotopes['56464'].enviraImagesLoaded()
            .done(function () {
                envira_albums_isotopes['56464'].enviratope('layout');
            })
            .progress(function () {
                envira_albums_isotopes['56464'].enviratope('layout');
            });
        envira_container_56464 = $('#envira-gallery-56464').enviraImagesLoaded(function () {
            $('.envira-gallery-item img').fadeTo('slow', 1);
        });
        var envira_container_56462 = '';


        envira_container_56462 = $('#envira-gallery-56462').enviraImagesLoaded(function () {
            $('.envira-gallery-item img').fadeTo('slow', 1);
        });


    });

</script>
