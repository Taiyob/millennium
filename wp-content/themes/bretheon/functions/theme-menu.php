<?php
/**
 * Menu functions.
 *
 * @package Bretheon
 * @author Muffin group
 * @link http://muffingroup.com
 */


/* ---------------------------------------------------------------------------
 * Registers a menu location to use with navigation menus.
 * --------------------------------------------------------------------------- */
register_nav_menu( 'primary', __( 'Main menu' , 'mfn-opts' ) );
register_nav_menu( 'footer', __( 'Footer menu' , 'mfn-opts' ) );


/* ---------------------------------------------------------------------------
 * Main menu
 * --------------------------------------------------------------------------- */
function mfn_wp_nav_menu() 
{
	$args = array( 
		'container' 		=> 'nav',
		'container_id'		=> 'menu', 
		'fallback_cb'		=> 'mfn_wp_page_menu', 
		'theme_location'	=> 'primary',
		'depth' 			=> 3,
	);
	wp_nav_menu( $args ); 
}

function mfn_wp_page_menu() 
{
	$args = array(
		'title_li' => '0',
		'sort_column' => 'menu_order',
		'depth' => 3
	);

	echo '<nav id="menu">'."\n";
		echo '<ul>'."\n";
			wp_list_pages($args); 
		echo '</ul>'."\n";
	echo '</nav>'."\n";
}


/* ---------------------------------------------------------------------------
 * Footer menu
* --------------------------------------------------------------------------- */
function mfn_wp_footer_menu()
{
	$args = array(
		'container' 		=> false,
		'fallback_cb'		=> false,
		'theme_location' 	=> 'footer',
		'depth'				=> 1,
	);
	wp_nav_menu( $args );
}

?>