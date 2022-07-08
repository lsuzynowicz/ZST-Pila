<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Lt_Theme
 * @since Ltheme 1.0
 */

get_header(); ?>
<!-- Site-Main -->
    <!-- Slider -->
        <?php masterslider(1); ?>
	<!-- .Slider -->
    <!-- Content -->
        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title"><?php _e( 'Ups! Nie można znaleźć tej strony!', 'zstTheme' ); ?></h1>
            </header>

            <div class="page-content">
                <p><?php _e( 'Wygląda na to, że nic nie znaleziono w tej lokalizacji. Może spróbuj wyszukać?', 'zstTheme' ); ?></p>

                <?php get_search_form(); ?>
            </div>
        </section>
    <!-- .Content -->
<!-- .Site-Main -->
	<?php get_footer(); ?>