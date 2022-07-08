<?php
/**
 * Displays the facebook widget area
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

if ( is_active_sidebar( 'facebook' ) ) : ?>
	<div class="facebook">
        <a href="https://www.facebook.com/zst.pila/" target="_blank" class="sideMenu__Facebook"><i class="fa fa-facebook-square"></i>Facebook</a>
        <div class="FacebookWrapper">
			<?php if ( is_active_sidebar( 'facebook' ) ) { ?>
				<?php dynamic_sidebar( 'facebook' ); ?>
			<?php } ?>
        </div>
    </div>
<?php endif; ?>