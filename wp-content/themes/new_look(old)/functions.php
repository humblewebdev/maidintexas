<?php

function register_my_menu() {
	register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
	if( in_array('current-menu-item', $classes) ){
		$classes[] = 'active ';
	}
	return $classes;
}

// Regsiter Footer widget area
if (function_exists('register_sidebar')) {
	register_sidebar(array(
	'name' => 'Home Sidebar',
	'id'   => 'sidebar',
	'description'   => 'Display Widget Items in the Home Sidebar.',
	'before_widget' => '<div class="home-widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="home-widget-title">',	
	'after_title'   => '</h3>'
			));
}

// Regsiter Footer widget area
if (function_exists('register_sidebar')) {
	register_sidebar(array(
	'name' => 'Page Sidebar',
	'id'   => 'sidebar_page',
	'description'   => 'Display Widget Items in the Home Sidebar.',
	'before_widget' => '<div class="page-widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="page-widget-title">',	
	'after_title'   => '</h3>'
			));
}


?>