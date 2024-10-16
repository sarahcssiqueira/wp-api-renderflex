<?php
/**
 * Manage Shortcodes
 *
 * @package API_RenderFlex
 */

namespace APIRenderFlex\Inc;

class Shortcodes {

	/**
	 * Initialize the class and register shortcode
	 */
	public static function initialize() {
		$self = new self();
		add_shortcode( 'renderflex_api_other', [ $self, 'renderflex_api_shortcode' ] );
	}

	/**
	 * Handle the [renderflex_api] shortcode
	 *
	 * @param array $atts Shortcode attributes
	 * @return string HTML content for the shortcode
	 */
	public function renderflex_api_shortcode( $atts ) {
		// Fetch API URL from settings.
		$api_url = get_option( 'renderflex_api_url' );

		// Merge attributes with default values.
		$atts = shortcode_atts(
			[
				'api_url' => $api_url,  // Use default or passed API URL.
			],
			$atts
		);

		// Call the API and render the output
		$renderer = new Renderer();
		return $renderer->render_api_output( $atts );
	}
}
