<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $wpdb;
$gallery_wp_nonce = wp_create_nonce('huge_it_gallery_nonce');
$photo_gallery_wp_nonce_add_album = wp_create_nonce('photo_gallery_wp_nonce_add_album');
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = intval($_GET['id']);
}

if (isset($_GET["addslide"])) {
    if ($_GET["addslide"] == 1) {
        header('Location: admin.php?page=photo_gallery_wp_gallery&id=' . $row->id . '&task=apply');
    }
}
?>

<div id="ph-gallery-wp-gallery-image-zoom">
    <img src=""/>
</div>
<div class="wrap">
    <?php $path_site = plugins_url("../images", __FILE__); ?>
    <div style="clear: both;"></div>
    <form action="admin.php?page=photo_gallery_wp_albums&id=<?php echo $album_row->id; ?>&task=save" method="post"
          name="adminForm" id="adminForm">
        <input type="hidden" class="changedvalues" value="" name="changedvalues" size="80">
        <div id="poststuff">
            <div id="gallery-header">
                <ul id="ph-gallery-wp-gallerys-list">
                    <?php
                    foreach ($rowsld as $rowsldires) {
                        if ($rowsldires->id != $album_row->id) {
                            ?>
                            <li>
                                <a href="#"
                                   onclick="window.location.href='admin.php?page=photo_gallery_wp_albums&task=edit_cat&id=<?php echo $rowsldires->id; ?>&huge_it_gallery_nonce=<?php echo $gallery_wp_nonce; ?>'"><?php echo $rowsldires->name; ?></a>
                            </li>
                            <?php
                        } else { ?>
                            <li class="active"
                                onclick="this.firstElementChild.style.width = ((this.firstElementChild.value.length + 1) * 8) + 'px';"
                                style="background-image:url(<?php echo PHOTO_GALLERY_WP_IMAGES_URL . '/admin_images/edit.png'; ?>);cursor: pointer;">
                                <input class="text_area" onkeyup="name_changeTop(this)"
                                       onfocus="this.style.width = ((this.value.length + 1) * 8) + 'px'" type="text"
                                       name="name" id="name" maxlength="250"
                                       value="<?php echo esc_html(stripslashes($album_row->name)); ?>"/>
                            </li>
                            <?php
                        }
                    }
                    ?>
                    <li class="add-new">
                        <a onclick="window.location.href='admin.php?page=photo_gallery_wp_albums&amp;task=add_new_album&photo_gallery_wp_nonce_add_album=<?php echo $photo_gallery_wp_nonce_add_album; ?>'">+</a>
                    </li>
                </ul>
            </div>
            <div id="post-body" class="metabox-holder columns-2">
                <!-- Content -->
                <div id="post-body-content">
                    <?php add_thickbox(); ?>
                    <div id="post-body">


                        <?php
                        if (count($all_galleries)) { ?>
                            <div style="margin-bottom: 10px;">
                                <h4><?php echo __('Add galleries to this album', 'gallery-images'); ?></h4>
                                <ul>
                                    <?php
                                    foreach ($all_galleries as $val) {
                                        ?>

                                        <li>
                                            <label for="unplugged-<?= $val->id ?>"><input
                                                        id="unplugged-<?= $val->id ?>"
                                                        type="checkbox"
                                                        name="unplugged[]"
                                                        value="<?= $val->id ?>"><?= $val->name ?>
                                            </label>
                                        </li>

                                        <?php
                                    }
                                    ?>
                                </ul>
                                <input type="button" onclick="galleryImgSubmitButton('apply')"
                                       value="Add selected galleries" disabled
                                       id="add_galleries_button" class="button button-primary button-large">
                            </div>
                        <?php } ?>


                        <ul id="ph-gallery-wp-images-list">
                            <li><h3> <?php echo __('Added galleries', 'gallery-images'); ?> </h3></li>
                            <?php
                            $i = 2;

                            foreach ($row_galleries as $key => $val) {
                                $album_nonce_remove_gallery = wp_create_nonce('album_nonce_remove_gallery' . $val->id); ?>

                                <li <?php if ($i % 2 == 0) {
                                    echo "class='has-background'";
                                }
                                $i++; ?>>
                                    <input class="order_by" type="hidden"
                                           name="order_by_<?php echo $val->id; ?>"
                                           value="<?php echo $val->ordering; ?>"/>
                                    <div class="ph-gallery-wp-image-container">
                                        <div class="ph-gallery-wp-list-img-wrapper">
                                            <img src="<?php echo $val->img_url; ?>"/>
                                        </div>
                                        <div>

                                            <span class="wp-media-buttons-icon"></span>
                                        </div>
                                    </div>
                                    <div class="ph-gallery-wp-image-options">
                                        <div>
                                            <h3>
                                                <a href="?page=photo_gallery_wp_gallery&task=edit_cat&id=<?= $val->id ?>"><?= $val->name ?></a>
                                            </h3>
                                        </div>
                                        <div class="description-block">
                                            <?= $val->description; ?>
                                        </div>

                                        <div class="remove-ph-gallery-wp-image-container">
                                            <a
                                                    href="?page=photo_gallery_wp_albums&task=delete_gallery&gallery_id=<?= $val->id ?>&id=<?= $album_row->id ?>"
                                                    id="remove_image<?php echo $val->id; ?>"
                                                    class="button remove-image"
                                                    data-image-id="<?php echo $val->id; ?>"
                                                    data-gallery-id="<?php echo $album_row->id; ?>"
                                                    data-nonce-value="<?php echo $album_nonce_remove_gallery; ?>">
                                                <?= __('Remove Gallery from album', 'gallery-images') ?></a>
                                        </div>
                                    </div>

                                    <div class="clear"></div>
                                </li>


                            <?php } ?>


                        </ul>
                    </div>

                </div>

                <!-- SIDEBAR -->
                <div id="postbox-container-1" class="postbox-container">
                    <div id="side-sortables" class="meta-box-sortables ui-sortable">
                        <div id="gallery-unique-options" class="postbox">
                            <h3 class="hndle">
                                <span><?php echo __('Album Custom Options', 'photo-gallery-wp'); ?></span>
                            </h3>
                            <ul id="ph-gallery-wp-unique-options-list">
                                <?php //ns code start ?>
                                <li>
                                    <label
                                            for="huge_it_gallery_album_name"><?php echo __('Album name', 'photo-gallery-wp'); ?></label>
                                    <input type="text" name="album_name" id="huge_it_gallery_album_name"
                                           value="<?php echo esc_html(stripslashes($album_row->name)); ?>"
                                           onkeyup="name_changeRight(this)">
                                </li>
                                <li style="display:flex;">
                                    <label
                                            for="huge_it_gallery_album_description"><?php echo __('Album description', 'photo-gallery-wp'); ?></label>
                                    <textarea type="text" name="album_description"
                                              id="huge_it_gallery_album_description"
                                              onkeyup="name_changeRight(this)"><?= esc_html(stripslashes($album_row->description)) ?></textarea>

                                </li>

                                <div id="major-publishing-actions" style="background-color: #ffffff;">
                                    <div id="publishing-action">
                                        <input type="button" onclick="galleryImgSubmitButton('apply')"
                                               value="Save Album"
                                               id="save-buttom" class="button button-primary button-large">
                                    </div>
                                    <div class="clear"></div>
                                </div>
                        </div>


                        <div class="postbox">
                            <h3 class="hndle"><span><?php echo __('Categories', 'portfolio-gallery'); ?></span>
                            </h3>
                            <div class="inside ">
                                <ul class="album_cat_list">
                                    <?php
                                    $cat_array = array();
                                    if (isset($album_row->category) && $album_row->category != "") {
                                        $cat_array = explode(",", $album_row->category);
                                    }
                                    if (!empty($categories)) {
                                        foreach ($categories as $key => $value) {
                                            $checked = (in_array($value->id, $album_row->category_arr)) ? "checked" : "";
                                            ?>
                                            <li>
                                                <input type="checkbox" name="categories[]"
                                                       value="<?= ++$key ?>" <?= $checked ?>>
                                                <input class="del_val" name="cat_names[]"
                                                       value="<?php echo esc_attr(str_replace("_", " ", $value->name)); ?>"
                                                >
                                                <span class="delete_cat"><img
                                                            src="<?php echo PHOTO_GALLERY_WP_IMAGES_URL . "/admin_images/remove.jpg"; ?>"
                                                            width="9" height="9" value="a"></span>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                                <hr>
                                <p><?= __("Add new category", "photo-gallery-wp") ?></p>
                                <input type="text" id="new_cat" name="new_category">
                                <a href="#"
                                   id="add_new_cat">+ <?= __("Add", "photo-gallery-wp") ?></a>
                            </div>
                        </div>


                        <div id="ph-gallery-wp-shortcode-box" class="postbox shortcode ms-toggle">
                            <h3 class="hndle"><span><?php echo __('Usage', 'photo-gallery-wp'); ?></span></h3>
                            <div class="inside">
                                <ul>
                                    <li rel="tab-1" class="selected">
                                        <h4><?php echo __('Shortcode', 'photo-gallery-wp'); ?></h4>
                                        <p><?php echo __('Copy &amp; paste the shortcode directly into any WordPress post or page.', 'photo-gallery-wp'); ?></p>
                                        <textarea class="full"
                                                  readonly="readonly"><?= "[photo_gallery_album_wp id=" . $album_row->id . "]" ?></textarea>
                                    </li>
                                    <li rel="tab-2">
                                        <h4><?php echo __('Template Include', 'photo-gallery-wp'); ?></h4>
                                        <p><?php echo __('Copy &amp; paste this code into a template file to include the slideshow within your theme.', 'photo-gallery-wp'); ?></p>
                                        <textarea class="full"
                                                  readonly="readonly"><?= '<?php echo do_shortcode("[photo_gallery_album_wp id=' . $album_row->id . ']") ?>' ?></textarea>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php wp_nonce_field('huge_it_gallery_nonce_save_galery', 'huge_it_gallery_nonce_save_galery') ?>
        <input type="hidden" name="task" value=""/>
    </form>
</div>
<?php
require_once(PHOTO_GALLERY_WP_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'gallery-img-admin-video-add-html.php');
?>

<script type="text/javascript">

    jQuery(document).ready(function ($) {
        $("#get_count").click(function (e) {
            e.preventDefault();
            var cat_cnt = $("input[name='categories[]']").length;
        });
        $("#add_new_cat").click(function (e) {
            e.preventDefault();
            var new_cat = $("#new_cat").val();
            if (new_cat.length == 0) {
                $("#new_cat").css("border", "1px solid red");
                setTimeout(function () {
                    $("#new_cat").css("border", "1px solid #ddd");
                }, 3000);
                return;
            }

            var cat_id = $("input[name='categories[]']").length + 1;


            $(".album_cat_list").append("<li><input type='checkbox' name='categories[]' value=" + cat_id + " checked><input style='margin-left:5px;' class='del_val' name='cat_names[]' value='" + new_cat + "'>" +
                "<span class='delete_cat'><img src='<?php echo PHOTO_GALLERY_WP_IMAGES_URL . '/admin_images/remove.jpg'; ?>' width='9' height='9' value='a'></span></li>");
            $("#new_cat").val("");
        });

        $(".delete_cat").click(function () {
            $(this).parent().remove();
        })

        $("input[name='unplugged[]']").change(function () {
            var active_checkboxes = $("input[name='unplugged[]']:checked").length;
            if (active_checkboxes > 0) {
                $("#add_galleries_button").removeAttr("disabled");
            }
            else {
                $("#add_galleries_button").attr("disabled", true);
            }
        });


    });

</script>
