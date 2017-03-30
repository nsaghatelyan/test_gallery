<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/30/2017
 * Time: 9:24 AM
 */
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
                        <?php foreach ($albums as $key => $album) { ?>

                            <div id="envira-gallery-item-56190"
                                 class="envira-gallery-item enviratope-item envira-gallery-item-1"
                                 style="padding-left: 5px; padding-bottom: 10px; padding-right: 5px;">
                                <div class="envira-gallery-item-inner">
                                    <div class="envira-gallery-position-overlay  envira-gallery-top-left"></div>
                                    <div class="envira-gallery-position-overlay  envira-gallery-top-right"></div>
                                    <div class="envira-gallery-position-overlay  envira-gallery-bottom-left"></div>
                                    <div class="envira-gallery-position-overlay  envira-gallery-bottom-right"></div>
                                    <a href="http://enviragallery.com/envira/exif-addon/"
                                       class="envira-album-gallery-56190 envira-gallery-link" title="">
                                        <img id="envira-gallery-image-56190"
                                             class="envira-gallery-image envira-gallery-image-1"
                                             src="<?= $album->image_url ?>"
                                             width="640" height="473"
                                             data-envira-src="http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/photodune-2789649-green-m1-640x473_c.jpg"
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


<section style="position: relative" id="huge_it_gallery_content_<?php echo $galleryID; ?>" class="gallery-img-content"
         data-image-behaviour="<?php echo Photo_Gallery_WP()->settings->image_natural_size_contentpopup; ?>"
         data-rating-type="<?php echo $like_dislike; ?>">
    <div class="ph-gallery-wp-loading-icon"></div>
    <div style="visibility: hidden" id="ph-g-wp_gallery_container_<?php echo $galleryID; ?>"
         class="ph-gallery-wp-loading-class ph-g-wp_gallery_container super-list variable-sizes clearfix view-<?php echo $view_slug; ?>"
         data-show-center="<?php echo Photo_Gallery_WP()->settings->view2_content_in_center; ?>">
        <div id="ph-g-wp_gallery_container_moving_<?php echo $galleryID; ?>">
            <input type="hidden" class="pagenum" value="1"/>
            <input type="hidden" id="total" value="<?php echo $total; ?>"/>
            <?php

            foreach ($albums as $val) {
                ?>

                <div class="ph_element ph_element_<?= $val->id; ?>">
                    <div class="image-block image-block_<?= $val->id; ?>">
                        <img id="wd-cl-img0" src="<?= $val->image_url ?>" alt="<?= $val->name ?>">
                        <div class="ph-g-wp-gallery-image-overlay">
                            <a href="#<?= $val->id ?>" title="<?= $val->name ?>"></a>
                        </div>
                    </div>
                    <?= $val->name ?>
                </div>

                <?php
            }

            foreach ($page_images as $key => $row) {
                $num2 = $wpdb->prepare("SELECT `image_status`,`ip` FROM " . $wpdb->prefix . "photo_gallery_wp_like_dislike WHERE image_id = %d AND `ip` = '" . $huge_it_ip . "'", (int)$row->id);
                $res3 = $wpdb->get_row($num2);
                $num3 = $wpdb->prepare("SELECT `image_status`,`ip`,`cook` FROM " . $wpdb->prefix . "photo_gallery_wp_like_dislike WHERE image_id = %d AND `cook` = '" . $_COOKIE['Like_' . $row->id . ''] . "'", (int)$row->id);
                $res4 = $wpdb->get_row($num3);
                $num4 = $wpdb->prepare("SELECT `image_status`,`ip`,`cook` FROM " . $wpdb->prefix . "photo_gallery_wp_like_dislike WHERE image_id = %d AND `cook` = '" . $_COOKIE['Dislike_' . $row->id . ''] . "'", (int)$row->id);
                $res5 = $wpdb->get_row($num4);
                $title = $row->name;
                $link = str_replace('__5_5_5__', '%', $row->sl_url);
                $descnohtml = strip_tags(str_replace('__5_5_5__', '%', $row->description));
                $result = substr($descnohtml, 0, 50);
                ?>


                <div class="ph_element ph_element_<?php echo $galleryID; ?> <?php if ($title == '' && $link == '') {
                    echo 'no-title';
                } ?>"
                     tabindex="0"
                     data-symbol="<?php echo str_replace('__5_5_5__', '%', $row->name); ?>"
                     data-category="alkaline-earth">
                    <div class="image-block image-block_<?php echo $galleryID; ?>">
                        <?php
                        $imagerowstype = $row->sl_type;
                        if ($row->sl_type == '') {
                            $imagerowstype = 'image';
                        }
                        switch ($imagerowstype) {
                            case 'image':
                                ?>
                                <?php $imgurl = explode(";", $row->image_url); ?>
                                <?php if ($row->image_url != ';') { ?>
                                <img alt="<?php echo str_replace('__5_5_5__', '%', $row->name); ?>"
                                     id="wd-cl-img<?php echo $key; ?>"
                                     src="<?php if (Photo_Gallery_WP()->settings->image_natural_size_contentpopup == 'resize') {
                                         echo esc_url(photo_gallery_wp_get_image_by_sizes_and_src($imgurl[0], array(
                                             Photo_Gallery_WP()->settings->view2_element_width,
                                             Photo_Gallery_WP()->settings->view2_element_height
                                         ), false));
                                     } else {
                                         echo $imgurl[0];
                                     } ?>"/>
                            <?php } else { ?>
                                <img alt="<?php echo str_replace('__5_5_5__', '%', $row->name); ?>"
                                     id="wd-cl-img<?php echo $key; ?>" src="images/noimage.jpg"/>
                                <?php
                            } ?>
                                <?php
                                break;
                            case 'video':
                                ?>
                                <?php
                                $videourl = photo_gallery_wp_get_video_id_from_url($row->image_url);
                                if ($videourl[1] == 'youtube') {
                                    ?>
                                    <img alt="<?php echo str_replace('__5_5_5__', '%', $row->name); ?>"
                                         src="http://img.youtube.com/vi/<?php echo $videourl[0]; ?>/mqdefault.jpg"/>
                                    <?php
                                } else {
                                    $hash = unserialize(wp_remote_fopen("http://vimeo.com/api/v2/video/" . $videourl[0] . ".php"));
                                    $imgsrc = $hash[0]['thumbnail_large'];
                                    ?>
                                    <img alt="<?php echo str_replace('__5_5_5__', '%', $row->name); ?>"
                                         src="<?php echo esc_attr($imgsrc); ?>"/>
                                    <?php
                                }
                                ?>
                                <?php
                                break;
                        }
                        ?>
                        <?php if (str_replace('__5_5_5__', '%', $row->sl_url) == '') {
                            $viwMoreButton = '';
                        } else {
                            if ($row->link_target == 'on') {
                                $target = 'target="_blank"';
                            } else {
                                $target = '';
                            }
                            $viwMoreButton = '<div class="button-block"><a href="' . str_replace('__5_5_5__', '%', $row->sl_url) . '" ' . $target . ' >' . Photo_Gallery_WP()->settings->view2_element_linkbutton_text . '</a></div>';
                        }
                        ?>
                        <div class="ph-g-wp-gallery-image-overlay">
                            <a href="#<?php echo $row->id; ?>"
                               title="<?php echo str_replace('__5_5_5__', '%', $row->name); ?>"></a>
                            <?php if ($like_dislike != 'off'): ?>
                                <div
                                        class="ph-g-wp_gallery_like_cont ph-g-wp_gallery_like_cont_<?php echo $galleryID . $pID; ?>">
                                    <div class="ph-g-wp_gallery_like_wrapper">
						<span class="huge_it_like">
							<?php if ($like_dislike == 'heart'): ?>
                                <i class="hugeiticons-heart likeheart"></i>
                            <?php endif; ?>
                            <?php if ($like_dislike == 'dislike'): ?>
                                <i class="hugeiticons hugeiticons-thumbs-up like_thumb_up"></i>
                            <?php endif; ?>
                            <span class="huge_it_like_thumb" id="<?php echo $row->id ?>"
                                  data-status="<?php if (isset($res3->image_status) && $res3->image_status == 'liked') {
                                      echo $res3->image_status;
                                  } elseif (isset($res4->image_status) && $res4->image_status == 'liked') {
                                      echo $res4->image_status;
                                  } else {
                                      echo 'unliked';
                                  } ?>">
							<?php if ($like_dislike == 'heart'): ?>
                                <?php echo $row->like; ?>
                            <?php endif; ?>
						</span>
							<span
                                    class="ph-g-wp_like_count <?php if (Photo_Gallery_WP()->settings->popup_rating_count == 'off') {
                                        echo 'huge_it_hide';
                                    } ?>"
                                    id="<?php echo $row->id ?>"><?php if ($like_dislike != 'heart'): ?><?php echo $row->like; ?><?php endif; ?></span>
						</span>
                                    </div>
                                    <?php if ($like_dislike != 'heart'): ?>
                                        <div class="huge_it_gallery_dislike_wrapper">
						<span class="huge_it_dislike">
							<i class="hugeiticons-thumbs-down dislike_thumb_down"></i>
							<span class="huge_it_dislike_thumb" id="<?php echo $row->id ?>"
                                  data-status="<?php if (isset($res3->image_status) && $res3->image_status == 'disliked') {
                                      echo $res3->image_status;
                                  } elseif (isset($res5->image_status) && $res5->image_status == 'disliked') {
                                      echo $res5->image_status;
                                  } else {
                                      echo 'unliked';
                                  } ?>">
							</span>
							<span
                                    class="huge_it_dislike_count <?php if (Photo_Gallery_WP()->settings->popup_rating_count == 'off') {
                                        echo 'huge_it_hide';
                                    } ?>"
                                    id="<?php echo $row->id ?>"><?php echo $row->dislike; ?></span>
						</span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if ($title != '' || $link != ''): ?>
                        <div
                                class="title-block_<?php echo $galleryID; ?>">
                            <?php if ($title != '' && $title != null) { ?>
                                <h3
                                        title="<?php echo str_replace('__5_5_5__', '%', $row->name); ?>">
                                    <?php echo str_replace('__5_5_5__', '%', $row->name); ?>
                                </h3>
                            <?php } ?>
                            <?php if (Photo_Gallery_WP()->settings->view2_element_show_linkbutton == 'yes') { ?>
                                <?php echo $viwMoreButton ?>
                            <?php } ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php
            } ?>
        </div>
        <div style="clear:both;"></div>
    </div>
    <?php
    $a = $disp_type;

    ?>
</section>
<ul id="huge_it_gallery_popup_list_<?php echo $galleryID; ?>" class="huge_it_gallery_popup_list gallery-img-content"
    data-rating-type="<?php echo $like_dislike; ?>">
    <?php
    $changePopup = 1;

    foreach ($images as $key => $row) {
        $imgurl = explode(";", $row->image_url);
        $link = str_replace('__5_5_5__', '%', $row->sl_url);
        $descnohtml = strip_tags(
            str_replace('__5_5_5__', '%', $row->description));
        $result = substr($descnohtml, 0, 50);
        ?>
        <li class="pupup-element" id="ph-g-wp_pupup_element_<?php echo $row->id; ?>">
            <div class="heading-navigation heading-navigation_<?php echo $galleryID; ?>">
                <div style="display: inline-block; float: left;">
                    <div class="left-change"><a href="#<?php echo $changePopup - 1; ?>"
                                                data-popupid="#<?php echo $row->id; ?>"><</a></div>
                    <div class="right-change"><a href="#<?php echo $changePopup + 1; ?>"
                                                 data-popupid="#<?php echo $row->id; ?>">></a></div>
                </div>
                <?php $changePopup = $changePopup + 1; ?>
                <a href="#close" class="close"></a>
                <div style="clear:both;"></div>
            </div>
            <div class="popup-wrapper popup-wrapper_<?php echo $galleryID; ?>">
                <div class="image-block image-block_<?php echo $galleryID; ?>">
                    <?php if ($like_dislike == 'heart'): ?>
                        <div
                                class="ph-g-wp_gallery_like_cont ph-g-wp_gallery_like_cont_<?php echo $galleryID . $pID; ?>">
                            <div class="ph-g-wp_gallery_like_wrapper">
						<span class="huge_it_like">
							<?php if ($like_dislike == 'heart'): ?>
                                <i class="hugeiticons-heart likeheart"></i>
                            <?php endif; ?>
                            <?php if ($like_dislike == 'dislike'): ?>
                                <i class="hugeiticons hugeiticons-thumbs-up like_thumb_up"></i>
                            <?php endif; ?>
                            <span class="huge_it_like_thumb" id="<?php echo $row->id ?>"
                                  data-status="<?php if (isset($res3->image_status) && $res3->image_status == 'liked') {
                                      echo $res3->image_status;
                                  } elseif (isset($res4->image_status) && $res4->image_status == 'liked') {
                                      echo $res4->image_status;
                                  } else {
                                      echo 'unliked';
                                  } ?>">
							<?php if ($like_dislike == 'heart'): ?>
                                <?php echo $row->like; ?>
                            <?php endif; ?>
							</span>
							<span
                                    class="ph-g-wp_like_count <?php if (Photo_Gallery_WP()->settings->contentsl_rating_count == 'no') {
                                        echo 'huge_it_hide';
                                    } ?>"
                                    id="<?php echo $row->id ?>"><?php if ($like_dislike != 'heart'): ?><?php echo $row->like; ?><?php endif; ?></span>
						</span>
                            </div>
                            <?php if ($like_dislike != 'heart'): ?>
                                <div class="huge_it_gallery_dislike_wrapper">
						<span class="huge_it_dislike">
							<i class="hugeiticons-thumbs-down dislike_thumb_down"></i>
							<span class="huge_it_dislike_thumb" id="<?php echo $row->id ?>"
                                  data-status="<?php if (isset($res3->image_status) && $res3->image_status == 'disliked') {
                                      echo $res3->image_status;
                                  } elseif (isset($res5->image_status) && $res5->image_status == 'disliked') {
                                      echo $res5->image_status;
                                  } else {
                                      echo 'unliked';
                                  } ?>">
							</span>
							<span
                                    class="huge_it_dislike_count <?php if (Photo_Gallery_WP()->settings->contentsl_rating_count == 'no') {
                                        echo 'huge_it_hide';
                                    } ?>"
                                    id="<?php echo $row->id ?>"><?php echo $row->dislike; ?></span>
						</span>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php
                    $imagerowstype = $row->sl_type;
                    if ($row->sl_type == '') {
                        $imagerowstype = 'image';
                    }
                    switch ($imagerowstype) {
                        case 'image':
                            ?>
                            <?php if ($row->image_url != ';') { ?>
                            <img alt="<?php echo str_replace('__5_5_5__', '%', $row->name); ?>"
                                 id="wd-cl-big-img<?php echo $key; ?>" src="<?php echo esc_attr($imgurl[0]); ?>"/>
                        <?php } else { ?>
                            <img alt="<?php echo str_replace('__5_5_5__', '%', $row->name); ?>"
                                 id="wd-cl-big-img<?php echo $key; ?>" src="images/noimage.jpg"/>
                            <?php
                        } ?>
                            <?php
                            break;
                        case 'video':
                            ?>
                            <?php
                            $videourl = photo_gallery_wp_get_video_id_from_url($row->image_url);
                            if ($videourl[1] == 'youtube') {
                                ?>
                                <iframe src="//www.youtube.com/embed/<?php echo $videourl[0]; ?>" frameborder="0"
                                        allowfullscreen></iframe>
                                <?php
                            } else {
                                ?>
                                <iframe
                                        src="//player.vimeo.com/video/<?php echo $videourl[0]; ?>?title=0&amp;byline=0&amp;portrait=0"
                                        frameborder="0" webkitallowfullscreen mozallowfullscreen
                                        allowfullscreen></iframe>
                                <?php
                            }
                            ?>
                            <?php
                            break;
                    }
                    ?>
                    <?php if (str_replace('__5_5_5__', '%', $row->sl_url) == '') {
                        $viwMoreButton = '';
                    } else {
                        if ($row->link_target == 'yes') {
                            $target = 'target="_blank"';
                        } else {
                            $target = '';
                        }
                        $viwMoreButton = '<div class="button-block"><a href="' . str_replace('__5_5_5__', '%', $row->sl_url) . '" ' . $target . ' >' . Photo_Gallery_WP()->settings->view2_popup_linkbutton_text . '</a></div>';
                    }
                    ?>
                </div>
                <div
                        class="right-block"><?php if ($row->name != '' && $row->name != null) { ?>
                        <h3 class="title"><?php echo str_replace('__5_5_5__', '%', $row->name); ?></h3><?php } ?>
                    <?php if (Photo_Gallery_WP()->settings->view2_show_description == 'yes') { ?>
                        <div class="description"><?php echo str_replace('__5_5_5__', '%', $row->description); ?></div>
                    <?php } ?>
                    <?php if ($like_dislike != 'off' && $like_dislike != 'heart'): ?>
                        <div
                                class="ph-g-wp_gallery_like_cont ph-g-wp_gallery_like_cont_<?php echo $galleryID . $pID; ?>">
                            <div class="ph-g-wp_gallery_like_wrapper">
						<span class="huge_it_like">
							<?php if ($like_dislike == 'heart'): ?>
                                <i class="hugeiticons-heart likeheart"></i>
                            <?php endif; ?>
                            <?php if ($like_dislike == 'dislike'): ?>
                                <i class="hugeiticons-thumbs-up like_thumb_up"></i>
                            <?php endif; ?>
                            <span class="huge_it_like_thumb" id="<?php echo $row->id ?>"
                                  data-status="<?php if (isset($res3->image_status) && $res3->image_status == 'liked') {
                                      echo $res3->image_status;
                                  } elseif (isset($res4->image_status) && $res4->image_status == 'liked') {
                                      echo $res4->image_status;
                                  } else {
                                      echo 'unliked';
                                  } ?>">
							<?php if ($like_dislike == 'heart'): ?>
                                <?php echo $row->like; ?>
                            <?php endif; ?>
						</span>
							<span
                                    class="ph-g-wp_like_count <?php if (Photo_Gallery_WP()->settings->popup_rating_count == 'no') {
                                        echo 'huge_it_hide';
                                    } ?>"
                                    id="<?php echo $row->id ?>"><?php if ($like_dislike != 'heart'): ?><?php echo $row->like; ?><?php endif; ?></span>
						</span>
                            </div>
                            <?php if ($like_dislike != 'heart'): ?>
                                <div class="huge_it_gallery_dislike_wrapper">
						<span class="huge_it_dislike">
							<i class="hugeiticons-thumbs-down dislike_thumb_down"></i>
							<span class="huge_it_dislike_thumb" id="<?php echo $row->id ?>"
                                  data-status="<?php if (isset($res3->image_status) && $res3->image_status == 'disliked') {
                                      echo $res3->image_status;
                                  } elseif (isset($res5->image_status) && $res5->image_status == 'disliked') {
                                      echo $res5->image_status;
                                  } else {
                                      echo 'unliked';
                                  } ?>">
							</span>
							<span
                                    class="huge_it_dislike_count <?php if (Photo_Gallery_WP()->settings->popup_rating_count == 'no') {
                                        echo 'huge_it_hide';
                                    } ?>"
                                    id="<?php echo $row->id ?>"><?php echo $row->dislike; ?></span>
							</span>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php if (Photo_Gallery_WP()->settings->view2_show_popup_linkbutton == 'yes') { ?>
                        <?php echo $viwMoreButton; ?>
                    <?php } ?>
                    <div style="clear:both;"></div>
                </div>
                <div style="clear:both;"></div>
            </div>
        </li>
        <?php
    } ?>
</ul>


<!-- envira script  -->

<script type="text/javascript">
    var envira_albums_galleries = [],
        envira_albums_galleries_images = {},
        envira_albums_isotopes = [],
        envira_albums_isotopes_config = [],
        envira_albums_sort = {"56458": false, "56464": false, "56462": false};

    jQuery(document).ready(function ($) {

        var envira_container_56458 = '';


        envira_container_56458 = $('#envira-gallery-56458').enviraImagesLoaded(function () {
            $('.envira-gallery-item img').fadeTo('slow', 1);
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

        envira_albums_galleries_images['56378'] = [];

        envira_albums_galleries_images['56378'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/cookies-1.jpg',
            id: 113434,
            gallery_id: '56378',
            alt: '',
            caption: '',
            title: 'cookies',
            index: 0,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/cookies-1-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/cookies-1-150x100_c.jpg'
        });
        envira_albums_galleries_images['56378'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/croissant-1.jpg',
            id: 113433,
            gallery_id: '56378',
            alt: '',
            caption: '',
            title: 'croissant',
            index: 1,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/croissant-1-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/croissant-1-150x100_c.jpg'
        });
        envira_albums_galleries_images['56378'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/cupcakes-1.jpg',
            id: 113432,
            gallery_id: '56378',
            alt: '',
            caption: '',
            title: 'cupcakes',
            index: 2,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/cupcakes-1-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/cupcakes-1-150x100_c.jpg'
        });
        envira_albums_galleries_images['56378'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/cherries-1.jpg',
            id: 113423,
            gallery_id: '56378',
            alt: '',
            caption: '',
            title: 'cherries',
            index: 3,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/cherries-1-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/cherries-1-150x100_c.jpg'
        });
        envira_albums_galleries_images['56378'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/burgers-1.jpg',
            id: 113424,
            gallery_id: '56378',
            alt: '',
            caption: '',
            title: 'burgers',
            index: 4,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/burgers-1-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/burgers-1-150x100_c.jpg'
        });
        envira_albums_galleries_images['56378'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/almonds.jpg',
            id: 113425,
            gallery_id: '56378',
            alt: '',
            caption: '',
            title: 'almonds',
            index: 5,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/almonds-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/almonds-150x100_c.jpg'
        });
        envira_albums_galleries_images['56378'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/steak-1.jpg',
            id: 113426,
            gallery_id: '56378',
            alt: '',
            caption: '',
            title: 'steak',
            index: 6,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/steak-1-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/steak-1-150x100_c.jpg'
        });
        envira_albums_galleries_images['56378'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/more-cupcakes.jpg',
            id: 113427,
            gallery_id: '56378',
            alt: '',
            caption: '',
            title: 'more-cupcakes',
            index: 7,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/more-cupcakes-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/more-cupcakes-150x100_c.jpg'
        });
        envira_albums_galleries_images['56378'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/ice-cream.jpg',
            id: 113428,
            gallery_id: '56378',
            alt: '',
            caption: '',
            title: 'ice-cream',
            index: 8,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/ice-cream-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/ice-cream-150x100_c.jpg'
        });
        envira_albums_galleries_images['56378'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/colored-cookies.jpg',
            id: 113429,
            gallery_id: '56378',
            alt: '',
            caption: '',
            title: 'colored-cookies',
            index: 9,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/colored-cookies-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/colored-cookies-150x100_c.jpg'
        });
        envira_albums_galleries_images['56378'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/green-beans.jpg',
            id: 113430,
            gallery_id: '56378',
            alt: '',
            caption: '',
            title: 'green-beans',
            index: 10,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/green-beans-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/green-beans-150x100_c.jpg'
        });
        envira_albums_galleries_images['56378'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/dessert-stand.jpg',
            id: 113431,
            gallery_id: '56378',
            alt: '',
            caption: '',
            title: 'dessert-stand',
            index: 11,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/dessert-stand-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/dessert-stand-150x100_c.jpg'
        });
        $(document).on('click', '.envira-album-gallery-56378', function (e) {
            e.preventDefault();

            envira_albums_galleries['56378'] = $.envirabox.open(envira_albums_galleries_images['56378'], {
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
                    if (typeof envira_albums_galleries_images['56378'][this.index].caption !== 'undefined') {
                        this.title = envira_albums_galleries_images['56378'][this.index].caption;
                    } else {
                        this.title = envira_albums_galleries_images['56378'][this.index].title;
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
                    $('img.envirabox-image').attr('alt', envira_albums_galleries_images['56378'][this.index].alt)
                        .attr('data-envira-gallery-id', '56378')
                        .attr('data-envira-item-id', envira_albums_galleries_images['56378'][this.index].id)
                        .attr('data-envira-title', envira_albums_galleries_images['56378'][this.index].title)
                        .attr('data-envira-caption', envira_albums_galleries_images['56378'][this.index].caption)
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

        envira_albums_galleries_images['56088'] = [];

        envira_albums_galleries_images['56088'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/stars-1.jpg',
            id: 113443,
            gallery_id: '56088',
            alt: '',
            caption: '',
            title: 'stars',
            index: 0,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/stars-1-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/stars-1-150x100_c.jpg'
        });
        envira_albums_galleries_images['56088'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/galaxy-view.jpg',
            id: 113435,
            gallery_id: '56088',
            alt: '',
            caption: '',
            title: 'galaxy-view',
            index: 1,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/galaxy-view-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/galaxy-view-150x100_c.jpg'
        });
        envira_albums_galleries_images['56088'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/night.jpg',
            id: 113436,
            gallery_id: '56088',
            alt: '',
            caption: '',
            title: 'night',
            index: 2,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/night-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/night-150x100_c.jpg'
        });
        envira_albums_galleries_images['56088'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/beautiful-stars.jpg',
            id: 113437,
            gallery_id: '56088',
            alt: '',
            caption: '',
            title: 'beautiful-stars',
            index: 3,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/beautiful-stars-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/beautiful-stars-150x100_c.jpg'
        });
        envira_albums_galleries_images['56088'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/sky-view.jpg',
            id: 113438,
            gallery_id: '56088',
            alt: '',
            caption: '',
            title: 'sky-view',
            index: 4,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/sky-view-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/sky-view-150x100_c.jpg'
        });
        envira_albums_galleries_images['56088'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/milkyway.jpg',
            id: 113439,
            gallery_id: '56088',
            alt: '',
            caption: '',
            title: 'milkyway',
            index: 5,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/milkyway-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/milkyway-150x100_c.jpg'
        });
        envira_albums_galleries_images['56088'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/red-stars.jpg',
            id: 113440,
            gallery_id: '56088',
            alt: '',
            caption: '',
            title: 'red-stars',
            index: 6,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/red-stars-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/red-stars-150x100_c.jpg'
        });
        envira_albums_galleries_images['56088'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/shooting-star.jpg',
            id: 113441,
            gallery_id: '56088',
            alt: '',
            caption: '',
            title: 'shooting-star',
            index: 7,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/shooting-star-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/shooting-star-150x100_c.jpg'
        });
        envira_albums_galleries_images['56088'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/nightstarts.jpg',
            id: 113442,
            gallery_id: '56088',
            alt: '',
            caption: '',
            title: 'nightstarts',
            index: 8,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/nightstarts-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/nightstarts-150x100_c.jpg'
        });
        envira_albums_galleries_images['56088'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/desert-stars.jpg',
            id: 113444,
            gallery_id: '56088',
            alt: '',
            caption: '',
            title: 'desert-stars',
            index: 9,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/desert-stars-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/desert-stars-150x100_c.jpg'
        });
        $(document).on('click', '.envira-album-gallery-56088', function (e) {
            e.preventDefault();

            envira_albums_galleries['56088'] = $.envirabox.open(envira_albums_galleries_images['56088'], {
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
                    if (typeof envira_albums_galleries_images['56088'][this.index].caption !== 'undefined') {
                        this.title = envira_albums_galleries_images['56088'][this.index].caption;
                    } else {
                        this.title = envira_albums_galleries_images['56088'][this.index].title;
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
                    $('img.envirabox-image').attr('alt', envira_albums_galleries_images['56088'][this.index].alt)
                        .attr('data-envira-gallery-id', '56088')
                        .attr('data-envira-item-id', envira_albums_galleries_images['56088'][this.index].id)
                        .attr('data-envira-title', envira_albums_galleries_images['56088'][this.index].title)
                        .attr('data-envira-caption', envira_albums_galleries_images['56088'][this.index].caption)
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

        var envira_container_56464 = '';


        envira_albums_isotopes_config['56464'] = {
            itemSelector: '.envira-gallery-item',
            masonry: {
                columnWidth: '.envira-gallery-item'
            }
        };
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
        envira_albums_galleries_images['143769'] = [];

        envira_albums_galleries_images['143769'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/greens.jpg',
            id: 143771,
            gallery_id: '143769',
            alt: '',
            caption: '',
            title: 'greens',
            index: 0,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/greens-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/greens-150x100_c.jpg'
        });
        envira_albums_galleries_images['143769'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/grill.jpg',
            id: 143772,
            gallery_id: '143769',
            alt: '',
            caption: '',
            title: 'grill',
            index: 1,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/grill-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/grill-150x100_c.jpg'
        });
        envira_albums_galleries_images['143769'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/grill1.jpeg',
            id: 143774,
            gallery_id: '143769',
            alt: '',
            caption: '',
            title: 'grill1',
            index: 2,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/grill1-150x100_c.jpeg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/grill1-150x100_c.jpeg'
        });
        envira_albums_galleries_images['143769'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/market.jpg',
            id: 143777,
            gallery_id: '143769',
            alt: '',
            caption: '',
            title: 'market',
            index: 3,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/market-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/market-150x100_c.jpg'
        });
        envira_albums_galleries_images['143769'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/sweets.jpg',
            id: 143781,
            gallery_id: '143769',
            alt: '',
            caption: '',
            title: 'sweets',
            index: 4,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/sweets-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/sweets-150x100_c.jpg'
        });
        envira_albums_galleries_images['143769'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/sweets1.jpeg',
            id: 143783,
            gallery_id: '143769',
            alt: '',
            caption: '',
            title: 'sweets1',
            index: 5,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/sweets1-150x100_c.jpeg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/sweets1-150x100_c.jpeg'
        });
        envira_albums_galleries_images['143769'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/grill2.jpg',
            id: 143776,
            gallery_id: '143769',
            alt: '',
            caption: '',
            title: 'grill2',
            index: 6,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/grill2-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/grill2-150x100_c.jpg'
        });
        $(document).on('click', '.envira-album-gallery-143769', function (e) {
            e.preventDefault();

            envira_albums_galleries['143769'] = $.envirabox.open(envira_albums_galleries_images['143769'], {
                lightboxTheme: 'base_dark',
                margin: 0,
                padding: 0,
                autoCenter: true,
                arrows: true,
                aspectRatio: 0,
                loop: 0,
                mouseWheel: 0,
                preload: 1,
                openEffect: 'fade',
                closeEffect: 'fade',
                nextEffect: 'fade',
                prevEffect: 'fade',
                tpl: {
                    wrap: '<div class="envirabox-wrap" tabIndex="-1"><div class="envirabox-skin envirabox-theme-base_dark"><div class="envirabox-outer"><div class="envirabox-inner"><div class="envirabox-actions base_dark "><div class="envira-close-button"><a title="Close" class="envirabox-item envira-close" href="#"></a></div></div><div class="envirabox-position-overlay envira-gallery-top-left"></div><div class="envirabox-position-overlay envira-gallery-top-right"></div><div class="envirabox-position-overlay envira-gallery-bottom-left"></div><div class="envirabox-position-overlay envira-gallery-bottom-right"></div></div></div></div></div>',
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
                        type: 'fixed',
                        alwaysShow: '1',
                    },
                    slideshow: {
                        skipSingle: true
                    },
                    navDivsRoot: false,
                    actionDivRoot: false,
                },
                beforeLoad: function () {
                    if (typeof envira_albums_galleries_images['143769'][this.index].caption !== 'undefined') {
                        this.title = envira_albums_galleries_images['143769'][this.index].caption;
                    } else {
                        this.title = envira_albums_galleries_images['143769'][this.index].title;
                    }
                },
                afterLoad: function (current, previous) {
                    // $.extend(this, {
                    //     width       : '100%',
                    //     height      : '100%'
                    // });
                },
                beforeShow: function () {

                    $(window).on({
                        'resize.envirabox': function () {
                            $.envirabox.update();
                        }
                    });

                    /* Set alt, data-envira-title, data-envira-caption and data-envira-index attributes on Lightbox image */
                    $('img.envirabox-image').attr('alt', envira_albums_galleries_images['143769'][this.index].alt)
                        .attr('data-envira-gallery-id', '143769')
                        .attr('data-envira-item-id', envira_albums_galleries_images['143769'][this.index].id)
                        .attr('data-envira-title', envira_albums_galleries_images['143769'][this.index].title)
                        .attr('data-envira-caption', envira_albums_galleries_images['143769'][this.index].caption)
                        .attr('data-envira-index', this.index);


                    $('.envirabox-overlay').addClass('overlay-video');

                    var overlay_supersize = true;
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

                    var overlay_supersize = true;
                    if (overlay_supersize) {
                        $('#envirabox-thumbs').addClass('thumbs-supersize');
                    }


                    if ($('#envira-gallery-wrap-56462 div.envira-pagination').length > 0) {
                        var envirabox_page = ( $('#envira-gallery-wrap-56462 div.envira-pagination').data('page') );
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
                },
                onCancel: function () {
                },
                onPlayStart: function () {
                },
                onPlayEnd: function () {
                }
            });

            $('.envirabox-overlay').addClass('overlay-base_dark');

        });

        envira_albums_galleries_images['127809'] = [];

        envira_albums_galleries_images['127809'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/07/arches1-1024x768.jpg',
            id: 127818,
            gallery_id: '127809',
            alt: '',
            caption: '',
            title: 'arches1',
            index: 0,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/07/arches1-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/07/arches1-150x100_c.jpg'
        });
        envira_albums_galleries_images['127809'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/07/desert-1024x768.jpg',
            id: 127819,
            gallery_id: '127809',
            alt: '',
            caption: '',
            title: 'desert',
            index: 1,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/07/desert-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/07/desert-150x100_c.jpg'
        });
        envira_albums_galleries_images['127809'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/07/water-1024x768.jpg',
            id: 127820,
            gallery_id: '127809',
            alt: '',
            caption: '',
            title: 'water',
            index: 2,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/07/water-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/07/water-150x100_c.jpg'
        });
        envira_albums_galleries_images['127809'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/07/yellowstone1-1024x768.jpg',
            id: 127821,
            gallery_id: '127809',
            alt: '',
            caption: '',
            title: 'yellowstone1',
            index: 3,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/07/yellowstone1-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/07/yellowstone1-150x100_c.jpg'
        });
        $(document).on('click', '.envira-album-gallery-127809', function (e) {
            e.preventDefault();

            envira_albums_galleries['127809'] = $.envirabox.open(envira_albums_galleries_images['127809'], {
                lightboxTheme: 'base_dark',
                margin: 0,
                padding: 0,
                autoCenter: true,
                arrows: true,
                aspectRatio: 0,
                loop: 0,
                mouseWheel: 0,
                preload: 1,
                openEffect: 'fade',
                closeEffect: 'fade',
                nextEffect: 'fade',
                prevEffect: 'fade',
                tpl: {
                    wrap: '<div class="envirabox-wrap" tabIndex="-1"><div class="envirabox-skin envirabox-theme-base_dark"><div class="envirabox-outer"><div class="envirabox-inner"><div class="envirabox-actions base_dark "><div class="envira-close-button"><a title="Close" class="envirabox-item envira-close" href="#"></a></div></div><div class="envirabox-position-overlay envira-gallery-top-left"></div><div class="envirabox-position-overlay envira-gallery-top-right"></div><div class="envirabox-position-overlay envira-gallery-bottom-left"></div><div class="envirabox-position-overlay envira-gallery-bottom-right"></div></div></div></div></div>',
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
                        type: 'fixed',
                        alwaysShow: '1',
                    },
                    slideshow: {
                        skipSingle: true
                    },
                    navDivsRoot: false,
                    actionDivRoot: false,
                },
                beforeLoad: function () {
                    if (typeof envira_albums_galleries_images['127809'][this.index].caption !== 'undefined') {
                        this.title = envira_albums_galleries_images['127809'][this.index].caption;
                    } else {
                        this.title = envira_albums_galleries_images['127809'][this.index].title;
                    }
                },
                afterLoad: function (current, previous) {
                    // $.extend(this, {
                    //     width       : '100%',
                    //     height      : '100%'
                    // });
                },
                beforeShow: function () {

                    $(window).on({
                        'resize.envirabox': function () {
                            $.envirabox.update();
                        }
                    });

                    /* Set alt, data-envira-title, data-envira-caption and data-envira-index attributes on Lightbox image */
                    $('img.envirabox-image').attr('alt', envira_albums_galleries_images['127809'][this.index].alt)
                        .attr('data-envira-gallery-id', '127809')
                        .attr('data-envira-item-id', envira_albums_galleries_images['127809'][this.index].id)
                        .attr('data-envira-title', envira_albums_galleries_images['127809'][this.index].title)
                        .attr('data-envira-caption', envira_albums_galleries_images['127809'][this.index].caption)
                        .attr('data-envira-index', this.index);


                    $('.envirabox-overlay').addClass('overlay-video');

                    var overlay_supersize = true;
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

                    var overlay_supersize = true;
                    if (overlay_supersize) {
                        $('#envirabox-thumbs').addClass('thumbs-supersize');
                    }


                    if ($('#envira-gallery-wrap-56462 div.envira-pagination').length > 0) {
                        var envirabox_page = ( $('#envira-gallery-wrap-56462 div.envira-pagination').data('page') );
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
                },
                onCancel: function () {
                },
                onPlayStart: function () {
                },
                onPlayEnd: function () {
                }
            });

            $('.envirabox-overlay').addClass('overlay-base_dark');

        });

        envira_albums_galleries_images['143748'] = [];

        envira_albums_galleries_images['143748'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/drum.jpeg',
            id: 143749,
            gallery_id: '143748',
            alt: '',
            caption: '',
            title: 'drum',
            index: 0,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/drum-150x100_c.jpeg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/drum-150x100_c.jpeg'
        });
        envira_albums_galleries_images['143748'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/guitar.jpg',
            id: 143750,
            gallery_id: '143748',
            alt: '',
            caption: '',
            title: 'guitar',
            index: 1,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/guitar-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/guitar-150x100_c.jpg'
        });
        envira_albums_galleries_images['143748'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/harp.jpeg',
            id: 143751,
            gallery_id: '143748',
            alt: '',
            caption: '',
            title: 'harp',
            index: 2,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/harp-150x100_c.jpeg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/harp-150x100_c.jpeg'
        });
        envira_albums_galleries_images['143748'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/horn.jpg',
            id: 143752,
            gallery_id: '143748',
            alt: '',
            caption: '',
            title: 'horn',
            index: 3,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/horn-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/horn-150x100_c.jpg'
        });
        envira_albums_galleries_images['143748'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/live.jpg',
            id: 143753,
            gallery_id: '143748',
            alt: '',
            caption: '',
            title: 'live',
            index: 4,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/live-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/live-150x100_c.jpg'
        });
        envira_albums_galleries_images['143748'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/mixing.jpeg',
            id: 143754,
            gallery_id: '143748',
            alt: '',
            caption: '',
            title: 'mixing',
            index: 5,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/mixing-150x100_c.jpeg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/mixing-150x100_c.jpeg'
        });
        envira_albums_galleries_images['143748'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/piano.jpeg',
            id: 143755,
            gallery_id: '143748',
            alt: '',
            caption: '',
            title: 'piano',
            index: 6,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/piano-150x100_c.jpeg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/piano-150x100_c.jpeg'
        });
        envira_albums_galleries_images['143748'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/beat-1.jpeg',
            id: 143756,
            gallery_id: '143748',
            alt: '',
            caption: '',
            title: 'beat-1',
            index: 7,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/beat-1-150x100_c.jpeg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/beat-1-150x100_c.jpeg'
        });
        envira_albums_galleries_images['143748'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/guitar5-1.jpeg',
            id: 143757,
            gallery_id: '143748',
            alt: '',
            caption: '',
            title: 'guitar5-1',
            index: 8,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/guitar5-1-150x100_c.jpeg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/guitar5-1-150x100_c.jpeg'
        });
        envira_albums_galleries_images['143748'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/keys1-1.jpg',
            id: 143758,
            gallery_id: '143748',
            alt: '',
            caption: '',
            title: 'keys1-1',
            index: 9,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/keys1-1-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/keys1-1-150x100_c.jpg'
        });
        $(document).on('click', '.envira-album-gallery-143748', function (e) {
            e.preventDefault();

            envira_albums_galleries['143748'] = $.envirabox.open(envira_albums_galleries_images['143748'], {
                lightboxTheme: 'base_dark',
                margin: 0,
                padding: 0,
                autoCenter: true,
                arrows: true,
                aspectRatio: 0,
                loop: 0,
                mouseWheel: 0,
                preload: 1,
                openEffect: 'fade',
                closeEffect: 'fade',
                nextEffect: 'fade',
                prevEffect: 'fade',
                tpl: {
                    wrap: '<div class="envirabox-wrap" tabIndex="-1"><div class="envirabox-skin envirabox-theme-base_dark"><div class="envirabox-outer"><div class="envirabox-inner"><div class="envirabox-actions base_dark "><div class="envira-close-button"><a title="Close" class="envirabox-item envira-close" href="#"></a></div></div><div class="envirabox-position-overlay envira-gallery-top-left"></div><div class="envirabox-position-overlay envira-gallery-top-right"></div><div class="envirabox-position-overlay envira-gallery-bottom-left"></div><div class="envirabox-position-overlay envira-gallery-bottom-right"></div></div></div></div></div>',
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
                        type: 'fixed',
                        alwaysShow: '1',
                    },
                    slideshow: {
                        skipSingle: true
                    },
                    navDivsRoot: false,
                    actionDivRoot: false,
                },
                beforeLoad: function () {
                    if (typeof envira_albums_galleries_images['143748'][this.index].caption !== 'undefined') {
                        this.title = envira_albums_galleries_images['143748'][this.index].caption;
                    } else {
                        this.title = envira_albums_galleries_images['143748'][this.index].title;
                    }
                },
                afterLoad: function (current, previous) {
                    // $.extend(this, {
                    //     width       : '100%',
                    //     height      : '100%'
                    // });
                },
                beforeShow: function () {

                    $(window).on({
                        'resize.envirabox': function () {
                            $.envirabox.update();
                        }
                    });

                    /* Set alt, data-envira-title, data-envira-caption and data-envira-index attributes on Lightbox image */
                    $('img.envirabox-image').attr('alt', envira_albums_galleries_images['143748'][this.index].alt)
                        .attr('data-envira-gallery-id', '143748')
                        .attr('data-envira-item-id', envira_albums_galleries_images['143748'][this.index].id)
                        .attr('data-envira-title', envira_albums_galleries_images['143748'][this.index].title)
                        .attr('data-envira-caption', envira_albums_galleries_images['143748'][this.index].caption)
                        .attr('data-envira-index', this.index);


                    $('.envirabox-overlay').addClass('overlay-video');

                    var overlay_supersize = true;
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

                    var overlay_supersize = true;
                    if (overlay_supersize) {
                        $('#envirabox-thumbs').addClass('thumbs-supersize');
                    }


                    if ($('#envira-gallery-wrap-56462 div.envira-pagination').length > 0) {
                        var envirabox_page = ( $('#envira-gallery-wrap-56462 div.envira-pagination').data('page') );
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
                },
                onCancel: function () {
                },
                onPlayStart: function () {
                },
                onPlayEnd: function () {
                }
            });

            $('.envirabox-overlay').addClass('overlay-base_dark');

        });

        envira_albums_galleries_images['143759'] = [];

        envira_albums_galleries_images['143759'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/night.jpg',
            id: 143760,
            gallery_id: '143759',
            alt: '',
            caption: '',
            title: 'night',
            index: 0,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/night-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/night-150x100_c.jpg'
        });
        envira_albums_galleries_images['143759'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/pexels-photo-120153-medium.jpeg',
            id: 143762,
            gallery_id: '143759',
            alt: '',
            caption: '',
            title: 'pexels-photo-120153-medium',
            index: 1,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/pexels-photo-120153-medium-150x100_c.jpeg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/pexels-photo-120153-medium-150x100_c.jpeg'
        });
        envira_albums_galleries_images['143759'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/pexels-photo-127753-medium.jpeg',
            id: 143763,
            gallery_id: '143759',
            alt: '',
            caption: '',
            title: 'pexels-photo-127753-medium',
            index: 2,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/pexels-photo-127753-medium-150x100_c.jpeg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/pexels-photo-127753-medium-150x100_c.jpeg'
        });
        envira_albums_galleries_images['143759'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/pexels-photo-129464-medium.jpeg',
            id: 143764,
            gallery_id: '143759',
            alt: '',
            caption: '',
            title: 'pexels-photo-129464-medium',
            index: 3,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/pexels-photo-129464-medium-150x100_c.jpeg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/pexels-photo-129464-medium-150x100_c.jpeg'
        });
        envira_albums_galleries_images['143759'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/pexels-photo-131032-medium.png',
            id: 143765,
            gallery_id: '143759',
            alt: '',
            caption: '',
            title: 'pexels-photo-131032-medium',
            index: 4,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/pexels-photo-131032-medium-150x100_c.png',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/pexels-photo-131032-medium-150x100_c.png'
        });
        envira_albums_galleries_images['143759'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/pexels-photo-133459-medium.jpeg',
            id: 143766,
            gallery_id: '143759',
            alt: '',
            caption: '',
            title: 'pexels-photo-133459-medium',
            index: 5,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/pexels-photo-133459-medium-150x100_c.jpeg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/pexels-photo-133459-medium-150x100_c.jpeg'
        });
        envira_albums_galleries_images['143759'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/water.jpeg',
            id: 143767,
            gallery_id: '143759',
            alt: '',
            caption: '',
            title: 'water',
            index: 6,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/water-150x100_c.jpeg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/water-150x100_c.jpeg'
        });
        envira_albums_galleries_images['143759'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/water2.jpeg',
            id: 143768,
            gallery_id: '143759',
            alt: '',
            caption: '',
            title: 'water2',
            index: 7,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/water2-150x100_c.jpeg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/09/water2-150x100_c.jpeg'
        });
        $(document).on('click', '.envira-album-gallery-143759', function (e) {
            e.preventDefault();

            envira_albums_galleries['143759'] = $.envirabox.open(envira_albums_galleries_images['143759'], {
                lightboxTheme: 'base_dark',
                margin: 0,
                padding: 0,
                autoCenter: true,
                arrows: true,
                aspectRatio: 0,
                loop: 0,
                mouseWheel: 0,
                preload: 1,
                openEffect: 'fade',
                closeEffect: 'fade',
                nextEffect: 'fade',
                prevEffect: 'fade',
                tpl: {
                    wrap: '<div class="envirabox-wrap" tabIndex="-1"><div class="envirabox-skin envirabox-theme-base_dark"><div class="envirabox-outer"><div class="envirabox-inner"><div class="envirabox-actions base_dark "><div class="envira-close-button"><a title="Close" class="envirabox-item envira-close" href="#"></a></div></div><div class="envirabox-position-overlay envira-gallery-top-left"></div><div class="envirabox-position-overlay envira-gallery-top-right"></div><div class="envirabox-position-overlay envira-gallery-bottom-left"></div><div class="envirabox-position-overlay envira-gallery-bottom-right"></div></div></div></div></div>',
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
                        type: 'fixed',
                        alwaysShow: '1',
                    },
                    slideshow: {
                        skipSingle: true
                    },
                    navDivsRoot: false,
                    actionDivRoot: false,
                },
                beforeLoad: function () {
                    if (typeof envira_albums_galleries_images['143759'][this.index].caption !== 'undefined') {
                        this.title = envira_albums_galleries_images['143759'][this.index].caption;
                    } else {
                        this.title = envira_albums_galleries_images['143759'][this.index].title;
                    }
                },
                afterLoad: function (current, previous) {
                    // $.extend(this, {
                    //     width       : '100%',
                    //     height      : '100%'
                    // });
                },
                beforeShow: function () {

                    $(window).on({
                        'resize.envirabox': function () {
                            $.envirabox.update();
                        }
                    });

                    /* Set alt, data-envira-title, data-envira-caption and data-envira-index attributes on Lightbox image */
                    $('img.envirabox-image').attr('alt', envira_albums_galleries_images['143759'][this.index].alt)
                        .attr('data-envira-gallery-id', '143759')
                        .attr('data-envira-item-id', envira_albums_galleries_images['143759'][this.index].id)
                        .attr('data-envira-title', envira_albums_galleries_images['143759'][this.index].title)
                        .attr('data-envira-caption', envira_albums_galleries_images['143759'][this.index].caption)
                        .attr('data-envira-index', this.index);


                    $('.envirabox-overlay').addClass('overlay-video');

                    var overlay_supersize = true;
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

                    var overlay_supersize = true;
                    if (overlay_supersize) {
                        $('#envirabox-thumbs').addClass('thumbs-supersize');
                    }


                    if ($('#envira-gallery-wrap-56462 div.envira-pagination').length > 0) {
                        var envirabox_page = ( $('#envira-gallery-wrap-56462 div.envira-pagination').data('page') );
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
                },
                onCancel: function () {
                },
                onPlayStart: function () {
                },
                onPlayEnd: function () {
                }
            });

            $('.envirabox-overlay').addClass('overlay-base_dark');

        });

        envira_albums_galleries_images['56102'] = [];

        envira_albums_galleries_images['56102'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/statue-of-liberty.jpg',
            id: 113695,
            gallery_id: '56102',
            alt: '',
            caption: '',
            title: 'statue-of-liberty',
            index: 0,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/statue-of-liberty-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/statue-of-liberty-150x100_c.jpg'
        });
        envira_albums_galleries_images['56102'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/times-square.jpg',
            id: 113696,
            gallery_id: '56102',
            alt: '',
            caption: '',
            title: 'times-square',
            index: 1,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/times-square-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/times-square-150x100_c.jpg'
        });
        envira_albums_galleries_images['56102'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/amsterdam.jpg',
            id: 113697,
            gallery_id: '56102',
            alt: '',
            caption: '',
            title: 'amsterdam',
            index: 2,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/amsterdam-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/amsterdam-150x100_c.jpg'
        });
        envira_albums_galleries_images['56102'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/beautiful-architecture.jpg',
            id: 113698,
            gallery_id: '56102',
            alt: '',
            caption: '',
            title: 'beautiful-architecture',
            index: 3,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/beautiful-architecture-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/beautiful-architecture-150x100_c.jpg'
        });
        envira_albums_galleries_images['56102'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/beautiful-lights.jpg',
            id: 113699,
            gallery_id: '56102',
            alt: '',
            caption: '',
            title: 'beautiful-lights',
            index: 4,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/beautiful-lights-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/beautiful-lights-150x100_c.jpg'
        });
        envira_albums_galleries_images['56102'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/bridge-1.jpg',
            id: 113700,
            gallery_id: '56102',
            alt: '',
            caption: '',
            title: 'bridge',
            index: 5,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/bridge-1-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/bridge-1-150x100_c.jpg'
        });
        envira_albums_galleries_images['56102'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/castle-1.jpg',
            id: 113701,
            gallery_id: '56102',
            alt: '',
            caption: '',
            title: 'castle',
            index: 6,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/castle-1-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/castle-1-150x100_c.jpg'
        });
        envira_albums_galleries_images['56102'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/cityscape-1.jpg',
            id: 113702,
            gallery_id: '56102',
            alt: '',
            caption: '',
            title: 'cityscape',
            index: 7,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/cityscape-1-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/cityscape-1-150x100_c.jpg'
        });
        envira_albums_galleries_images['56102'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/mountain-houses.jpg',
            id: 113703,
            gallery_id: '56102',
            alt: '',
            caption: '',
            title: 'mountain-houses',
            index: 8,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/mountain-houses-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/mountain-houses-150x100_c.jpg'
        });
        envira_albums_galleries_images['56102'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/mountain-temple.jpg',
            id: 113704,
            gallery_id: '56102',
            alt: '',
            caption: '',
            title: 'mountain-temple',
            index: 9,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/mountain-temple-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/mountain-temple-150x100_c.jpg'
        });
        envira_albums_galleries_images['56102'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/nyc-bulding.jpg',
            id: 113705,
            gallery_id: '56102',
            alt: '',
            caption: '',
            title: 'nyc-bulding',
            index: 10,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/nyc-bulding-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/nyc-bulding-150x100_c.jpg'
        });
        envira_albums_galleries_images['56102'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/rome-structure.jpg',
            id: 113706,
            gallery_id: '56102',
            alt: '',
            caption: '',
            title: 'rome-structure',
            index: 11,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/rome-structure-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/rome-structure-150x100_c.jpg'
        });
        $(document).on('click', '.envira-album-gallery-56102', function (e) {
            e.preventDefault();

            envira_albums_galleries['56102'] = $.envirabox.open(envira_albums_galleries_images['56102'], {
                lightboxTheme: 'base_dark',
                margin: 0,
                padding: 0,
                autoCenter: true,
                arrows: true,
                aspectRatio: 0,
                loop: 0,
                mouseWheel: 0,
                preload: 1,
                openEffect: 'fade',
                closeEffect: 'fade',
                nextEffect: 'fade',
                prevEffect: 'fade',
                tpl: {
                    wrap: '<div class="envirabox-wrap" tabIndex="-1"><div class="envirabox-skin envirabox-theme-base_dark"><div class="envirabox-outer"><div class="envirabox-inner"><div class="envirabox-actions base_dark "><div class="envira-close-button"><a title="Close" class="envirabox-item envira-close" href="#"></a></div></div><div class="envirabox-position-overlay envira-gallery-top-left"></div><div class="envirabox-position-overlay envira-gallery-top-right"></div><div class="envirabox-position-overlay envira-gallery-bottom-left"></div><div class="envirabox-position-overlay envira-gallery-bottom-right"></div></div></div></div></div>',
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
                        type: 'fixed',
                        alwaysShow: '1',
                    },
                    slideshow: {
                        skipSingle: true
                    },
                    navDivsRoot: false,
                    actionDivRoot: false,
                },
                beforeLoad: function () {
                    if (typeof envira_albums_galleries_images['56102'][this.index].caption !== 'undefined') {
                        this.title = envira_albums_galleries_images['56102'][this.index].caption;
                    } else {
                        this.title = envira_albums_galleries_images['56102'][this.index].title;
                    }
                },
                afterLoad: function (current, previous) {
                    // $.extend(this, {
                    //     width       : '100%',
                    //     height      : '100%'
                    // });
                },
                beforeShow: function () {

                    $(window).on({
                        'resize.envirabox': function () {
                            $.envirabox.update();
                        }
                    });

                    /* Set alt, data-envira-title, data-envira-caption and data-envira-index attributes on Lightbox image */
                    $('img.envirabox-image').attr('alt', envira_albums_galleries_images['56102'][this.index].alt)
                        .attr('data-envira-gallery-id', '56102')
                        .attr('data-envira-item-id', envira_albums_galleries_images['56102'][this.index].id)
                        .attr('data-envira-title', envira_albums_galleries_images['56102'][this.index].title)
                        .attr('data-envira-caption', envira_albums_galleries_images['56102'][this.index].caption)
                        .attr('data-envira-index', this.index);


                    $('.envirabox-overlay').addClass('overlay-video');

                    var overlay_supersize = true;
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

                    var overlay_supersize = true;
                    if (overlay_supersize) {
                        $('#envirabox-thumbs').addClass('thumbs-supersize');
                    }


                    if ($('#envira-gallery-wrap-56462 div.envira-pagination').length > 0) {
                        var envirabox_page = ( $('#envira-gallery-wrap-56462 div.envira-pagination').data('page') );
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
                },
                onCancel: function () {
                },
                onPlayStart: function () {
                },
                onPlayEnd: function () {
                }
            });

            $('.envirabox-overlay').addClass('overlay-base_dark');

        });

        envira_albums_galleries_images['122875'] = [];

        envira_albums_galleries_images['122875'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/06/GREETING-CARDS_SCANDINAVIAN-CHRISTMAS-01-768x960.jpg',
            id: 175136,
            gallery_id: '122875',
            alt: '',
            caption: '',
            title: 'greeting-cards_scandinavian-christmas-01',
            index: 0,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/06/GREETING-CARDS_SCANDINAVIAN-CHRISTMAS-01-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/06/GREETING-CARDS_SCANDINAVIAN-CHRISTMAS-01-150x100_c.jpg'
        });
        envira_albums_galleries_images['122875'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/06/GREETING-CARDS_SCANDINAVIAN-CHRISTMAS-02-768x960.jpg',
            id: 175137,
            gallery_id: '122875',
            alt: '',
            caption: '',
            title: 'greeting-cards_scandinavian-christmas-02',
            index: 1,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/06/GREETING-CARDS_SCANDINAVIAN-CHRISTMAS-02-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/06/GREETING-CARDS_SCANDINAVIAN-CHRISTMAS-02-150x100_c.jpg'
        });
        envira_albums_galleries_images['122875'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/06/GREETING-CARDS_SCANDINAVIAN-CHRISTMAS-03-768x960.jpg',
            id: 175138,
            gallery_id: '122875',
            alt: '',
            caption: '',
            title: 'greeting-cards_scandinavian-christmas-03',
            index: 2,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/06/GREETING-CARDS_SCANDINAVIAN-CHRISTMAS-03-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/06/GREETING-CARDS_SCANDINAVIAN-CHRISTMAS-03-150x100_c.jpg'
        });
        envira_albums_galleries_images['122875'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/06/GREETING-CARDS_SCANDINAVIAN-CHRISTMAS-04-768x960.jpg',
            id: 175139,
            gallery_id: '122875',
            alt: '',
            caption: '',
            title: 'greeting-cards_scandinavian-christmas-04',
            index: 3,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/06/GREETING-CARDS_SCANDINAVIAN-CHRISTMAS-04-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/06/GREETING-CARDS_SCANDINAVIAN-CHRISTMAS-04-150x100_c.jpg'
        });
        envira_albums_galleries_images['122875'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/06/GREETING-CARDS_SCANDINAVIAN-CHRISTMAS-05-768x960.jpg',
            id: 175140,
            gallery_id: '122875',
            alt: '',
            caption: '',
            title: 'greeting-cards_scandinavian-christmas-05',
            index: 4,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/06/GREETING-CARDS_SCANDINAVIAN-CHRISTMAS-05-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/06/GREETING-CARDS_SCANDINAVIAN-CHRISTMAS-05-150x100_c.jpg'
        });
        envira_albums_galleries_images['122875'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/06/GREETING-CARDS_SCANDINAVIAN-CHRISTMAS-06-768x960.jpg',
            id: 175141,
            gallery_id: '122875',
            alt: '',
            caption: '',
            title: 'greeting-cards_scandinavian-christmas-06',
            index: 5,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/06/GREETING-CARDS_SCANDINAVIAN-CHRISTMAS-06-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/06/GREETING-CARDS_SCANDINAVIAN-CHRISTMAS-06-150x100_c.jpg'
        });
        envira_albums_galleries_images['122875'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/06/GREETING-CARDS_SCANDINAVIAN-CHRISTMAS-07-768x614.jpg',
            id: 175142,
            gallery_id: '122875',
            alt: '',
            caption: '',
            title: 'greeting-cards_scandinavian-christmas-07',
            index: 6,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/06/GREETING-CARDS_SCANDINAVIAN-CHRISTMAS-07-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/06/GREETING-CARDS_SCANDINAVIAN-CHRISTMAS-07-150x100_c.jpg'
        });
        envira_albums_galleries_images['122875'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/06/GREETING-CARDS_SCANDINAVIAN-CHRISTMAS-08-768x614.jpg',
            id: 175143,
            gallery_id: '122875',
            alt: '',
            caption: '',
            title: 'greeting-cards_scandinavian-christmas-08',
            index: 7,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/06/GREETING-CARDS_SCANDINAVIAN-CHRISTMAS-08-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2016/06/GREETING-CARDS_SCANDINAVIAN-CHRISTMAS-08-150x100_c.jpg'
        });
        $(document).on('click', '.envira-album-gallery-122875', function (e) {
            e.preventDefault();

            envira_albums_galleries['122875'] = $.envirabox.open(envira_albums_galleries_images['122875'], {
                lightboxTheme: 'base_dark',
                margin: 0,
                padding: 0,
                autoCenter: true,
                arrows: true,
                aspectRatio: 0,
                loop: 0,
                mouseWheel: 0,
                preload: 1,
                openEffect: 'fade',
                closeEffect: 'fade',
                nextEffect: 'fade',
                prevEffect: 'fade',
                tpl: {
                    wrap: '<div class="envirabox-wrap" tabIndex="-1"><div class="envirabox-skin envirabox-theme-base_dark"><div class="envirabox-outer"><div class="envirabox-inner"><div class="envirabox-actions base_dark "><div class="envira-close-button"><a title="Close" class="envirabox-item envira-close" href="#"></a></div></div><div class="envirabox-position-overlay envira-gallery-top-left"></div><div class="envirabox-position-overlay envira-gallery-top-right"></div><div class="envirabox-position-overlay envira-gallery-bottom-left"></div><div class="envirabox-position-overlay envira-gallery-bottom-right"></div></div></div></div></div>',
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
                        type: 'fixed',
                        alwaysShow: '1',
                    },
                    slideshow: {
                        skipSingle: true
                    },
                    navDivsRoot: false,
                    actionDivRoot: false,
                },
                beforeLoad: function () {
                    if (typeof envira_albums_galleries_images['122875'][this.index].caption !== 'undefined') {
                        this.title = envira_albums_galleries_images['122875'][this.index].caption;
                    } else {
                        this.title = envira_albums_galleries_images['122875'][this.index].title;
                    }
                },
                afterLoad: function (current, previous) {
                    // $.extend(this, {
                    //     width       : '100%',
                    //     height      : '100%'
                    // });
                },
                beforeShow: function () {

                    $(window).on({
                        'resize.envirabox': function () {
                            $.envirabox.update();
                        }
                    });

                    /* Set alt, data-envira-title, data-envira-caption and data-envira-index attributes on Lightbox image */
                    $('img.envirabox-image').attr('alt', envira_albums_galleries_images['122875'][this.index].alt)
                        .attr('data-envira-gallery-id', '122875')
                        .attr('data-envira-item-id', envira_albums_galleries_images['122875'][this.index].id)
                        .attr('data-envira-title', envira_albums_galleries_images['122875'][this.index].title)
                        .attr('data-envira-caption', envira_albums_galleries_images['122875'][this.index].caption)
                        .attr('data-envira-index', this.index);


                    $('.envirabox-overlay').addClass('overlay-video');

                    var overlay_supersize = true;
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

                    var overlay_supersize = true;
                    if (overlay_supersize) {
                        $('#envirabox-thumbs').addClass('thumbs-supersize');
                    }


                    if ($('#envira-gallery-wrap-56462 div.envira-pagination').length > 0) {
                        var envirabox_page = ( $('#envira-gallery-wrap-56462 div.envira-pagination').data('page') );
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
                },
                onCancel: function () {
                },
                onPlayStart: function () {
                },
                onPlayEnd: function () {
                }
            });

            $('.envirabox-overlay').addClass('overlay-base_dark');

        });

        envira_albums_galleries_images['56297'] = [];

        envira_albums_galleries_images['56297'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/photodune-1717550-sports-car-s1.jpg',
            id: 56298,
            gallery_id: '56297',
            alt: '',
            caption: 'Sports Car',
            title: 'Sports Car',
            index: 0,
            thumbnail: '',
            mobile_thumbnail: ''
        });
        envira_albums_galleries_images['56297'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/photodune-2283278-car-s.jpg',
            id: 56299,
            gallery_id: '56297',
            alt: '',
            caption: 'Car',
            title: 'Car',
            index: 1,
            thumbnail: '',
            mobile_thumbnail: ''
        });
        envira_albums_galleries_images['56297'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/photodune-2646360-luxury-sport-car-s.jpg',
            id: 56300,
            gallery_id: '56297',
            alt: '',
            caption: 'luxury sport car',
            title: 'luxury sport car',
            index: 2,
            thumbnail: '',
            mobile_thumbnail: ''
        });
        envira_albums_galleries_images['56297'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/photodune-4517700-car-s1.jpg',
            id: 56301,
            gallery_id: '56297',
            alt: '',
            caption: 'car',
            title: 'car',
            index: 3,
            thumbnail: '',
            mobile_thumbnail: ''
        });
        envira_albums_galleries_images['56297'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/photodune-4726697-car-s2.jpg',
            id: 56302,
            gallery_id: '56297',
            alt: '',
            caption: 'photodune-4726697-car-s',
            title: 'photodune-4726697-car-s',
            index: 4,
            thumbnail: '',
            mobile_thumbnail: ''
        });
        envira_albums_galleries_images['56297'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/photodune-6088156-car-s1.jpg',
            id: 56303,
            gallery_id: '56297',
            alt: '',
            caption: 'photodune-6088156-car-s',
            title: 'photodune-6088156-car-s',
            index: 5,
            thumbnail: '',
            mobile_thumbnail: ''
        });
        $(document).on('click', '.envira-album-gallery-56297', function (e) {
            e.preventDefault();

            envira_albums_galleries['56297'] = $.envirabox.open(envira_albums_galleries_images['56297'], {
                lightboxTheme: 'base_dark',
                margin: 0,
                padding: 0,
                autoCenter: true,
                arrows: true,
                aspectRatio: 0,
                loop: 0,
                mouseWheel: 0,
                preload: 1,
                openEffect: 'fade',
                closeEffect: 'fade',
                nextEffect: 'fade',
                prevEffect: 'fade',
                tpl: {
                    wrap: '<div class="envirabox-wrap" tabIndex="-1"><div class="envirabox-skin envirabox-theme-base_dark"><div class="envirabox-outer"><div class="envirabox-inner"><div class="envirabox-actions base_dark "><div class="envira-close-button"><a title="Close" class="envirabox-item envira-close" href="#"></a></div></div><div class="envirabox-position-overlay envira-gallery-top-left"></div><div class="envirabox-position-overlay envira-gallery-top-right"></div><div class="envirabox-position-overlay envira-gallery-bottom-left"></div><div class="envirabox-position-overlay envira-gallery-bottom-right"></div></div></div></div></div>',
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
                        type: 'fixed',
                        alwaysShow: '1',
                    },
                    slideshow: {
                        skipSingle: true
                    },
                    navDivsRoot: false,
                    actionDivRoot: false,
                },
                beforeLoad: function () {
                    if (typeof envira_albums_galleries_images['56297'][this.index].caption !== 'undefined') {
                        this.title = envira_albums_galleries_images['56297'][this.index].caption;
                    } else {
                        this.title = envira_albums_galleries_images['56297'][this.index].title;
                    }
                },
                afterLoad: function (current, previous) {
                    // $.extend(this, {
                    //     width       : '100%',
                    //     height      : '100%'
                    // });
                },
                beforeShow: function () {

                    $(window).on({
                        'resize.envirabox': function () {
                            $.envirabox.update();
                        }
                    });

                    /* Set alt, data-envira-title, data-envira-caption and data-envira-index attributes on Lightbox image */
                    $('img.envirabox-image').attr('alt', envira_albums_galleries_images['56297'][this.index].alt)
                        .attr('data-envira-gallery-id', '56297')
                        .attr('data-envira-item-id', envira_albums_galleries_images['56297'][this.index].id)
                        .attr('data-envira-title', envira_albums_galleries_images['56297'][this.index].title)
                        .attr('data-envira-caption', envira_albums_galleries_images['56297'][this.index].caption)
                        .attr('data-envira-index', this.index);


                    $('.envirabox-overlay').addClass('overlay-video');

                    var overlay_supersize = true;
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

                    var overlay_supersize = true;
                    if (overlay_supersize) {
                        $('#envirabox-thumbs').addClass('thumbs-supersize');
                    }


                    if ($('#envira-gallery-wrap-56462 div.envira-pagination').length > 0) {
                        var envirabox_page = ( $('#envira-gallery-wrap-56462 div.envira-pagination').data('page') );
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
                },
                onCancel: function () {
                },
                onPlayStart: function () {
                },
                onPlayEnd: function () {
                }
            });

            $('.envirabox-overlay').addClass('overlay-base_dark');

        });

        envira_albums_galleries_images['56278_3'] = [];

        envira_albums_galleries_images['56278_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/queensboro-bridge.jpg',
            id: 113452,
            gallery_id: '56278_3',
            alt: '',
            caption: 'Queensboro Bridge',
            title: 'Queensboro Bridge',
            index: 0,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/queensboro-bridge-250x150_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/queensboro-bridge-150x100_c.jpg'
        });
        envira_albums_galleries_images['56278_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/sports-car.jpg',
            id: 113451,
            gallery_id: '56278_3',
            alt: '',
            caption: 'Sports Car',
            title: 'Sports Car',
            index: 1,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/sports-car-250x150_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/sports-car-150x100_c.jpg'
        });
        envira_albums_galleries_images['56278_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/restaurant-bar.jpg',
            id: 113450,
            gallery_id: '56278_3',
            alt: '',
            caption: 'Restaurant Set',
            title: 'Restaurant Set',
            index: 2,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/restaurant-bar-250x150_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/restaurant-bar-150x100_c.jpg'
        });
        envira_albums_galleries_images['56278_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/cars.jpg',
            id: 113449,
            gallery_id: '56278_3',
            alt: '',
            caption: 'Cars',
            title: 'Cars',
            index: 3,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/cars-250x150_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/cars-150x100_c.jpg'
        });
        envira_albums_galleries_images['56278_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/overwater-villas.jpg',
            id: 113448,
            gallery_id: '56278_3',
            alt: '',
            caption: 'Overwater villas on the lagoon',
            title: 'Overwater villas on the lagoon',
            index: 4,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/overwater-villas-250x150_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/overwater-villas-150x100_c.jpg'
        });
        envira_albums_galleries_images['56278_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/kitchen-interior.jpg',
            id: 113447,
            gallery_id: '56278_3',
            alt: '',
            caption: 'Beautiful Custom Kitchen Interior in a New House',
            title: 'Beautiful Custom Kitchen Interior in a New House',
            index: 5,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/kitchen-interior-250x150_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/kitchen-interior-150x100_c.jpg'
        });
        envira_albums_galleries_images['56278_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/road-cars.jpg',
            id: 113446,
            gallery_id: '56278_3',
            alt: '',
            caption: 'Road Cars',
            title: 'Road Cars',
            index: 6,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/road-cars-250x150_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/road-cars-150x100_c.jpg'
        });
        $(document).on('click', '.envira-album-gallery-56278_3', function (e) {
            e.preventDefault();

            envira_albums_galleries['56278_3'] = $.envirabox.open(envira_albums_galleries_images['56278_3'], {
                lightboxTheme: 'base_dark',
                margin: 0,
                padding: 0,
                autoCenter: true,
                arrows: true,
                aspectRatio: 0,
                loop: 0,
                mouseWheel: 0,
                preload: 1,
                openEffect: 'fade',
                closeEffect: 'fade',
                nextEffect: 'fade',
                prevEffect: 'fade',
                tpl: {
                    wrap: '<div class="envirabox-wrap" tabIndex="-1"><div class="envirabox-skin envirabox-theme-base_dark"><div class="envirabox-outer"><div class="envirabox-inner"><div class="envirabox-actions base_dark "><div class="envira-close-button"><a title="Close" class="envirabox-item envira-close" href="#"></a></div></div><div class="envirabox-position-overlay envira-gallery-top-left"></div><div class="envirabox-position-overlay envira-gallery-top-right"></div><div class="envirabox-position-overlay envira-gallery-bottom-left"></div><div class="envirabox-position-overlay envira-gallery-bottom-right"></div></div></div></div></div>',
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
                        type: 'fixed',
                        alwaysShow: '1',
                    },
                    slideshow: {
                        skipSingle: true
                    },
                    navDivsRoot: false,
                    actionDivRoot: false,
                },
                beforeLoad: function () {
                    if (typeof envira_albums_galleries_images['56278_3'][this.index].caption !== 'undefined') {
                        this.title = envira_albums_galleries_images['56278_3'][this.index].caption;
                    } else {
                        this.title = envira_albums_galleries_images['56278_3'][this.index].title;
                    }
                },
                afterLoad: function (current, previous) {
                    // $.extend(this, {
                    //     width       : '100%',
                    //     height      : '100%'
                    // });
                },
                beforeShow: function () {

                    $(window).on({
                        'resize.envirabox': function () {
                            $.envirabox.update();
                        }
                    });

                    /* Set alt, data-envira-title, data-envira-caption and data-envira-index attributes on Lightbox image */
                    $('img.envirabox-image').attr('alt', envira_albums_galleries_images['56278_3'][this.index].alt)
                        .attr('data-envira-gallery-id', '56278_3')
                        .attr('data-envira-item-id', envira_albums_galleries_images['56278_3'][this.index].id)
                        .attr('data-envira-title', envira_albums_galleries_images['56278_3'][this.index].title)
                        .attr('data-envira-caption', envira_albums_galleries_images['56278_3'][this.index].caption)
                        .attr('data-envira-index', this.index);


                    $('.envirabox-overlay').addClass('overlay-video');

                    var overlay_supersize = true;
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

                    var overlay_supersize = true;
                    if (overlay_supersize) {
                        $('#envirabox-thumbs').addClass('thumbs-supersize');
                    }


                    if ($('#envira-gallery-wrap-56462 div.envira-pagination').length > 0) {
                        var envirabox_page = ( $('#envira-gallery-wrap-56462 div.envira-pagination').data('page') );
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
                },
                onCancel: function () {
                },
                onPlayStart: function () {
                },
                onPlayEnd: function () {
                }
            });

            $('.envirabox-overlay').addClass('overlay-base_dark');

        });

        envira_albums_galleries_images['56252_3'] = [];

        envira_albums_galleries_images['56252_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/sunrise-water.jpg',
            id: 113656,
            gallery_id: '56252_3',
            alt: '',
            caption: 'Sunrise',
            title: 'Sunrise',
            index: 0,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/sunrise-water-150x100_c.jpg',
            mobile_thumbnail: ''
        });
        envira_albums_galleries_images['56252_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/queensboro-bridge-2.jpg',
            id: 113657,
            gallery_id: '56252_3',
            alt: '',
            caption: 'Queensboro Bridge',
            title: 'Queensboro Bridge',
            index: 1,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/queensboro-bridge-2-150x100_c.jpg',
            mobile_thumbnail: ''
        });
        envira_albums_galleries_images['56252_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/lush-green.jpg',
            id: 113658,
            gallery_id: '56252_3',
            alt: '',
            caption: 'Green',
            title: 'Green',
            index: 2,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/lush-green-150x100_c.jpg',
            mobile_thumbnail: ''
        });
        envira_albums_galleries_images['56252_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/wooden-surface-2.jpg',
            id: 113659,
            gallery_id: '56252_3',
            alt: '',
            caption: 'Wooden Surface',
            title: 'Wooden Surface',
            index: 3,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/wooden-surface-2-150x100_c.jpg',
            mobile_thumbnail: ''
        });
        envira_albums_galleries_images['56252_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/sunrise-rocks.jpg',
            id: 113660,
            gallery_id: '56252_3',
            alt: '',
            caption: 'Sunrise and Rocks',
            title: 'Sunrise and Rocks',
            index: 4,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/sunrise-rocks-150x100_c.jpg',
            mobile_thumbnail: ''
        });
        envira_albums_galleries_images['56252_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/ashville-road.jpg',
            id: 113661,
            gallery_id: '56252_3',
            alt: '',
            caption: 'Asheville',
            title: 'Asheville',
            index: 5,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/ashville-road-150x100_c.jpg',
            mobile_thumbnail: ''
        });
        envira_albums_galleries_images['56252_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/queensboro-bridge-more.jpg',
            id: 113662,
            gallery_id: '56252_3',
            alt: '',
            caption: 'Queensboro Bridge',
            title: 'Queensboro Bridge',
            index: 6,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/queensboro-bridge-more-150x100_c.jpg',
            mobile_thumbnail: ''
        });
        envira_albums_galleries_images['56252_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/bar-set-more.jpg',
            id: 113663,
            gallery_id: '56252_3',
            alt: '',
            caption: 'Restaurant Bar',
            title: 'Restaurant Bar',
            index: 7,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/bar-set-more-150x100_c.jpg',
            mobile_thumbnail: ''
        });
        $(document).on('click', '.envira-album-gallery-56252_3', function (e) {
            e.preventDefault();

            envira_albums_galleries['56252_3'] = $.envirabox.open(envira_albums_galleries_images['56252_3'], {
                lightboxTheme: 'base_dark',
                margin: 0,
                padding: 0,
                autoCenter: true,
                arrows: true,
                aspectRatio: 0,
                loop: 0,
                mouseWheel: 0,
                preload: 1,
                openEffect: 'fade',
                closeEffect: 'fade',
                nextEffect: 'fade',
                prevEffect: 'fade',
                tpl: {
                    wrap: '<div class="envirabox-wrap" tabIndex="-1"><div class="envirabox-skin envirabox-theme-base_dark"><div class="envirabox-outer"><div class="envirabox-inner"><div class="envirabox-actions base_dark "><div class="envira-close-button"><a title="Close" class="envirabox-item envira-close" href="#"></a></div></div><div class="envirabox-position-overlay envira-gallery-top-left"></div><div class="envirabox-position-overlay envira-gallery-top-right"></div><div class="envirabox-position-overlay envira-gallery-bottom-left"></div><div class="envirabox-position-overlay envira-gallery-bottom-right"></div></div></div></div></div>',
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
                        type: 'fixed',
                        alwaysShow: '1',
                    },
                    slideshow: {
                        skipSingle: true
                    },
                    navDivsRoot: false,
                    actionDivRoot: false,
                },
                beforeLoad: function () {
                    if (typeof envira_albums_galleries_images['56252_3'][this.index].caption !== 'undefined') {
                        this.title = envira_albums_galleries_images['56252_3'][this.index].caption;
                    } else {
                        this.title = envira_albums_galleries_images['56252_3'][this.index].title;
                    }
                },
                afterLoad: function (current, previous) {
                    // $.extend(this, {
                    //     width       : '100%',
                    //     height      : '100%'
                    // });
                },
                beforeShow: function () {

                    $(window).on({
                        'resize.envirabox': function () {
                            $.envirabox.update();
                        }
                    });

                    /* Set alt, data-envira-title, data-envira-caption and data-envira-index attributes on Lightbox image */
                    $('img.envirabox-image').attr('alt', envira_albums_galleries_images['56252_3'][this.index].alt)
                        .attr('data-envira-gallery-id', '56252_3')
                        .attr('data-envira-item-id', envira_albums_galleries_images['56252_3'][this.index].id)
                        .attr('data-envira-title', envira_albums_galleries_images['56252_3'][this.index].title)
                        .attr('data-envira-caption', envira_albums_galleries_images['56252_3'][this.index].caption)
                        .attr('data-envira-index', this.index);


                    $('.envirabox-overlay').addClass('overlay-video');

                    var overlay_supersize = true;
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

                    var overlay_supersize = true;
                    if (overlay_supersize) {
                        $('#envirabox-thumbs').addClass('thumbs-supersize');
                    }


                    if ($('#envira-gallery-wrap-56462 div.envira-pagination').length > 0) {
                        var envirabox_page = ( $('#envira-gallery-wrap-56462 div.envira-pagination').data('page') );
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
                },
                onCancel: function () {
                },
                onPlayStart: function () {
                },
                onPlayEnd: function () {
                }
            });

            $('.envirabox-overlay').addClass('overlay-base_dark');

        });

        envira_albums_galleries_images['56378_3'] = [];

        envira_albums_galleries_images['56378_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/cookies-1.jpg',
            id: 113434,
            gallery_id: '56378_3',
            alt: '',
            caption: '',
            title: 'cookies',
            index: 0,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/cookies-1-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/cookies-1-150x100_c.jpg'
        });
        envira_albums_galleries_images['56378_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/croissant-1.jpg',
            id: 113433,
            gallery_id: '56378_3',
            alt: '',
            caption: '',
            title: 'croissant',
            index: 1,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/croissant-1-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/croissant-1-150x100_c.jpg'
        });
        envira_albums_galleries_images['56378_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/cupcakes-1.jpg',
            id: 113432,
            gallery_id: '56378_3',
            alt: '',
            caption: '',
            title: 'cupcakes',
            index: 2,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/cupcakes-1-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/cupcakes-1-150x100_c.jpg'
        });
        envira_albums_galleries_images['56378_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/cherries-1.jpg',
            id: 113423,
            gallery_id: '56378_3',
            alt: '',
            caption: '',
            title: 'cherries',
            index: 3,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/cherries-1-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/cherries-1-150x100_c.jpg'
        });
        envira_albums_galleries_images['56378_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/burgers-1.jpg',
            id: 113424,
            gallery_id: '56378_3',
            alt: '',
            caption: '',
            title: 'burgers',
            index: 4,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/burgers-1-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/burgers-1-150x100_c.jpg'
        });
        envira_albums_galleries_images['56378_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/almonds.jpg',
            id: 113425,
            gallery_id: '56378_3',
            alt: '',
            caption: '',
            title: 'almonds',
            index: 5,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/almonds-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/almonds-150x100_c.jpg'
        });
        envira_albums_galleries_images['56378_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/steak-1.jpg',
            id: 113426,
            gallery_id: '56378_3',
            alt: '',
            caption: '',
            title: 'steak',
            index: 6,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/steak-1-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/steak-1-150x100_c.jpg'
        });
        envira_albums_galleries_images['56378_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/more-cupcakes.jpg',
            id: 113427,
            gallery_id: '56378_3',
            alt: '',
            caption: '',
            title: 'more-cupcakes',
            index: 7,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/more-cupcakes-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/more-cupcakes-150x100_c.jpg'
        });
        envira_albums_galleries_images['56378_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/ice-cream.jpg',
            id: 113428,
            gallery_id: '56378_3',
            alt: '',
            caption: '',
            title: 'ice-cream',
            index: 8,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/ice-cream-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/ice-cream-150x100_c.jpg'
        });
        envira_albums_galleries_images['56378_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/colored-cookies.jpg',
            id: 113429,
            gallery_id: '56378_3',
            alt: '',
            caption: '',
            title: 'colored-cookies',
            index: 9,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/colored-cookies-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/colored-cookies-150x100_c.jpg'
        });
        envira_albums_galleries_images['56378_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/green-beans.jpg',
            id: 113430,
            gallery_id: '56378_3',
            alt: '',
            caption: '',
            title: 'green-beans',
            index: 10,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/green-beans-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/green-beans-150x100_c.jpg'
        });
        envira_albums_galleries_images['56378_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/dessert-stand.jpg',
            id: 113431,
            gallery_id: '56378_3',
            alt: '',
            caption: '',
            title: 'dessert-stand',
            index: 11,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/dessert-stand-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/dessert-stand-150x100_c.jpg'
        });
        $(document).on('click', '.envira-album-gallery-56378_3', function (e) {
            e.preventDefault();

            envira_albums_galleries['56378_3'] = $.envirabox.open(envira_albums_galleries_images['56378_3'], {
                lightboxTheme: 'base_dark',
                margin: 0,
                padding: 0,
                autoCenter: true,
                arrows: true,
                aspectRatio: 0,
                loop: 0,
                mouseWheel: 0,
                preload: 1,
                openEffect: 'fade',
                closeEffect: 'fade',
                nextEffect: 'fade',
                prevEffect: 'fade',
                tpl: {
                    wrap: '<div class="envirabox-wrap" tabIndex="-1"><div class="envirabox-skin envirabox-theme-base_dark"><div class="envirabox-outer"><div class="envirabox-inner"><div class="envirabox-actions base_dark "><div class="envira-close-button"><a title="Close" class="envirabox-item envira-close" href="#"></a></div></div><div class="envirabox-position-overlay envira-gallery-top-left"></div><div class="envirabox-position-overlay envira-gallery-top-right"></div><div class="envirabox-position-overlay envira-gallery-bottom-left"></div><div class="envirabox-position-overlay envira-gallery-bottom-right"></div></div></div></div></div>',
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
                        type: 'fixed',
                        alwaysShow: '1',
                    },
                    slideshow: {
                        skipSingle: true
                    },
                    navDivsRoot: false,
                    actionDivRoot: false,
                },
                beforeLoad: function () {
                    if (typeof envira_albums_galleries_images['56378_3'][this.index].caption !== 'undefined') {
                        this.title = envira_albums_galleries_images['56378_3'][this.index].caption;
                    } else {
                        this.title = envira_albums_galleries_images['56378_3'][this.index].title;
                    }
                },
                afterLoad: function (current, previous) {
                    // $.extend(this, {
                    //     width       : '100%',
                    //     height      : '100%'
                    // });
                },
                beforeShow: function () {

                    $(window).on({
                        'resize.envirabox': function () {
                            $.envirabox.update();
                        }
                    });

                    /* Set alt, data-envira-title, data-envira-caption and data-envira-index attributes on Lightbox image */
                    $('img.envirabox-image').attr('alt', envira_albums_galleries_images['56378_3'][this.index].alt)
                        .attr('data-envira-gallery-id', '56378_3')
                        .attr('data-envira-item-id', envira_albums_galleries_images['56378_3'][this.index].id)
                        .attr('data-envira-title', envira_albums_galleries_images['56378_3'][this.index].title)
                        .attr('data-envira-caption', envira_albums_galleries_images['56378_3'][this.index].caption)
                        .attr('data-envira-index', this.index);


                    $('.envirabox-overlay').addClass('overlay-video');

                    var overlay_supersize = true;
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

                    var overlay_supersize = true;
                    if (overlay_supersize) {
                        $('#envirabox-thumbs').addClass('thumbs-supersize');
                    }


                    if ($('#envira-gallery-wrap-56462 div.envira-pagination').length > 0) {
                        var envirabox_page = ( $('#envira-gallery-wrap-56462 div.envira-pagination').data('page') );
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
                },
                onCancel: function () {
                },
                onPlayStart: function () {
                },
                onPlayEnd: function () {
                }
            });

            $('.envirabox-overlay').addClass('overlay-base_dark');

        });

        envira_albums_galleries_images['56262_3'] = [];

        envira_albums_galleries_images['56262_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/wooden-surface-1.jpg',
            id: 113649,
            gallery_id: '56262_3',
            alt: '',
            caption: '',
            title: 'wooden-surface',
            index: 0,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/wooden-surface-1-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/wooden-surface-1-150x100_c.jpg'
        });
        envira_albums_galleries_images['56262_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/interior-kitchen.jpg',
            id: 113650,
            gallery_id: '56262_3',
            alt: '',
            caption: '',
            title: 'interior-kitchen',
            index: 1,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/interior-kitchen-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/interior-kitchen-150x100_c.jpg'
        });
        envira_albums_galleries_images['56262_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/more-interior-kitchen.jpg',
            id: 113651,
            gallery_id: '56262_3',
            alt: '',
            caption: '',
            title: 'more-interior-kitchen',
            index: 2,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/more-interior-kitchen-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/more-interior-kitchen-150x100_c.jpg'
        });
        envira_albums_galleries_images['56262_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/villas-water.jpg',
            id: 113652,
            gallery_id: '56262_3',
            alt: '',
            caption: '',
            title: 'villas-water',
            index: 3,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/villas-water-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/villas-water-150x100_c.jpg'
        });
        envira_albums_galleries_images['56262_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/bar-set.jpg',
            id: 113653,
            gallery_id: '56262_3',
            alt: '',
            caption: '',
            title: 'bar-set',
            index: 4,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/bar-set-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/bar-set-150x100_c.jpg'
        });
        envira_albums_galleries_images['56262_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/queensboro.jpg',
            id: 113654,
            gallery_id: '56262_3',
            alt: '',
            caption: '',
            title: 'queensboro',
            index: 5,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/queensboro-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/queensboro-150x100_c.jpg'
        });
        $(document).on('click', '.envira-album-gallery-56262_3', function (e) {
            e.preventDefault();

            envira_albums_galleries['56262_3'] = $.envirabox.open(envira_albums_galleries_images['56262_3'], {
                lightboxTheme: 'base_dark',
                margin: 0,
                padding: 0,
                autoCenter: true,
                arrows: true,
                aspectRatio: 0,
                loop: 0,
                mouseWheel: 0,
                preload: 1,
                openEffect: 'fade',
                closeEffect: 'fade',
                nextEffect: 'fade',
                prevEffect: 'fade',
                tpl: {
                    wrap: '<div class="envirabox-wrap" tabIndex="-1"><div class="envirabox-skin envirabox-theme-base_dark"><div class="envirabox-outer"><div class="envirabox-inner"><div class="envirabox-actions base_dark "><div class="envira-close-button"><a title="Close" class="envirabox-item envira-close" href="#"></a></div></div><div class="envirabox-position-overlay envira-gallery-top-left"></div><div class="envirabox-position-overlay envira-gallery-top-right"></div><div class="envirabox-position-overlay envira-gallery-bottom-left"></div><div class="envirabox-position-overlay envira-gallery-bottom-right"></div></div></div></div></div>',
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
                        type: 'fixed',
                        alwaysShow: '1',
                    },
                    slideshow: {
                        skipSingle: true
                    },
                    navDivsRoot: false,
                    actionDivRoot: false,
                },
                beforeLoad: function () {
                    if (typeof envira_albums_galleries_images['56262_3'][this.index].caption !== 'undefined') {
                        this.title = envira_albums_galleries_images['56262_3'][this.index].caption;
                    } else {
                        this.title = envira_albums_galleries_images['56262_3'][this.index].title;
                    }
                },
                afterLoad: function (current, previous) {
                    // $.extend(this, {
                    //     width       : '100%',
                    //     height      : '100%'
                    // });
                },
                beforeShow: function () {

                    $(window).on({
                        'resize.envirabox': function () {
                            $.envirabox.update();
                        }
                    });

                    /* Set alt, data-envira-title, data-envira-caption and data-envira-index attributes on Lightbox image */
                    $('img.envirabox-image').attr('alt', envira_albums_galleries_images['56262_3'][this.index].alt)
                        .attr('data-envira-gallery-id', '56262_3')
                        .attr('data-envira-item-id', envira_albums_galleries_images['56262_3'][this.index].id)
                        .attr('data-envira-title', envira_albums_galleries_images['56262_3'][this.index].title)
                        .attr('data-envira-caption', envira_albums_galleries_images['56262_3'][this.index].caption)
                        .attr('data-envira-index', this.index);


                    $('.envirabox-overlay').addClass('overlay-video');

                    var overlay_supersize = true;
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

                    var overlay_supersize = true;
                    if (overlay_supersize) {
                        $('#envirabox-thumbs').addClass('thumbs-supersize');
                    }


                    if ($('#envira-gallery-wrap-56462 div.envira-pagination').length > 0) {
                        var envirabox_page = ( $('#envira-gallery-wrap-56462 div.envira-pagination').data('page') );
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
                },
                onCancel: function () {
                },
                onPlayStart: function () {
                },
                onPlayEnd: function () {
                }
            });

            $('.envirabox-overlay').addClass('overlay-base_dark');

        });

        envira_albums_galleries_images['56088_3'] = [];

        envira_albums_galleries_images['56088_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/stars-1.jpg',
            id: 113443,
            gallery_id: '56088_3',
            alt: '',
            caption: '',
            title: 'stars',
            index: 0,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/stars-1-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/stars-1-150x100_c.jpg'
        });
        envira_albums_galleries_images['56088_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/galaxy-view.jpg',
            id: 113435,
            gallery_id: '56088_3',
            alt: '',
            caption: '',
            title: 'galaxy-view',
            index: 1,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/galaxy-view-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/galaxy-view-150x100_c.jpg'
        });
        envira_albums_galleries_images['56088_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/night.jpg',
            id: 113436,
            gallery_id: '56088_3',
            alt: '',
            caption: '',
            title: 'night',
            index: 2,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/night-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/night-150x100_c.jpg'
        });
        envira_albums_galleries_images['56088_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/beautiful-stars.jpg',
            id: 113437,
            gallery_id: '56088_3',
            alt: '',
            caption: '',
            title: 'beautiful-stars',
            index: 3,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/beautiful-stars-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/beautiful-stars-150x100_c.jpg'
        });
        envira_albums_galleries_images['56088_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/sky-view.jpg',
            id: 113438,
            gallery_id: '56088_3',
            alt: '',
            caption: '',
            title: 'sky-view',
            index: 4,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/sky-view-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/sky-view-150x100_c.jpg'
        });
        envira_albums_galleries_images['56088_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/milkyway.jpg',
            id: 113439,
            gallery_id: '56088_3',
            alt: '',
            caption: '',
            title: 'milkyway',
            index: 5,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/milkyway-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/milkyway-150x100_c.jpg'
        });
        envira_albums_galleries_images['56088_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/red-stars.jpg',
            id: 113440,
            gallery_id: '56088_3',
            alt: '',
            caption: '',
            title: 'red-stars',
            index: 6,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/red-stars-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/red-stars-150x100_c.jpg'
        });
        envira_albums_galleries_images['56088_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/shooting-star.jpg',
            id: 113441,
            gallery_id: '56088_3',
            alt: '',
            caption: '',
            title: 'shooting-star',
            index: 7,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/shooting-star-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/shooting-star-150x100_c.jpg'
        });
        envira_albums_galleries_images['56088_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/nightstarts.jpg',
            id: 113442,
            gallery_id: '56088_3',
            alt: '',
            caption: '',
            title: 'nightstarts',
            index: 8,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/nightstarts-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/nightstarts-150x100_c.jpg'
        });
        envira_albums_galleries_images['56088_3'].push({
            href: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/desert-stars.jpg',
            id: 113444,
            gallery_id: '56088_3',
            alt: '',
            caption: '',
            title: 'desert-stars',
            index: 9,
            thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/desert-stars-150x100_c.jpg',
            mobile_thumbnail: 'http://7818-presscdn-0-76.pagely.netdna-cdn.com/wp-content/uploads/2015/10/desert-stars-150x100_c.jpg'
        });
        $(document).on('click', '.envira-album-gallery-56088_3', function (e) {
            e.preventDefault();

            envira_albums_galleries['56088_3'] = $.envirabox.open(envira_albums_galleries_images['56088_3'], {
                lightboxTheme: 'base_dark',
                margin: 0,
                padding: 0,
                autoCenter: true,
                arrows: true,
                aspectRatio: 0,
                loop: 0,
                mouseWheel: 0,
                preload: 1,
                openEffect: 'fade',
                closeEffect: 'fade',
                nextEffect: 'fade',
                prevEffect: 'fade',
                tpl: {
                    wrap: '<div class="envirabox-wrap" tabIndex="-1"><div class="envirabox-skin envirabox-theme-base_dark"><div class="envirabox-outer"><div class="envirabox-inner"><div class="envirabox-actions base_dark "><div class="envira-close-button"><a title="Close" class="envirabox-item envira-close" href="#"></a></div></div><div class="envirabox-position-overlay envira-gallery-top-left"></div><div class="envirabox-position-overlay envira-gallery-top-right"></div><div class="envirabox-position-overlay envira-gallery-bottom-left"></div><div class="envirabox-position-overlay envira-gallery-bottom-right"></div></div></div></div></div>',
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
                        type: 'fixed',
                        alwaysShow: '1',
                    },
                    slideshow: {
                        skipSingle: true
                    },
                    navDivsRoot: false,
                    actionDivRoot: false,
                },
                beforeLoad: function () {
                    if (typeof envira_albums_galleries_images['56088_3'][this.index].caption !== 'undefined') {
                        this.title = envira_albums_galleries_images['56088_3'][this.index].caption;
                    } else {
                        this.title = envira_albums_galleries_images['56088_3'][this.index].title;
                    }
                },
                afterLoad: function (current, previous) {
                    // $.extend(this, {
                    //     width       : '100%',
                    //     height      : '100%'
                    // });
                },
                beforeShow: function () {

                    $(window).on({
                        'resize.envirabox': function () {
                            $.envirabox.update();
                        }
                    });

                    /* Set alt, data-envira-title, data-envira-caption and data-envira-index attributes on Lightbox image */
                    $('img.envirabox-image').attr('alt', envira_albums_galleries_images['56088_3'][this.index].alt)
                        .attr('data-envira-gallery-id', '56088_3')
                        .attr('data-envira-item-id', envira_albums_galleries_images['56088_3'][this.index].id)
                        .attr('data-envira-title', envira_albums_galleries_images['56088_3'][this.index].title)
                        .attr('data-envira-caption', envira_albums_galleries_images['56088_3'][this.index].caption)
                        .attr('data-envira-index', this.index);


                    $('.envirabox-overlay').addClass('overlay-video');

                    var overlay_supersize = true;
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

                    var overlay_supersize = true;
                    if (overlay_supersize) {
                        $('#envirabox-thumbs').addClass('thumbs-supersize');
                    }


                    if ($('#envira-gallery-wrap-56462 div.envira-pagination').length > 0) {
                        var envirabox_page = ( $('#envira-gallery-wrap-56462 div.envira-pagination').data('page') );
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
                },
                onCancel: function () {
                },
                onPlayStart: function () {
                },
                onPlayEnd: function () {
                }
            });

            $('.envirabox-overlay').addClass('overlay-base_dark');

        });

    });

</script>
