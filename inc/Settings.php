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
	public static function initialize() {

		$self = new self();
		add_action( 'admin_init', [ $self, 'renderflex_register_settings' ] );
		add_action( 'admin_menu', [ $self, 'renderflex_add_settings_page' ] );
	}

	/**
	 *
	 */
	public function renderflex_register_settings() {
		// add sections and fields
	}


	/**
	 *  Manage the settings on plugin settings page
	 */
	public function renderflex_add_settings_page() {
		add_options_page(
			'API RenderFlex Settings',   // Page title
			'API RenderFlex',            // Menu title
			'manage_options',            // Capability
			'renderflex_settings',        // Menu slug
			[ $this, 'renderflex_render_settings_page' ]   // Function to display the page content
		);
	}

	/**
	 * Render the plugin settings page on admin dashboard
	 */
	public function renderflex_render_settings_page() {
		?>
		<div class="wrap">
		<h1>API RenderFlex Settings</h1>
		</div>
		<?php
	}

}
