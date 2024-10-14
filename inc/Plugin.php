<?php
/**
 * Main plugin class
 *
 * @package API_RenderFlex
 */

namespace APIRenderFlex\Inc;

/**
 * Main class
 */
class Plugin {
	/**
	 * Custom constructor for handle WordPress Hooks
	 */
	public static function initialize() {

		$self = new self();
		add_action( 'admin_notices', [ $self, 'display_hello_world' ] );
		register_activation_hook( __FILE__, [ $self, 'api_renderflex_plugin_activate' ] );
		register_deactivation_hook( __FILE__, [ $self, 'api_renderflex_plugin_deactivate' ] );
	}

	/**
	 * Display 'Hello from the API Render Flex!' message on admin panel
	 */
	public function display_hello_world() {
		?>
		<div class="notice notice-success is-dismissible">
			<p><?php esc_html_e( 'Hello from the API Render Flex!', 'api-renderflex' ); ?></p>
		</div>
		<?php
	}

	/**
	 * Performs actions when plugin is activated.
	 *
	 * @return void
	 */
	public function api_renderflex_plugin_activate() {
		// End process if PHP version does not meet requirements.
		if ( version_compare( PHP_VERSION, APIRENDERFLEX_PHP_MINIMUM, '<' ) ) {
			wp_die(
			/* translators: %s: version number */
				esc_html( sprintf( __( 'API Render Flex requires PHP version %s or higher', 'api-renderflex' ), APIRENDERFLEX_PHP_MINIMUM ) ),
				esc_html( __( 'Error Activating', 'api-renderflex' ) )
			);
		}

		// End process if WordPress version does not meet requirements.
		if ( version_compare( get_bloginfo( 'version' ), APIRENDERFLEX_WP_MINIMUM, '<' ) ) {
			wp_die(
			/* translators: %s: version number */
				esc_html( sprintf( __( 'API Render Flex requires WordPress version %s or higher', 'api-renderflex' ), APIRENDERFLEX_WP_MINIMUM ) ),
				esc_html( __( 'Error Activating', 'api-renderflex' ) )
			);
		}
	}


	/**
	 * Performs actions when plugin is deactivated.
	 *
	 * @return void
	 */
	public function api_renderflex_plugin_deactivate() {
		// Don't run code if PHP version does not meet requirements.
		if ( version_compare( PHP_VERSION, APIRENDERFLEX_PHP_MINIMUM, '<' ) ) {
			return;
		}
	}
}
