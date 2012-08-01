<?php
/**
 * @package		WordPress
 * @subpackage	BuddyPress
 * @author		Boris Glumpler
 * @copyright	2011, ShabuShabu Webdesign
 * @link		http://shabushabu.eu
 * @license		http://www.opensource.org/licenses/gpl-2.0.php GPL License
 */

if( bpe_has_events() ) : ?>

	<div id="pag-top" class="pagination no-ajax">

		<div class="pag-count" id="events-count">
			<?php bpe_events_pagination_count() ?>
		</div>

		<div class="pagination-links" id="events-pag">
			<?php bpe_events_pagination_links() ?>
		</div>

	</div>

	<h4><?php printf( __( 'Month: %s %s', 'events' ), mysql2date( 'F', bp_action_variable( 1 ) .'-'. bp_action_variable( 0 ), true ), bp_action_variable( 1 ) ) ?></h4>

    <?php do_action( 'bpe_member_month_before_loop' ) ?>

	<ul id="events-list" class="item-list<?php if( bpe_grid_style() ) : ?> item-list-grid<?php endif; ?>">
	
	<?php while ( bpe_events() ) : bpe_the_event();	?>

		<?php if( bpe_grid_style() ) : ?>
        
            <?php bpe_load_template( 'events/view/grid' ); ?>                
        
        <?php else : ?>
    
            <?php bpe_load_template( 'events/view/list' ); ?>                
       
        <?php endif; ?>

	<?php endwhile; ?>
    
    <?php do_action( 'bpe_member_month_inside_loop' ) ?>
	
	</ul>

    <?php do_action( 'bpe_member_month_after_loop' ) ?>

	<div id="pag-bottom" class="pagination no-ajax">

		<div class="pag-count" id="events-count">
			<?php bpe_events_pagination_count() ?>
		</div>

		<div class="pagination-links" id="events-pag">
			<?php bpe_events_pagination_links() ?>
		</div>

	</div>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'No events were found.', 'events' ) ?></p>
	</div>

<?php endif; ?>