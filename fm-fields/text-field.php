<?php

/**
 * Fieldmanager text field - simple
 *
 * @package default
 * @author 
 **/
class WC_Mke_Fields_2014 {

	// This function tells the class what to fire
	function __construct() {

		add_action( 'init', array( $this, 'add_text_field' ), 15 );

	}

	public function add_text_field() {

		$fm = new Fieldmanager_Textfield( array(
			'name'           => 'repeating_text_field',
			'label'          => 'Text Field',
			// 'limit'          => 0,
			'add_more_label' => 'Add another field',
			'sortable'       => true,
		) );

		$fm->add_meta_box( 'Standalone Text Field', WCMKE_CPT );
	}

} // END class 

new WC_Mke_Fields_2014;
