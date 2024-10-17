<?php
/**
 * Renderer class
 *
 * @package API_RenderFlex
 */

namespace APIRenderFlex\Inc;

/**
 *
 */
class Renderer {
	/**
	 * APIHandler instance
	 *
	 * @var APIHandler
	 */
	private $apihandler;

	/**
	 * Constructor to inject the APIHandler dependency
	 *
	 * @param APIHandler $apihandler The APIHandler dependency.
	 */
	public function __construct( APIHandler $apihandler ) {
		$this->apihandler = $apihandler;
	}

	/**
	 * Renders the output from the API call using APIHandler's renderflex_fetch_api_data() method.
	 *
	 * This method calls the API via renderflex_fetch_api_data(), passing in the necessary API URL, headers, and arguments.
	 * It then processes the API response and renders the appropriate output based on the data returned.
	 *
	 * @param $atts
	 *
	 * @return void This function outputs the data directly, so it does not return a value.
	 */
	public function render_api_output( $atts ) {

		// Get stored values from the settings.
		$default_api_url = get_option( 'renderflex_api_url' );

		// Define default parameters and merge with user-provided attributes.
		$atts = shortcode_atts(
			[
				'api_url' => $default_api_url,  // Use the stored default API URL.
			],
			$atts
		);

		$api_url = $atts['api_url'];
		$header  = [];
		$args    = [];

		// Use the injected APIHandler to fetch the API data.
		$results = $this->apihandler->renderflex_fetch_api_data( $api_url, $header, $args );

		?>
		<?php if ( ! empty( $results ) ) : ?>
			<?php foreach ( $results as $result ) : ?>
				<div>
					<h2><?php echo esc_html( $result ['title'] ); ?></h2>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
		<?php
	}

}
