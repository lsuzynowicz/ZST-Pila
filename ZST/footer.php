<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Lt_Theme
 * @since Ltheme 1.0
 */
?>

<!-- Site-Main-Map -->
    <div class="mapContent">
        <iframe title="Mapa" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9571.836729748222!2d16.715027830627452!3d53.14682708949256!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbe67035ff5ea713f!2zWmVzcMOzxYIgU3prw7PFgiBUZWNobmljem55Y2ggdyBQaWxl!5e0!3m2!1spl!2spl!4v1572902031069!5m2!1spl!2spl" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
<!-- .Site-Main-Map -->

    <!-- Footer -->
        <!-- Footer-Main -->	
            <footer id="footer">
                <div class="footer_container">
                    <div class="footer_info">
                        <div class="footer_projects">
                            <div class="footer_top">
                                <img alt="" src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/uploads/2020/09/szkolawchmurze1.png">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>projekt-poszerzanie-horyzontow-rozwoj-zawodowy-oraz-osobisty-w-unii-europejskiej/"><img alt="" src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/uploads/2020/09/erasmus2.png"></a>                              
                            </div>
                            <div class="footer_bottom">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>szkola-bierze-udzial-w-projekcie-centrum-mistrzostwa-informatycznego/"><img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/uploads/2020/09/CMI-post-FB2.png"></a>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>realizujemy-program-cisco-networking-academy/"><img alt="" src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/uploads/2020/09/cisco-logo.png"></a>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>kadry-przyszlosci-ksztalcenie-zawodowe-w-pilskim-mechaniku-zgodne-z-potrzebami-rynku-pracy/"><img alt="" src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/uploads/2020/09/KADRY-PRZYSZLOSCI-1.jpg"></a>
                            </div>
                        </div>
                        <div class="footer_left">
                            <p class="title">Dane</p>
                            <p>Zespół Szkół Technicznych w Pile</p>
                            <p>ul. Ceglana 4 64-920 Piła</p>
                        </div>
                        <div class="footer_right">
                            <p class="title">Kontakt</p>
                            <p>sekretariat@zst.pila.pl</p>
                            <p>(067) 212-46-80</p>
                        </div>
                        <div class="footer_middle">
                            <a href="https://www.facebook.com/zst.pila/" title="www.facebook.com/zst.pila" target="_blank"><i class="fa fa-facebook-square"></i></a>
                        </div>
                        
                    </div>
                    <div class="authors">
                        <h6>Powered by</h6>
                        <p>Łukasz Suzynowicz i Jakub Kowalski</p>
                    </div>  
                </div>
            </footer>
        <!-- .Footer-Main -->
    </div>
    <!-- .Footer -->
    <div><?php wp_footer(); ?></div>
<!-- .Site -->
</body>
</html>