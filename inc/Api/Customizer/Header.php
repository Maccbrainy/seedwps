<?php
/**
 * Theme-customizer Header 
 *
 * @package seedwps
 */
namespace seedwps\Api\Customizer;

use seedwps\Api\Customizer;
use WP_Customize_Color_Control;
use seedwps\Api\Callbacks\Customizer_Callbacks;

class Header
{ 
	public $customizer_callbacks;

	public function __construct()
	{
		$this->customizer_callbacks = new Customizer_Callbacks;
	}

	/**
	 * register default hooks and actions for WordPress
	 * @return
	 */
	public function register($wp_customize)
	{

		$wp_customize->get_section('header_image')->priority = '15';
		$wp_customize->get_section('header_image')->title = __('Header Image/Color settings','seedwps');
		

		//Settings for header background color
		$wp_customize -> add_setting('seedwps_header_background_color', array(
			'default'  => '#ffffff',
			'transport' => 'postMessage', //or refresh if you want the entire page to reload
		) );

		//Settings for header text color
		$wp_customize -> add_setting('seedwps_header_text_color', array(
			'default'  => '#333333',
			'transport' => 'postMessage', //or refresh if you want the entire page to reload
		) );

		//Settings for header link color
		$wp_customize -> add_setting('seedwps_header_link_color', array(
			'default'  => '#004888',
			'transport' => 'postMessage', //or refresh if you want the entire page to reload
		) );


		//Control for header background color
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,'seedwps_header_background_color', array(
					'label'    => __('Header background Color', 'seedwps'),
					'section'  => 'header_image',
					'settings' => 'seedwps_header_background_color',
				)
			)
		);

		//Control for header text color
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,'seedwps_header_text_color', array(
					'label'    => __('Header Text Color', 'seedwps'),
					'section'  => 'header_image',
					'settings' => 'seedwps_header_text_color',
				)
			)
		);


		//Control for header link color
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,'seedwps_header_link_color', array(
					'label'    => __('Header link Color', 'seedwps'),
					'section'  => 'header_image',
					'settings' => 'seedwps_header_link_color',
				)
			)
		);


		$wp_customize->get_setting('blogname')->transport = 'postMessage';
		$wp_customize->get_setting('blogdescription')->transport = 'postMessage';

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'blogname', array(
				'selector' => '.site-title a',
				'render_callback' => array($this->customizer_callbacks,'blog_index') ));
				
			$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
				'selector' => '.site-description',
				'render_callback' => array($this->customizer_callbacks,'description_index') ));


			$wp_customize->selective_refresh->add_partial( 'seedwps_header_background_color', array(
				'selector' => '#seedwps-header-control',
				'render_callback' => array( $this, 'outputCss' ),
				'fallback_refresh' => true
			) );
			$wp_customize->selective_refresh->add_partial( 'seedwps_header_text_color', array(
				'selector' => '#seedwps-header-control',
				'render_callback' => array( $this, 'outputCss' ),
				'fallback_refresh' => true
			) );
			$wp_customize->selective_refresh->add_partial( 'seedwps_header_link_color', array(
				'selector' => '#seedwps-header-control',
				'render_callback' => array( $this, 'outputCss' ),
				'fallback_refresh' => true
			) );
		}
	}


	/**
	 * Generate inline CSS for customizer async reload
	 */
	public function outputCss()
	{
		echo '<style type="text/css">';
			echo Customizer::css('.site-header','background-color', 'seedwps_header_background_color');

			echo Customizer::css('.site-header','color', 'seedwps_header_text_color');

			echo Customizer::css('.site-header a','color', 'seedwps_header_link_color');
		echo '<style>';
	}

}