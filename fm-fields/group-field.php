<?php

/**
 * Fieldmanager group class
 *
 * @package default
 * @author 
 **/
class WC_Mke_Group_Fields_2014 {

	function __construct() {

		add_action( 'init', array( $this, 'grouped_meta' ), 15 );

	}

	public function grouped_meta() {

		$months = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );

		$fm = new Fieldmanager_Group( array(
			'name'     => 'meta_fields',

			'limit'          => 0,
			'add_more_label' => 'Add another set of fields',
			'sortable'       => true,
			'collapsible'    => true,
			'label'          => 'Fields',

			'children' => array(
				'text'         => new Fieldmanager_Textfield( 'Text Field' ),
				'autocomplete' => new Fieldmanager_Autocomplete( 'Autocomplete', array( 'datasource' => new Fieldmanager_Datasource_Post() ) ),
				'local_data'   => new Fieldmanager_Autocomplete( 'Autocomplete without ajax', array( 'datasource' => new Fieldmanager_Datasource( array( 'options' => $months ) ) ) ),
				'textarea'     => new Fieldmanager_TextArea( 'TextArea' ),
				'media'        => new Fieldmanager_Media( 'Media File' ),
				'checkbox'     => new Fieldmanager_Checkbox( 'Checkbox' ),
				'radios'       => new Fieldmanager_Radios( 'Radio Buttons', array( 'options' => array( 'One', 'Two', 'Three' ) ) ),
				'select'       => new Fieldmanager_Select( 'Select Dropdown', array( 'options' => array( 'One', 'Two', 'Three' ) ) ),
				'richtextarea' => new Fieldmanager_RichTextArea( 'Rich Text Area' ),
			)
		) );

		$fm->add_meta_box( 'Single-Level Group', WCMKE_CPT );

	}

} // END class 

new WC_Mke_Group_Fields_2014;
