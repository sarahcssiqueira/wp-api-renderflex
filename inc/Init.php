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

	private $plugin;
	private $settings;
	private $apihandler;
	private $renderer;
	private $shortcodes;

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
		$this->plugin->initialize();
		$this->settings->initialize();
		$this->apihandler->initialize();
		$this->renderer = new Renderer( $this->apihandler );
		$this->shortcodes->initialize();

	}
}
