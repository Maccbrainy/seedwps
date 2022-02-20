<?php
/**
 * Callbacks for Admin Settings API
 *
 * @package @seedwps
 */
namespace seedwps\Api\Callbacks;

/**
 * Settings Api callback class
 */
class Admin_Callbacks
{
	/*========================
		Admin pages callbacks
	 ==========================*/
	 /**
	  * Admin main page callback
	  * @return
	  */
	public function dashboard_Index()
	{
		return require_once( get_template_directory() . '/inc/Pages/dashboard.php' );
	}

	/**
	 * Admin subpage Profile callback
	 * @return
	 */
	public function profile_Index()
	{
		return require_once( get_template_directory() . '/inc/Pages/profile.php' );
	}

	/**
	 * Admin subpage custom css callback
	 * @return
	 */
	public function css_Index()
	{
		return require_once( get_template_directory() . '/inc/Pages/css.php' );		
	}


	/*===========================
		Settings Section callbacks
	 ==========================*/

	//Theme options support setting sections callback
	public function theme_Options_Index (){
		echo 'Activate and Deactivate Specific Support Theme Options';
	}

	/*=============================
		Settings Field callbacks
	 ==============================*/

	//Theme options support setting field callback
	public function post_Formats_Index()
	{
		$options = get_option('seedwps_theme_options');
		$formats = array('aside','gallery','link','image','quote','status','video','audio','chat');
		$output= '';
		foreach ($formats as $format) {
			$checked = ( empty($options[$format]) ? '': 'checked' );
			$output.='<input type="checkbox" id="'.$format.'" name="seedwps_theme_options['.$format.']" value="1" '.$checked.'>'.$format.'</label><br>';
		}
		echo $output;
	}

}