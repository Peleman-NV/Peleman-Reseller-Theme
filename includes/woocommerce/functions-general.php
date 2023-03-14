<?php

// Custom ordering solution for shop pages, based on parameter in theme options
	add_filter( 'woocommerce_default_catalog_orderby', 'misha_default_catalog_orderby' );
	function misha_default_catalog_orderby( $sort_by ) {
		$orderby_select = (empty(get_option('orderby_select'))) ? 'date' : get_option('orderby_select');
		return $orderby_select;
	}

// Redirect on login based on user role
	add_filter('woocommerce_login_redirect', 'hs_login_redirect');
	function hs_login_redirect( $redirection_url ) {
		$redirection_url = home_url( '/dashboard' );
		return $redirection_url;
	}

// Add extra sorting options to archive pages in WC
	add_filter( 'woocommerce_get_catalog_ordering_args', 'custom_woocommerce_get_catalog_ordering_args' );
	function custom_woocommerce_get_catalog_ordering_args( $args ) {
		$orderby_value = isset( $_GET['orderby'] ) ? woocommerce_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ));

		if ( 'alphabetical' == $orderby_value ) {
			$args['orderby'] = 'title';
			$args['order'] = 'ASC';
		}
		if ( 'alphabetical-desc' == $orderby_value ) {
			$args['orderby'] = 'title';
			$args['order'] = 'DESC';
		}
		return $args;
	}

	add_filter( 'woocommerce_default_catalog_orderby_options', 'custom_woocommerce_catalog_orderby' );
	add_filter( 'woocommerce_catalog_orderby', 'custom_woocommerce_catalog_orderby' );
	function custom_woocommerce_catalog_orderby( $sortby ) {
		$sortby['alphabetical'] = __( 'Alphabetically: A to Z','peleman-reseller-theme' );
		$sortby['alphabetical-desc'] = __( 'Alphabetically: Z to A','peleman-reseller-theme');
		return $sortby;
	}

// AJAX Cart Fragments to reload mini cart with AJAX
	add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
	function woocommerce_header_add_to_cart_fragment($fragments)
	{
		ob_start();
		?>
			<a href="#" id="cart dropdownMenuButton" class="cart-contents" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="header-icon icon-basket" value="<?php echo WC()->cart->get_cart_contents_count(); ?>"></span>
			</a>
		<?php

		// $fragments['a.cart-contents'] = ob_get_clean();
		$fragments['a.cart-contents'] = ob_get_contents();
		ob_end_clean();

		ob_start();
		?>
			<div class="dropdown-menu mini-basket-dropdown dropdown-menu-right dropdown-cart dropdown cart-dropdown badge-type inline-type" aria-labelledby="dropdownMenuButton">
				<?php woocommerce_mini_cart() ?>
			</div>
		<?php

		// $fragments['div.mini-basket-dropdown'] = ob_get_clean();
		$fragments['div.mini-basket-dropdown'] = ob_get_contents();
		ob_end_clean();

		return $fragments;
	}