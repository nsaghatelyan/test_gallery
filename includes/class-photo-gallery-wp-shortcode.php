<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Photo_Gallery_WP__Shortcode
{

    /**
     * Photo_Gallery_WP__Shortcode constructor.
     */
    public function __construct()
    {
        add_shortcode('photo_gallery_wp', array($this, 'run_shortcode'));
        add_shortcode('photo_gallery_album_wp', array($this, 'run_shortcode_album'));
        add_action('admin_footer', array($this, 'inline_popup_content'));
        add_action('media_buttons_context', array($this, 'add_editor_media_button'));
        add_action('media_buttons_context', array($this, 'add_editor_media_button_album'));
    }

    /**
     * Run the shortcode on front-end
     *
     * @param $attrs
     *
     * @return string
     */
    public function run_shortcode($attrs)
    {
        $attrs = shortcode_atts(array(
            'id' => 'photo gallery wp',
        ), $attrs);

        global $wpdb;
        $query = $wpdb->prepare("SELECT photo_gallery_wp_sl_effects FROM " . $wpdb->prefix . "photo_gallery_wp_gallerys WHERE id=%d", $attrs['id']);
        $gallery_view = $wpdb->get_var($query);
        $query = $wpdb->prepare("SELECT image_url FROM " . $wpdb->prefix . "photo_gallery_wp_images WHERE gallery_id=%d", $attrs['id']);
        $images = $wpdb->get_col($query);
        $has_youtube = false;
        $has_vimeo = false;
        foreach ($images as $image_row) {
            if (strpos($image_row, 'youtu') !== false) {
                $has_youtube = true;
            }
            if (strpos($image_row, 'vimeo') !== false) {
                $has_vimeo = true;
            }
        }

        do_action('Photo_Gallery_WP_Shortcode_scripts', $attrs['id'], $gallery_view, $has_youtube, $has_vimeo);
        do_action('Photo_gallery_wp_localize_scripts', $attrs['id']);

        return $this->init_frontend($attrs['id'], "gallery");
    }

    public function run_shortcode_album($attrs)
    {
        $id_array = explode(",", $attrs["id"]);
        $attrs = shortcode_atts(array(
            'id' => 'photo gallery wp',
        ), $attrs);

        global $wpdb;

        $query = $wpdb->prepare("SELECT photo_gallery_wp_sl_effects FROM " . $wpdb->prefix . "photo_gallery_wp_gallerys WHERE id=%d", $attrs['id']);
        $gallery_view = $wpdb->get_var($query);
        $query = $wpdb->prepare("SELECT image_url FROM " . $wpdb->prefix . "photo_gallery_wp_images WHERE gallery_id=%d ORDER BY `id` DESC LIMIT 1", $attrs['id']);
        $images = $wpdb->get_col($query);

        $has_youtube = false;
        $has_vimeo = false;
        foreach ($images as $image_row) {
            if (strpos($image_row, 'youtu') !== false) {
                $has_youtube = true;
            }
            if (strpos($image_row, 'vimeo') !== false) {
                $has_vimeo = true;
            }
        }

        do_action('Photo_Gallery_WP_Shortcode_scripts', $attrs['id'], $gallery_view, $has_youtube, $has_vimeo);
        do_action('Photo_gallery_wp_localize_scripts', $attrs['id']);

        return $this->init_frontend($id_array, "album");
    }

    /**
     * Show published galleries in frontend
     *
     * @param $id
     *
     * @return string
     */
    protected function init_frontend($id_array, $flag)
    {
        global $wpdb;
        $format = '';


        if (is_array($id_array)) {
            if (count($id_array) == 1) {
                $id = $id_array[0];
                $format = "%d";
            } else {
                $id = implode(",", $id_array);
                $format = rtrim(str_repeat("%d, ", count($id_array)), ", ");
            }
        } else {
            $id = $id_array;
        }

        switch (Photo_Gallery_WP()->settings->album_sorting) {
            case 0:
                $album_sorting = "`date`";
                break;
            case 1:
                $album_sorting = "`name`";
                break;
            default:
                $album_sorting = "`date`";
                break;
        }


        $query = $wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "photo_gallery_wp_images where gallery_id IN (" . $id . ") order by ordering ASC", "");
        $images = $wpdb->get_results($query);


        $query = $wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "photo_gallery_wp_gallerys where id IN (" . $id . ") order by id ASC", "");
        $gallery = $wpdb->get_results($query);


        $query = $wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "photo_gallery_wp_albums where id IN (" . $id . ") order by " . $album_sorting . " ASC", "");
        $albums = $wpdb->get_results($query);

        $query = $wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "photo_gallery_wp_gallerys where id_album IN (" . $id . ") order by id ASC", "");
        $album_galleries = $wpdb->get_results($query);


        foreach ($album_galleries as $key => $val) {
            $query = $wpdb->prepare("SELECT id,gallery_id, name, description, image_url FROM " . $wpdb->prefix . "photo_gallery_wp_images where gallery_id = '%d' order by ordering ASC", $val->id);
            $val->image_url = $wpdb->get_results($query)[0]->image_url;
            $val->image_count = count($wpdb->get_results($query));
            $val->images = $wpdb->get_results($query);
        }
        foreach ($albums as $key => $val) {
            $album_image_count[$key] = 0;
            foreach ($album_galleries as $k => $v) {
                if ($v->id_album == $val->id) {
                    $album_image_count[$key] = $album_image_count[$key] + count($v->images);
                    $val->image_url = $v->image_url;
                    $val->image_count = $album_image_count[$key];
                    $val->galleries[] = $v;
                }
            }
            if (!isset($val->galleries)) {
                unset($albums[$key]);
            }
        }

        ob_start();

        if ($flag == "album") {
            Photo_Gallery_WP()->template_loader->load_album_front_end($albums);
        } else {
            Photo_Gallery_WP()->template_loader->load_front_end($images, $gallery);
        }


        return ob_get_clean();
    }


    /**
     * Add editor media button
     *
     * @param $context
     *
     * @return string
     */
    public function add_editor_media_button($context)
    {
        $img = PHOTO_GALLERY_WP_IMAGES_URL . '/admin_images/post.button.png';
        $container_id = 'photo-gallery-wp-shortcode-popup';
        $title = __('Select Photo Gallery WP to insert into post', 'photo-gallery-wp');
        $context .= '<a class="button thickbox" title="Select gallery to insert into post" title="' . $title . '" href="#TB_inline?width=400&inlineId=' . $container_id . '">
        <span class="wp-media-buttons-icon" style="background: url(' . $img . '); background-repeat: no-repeat; background-position: left bottom;"></span>
    Add gallery
    </a>';

        return $context;
    }

    public function add_editor_media_button_album($context)
    {
        $img = PHOTO_GALLERY_WP_IMAGES_URL . '/admin_images/post.button.png';
        $container_id = 'photo-gallery-wp-shortcode-popup-2';
        $title = __('Select Photo Gallery Album WP to insert into post', 'photo-gallery-wp');
        $context .= '<a class="button thickbox" title="Select album to insert into post" title="' . $title . '" href="#TB_inline?width=400&inlineId=' . $container_id . '">
        <span class="wp-media-buttons-icon" style="background: url(' . $img . '); background-repeat: no-repeat; background-position: left bottom;"></span>
    Add Album
    </a>';

        return $context;
    }

    /**
     * Inline popup contents
     */
    public function inline_popup_content()
    {
        global $wpdb;
        $query = "SELECT galleries.*, COUNT(images.id) as images_count FROM " . $wpdb->prefix . "photo_gallery_wp_gallerys AS galleries LEFT JOIN " . $wpdb->prefix . "photo_gallery_wp_images AS images ON galleries.id = images.gallery_id GROUP BY galleries.id";
        $shortcodegallerys = $wpdb->get_results($query);

        $query = "SELECT albums.*, COUNT(galleries.id) as galleries_count FROM " . $wpdb->prefix . "photo_gallery_wp_albums AS albums LEFT JOIN " . $wpdb->prefix . "photo_gallery_wp_gallerys AS galleries ON albums.id = galleries.id_album GROUP BY albums.id";
        $shortcodealbums = $wpdb->get_results($query);

        require PHOTO_GALLERY_WP_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'photo-gallery-wp-admin-inline-popup-content-html.php';
    }


}

new Photo_Gallery_WP__Shortcode();