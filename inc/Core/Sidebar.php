<?php

namespace seedwps\Core;

class Sidebar
{
	/**
	 * register default hooks and actions for Wordpress
	 * @return
	 */
	public function register()
	{
		add_action('widgets_init',array($this,'widgets_Init'));
	}
	/*
		Define the sidebar
	 */
	public function widgets_Init()
	{
		register_sidebar(array(
			'name' => esc_html__('Sidebar','seedwps'),
			'id' => 'seedwps-sidebar',
			'description' => esc_html__('Default sidebar to add all your widgets.','seedwps'),
			'before_widget' =>'<section id="%1$s" class="widget %2$s p-2">',
			'after_widget' => '</section',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
	}
}