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
 * Template Name: OPW
 * @package WordPress
 * @subpackage Lt_Theme
 * @since Ltheme 1.0
 */

get_header(); ?>
<!-- Site-Main -->
    <!-- Slider -->
        <?php masterslider(3); ?>
    <!-- .Slider -->
    <!-- Post -->
        <article class="page_article">
            <?php while (have_posts()) : the_post();  ?>
                <p class="single_article__title"><?php the_title(); ?></p>
                
                <div class="single_article__text"><div class="single_article__text_box"><?php the_content(); ?></div></div>
                <div class="single_article__dateAndCategoryWrapper">
                    <p class="single_article__date">Dodano: <?php the_date(); ?> </p>
                </div>
                <div id="button_all">
                    <button class="learn-more">
                        <span class="circle" aria-hidden="true">
                        <span class="icon arrow"></span>
                        </span>
                        <a class="button-text" href="<?php echo esc_url( home_url( '/' ) ); ?>">Powrót</span></a>
                    </button>
                </div>
            <?php endwhile; ?>
        </article>
    <!-- .Post -->
    <!-- .Site-Main-Content -->
    <!-- RightMenu -->
        <?php get_template_part( 'widgets/calendar', 'widgets' ); ?>
    <!-- .RightMenu -->
    <!-- Facebook-widget -->
        <?php get_template_part( 'widgets/facebook', 'widgets' ); ?>
    <!-- .Facebook-widget -->
<!-- .Site-Main -->
	<?php get_footer(); ?>