<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'noonpost_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category Theme
 * @package  Noonpost CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/CMB2/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( get_template_directory() . '/includes/cmb2/init.php' ) ) {
	require_once get_template_directory() . '/includes/cmb2/init.php';
} elseif ( file_exists( get_template_directory() . '/includes/CMB2/init.php' ) ) {
	require_once get_template_directory() . '/includes/CMB2/init.php';
}


add_action( 'cmb2_admin_init', 'noonpost_register_contact_page_metabox' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function noonpost_register_contact_page_metabox() {

	/**
	 * Metabox to be displayed on a single page ID
	 */
	$cmb_contact_page = new_cmb2_box( array(
		'id'           => 'noonpost_contact_metabox',
		'title'        => esc_html__( 'Contact Page Options', 'noonpost' ),
		'object_types' => array( 'page' ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		'show_on'      => array(
			'key' => 'page-template', 
			'value' => 'contact.php'
		), // Specific post IDs to display this metabox
	) );
	$cmb_contact_page->add_field( array(
		'name' => esc_html__( 'Contact Form Shortcode', 'noonpost' ),
		'desc' => esc_html__( 'Contact form 7 shortcode for the contact form in the contact page', 'noonpost' ),
		'id'   => 'noonpost_contact_form_shortcode',
		'type' => 'text',
	) );
	$cmb_contact_page->add_field( array(
		'name' => esc_html__( 'Google Map Embed Link', 'noonpost' ),
		'desc' => esc_html__( 'Generate google map embed code from maps.google.com and paste here', 'noonpost' ),
		'id'   => 'noonpost_gmap_embed_link',
		'type' => 'textarea_small',
		'sanitization_cb' => false
	) );

}

add_action( 'cmb2_admin_init', 'noonpost_register_theme_options_metabox' );
/**
 * Hook in and register a metabox to handle a theme options page and adds a menu item.
 */
function noonpost_register_theme_options_metabox() {

	/**
	 * Registers options page menu item and form.
	 */
	$cmb_options = new_cmb2_box( array(
		'id'           => 'noonpost_theme_options_page',
		'title'        => esc_html__( 'NoonPost Theme Options', 'noonpost' ),
		'object_types' => array( 'options-page' ),

		/*
		 * The following parameters are specific to the options-page box
		 * Several of these parameters are passed along to add_menu_page()/add_submenu_page().
		 */

		'option_key'      => 'noonpost_theme_options', // The option key and admin menu page slug.
		'icon_url'        => 'dashicons-palmtree', // Menu icon. Only applicable if 'parent_slug' is left empty.
		// 'menu_title'              => esc_html__( 'Options', 'noonpost' ), // Falls back to 'title' (above).
		// 'parent_slug'             => 'themes.php', // Make options page a submenu item of the themes menu.
		// 'capability'              => 'manage_options', // Cap required to view options-page.
		// 'position'                => 1, // Menu position. Only applicable if 'parent_slug' is left empty.
		// 'admin_menu_hook'         => 'network_admin_menu', // 'network_admin_menu' to add network-level options page.
		// 'priority'                => 10, // Define the page-registration admin menu hook priority.
		// 'display_cb'              => false, // Override the options-page form output (CMB2_Hookup::options_page_output()).
		// 'save_button'             => esc_html__( 'Save Theme Options', 'noonpost' ), // The text for the options-page save button. Defaults to 'Save'.
		// 'disable_settings_errors' => true, // On settings pages (not options-general.php sub-pages), allows disabling.
		// 'message_cb'              => 'noonpost_options_page_message_callback',
		// 'tab_group'               => '', // Tab-group identifier, enables options page tab navigation.
		// 'tab_title'               => null, // Falls back to 'title' (above).
		// 'autoload'                => false, // Defaults to true, the options-page option will be autloaded.
	) );

	/**
	 * Options fields ids only need
	 * to be unique within this box.
	 * Prefix is not needed.
	 */
	$cmb_options->add_field( array(
		'name' => 'General Options',
		'type' => 'title',
		'id'   => 'noonpost_options_general_title'
	) );
	$cmb_options->add_field( array(
		'name' => esc_html__( 'White theme logo', 'noonpost' ),
		'desc' => esc_html__( 'Upload the logo which should be shown when switched to white theme', 'noonpost' ),
		'id'   => 'noonpost_white_logo',
		'type' => 'file',
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => 'Choose Logo' // Change upload button text. Default: "Add or Upload File"
		),
		'query_args' => array(			
			'type' => array(
				'image/gif',
				'image/jpeg',
				'image/jpg',
			 	'image/png',
				'image/svg',
			 ),
		),
		'preview_size' => 'full'
	) );
	$cmb_options->add_field( array(
		'name' => esc_html__( 'Dark theme logo', 'noonpost' ),
		'desc' => esc_html__( 'Upload the logo which should be shown when switched to dark theme', 'noonpost' ),
		'id'   => 'noonpost_dark_logo',
		'type' => 'file',
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => 'Choose Logo' // Change upload button text. Default: "Add or Upload File"
		),
		'query_args' => array(			
			'type' => array(
				'image/gif',
				'image/jpeg',
				'image/jpg',
			 	'image/png',
				'image/svg',
			 ),
		),
		'preview_size' => 'full'
	) );
	$cmb_options->add_field( array(
		'name' => esc_html__( 'Copyright Text', 'noonpost' ),
		'desc' => esc_html__( 'Copyright Text that you want to show in the footer bottom', 'noonpost' ),
		'id'   => 'noonpost_copyright_text',
		'type' => 'textarea_small',
	) );
	$cmb_options->add_field( array(
		'name' => esc_html__( 'Newsletter Form Shortcode', 'noonpost' ),
		'desc' => esc_html__( 'Contact form 7 shortcode for the newsletter form in the top footer', 'noonpost' ),
		'id'   => 'noonpost_newsletter',
		'type' => 'text',
	) );
	$cmb_options->add_field( array(
		'name' => 'Social Media Links',
		'type' => 'title',
		'id'   => 'noonpost_options_sclink_title'
	) );
	$cmb_options->add_field( array(
		'name' => esc_html__( 'Facebook Link', 'noonpost' ),
		'id'   => 'noonpost_facebook_link',
		'type' => 'text_url',
	) );
	$cmb_options->add_field( array(
		'name' => esc_html__( 'Twitter Link', 'noonpost' ),
		'id'   => 'noonpost_twitter_link',
		'type' => 'text_url',
	) );
	$cmb_options->add_field( array(
		'name' => esc_html__( 'Instagram Link', 'noonpost' ),
		'id'   => 'noonpost_insta_link',
		'type' => 'text_url',
	) );
	$cmb_options->add_field( array(
		'name' => esc_html__( 'Youtube Link', 'noonpost' ),
		'id'   => 'noonpost_youtube_link',
		'type' => 'text_url',
	) );
	$cmb_options->add_field( array(
		'name' => 'Contact Page Options',
		'type' => 'title',
		'id'   => 'noonpost_options_contact_page'
	) );
	$cmb_options->add_field( array(
		'name' => esc_html__( 'Contact Form Shortcode', 'noonpost' ),
		'desc' => esc_html__( 'Contact form 7 shortcode for the contact form in the contact page', 'noonpost' ),
		'id'   => 'noonpost_contact_form_shortcode',
		'type' => 'text',
	) );

}

/**
 * Callback to define the optionss-saved message.
 *
 * @param CMB2  $cmb The CMB2 object.
 * @param array $args {
 *     An array of message arguments
 *
 *     @type bool   $is_options_page Whether current page is this options page.
 *     @type bool   $should_notify   Whether options were saved and we should be notified.
 *     @type bool   $is_updated      Whether options were updated with save (or stayed the same).
 *     @type string $setting         For add_settings_error(), Slug title of the setting to which
 *                                   this error applies.
 *     @type string $code            For add_settings_error(), Slug-name to identify the error.
 *                                   Used as part of 'id' attribute in HTML output.
 *     @type string $message         For add_settings_error(), The formatted message text to display
 *                                   to the user (will be shown inside styled `<div>` and `<p>` tags).
 *                                   Will be 'Settings updated.' if $is_updated is true, else 'Nothing to update.'
 *     @type string $type            For add_settings_error(), Message type, controls HTML class.
 *                                   Accepts 'error', 'updated', '', 'notice-warning', etc.
 *                                   Will be 'updated' if $is_updated is true, else 'notice-warning'.
 * }
 */
function noonpost_options_page_message_callback( $cmb, $args ) {
	if ( ! empty( $args['should_notify'] ) ) {

		if ( $args['is_updated'] ) {

			// Modify the updated message.
			$args['message'] = sprintf( esc_html__( '%s &mdash; Updated!', 'noonpost' ), $cmb->prop( 'title' ) );
		}

		add_settings_error( $args['setting'], $args['code'], $args['message'], $args['type'] );
	}
}