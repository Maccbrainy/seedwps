<?php
/**
 * Enqueue.
 */
namespace seedwps\Setup;

class Enqueue 
{
	/**
	 * Register default hooks and actions for Wordpress
	 * @return
	 */
	public function register()
	{
		add_action('admin_enqueue_scripts', array($this,'admin_Scripts'));
		add_action('wp_enqueue_scripts', array($this,'enqueue_Scripts'));
	}
		/*	
		========================
		ADMIN ENQUEUE FUNCTIONS
		========================
	*/
		/**
	 * Notice the mix() function in wp_enqueue_...
	 * It provides the path to a versioned asset by Laravel Mix using querystring-based 
	 * cache-busting (This means, the file name won't change, but the md5. Look here for 
	 * more information: https://github.com/JeffreyWay/laravel-mix/issues/920 )
	 */
		/**
		 * Admin enqueue scripts
		 * @param  $hook
		 * @return
		 */
	public function admin_Scripts($hook)
	{
		// dd($hook);

		$enqueue_pages_array = array(
			'toplevel_page_seedwps_theme',
			'seedwps_page_cpt_manager',
			'seedwps_page_css_manager'
		);

		if (in_array($hook, $enqueue_pages_array)) 
		{
			wp_enqueue_style('admin-css', mix('css/admin.css'), array(),'1.0.0', 'all');
		}
		
		if ('toplevel_page_seedwps_theme' == $hook){
		
		wp_enqueue_media();
		
		wp_enqueue_script('admin-js', mix('js/admin.js'), array(), '1.0.0', true);

		}
	}

		/*	
		===========================
		FRONT-END ENQUEUE FUNCTIONS
		===========================
	*/

	public function enqueue_Scripts()
	{
		// Deregister the built-in version of jQuery from WordPress
		if(! is_customize_preview() ) {
			wp_deregister_script('jquery');
		}

		//CSS
		wp_enqueue_style('main', mix('css/style.css'), array(),'1.0.0', 'all');

		//JS
		wp_enqueue_script('main', mix('js/app.js'), array(), '1.0.0', true);

		// Extra
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

}