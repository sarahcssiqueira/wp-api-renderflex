<?php
/**
 * API Handler class
 *
 * This class retrieves data from external APIs.
 *
 * @package API_RenderFlex
 */

namespace APIRenderFlex\Inc;

/**
 * Class APIHandler
 *
 * Handles the API data fetching functionalities.
 */
class APIHandler {

	/**
	 * Custom constructor for handle WordPress Hooks
	 */
	public function __construct() {
		$self = new static();
		add_action( 'init', [ $self, 'renderflex_fetch_api_data' ] );
	}

	/**
	 *
	 * Handles the API requests with wp_remote_request() and wp_remote_retrieve_body().
	 *
	 * @param string $url The URL for the API request.
	 * @param array  $header Optional. An associative array of headers to include in the API request. Default is an empty array.
	 * @param array  $args Optional. An array of additional arguments for the API request (such as method, body, etc.). Default is an empty array.
	 */
	public function renderflex_fetch_api_data( $url, $header = [], $args = [] ) {
		// Prepare the arguments for wp_remote_request.
		$args = array_merge(
			[
				'method'  => 'GET',
				'timeout' => 30,
				'headers' => $header,
			],
			$args
		);

		// Make the API request using wp_remote_request.
		$response = wp_remote_request( $url, $args );

		if ( is_wp_error( $response ) ) {
			return 'Error: ' . $response->get_error_message();
		}

		$body = wp_remote_retrieve_body( $response );
		$data = json_decode( $body, true );

		if ( json_last_error() !== JSON_ERROR_NONE ) {
			return 'Error decoding JSON: ' . json_last_error_msg();
		}

		return $data;

	}

}
