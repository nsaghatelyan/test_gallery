<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 15.11.2016
 * Time: 14:01
 */
class Photo_Gallery_WP_Albums
{
    /**
     * Added By Karen
     * Return Albums page
     */


    public function albums()
    {
        echo "Albums Page";
    }

    public function load_album_page()
    {
        global $wpdb;

        if (isset($_GET['page']) && $_GET['page'] == 'photo_gallery_wp_albums') {
            $task = photo_gallery_wp_get_album_task();
            $id = photo_gallery_wp_get_album_id();
        }

        do_action('photo_gallery_wp_before_galleries');
        switch ($task) {
            case 'edit_cat':


                if (isset($_REQUEST['huge_it_gallery_nonce'])) {
                    $wp_nonce = $_REQUEST['huge_it_gallery_nonce'];
                    if (!wp_verify_nonce($wp_nonce, 'huge_it_gallery_nonce')) {
                        wp_die('Security check fail');
                    }
                }

                if ($id) {
                    $this->edit_album($id);
                } else {

                    $id = $wpdb->get_var("SELECT MAX( id ) FROM " . $wpdb->prefix . "photo_gallery_wp_albums");
                    $this->edit_album($id);
                }
                break;
            case 'save':
                if ($id) {

                    $this->save_album_data($id);
                }
                break;
            case 'delete_gallery':
                if ($id) {
                    $this->delete_gallery($_GET["gallery_id"]);
                    $this->edit_album($id);
                }
                break;
            case 'apply':
                if (isset($_REQUEST['huge_it_gallery_nonce_save_album'])) {
                    $huge_it_gallery_nonce_save_album = $_REQUEST['huge_it_gallery_nonce_save_album'];
                    if (!wp_verify_nonce($huge_it_gallery_nonce_save_album, 'huge_it_gallery_nonce_save_album')) {
                        wp_die('Security check fail');
                    }
                }
                if ($id) {
                    $this->save_album_data($id);
                    $this->edit_album($id);
                }
                break;
            default:
                $this->show_albums_page();
                break;
        }
    }

    public function delete_gallery($id)
    {
        global $wpdb;

        $data = array("id_album" => 0);
        $format = array("%d");
        $where = array('id' => $id);
        $where_format = array("%d");

        $wpdb->update($wpdb->prefix . "photo_gallery_wp_gallerys", $data, $where, $format, $where_format);
    }

    public function show_albums_page()
    {
        if (isset($_COOKIE['gallery_deleted'])) {
            if ($_COOKIE['gallery_deleted'] == 'success') {
                ?>
                <div class="updated"><p><strong><?php _e('Item Deleted.'); ?></strong></p></div>
                <?php
            } elseif ($_COOKIE["gallery_deleted"] == 'fail') {
                ?>
                <div id="message" class="error"><p>Gallery Not Deleted</p></div>
            <?php }
        }

        $offset = 0;
        $limit = 10;
        $where = "";
        $params = array();
        if (isset($_GET['search_keyword']) && $_GET['search_keyword'] != "") {
            $where = "WHERE albums.name LIKE %s";
            array_unshift($params, "%" . trim($_GET['search_keyword']) . "%");
            $pagination = $this->add_album_pagination(trim($_GET['search_keyword']), $limit);
        } else {
            $pagination = $this->add_album_pagination(null, $limit);
        }
        if (!isset($_GET['paged'])) {
            $offset = 0;
        } else {
            if ((int)$_GET['paged'] == 0) wp_die('Pagination Error');
            if ($pagination['pagination_links_count'] >= (int)$_GET['paged']) {
                $offset = (int)$_GET['paged'] * $limit - $limit;
                $pagination['current'] = (int)$_GET['paged'];
            }
        }
        array_push($params, $limit, $offset);

        global $wpdb;
//        $query = "SELECT galleries.*, COUNT(images.id) as images_count FROM " . $wpdb->prefix . "photo_gallery_wp_gallerys AS galleries LEFT JOIN " . $wpdb->prefix . "photo_gallery_wp_images AS images ON galleries.id = images.gallery_id " . $where . " GROUP BY galleries.id LIMIT %d OFFSET %d";
        $query = "SELECT albums.*, COUNT(galleries.id) as galleries_count FROM " . $wpdb->prefix . "photo_gallery_wp_albums AS albums LEFT JOIN " . $wpdb->prefix . "photo_gallery_wp_gallerys AS galleries ON albums.id = galleries.id_album" . $where . " GROUP BY albums.id LIMIT %d OFFSET %d";
        $albums = $wpdb->get_results($wpdb->prepare($query, $params));

        require_once(PHOTO_GALLERY_WP_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'photo-gallery-wp-admin-albums-list.php');
    }


    public function edit_album($id)
    {
        global $wpdb;

        if (isset($_GET["removeslide"])) {
            $idfordelete = esc_html($_GET["removeslide"]);
        }
        if (isset($_REQUEST['gallery_nonce_remove_image'])) {
            $gallery_nonce_remove_image = $_REQUEST['gallery_nonce_remove_image'];
            if (!wp_verify_nonce($gallery_nonce_remove_image, 'gallery_nonce_remove_image' . $idfordelete)) {
                wp_die('Security check fail');
            }
        }

        if (isset($_POST["photo_gallery_wp_sl_effects"])) {
            if (isset($_GET["removeslide"])) {
                if ($_GET["removeslide"] != '') {
                    $wpdb->query($wpdb->prepare("DELETE FROM " . $wpdb->prefix . "photo_gallery_wp_images  WHERE id = %d ", $idfordelete));
                }
            }
        }

        //get categories
        $query = esc_sql("SELECT * FROM " . $wpdb->prefix . "photo_gallery_wp_album_categories");
        $categories = $wpdb->get_results($query);


        $query = $wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "photo_gallery_wp_gallerys WHERE id= %d", $id);
        $query2 = $wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "photo_gallery_wp_albums WHERE id= %d", $id);
        $row = $wpdb->get_row($query);
        $album_row = $wpdb->get_row($query2);

        $album_row->category_arr = explode(",", $album_row->category);


        debug::trace($album_row);

        $images = explode(";;;", $row->gallery_list_effects_s);
        $par = explode('	', $row->param);
        $count_ord = count($images);
        $query = $wpdb->prepare("SELECT name,ordering FROM " . $wpdb->prefix . "photo_gallery_wp_gallerys WHERE sl_width=%d  ORDER BY `ordering` ", $row->sl_width);
        $ord_elem = $wpdb->get_results($query);

        $query = $wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "photo_gallery_wp_images where gallery_id = %d order by ordering ASC  ", $row->id);
        $rowim = $wpdb->get_results($query);


        // get Album's galleries list
        $query = $wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "photo_gallery_wp_gallerys where id_album = %d order by ordering ASC  ", $album_row->id);
        $row_galleries = $wpdb->get_results($query);
        foreach ($row_galleries as $val) {
            $query = $wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "photo_gallery_wp_images where gallery_id = %d order by ordering ASC  LIMIT 1", $val->id);
            $img = $wpdb->get_results($query);
            $val->img_url = $img[0]->image_url;
        }

        //get all galleries list which not in current album
        $query = $wpdb->prepare("SELECT id,name FROM " . $wpdb->prefix . "photo_gallery_wp_gallerys where id_album != %d order by ordering ASC  ", $album_row->id);
        $all_galleries = $wpdb->get_results($query);

        if (isset($_GET["addslide"])) {
            if ($_GET["addslide"] == 1) {
                $table_name = $wpdb->prefix . "photo_gallery_wp_images";
                $sql_2 = "
INSERT INTO 
`" . $table_name . "` ( `name`, `gallery_id`, `description`, `image_url`, `sl_url`, `ordering`, `published`, `published_in_sl_width`) VALUES
( '', '" . $row->id . "', '', '', '', 'par_TV', 2, '1' )";
                $wpdb->query($sql_2);
            }
        }

        $query = "SELECT * FROM " . $wpdb->prefix . "photo_gallery_wp_albums order by id ASC";
        $rowsld = $wpdb->get_results($query);


        $paramssld = photo_gallery_wp_get_general_options();

        $query = "SELECT * FROM " . $wpdb->prefix . "posts where post_type = 'post' and post_status = 'publish' order by id ASC";
        $rowsposts = $wpdb->get_results($query);
        $rowsposts8 = '';
        $postsbycat = '';
        if (isset($_POST["iframecatid"])) {
            $query = $wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "term_relationships where term_taxonomy_id = %d order by object_id ASC", sanitize_text_field($_POST["iframecatid"]));
            $rowsposts8 = $wpdb->get_results($query);
            foreach ($rowsposts8 as $rowsposts13) {
                $query = $wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "posts where post_type = 'post' and post_status = 'publish' and ID = %d  order by ID ASC", $rowsposts13->object_id);
                $rowsposts1 = $wpdb->get_results($query);
                $postsbycat = $rowsposts1;
            }
        }
        require_once(PHOTO_GALLERY_WP_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'photo-gallery-wp-admin-album-galleries-list-html.php');
    }


    function save_album_data($id)
    {
        global $wpdb;
        if (!is_numeric($id)) {
            echo 'insert numeric id';

            return false;
        }

        $new_cat_arr = array();
        $selected_cat = array();
        $album_cats = "";

        if (isset($_POST["categories"])) {
            foreach ($_POST["categories"] as $category) {
                $selected_cat[] = sanitize_text_field($category);
            }
            $album_cats = (!empty($selected_cat)) ? implode(",", $selected_cat) : "";
        }

        if (isset($_POST["cat_names"])) {
            foreach ($_POST["cat_names"] as $val) {
                $new_cat_arr[] = sanitize_text_field($val);
            }
        }


        if (!empty($new_cat_arr)) {
            $wpdb->query("DELETE FROM " . $wpdb->prefix . "photo_gallery_wp_album_categories");
            foreach ($new_cat_arr as $key => $val) {
                $wpdb->query("INSERT INTO " . $wpdb->prefix . "photo_gallery_wp_album_categories (`id`,`name`) VALUES ('" . ++$key . "','$val')");
            }
        }


        if (!(isset($_POST['sl_width']) && isset($_POST["album_name"]))) {
            echo '';
        }
        if (isset($_POST['photo_gallery_wp_admin_image_hover_preview'])) {
            $img_hover_preview = sanitize_text_field($_POST['photo_gallery_wp_admin_image_hover_preview']);
            update_option('photo_gallery_wp_admin_image_hover_preview', $img_hover_preview);
        }
        // Created By Karen S.
        if (isset($_POST["album_name"]) && $_POST["album_name"]) {
            $data = array(
                "name" => sanitize_text_field($_POST["album_name"]),
                "description" => sanitize_text_field($_POST["album_description"]),
                "category" => $album_cats
            );
            $format = array("%s", "%s", "%s");
            $where = array('id' => $id);
            $where_format = array('%d');


            $wpdb->update($wpdb->prefix . "photo_gallery_wp_albums", $data, $where, $format, $where_format);
        }
        // End Created By Karen S.
        $query = $wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "photo_gallery_wp_albums WHERE id = %d", $id);
        $row = $wpdb->get_row($query);

        if (isset($_POST["unplugged"]) && !empty($_POST{"unplugged"})) {
            foreach ($_POST["unplugged"] as $item) {
                $new_id = sanitize_text_field($item);
                $wpdb->update($wpdb->prefix . "photo_gallery_wp_gallerys", array("id_album" => $id), array("id" => $new_id), array("%d"), array("%d"));
            }
        }

        ?>
        <div class="updated"><p><strong><?php _e('Item Saved'); ?></strong></p></div>
        <?php
        return true;
    }


    protected function search_album($keyword)
    {
        $albums = array();
        return $albums;
    }


    protected function add_album_pagination($condition = null, $limit)
    {
        $pagination = array(
            'total' => 0,
            'enable' => false,
            'current' => 1,
            'pagination_links_count' => 0,
            'links' => 'admin.php?page=photo_gallery_wp_album'
        );
        $parts = parse_url($_SERVER['REQUEST_URI']);
        global $wpdb;
        if ($condition) {
            $query = $wpdb->prepare("SELECT COUNT(`id`) FROM `" . $wpdb->prefix . "photo_gallery_wp_albums` WHERE `name` LIKE %s", '%' . $condition . '%');
            $pagination['links'] .= "&search_keyword=" . $condition;
        } else {
            $query = "SELECT COUNT(id) FROM " . $wpdb->prefix . "photo_gallery_wp_albums";
        }
        $pagination['total'] = $wpdb->get_var($query);
        if ($pagination['total'] > $limit) {
            $pagination['enable'] = true;
            $pagination['pagination_links_count'] = ceil($pagination['total'] / $limit);
        }
        return $pagination;
    }

}