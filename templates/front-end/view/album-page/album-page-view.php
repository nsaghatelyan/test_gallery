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

if (Photo_Gallery_WP()->settings->album_show_sharing_buttons !== "false") {
    $album_share = 1;
} else {
    $album_share = 0;
}

if (Photo_Gallery_WP()->settings->album_grid_style == 5) {
    $mosaic = 1;
} elseif (Photo_Gallery_WP()->settings->album_grid_style == 6) {
    $mosaic = 2;
} else {
    $mosaic = 0;
}

$cat_class = array();
$cat_class_all = array();

foreach ($album_categories as $val) {
    $cat_class_all[] = ".hg_cat_" . $val->id;
}
?>

<input type="hidden" name="album_view" value="<?= Photo_Gallery_WP()->settings->album_style ?>">
<input type="hidden" name="sharing_buttons" value="<?= $album_share ?>">
<input type="hidden" name="mosaic" value="<?= $mosaic ?>">

<div id="main" style="display: inline-block; width:100%;">
    <div id="gallery_images" class="album_list"></div>
    <div id="album_image_place" class=" album_list"></div>
    <div id="album_list_container">
        <?php if (!empty($cat_class_all)) { ?>
            <div class="row album_categories">
                <ul id="filters" class="clearfix">
                    <li><span class="filter active" id="album_all_categories"
                              data-filter=".hg_cat_0, <?php echo implode(', ', $cat_class_all); ?>"><?= __("All", "gallery-images") ?></span>
                    </li>
                    <?php foreach ($album_categories as $key => $cat) { ?>
                        <li><span class="filter" data-filter=".hg_cat_<?= $cat->id ?>"><?= $cat->name ?></span></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
        <div class="row filtr-container album_list" id="album_list">

            <?php
            /// gallery list with hover effects
            foreach ($albums as $key => $album) { ?>
                <div class="view  <?= $hover_class; ?> <?php echo implode(" ", $album->cat_class); ?> hg_cat_0">

                    <div class="<?= $hover_class; ?>-wrapper">
                        <?php if (Photo_Gallery_WP()->settings->album_show_image_count !== "false") { ?>
                            <span class="album_images_count"><?= $album->image_count ?></span>
                        <?php } ?>
                        <img src="<?= $album->image_url ?>" alt="<?= $album->name ?>"/>
                        <div class="mask">
                            <a href="#" class="get_galleries" data-id="<?= $album->id ?>"
                               data-hover="<?= $hover_class ?>">
                                <div class="mask-text">
                                    <?php if (Photo_Gallery_WP()->settings->album_show_title !== 'false') { ?>
                                        <h2><?= $album->name ?></h2>
                                    <?php }
                                    if (Photo_Gallery_WP()->settings->album_show_description !== 'false') { ?>
                                        <span class="text-category"><?= $album->description ?></span>
                                    <?php } ?>
                                </div>
                            </a>
                            <?php if (Photo_Gallery_WP()->settings->album_show_sharing_buttons !== "false" && $hover_class != "view-forth") { ?>
                                <div class="album_socials"></div>
                            <?php } ?>
                            <a href="#" class="get_galleries" data-id="<?= $album->id ?>"
                               data-hover="<?= $hover_class ?>">
                                <div class="mask-bg"></div>
                            </a>
                        </div>
                    </div>
                    </a>
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
        jQuery("#album_all_categories").addClass("active");
        // jQuery("#album_list").mosaicflow();
    })


</script>

