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
	 * Constructor to inject dependencies and register the shortcode using WordPress hook.
	 *
	 * @param Renderer $renderer The renderer dependency.
	 */
	public function __construct( Renderer $renderer ) {
		$this->renderer = $renderer;

		// Register the shortcode during the 'init' action to ensure WordPress is fully loaded.
		add_action(
			'init',
			function() {
				add_shortcode( 'renderflex_api', [ $this, 'renderflex_api_shortcode' ] );
			}
		);
	}

	/**
	 * Handle the [renderflex_api] shortcode
	 *
	 * @param array $atts Shortcode attributes
	 * @return string HTML content for the shortcode
	 */
	public function renderflex_api_shortcode( $atts ) {
		// Call the API and render the output
		return $this->renderer->render_api_output( $atts );
	}
}
