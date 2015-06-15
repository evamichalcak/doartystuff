<?php

/**
 * Forcing Categories to display in List View in The Events Calendar
 */
add_action('parse_query', 'use_list_view_for_categories', 60);

function use_list_view_for_categories($query) {
	// Run once
	remove_action('parse_query', 'use_list_view_for_categories', 60);

	// Interfere only for non-ajax Tribe category requests not already destined to be presented by list view
	if (defined('DOING_AJAX') && DOING_AJAX) return;
	if (!isset($query->tribe_is_event_category) || !$query->tribe_is_event_category) return;
	if (tribe_is_view('upcoming')) return;

	// Obtain the query term and get a link to list view for that term
	$main_tax_query = $query->tax_query->queries[0];
	$term = get_term_by('slug', $main_tax_query['terms'][0], TribeEvents::TAXONOMY);
	$link = tribe_get_listview_link($term->term_id);

	// Try to redirect
	wp_redirect($link);
	exit();
}


	set_post_thumbnail_size( 50, 50 );

?>