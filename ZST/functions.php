<?php
/**
 * zstTheme functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Lt_Theme
 * @since zstTheme 1.0
 */


if ( ! function_exists( 'zstTheme_setup' ) ) :
	function zstTheme_setup() {
		load_theme_textdomain( 'zstTheme' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 240,
				'width'       => 240,
				'flex-height' => true,
			)
		);
		add_theme_support( 'post-thumbnails' );
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'zstTheme' ),
			)
		);
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);
		add_theme_support(
			'post-formats',
			array(
				'aside',
				
			)
		);
		add_theme_support( 'editor-styles' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'zstTheme_setup' );

function zstTheme_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Kalendarz', 'zstTheme' ),
			'id'            => 'calendar',
			'description'   => __( 'Tutaj dodaj kalendarz.', 'zstTheme' ),
		)
	);

	register_sidebar( 
		array(
		    'name'          => __( 'Archive', 'zstTheme' ),
			'id'            => 'archive',
			'description'   => __( 'Tutaj dodaj panel do Archive.', 'zstTheme' ),
	  )
	);

	register_sidebar(
		array(
			'name'          => __( 'Facebook', 'zstTheme' ),
			'id'            => 'facebook',
			'description'   => __( 'Tutaj dodaj widget facebooka.', 'zstTheme' ),
		)
	);
}
add_action( 'widgets_init', 'zstTheme_widgets_init' );

function zstTheme_scripts() {
    wp_enqueue_style( 'zstTheme-style', get_stylesheet_uri() );
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/font/genericons/genericons.css', array());
	wp_enqueue_style( 'open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,700,800', array());
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css', array());
	wp_enqueue_style( 'imagehover', get_template_directory_uri() . '/css/imagehover.min.css', array(), null);
    wp_enqueue_script( 'zstTheme-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), null, true);
	wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), null, true);
	wp_localize_script(
		'zstTheme-script',
		'screenReaderText',
		array(
			'expand'   => __( '', 'zstTheme' ),
			'collapse' => __( '', 'zstTheme' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'zstTheme_scripts' );

function set_jetpack_publicize_default_message() {
    global $post;
 
    if ( ! empty( $post->ID ) ) {
        if ( ! $wpas_title = get_post_meta( $post->ID, '_wpas_mess', true ) ) {
            /* translators: %s: the name of the blog */
            $custom_message = sprintf(
                __( 'Check out this new awesome blog post on %s!',
                    'set-jetpack-publicize-default-message'
                ),
                get_bloginfo( 'name' )
            );
            update_post_meta( $post->ID, '_wpas_mess', $custom_message );
        }
    }
}
add_action( 'post_submitbox_misc_actions', 'set_jetpack_publicize_default_message' );

function get_posts_grouped_by_month( $year = null ) {

	if ( $year == null ) {
		$year = date('Y');
	}
	
	$months = range(1,12);
	$posts = array();
	
	foreach ( $months as $month ) {
		$posts_for_month = get_posts(array(
			'year' => $year,
			'monthnum' => $month ));
		$posts[$month] = $posts_for_month;
	}
	
	return $posts;
	}
	
	function compacter_archives() {
	$current_year = get_the_date( 'Y' );
	$previous_year = $current_year - 1;
	$next_year = $current_year + 1;
	$monthly_posts = get_posts_grouped_by_month($current_year);
	
	if ( function_exists('icl_get_languages') ) {
		global $sitepress;
		$current_lang = $sitepress->get_current_language();
	} else {
		$current_lang = get_locale();
	}
	
	echo '<ul class="compacter-archives-month-list">';
	foreach ( $monthly_posts as $month => $posts ) {    
		setlocale(LC_TIME, $current_lang);
		$time = mktime(0, 0, 0, $month);
		$month_name = strftime("%b", $time);
	
		if ($posts) {
			echo '<li><a href="' . get_month_link( $current_year, $month ) . '">' . $month_name . '</a></li>';
		} else {
			echo '<li>' . $month_name . '</li>'; 
		}
	}
	echo '</ul><ul class="compacter-archives-year-list">';
	
	$query1 = new WP_Query( array ( 'year'=> $previous_year ) );
	if ( $query1->have_posts() ) {  
		echo '<li><a href="' . get_year_link($previous_year) . '">' . $previous_year . '</a></li>';
	} else {
		echo '<li>' . $previous_year . '</li>';
	}
	wp_reset_query();
	
	$query2 = new WP_Query( array ( 'year'=> $next_year ) );
	if ( $query2->have_posts() ) {  
		echo '<li><a href="' . get_year_link($next_year) . '">' . $next_year . '</a></li>';
	} else {
		echo '<li>' . $next_year . '</li>';
	}
	wp_reset_query();

}

function content_posts() {
	function content_excerpt_length($length) {
		return 50;
	}
	
	
	function content_excerpt_more($more) {
		global $post;
		return '...';
	}
	

	function test_excerpt() {
		add_filter('excerpt_length', 'content_excerpt_length', 999);
		add_filter('excerpt_more', 'content_excerpt_more', 999);
		return the_excerpt();
	}
		$args = array(
			'post_type'=>'post',
			'posts_per_page' => '',
			'paged' => $paged,
		);

		$data = new WP_Query( $args );

		if ($data->have_posts()) : ?>
			<div class="articlesWrapper">
                    <?php while ($data->have_posts()) : $data->the_post();  ?>
                    <article class="article">
                    <a class="article__href" href="<?php the_permalink(); ?>">
                        <div class="articleWrapper">
                                <?php the_post_thumbnail(); ?>
                            <figcaption>
                            <h1><?php the_title(); ?></h1>
                            <p class="article_date"><?php echo get_the_date( 'd M Y'); ?></p>
                            <div class="article_textWrapper"><?php test_excerpt(); ?></div>
                            </figcaption>
                        </div>
                        <p class="article_title"><?php the_title(); ?></p>
                    </a>
                        
                    </article>
                
                <?php endwhile; ?>
                </div>
                        <div id="button_all">
                            <button class="learn-more">
                                <span class="circle" aria-hidden="true">
                                <span class="icon arrow"></span>
                                </span>
                                <a class="button-text" href="<?php echo esc_url( home_url( '/' ) ); ?>/archiwum/">Starsze artykuły</span></a>
                            </button>
                        </div>
				<?php else :
					echo '<div class="noPostsInfo"><p class="noPostsInfo__text">Na tej stronie nie ma żadnych wpisów.</p></div>';
				endif; ?>
			
	<?php wp_reset_postdata();
}

function content_ImportantTiles() {
	
	$args = array(
		'showposts'         => -1,
		'post_per_page'     => -1,
		'category__in'      => array(3),
        'caller_get_posts'  => 1,
        'post_type'         =>'page'
	);
	wp_reset_postdata();
	global $post;
	$posts = get_posts( $args );
	if( $posts ) { ?>
		<div class="owl-carousel owl-theme">
			<?php	
			foreach( $posts as $post ) {
					setup_postdata( $post );?>
					<a href="<?php the_permalink(); ?>">
						<div class="item">
                            <div class="importantTitles-title"><?php  the_title();  ?></div>
                            <div class="img-fluid"><?php the_post_thumbnail( 'post-thumbnail' ); ?></div>
                            
                        </div>	
					</a>	
									
							
			<?php
			}?>
		</div>
	<?php
	} 	
}

function archive_posts() {
	function archive_excerpt_length($length) {
		return 25;
	}
	
	
	function archive_excerpt_more($more) {
		global $post;
		return '...';
	}
	

	function archive_excerpt() {
	add_filter('excerpt_length', 'archive_excerpt_length', 999);
	add_filter('excerpt_more', 'archive_excerpt_more', 999);
	return the_excerpt();
	}

	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	$args = array(
		'post_type'=>'post',
		'posts_per_page' => 6,
		'paged' => $paged,
	);

	$loop = new WP_Query( $args );
	if ( $loop->have_posts() ) { ?>
		<div class="articlesWrapper">
            <?php while ( $loop->have_posts() ) : $loop->the_post();?>
            <article class="article">
                    <a class="article__href" href="<?php the_permalink(); ?>">
                        <div class="articleWrapper">
                                <?php the_post_thumbnail(); ?>
                            <figcaption>
                            <h1><?php the_title(); ?></h1>
                            <p class="article_date"><?php echo get_the_date( 'd M Y'); ?></p>
                            <div class="article_textWrapper"><?php archive_excerpt(); ?></div>
                            </figcaption>
                        </div>
                        <p class="article_title"><?php the_title(); ?></p>
                    </a>
                        
                    </article>
	<?php endwhile;?>
     </div>
     <?php
		$total_pages = $loop->max_num_pages;

		if ($total_pages > 1){

			$current_page = max(1, get_query_var('paged')); ?>
			
			<div class="page_nav">
				<?php echo paginate_links(array(
					'base' => get_pagenum_link(1) . '%_%',
					'format' => '/page/%#%',
					'current' => $current_page,
					'total' => $total_pages,
					'prev_text'    => ('<'),
					'next_text'    => ('>'),
					'type'	=>	'list',
				));?>
			</div>
			<?php
		}
	}
	wp_reset_postdata();
}

function category_posts() {
	function category_excerpt_length($length) {
		return 25;
	}
	
	
	function category_excerpt_more($more) {
		global $post;
		return '...';
	}
	

	function category_excerpt() {
	add_filter('excerpt_length', 'category_excerpt_length', 999);
	add_filter('excerpt_more', 'category_excerpt_more', 999);
	return the_excerpt();
    }
    
    $category=get_the_category();
    
	// query to set the posts per page to 3
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args_1 = array('posts_per_page' => 8, 'paged' => $paged );
        query_posts($args_1); 
        $args = array(
           'showposts'         => 8,
           'category__in'      => array($category[0]->cat_ID),
           'caller_get_posts'  =>1
       );
       $loop = new WP_Query( $args );
	if ( $loop->have_posts() ) { ?>
		<div class="articlesWrapper">
            <?php while ( $loop->have_posts() ) : $loop->the_post();?>
            <article class="article">
                    <a class="article__href" href="<?php the_permalink(); ?>">
                        <div class="articleWrapper">
                                <?php the_post_thumbnail(); ?>
                            <figcaption>
                            <h1><?php the_title(); ?></h1>
                            <p class="article_date"><?php echo get_the_date( 'd M Y'); ?></p>
                            <div class="article_textWrapper"><?php category_excerpt(); ?></div>
                            </figcaption>
                        </div>
                        <p class="article_title"><?php the_title(); ?></p>
                    </a>
                        
                    </article>
	<?php endwhile;?>
     </div>
        <?php
           $total_pages = $loop->max_num_pages;

           if ($total_pages > 1){
   
               $current_page = max(1, get_query_var('paged')); ?>
               
               <div class="page_nav">
                   <?php echo paginate_links(array(
                       'base' => get_pagenum_link(1) . '%_%',
                       'format' => '/page/%#%',
                       'current' => $current_page,
                       'total' => $total_pages,
                       'prev_text'    => ('<'),
                       'next_text'    => ('>'),
                       'type'	=>	'list',
                   ));?>
               </div>
               <?php
           }


       }
	wp_reset_postdata();
}

function date_posts() {
	function date_excerpt_length($length) {
		return 25;
	}
	
	
	function date_excerpt_more($more) {
		global $post;
		return '...';
	}
	

	function date_excerpt() {
	add_filter('excerpt_length', 'date_excerpt_length', 999);
	add_filter('excerpt_more', 'date_excerpt_more', 999);
	return the_excerpt();
    }
    
    $year=get_the_date( 'Y' );
    $month=get_the_date( 'm' );

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	$args = array(
		'post_type'=>'post',
		'posts_per_page' => 6,
        'paged' => $paged,
        'date_query' => array(
            array(
                'year'  => $year,
                'month' => $month,
            ),
        ),
	);
    $loop = new WP_Query( $args );
	if ( $loop->have_posts() ) { ?>
		<div class="articlesWrapper">
            <?php while ( $loop->have_posts() ) : $loop->the_post();?>
            <article class="article">
                    <a class="article__href" href="<?php the_permalink(); ?>">
                        <div class="articleWrapper">
                                <?php the_post_thumbnail(); ?>
                            <figcaption>
                            <h1><?php the_title(); ?></h1>
                            <p class="article_date"><?php echo get_the_date( 'd M Y'); ?></p>
                            <div class="article_textWrapper"><?php date_excerpt(); ?></div>
                            </figcaption>
                        </div>
                        <p class="article_title"><?php the_title(); ?></p>
                    </a>
                        
                    </article>
	<?php endwhile;?>
     </div>
     <?php
		$total_pages = $loop->max_num_pages;

		if ($total_pages > 1){

			$current_page = max(1, get_query_var('paged')); ?>
			
			<div class="page_nav">
				<?php echo paginate_links(array(
					'base' => get_pagenum_link(1) . '%_%',
					'format' => '/page/%#%',
					'current' => $current_page,
					'total' => $total_pages,
					'prev_text'    => ('<'),
					'next_text'    => ('>'),
					'type'	=>	'list',
				));?>
			</div>
			<?php
		}
	}
	wp_reset_postdata();
}

/**
 * Breadcrumb
 */
function dimox_breadcrumbs() {
    $delimiter = '»';
    $home = 'Home'; 
    $before = '<span class="current">'; 
    $after = '</span>';
    if ( !is_home() && !is_front_page() || is_paged() ) {
        echo '<div id="crumbs">';
        global $post;
        $homeLink = get_bloginfo('url');
        echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
        if ( is_category() ) {
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
            echo $before . single_cat_title('', false) . $after;
        } elseif ( is_day() ) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;
        } elseif ( is_month() ) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;
        } elseif ( is_year() ) {
            echo $before . get_the_time('Y') . $after;
        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
                echo $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                echo $before . get_the_title() . $after;
            }
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } elseif ( is_page() && !$post->post_parent ) {
            echo $before . get_the_title() . $after;
        } elseif ( is_page() && $post->post_parent ) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } elseif ( is_search() ) {
            echo $before . 'Search results for "' . get_search_query() . '"' . $after;
        } elseif ( is_tag() ) {
            echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
        } elseif ( is_author() ) {
            global $author;
            echo $before . 'Articles posted by ' . $userdata->display_name . $after;
        } elseif ( is_404() ) {
            echo $before . 'Error 404' . $after;
        }
        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
            echo __('Page') . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }
        echo '</div>';
    }
} // end dimox_breadcrumbs()
