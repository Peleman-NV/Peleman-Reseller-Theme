<?php

// Change checkout and cart buttons in minicart
	add_action('woocommerce_widget_shopping_cart_buttons', function () {
		// Removing Buttons
		remove_action('woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10);
		remove_action('woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_proceed_to_checkout', 20);

		// Adding customized Buttons
		add_action('woocommerce_widget_shopping_cart_buttons', 'custom_widget_shopping_cart_button_view_cart', 10);
		add_action('woocommerce_widget_shopping_cart_buttons', 'custom_widget_shopping_cart_proceed_to_checkout', 20);
	}, 1);

// Custom cart button in minicart
	function custom_widget_shopping_cart_button_view_cart()
	{
		$original_link = wc_get_cart_url();
		echo '<a href="' . esc_url($original_link) . '" class="button wc-forward btn btn-link">' . esc_html__('View cart', 'peleman-reseller-theme') . '</a>';
	}

// Custom Checkout button in minicart
	function custom_widget_shopping_cart_proceed_to_checkout()
	{
		$original_link = wc_get_checkout_url();
		echo '<a href="' . esc_url($original_link) . '" class="button checkout wc-forward btn btn-primary btn-header-secondary btn-md btn-block">' . esc_html__('Go to checkout', 'peleman-reseller-theme') . '</a>';
	}

// Add title above payment methods in checkout
	add_action( 'woocommerce_review_order_before_payment', 'wc_privacy_message_below_checkout_button' );
	function wc_privacy_message_below_checkout_button() {
	   echo '<h3 id="order_review_heading">'.esc_html__('Pay and complete', 'peleman-reseller-theme').'</h3>';
	}

// Remove CSS and/or JS for Select2 used by WooCommerce, see https://gist.github.com/Willem-Siebe/c6d798ccba249d5bf080.
	add_action( 'wp_enqueue_scripts', 'wsis_dequeue_stylesandscripts_select2', 100 );
	function wsis_dequeue_stylesandscripts_select2() {
		if ( class_exists( 'woocommerce' ) ) {
			wp_dequeue_style( 'selectWoo' );
			wp_deregister_style( 'selectWoo' );

			wp_dequeue_script( 'selectWoo');
			wp_deregister_script('selectWoo');
		} 
	}

// Display Only 2 Cross Sells instead of default 4
	add_filter( 'woocommerce_cross_sells_total', 'bbloomer_change_cross_sells_product_no' );
	function bbloomer_change_cross_sells_product_no( $columns ) {
		return 2;
	}

// Update cart automatically without update button
	add_action( 'wp_head', function() {
		?><style>
		.woocommerce button[name="update_cart"],
		.woocommerce input[name="update_cart"] {
			display: none;
		}</style><?php
	} );

	add_action( 'wp_footer', function() {
		?><script>
		jQuery( function( $ ) {
			let timeout;
			$('.woocommerce').on('change', 'input.qty', function(){
				if ( timeout !== undefined ) {
					clearTimeout( timeout );
				}
				timeout = setTimeout(function() {
					$("[name='update_cart']").trigger("click"); // trigger cart update
				}, 500 ); // 1 second delay, half a second (500) seems comfortable too
			});
		} );
		</script><?php
	} );