<style>
	
	/* ================ GENERAL ================ */
	
	.sps-swatches .swatch.selected, .sps-swatches .swatch-label-square.selected, .sps-swatches .swatch-label-circle.selected {
		background-color: <?= get_option('secondary_color'); ?> !important;
		border: 4px solid <?= get_option('secondary_color'); ?> !important;
		color: <?= get_option('menu_text_color'); ?> !important;
	}
			
	.sps-swatches > .swatchColor.selected {
		border: 4px solid <?= get_option('secondary_color'); ?> !important;
	}
			
	.header-one, .header-one .site-navigation { 
		background-color: <?= get_option('main_color'); ?> !important; 
	}

	.footer {
		background-color: <?= get_option('main_color'); ?> !important;
		color: <?= get_option('menu_text_color'); ?> !important;
	}
			
	footer a:hover {
		color: <?= get_option('secondary_color'); ?>;
	}

	.footer .widget-title {
		border-left: 3px solid <?= get_option('secondary_color'); ?> !important;
	}

	.header-icon:hover {
		color: <?= get_option('secondary_color'); ?> !important;
	}

	.social-icon i:hover {
		color: <?= get_option('secondary_color'); ?> !important;
	}

	.copyright {
		background-color: <?= get_option('secondary_color'); ?> !important;
		color: <?= get_option('menu_text_color'); ?> !important;
	}

	.nav-search {
		color: <?= get_option('menu_text_color'); ?> !important;
	}
	
	.icon-menu-dropdown {
		color: <?= get_option('menu_text_color'); ?> !important;
		font-size: 10px; 
	}
	
	.icon-menu-dropdown:hover {
		color: <?= get_option('secondary_color'); ?> !important;
		font-size: 10px; 
	}
	
	ul.sub-menu.dropdown-menu {
		padding: 5px;
		margin-left: -10px;
	}
	
	.dropdown-menu li a {
		color: #333333 !important;
	}
	
	.dropdown-menu li a:hover {
		color: <?= get_option('secondary_color'); ?> !important;
	}
	
	h1 {
		font-size: <?= get_option('h1_text'); ?>px;
		line-height: <?= get_option('h1_text')*1.5; ?>px;
	}

	h2 {
		font-size: <?= get_option('h2_text'); ?>px;
		line-height: <?= get_option('h2_text')*1.5; ?>px;
	}

	h3 {
		font-size: <?= get_option('h3_text'); ?>px;
		line-height: <?= get_option('h3_text')*1.5; ?>px;
	}

	h4 {
		font-size: <?= get_option('h4_text'); ?>px;
		line-height: <?= get_option('h4_text')*1.5; ?>px;
	}

	h5 {
		font-size: <?= get_option('h5_text'); ?>px;
		line-height: <?= get_option('h5_text')*1.5; ?>px;
	}

	h6 {
		font-size: <?= get_option('h6_text'); ?>px;
		line-height: <?= get_option('h6_text')*1.5; ?>px;
	}
	
	ul#menu-footer-have-a-question {
		list-style: none;
		margin-left: -20px;
		margin-bottom: 40px;
	}

	.footer-contact-button a {
		padding: 10px 40px;
		background-color: <?= get_option('menu_text_color'); ?> !important;
		color: <?= get_option('main_text_color'); ?> !important;
		transition: all .2s ease-in-out;
	}

	.footer-contact-button a:hover {
		transform: scale(1.1);
		background-color: <?= get_option('secondary_color'); ?> !important;
		color: <?= get_option('menu_text_color'); ?> !important;
	}
			
	ul#menu-faq {
    	list-style: none;
    	margin-left: -20px;
    	/* font-weight: 500 !important; */
	}
				
	/* ================ WOOCOMMERCE ================ */
	
	.woocommerce ul.products li.product .button {
		background-color: <?= get_option('secondary_color'); ?>;
		color: <?= get_option('menu_text_color'); ?>;
	}
			
	.woocommerce ul.products li.product .button:hover {
		background-color: <?= get_option('main_color'); ?>;
		color: <?= get_option('menu_text_color'); ?>;
	}
	
	button.single_add_to_cart_button.button.alt {
		width: 50%;
		height: 48px;
		border-radius: 0;
		background-color: <?= get_option('secondary_color'); ?>;
		color: <?= get_option('menu_text_color'); ?>;
	}
	
	button.single_add_to_cart_button.button.alt:hover {
		background-color: <?= get_option('main_color'); ?>;
		color: <?= get_option('menu_text_color'); ?>;
	}
	
	button.single_add_to_cart_button.button.alt.pwp_customizable {
		width: 50%;
		height: 48px;
		border-radius: 0;
		background-color: <?= get_option('secondary_color'); ?>;
		color: <?= get_option('menu_text_color'); ?>;
	}
	
	button.single_add_to_cart_button.button.alt.pwp_customizable:hover {
		background-color: <?= get_option('main_color'); ?>;
		color: <?= get_option('menu_text_color'); ?>;
	}

	.woocommerce ul.products li.product:hover, .woocommerce-page ul.products li.product:hover {
		box-shadow: 0 3px 3px rgb(25 25 25 / 12%);
		border: 1px solid <?= get_option('secondary_color'); ?>;
	}

	.ppi-add-to-cart-button {
		background-color: <?= get_option('secondary_color'); ?> !important;
		border: 1px solid <?= get_option('secondary_color'); ?> !important;
		color: <?= get_option('menu_text_color'); ?> !important;
	}

	.ppi-add-to-cart-button:hover {
		background-color: <?= get_option('main_color'); ?> !important;
		border: 1px solid <?= get_option('main_color'); ?> !important;
		color: <?= get_option('menu_text_color'); ?> !important;
	}

	.btn-header-secondary {
		background-color: <?= get_option('secondary_color'); ?> !important;
		border: 1px solid <?= get_option('secondary_color'); ?> !important;
		color: <?= get_option('menu_text_color'); ?> !important;
	}

	.btn-header-secondary:hover {
		background-color: <?= get_option('main_color'); ?> !important;
		border: 1px solid <?= get_option('main_color'); ?> !important;
	}

	button.single_add_to_cart_button.button.alt.pwp-enabled {
		background-color: <?= get_option('secondary_color'); ?> !important;
		border: 1px solid <?= get_option('secondary_color'); ?> !important;
		color: <?= get_option('menu_text_color'); ?> !important;
	}

	button.single_add_to_cart_button.button.alt.pwp-enabled:hover {
		background-color: <?= get_option('main_color'); ?> !important;
		border: 1px solid <?= get_option('main_color'); ?> !important;
		color: <?= get_option('menu_text_color'); ?> !important;
	}

	.woocommerce div.product p.price, .woocommerce div.product span.price {
		color: <?= get_option('main_color'); ?>;
		font-size: <?= get_option('h3_text'); ?>px;
		font-weight: bold;
	}

	.woocommerce div.product .woocommerce-tabs ul.tabs li.active {
		border-bottom: 2px solid <?= get_option('secondary_color'); ?> !important;
	}

	.woocommerce #payment #place_order, .woocommerce-page #payment #place_order {
		background-color: <?= get_option('secondary_color'); ?> !important;
		border: 1px solid <?= get_option('secondary_color'); ?> !important;
		color: <?= get_option('menu_text_color'); ?> !important;
	}

	.woocommerce #payment #place_order:hover, .woocommerce-page #payment #place_order:hover {
		background-color: <?= get_option('main_color'); ?> !important;
		border: 1px solid <?= get_option('main_color'); ?> !important;
		color: <?= get_option('menu_text_color'); ?> !important;
	}

	a.woocommerce-terms-and-conditions-link {
		color: <?= get_option('main_color'); ?> !important;
		font-weight: bold;
	}

	a.woocommerce-terms-and-conditions-link:hover {
		color: <?= get_option('secondary_color'); ?> !important;
	}

	a.checkout-button.button.alt.wc-forward {
		background-color: <?= get_option('secondary_color'); ?> !important;
		border: 1px solid <?= get_option('secondary_color'); ?> !important;
		color: <?= get_option('menu_text_color'); ?> !important;
	}

	a.checkout-button.button.alt.wc-forward:hover {
		background-color: <?= get_option('main_color'); ?> !important;
		border: 1px solid <?= get_option('main_color'); ?> !important;
		color: <?= get_option('menu_text_color'); ?> !important;
	}

	a.pwp_editor_button {
		background-color: <?= get_option('main_color'); ?> !important;
		border: 1px solid <?= get_option('main_color'); ?> !important;
		color: <?= get_option('menu_text_color'); ?> !important;
	}

	a.pwp_editor_button:hover {
		background-color: <?= get_option('main_color'); ?> !important;
		border: 1px solid <?= get_option('main_color'); ?> !important;
		color: <?= get_option('menu_text_color'); ?> !important;
	}
	
	/* ================ SEARCH ================ */
			
	.search-container {
		position: relative;
		display: inline-block;
		margin: 0px 0px;
		height: 50px;
		width: 50px;
		vertical-align: bottom;
	}

	.searchbutton {
		position: absolute;
		width: 100%;
		margin: 0;
		padding: 0;
	}

	.searchfunction:focus + .searchbutton {
		transition-duration: 0.4s;
		-moz-transition-duration: 0.4s;
		-webkit-transition-duration: 0.4s;
		-o-transition-duration: 0.4s;
	}

	.searchfunction {
		position: absolute;
		left: 49px; /* Button width-1px (Not 50px/100% because that will sometimes show a 1px line between the search box and button) */
		background-color: white;
		outline: none;
		box-shadow: inset 0 0 0 1px #dadada;
		border: none;
		padding: 0;
		width: 0;
		height: 100%;
		z-index: 999;
		transition-duration: 0.4s;
		-moz-transition-duration: 0.4s;
		-webkit-transition-duration: 0.4s;
		-o-transition-duration: 0.4s;
	}

	.searchfunction:focus {
		width: 450px; /* Bar width+1px */
		padding: 0 16px 0 0;
	}

	.expandright {
		left: auto;
		right: 60px; /* Button width-1px */
	}

	.expandright:focus {
		padding: 0 10px 0 16px;
	}

	/* ================ MINI CART ================ */

	.icon-basket:after {
		content: attr(value);
		font-size: 15px;
		background-color: <?= get_option('secondary_color'); ?> !important;
		color: white;
		padding: 6px;
		position: relative;
		left: -3px;
		top: -15px;
		width: 5em;
		height: 5em;
		border-radius: 50%;
		text-align: center;
		white-space: nowrap;
	}

	/* width */
	.scrollable::-webkit-scrollbar {
	  width: 10px;
	}

	/* Track */
	.scrollable::-webkit-scrollbar-track {
	  background: #f1f1f1;
	}

	/* Handle */
	.scrollable::-webkit-scrollbar-thumb {
	  background: #888;
	}

	/* Handle on hover */
	.scrollable::-webkit-scrollbar-thumb:hover {
	  background: #555;
	}

	p.woocommerce-mini-cart__empty-message {
		padding-top: 20px;
		padding-bottom: 10px;
		font-size: 18px;
	}

	.dropdown-cart {
		min-width: 250px;
		width: 350px;
		margin-top: 21px;
		box-shadow: 0 6px 12px rgb(0 0 0 / 30%);
		padding: 1.7rem;
		max-width: 95vw;
	}

	.dropdown-menu li a {
		border-bottom: none;
		text-transform: none;
		font-size: 14px;
	}

	.mini-basket-dropdown .mini-item .remove {
		display: flex;
		align-items: center;
		justify-content: center;
		width: 15px;
		height: 15px;
		position: absolute;
		top: 9px;
		right: 5px;
		z-index: 3;
		background: #fff;
		color: #222;
		font-size: 12px !important;
		line-height: 12px;
		text-align: center;
		border-radius: 50%;
		border: 1px solid #ccc;
		transition: color 0.4s,border 0.4s;
	}

	.mini-basket-dropdown .mini-item .remove:hover {
		border: 1px solid red;

	}

	.mini-basket-dropdown .mini-item .quantity {
		display: flex;
		align-items: center;
		color: #999;
		line-height: 1;
		font-size: 14px;
		height: auto;
	}

	.mini-basket-dropdown .mini-item .quantity .count {
		margin-right: 0.5rem;
	}

	.mini-basket-dropdown .mini-item .count + .amount {
		margin-left: 0.5rem;
	}

	.mini-basket-dropdown .mini-item .amount {
		color: #222;
		font-weight: 600;
	}

	.dropdown-cart .mini-list {
		max-height: 15rem;
		overflow-x: hidden;
		margin: 0 -5px 0 0;
		padding-left: 0;
		padding-right: 5px;
		list-style: none;
		text-transform: capitalize;
	}

	.mini-basket-dropdown .mini-item a {
		padding: 0;
	}

	.mini-basket-dropdown .mini-item>a:first-child {
		margin-right: 10px;
		display: block;
		max-width: 6rem;
		flex: 0 0 8rem;
	}

	.mini-basket-dropdown .mini-item .mini-item-meta a {
		margin-bottom: 1.5rem;
		font-weight: 600;
		letter-spacing: 0;
		display: -webkit-box;
		-webkit-line-clamp: 2;
		-webkit-box-orient: vertical;
		overflow: hidden;
	}

	.mini-basket-dropdown .mini-item .mini-item-meta {
		flex: 1;
		margin: 0.3rem 1rem 0.6rem 0;
		line-height: 1.3;
	}

	.cart-dropdown .total {
		display: flex;
		align-items: center;
		justify-content: space-around;
		margin-top: 1rem;
		margin-bottom: 1rem;
		border-top: 1px solid #edeef0;
		border-bottom: 1px solid #edeef0;
		line-height: 3;
		text-transform: capitalize;
		text-align: center;
		color: #222;
		flex-direction: row;
	}

	.mini-basket-dropdown .buttons .btn {
		display: inline-block;
		letter-spacing: 0;
	}

	.mini-basket-dropdown .mini-item {
		display: flex;
		position: relative;
		font-size: calc(14px * var(--rio-typo-ratio,1));
	}

	.mini-basket-dropdown .mini-list .mini-item {
		font-size: calc(13px * var(--rio-typo-ratio,1));
		font-weight: 400;
	}

	.mini-basket-dropdown .mini-item img {
		width: 100%;
		height: auto;
		object-fit: cover;
	}

	li.woocommerce-mini-cart-item.mini-item.mini_cart_item {
		margin-right: 0px !important;
		padding-right: 0px !important;
		border-right: none;
		margin-bottom: 10px
	}

	.mini-basket-dropdown .buttons {
		margin-bottom: 0;
		text-align: center;
	}

	.mini-basket-dropdown .buttons .btn {
		display: inline-block;
		letter-spacing: 0;
	}

	a.button.wc-forward.wp-element-button {
		display: block;
		font-size: 16px;
	}

	.mini-basket-dropdown .buttons .btn-link {
		margin-bottom: 1rem;
		text-transform: capitalize;
		color: #222;
		border-bottom: 2px solid <?= get_option('secondary_color'); ?> !important;
		line-height: 1.3;
		background-color: white !important;
	}

	.woocommerce ul.cart_list li img, .woocommerce ul.product_list_widget li img {
		float: right;
		margin-left: 4px;
		width: auto ;
		height: auto;
		box-shadow: none;
	}

	.mini-basket-dropdown .buttons .btn-link:hover {
		color: <?= get_option('secondary_color'); ?> !important;
		text-decoration: none;
	}

	.mini-basket-dropdown .buttons .btn-block {
		font-size: calc(1rem * var(--rio-typo-ratio,1));
		border-radius: 0px;
	}
			
</style>