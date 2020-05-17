<?php
/**
 * This theme uses PSR-4 and OOP logic instead of procedural coding
 * Every function, hook and action is properly divided and organized
 * into related folders and files
 *
 * @package seedwps
 */

namespace seedwps;

final class Init 
{
	/**
	 * Store all the classes inside an array
	 * @return  array full list of classes
	 */
	
	public static function get_Services()
	{
		return[
			Setup\Menus::class,
			Setup\Setups::class,
			Setup\Enqueue::class,
			Core\Sidebar::class,
			Api\Customizer::class
		];
	}

	/**
	 * Loop through the classes, initialize them, and call the register() method if it exits
	 * @return
	 */

	public static function register_Services()
	{
		foreach (self::get_Services() as $class) {
			$method = self::instantiate($class);
			if(method_exists($method, 'register')){
				$method->register();
			}
		}
	}
	/**
	 * [Initialize the class]
	 * @param  [class] $class [class from the services array]
	 * @return [class instance]        [new instance of the class]
	 */
	private static function instantiate($class)
	{
		$service = new $class;
		return $service;
	}

}