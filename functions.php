<?php

$rand = wp_rand(1, 99999999999);

// Add CSS and JS files to load
	add_action('wp_enqueue_scripts', 'pelemanreseller_enqueue_styles_scripts');
	function pelemanreseller_enqueue_styles_scripts()
	{
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/plugins/bootstrap/bootstrap.min.css', ''); //BOOTSTRAP FRAMEWORK
		wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/plugins/fontawesome/css/all.min.css', ''); //FONTAWESOME ICONS
		wp_enqueue_style('icons', 'https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css'); //ICONS ICONS
		wp_enqueue_style('animate', get_template_directory_uri() . '/assets/plugins/animate-css/animate.css', ''); //ANIMATION
		wp_enqueue_style('slick', get_template_directory_uri() . '/assets/plugins/slick/slick.css', ''); //SLIDER
		wp_enqueue_style('slick-theme', get_template_directory_uri() . '/assets/plugins/slick/slick-theme.css', ''); //SLIDER
// 		wp_enqueue_style('colorbox', get_template_directory_uri() . '/assets/plugins/colorbox/colorbox.css', ''); // COLORBOX
		wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/theme-style-general.css', ''); //STANDARD CSS
		wp_enqueue_style('theme-options-style', get_template_directory_uri() . '/assets/css/theme-style-custom.css', '', $rand); //CUSTOM CSS
		wp_enqueue_style('style', get_stylesheet_uri(), array()); //CUSTOM CSS

		wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.1.js', false); // JQUERY
		wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/plugins/bootstrap/bootstrap.min.js', array(), '4.5.3', true); // BOOTSTRAP JS
		wp_enqueue_script('slick', get_template_directory_uri() . '/assets/plugins/slick/slick.min.js', array(), '', true); //SLIDER JS
		wp_enqueue_script('slick-animation', get_template_directory_uri() . '/assets/plugins/slick/slick-animation.min.js', array(), '', true); //SLIDER JS
// 		wp_enqueue_script('colorbox', get_template_directory_uri() . '/assets/plugins/colorbox/jquery.colorbox.js', array(), '', true);
// 		wp_enqueue_script('shuffle', get_template_directory_uri() . '/assets/plugins/shuffle/shuffle.min.js', array(), '', true);
		wp_enqueue_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js', true); //DROPDOWN BOOTSTRAP - USED IN MINICART
		wp_enqueue_script('theme-script', get_template_directory_uri() . '/assets/js/theme-script.js', true); // CUSTOM JS
	}

// Include PHP files
	include_once('includes/functions-theme-general.php');
	include_once('includes/functions-theme-options.php');
	include_once('includes/woocommerce/functions-general.php');
	include_once('includes/woocommerce/functions-products.php');
	include_once('includes/woocommerce/functions-checkout.php');

// add_filter( 'walker_nav_menu_start_el', 'parent_menu_dropdown', 10, 4 );
// function parent_menu_dropdown( $item_output, $item, $depth, $args ) {

//     if ( ! empty( $item->classes ) && in_array( 'menu-item-has-children', $item->classes ) ) {
//         return $item_output . '<i class="icon-arrow-down"></i>';
//     }

//     return $item_output;
// }
// 

// Add arrow to menu items that have dropdown
	function be_arrows_in_menus( $item_output, $item, $depth, $args ) {
		if( in_array( 'menu-item-has-children', $item->classes ) ) {
			$arrow = 0 == $depth ? ' <i class="icon-menu-dropdown icon-arrow-down"></i>' : '<i class="icon-menu-dropdown icon-arrow-right"></i>';
			$item_output = str_replace( '</a>', $arrow . '</a>', $item_output );
		}
		return $item_output;
	}
	add_filter( 'walker_nav_menu_start_el', 'be_arrows_in_menus', 10, 4 );

// Add .dropdown class to menu items that have a dropdown
	function add_menu_parent_class( $items ) {
		$parents = array();
		foreach ( $items as $item ) {
			//Check if the item is a parent item
			if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
				$parents[] = $item->menu_item_parent;
			}
		}

		foreach ( $items as $item ) {
			if ( in_array( $item->ID, $parents ) ) {
				//Add "menu-parent-item" class to parents
				$item->classes[] = 'dropdown';
			}
		}

		return $items;
	}
	add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' ); 

// Add .dropdown-menu class to submenu
	function my_nav_menu_submenu_css_class( $classes ) {
		$classes[] = 'dropdown-menu';
		return $classes;
	}
	add_filter( 'nav_menu_submenu_css_class', 'my_nav_menu_submenu_css_class' );

// Set time for expiration of shopping carts content
	// Sets when the session is about to expire
	add_filter( 'wc_session_expiring', 'woocommerce_cart_session_about_to_expire'); 
	function woocommerce_cart_session_about_to_expire() {

	  // Default value is 47
	  return 60 * 60 * 239; 

	}

	// Sets when the session will expire
	add_filter( 'wc_session_expiration', 'woocommerce_cart_session_expires'); 
	function woocommerce_cart_session_expires() {

	  // Default value is 48
	  return 60 * 60 * 240; 

	}

// SearchWP config
	add_filter('searchwp_live_search_configs', 'my_searchwp_live_search_configs');
	function my_searchwp_live_search_configs($configs)
	{
		// override some defaults
		$configs['default'] = array(
			'engine' => 'default',                      			// search engine to use (if SearchWP is available)
			'input' => array(
				'delay'     => 200,                 				// wait 500ms before triggering a search
				'min_chars' => 3,                   				// wait for at least 3 characters before triggering a search
			),
			'results' => array(
				'position'  => 'bottom',            				// where to position the results (bottom|top)
				'width'     => 'auto',              				// whether the width should automatically match the input (auto|css)
				'offset'    => array(
					'x' => 0,                   					// x offset (in pixels)
					'y' => -10                   					// y offset (in pixels)
				),
			),
			'spinner' => array( 									// Powered by http://spin.js.org/
				'lines'     => 13,                                 	// The number of lines to draw
				'length'    => 17,                                 	// The length of each line
				'width'     => 17,                                 	// The line thickness
				'radius'    => 45,                                 	// The radius of the inner circle
				'scale'     => 0.2,                                 // Scales overall size of the spinner
				'opacity'	=> 0.3,
				'corners'   => 1,                                  	// Corner roundness (0..1)
				'color'     => 'black',                          	// CSS color or array of colors
				'fadeColor' => 'transparent',                      	// CSS color or array of colors
				'speed'     => 1,                                  	// Rounds per second
				'rotate'    => 0,                                  	// The rotation offset
				'animation' => 'searchwp-spinner-line-fade-quick', 	// The CSS animation name for the lines
				'direction' => 1,                                  	// 1: clockwise, -1: counterclockwise
				'zIndex'    => 2e9,                                	// The z-index (defaults to 2000000000)
				'className' => 'spinner',                          	// The CSS class to assign to the spinner
				'top'       => '50%',                              	// Top position relative to parent
				'left'      => '50%',                              	// Left position relative to parent
				'shadow'    => '0 0 1px transparent',              	// Box-shadow for the lines
				'position'  => 'absolute'                          	// Element positioning
			),
		);
		return $configs;
	}
