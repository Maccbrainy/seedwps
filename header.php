<?php
/**
 * The header of our theme
 *
 * This is the template that displays all the <head>section and everthing up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package seedwps
 */
?>

<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
	<title><?php bloginfo('name'); wp_title();?></title>
	<meta name="description" content="<?php bloginfo('description');?>">
	<meta charset="<?php bloginfo('charset')?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php if(is_singular() && pings_open(get_queried_object()) );?>
	<link rel="pingback"  href="<?php bloginfo('pingback_url');?>">

	<?php wp_head();?>
</head>

<body <?php body_class('container');?>>
	<?php wp_body_open();?>

	<div id="page" class="site">
		<header id="masthead" class="site-header" role="banner">
			<?php 
			if(is_customize_preview() ) {
				echo '<div id="seedwps-header-control"></div>';
			}
			?>

			<div class="container container-fluid">

				<div class="row">
					<div class="col-xs-12 col-sm-4">
						
						<div class="site-branding">
							<h1 class="site-title">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
										<?php svg('wordpress');?>
										<span><?php bloginfo( 'name' ); ?></span>
									</a>
								</h1>
								<?php
								$description = get_bloginfo( 'description', 'display' );
								if ( $description || is_customize_preview() ) :
								?>
									<h3 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h3>
								<?php
								endif;
								?>
						</div> <!-- .site-branding -->
					</div><!-- .col-xs-12 col-sm-4 -->
					<div class="col-xs-12 col-sm-8">
						<nav id="site-navigation" class="main-navigation" role="navigation">
							<?php
								if(has_nav_menu('primary')):
									wp_nav_menu(
										array(
											'theme_location' =>'primary',
											'menu_id' =>'primary-menu',
											'walker' => new seedwps\Core\WalkerNav()
										));
								endif;
							?>
						</nav> <!-- #site-navigation -->
					</div><!-- .col-xs-12 col-sm-8 -->
				</div><!-- .row -->
			</div><!-- .container -->
		</header><!-- .masthead -->
		<div id="content" class="site-content">


		
	

