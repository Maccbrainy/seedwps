<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contians both the current comments and the comment form.
 *
 * @link   https://codex.wordpress.org/Template_Hierarchy
 *
 * @package  seedwps
 */


/**
 * If the current post is protected by a password and the visitor has not yet entered the password, we will return early without loading the comments.
 */

if(post_password_required() ) :
	return;
endif;

?>

<div id="comments" class="comments-area">
	<?php
		if( have_comments() ):
			//We have comments
	?>
	<h2 class="comments-title">
		<?php
			printf(
				esc_html( _nx('%d Comment.', '%d Comments.', get_comments_number(), 'seedwps')), absint( get_comments_number() )
			);
		?>
	</h2><!-- .comments-title -->
	<?php if(get_comment_pages_count() > 1 && get_option('page_comments') ) :
		//Are there comments to navigate through?
	?>
	<nav id="comment-nav-above" class="navigation comment-navigation">
		<h2 class="screen-reader-text"><?php
			esc_html_e('Comment navigation', 'seedwps');
		?>	
		</h2>
		<div class="nav-links">
			<div class="nav-previous">
				<?php
				previous_comments_link(esc_html__('Older Comments', 'seedwps'));?>
			</div><!-- .nav-previous -->
			<div class="nav-next">
				<?php
				next_comments_link(esc_html__('Newer Comments', 'seedwps'));?>
			</div><!-- .nav-next -->
		</div><!-- .nav-links -->
	</nav><!-- #comment-nav-above -->

<?php endif; //Check for next navigation. ?>
	<ol class="comment-list">
		<?php
			$arg = array(
					'style' =>'ol',
					'short_ping' =>true,
					'format' =>'html5',
					'echo' =>true,
				);
			
			wp_list_comments($arg);
		?>
	</ol><!-- .comment-list -->

	<?php if(get_comment_pages_count() > 1 && get_option('page_comments') ) ://Are there comments to navigate through? ?>
	<nav id="comment-nav-below" class="navigation comment-navigation">
		<h2 class="screen-reader-text"><?php
			esc_html_e('Comment navigation', 'seedwps');
		?>	
		</h2>
		<div class="nav-links">
			<div class="nav-previous">
				<?php
				previous_comments_link(esc_html__('Older Comments', 'seedwps'));?>
			</div><!-- .nav-previous -->
			<div class="nav-next">
				<?php
				next_comments_link(esc_html__('Newer Comments', 'seedwps'));?>
			</div><!-- .nav-next -->
		</div><!-- .nav-links -->
	</nav><!-- #comment-nav-above -->

		<?php endif; //Check for next navigation. 

	endif;//Check for have_comments().

	//If comment are closed and there are comments, let's leave a little note.
	
	if (! comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')):

		?>

	<p class="no-comments">
		<? esc_html_e('Comments are closed.', 'seedwps');?>
	</p>
<?php endif;
	comment_form();
?>
</div><!-- #comments -->