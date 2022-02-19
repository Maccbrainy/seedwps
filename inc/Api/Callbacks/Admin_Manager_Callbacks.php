<?php
/**
 * Callbacks for Admin Manager Settings API
 *
 * @package @seedwps
 */
namespace seedwps\Api\Callbacks;


/**
 * Settings Api manager callback class
 */
class Admin_Manager_Callbacks
{
		

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
		// dd($args);
		$name = $args ['label_for'];
		$classes = $args ['class'];
		$checkbox = get_option($name);

		echo '<input type="checkbox" name="'.$name.'" value="1" class="'.$classes.'" '.($checkbox ? 'checked' : '').'>';
	}

}