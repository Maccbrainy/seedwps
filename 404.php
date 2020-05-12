<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package seedwps
 */
get_header();?>

<div class="container">
	<div class="flex flex-wrap">
		<div id="primary" class="content-area">
		    <main id="main" class="site-main" role="main">

		        <header class="page-header">
		            <h1 class="page-title"><?php _e( 'Oops! Page not Found', 'seedwps' ); ?></h1>
		        </header>

		    </main><!-- #main -->
		</div><!-- #primary -->
		<div><?php get_sidebar();?></div>
	</div><!-- .flex -->
</div><!-- .container -->
<?php
get_footer();