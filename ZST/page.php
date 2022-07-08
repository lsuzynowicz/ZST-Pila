<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Lt_Theme
 * @since Ltheme 1.0
 */

get_header(); ?>
<!-- Site-Main -->
    <!-- Slider -->
        <?php masterslider(2); ?>
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