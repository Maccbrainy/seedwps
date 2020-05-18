<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package seedwps
 */
get_header();?>

<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<div id="primary" class="content-area">
			    <main id="main" class="site-main" role="main">

			        <header class="page-header">
			            <h1 class="page-title"><?php _e( 'Oops! Page not Found', 'seedwps' ); ?></h1>
			        </header>

			    </main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- .col-sm-8 -->
		<div class="col-sm-4"><?php get_sidebar();?></div><!-- .col-sm-4 -->
	</div><!-- .row-->
</div><!-- .container -->
<?php
get_footer();