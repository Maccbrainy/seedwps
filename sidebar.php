<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package seedwps
 */

if(!is_active_sidebar('seedwps-sidebar')):
	return;
endif;

	if(is_customize_preview() ) {
		echo '<div id="seedwps-sidebar-control"></div>';
	}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php
		dynamic_sidebar('seedwps-sidebar');
	?>
</aside><!-- #secondary -->