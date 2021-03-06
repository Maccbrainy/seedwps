<?php
/**
 * Theme customizer
 *
 * @package seedwps
 */

namespace seedwps\Api;

use seedwps\Api\Customizer\Header;
use seedwps\Api\Customizer\Footer;
use seedwps\Api\Customizer\Sitelogo;


class Customizer
{
	/**
	 * Register default hooks and actions for WordPress
	 * @return 
	 */
	
	public function register()
	{
		add_action('customize_register', array($this,'setup'));
	}

	/**
	 * Store all the classes in an array
	 * @return All full list of classes
	 */
	public function get_Classes()
	{
		return [
			Sitelogo::class,
			Header::class,
			Footer::class
		];
	}

	/**
	 * Add postMessage support for site title and description for the Theme Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function setup($wp_customize)
	{
		$get_Classes = $this->get_Classes();
		foreach ($get_Classes as $class) {
			$service = new $class;
			if (method_exists($class, 'register')) {
				$service-> register($wp_customize);
			}
		}
	}

	/**
	 * Generate inline CSS for customizer options
	 * here you should list all your custom options with the relative class and CSS attribute it affects
	 */
	public function output()
	{
		echo '<!--Customizer CSS--> <style type="text/css">';
			echo self::css( '#sidebar', 'background-color', 'seedwps_sidebar_background_color' );
			echo self::css( '.site-footer', 'background-color', 'seedwps_footer_background_color' );
			echo self::css( '.site-header', 'background-color', 'seedwps_header_background_color' );
			echo self::css( '.site-header', 'color', 'seedwps_header_text_color' );
			echo self::css( '.site-header a', 'color', 'seedwps_header_link_color' );
		echo '</style><!--/Customizer CSS-->';
	}

	/**
	 * This will generate a line of CSS for use in selective refresh. If the setting
	 * ($mod_name) has no defined value, the CSS will not be output.
	 * 
	 * @uses get_theme_mod()
	 * @param string $selector CSS selector
	 * @param string $property The name of the CSS *property* to modify
	 * @param string $mod_name The name of the 'theme_mod' option to fetch
	 * @param bool $echo Optional. Whether to print directly to the page (default: true).
	 * @return string Returns a single line of CSS with selectors and a property.
	 */
	public static function css( $selector, $property, $theme_mod )
	{
		$theme_mod = get_theme_mod($theme_mod);

		if ( ! empty( $theme_mod ) ) {
			return sprintf('%s { %s:%s; }', $selector, $property, $theme_mod );
		}
	}

	/**
	 * This will generate text for use inin selective refresh. If the setting
	 * ($mod_name) has no defined value, the text will not be output.
	 * 
	 * @uses get_theme_mod()
	 * @param string $mod_name The name of the 'theme_mod' option to fetch
	 * @param bool $echo Optional. Whether to print directly to the page (default: true).
	 * @return string Returns a single line of text.
	 */
	public static function text( $theme_mod )
	{
		$theme_mod = get_theme_mod($theme_mod);

		if ( ! empty( $theme_mod ) ) {
			return $theme_mod;
		}
	}

	
}