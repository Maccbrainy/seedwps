<?php
/**
 * Admin Pages
 * Use it to write your admin related method by tapping the Settings Api class and callbacks
 */
namespace seedwps\Custom;

use seedwps\Api\Admin_Settings;
use seedwps\Api\Callbacks\Admin_Callbacks;

class Admin 
{
	/**
	 * Store a new instance of the admin settings api
	 * @var Class instance
	 */
	public $admin_settings;
	/**
	 * Admin callbacks class
	 * @var Class instance
	 */
	public $admin_callbacks;

	/**
	 * Pages array
	 * @var array
	 */
	public $pages = array();
	/**
	 * Subpages array
	 * @var array
	 */
	public $subpages = array();


	public function __construct()
	{
		$this->admin_settings = new Admin_Settings();

		$this->admin_callbacks = new Admin_Callbacks();

		$this->activateRegisterSettings();

		$this->activateSettingsSection();

		$this->activateSettingsField();


		/*=========Admin Page==========*/

		$this->pages = array(
			array(
				'page_title' => 'Seedwps Custom Options',
				'menu_title' => 'SEEDWPS',
				'capability' => 'manage_options',
				'menu_slug'  => 'seedwps_theme',
				'callback'	 => array($this->admin_callbacks,'admin_Index'),
				'icon_url'	 => get_template_directory_uri() . '/assets/public/images/admin-icon.png',
				'position' 	 => 110
			)
		);
		/*=========Admin SubPage==========*/

		$this->subpages = array(
			//Custom Post Type subpage
			array(
				'parent_slug'	=> 'seedwps_theme',
				'page_title'	=> 'Custom Post Type' ,
				'menu_title'	=> 'CPT',
				'capability' 	=> 'manage_options',
				'menu_slug'		=> 'cpt_manager',
				'callback'		=>  array($this->admin_callbacks,'cpt_Index')
			),
			//custom css
			array(
				'parent_slug'	=> 'seedwps_theme',
				'page_title'	=> 'Seedwps Custom Css' ,
				'menu_title'	=> 'Custom Css',
				'capability' 	=> 'manage_options',
				'menu_slug'		=> 'css_manager',
				'callback'		=>  array($this->admin_callbacks,'css_Index')
			)
		);

	}

	public function register()
	{
		//Method chaining
		$this->admin_settings->addAdminPages($this->pages)->withSubPage('Dashboard')->addAdminSubPages($this->subpages)->register();
	}

	/*==================================
		Register Settings
	====================================
	*/
	public function activateRegisterSettings()
	{
		$args = array(
			//Theme Support Options
			array(
				'option_group' 	=> 'seedwps_theme_settings' ,
				'option_name' 	=> 'post_formats',
				'sanitize_callback' =>'' 
			),

			//Managers Settings
			array(
				'option_group' 	=> 'seedwps_theme_settings' ,
				'option_name' 	=> 'profile_manager',
				'sanitize_callback' => array($this->admin_callbacks,'checkboxSanitize') 
			),
			array(
				'option_group' 	=> 'seedwps_theme_settings' ,
				'option_name' 	=> 'theme_cpt_manager',
				'sanitize_callback' => array($this->admin_callbacks,'checkboxSanitize') 
			),
			array(
				'option_group' 	=> 'seedwps_theme_settings' ,
				'option_name' 	=> 'theme_css_manager',
				'sanitize_callback' => array($this->admin_callbacks,'checkboxSanitize') 
			),
			array(
				'option_group' 	=> 'seedwps_theme_settings' ,
				'option_name' 	=> 'login_manager',
				'sanitize_callback' => array($this->admin_callbacks,'checkboxSanitize') 
			)
		);

		$this->admin_settings->addSettings($args);
	}

	/*==================================
		settings sections
	====================================
	*/
	public function activateSettingsSection()
	{
		$args = array(

			//Theme Support Options
			array(
				'id'	=> 'theme-options',
				'title'	=>'Theme Options',
				'callback'	=> array($this->admin_callbacks,'theme_Options_Index'),
				'page'		=>'seedwps_theme'
			),
			//Manager Sections
			array(
				'id'	=> 'seedwps_managers_index',
				'title'	=>'Settings Manager',
				'callback'	=> array($this->admin_callbacks,'adminSectionManager'),
				'page'		=>'seedwps_theme'
			)
		);

		$this->admin_settings->addSection($args);
	}

	
	/*==================================
		settings fields
	====================================
	*/
	public function activateSettingsField()
	{
		$args = array(

			//Theme Support Options
			array(
				'id'	=> 'post-formats',
				'title'	=>'Post Formats',
				'callback'	=> array($this->admin_callbacks,'post_Formats_Index'),
				'page'		=>'seedwps_theme',
				'section'	=>'theme-options',
				'args'		=>''
			),
			//Managers fields
			array(
				'id'	=> 'profile_manager',
				'title'	=>'Activate Profile Manager',
				'callback'	=> array($this->admin_callbacks,'checkboxField'),
				'page'		=>'seedwps_theme',
				'section'	=>'seedwps_managers_index',
				'args'		=> array(
					'label_for' => 'profile_manager',
					'class'		=> 'ui-toggle'
				)
			)
		);

		$this->admin_settings->addField($args);
	}

}
