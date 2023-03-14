<?php

//  Variation treshold higher 
	add_filter( 'woocommerce_ajax_variation_threshold', function() { return 500; } );

// Change breadcrumbs place to above title
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_breadcrumb', 4 );

// Remove CLEAR from product variations
	add_filter( 'woocommerce_reset_variations_link', '__return_empty_string', 9999 );

// Add Navigation Arrows to slider product images
	add_filter( 'woocommerce_single_product_carousel_options', 'cuswoo_update_woo_flexslider_options' );
	function cuswoo_update_woo_flexslider_options( $options ) {
		$options['directionNav'] = true;
		return $options;
	}