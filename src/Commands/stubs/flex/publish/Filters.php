<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
	return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

add_filter( 'mt_flexible_component_before_build', function ( $flex ) {
	$flex->setLocation( 'post_type', '==', 'page' );
	$flex->setGroupConfig( 'hide_on_screen', [ 'the_content' ] );
	$flex->setGroupConfig( 'position', 'acf_after_title' );
	return $flex;
} );
