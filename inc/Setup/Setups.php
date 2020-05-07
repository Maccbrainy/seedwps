<?php


namespace seedwps\Setup;

class Setups 
{
	/**
	 * register dafault hooks and actions for Wordpress
	 * @return
	 */
	public function register()
	{
		add_action('after_setup_theme', array($this,'theme_Support_Setups'));
	}

	public function theme_Support_Setups()
	{
		/*
         * You can activate this if you're planning to build a multilingual theme
         */
        // load_theme_textdomain( 'paragonx', get_template_directory() . '/languages' );
        

		/*Add default posts and comments RSS feed links to head*/
		
		add_theme_support('automaatic-feed-links');

		 /**
        * Add woocommerce support and woocommerce override
        */
        // add_theme_support( 'woocommerce' );
        
        add_theme_support( 'title-tag' );

        add_theme_support('post-thumbnails');

        add_theme_support( 'html5', array(
                'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
            ) );

        add_theme_support( 'customize-selective-refresh-widgets' );

        add_theme_support( 'custom-background', apply_filters( 'seedwps_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        add_theme_support( 'post-formats', array( 
            'aside',
            'gallery',
            'link',
            'image',
            'quote',
            'status',
            'video',
            'audio',
            'chat',
        ) );

        add_theme_support('custom-header');
        

	}
}