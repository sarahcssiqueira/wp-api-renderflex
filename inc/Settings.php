<?php
/**
 * Main plugin class
 *
 * @package API_RenderFlex
 */

namespace APIRenderFlex\Inc;

/**
 * Settings class
 */
class Settings {

	/**
	 * Custom constructor for handle WordPress Hooks
	 */
	public function __construct() {

		add_action( 'admin_init', [ $this, 'renderflex_register_settings' ] );
		add_action( 'admin_menu', [ $this, 'renderflex_add_settings_page' ] );
	}

	/**
	 *
	 */
	public function renderflex_register_settings() {
		register_setting( 'renderflex_settings_group', 'renderflex_api_url' );
		// Add settings section.
		add_settings_section(
			'renderflex_settings_section',   // Section ID.
			'RenderFlex API Settings',       // Section Title.
			null,                            // Callback for section description (optional).
			'renderflex-settings'            // Page slug (must match add_options_page).
		);

		// Add settings fields.
		add_settings_field(
			'renderflex_api_url',                   // Field ID.
			'API URL',                              // Field Title.
			[ $this, 'renderflex_api_url_field' ],  // Callback to render field.
			'renderflex-settings',                  // Page slug.
			'renderflex_settings_section'           // Section ID (must match add_settings_section).
		);
	}

	/**
	 * Field rendering callbacks.
	 * */
	public function renderflex_api_url_field() {
		$api_url = get_option( 'renderflex_api_url' );
		echo '<input type="text" id="renderflex_api_url" name="renderflex_api_url" value="' . esc_attr( $api_url ) . '" />';
	}

	/**
	 *  Manage the settings on plugin settings page.
	 */
	public function renderflex_add_settings_page() {
		add_options_page(
			'API RenderFlex Settings',                      // Page title.
			'API RenderFlex',                               // Menu .
			'manage_options',                               // Capability.
			'renderflex_settings',                          // Menu slug.
			[ $this, 'renderflex_render_settings_page' ]    // Function to display the page content.
		);
	}

	/**
	 * Render the plugin settings page on admin dashboard.
	 */
	public function renderflex_render_settings_page() {
		?>
		<div class="wrap">
		<h1>API RenderFlex Settings</h1>
		<form method="post" action="options.php">
		<?php
			settings_fields( 'renderflex_settings_group' );   // Security field (hidden field).
			do_settings_sections( 'renderflex-settings' );    // Output all sections and fields.
			submit_button();                                  // Save button.
		?>
		</form>
		</div>
		<?php
	}

}
