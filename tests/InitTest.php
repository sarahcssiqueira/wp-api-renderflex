<?php
/**
 * Init Class Test.
 *
 * @package API_RenderFlex
 */

use PHPUnit\Framework\TestCase;
use APIRenderFlex\Inc\Init;

class InitTest extends TestCase {

	public function testClassesListReturnsCorrectClasses() {
		// Arrange & Act.
		$classes = Init::classes_list();

		// Assert.
		$expectedClasses = [
			'APIRenderFlex\Inc\Plugin',
			'APIRenderFlex\Inc\Settings',
			'APIRenderFlex\Inc\APIHandler',
			'APIRenderFlex\Inc\Renderer',
			'APIRenderFlex\Inc\Shortcodes',
		];
		$this->assertSame( $expectedClasses, $classes );
	}

	public function testRegisterClassesListInitializesAndCallsInitialize() {
		// Arrange.
		$pluginMock     = $this->createMock( 'APIRenderFlex\Inc\Plugin' );
		$settingsMock   = $this->createMock( 'APIRenderFlex\Inc\Settings' );
		$apiHandlerMock = $this->createMock( 'APIRenderFlex\Inc\APIHandler' );
		$rendererMock   = $this->createMock( 'APIRenderFlex\Inc\Renderer' );
		$shortcodesMock = $this->createMock( 'APIRenderFlex\Inc\Shortcodes' );

		// Ensure 'initialize' method is called where it exists.
		$pluginMock->expects( $this->once() )->method( 'initialize' );
		$settingsMock->expects( $this->once() )->method( 'initialize' );
		$apiHandlerMock->expects( $this->once() )->method( 'initialize' );
		$rendererMock->expects( $this->once() )->method( 'initialize' );
		$shortcodesMock->expects( $this->once() )->method( 'initialize' );

		Init::register_classes_list();

	}

	public function testInstantiateReturnsClassInstance() {
		// Arrange.
		$className = 'APIRenderFlex\Inc\Plugin';

		// Act.
		$instance = $this->invokeMethod( Init::class, 'instantiate', [ $className ] );

		// Assert.
		$this->assertInstanceOf( $className, $instance );
	}

	// Helper function to invoke private methods.
	protected function invokeMethod( $class, $methodName, array $parameters = [] ) {
		$reflection = new \ReflectionClass( $class );
		$method     = $reflection->getMethod( $methodName );
		$method->setAccessible( true );

		return $method->invokeArgs( null, $parameters );
	}
}
