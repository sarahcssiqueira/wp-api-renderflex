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
	 * Custom constructor for handle WordPress Hooks
	 */
	public static function initialize() {

		$self = new self();
		// for testing while developing purposes only.
		add_action( 'admin_notices', [ $self, 'render_api_output' ] );
	}

	/**
	 * Renders the output from the API call using APIHandler's renderflex_fetch_api_data() method.
	 *
	 * This method calls the API via renderflex_fetch_api_data(), passing in the necessary API URL, headers, and arguments.
	 * It then processes the API response and renders the appropriate output based on the data returned.
	 *
	 * @return void This function outputs the data directly, so it does not return a value.
	 */
	public function render_api_output() {

		$api_url = 'https://dev.to/api/articles?username=sarahcssiqueira';
		$header  = [];
		$args    = [];

		$results = ( new APIHandler() )->renderflex_fetch_api_data( $api_url, $header, $args );

		// print_r($results);

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
