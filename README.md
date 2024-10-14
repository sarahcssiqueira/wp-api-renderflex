# API RenderFlex

[![Project Status: WIP – Initial development is in progress, but there has not yet been a stable, usable release suitable for the public.](https://www.repostatus.org/badges/latest/wip.svg)](https://www.repostatus.org/#wip)
[![License: GPL v2](https://img.shields.io/badge/License-GPL_v2-blue.svg)](https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html)
[![PluginTerritory](https://img.shields.io/badge/Plugin%20Territory-Free-blue.svg?logo=wordpress)]()
[![Release Version](https://img.shields.io/github/release/sarahcssiqueira/api-renderflex.svg?color)](https://github.com/sarahcssiqueira/api-renderflex/releases/latest)
[![Support Level](https://img.shields.io/badge/support-may_take_time-yellow.svg)](#support-level)

API RenderFlex is a versatile **WordPress plugin designed to fetch and display data from external APIs with ease.** Whether you're pulling in content from third-party services or custom APIs, this plugin gives you full control over how the data is rendered. Built-in support for both Gutenberg blocks and shortcodes, developers and site owners can easily customize the output using filters and hooks, making it reusable for a wide range of APIs and use cases. Perfect for those who want flexible, dynamic API integration without sacrificing customization.

# Usage

Clone the repository with `git clone https://github.com/sarahcssiqueira/api-renderflex` or download the latest [release](https://github.com/sarahcssiqueira/api-renderflex/releases). Place it in the **/wp-content/plugins/** folder of your WordPress installation.

## Shortcode

[TO DO]

## Block

[TO DO]

## Templates

[TO DO]

# Development

Contribute with this project.

## Install Setup Packages

- `npm install && composer install`

## Start Development Server

- `npm run dev`

## Run PHPCS

- `composer cs`
- `composer cbf`

# Build

To optimize and minify assets to the build folder with wepback run:

- `npm run build`

### PHP Classes

Classes are automatically loaded by the Init class with the method **register_classes_list**:

```
    /**
	 * Loop through the classes list, initialize them,
	 * and call the initialize() method if it exists
	 */
	public static function register_classes_list() {
		foreach ( self::classes_list() as $class ) {
			$classname = self::instantiate( $class );
			if ( method_exists( $classname, 'initialize' ) ) {
				$classname->initialize();
			}
		}
	}
```

To add your new classes, make sure add them to the array present in the method **classes_list**:

```
	/**
	 * Store the classes inside an array
	 *
	 * @return array Full list of classes
	 */
	public static function classes_list() {
		return [
			Plugin::class,
            YourNewClass::class,
		];
	}
```
