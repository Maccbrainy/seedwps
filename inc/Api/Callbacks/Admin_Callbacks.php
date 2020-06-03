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
	public function admin_Index()
	{
		return require_once( get_template_directory() . '/views/admin/index.php' );
	}

	/**
	 * Admin subpage custom post type callback
	 * @return
	 */
	public function cpt_Index()
	{
		return require_once( get_template_directory() . '/views/admin/cpt.php' );
	}
	/**
	 * Admin subpage custom css callback
	 * @return
	 */
	public function css_Index()
	{
		return require_once( get_template_directory() . '/views/admin/css.php' );		
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
		$options = get_option('post_formats');
		$formats = array('aside','gallery','link','image','quote','status','video','audio','chat');
		$output= '';
		foreach ($formats as $format) {
			$checked = ( @$options[$format]==1 ? 'checked':'' );
			$output.='<input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.'>'.$format.'</label><br>';
		}
		echo $output;
	}


	/*=============================
		Manager Callback Settings
	===============================*/

	public function checkboxSanitize($input)
	{
		// return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
		return (isset($input) ? true : false);
	}

	public function adminSectionManager()
	{
		echo 'Manage the sections and features of this theme by activating the checkboxes from the following list.';
	}

	public function checkboxField($args)
	{
		var_dump($args);

		return;
	}
}