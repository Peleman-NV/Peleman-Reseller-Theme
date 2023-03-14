<?php

// Add theme support for below
	function mytheme_add_woocommerce_support() {
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
    	add_theme_support( 'wc-product-gallery-lightbox' );
    	add_theme_support( 'wc-product-gallery-slider' );
	}
	add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
	
// Add extra options to admin backend
	add_action( 'admin_enqueue_scripts', 'wptuts_add_color_picker' );
	function wptuts_add_color_picker( $hook ) {
		if( is_admin() ) { 
			wp_enqueue_style('thickbox');
			wp_enqueue_style('wp-color-picker'); 
			
			wp_enqueue_script('jquery');
			wp_enqueue_script('thickbox');
			wp_enqueue_script('media-upload');
			wp_enqueue_script('wptuts-upload', get_template_directory_uri().'/assets/js/admin-script.js', array('jquery','media-upload','thickbox','wp-color-picker'), $rand); 
		}
	}

// Add title to the theme, set from SETTINGS->GENERAL
    function pelemanreseller_wp_setup() {
        add_theme_support( 'title-tag' );
    }
    add_action( 'after_setup_theme', 'pelemanreseller_wp_setup' );

// Add menus to the theme, set from APPEARANCE->MENUS
    function pelemanreseller_register_menu() {
        register_nav_menu('main-menu', __( 'Main Menu' ));
        register_nav_menu('footer-menu', __( 'Footer' ));
    }
    add_action( 'init', 'pelemanreseller_register_menu' );

// Add extra classes to the Wordpress menus
	function add_additional_class_on_li($classes, $item, $args) {
		if(isset($args->add_li_class)) {
			$classes[] = $args->add_li_class;
		}
		return $classes;
	}
	add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

	function add_menu_link_class( $atts, $item, $args ) {
	  if (property_exists($args, 'link_class')) {
		$atts['class'] = $args->link_class;
	  }
	  return $atts;
	}
	add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

// Add widgets to the theme, set from APPEARANCE->WIDGETS
    function pelemanreseller_widgets_init() {
        register_sidebar( array(
            'name'          => 'Footer - Column 1',
            'id'            => 'footer-column-1',
            'before_widget' => '<div class="footer-column-1">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );

        register_sidebar( array(
            'name'          => 'Footer - Column 2',
            'id'            => 'footer-column-2',
            'before_widget' => '<div class="footer-column-2">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );

        register_sidebar( array(
            'name'          => 'Footer - Column 3',
            'id'            => 'footer-column-3',
            'before_widget' => '<div class="footer-column-3">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
    }
    add_action( 'widgets_init', 'pelemanreseller_widgets_init' );