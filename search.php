<?php
/**
 * The template file for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package seedwps
 */

get_header(); ?>

<div class="container mx-auto">

	<div class="flex flex-wrap">

		<div id="primary" class="content-area">

			<main id="main" class="site-main" role="main">
				<?php
					if( have_posts () ) :

				?>
						<header>
							<h1 class="page-title">
								<?php 
									printf(/*translators: %s: Search Term.*/
										esc_html__('Search Results for: %s','seedwps'),'<span>'.get_search_query(). '<span/>'
									);
								?>
							</h1>
						</header> <!-- Header-page -->
				<?php

						/*Start the Loop*/

						while (have_posts()) :
							the_post();

							get_template_part('views/content','search');
						endwhile;

						the_posts_navigation();

					else:

						get_template_part('views/content','none');

					endif;

				?>
			</main><!-- #main -->
		</div><!-- .content-area -->
		<div id="sidebar">
			<?php get_sidebar(); ?>
		</div><!-- #sidebar -->
	</div><!-- .flex -->
</div><!-- .container -->

<?php get_footer();?>