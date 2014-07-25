<?php

/**
 * undocumented class
 *
 * @package default
 * @author 
 **/





function add_tax_meta() {

	$fm_wcmke_tax_term = new Fieldmanager_Group( array(
		'name'     => 'meta_fields',

		'limit'          => 0,
		'add_more_label' => 'Add another set of fields',
		'sortable'       => true,
		'collapsible'    => true,
		'label'          => 'Fields',

		'children' => array(
			'text'         => new Fieldmanager_Textfield( 'Text Field' ),
			'autocomplete' => new Fieldmanager_Autocomplete( 'Autocomplete', array( 'datasource' => new Fieldmanager_Datasource_Post() ) ),
			'textarea'     => new Fieldmanager_TextArea( 'TextArea' ),
			'media'        => new Fieldmanager_Media( 'Media File' ),
			'checkbox'     => new Fieldmanager_Checkbox( 'Checkbox' ),
			'select'       => new Fieldmanager_Select( 'Select Dropdown', array( 'options' => array( 'One', 'Two', 'Three' ) ) ),
			'richtextarea' => new Fieldmanager_RichTextArea( 'Rich Text Area' ),
		)
	) );

	$fm_wcmke_tax_term->add_term_form( 'Meta Fields', 'category' );
}

add_action( 'init', 'add_tax_meta', 15 );

// get this info on the frontend by using Fieldmanager_Util_Term_Meta()->get_term_meta( $cat_object->term_id, 'category', 'meta_fields', true );
