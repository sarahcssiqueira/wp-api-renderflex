<?php
/**
 * Manage Shortcodes
 *
 * @package API_RenderFlex
 */

namespace APIRenderFlex\Inc;

class Shortcodes {

	/**
	 * Renderer instance
	 *
	 * @var Renderer
	 */
	private $renderer;

	/**
	 * Constructor to inject dependencies
	 *
	 * @param Renderer $renderer The renderer dependency.
	 */
	public function __construct( Renderer $renderer ) {
		$this->renderer = $renderer;
	}

	/**
	 * Register shortcode using WordPress hook.
	 */
	public function initialize() {
		add_shortcode( 'renderflex_api', [ $this, 'renderflex_api_shortcode' ] );
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
		return $this->renderer->render_api_output( $atts );
	}
}
