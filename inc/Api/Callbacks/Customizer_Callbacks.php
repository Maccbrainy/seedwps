<?php
/**
 * Theme customizer callbacks
 *
 * @package @seedwps
 */
namespace seedwps\Api\Callbacks;

class Customizer_Callbacks
{
	//header customization
	public function blog_index()
	{
		bloginfo('name');
	}

	public function description_index()
	{
		bloginfo('description');
	}
}