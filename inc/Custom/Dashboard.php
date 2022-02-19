<?php
/**
 * Admin Dashboard
 * Use it to write your admin related method by tapping the Settings Api class and callbacks
 */
namespace seedwps\Custom;


use seedwps\Api\Admin_Settings;
use seedwps\Api\Callbacks\Admin_Callbacks;
use seedwps\Api\Callbacks\Admin_Manager_Callbacks;


class Dashboard 
{
	/**
	 * Store a new instance of the BaseController
	 * @var Class instance
	 */
	public $managers = array();
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
	 * Admin Manager Callbacks class
	 * @var Class instance
	 */
	public $admin_manager_callbacks;

	/**
	 * Pages array
	 * @var array
	 */
	public $pages = array();
	/**
	 * Subpages array
	 * @var array
	 */

	public function __construct()
	{
		

		$this->admin_settings = new Admin_Settings();

		$this->admin_callbacks = new Admin_Callbacks();

		$this->admin_manager_callbacks = new Admin_Manager_Callbacks();

		$this->activateRegisterSettings();

		$this->activateSettingsSection();

		$this->activateSettingsField();


		/*=========Admin Page==========*/
		/**
		 * Admin Pages array
		 * @var array
		 */
		$this->pages = array(
			array(
				'page_title' => 'Seedwps Settings Options',
				'menu_title' => 'SEEDWPS',
				'capability' => 'manage_options',
				'menu_slug'  => 'seedwps_theme',
				'callback'	 => array($this->admin_callbacks,'dashboard_Index'),
				'icon_url'	 => get_template_directory_uri() . '/assets/public/images/admin-icon.png',
				'position' 	 => 110
			)
		);

	}

	public function register()
	{
		//Method chaining
		$this->admin_settings->addAdminPages($this->pages)->withSubPage('Dashboard')->register();
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
				'option_name' 	=> 'seedwps_theme_options',
				'sanitize_callback' =>'' 
			),
			
			/**Managers Settings Array

			 * Profile manager Settings array
			 */
			array(
				'option_group' 	=> 'seedwps_theme_settings' ,
				'option_name' 	=> 'profile_manager',
				'sanitize_callback' => array($this->admin_manager_callbacks,'checkboxSanitize') 
			),

			/*CSS manager Settings array*/
			array(
				'option_group' 	=> 'seedwps_theme_settings' ,
				'option_name' 	=> 'css_manager',
				'sanitize_callback' => array($this->admin_manager_callbacks,'checkboxSanitize') 
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

			//Theme Support Options Array
			array(
				'id'	=> 'seedwps_managers_index',
				'title'	=>'Theme Options',
				'callback'	=> array($this->admin_callbacks,'theme_Options_Index'),
				'page'		=>'seedwps_theme'
			),
			//Manager Sections Array
			array(
				'id'	=> 'seedwps_managers_index',
				'title'	=>'Settings Manager',
				'callback'	=> array($this->admin_manager_callbacks,'adminSectionManager'),
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

			//Theme Support Options Array
			array(
				'id'	=> 'post-formats',
				'title'	=>'Post Formats',
				'callback'	=> array($this->admin_callbacks,'post_Formats_Index'),
				'page'		=>'seedwps_theme',
				'section'	=>'seedwps_managers_index',
				'args'		=>''
			),

			/*============Managers fields================*/
			/**
			 * Profile Manager Array
			 */
			array(
				'id'	=> 'profile_manager',
				'title'	=>'Activate Profile Manager',
				'callback'	=> array($this->admin_manager_callbacks,'checkboxField'),
				'page'		=>'seedwps_theme',
				'section'	=>'seedwps_managers_index',
				'args'		=> array(
					'label_for' => 'profile_manager',
					'class'		=> 'ui-toggle'
				)
			),
			
			/**
			 * Custom Css Manager Array
			 */
			array(
				'id'	=> 'css_manager',
				'title'	=>'Activate Custom CSS Manager',
				'callback'	=> array($this->admin_manager_callbacks,'checkboxField'),
				'page'		=>'seedwps_theme',
				'section'	=>'seedwps_managers_index',
				'args'		=> array(
					'label_for' => 'css_manager',
					'class'		=> 'ui-toggle'
				)
			)
		);

		$this->admin_settings->addField($args);
	}

}
