<?php
/**
 * Displays the search archive area
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

if ( is_active_sidebar( 'archive' ) ) : ?>
	<div class="dateWrapper">
    <details class="dateWrapper__list"><summary>Kalendarz</summary>
			<?php if ( is_active_sidebar( 'archive' ) ) { ?>
				<?php dynamic_sidebar( 'archive' ); ?>
            <?php } ?>
        </details>
    </div>
<?php endif; ?>