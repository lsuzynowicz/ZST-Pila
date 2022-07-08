<?php
/**
 * Displays the event widget area
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

if ( is_active_sidebar( 'calendar' ) ) : ?>
	<div class="calendar">
        <div class="sideMenu__trigger"><i class="fa fa-calendar"></i>Kalendarz</div>
        <div class="eventsWrapper">
            <ul class="eventsList">
                <?php if ( is_active_sidebar( 'calendar' ) ) { ?>
                    <?php dynamic_sidebar( 'calendar' ); ?>
                <?php } ?>
            </ul>
        </div>
                </div>
<?php endif; ?>