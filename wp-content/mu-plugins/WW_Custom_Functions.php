<?php
/**
* Plugin Name:        WW Custom Functions File
 * Description:       Custom Functions File for Pwillys.
 * Version:           1.0.0
 * Author:            Kerigan Marketing
 * Author URI:        http://keriganmarketing.com/
 */

/* Place custom code below this line. */


/*
Create Events Post Type
*/

/*add_action('init', 'event_register_post_type');
 
	function event_register_post_type() {
	register_post_type('events', array(
	'labels' => array(
	'name' => 'Events',
	'singular_name' => 'Events',
	'add_new' => 'Add new Event',
	'edit_item' => 'Edit Events',
	'new_item' => 'New Event',
	'view_item' => 'View Events',
	'search_items' => 'Search Events',
	'not_found' => 'No Events found',
	'not_found_in_trash' => 'No Events found in Trash'
	),
	'public' => true,
	'has_archive' => true,
	'supports' => array(
	'title',
	'excerpt'
	),
	'taxonomies' => array('category', 'post_tag') // this is IMPORTANT
	));
}

add_action('init', 'event_add_default_boxes');
     
    function event_add_default_boxes() {
    register_taxonomy_for_object_type('category', 'events');
    register_taxonomy_for_object_type('post_tag', 'events');
 }*/

/* Place custom code above this line. */
?>