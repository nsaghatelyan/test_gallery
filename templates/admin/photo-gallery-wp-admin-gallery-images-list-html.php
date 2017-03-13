<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $wpdb;
$gallery_wp_nonce                 = wp_create_nonce( 'huge_it_gallery_nonce' );
$photo_gallery_wp_nonce_add_galery = wp_create_nonce( 'photo_gallery_wp_nonce_add_galery' );
if ( isset( $_GET['id'] ) && $_GET['id'] != '' ) {
	$id = intval( $_GET['id'] );
}

if ( isset( $_GET["addslide"] ) ) {
	if ( $_GET["addslide"] == 1 ) {
		header( 'Location: admin.php?page=photo_gallery_wp_gallery&id=' . $row->id . '&task=apply' );
	}
}
?>

	<div id="ph-gallery-wp-gallery-image-zoom">
		<img src="" />
	</div>
	<div class="wrap">
		<?php $path_site = plugins_url( "../images", __FILE__ ); ?>
		<div style="clear: both;"></div>
		<form action="admin.php?page=photo_gallery_wp_gallery&id=<?php echo $row->id; ?>" method="post"
			  name="adminForm" id="adminForm">
			<input type="hidden" class="changedvalues" value="" name="changedvalues" size="80">

			<div id="poststuff">
				<div id="gallery-header">
					<ul id="ph-gallery-wp-gallerys-list">

						<?php
						foreach ( $rowsld as $rowsldires ) {
							if ( $rowsldires->id != $row->id ) {
								?>
								<li>
									<a href="#"
									   onclick="window.location.href='admin.php?page=photo_gallery_wp_gallery&task=edit_cat&id=<?php echo $rowsldires->id; ?>&huge_it_gallery_nonce=<?php echo $gallery_wp_nonce; ?>'"><?php echo $rowsldires->name; ?></a>
								</li>
								<?php
							} else { ?>
								<li class="active"
									onclick="this.firstElementChild.style.width = ((this.firstElementChild.value.length + 1) * 8) + 'px';"
									style="background-image:url(<?php echo PHOTO_GALLERY_WP_IMAGES_URL . '/admin_images/edit.png'; ?>);cursor: pointer;">
									<input class="text_area" onkeyup="name_changeTop(this)"
										   onfocus="this.style.width = ((this.value.length + 1) * 8) + 'px'" type="text"
										   name="name" id="name" maxlength="250"
										   value="<?php echo esc_html( stripslashes( $row->name ) ); ?>"/>
								</li>
								<?php
							}
						}
						?>
						<li class="add-new">
							<a onclick="window.location.href='admin.php?page=photo_gallery_wp_gallery&amp;task=add_cat&photo_gallery_wp_nonce_add_galery=<?php echo $photo_gallery_wp_nonce_add_galery; ?>'">+</a>
						</li>
					</ul>
				</div>
				<div id="post-body" class="metabox-holder columns-2">
					<!-- Content -->
					<div id="post-body-content">
						<?php add_thickbox(); ?>
						<div id="post-body">
							<div id="ph-gallery-wp-post-body-heading">
								<div id="ph-gallery-wp-img_preview">
									<h3><?php echo __( 'Images', 'gallery-images' ); ?></h3>
									<input type="hidden" name="imagess" id="_unique_name"/>
									<input type="hidden"  name="photo_gallery_wp_admin_image_hover_preview" value="off"/>
									<label for="img_hover_preview"><?php echo __('Image preview on hover','photo-gallery-wp'); ?>
										<input type="checkbox" id="img_hover_preview" name="photo_gallery_wp_admin_image_hover_preview"
											   value="on" <?php if ( get_option('photo_gallery_wp_admin_image_hover_preview') == 'on' )
											echo 'checked' ?>>
									</label>
								</div>
								<div class="huge-it-newuploader uploader  add-new-image">
									<input type="button" class="button wp-media-buttons-icon button-primary" name="_unique_name_button"
										   id="_unique_name_button" value="Add Image"/>
								</div>
								<a href="#TB_inline?&inlineId=ph-gallery-wp-add_videos&width=700&height=500"
								   class="button button-primary add-video-slide thickbox" id="slideup3s"
								   value="iframepop">
                                    <span
										class="wp-media-buttons-icon"></span><?php echo __( 'Add Video', 'photo-gallery-wp' ); ?>
								</a>
							</div>
							<ul id="ph-gallery-wp-images-list">
								<?php
								$i = 2;
								foreach ( $rowim as $key => $rowimages ) { ?>
									<?php if ( $rowimages->sl_type == '' ) {
										$rowimages->sl_type = 'image';
									}
									$gallery_nonce_remove_image = wp_create_nonce( 'gallery_nonce_remove_image' . $rowimages->id );
									switch ( $rowimages->sl_type ) {
										case 'image': ?>
											<li <?php if ( $i % 2 == 0 ) {
												echo "class='has-background'";
											}
											$i ++; ?>>
												<input class="order_by" type="hidden"
													   name="order_by_<?php echo $rowimages->id; ?>"
													   value="<?php echo $rowimages->ordering; ?>"/>
												<div class="ph-gallery-wp-image-container">
													<div class="ph-gallery-wp-list-img-wrapper">
														<img src="<?php echo $rowimages->image_url; ?>"/>
													</div>
													<div>
														<input type="hidden" name="imagess<?php echo $rowimages->id; ?>"
															   id="_unique_name<?php echo $rowimages->id; ?>"
															   value="<?php echo esc_attr( $rowimages->image_url ); ?>"/>
														<span class="wp-media-buttons-icon"></span>
														<div
															class="huge-it-editnewuploader uploader button<?php echo $rowimages->id; ?> add-new-image">
															<input type="button"
																   class="button<?php echo $rowimages->id; ?> wp-media-buttons-icon ph-gallery-wp-edit-image-icon"
																   name="_unique_name_button<?php echo $rowimages->id; ?>"
																   id="_unique_name_button<?php echo $rowimages->id; ?>"
																   value="Edit image"/>
														</div>
													</div>
												</div>
												<div class="ph-gallery-wp-image-options">
													<div>
														<input class="text_area" type="text" placeholder="<?php echo __( 'Title:', 'photo-gallery-wp' ); ?>"
															   id="titleimage<?php echo $rowimages->id; ?>"
															   name="titleimage<?php echo $rowimages->id; ?>"
															   id="titleimage<?php echo $rowimages->id; ?>"
															   value="<?php echo esc_attr( str_replace( '__5_5_5__', '%', $rowimages->name ) ); ?>">
													</div>
													<div class="description-block">
														<textarea id="im_description<?php echo $rowimages->id; ?>" placeholder="<?php echo __( 'Description:', 'photo-gallery-wp' ); ?>"
																  name="im_description<?php echo $rowimages->id; ?>"><?php echo str_replace( '__5_5_5__', '%', $rowimages->description ) ?></textarea>
													</div>
													<div class="link-block">
														<input class="text_area url-input" type="text" placeholder="<?php echo __( 'URL:', 'photo-gallery-wp' ); ?>"
															   id="sl_url<?php echo $rowimages->id; ?>"
															   name="sl_url<?php echo $rowimages->id; ?>"
															   value="<?php echo esc_attr( str_replace( '__5_5_5__', '%', $rowimages->sl_url ) ); ?>">
														<label class="long"
															   for="sl_link_target<?php echo $rowimages->id; ?>">
															<span><?php echo __( 'Open in new tab', 'photo-gallery-wp' ); ?></span>
															<input type="hidden"
																   name="sl_link_target<?php echo $rowimages->id; ?>"
																   value=""/>
															<input <?php if ( $rowimages->link_target == 'on' ) {
																echo 'checked="checked"';
															} ?> class="link_target" type="checkbox"
																 id="sl_link_target<?php echo $rowimages->id; ?>"
																 name="sl_link_target<?php echo $rowimages->id; ?>"/>
														</label>
													</div>
													<div class="remove-ph-gallery-wp-image-container">
														<a id="remove_image<?php echo $rowimages->id; ?>"
														   class="button remove-image"
														   data-image-id="<?php echo $rowimages->id; ?>"
														   data-gallery-id="<?php echo $row->id; ?>"
														   data-nonce-value="<?php echo $gallery_nonce_remove_image; ?>">Remove Image</a>
													</div>
													<div class="like_dislike_wrapper">
														<label
															for="like_<?php echo $rowimages->id; ?>"><?php echo __( 'Ratings:', 'photo-gallery-wp' ); ?></label>
														<label for="like_<?php echo $rowimages->id; ?>"
															   class="like"><?php echo __( 'Like', 'photo-gallery-wp' ); ?></label>
														<input class="" type="number"
															   id="like_<?php echo $rowimages->id; ?>"
															   name="like_<?php echo $rowimages->id; ?>"
															   value="<?php echo str_replace( '__5_5_5__', '%', $rowimages->like ); ?>">
														<label for="dislike_<?php echo $rowimages->id; ?>"
															   class="dislike"><?php echo __( 'Dislike', 'photo-gallery-wp' ); ?></label>
														<input class="" num="<?php echo $rowimages->id; ?>"
															   type="number" id="dislike_<?php echo $rowimages->id; ?>"
															   name="dislike_<?php echo $rowimages->id; ?>"
															   value="<?php echo str_replace( '__5_5_5__', '%', $rowimages->dislike ); ?>">
													</div>
													<div class="heart_wrapper">
														<label
															for="like_<?php echo $rowimages->id; ?>"><?php echo __( 'Ratings:', 'photo-gallery-wp' ); ?></label>
														<label for="like_<?php echo $rowimages->id; ?>"
															   class="like"><?php echo __( 'Hearts', 'photo-gallery-wp' ); ?></label>
														<input class="" num="<?php echo $rowimages->id; ?>"
															   type="number" id="like_<?php echo $rowimages->id; ?>"
															   name="like_<?php echo $rowimages->id; ?>"
															   value="<?php echo str_replace( '__5_5_5__', '%', $rowimages->like ); ?>">
													</div>
												</div>

												<div class="clear"></div>
											</li>
											<?php
											break;
										case 'video':
											?>

											<li <?php if ( $i % 2 == 0 ) {
												echo "class='has-background'";
											}
											$i ++; ?> >
												<input class="order_by" type="hidden"
													   name="order_by_<?php echo $rowimages->id; ?>"
													   value="<?php echo $rowimages->ordering; ?>"/>
												<?php if ( strpos( $rowimages->image_url, 'youtube' ) !== false || strpos( $rowimages->image_url, 'youtu' ) !== false ) {
													$liclass         = "youtube";
													$video_thumb     = photo_gallery_wp_get_video_id_from_url( $rowimages->image_url );
													$video_thumb_url = $video_thumb[0];
													$thumburl        = '<img src="http://img.youtube.com/vi/' . $video_thumb_url . '/mqdefault.jpg" alt="" class="video-thumb-img" />';
												} else if ( strpos( $rowimages->image_url, 'vimeo' ) !== false ) {
													$liclass       = "vimeo";
													$vimeo         = $rowimages->image_url;
													$vimeo_explode = explode( "/", $vimeo );
													$imgid         = end( $vimeo_explode );
													$hash          = unserialize( wp_remote_fopen( "http://vimeo.com/api/v2/video/" . $imgid . ".php" ) );
													$imgsrc        = $hash[0]['thumbnail_large'];
													$thumburl      = '<img src="' . $imgsrc . '" alt="" class="video-thumb-img" />';
												}
												?>
												<div class="ph-gallery-wp-image-container">
													<?php echo $thumburl; ?>
													<div class="play-icon <?php echo $liclass; ?>"></div>
													<div>
														<input type="hidden" name="imagess<?php echo $rowimages->id; ?>"
															   value="<?php echo esc_attr( $rowimages->image_url ); ?>"/>
													</div>
												</div>
												<div class="ph-gallery-wp-image-options">
													<div>
														<input class="text_area" type="text" placeholder="<?php echo __( 'Title:', 'photo-gallery-wp' ); ?>"
															   id="titleimage<?php echo $rowimages->id; ?>"
															   name="titleimage<?php echo $rowimages->id; ?>"
															   id="titleimage<?php echo $rowimages->id; ?>"
															   value="<?php echo esc_attr( str_replace( '__5_5_5__', '%', $rowimages->name ) ); ?>">
													</div>
													<div class="description-block">
														<textarea id="im_description<?php echo $rowimages->id; ?>" placeholder="<?php echo __( 'Description:', 'photo-gallery-wp' ); ?>"
																  name="im_description<?php echo $rowimages->id; ?>"><?php echo esc_html( str_replace( '__5_5_5__', '%', $rowimages->description ) ); ?></textarea>
													</div>
													<div class="link-block">
														<input class="text_area url-input" type="text" placeholder="<?php echo __( 'URL:', 'photo-gallery-wp' ); ?>"
															   id="sl_url<?php echo $rowimages->id; ?>"
															   name="sl_url<?php echo $rowimages->id; ?>"
															   value="<?php echo str_replace( '__5_5_5__', '%', $rowimages->sl_url ); ?>">
														<label class="long"
															   for="sl_link_target<?php echo $rowimages->id; ?>">
															<span><?php echo __( 'Open in new tab', 'photo-gallery-wp' ); ?></span>
															<input type="hidden"
																   name="sl_link_target<?php echo $rowimages->id; ?>"
																   value=""/>
															<input <?php if ( $rowimages->link_target == 'on' ) {
																echo 'checked="checked"';
															} ?> class="link_target" type="checkbox"
																 id="sl_link_target<?php echo $rowimages->id; ?>"
																 name="sl_link_target<?php echo $rowimages->id; ?>"/>
														</label>
													</div>
													<div class="remove-ph-gallery-wp-image-container">
														<a data-image-id="<?php echo $rowimages->id; ?>"
														   data-nonce-value="<?php echo $gallery_nonce_remove_image; ?>"
														   data-gallery-id="<?php echo $row->id; ?>"
														   id="remove_image<?php echo $rowimages->id; ?>"
														   class="button remove-image"><?php echo __( 'Remove Video', 'photo-gallery-wp' ); ?></a>
													</div>
													<div class="like_dislike_wrapper">
														<label
															for="like_<?php echo $rowimages->id; ?>"><?php echo __( 'Ratings:', 'photo-gallery-wp' ); ?></label>
														<label for="like_<?php echo $rowimages->id; ?>"
															   class="like"><?php echo __( 'Like', 'photo-gallery-wp' ); ?></label>
														<input class="" type="number"
															   id="like_<?php echo $rowimages->id; ?>"
															   name="like_<?php echo $rowimages->id; ?>"
															   value="<?php echo str_replace( '__5_5_5__', '%', $rowimages->like ); ?>">
														<label for="dislike_<?php echo $rowimages->id; ?>"
															   class="dislike"><?php echo __( 'Dislike', 'photo-gallery-wp' ); ?></label>
														<input class="" num="<?php echo $rowimages->id; ?>"
															   type="number" id="dislike_<?php echo $rowimages->id; ?>"
															   name="dislike_<?php echo $rowimages->id; ?>"
															   value="<?php echo str_replace( '__5_5_5__', '%', $rowimages->dislike ); ?>">
													</div>
													<div class="heart_wrapper">
														<label
															for="like_<?php echo $rowimages->id; ?>"><?php echo __( 'Ratings:', 'photo-gallery-wp' ); ?></label>
														<label for="like_<?php echo $rowimages->id; ?>"
															   class="like"><?php echo __( 'Hearts', 'photo-gallery-wp' ); ?></label>
														<input class="" num="<?php echo $rowimages->id; ?>"
															   type="number" id="like_<?php echo $rowimages->id; ?>"
															   name="like_<?php echo $rowimages->id; ?>"
															   value="<?php echo str_replace( '__5_5_5__', '%', $rowimages->like ); ?>">
													</div>
												</div>
												<div class="clear"></div>
											</li>
											<?php
											break;
									} ?>
								<?php } ?>
							</ul>
						</div>

					</div>

					<!-- SIDEBAR -->
					<div id="postbox-container-1" class="postbox-container">
						<div id="side-sortables" class="meta-box-sortables ui-sortable">
							<div id="gallery-unique-options" class="postbox">
								<h3 class="hndle">
									<span><?php echo __( 'Image Gallery Custom Options', 'photo-gallery-wp' ); ?></span>
								</h3>
								<ul id="ph-gallery-wp-unique-options-list">
									<li>
										<label
											for="huge_it_gallery_name"><?php echo __( 'Gallery name', 'photo-gallery-wp' ); ?></label>
										<input type="text" name="name" id="huge_it_gallery_name"
											   value="<?php echo esc_html( stripslashes( $row->name ) ); ?>"
											   onkeyup="name_changeRight(this)">
									</li>
									<li>
										<label
											for="photo_gallery_wp_sl_effects"><?php echo __( 'Select View', 'photo-gallery-wp' ); ?></label>
										<select name="photo_gallery_wp_sl_effects" id="photo_gallery_wp_sl_effects">
											<option <?php if ( $row->photo_gallery_wp_sl_effects == '0' ) {
												echo 'selected';
											} ?>
												value="0"><?php echo __( 'Gallery/Content-Popup', 'photo-gallery-wp' ); ?></option>
											<option <?php if ( $row->photo_gallery_wp_sl_effects == '1' ) {
												echo 'selected';
											} ?>
												value="1"><?php echo __( 'Content Slider', 'photo-gallery-wp' ); ?></option>
											<option <?php if ( $row->photo_gallery_wp_sl_effects == '5' ) {
												echo 'selected';
											} ?>
												value="5"><?php echo __( 'Lightbox-Gallery', 'photo-gallery-wp' ); ?></option>
											<option <?php if ( $row->photo_gallery_wp_sl_effects == '3' ) {
												echo 'selected';
											} ?> value="3"><?php echo __( 'Slider', 'photo-gallery-wp' ); ?></option>
											<option <?php if ( $row->photo_gallery_wp_sl_effects == '4' ) {
												echo 'selected';
											} ?>
												value="4"><?php echo __( 'Thumbnails View', 'photo-gallery-wp' ); ?></option>
											<option <?php if ( $row->photo_gallery_wp_sl_effects == '6' ) {
												echo 'selected';
											} ?> value="6"><?php echo __( 'Justified', 'photo-gallery-wp' ); ?></option>
											<option <?php if ( $row->photo_gallery_wp_sl_effects == '7' ) {
												echo 'selected';
											} ?> value="7"><?php echo __( 'Masonry', 'photo-gallery-wp' ); ?></option>
											<option <?php if ( $row->photo_gallery_wp_sl_effects == '8' ) {
												echo 'selected';
											} ?> value="8"><?php echo __( 'Mosaic', 'photo-gallery-wp' ); ?></option>
										</select>
									</li>
									<div id="ph-gallery-wp-current-options-0"
										 class="ph-gallery-wp-current-options <?php if ( $row->photo_gallery_wp_sl_effects == 0 ) {
											 echo ' active';
										 } ?>">
										<ul id="view7">
											<li>
												<label
													for="display_type"><?php echo __( 'Displaying Content', 'photo-gallery-wp' ); ?></label>
												<select id="display_type" name="display_type">

													<option <?php if ( $row->display_type == 0 ) {
														echo 'selected';
													} ?>
														value="0"><?php echo __( 'Pagination', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->display_type == 1 ) {
														echo 'selected';
													} ?>
														value="1"><?php echo __( 'Load More', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->display_type == 2 ) {
														echo 'selected';
													} ?>
														value="2"><?php echo __( 'Show All', 'photo-gallery-wp' ); ?></option>
												</select>
											</li>
											<li id="content_per_page">
												<label
													for="content_per_page"><?php echo __( 'Images Per Page', 'photo-gallery-wp' ); ?></label>
												<input type="text" name="content_per_page" id="content_per_page"
													   value="<?php echo esc_attr( $row->content_per_page ); ?>"
													   class="text_area"/>
											</li>


										</ul>
									</div>
									<div id="ph-gallery-wp-current-options-5"
										 class="ph-gallery-wp-current-options <?php if ( $row->photo_gallery_wp_sl_effects == 5 ) {
											 echo ' active';
										 } ?>">
										<ul id="view7">

											<li>
												<label
													for="display_type"><?php echo __( 'Displaying Content', 'photo-gallery-wp' ); ?></label>
												<select id="display_type" name="display_type">

													<option <?php if ( $row->display_type == 0 ) {
														echo 'selected';
													} ?>
														value="0"><?php echo __( 'Pagination', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->display_type == 1 ) {
														echo 'selected';
													} ?>
														value="1"><?php echo __( 'Load More', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->display_type == 2 ) {
														echo 'selected';
													} ?>
														value="2"><?php echo __( 'Show All', 'photo-gallery-wp' ); ?></option>

												</select>
											</li>
											<li id="content_per_page">
												<label
													for="content_per_page"><?php echo __( 'Images Per Page', 'photo-gallery-wp' ); ?></label>
												<input type="text" name="content_per_page" id="content_per_page"
													   value="<?php echo esc_attr( $row->content_per_page ); ?>"
													   class="text_area"/>
											</li>


										</ul>
									</div>
									<div id="ph-gallery-wp-current-options-4"
										 class="ph-gallery-wp-current-options <?php if ( $row->photo_gallery_wp_sl_effects == 4 ) {
											 echo ' active';
										 } ?>">
										<ul id="view7">

											<li>
												<label
													for="display_type"><?php echo __( 'Displaying Content', 'photo-gallery-wp' ); ?></label>
												<select id="display_type" name="display_type">

													<option <?php if ( $row->display_type == 0 ) {
														echo 'selected';
													} ?>
														value="0"><?php echo __( 'Pagination', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->display_type == 1 ) {
														echo 'selected';
													} ?>
														value="1"><?php echo __( 'Load More', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->display_type == 2 ) {
														echo 'selected';
													} ?>
														value="2"><?php echo __( 'Show All', 'photo-gallery-wp' ); ?></option>

												</select>
											</li>
											<li id="content_per_page">
												<label
													for="content_per_page"><?php echo __( 'Images Per Page', 'photo-gallery-wp' ); ?></label>
												<input type="text" name="content_per_page" id="content_per_page"
													   value="<?php echo esc_attr( $row->content_per_page ); ?>"
													   class="text_area"/>
											</li>
										</ul>
									</div>
									<div id="ph-gallery-wp-current-options-6"
										 class="ph-gallery-wp-current-options <?php if ( $row->photo_gallery_wp_sl_effects == 6 ) {
											 echo ' active';
										 } ?>">
										<ul id="view7">
											<li>
												<label
													for="display_type"><?php echo __( 'Displaying Content', 'photo-gallery-wp' ); ?></label>
												<select id="display_type" name="display_type">

													<option <?php if ( $row->display_type == 0 ) {
														echo 'selected';
													} ?>
														value="0"><?php echo __( 'Pagination', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->display_type == 1 ) {
														echo 'selected';
													} ?>
														value="1"><?php echo __( 'Load More', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->display_type == 2 ) {
														echo 'selected';
													} ?>
														value="2"><?php echo __( 'Show All', 'photo-gallery-wp' ); ?></option>
												</select>
											</li>
											<li id="content_per_page">
												<label
													for="content_per_page"><?php echo __( 'Images Per Page', 'photo-gallery-wp' ); ?></label>
												<input type="text" name="content_per_page" id="content_per_page"
													   value="<?php echo esc_attr( $row->content_per_page ); ?>"
													   class="text_area"/>
											</li>
										</ul>
									</div>
									<div id="ph-gallery-wp-current-options-3"
										 class="ph-gallery-wp-current-options <?php if ( $row->photo_gallery_wp_sl_effects == 3 ) {
											 echo ' active';
										 } ?>">
										<ul id="slider-unique-options-list">
											<li>
												<label
													for="sl_width"><?php echo __( 'Width', 'photo-gallery-wp' ); ?></label>
												<input type="text" name="sl_width" id="sl_width"
													   value="<?php echo esc_attr( $row->sl_width ); ?>"
													   class="text_area"/>
											</li>
											<li>
												<label
													for="sl_height"><?php echo __( 'Height', 'photo-gallery-wp' ); ?></label>
												<input type="text" name="sl_height" id="sl_height"
													   value="<?php echo esc_attr( $row->sl_height ); ?>"
													   class="text_area"/>
											</li>
											<li>
												<label
													for="gallery_list_effects_s"><?php echo __( 'Effects', 'photo-gallery-wp' ); ?></label>
												<select name="gallery_list_effects_s" id="gallery_list_effects_s">
													<option <?php if ( $row->gallery_list_effects_s == 'fade' ) {
														echo 'selected';
													} ?>
														value="fade"><?php echo __( 'Fade', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->gallery_list_effects_s == 'swing_inside_stairs' ) {
														echo 'selected';
													} ?>
														value="swing_inside_stairs"><?php echo __( 'Swing inside in Stairs', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->gallery_list_effects_s == 'dodge_dance' ) {
														echo 'selected';
													} ?>
														value="dodge_dance"><?php echo __( 'Dodge Dance', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->gallery_list_effects_s == 'switch' ) {
														echo 'selected';
													} ?>
														value="switch"><?php echo __( 'Switch', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->gallery_list_effects_s == 'expand_stairs' ) {
														echo 'selected';
													} ?>
														value="expand_stairs"><?php echo __( 'Expand Stairs', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->gallery_list_effects_s == 'rotate' ) {
														echo 'selected';
													} ?>
														value="rotate"><?php echo __( 'Rotate', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->gallery_list_effects_s == 'flutter_outside' ) {
														echo 'selected';
													} ?>
														value="flutter_outside"><?php echo __( 'Flutter Outside', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->gallery_list_effects_s == 'zoom_in' ) {
														echo 'selected';
													} ?>
														value="zoom_in"><?php echo __( 'Zoom In', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->gallery_list_effects_s == 'clips_chess_in' ) {
														echo 'selected';
													} ?>
														value="clips_chess_in"><?php echo __( 'Clips & Chess In', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->gallery_list_effects_s == 'clip_jump_in' ) {
														echo 'selected';
													} ?>
														value="clip_jump_in"><?php echo __( 'Clip & Jump In', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->gallery_list_effects_s == 'bounce_down' ) {
														echo 'selected';
													} ?>
														value="bounce_down"><?php echo __( 'Bounce Down', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->gallery_list_effects_s == 'parabola_zigzag_in' ) {
														echo 'selected';
													} ?>
														value="parabola_zigzag_in"><?php echo __( 'Parabola Zigzag In', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->gallery_list_effects_s == 'jump_in_rectangle_cross' ) {
														echo 'selected';
													} ?>
														value="jump_in_rectangle_cross"><?php echo __( 'Jump In Rectangle Cross', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->gallery_list_effects_s == 'wave_in_cross' ) {
														echo 'selected';
													} ?>
														value="wave_in_cross"><?php echo __( 'Wave in Cross', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->gallery_list_effects_s == 'wave_out_cross' ) {
														echo 'selected';
													} ?>
														value="wave_out_cross"><?php echo __( 'Wave Out Cross', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->gallery_list_effects_s == 'vertical_chess_stripe' ) {
														echo 'selected';
													} ?>
														value="vertical_chess_stripe"><?php echo __( 'Vertical Chess Stripe', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->gallery_list_effects_s == 'shift_tb' ) {
														echo 'selected';
													} ?>
														value="shift_tb"><?php echo __( 'Shift TB', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->gallery_list_effects_s == 'shift_lr' ) {
														echo 'selected';
													} ?>
														value="shift_lr"><?php echo __( 'Shift LR', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->gallery_list_effects_s == 'fly_twins' ) {
														echo 'selected';
													} ?>
														value="fly_twins"><?php echo __( 'Fly Twins', 'photo-gallery-wp' ); ?></option>
												</select>
											</li>
											<li>
												<label
													for="slider_position"><?php echo __( 'Slider Position', 'photo-gallery-wp' ); ?></label>
												<select name="sl_position" id="slider_position">
													<option <?php if ( $row->sl_position == 'left' ) {
														echo 'selected';
													} ?>
														value="left"><?php echo __( 'Left', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->sl_position == 'right' ) {
														echo 'selected';
													} ?>
														value="right"><?php echo __( 'Right', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->sl_position == 'center' ) {
														echo 'selected';
													} ?>
														value="center"><?php echo __( 'Center', 'photo-gallery-wp' ); ?></option>
												</select>
											</li>
										</ul>
									</div>
									<div id="ph-gallery-wp-current-options-1"
										 class="ph-gallery-wp-current-options <?php if ( $row->photo_gallery_wp_sl_effects == 1 ) {
											 echo ' active';
										 } ?>">
										<ul id="slider-unique-options-list">
											<li>
												<label
													for="autoslide"><?php echo __( 'Autoslide', 'photo-gallery-wp' ); ?></label>
												<input type="hidden" value="off" name="autoslide"/>
												<input type="checkbox" name="autoslide" value="on"
													   id="autoslide" <?php if ( $row->autoslide == 'on' ) {
													echo 'checked="checked"';
												} ?> />
											</li>
										</ul>
									</div>
									<div id="ph-gallery-wp-current-options-7"
										 class="ph-gallery-wp-current-options <?php if ( $row->photo_gallery_wp_sl_effects == 7 ) {
											 echo ' active';
										 } ?>">
										<ul id="view7">
											<li>
												<label
													for="display_type"><?php echo __( 'Displaying Content', 'photo-gallery-wp' ); ?></label>
												<select id="display_type" name="display_type">

													<option <?php if ( $row->display_type == 0 ) {
														echo 'selected';
													} ?>
														value="0"><?php echo __( 'Pagination', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->display_type == 1 ) {
														echo 'selected';
													} ?>
														value="1"><?php echo __( 'Load More', 'photo-gallery-wp' ); ?></option>
													<option <?php if ( $row->display_type == 2 ) {
														echo 'selected';
													} ?>
														value="2"><?php echo __( 'Show All', 'photo-gallery-wp' ); ?></option>
												</select>
											</li>
											<li id="content_per_page">
												<label
													for="content_per_page"><?php echo __( 'Images Per Page', 'photo-gallery-wp' ); ?></label>
												<input type="text" name="content_per_page" id="content_per_page"
													   value="<?php echo esc_attr( $row->content_per_page ); ?>"
													   class="text_area"/>
											</li>
										</ul>
									</div>
									<li class="for_slider">
										<label
											for="pause_on_hover"><?php echo __( 'Pause on hover', 'photo-gallery-wp' ); ?></label>
										<input type="hidden" value="off" name="pause_on_hover"/>
										<input type="checkbox" name="pause_on_hover" value="on"
											   id="pause_on_hover" <?php if ( $row->pause_on_hover == 'on' ) {
											echo 'checked="checked"';
										} ?> />
									</li>
									<li class="for_slider">
										<label
											for="sl_pausetime"><?php echo __( 'Pause time', 'photo-gallery-wp' ); ?></label>
										<input type="text" name="sl_pausetime" id="sl_pausetime"
											   value="<?php echo esc_html( $row->description ); ?>" class="text_area"/>
									</li>
									<li class="for_slider">
										<label
											for="sl_changespeed"><?php echo __( 'Change speed', 'photo-gallery-wp' ); ?></label>
										<input type="text" name="sl_changespeed" id="sl_changespeed"
											   value="<?php echo esc_html( stripslashes( $row->param ) ); ?>"
											   class="text_area"/>
									</li>
									<li class="rating-li">
										<label for="rating"><?php echo __( 'Ratings', 'photo-gallery-wp' ); ?></label>
										<select id="rating" name="rating">

											<option <?php if ( $row->rating == 'off' ) {
												echo 'selected';
											} ?> value="off"><?php echo __( 'Off', 'photo-gallery-wp' ); ?></option>
											<option <?php if ( $row->rating == 'dislike' ) {
												echo 'selected';
											} ?>
												value="dislike"><?php echo __( 'Like/Dislike', 'photo-gallery-wp' ); ?></option>
											<option <?php if ( $row->rating == 'heart' ) {
												echo 'selected';
											} ?> value="heart"><?php echo __( 'Heart', 'photo-gallery-wp' ); ?></option>

										</select>
									</li>
								</ul>
								<div id="major-publishing-actions">
									<div id="publishing-action">
										<input type="button" onclick="galleryImgSubmitButton('apply')" value="Save gallery"
											   id="save-buttom" class="button button-primary button-large">
									</div>
									<div class="clear"></div>
								</div>
							</div>
							<div id="ph-gallery-wp-shortcode-box" class="postbox shortcode ms-toggle">
								<h3 class="hndle"><span><?php echo __( 'Usage', 'photo-gallery-wp' ); ?></span></h3>
								<div class="inside">
									<ul>
										<li rel="tab-1" class="selected">
											<h4><?php echo __( 'Shortcode', 'photo-gallery-wp' ); ?></h4>
											<p><?php echo __( 'Copy &amp; paste the shortcode directly into any WordPress post or page.', 'photo-gallery-wp' ); ?></p>
											<textarea class="full"
													  readonly="readonly">[photo_gallery_wp id="<?php echo $row->id; ?>"]</textarea>
										</li>
										<li rel="tab-2">
											<h4><?php echo __( 'Template Include', 'photo-gallery-wp' ); ?></h4>
											<p><?php echo __( 'Copy &amp; paste this code into a template file to include the slideshow within your theme.', 'photo-gallery-wp' ); ?></p>
											<textarea class="full" readonly="readonly">&lt;?php echo do_shortcode("[photo_gallery_wp id='<?php echo $row->id; ?>']"); ?&gt;</textarea>
										</li>
									</ul>
								</div>
							</div>
							<div id="ph-gallery-wp-loader-icons" class="postbox">
								<h3 class="hndle"><span><?php echo __( 'Loading Icons', 'photo-gallery-wp' ); ?></span></h3>
								<div class="inside">
									<label for="ph-gallery-wp-show-hide-loading" class="ph-gallery-wp-show-hide-loading"><?php echo __( ' Show Loading Icon', 'photo-gallery-wp' ); ?>:</label>
       								<?php if(0 != $row->gallery_loader_type): ?>
										<input id="ph-gallery-wp-show-hide-loading" type="checkbox" name="show-hide-loading" value="1" checked/>
									<?php else: ?>
										<input id="ph-gallery-wp-show-hide-loading" type="checkbox" name="show-hide-loading" value="1"/>
									<?php endif; ?>
									<ul>
										<?php for($i = 1; $i < 5; ++$i): ?>
											<li>
												<?php if($i == $row->gallery_loader_type): ?>
													<input id="ph-gallery-wp-loading-img-<?php echo $i; ?> >" type="radio" name="gallery_loader_type" value="<?php echo $i; ?>" checked/>
												<?php else: ?>
													<input id="ph-gallery-wp-loading-img-<?php echo $i; ?>" type="radio" name="gallery_loader_type" value="<?php echo $i; ?>" />
												<?php endif; ?>

												<label for="ph-gallery-wp-loading-img-<?php echo $i; ?>">
													<div>
														<img src="<?php echo PHOTO_GALLERY_WP_IMAGES_URL."/loading/loading-".$i.".svg" ?>" alt="loading Icon" />
													</div>
												</label>
											</li>
										<?php endfor; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php  wp_nonce_field( 'huge_it_gallery_nonce_save_galery', 'huge_it_gallery_nonce_save_galery' ) ?>
			<input type="hidden" name="task" value=""/>
		</form>
	</div>
<?php
require_once( PHOTO_GALLERY_WP_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'gallery-img-admin-video-add-html.php' );
?>