<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Lt_Theme
 * @since Ltheme 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/images/logo5.png">
    <title><?php bloginfo( 'name' ); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( bloginfo( 'pingback_url' ) ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Site -->
	<div id="page" class="site">
		<!-- Menu -->
			<header id="masthead" class="site-header" role="banner">	
				<div class="site-header-main">
					<!-- Top-Menu -->
						<div class="site-branding">
							<!-- Logo -->
								<div class="logoContainer">
									<img class="logoP" alt="polska" src="<?php echo get_template_directory_uri(); ?>/images/polska.png">
									<img class="logoP" alt="powiat" src="<?php echo get_template_directory_uri(); ?>/images/powiat.png">
                                    <img class="logoP" alt="powiat_pilski" src="<?php echo get_template_directory_uri(); ?>/images/powiat_pilski.png">
									<img class="logoP" alt="unia" src="<?php echo get_template_directory_uri(); ?>/images/unia.png">
                                    <a href="https://zst-bip.powiat.pila.pl/" target="_blank"><img class="logoP" alt="bip" src="<?php echo get_template_directory_uri(); ?>/images/bip.png"></a>
									<img class="logoP" alt="logo" src="<?php echo get_template_directory_uri(); ?>/images/logo.png">
								</div>
							<!-- .Logo -->
							<!-- Name-Site -->
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<!-- .Name-Site -->
							<!-- Search -->
							    <div class="search"><?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?></div>
							<!-- .Search -->
						</div>
					<!-- .Top-Menu -->
					<!-- Main-Menu -->
                        <?php if ( has_nav_menu( 'primary' ) ) { ?>
                                <!-- Menu-Navigation -->
										<?php if ( has_nav_menu( 'primary' ) ) : ?>
											<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'ltheme' ); ?>">
                                            <a id="resp-menu" class="responsive-menu"><i class="fa fa-reorder"></i> Menu</a>
                                                <?php wp_nav_menu(
														array(
															'theme_location' => 'primary',
															'menu_class' => 'menu',
														));?>
											</nav>
										<?php endif; ?>
                                <!-- .Menu-Navigation -->
						<?php }else {
								wp_list_pages( array(
									'container' => '',
									'title_li' 	=> '',
								));
						}?>
					<!-- .Main-Menu -->
				</div>
			</header>
		<!-- .Menu -->