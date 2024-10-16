# API RenderFlex

[![Project Status: WIP – Initial development is in progress, but there has not yet been a stable, usable release suitable for the public.](https://www.repostatus.org/badges/latest/wip.svg)](https://www.repostatus.org/#wip)
[![License: GPL v2](https://img.shields.io/badge/License-GPL_v2-blue.svg)](https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html)
[![PluginTerritory](https://img.shields.io/badge/Plugin%20Territory-Free-blue.svg?logo=wordpress)]()
[![Release Version](https://img.shields.io/github/release/sarahcssiqueira/wp-api-renderflex.svg?color)](https://github.com/sarahcssiqueira/wp-api-renderflex/releases/latest)
[![Support Level](https://img.shields.io/badge/support-may_take_time-yellow.svg)](#support-level)

API RenderFlex is a versatile **WordPress plugin designed to fetch and display data from external APIs with ease.** Whether you're pulling in content from third-party services or custom APIs, this plugin gives you full control over how the data is rendered. Built-in support for both Gutenberg blocks and shortcodes, developers and site owners can easily customize the output using filters and hooks, making it reusable for a wide range of APIs and use cases. Perfect for those who want flexible, dynamic API integration without sacrificing customization.

## Features

    - **Easy Initialization:** Automatically registers all necessary classes for optimal functionality.
    - **Admin Settings Menu:** Provides a user-friendly interface to set your API URL.
    - **Data Rendering:** Utilizes the API handler to fetch and display data.
    - **Shortcode Support:** Quickly render API data in your content with a simple shortcode.

## Usage

After activating the plugin, you can configure it as follows:

### Setting the API URL

    - Go to Settings > API Render Flex in your WordPress admin panel.
    - Enter your API URL in the designated field.
    - Save your changes.

### Rendering Data with Shortcode

To display the rendered data from your API, simply use the following shortcode in your posts or pages:

`[renderflex_api]`

This shortcode will call the API handler and display the fetched data where the shortcode is placed.

## Development

This section provides information for developers who wants to use and/or extend this project. Designed to be extensible and customizable for developers, if you’re interested in contributing to the project, you can follow the guidelines outlined in this section to set up your development environment and understand the plugin's architecture.

To begin contributing to API RenderFlex, you will need to set up your local development environment. Ensure you have the following prerequisites installed:

    - Node.js: Required for managing JavaScript dependencies and running the development server.
    - Composer: A dependency manager for PHP, used to install the necessary PHP packages.


To clone the repository, run the following command: `git clone https://github.com/sarahcssiqueira/api-renderflex.git`

Alternatively, you can download the [latest release](https://github.com/sarahcssiqueira/wp-api-renderflex/releases) as a ZIP file from the Releases page on GitHub.

### Install Setup Packages

Run the following commands to install JavaScript and PHP dependencies:

- `npm install && composer install`

### Start Development Server

You can run the development server with:

- `npm run dev`

### Run PHPCS

To ensure code quality, you can check the coding standards using:

- `composer cs`
- `composer cbf`

### Build

When you're ready to optimize and minify assets for production, run:

- `npm run build`

### PHP Classes

The plugin is organized into several key classes, each responsible for different functionalities. Familiarizing yourself with these classes will help you understand how to extend the plugin. Classes are automatically loaded by the Init class with the method **register_classes_list** on Init class:

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

To add new classes, make sure add them to the array present in the method **classes_list**:

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

### Current Classes Overview

    - **Init:** This class is responsible for registering and initializing all necessary classes required by the plugin.
    - **Settings:** Creates an admin menu where users can configure the API URL.
    - **Rendered:** This class uses the API handler to fetch and render data from the specified API.
    - **APIHandler:** Handles API requests and responses.
    - **Shortcode:** Implements the shortcode [renderflex_api] to display the rendered data.

## To Do List

A an evolving project, and we have several exciting features and enhancements planned for future releases. The following is a list of items that we aim to implement, which will enhance functionality, improve user experience, and expand integration capabilities.

### Shortcode

Improve the flexibility of the existing [renderflex_api] shortcode to allow additional parameters for customized data rendering.

### Block

Develop a dedicated Gutenberg block for easier integration of API data within the WordPress block editor, allowing users to drag and drop elements without using shortcodes.

### Templates

Introduce customizable templates for displaying API data, enabling users to tailor the look and feel of the rendered output to match their site's design.

### Test Coverage Implementation:

Establish a comprehensive test coverage strategy to ensure the reliability and stability of the plugin. This will include unit tests, integration tests, and end-to-end testing to validate all functionalities and enhance code quality.

### Set Up Deployment Workflow

Create a CI/CD deployment workflow for the API RenderFlex plugin. This will automate the deployment process, ensuring that the latest changes are seamlessly integrated and deployed to the production environment. Consider using GitHub Actions or another CI/CD tool to manage this workflow effectively

## License

This plugin is licensed under the GPL v2 License.

## Support

For support and feature requests, please create an issue in the GitHub repository.
