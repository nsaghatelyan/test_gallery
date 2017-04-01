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

}