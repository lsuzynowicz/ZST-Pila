<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Lt_Theme
 * @since Ltheme 1.0
 */

 
get_header(); ?>
<!-- Site-Main -->
	<!-- Content -->
        <!-- Slider -->
            <?php masterslider(1); ?>
        <!-- .Slider -->
        <!-- Icons -->
            <div class="content_icon">
                <ul>
                    <div class="icon_first">
                        <li>
                        <a href="http://plan.zst.pila.pl" target="_blank">
                            <div class="icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/icons/calendar.png" alt="Plan lekcji">
                                <p class="content__icon__text">Plan lekcji</p>
                            </div>
                        </a>
                        </li>
                        <!--<li>
                        <a href="https://zst.pila.pl/wp-content/uploads/2020/10/Nauczanie_hybrydowe.pdf" target="_blank">
                            <div class="icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/icons/remote-learning.png" alt="Nauczanie hybrydowe">
                                <p class="content__icon__text">Nauczanie hybrydowe</p>
                            </div>
                        </a>
                        </li> -->
                        <li>
                        <a href="http://plan.zst.pila.pl/zastep/" target="_blank">
                            <div class="icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/icons/planning.png" alt="Zmiany planu">
                                <p class="content__icon__text">Zmiany planu</p>
                            </div>
                        </a>
                        </li>
                        <li>
                        <a href="https://cufs.vulcan.net.pl/powiatpilski/Account/LogOn?ReturnUrl=%2Fpowiatpilski%2FFS%2FLS%3Fwa%3Dwsignin1.0%26wtrealm%3Dhttps%253a%252f%252fuonetplus.vulcan.net.pl%252fpowiatpilski%252fLoginEndpoint.aspx%26wctx%3Dhttps%253a%252f%252fuonetplus.vulcan.net.pl%252fpowiatpilski%252fLoginEndpoint.aspx" target="_blank">
                            <div class="icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/icons/diary.png" alt="E-dziennik">
                                <p class="content__icon__text">E-dziennik</p>
                            </div>
                        </a>
                        </li>
                    </div>
                    <div class="icon_first">
                        <li>
                        <a href="https://portal.office.com" target="_blank">
                            <div class="icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/icons/mortarboard.png" alt="Office 365">
                                <p class="content__icon__text">Office 365</p>
                            </div>
                        </a>
                        </li>
                        <li>
                        <a href="http://zst.pila.pl/moodle/moodle4/" target="_blank">
                            <div class="icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/icons/text.png" alt="Moodle">
                                <p class="content__icon__text">Moodle</p>
                            </div>
                        </a>
                        </li>
                        <!--<li>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>/kadry-przyszlosci-ksztalcenie-zawodowe-w-pilskim-mechaniku-zgodne-z-potrzebami-rynku-pracy/">
                            <div class="icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/icons/analysis.png" alt="Projekty Unijne">
                                <p class="content__icon__text">Projekty Unijne</p>
                            </div>
                        </a>
                        </li>-->
                    </div>
                </ul>
            </div>
        <!-- .Icons -->
        <h1 class="articles_title_first">Aktualności</h1>
        <!-- Articles -->
            <?php content_posts(); ?>
        <!-- .Articles -->
        <!-- ImportantTiles -->
            <?php content_ImportantTiles(); ?>
        <!-- .ImportantTiles -->                     							
    <!-- .Content -->
    <!-- RightMenu -->
        <?php get_template_part( 'widgets/calendar', 'widgets' ); ?>
    <!-- .RightMenu -->
    <!-- Facebook-widget -->
        <?php get_template_part( 'widgets/facebook', 'widgets' ); ?>
    <!-- .Facebook-widget -->
<!-- .Site-Main -->
	<?php get_footer(); ?>