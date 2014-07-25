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
define( WCMKE_CPT, 'employees' );




add_action( 'init', 'wcmke_2014_employees' );

function wcmke_2014_employees() {

    $labels = array( 
		'name'               => __( 'Employees', 'your-plugin-name' ),
		'singular_name'      => __( 'Employee', 'domain' ),
		'add_new'            => _x( 'Add New Employee', 'A person that works for a company', 'domain' ),
		'add_new_item'       => __( 'Add New Employee', 'domain' ),
		'edit_item'          => __( 'Edit Employee', 'domain' ),
		'new_item'           => __( 'New Employee', 'domain' ),
		'view_item'          => __( 'View Employee', 'domain' ),
		'search_items'       => __( 'Search Employees', 'domain' ),
		'not_found'          => __( 'No Employees found', 'domain' ),
		'not_found_in_trash' => __( 'No Employees found in Trash', 'domain' ),
		'parent_item_colon'  => __( 'Parent Employee:', 'domain' ),
		'menu_name'          => __( 'Employees', 'domain' ),
    );

    $args = array( 
		'labels'              => $labels,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'capability_type'     => 'post', 
		'supports'            => array( 
									'title', 'editor', 'author', 'thumbnail', 
									'revisions',
								),
    );

    register_post_type( 'employees', $args );

}


// START SIMPLE LONG TEXT META BOX
// Adding a standard text input field
add_action( 'add_meta_boxes', 'wcmke_add_twitter' );

function wcmke_add_twitter() {

	add_meta_box( 'twitter_id', __( 'Twitter Handle', 'domain' ), 'long_meta_box', 'employees', 'normal', 'default' );

}

function long_meta_box( $post ) {

	$values = get_post_custom( $post->ID );

	$text = isset( $values['twitter_text_box'] ) ? esc_attr( $values['twitter_text_box'][0] ) : '';

	// $positiontext = get_post_meta( get_the_ID(),'twitter_text_box', true );

	?>

	<p>

	  <label for="twitter_text_box">Employment Twitter Handle</label>
	  <input type="text" name="twitter_text_box" id="twitter_text_box" value="<?php  if ( ! empty( $text ) ) { echo $text; }; ?>" />

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
    if ( $post->post_type == 'employees' ) {

        if ( isset( $_POST['twitter_text_box'] ) ) {

        	

        	update_post_meta( $post->ID, 'twitter_text_box', $_POST['twitter_text_box'] );

        } // end if position_text_box

    } // end if is WCMKE_CPT

} // end saving_long_meta_details

// END START SIMPLE LONG TEXT META BOX





// Checking if Fieldmanager is installed: https://github.com/alleyinteractive/wordpress-fieldmanager
// See more demos with this plugin after Fieldmanager has been installed:  https://github.com/alleyinteractive/fieldmanager-demos
add_action( 'init', 'wcmke_fm_dependancy_check', 10 );

function wcmke_fm_dependancy_check() {

	if ( class_exists( Fieldmanager_Field ) ) {

		require_once( WCMKE_META_DIR . 'fm-fields/text-field.php' );

		require_once( WCMKE_META_DIR . 'fm-fields/group-field.php' );

		require_once( WCMKE_META_DIR . 'fm-fields/tax-meta.php' );


	} // end if class exists

} // end checking if field manager is activated

require_once( WCMKE_META_DIR . 'taxes/taxes.php' );

?>