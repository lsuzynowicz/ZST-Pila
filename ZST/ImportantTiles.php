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
 * Template Name: ImportantTiles
 * @package WordPress
 * @subpackage Lt_Theme
 * @since Ltheme 1.0
 */

get_header(); ?>
<!-- Site-Main -->
			<div class="site-inner">
				<!-- Site-Main-Content -->
					<div class="site-inner-content">
						<!-- Slider -->
                            <?php echo do_shortcode('[slide-anything id="573"]'); ?>
						<!-- .Slider -->
						<!-- Content -->
							<div id="content" class="page-site-content">
								<!-- Post -->
									<article class="single_article">
							            <?php while (have_posts()) : the_post();  ?>
							                <p class="single_article__title"><?php the_title(); ?></p>
							                <div class="single_article__dateAndCategoryWrapper">
							                    <p class="single_article__date">Dodano: <?php sin_entry_date(); ?> </p>
							                </div>
							                <div class="single_article__text"><?php the_content(); ?>
							                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="single_article__goBack">Powrót</a>
							            <?php endwhile; ?>
							        </article>
								<!-- .Post -->
							</div>
                        <!-- .Content -->
					</div>
				<!-- .Site-Main-Content -->
				<!-- Site-Main-Map -->
					<div class="mapContent">
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9571.836729748222!2d16.715027830627452!3d53.14682708949256!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbe67035ff5ea713f!2zWmVzcMOzxYIgU3prw7PFgiBUZWNobmljem55Y2ggdyBQaWxl!5e0!3m2!1spl!2spl!4v1572902031069!5m2!1spl!2spl" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
					</div>
				<!-- .Site-Main-Map -->
			</div>
		<!-- .Site-Main -->
	<?php get_footer(); ?>
	</div>
<!-- Site-Main -->
</body>
</html>
