<?php
/**
 *
 *
 * @package @seedwps
 */
namespace seedwps\Custom;

use seedwps\Api\Admin_Settings;
use seedwps\Api\Callbacks\Admin_Callbacks;


class Profile
{
	/**
	 * Store a new instance of the admin settings api
	 * @var Class instance
	 */
	public $admin_settings;

	/**
	 * Store a new instance of the Admin callbacks
	 * @var Class instance
	 */
	public $admin_callbacks;

	/**
	 * Subpages array
	 * @var array
	 */
	public $subpages = array();


	public function register()
	{
		/**
		 * Stores the option name of the Profile Manager Settings array
		 * @var 
		 */
		$option_name = get_option('profile_manager');

		/**
		 * Stores the CPT manager activation option value
		 * It returns true if the CPT option name is activated and false if not. 
		 * @var
		 */
		$activated = isset($option_name) ? $option_name : false;

		if( ! $activated){

			return;
		}

		$this->admin_settings = new Admin_Settings();

		$this->admin_callbacks = new Admin_Callbacks();

		$this->setSubpage();

		$this->admin_settings->addAdminSubPages($this->subpages)->register();

	}

	public function setSubpage()
	{
		/**
		 * Admin login subpage array
		 * @var array
		 */
		$this->subpages = array(
			//Profile Manager subpage
			array(
				'parent_slug'	=> 'seedwps_theme',
				'page_title'	=> 'Profile Manager' ,
				'menu_title'	=> 'Profile Manager',
				'capability' 	=> 'manage_options',
				'menu_slug'		=> 'profile_manager',
				'callback'		=>  array($this->admin_callbacks,'profile_Index')
			)
		);
	}

}