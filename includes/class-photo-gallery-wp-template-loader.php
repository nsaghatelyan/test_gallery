<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Photo_Gallery_WP_Template_Loader
{

    public function __contstruct()
    {
        add_action('media_buttons_context', array($this, 'add_editor_media_button'));

//        add_action('wp_ajax_album_page', array($this, 'test_ajax_exec'));
//        add_action('wp_ajax_nopriv_album_page', array($this, 'test_ajax_exec'));

        add_action('wp_ajax_calendar_front', array($this, 'calendar_frontend_day_view'));
        add_action('wp_ajax_nopriv_calendar_front', array($this, 'calendar_frontend_day_view'));

    }

    /**
     * Load the Plugin shortcode's frontend
     *
     * @param $images
     * @param $gallery
     * @param $title
     */

    public function test_ajax_exec()
    {
        check_ajax_referer('album_page', 'nonce');

        if (isset($_POST["test_val"])) {
            $test = $_POST["test_val"];

//            $response = array("result" => $_POST["test_val"]);
        }
//        else {
//            $response = 78;
//        }

        $response = array(
            'success' => 1,
            'test' => $test
        );

        echo json_encode($response);
        wp_die();
    }

    public function calendar_frontend_day_view()
    {
        //check_ajax_referer('calendar_front', 'nonce');

        if (isset($_GET['day'])) {
            $day = $_GET['day'];
        }
        $response = array(
            'success' => 1,
            'day' => $day
        );

        echo json_encode($response);
        wp_die();

    }


    public function load_album_front_end($albums)
    {
        global $post;
        global $wpdb;

        if (!empty($albums)) {

            $album_view = 1;
            $album_categories = array();

            if (!is_null($albums)) {
                foreach ($albums as $key => $val) {
                    $album_params[$key] = array(
                        "album_id" => $val->id,
                        "album_view" => $val->gallery_list_effects_s,
                        "album_title" => $val->name,
                        "album_desc" => $val->description
                    );
                }

                $albumID = $albums[0]->id;
//            $album_view = $albums[0]->gallery_list_effects_s;
                $album_view = Photo_Gallery_WP()->settings->album_style;
                $query = esc_sql("SELECT * FROM " . $wpdb->prefix . "photo_gallery_wp_album_categories");
                $album_categories = $wpdb->get_results($query);
            }
            $albumID = $albums[0]->id;

            foreach ($albums as $val) {
                $val->cat_class = explode(",", $val->category);
                foreach ($val->cat_class as $k => $cat) {
                    $val->cat_class[$k] = "hg_cat_" . $cat;
                }
            }

            //wp_enqueue_script("album_filter.js", Photo_Gallery_WP()->plugin_url() . "/assets/js/jquery.filterizr.js", false);
            wp_enqueue_script("album_filter.js", Photo_Gallery_WP()->plugin_url() . "/assets/js/jquery.mixitup.min.js", false);
            wp_enqueue_style("album_filter.css", Photo_Gallery_WP()->plugin_url() . "/assets/style/filterize.css", false);


            switch ($album_view) {
                case 1:
                    if (Photo_Gallery_WP()->settings->album_popup_onhover_effects == 4) {
                        wp_register_script('hoverdir.js', Photo_Gallery_WP()->plugin_url() . '/assets/js/jquery.hoverdir.js', array('jquery'), '1.0.0', true);
                        wp_enqueue_script('hoverdir.js');

                        wp_register_script('hover_custom.js', Photo_Gallery_WP()->plugin_url() . '/assets/js/modernizr.custom.97074.js', array('jquery'), '1.0.0', true);
                        wp_enqueue_script('hover_custom.js');
                    }
                    if (in_array(Photo_Gallery_WP()->settings->album_popup_grid_style, array(5, 6))) {
                        wp_register_script('mosaicflow.js', Photo_Gallery_WP()->plugin_url() . '/assets/js/jquery.mosaicflow.js', array('jquery'), '1.0.0', true);
                        wp_enqueue_script('mosaicflow.js');
                    }
                    $view_slug = photo_gallery_wp_get_view_slag_by_id($albumID);
                    require PHOTO_GALLERY_WP_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'album-popup' . DIRECTORY_SEPARATOR . 'album-popup-view.php';
                    require PHOTO_GALLERY_WP_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'album-popup' . DIRECTORY_SEPARATOR . 'album-popup-view.css.php';
                    break;
                case 2:
                    if (Photo_Gallery_WP()->settings->album_onhover_effects == 4) {
                        wp_register_script('hoverdir.js', Photo_Gallery_WP()->plugin_url() . '/assets/js/jquery.hoverdir.js', array('jquery'), '1.0.0', true);
                        wp_enqueue_script('hoverdir.js');

                        wp_register_script('hover_custom.js', Photo_Gallery_WP()->plugin_url() . '/assets/js/modernizr.custom.97074.js', array('jquery'), '1.0.0', true);
                        wp_enqueue_script('hover_custom.js');
                    }
                    if (in_array(Photo_Gallery_WP()->settings->album_grid_style, array(5, 6))) {
                        wp_register_script('mosaicflow.js', Photo_Gallery_WP()->plugin_url() . '/assets/js/jquery.mosaicflow.js', array('jquery'), '1.0.0', true);
                        wp_enqueue_script('mosaicflow.js');
                    }
                    $view_slug = photo_gallery_wp_get_view_slag_by_id($albumID);
                    require PHOTO_GALLERY_WP_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'album-page' . DIRECTORY_SEPARATOR . 'album-page-view.php';
                    require PHOTO_GALLERY_WP_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'album-page' . DIRECTORY_SEPARATOR . 'album-page-view.css.php';
                    break;
            }
            require PHOTO_GALLERY_WP_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'album-page' . DIRECTORY_SEPARATOR . 'album-general.css.php';
        }
    }

    public function load_front_end($images, $gallery)
    {
        global $post;
        global $wpdb;


        if (!empty($gallery)) {
            $galleryID = $gallery[0]->id;
            $view = $gallery[0]->photo_gallery_wp_sl_effects;
            $disp_type = $gallery[0]->display_type;

            $num = $gallery[0]->content_per_page;
            $loading_type = $gallery[0]->gallery_loader_type;
            $like_dislike = $gallery[0]->rating;
            $total = intval(((count($images) - 1) / $num) + 1);
//        $total = 100;
            $pattern = '/-/';
            $huge_it_ip = photo_gallery_wp_get_ip();
            $pID = $post->ID;

            $slidertitle = $gallery[0]->name;
            $sliderheight = $gallery[0]->sl_height - 2 * Photo_Gallery_WP()->settings->slider_slideshow_border_size;
            $sliderwidth = $gallery[0]->sl_width - 2 * Photo_Gallery_WP()->settings->slider_slideshow_border_size;
            $slidereffect = $gallery[0]->gallery_list_effects_s;
            $slidepausetime = ($gallery[0]->description + $gallery[0]->param);
            $sliderpauseonhover = $gallery[0]->pause_on_hover;
            $sliderposition = $gallery[0]->sl_position;
            $slidechangespeed = $gallery[0]->param;
            $trim_slider_title_position = trim(Photo_Gallery_WP()->settings->slider_title_position);
            $slideshow_title_position = explode('-', $trim_slider_title_position);
            $trim_slider_description_position = trim(Photo_Gallery_WP()->settings->slider_description_position);
            $slideshow_description_position = explode('-', $trim_slider_description_position);
            $has_youtube = 'false';
            $has_vimeo = 'false';


            foreach ($images as $image) {
                if (strpos($image->image_url, 'youtu') !== false) {
                    $has_youtube = 'true';
                }
                if (strpos($image->image_url, 'vimeo') !== false) {
                    $has_vimeo = 'true';
                }
            }
            if (isset($_GET['page-img' . $galleryID . $pID])) {
                $page = $_GET['page-img' . $galleryID . $pID];
            } else {
                $page = '';
            }
            $page = intval($page);
            if (empty($page) or $page < 0) {
                $page = 1;
            }
            if ($page > $total) {
                $page = $total;
            }
            $start = $page * $num - $num;
            $query = $wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "photo_gallery_wp_images where gallery_id = '%d' order by ordering ASC LIMIT " . $start . "," . $num, $galleryID);
            $page_images = $wpdb->get_results($query);
            if ($disp_type == 2) {
                $page_images = $images;
                $count_page = 9999;
            }

            switch ($view) {
                case 0:
                    $view_slug = photo_gallery_wp_get_view_slag_by_id($galleryID);
                    require PHOTO_GALLERY_WP_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'content-popup' . DIRECTORY_SEPARATOR . 'content-popup-view.php';
                    require PHOTO_GALLERY_WP_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'content-popup' . DIRECTORY_SEPARATOR . 'content-popup-view.css.php';
                    break;
                case 1:
                    $view_slug = photo_gallery_wp_get_view_slag_by_id($galleryID);
                    require PHOTO_GALLERY_WP_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'content-slider' . DIRECTORY_SEPARATOR . 'content-slider-view.php';
                    require PHOTO_GALLERY_WP_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'content-slider' . DIRECTORY_SEPARATOR . 'content-slider-view.css.php';
                    break;
                case 3:
                    $view_slug = photo_gallery_wp_get_view_slag_by_id($galleryID);
                    require PHOTO_GALLERY_WP_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'slider' . DIRECTORY_SEPARATOR . 'slider-view.php';
                    require PHOTO_GALLERY_WP_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'slider' . DIRECTORY_SEPARATOR . 'slider-view.css.php';
                    break;
                case 4:
                    $view_slug = photo_gallery_wp_get_view_slag_by_id($galleryID);
                    require PHOTO_GALLERY_WP_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'thumbnails' . DIRECTORY_SEPARATOR . 'thumbnails-view.php';
                    require PHOTO_GALLERY_WP_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'thumbnails' . DIRECTORY_SEPARATOR . 'thumbnails-view.css.php';
                    break;
                case 5:
                    $view_slug = photo_gallery_wp_get_view_slag_by_id($galleryID);
                    require PHOTO_GALLERY_WP_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'lightbox-gallery' . DIRECTORY_SEPARATOR . 'lightbox-gallery-view.php';
                    require PHOTO_GALLERY_WP_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'lightbox-gallery' . DIRECTORY_SEPARATOR . 'lightbox-gallery-view.css.php';
                    break;
                case 6:
                    $view_slug = photo_gallery_wp_get_view_slag_by_id($galleryID);
                    require PHOTO_GALLERY_WP_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'justified' . DIRECTORY_SEPARATOR . 'justified-view.php';
                    require PHOTO_GALLERY_WP_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'justified' . DIRECTORY_SEPARATOR . 'justified-view.css.php';
                    break;
                case 7:
                    $view_slug = photo_gallery_wp_get_view_slag_by_id($galleryID);
                    require PHOTO_GALLERY_WP_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'masonry' . DIRECTORY_SEPARATOR . 'masonry-gallery-view.php';
                    require PHOTO_GALLERY_WP_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'masonry' . DIRECTORY_SEPARATOR . 'masonry-gallery-view-css.php';
                    break;
                case 8:
                    $view_slug = photo_gallery_wp_get_view_slag_by_id($galleryID);
                    require PHOTO_GALLERY_WP_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'mosaic' . DIRECTORY_SEPARATOR . 'mosaic-gallery-view.php';
                    require PHOTO_GALLERY_WP_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'mosaic' . DIRECTORY_SEPARATOR . 'mosaic-gallery-view-css.php';
                    break;
            }
        }
    }

}