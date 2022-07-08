<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Lt_Theme
 * @since Ltheme 1.0
 */

get_header(); ?>
<!-- Site-Main -->
    <!-- Single_Article -->
        <article class="single_article">
            <?php while (have_posts()) : the_post();  ?>
                <div class="single_article__imageWrapper">
                    <?php the_post_thumbnail( 'post-thumbnail' ); ?>
                </div>
                <p class="single_article__title"><?php the_title(); ?></p>
                
                <div class="single_article__text"><div class="single_article__text_box"><?php the_content(); ?></div></div>
                <div class="single_article__dateAndCategoryWrapper">
                        <p class="single_article__category">Kategoria: <?php the_category(); ?></p>
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
            <?php endwhile;  ?>
        </article> 
    <!-- .Single_Article -->
<!-- .Site-Main -->
	<?php get_footer(); ?>