<div id="photo-gallery-wp-shortcode-popup-2" style="display:none; position: relative">
    <h3 style="margin-left: 5%"><?php echo __('Select Photo Gallery Album WP to insert into post', 'photo-gallery-wp'); ?></h3>
    <div>
        <div class="ph-g-wp-popup-head">
            <button class='button-primary ph-gallery-wp_albuminsert ph-g-wp-popup-btn'
                    id="insert_album"><?php echo __('Insert Album', 'photo-gallery-wp'); ?></button>

            <button id="ph-g-wp-list-view-2" class="ph-g-wp-popup-btn ph-g-wp-popup-active">
                <img src="<?php echo PHOTO_GALLERY_WP_IMAGES_URL . '/shortcode_content/view_list.png' ?>" alt="">
            </button>
            <button id="ph-g-wp-thumb-view-2" class="ph-g-wp-popup-btn">
                <img src="<?php echo PHOTO_GALLERY_WP_IMAGES_URL . '/shortcode_content/view_thumbs.png' ?>" alt="">
            </button>
        </div>
        <div style="clear: both"></div>

        <div class="ph-g-wp-popup-content">
            <div class="ph-g-wp-view-mode-list" data-block="ph-g-wp-list-view">
                <div class="ph-g-wp-gallery-tbl-head">
                    <div class="ph-g-wp-inline"><?php echo __('N', 'photo-gallery-wp'); ?></div>
                    <div class="ph-g-wp-inline ph-g-wp-img"><?php echo __('Image', 'photo-gallery-wp'); ?></div>
                    <div class="ph-g-wp-inline"><?php echo __('Title', 'photo-gallery-wp'); ?></div>
                    <div class="ph-g-wp-inline"><?php echo __('Items Count', 'photo-gallery-wp'); ?></div>
                </div>
                <?php foreach ($shortcodealbums as $album): ?>
                    <div class="ph-g-wp-gallery-tbl" data-shortcode="<?php echo $album->id ?>">
                        <div class="ph-g-wp-inline">
                            <input type="checkbox" name="list[]" class="gallery_item"
                                   value="<?= $album->id ?>">
                        </div>
                        <div class="ph-g-wp-inline ph-g-wp-img">
                            <img src="<?php echo PHOTO_GALLERY_WP_IMAGES_URL . '/shortcode_content/noimage.png' ?>"
                                 alt="Image">
                        </div>
                        <div class="ph-g-wp-inline"><?php echo $album->name ?></div>
                        <div class="ph-g-wp-inline">(<?php echo $album->galleries_count ?>)</div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="ph-g-wp-view-mode-thumb" data-block="ph-g-wp-thumb-view">
                <?php foreach ($shortcodalbums as $album): ?>
                    <div class="ph-g-wp-thumb-div" data-shortcode="<?php echo $album->id ?>">
                        <img src="<?php echo PHOTO_GALLERY_WP_IMAGES_URL . '/shortcode_content/noimage.png' ?>"
                             alt="Image">
                        <p><?= $album->name ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</div>
<div id="photo-gallery-wp-shortcode-popup" style="display:none; position: relative">
    <h3 style="margin-left: 5%"><?php echo __('Select Photo Gallery WP to insert into post', 'photo-gallery-wp'); ?></h3>
    <div>
        <div class="ph-g-wp-popup-head">
            <button class='button-primary ph-gallery-wp_galleryinsert ph-g-wp-popup-btn'><?php echo __('Insert gallery', 'photo-gallery-wp'); ?></button>
            <button class='button-primary ph-gallery-wp_albuminsert ph-g-wp-popup-btn'
                    disabled id="insert_album"><?php echo __('Insert Album', 'photo-gallery-wp'); ?></button>
            <button id="ph-g-wp-list-view" class="ph-g-wp-popup-btn ph-g-wp-popup-active">
                <img src="<?php echo PHOTO_GALLERY_WP_IMAGES_URL . '/shortcode_content/view_list.png' ?>" alt="">
            </button>
            <button id="ph-g-wp-thumb-view" class="ph-g-wp-popup-btn">
                <img src="<?php echo PHOTO_GALLERY_WP_IMAGES_URL . '/shortcode_content/view_thumbs.png' ?>" alt="">
            </button>
        </div>
        <div style="clear: both"></div>
    </div>
    <div class="ph-g-wp-popup-content">
        <div class="ph-g-wp-view-mode-list" data-block="ph-g-wp-list-view">
            <div class="ph-g-wp-gallery-tbl-head">
                <!--<div class="ph-g-wp-inline"><?php echo __('N', 'photo-gallery-wp'); ?></div> -->
                <div class="ph-g-wp-inline ph-g-wp-img"><?php echo __('Image', 'photo-gallery-wp'); ?></div>
                <div class="ph-g-wp-inline"><?php echo __('Title', 'photo-gallery-wp'); ?></div>
                <div class="ph-g-wp-inline"><?php echo __('Items Count', 'photo-gallery-wp'); ?></div>
            </div>
            <?php foreach ($shortcodegallerys as $shortcodegallery): ?>
                <div class="ph-g-wp-gallery-tbl" data-shortcode="<?php echo $shortcodegallery->id ?>">
                    <?php /*
                    <div class="ph-g-wp-inline">
                        <input type="checkbox" name="list[]" class="gallery_item" value="<?= $shortcodegallery->id ?>">
                    </div>
                    */ ?>
                    <div class="ph-g-wp-inline ph-g-wp-img">
                        <img src="<?php echo PHOTO_GALLERY_WP_IMAGES_URL . '/shortcode_content/noimage.png' ?>"
                             alt="Image">
                    </div>
                    <div class="ph-g-wp-inline"><?php echo $shortcodegallery->name ?></div>
                    <div class="ph-g-wp-inline">(<?php echo $shortcodegallery->images_count ?>)</div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="ph-g-wp-view-mode-thumb" data-block="ph-g-wp-thumb-view">
            <?php foreach ($shortcodegallerys as $shortcodegallery): ?>
                <div class="ph-g-wp-thumb-div" data-shortcode="<?php echo $shortcodegallery->id ?>">
                    <img src="<?php echo PHOTO_GALLERY_WP_IMAGES_URL . '/shortcode_content/noimage.png' ?>" alt="Image">
                    <p><?= $shortcodegallery->name ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<?php // hishi texapoxes mard@ ira file-i mej ?>
<style>
    .ph-g-wp-inline {
        width: 20%;
    }

    #TB_ajaxContent p, .ph-g-wp-thumb-div {
        text-align: center;
    }
</style>
<script type="text/javascript">
    jQuery(document).ready(function ($) {

        var list = [];
        $(".gallery_item").change(function () {
            if ($(this).prop("checked") === true) {
                list.push($(this).val());
            }
            else {
                var index = list.indexOf($(this).val());
                list.splice(index, 1);
            }

            if (list.length > 0) {
                $("#insert_album").removeAttr("disabled");
            }
            else {
                $("#insert_album").attr("disabled", "disabled");
            }
        });
    })
</script>