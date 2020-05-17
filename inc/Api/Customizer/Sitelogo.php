<?php
/**
 * Theme customizer Site logo
 *
 * @package seedwps
 */
namespace seedwps\Api\Customizer;

use WP_Customize_Image_Control;


class Sitelogo
{
	
	public function register($wp_customize)
	{
		//Site logo customization
		$wp_customize->get_section('title_tagline')->priority = '13';
		$wp_customize->get_section('title_tagline')->title = __('Site title/tagline/logo','seedwps');

		//Upload logo
		$wp_customize->add_setting('site_logo',array(
			'default-image' =>'',
			'sanitize_callback' =>'esc_url_raw')
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,'site_logo', array(
					'label'    => __('Upload your logo', 'seedwps'),
					'type'     => 'image',
					'section'  => 'title_tagline',
					'priority' => 12,
				)
			)
		);

	}
}