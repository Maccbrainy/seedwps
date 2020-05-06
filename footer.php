<?php
/**
 * The tempate for diplaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package seedwps
 */
?>
	</div><!-- #content -->

	<?php 
	if(is_customize_preview() ){
		echo '<div id="seedwps-footer-control"></div>';
	}
	?>
		<footer id="colophon" class="site-footer container mx-auto" role="contentinfo">
			<div class="site-info">
				

				<!-- <span class="seperator"> | </span> -->

				<?php
					printf(esc_html__('Theme: %1$s by %2$s.', 'seedwps'), 'SEEDWPS','<a href="http://maccbrainy.com" rel="designer">Maccbrainy<a>');
				?>
			</div> <!-- .site-info -->
		</footer> <!-- #colophon -->
	</div> <!-- #page -->

	<?php wp_footer(); ?>

</body>
</html>