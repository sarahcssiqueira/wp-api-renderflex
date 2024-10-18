<?php
/**
 * Class to bootstrap the plugin
 *
 * @package API_RenderFlex
 */

namespace APIRenderFlex\Inc;

/**
 * Bootstrap the plugin.
 */
class Init {

	/**
	 * Class properties.
	 *
	 * @var Plugin $plugin
	 * @var Settings $settings
	 * @var APIHandler $apihandler
	 * @var Renderer $renderer
	 * @var Shortcodes $shortcodes
	 */
	private $plugin;
	private $settings;
	private $apihandler;
	private $renderer;
	private $shortcodes;

	/**
	 * Constructor to inject dependencies.
	 *
	 * @param Plugin     $plugin     The Plugin class.
	 * @param Settings   $settings   The Settings class.
	 * @param APIHandler $apihandler The API handler class.
	 * @param Renderer   $renderer   The Renderer class.
	 * @param Shortcodes $shortcodes The Shortcodes class.
	 */
	public function __construct( Plugin $plugin, Settings $settings, APIHandler $apihandler, Renderer $renderer, Shortcodes $shortcodes ) {
		$this->plugin     = $plugin;
		$this->settings   = $settings;
		$this->apihandler = $apihandler;
		$this->renderer   = $renderer;
		$this->shortcodes = $shortcodes;
	}

	/**
	 * Initializes the classes with injected dependencies.
	 */
	public function register_classes_list() {
		$this->plugin     = new Plugin();
		$this->settings   = new Settings();
		$this->apihandler = new APIHandler();
		$this->renderer   = new Renderer( $this->apihandler );
		$this->shortcodes = new Shortcodes();

	}
}
