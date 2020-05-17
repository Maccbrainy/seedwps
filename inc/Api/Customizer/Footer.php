<?php
/**
 * Theme-customizer Footer 
 *
 * @package seedwps
 */
namespace seedwps\Api\Customizer;

use WP_Customize_Control;
use WP_Customize_Color_Control;

use seedwps\Api\Customizer;
use seedwps\Api\Callbacks\Customizer_Callbacks;

class Footer
{
	
	/**
	 * register default hooks and actions for WordPress
	 * @return
	 */
	public function register($wp_customize)
	{
		$wp_customize ->add_section('seedwps_footer_section', array(
			'title' => __('Footer','seedwps'),
			'description' => __('Customize the Footer'),
			'priority' => 162
		));

		$wp_customize->add_setting('seedwps_footer_background_color', array(
			'default' => '#ffffff',
			'transport' => 'postMessage', //or refresh if you want the entire page to reload
		));

		$wp_customize->add_setting('seedwps_footer_copy_text', array(
			'default' => 'Proudly powered by SEEDWPS',
			'transport' => 'postMessage', //or refresh if you want the entire page to reload
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'seedwps_footer_background_color', array(
				'label' => __('Background Color', 'seedwps'),
				'section' => 'seedwps_footer_section',
				'settings' => 'seedwps_footer_background_color',
			)
		 ) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'seedwps_footer_copy_text', array(
				'label' => __('Copyright Text', 'seedwps'),
				'section' => 'seedwps_footer_section',
				'settings' => 'seedwps_footer_copy_text',
			)
		 ) );


		if(isset($wp_customize->selective_refresh)) {
			$wp_customize->selective_refresh->add_partial(
				'seedwps_footer_background_color', array(
					'selector' => '#seedwps-footer-control',
					'render_callback' => array($this,'outputCss'),
					'fallback_refresh' => true
				)
			);

			$wp_customize->selective_refresh->add_partial(
				'seedwps_footer_copy_text', array(
					'selector' => '#seedwps-footer-copy-control',
					'render_callback' => array($this,'outputText'),
					'fallback_refresh' => true
				)
			);
		}
	}

	/**
	 * Generte inline css for customizer async reload
	 */
	public function outputCss()
	{
		echo '<style type="text/css">';
			echo Customizer::css('.site-footer','Background-color', 'seedwps_footer_background_color');
		echo '</style>';
	}

	/**
	 * Generate inline text for customizer async reload
	 */
	public function outputText()
	{
		echo Customizer::text( 'seedwps_footer_copy_text' );
	}
}