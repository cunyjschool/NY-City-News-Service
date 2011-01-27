<?php
/**
 * migrate_yapb_to_wordpress.php
 * Migrate any and all yapb thumbnails to WordPress' featured posts functionality
 */

require_once( '../../../wp-load.php' );

global $wpdb, $blog_id;
// Get all of the yapb results from the database
$results = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix . "yapbimage;" );
echo "\nReturned " . count( $results ) . " results from the database\n\n";

foreach( $results as $key => $image ) {

	// Only convert YAPB posts that don't already have featured images
	if ( !has_post_thumbnail( $image->post_id ) ) {
		$filename = str_replace( '/wp-content/blogs.dir/' . $blog_id . '/files', '', $image->URI );
		$wp_filetype = wp_check_filetype(basename($filename), null );
		$attachment = array(
			'post_mime_type' => $wp_filetype['type'],
			'post_title' => preg_replace('/\.[^.]+$/', '', basename( $filename ) ),
			'post_content' => '',
			'post_status' => 'inherit'
			);
		$upload_dir = wp_upload_dir();
		// Filename to insert an attachment must be the absolute path on the server
		$filename = $upload_dir['basedir'] . $filename;	
		$attach_id = wp_insert_attachment( $attachment, $filename, $image->post_id );
		echo "Adding $image->ID as attachment to $image->post_id. Attach #$attach_id\n";
		// you must first include the image.php file
		// for the function wp_generate_attachment_metadata() to work
		require_once(ABSPATH . "wp-admin" . '/includes/image.php');
		// Filename to generate different thumbnail versions needs to have the URL
		$filename = str_replace( $upload_dir['basedir'], $upload_dir['baseurl'], $filename );
		$attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
		wp_update_attachment_metadata( $attach_id,  $attach_data );
		// Set it as a featured image
		update_post_meta( $image->post_id, '_thumbnail_id', $attach_id );
		echo "Added attach #$attach_id as featured image to post $image->post_id\n\n";
	} else {
		echo "Post $image->post_id already has a featured image.\n\n";
	}
	
} // END foreach( $results as $post )

// Get all of the image thumbnails from the database.
// For each thumbnail, add it as an attachment if it isn't already
// Set it as a featured image


?>