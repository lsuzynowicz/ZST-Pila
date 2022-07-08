<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * Template Name: Archives
 * @package WordPress
 * @subpackage Lt_Theme
 * @since Ltheme 1.0
 */

get_header(); ?>
<!-- Site-Main -->
    <!-- Content -->
        <div class="archive__wrapper">
        <h1 class="articles_title_first"><?php the_title(); ?></h1>
            <div class="archive__subWrapper">
                <!-- Search-Archive -->
                    <?php get_template_part( 'widgets/search', 'archive' ); ?>
                <!-- .Search-Archive --> 
                <!-- Post -->
                    <?php archive_posts(); ?>
                <!-- .Post -->
            </div>
        </div>
    <!-- .Content -->
<!-- .Site-Main -->
	<?php get_footer(); ?>
