<?php
/**
 * The template for displaying all pages
 *
 * The is the template that displays all pages by default.
 * Please note that this is the WordPress construct for pages 
 * 
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package seedwps
 */
get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<div class="content-area" id="primary">
				<main id="main" class="site-main" role="main">
					<?php
						/*
						Start the Loop
						 */
						while ( have_posts() ):
							the_post();

							get_template_part('views/content-pages/content', 'page' );


							//if comments are open or we have at least one comment, load up the comment template.
							
							if(comments_open() || get_comments_number() ) :
								comments_template();
						endif;

					endwhile;

					?>
				</main><!-- #main -->
			</div><!-- .content-area #primary-->
		</div><!-- .col-sm-8 -->
		<div class="col-sm-4">
			<?php get_sidebar();?>
		</div>
	</div><!-- .flex -->
</div><!-- .container -->