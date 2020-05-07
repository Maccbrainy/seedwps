<?php


namespace seedwps\Setup;

class Menus 
{
	/**
	 * Register default hooks and actions for Wordpress
	 * @return
	 */
	public function register()
	{
		add_action('after_setup_theme', array($this,'menus'));
	}
		
	public function menus()
	{
	/*
	Register all menu of the theme here
	*/
		register_nav_menus (array(
			'primary' => esc_html__('Primary Header Navigation','seedwps')
		));
	}
}