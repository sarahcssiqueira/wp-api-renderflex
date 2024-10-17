<?php
/**
 * Test the Init class for the API_RenderFlex plugin.
 *
 * @package API_RenderFlex
 */

use PHPUnit\Framework\TestCase;
use APIRenderFlex\Inc\Init;
use APIRenderFlex\Inc\Plugin;
use APIRenderFlex\Inc\Settings;
use APIRenderFlex\Inc\APIHandler;
use APIRenderFlex\Inc\Renderer;
use APIRenderFlex\Inc\Shortcodes;

class InitTest extends TestCase {
	private $pluginMock;
	private $settingsMock;
	private $apiHandlerMock;
	private $rendererMock;
	private $shortcodesMock;
	private $init;

	protected function setUp(): void {
		// Create mocks for the dependencies
		$this->pluginMock     = $this->createMock( Plugin::class );
		$this->settingsMock   = $this->createMock( Settings::class );
		$this->apiHandlerMock = $this->createMock( APIHandler::class );
		$this->shortcodesMock = $this->createMock( Shortcodes::class );

		// Create a mock for the Renderer class
		$this->rendererMock = $this->createMock( Renderer::class );

		// Instantiate the Init class with the mocks
		$this->init = new Init(
			$this->pluginMock,
			$this->settingsMock,
			$this->apiHandlerMock,
			$this->rendererMock,
			$this->shortcodesMock
		);
	}

	public function testRegisterClassesList() {
		// Expect the initialize method to be called on each mock
		$this->pluginMock->expects( $this->once() )
						 ->method( 'initialize' );

		$this->settingsMock->expects( $this->once() )
						   ->method( 'initialize' );

		$this->apiHandlerMock->expects( $this->once() )
							 ->method( 'initialize' );

		// Set up the expectation that a new Renderer will be created with the APIHandler
		$this->rendererMock->expects( $this->once() )
						   ->method( 'initialize' );

		// Call the method we want to test
		$this->init->register_classes_list();
	}
}
