<?php

/**
 * Plugin Name: WCMKE 2014 Meta Boxes with Field Manager
 * Plugin URI:
 * Description: WCMKE 2014 Meta Boxes with Field Manager
 * Author: Dan Beil
 * Author URI:
 * Version: 0.1
 */

// This defines the Plugin's directory path with a trailing slash
define( WCMKE_META_DIR, plugin_dir_path( __FILE__ ) );

// Used to quickly change which CPT this applies to
define( WCMKE_CPT, 'post' );


// Adding a standard text input field
add_action( 'add_meta_boxes', 'wcmke_add_twitter' );

function wcmke_add_twitter() {

	add_meta_box( 'test_id', 'TITLE', 'long_meta_box', WCMKE_CPT, 'normal', 'core' );

}

function long_meta_box( $post ) {

	$values = get_post_custom( $post->ID );
	$text = isset( $values['position_text_box'] ) ? esc_attr( $values['position_text_box'][0] ) : ”;
	$positiontext = get_post_meta( get_the_ID(),'position_text_box', true );

	?>

	<p>

	  <label for="position_text_box">Employment Position Title</label>
	  <input type="text" name="position_text_box" id="position_text_box" value="<?php  if ( ! empty( $positiontext ) ) { echo $text; }; ?>" />

	</p>

<?php }




// Saves the content of our meta box
add_action( 'save_post', 'save_long_meta_details' );
 
// WP meta box attributes
function save_long_meta_details() {

    global $post;

    // Skip auto save
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {

        return $post_id;

    }

	// Check for your post type
    if( $post->post_type == WCMKE_CPT ) {

        if( isset( $_POST['position_text_box'] ) ) {

        	update_post_meta( $post->ID, 'position_text_box', $_POST['position_text_box'] );

        } // end if position_text_box

    } // end if is WCMKE_CPT

} // end saving_long_meta_details
















add_action( 'init', 'wcmke_fm_dependancy_check', 99 );

function wcmke_fm_dependancy_check() {

	if ( class_exists( Fieldmanager_Field ) ) {

		require_once( WCMKE_META_DIR . 'fm-fields/text-field.php' );

		require_once( WCMKE_META_DIR . 'fm-fields/group-field.php' );


	} // end if class exists

} // end checking if field manager is activated










?>