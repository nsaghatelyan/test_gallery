<?php
wp_register_style('album-popup-css', Photo_Gallery_WP()->plugin_url() . "/assets/style/album-popup.css");
wp_enqueue_style('album-popup-css');

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

if (Photo_Gallery_WP()->settings->album_grid_style == 5) {
    $mosaic = 1;
} elseif (Photo_Gallery_WP()->settings->album_grid_style == 6) {
    $mosaic = 2;
} else {
    $mosaic = 0;
}

$cat_class = array();
foreach ($album_categories as $val) {
    $cat_class_all[] = ".hg_cat_" . $val->id;
}
?>

<input type="hidden" name="album_view" value="<?= Photo_Gallery_WP()->settings->album_style ?>">
<input type="hidden" name="mosaic" value="<?= $mosaic ?>">
<div id="main" style="display: inline-block; width:100%;">
    <div id="album_list_container">
        <div class="row album_categories">
            <ul id="filters" class="clearfix">
                <li><span class="filter active" id="album_all_categories"
                          data-filter="<?php echo implode(', ', $cat_class_all); ?>"><?= __("All", "gallery-images") ?></span>
                </li>
                <?php foreach ($album_categories as $key => $cat) { ?>
                    <li><span class="filter" data-filter=".hg_cat_<?= $cat->id ?>"><?= $cat->name ?></span></li>
                <?php } ?>
            </ul>
        </div>
        <div class="row filtr-container album_list" id="album_list">
            <?php
            foreach ($albums as $key => $album) { ?>
                <div class="view <?= $hover_class; ?>  <?php echo implode(" ", $album->cat_class); ?>">
                    <div class="<?= $hover_class; ?>-wrapper">
                        <?php if (Photo_Gallery_WP()->settings->album_show_image_count !== "false") { ?>
                            <span class="album_images_count"><?= $album->image_count ?></span>
                        <?php } ?>
                        <img src="<?= $album->image_url ?>" alt="<?= $album->name ?>"/>
                        <div class="mask">
                            <a href="#" class="envira-album-gallery-<?= $album->id ?> envira-gallery-link">
                                <div class="mask-text">
                                    <?php if (Photo_Gallery_WP()->settings->album_show_title !== 'false') { ?>
                                        <h2><?= $album->name ?></h2>
                                    <?php }
                                    if (Photo_Gallery_WP()->settings->album_show_description !== 'false') { ?>
                                        <span class="text-category"><?= $album->description ?></span>
                                    <?php } ?>
                                </div>
                            </a>
                            <?php if ($hover_class != "view-forth") { ?>
                                <?php if (Photo_Gallery_WP()->settings->album_show_sharing_buttons !== "false") { ?>
                                    <div class="album_socials"></div>
                                <?php }
                            } ?>
                            <a href="#" class="envira-album-gallery-<?= $album->id ?> envira-gallery-link">
                                <div class="mask-bg"></div>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php if ($hover_class == "view-fifth") { ?>

    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery(' #album_list > .view-fifth ').each(function () {
                jQuery(this).hoverdir();
            });
        });
    </script>
<?php } ?>

<script type="text/javascript">
    jQuery(function () {
        var filterList = {
            init: function () {
                jQuery('#album_list').mixItUp({
                    selectors: {
                        target: '.view',
                        filter: '.filter'
                    }
                });
            }
        };
        filterList.init();
    });

    jQuery(document).ready(function () {
        jQuery(document).ready(function () {
            jQuery("#album_all_categories").addClass("active");
        })

        var shareButtons = '<ul class="rwd-share-buttons" style="display: block;">';
        shareButtons += '<li><a title="Facebook" class="album_social_fb" id="rwd-share-facebook" target="_blank"></a></li>';
        shareButtons += '<li><a title="Twitter" class="album_social_twitter" id="rwd-share-twitter" target="_blank"></a></li>';
        shareButtons += '<li><a title="Google Plus" class="album_social_google" id="rwd-share-googleplus" target="_blank"></a></li>';
        shareButtons += '</ul>';

        jQuery(".album_socials").append(shareButtons);

        jQuery('.album_social_fb').attr('href', 'https://www.facebook.com/sharer/sharer.php?u=' + (encodeURIComponent(document.URL)));
        jQuery('.album_social_twitter').attr('href', 'https://twitter.com/intent/tweet?text=&url=' + (encodeURIComponent(document.URL)));
        jQuery('.album_social_google').attr('href', 'https://plus.google.com/share?url=' + (encodeURIComponent(document.URL)));
    });
</script>

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

        <?php
        foreach ($albums as $key => $album){

        echo "envira_albums_galleries_images[$album->id] = [];";

        foreach($album->galleries as $k => $gallery){
        foreach($gallery->images as $k_img => $image){
        ?>

        envira_albums_galleries_images[<?= $album->id ?>].push({
            href: '<?= $image->image_url ?>',
            id: <?= $album->id ?>+<?= $gallery->id ?> + <?= $image->id ?>,
            gallery_id: <?= $album->id ?>,
            alt: '',
            caption: '',
            title: '<?= $image->name ?>',
            index: <?= $k_img ?>,
            thumbnail: '<?= $image->image_url ?>',
            mobile_thumbnail: '<?= $image->image_url ?>'
        });

        <?php }
        } ?>


        $(document).on('click', '.envira-album-gallery-<?= $album->id ?>', function (e) {
            e.preventDefault();

            envira_albums_galleries['<?= $album->id ?>'] = $.envirabox.open(envira_albums_galleries_images['<?= $album->id ?>'], {
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
                    if (typeof envira_albums_galleries_images['<?= $album->id ?>'][this.index].caption !== 'undefined') {
                        this.title = envira_albums_galleries_images['<?= $album->id ?>'][this.index].caption;
                    } else {
                        this.title = envira_albums_galleries_images['<?= $album->id ?>'][this.index].title;
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
                    $('img.envirabox-image').attr('alt', envira_albums_galleries_images['<?= $album->id ?>'][this.index].alt)
                        .attr('data-envira-gallery-id', '<?= $album->id ?>')
                        .attr('data-envira-item-id', envira_albums_galleries_images['<?= $album->id ?>'][this.index].id)
                        .attr('data-envira-title', envira_albums_galleries_images['<?= $album->id ?>'][this.index].title)
                        .attr('data-envira-caption', envira_albums_galleries_images['<?= $album->id ?>'][this.index].caption)
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
    });


</script>
