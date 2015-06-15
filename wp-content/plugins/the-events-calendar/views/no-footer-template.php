<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template' 
 * is selected in Events -> Settings -> Template -> Events Template.
 * 
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 *
 */




require_once( dirname(__FILE__) . '/lib/the-events-calendar.class.php' );



TribeEvents::instance();



register_activation_hook( dirname(__FILE__) . '/lib/the-events-calendar.class.php', array( 'TribeEvents', 'flushRewriteRules' ) );

register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );



if ( is_admin() && ( !defined( 'DOING_AJAX' ) || !DOING_AJAX ) ) {

	register_deactivation_hook( __FILE__, array( 'TribeEvents', 'resetActivationMessage' ) );

}




if ( !defined('ABSPATH') ) { die('-1'); }
?>

<div id="tribe-events-pg-template">
	<?php tribe_events_before_html(); ?>
	<?php tribe_get_view(); ?>
	<?php tribe_events_after_html(); ?>
</div> <!-- #tribe-events-pg-template -->
