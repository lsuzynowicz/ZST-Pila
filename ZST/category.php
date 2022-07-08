<?php
/**
 * The template for displaying category pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package WordPress
 * @subpackage Lt_Theme
 * @since Ltheme 1.0
 */

get_header(); ?>
<!-- Site-Main -->
    <!-- Content -->
        <?php $category=get_the_category(); $name=$category[0]->name;?>
        <div class="categorySubSite__titleWrapper"><h1 class="articles_title_first"><?php echo $name ?></h1></div>
        <!-- Post -->
            <?php category_posts(); ?>
        <!-- .Post -->
    <!-- .Content -->
<!-- .Site-Main -->
	<?php get_footer(); ?>