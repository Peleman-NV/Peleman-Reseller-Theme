<?php

// Custom theme options menu in admin
    add_action( 'admin_menu', 'rudr_top_lvl_menu' );
    function rudr_top_lvl_menu(){
        add_menu_page(
            __( 'Theme Options', 'peleman-reseller-theme' ), // page <title>Title</title>
            __( 'Theme Options', 'peleman-reseller-theme' ), // link text
            'peleman_theme_options', // user capabilities
            'peleman_reseller_theme_options', // page slug
            'peleman_reseller_theme_options_callback', // this function prints the page content
            'dashicons-admin-settings', // icon (from Dashicons for example)
            2 // menu position
        );
    }
    
    // Content of theme options page
    function peleman_reseller_theme_options_callback(){
        ?>
			<div class="wrap">
				<h1><?php echo get_admin_page_title() ?></h1>
				<?php if(isset($_GET['tab'])) {$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'general';}?>
				<h2 class="nav-tab-wrapper">
					<a href="?page=peleman_reseller_theme_options&tab=general" class="nav-tab <?php echo $active_tab == 'general' ? 'nav-tab-active' : ''; ?> <?php echo empty($active_tab) ? 'nav-tab-active' : ''; ?>"><?php _e( 'General', 'peleman-reseller-theme' ); ?></a>
					<a href="?page=peleman_reseller_theme_options&tab=companydetails" class="nav-tab <?php echo $active_tab == 'companydetails' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Company Details', 'peleman-reseller-theme' ); ?></a>
					<a href="?page=peleman_reseller_theme_options&tab=logo" class="nav-tab <?php echo $active_tab == 'logo' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Logo', 'peleman-reseller-theme' ); ?></a>
					<a href="?page=peleman_reseller_theme_options&tab=style" class="nav-tab <?php echo $active_tab == 'style' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Website Style', 'peleman-reseller-theme' ); ?></a>
					<a href="?page=peleman_reseller_theme_options&tab=shopoptions" class="nav-tab <?php echo $active_tab == 'shopoptions' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Shop Options', 'peleman-reseller-theme' ); ?></a>
					<a href="?page=peleman_reseller_theme_options&tab=slider" class="nav-tab <?php echo $active_tab == 'slider' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Slider Homepage', 'peleman-reseller-theme' ); ?></a>
				</h2>
				<form method="post" action="options.php">
					<?php
						if( $active_tab == 'companydetails' ) {
							settings_fields( 'companydetails_settings' ); // settings group name
							do_settings_sections( 'companydetails-slug' ); // just a page slug
							
							submit_button(); // "Save Changes" button
						} elseif( $active_tab == 'logo' ) {
							settings_fields( 'logo_settings' ); // settings group name
							do_settings_sections( 'logo-slug' ); // just a page slug
							
							submit_button(); // "Save Changes" button
						} elseif( $active_tab == 'style' ) {
							settings_fields( 'style_settings' ); // settings group name
							do_settings_sections( 'style-slug' ); // just a page slug
							
							submit_button(); // "Save Changes" button
						} elseif( $active_tab == 'shopoptions' ) {
							settings_fields( 'shopoptions_settings' ); // settings group name
							do_settings_sections( 'shopoptions-slug' ); // just a page slug
							
							submit_button(); // "Save Changes" button
						} elseif( $active_tab == 'slider' ) {
							settings_fields( 'slider_settings' ); // settings group name
							do_settings_sections( 'slider-slug' ); // just a page slug
							
							submit_button(); // "Save Changes" button
						} else {
							echo '<h1>'.__( 'Welcome to Peleman Reseller Theme', 'peleman-reseller-theme' ).'</h1>';
							echo '<p>'.__( 'Here you can customize the theme to fit your company needs.', 'peleman-reseller-theme' ).'</p>';
							
							echo '<p>'.__( 'To complete your shop, set up the following', 'peleman-reseller-theme' ).':</p>';
							echo '<ul style="list-style-type: circle; padding-left: 20px;">';
								echo '<h2>'.__( 'Company Settings', 'peleman-reseller-theme' ).'</h2>';
								echo '<li>'.__( 'Company details', 'peleman-reseller-theme' ).', <a href="'.home_url().'/wp-admin/admin.php?page=peleman_reseller_theme_options&tab=companydetails">'.__( 'set up here', 'peleman-reseller-theme' ).'</a></li>';
								echo '<li>'.__( 'Logo from your company', 'peleman-reseller-theme' ).', <a href="'.home_url().'/wp-admin/admin.php?page=peleman_reseller_theme_options&tab=logo">'.__( 'set up here', 'peleman-reseller-theme' ).'</a></li>';
								echo '<li>'.__( 'Website style (colors, font, ...)', 'peleman-reseller-theme' ).', <a href="'.home_url().'/wp-admin/admin.php?page=peleman_reseller_theme_options&tab=style">'.__( 'set up here', 'peleman-reseller-theme' ).'</a></li>';
								echo '<li>'.__( 'Slider content for the homepage', 'peleman-reseller-theme' ).', <a href="'.home_url().'/wp-admin/admin.php?page=peleman_reseller_theme_options&tab=slider">'.__( 'set up here', 'peleman-reseller-theme' ).'</a></li>';
// 								echo '<h2>Woocommerce Settings</h2>';
// 								echo '<li>Taxes for each country you are selling to, <a href="'.home_url().'/wp-admin/admin.php?page=wc-settings&tab=tax">set up here</a></li>';
// 								echo '<li>Shipping options for each country you are selling to, <a href="'.home_url().'/wp-admin/admin.php?page=wc-settings&tab=shipping">set up here</a></li>';
// 								echo '<li>Payment gateway, <a href="'.home_url().'/wp-admin/admin.php?page=wc-settings&tab=checkout">set up here</a></li>';
							echo '</ul>';
						}
						
						
					?>
				</form>
			</div>
		<?php
    }

	add_action( 'admin_init',  'custom_page_register_setting' );
	function custom_page_register_setting() {

	
		// Modify capability
		function wpdocs_my_page_capability( $capability ) {
			return 'edit_others_posts';
		}
		add_filter( 'option_page_capability_logo_settings', 'wpdocs_my_page_capability' );
		add_filter( 'option_page_capability_slider_settings', 'wpdocs_my_page_capability' );
		add_filter( 'option_page_capability_companydetails_settings', 'wpdocs_my_page_capability' );
		add_filter( 'option_page_capability_style_settings', 'wpdocs_my_page_capability' );

		
		add_settings_section(
			'logo_section', // section ID
			'Logo', // title
			'display_logo_settings_message',  // Function that fills the section with the desired content
			'logo-slug' // page slug
		);
		
		add_settings_field(
			'wptuts_setting_logo', 
			__( 'Logo - Color version', 'peleman-reseller-theme' ), 
			'wptuts_setting_logo_field_html',
			'logo-slug', 
			'logo_section',
			array( 
				'label_for' => 'wptuts_setting_logo',
				'class' => 'wptuts_setting_logo',
			)
		);
		
		register_setting(
			'logo_settings', // settings group name
			'wptuts_setting_logo', // field name
			'sanitize_text_field' // sanitization function
		);
		
		if(!empty(get_option('wptuts_setting_logo'))){
			add_settings_field(
				'wptuts_setting_logo_preview',
				__( 'Logo - Color version - Preview', 'peleman-reseller-theme' ),
				'wptuts_setting_logo_preview', 
				'logo-slug', 
				'logo_section'
			);
		}
		
		add_settings_field(
			'wptuts_setting_logo_white', 
			__( 'Logo - B/W version', 'peleman-reseller-theme' ), 
			'wptuts_setting_logo_white_field_html',
			'logo-slug', 
			'logo_section',
			array( 
				'label_for' => 'wptuts_setting_logo_white',
				'class' => 'wptuts_setting_logo_white',
			)
		);
		
		register_setting(
			'logo_settings', // settings group name
			'wptuts_setting_logo_white', // field name
			'sanitize_text_field' // sanitization function
		);
		
		if(!empty(get_option('wptuts_setting_logo_white'))){
			add_settings_field(
				'wptuts_setting_logo_white_preview',
				__( 'Logo - B/W version - Preview', 'peleman-reseller-theme' ),
				'wptuts_setting_logo_white_preview', 
				'logo-slug', 
				'logo_section'
			);
		}
		
// 		add_settings_section(
// 			'reset_logo_section', // section ID
// 			'Reset logos to standard values', // title
// 			'display_reset_settings_message', // callback function
// 			'logo-slug' // page slug
// 		);
		
// 		add_settings_field(
// 			'reset_logo_button',
// 			'Reset logos',
// 			'reset_logo_button_html', // function which prints the field
// 			'logo-slug', // page slug
// 			'reset_logo_section', // section ID
// 			array( 
// 				'label_for' => 'reset_logo_button',
// 				'class' => 'reset-logo-button-text',
// 			)
// 		);

// 		register_setting(
// 			'logo_settings', // settings group name
// 			'reset_logo_button', // field name
// 			'sanitize_text_field' // sanitization function
// 		);
		
		add_settings_section(
			'companydetails_section', // section ID
			__( 'Company details', 'peleman-reseller-theme' ),
			'display_companydetails_settings_message',  // Function that fills the section with the desired content
			'companydetails-slug' // page slug
		);
				
		add_settings_field(
			'company_name',
			__( 'Company name', 'peleman-reseller-theme' ),
			'company_name_field_html', // function which prints the field
			'companydetails-slug', // page slug
			'companydetails_section', // section ID
			array( 
				'label_for' => 'company_name',
				'class' => 'company-name',
			)
		);
		
		register_setting(
			'companydetails_settings', // settings group name
			'company_name', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'address_text',
			__( 'Street and house nr.', 'peleman-reseller-theme' ),
			'address_text_field_html', // function which prints the field
			'companydetails-slug', // page slug
			'companydetails_section', // section ID
			array( 
				'label_for' => 'address_text',
				'class' => 'banner-text',
			)
		);
		
		register_setting(
			'companydetails_settings', // settings group name
			'address_text', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'postal_text',
			__( 'Postal code', 'peleman-reseller-theme' ),
			'postal_text_field_html', // function which prints the field
			'companydetails-slug', // page slug
			'companydetails_section', // section ID
			array( 
				'label_for' => 'postal_text',
				'class' => 'postal-text',
			)
		);
		
		register_setting(
			'companydetails_settings', // settings group name
			'postal_text', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'city_text',
			__( 'City/Town', 'peleman-reseller-theme' ),
			'city_text_field_html', // function which prints the field
			'companydetails-slug', // page slug
			'companydetails_section', // section ID
			array( 
				'label_for' => 'city_text',
				'class' => 'city-text',
			)
		);
		
		register_setting(
			'companydetails_settings', // settings group name
			'city_text', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'country_text',
			__( 'Country', 'peleman-reseller-theme' ),
			'country_text_field_html', // function which prints the field
			'companydetails-slug', // page slug
			'companydetails_section', // section ID
			array( 
				'label_for' => 'country_text',
				'class' => 'country-text',
			)
		);
		
		register_setting(
			'companydetails_settings', // settings group name
			'country_text', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'email_text',
			__( 'E-mail address', 'peleman-reseller-theme' ),
			'email_text_field_html', // function which prints the field
			'companydetails-slug', // page slug
			'companydetails_section', // section ID
			array( 
				'label_for' => 'email_text',
				'class' => 'banner-text',
			)
		);
		
		register_setting(
			'companydetails_settings', // settings group name
			'email_text', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'phone_number_text',
			__( 'Phone number', 'peleman-reseller-theme' ),
			'phone_number_text_field_html', // function which prints the field
			'companydetails-slug', // page slug
			'companydetails_section', // section ID
			array( 
				'label_for' => 'phone_number_text',
				'class' => 'banner-text',
			)
		);

		register_setting(
			'companydetails_settings', // settings group name
			'phone_number_text', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_section(
			'social_section', // section ID
			__( 'Social Media', 'peleman-reseller-theme' ),
			'display_socialmedia_settings_message', // callback function
			'companydetails-slug' // page slug
		);
		
		add_settings_field(
			'facebook_text',
			__( 'Facebook URL', 'peleman-reseller-theme' ),
			'facebook_text_field_html', // function which prints the field
			'companydetails-slug', // page slug
			'social_section', // section ID
			array( 
				'label_for' => 'facebook_text',
				'class' => 'facebook-text',
			)
		);
		
		register_setting(
			'companydetails_settings', // settings group name
			'facebook_text', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'twitter_text',
			__( 'Twitter URL', 'peleman-reseller-theme' ),
			'twitter_text_field_html', // function which prints the field
			'companydetails-slug', // page slug
			'social_section', // section ID
			array( 
				'label_for' => 'twitter_text',
				'class' => 'twitter-text',
			)
		);
		
		register_setting(
			'companydetails_settings', // settings group name
			'twitter_text', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'instagram_text',
			__( 'Instagram URL', 'peleman-reseller-theme' ),
			'instagram_text_field_html', // function which prints the field
			'companydetails-slug', // page slug
			'social_section', // section ID
			array( 
				'label_for' => 'instagram_text',
				'class' => 'instagram-text',
			)
		);
		
		register_setting(
			'companydetails_settings', // settings group name
			'instagram_text', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'linkedin_text',
			__( 'Linkedin URL', 'peleman-reseller-theme' ),
			'linkedin_text_field_html', // function which prints the field
			'companydetails-slug', // page slug
			'social_section', // section ID
			array( 
				'label_for' => 'linkedin_text',
				'class' => 'linkedin-text',
			)
		);
		
		register_setting(
			'companydetails_settings', // settings group name
			'linkedin_text', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_section(
			'extra_section', // section ID
			__( 'Extra information', 'peleman-reseller-theme' ),
			'', // callback function
			'companydetails-slug' // page slug
		);
		
		add_settings_field(
			'notification_text',
			__( 'Notification header', 'peleman-reseller-theme' ),
			'notification_header_field_html', // function which prints the field
			'companydetails-slug', // page slug
			'extra_section', // section ID
			array( 
				'label_for' => 'notification_text',
				'class' => 'notification-text',
			)
		);
		
		register_setting(
			'companydetails_settings', // settings group name
			'notification_text', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'about_text',
			__( 'About info', 'peleman-reseller-theme' ),
			'about_text_field_html', // function which prints the field
			'companydetails-slug', // page slug
			'extra_section', // section ID
			array( 
				'label_for' => 'about_text',
				'class' => 'about_text',
			)
		);
		
		register_setting(
			'companydetails_settings', // settings group name
			'about_text', // field name
			'wp_kses_post' // sanitization function
		);
		
		add_settings_field(
			'termsconditions_text',
			__( 'Terms & conditions', 'peleman-reseller-theme' ),
			'termsconditions_text_field_html', // function which prints the field
			'companydetails-slug', // page slug
			'extra_section', // section ID
			array( 
				'label_for' => 'termsconditions_text',
				'class' => 'termsconditions-text',
			)
		);
		
		register_setting(
			'companydetails_settings', // settings group name
			'termsconditions_text', // field name
			'wp_kses_post' // sanitization function
		);
		
// 		add_settings_section(
// 			'reset_cd_section', // section ID
// 			'Reset company details to standard values', // title
// 			'display_reset_settings_message', // callback function
// 			'companydetails-slug' // page slug
// 		);
		
// 		add_settings_field(
// 			'reset_companydetails_button',
// 			'Reset company details',
// 			'reset_companydetails_button_html', // function which prints the field
// 			'companydetails-slug', // page slug
// 			'reset_cd_section', // section ID
// 			array( 
// 				'label_for' => 'reset_companydetails_button',
// 				'class' => 'reset-companydetails-button-text',
// 			)
// 		);

// 		register_setting(
// 			'style_settings', // settings group name
// 			'reset_companydetails_button', // field name
// 			'sanitize_text_field' // sanitization function
// 		);
		
		add_settings_section(
			'style_section', // section ID
			__( 'Style settings', 'peleman-reseller-theme' ),
			'display_style_settings_message', // callback function
			'style-slug' // page slug
		);
		
		add_settings_field(
			'main_color',
			__( 'Main color', 'peleman-reseller-theme' ),
			'main_color_field_html', // function which prints the field
			'style-slug', // page slug
			'style_section', // section ID
			array( 
				'label_for' => 'main_color',
				'class' => 'main-color-text',
			)
		);

		register_setting(
			'style_settings', // settings group name
			'main_color', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'secondary_color',
			__( 'Secondary color', 'peleman-reseller-theme' ),
			'secondary_color_field_html', // function which prints the field
			'style-slug', // page slug
			'style_section', // section ID
			array( 
				'label_for' => 'secondary_color',
				'class' => 'secondary_color',
			)
		);

		register_setting(
			'style_settings', // settings group name
			'secondary_color', // field name
			'sanitize_text_field' // sanitization function
		);
		

		add_settings_field(
			'main_text_color',
			__( 'Main text color', 'peleman-reseller-theme' ),
			'main_text_color_field_html', // function which prints the field
			'style-slug', // page slug
			'style_section', // section ID
			array( 
				'label_for' => 'main_text_color',
				'class' => 'main-text-color-text',
			)
		);

		register_setting(
			'style_settings', // settings group name
			'main_text_color', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'menu_text_color',
			__( 'Menu text color', 'peleman-reseller-theme' ),
			'menu_text_color_field_html', // function which prints the field
			'style-slug', // page slug
			'style_section', // section ID
			array( 
				'label_for' => 'menu_text_color',
				'class' => 'menu_text_color',
			)
		);

		register_setting(
			'style_settings', // settings group name
			'menu_text_color', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_section(
			'font_section', // section ID
			__( 'Font', 'peleman-reseller-theme' ),
			'', // callback function
			'style-slug' // page slug
		);
		
		add_settings_field(
			'h1_text',
			__( 'H1 - Heading 1', 'peleman-reseller-theme' ),
			'h1_text_field_html', // function which prints the field
			'style-slug', // page slug
			'font_section', // section ID
			array( 
				'label_for' => 'h1_text',
				'class' => 'h1-text',
			)
		);
		
		register_setting(
			'style_settings', // settings group name
			'h1_text', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'h2_text',
			__( 'H2 - Heading 2', 'peleman-reseller-theme' ),
			'h2_text_field_html', // function which prints the field
			'style-slug', // page slug
			'font_section', // section ID
			array( 
				'label_for' => 'h2_text',
				'class' => 'h2-text',
			)
		);
		
		register_setting(
			'style_settings', // settings group name
			'h2_text', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'h3_text',
			__( 'H3 - Heading 3', 'peleman-reseller-theme' ),
			'h3_text_field_html', // function which prints the field
			'style-slug', // page slug
			'font_section', // section ID
			array( 
				'label_for' => 'h3_text',
				'class' => 'h3-text',
			)
		);
		
		register_setting(
			'style_settings', // settings group name
			'h3_text', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'h4_text',
			__( 'H4 - Heading 4', 'peleman-reseller-theme' ),
			'h4_text_field_html', // function which prints the field
			'style-slug', // page slug
			'font_section', // section ID
			array( 
				'label_for' => 'h4_text',
				'class' => 'h4-text',
			)
		);
		
		register_setting(
			'style_settings', // settings group name
			'h4_text', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'h5_text',
			__( 'H5 - Heading 5', 'peleman-reseller-theme' ),
			'h5_text_field_html', // function which prints the field
			'style-slug', // page slug
			'font_section', // section ID
			array( 
				'label_for' => 'h5_text',
				'class' => 'h5-text',
			)
		);
		
		register_setting(
			'style_settings', // settings group name
			'h5_text', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'h6_text',
			__( 'H6 - Heading 6', 'peleman-reseller-theme' ),
			'h6_text_field_html', // function which prints the field
			'style-slug', // page slug
			'font_section', // section ID
			array( 
				'label_for' => 'h6_text',
				'class' => 'h6-text',
			)
		);
		
		register_setting(
			'style_settings', // settings group name
			'h6_text', // field name
			'sanitize_text_field' // sanitization function
		);
		
// 		add_settings_section(
// 			'reset_section', // section ID
// 			'Reset styling to standard values', // title
// 			'display_reset_settings_message', // callback function
// 			'style-slug' // page slug
// 		);
		
// 		add_settings_field(
// 			'reset_colors_button',
// 			'Reset styling',
// 			'reset_colors_button_html', // function which prints the field
// 			'style-slug', // page slug
// 			'reset_section', // section ID
// 			array( 
// 				'label_for' => 'reset_colors_button',
// 				'class' => 'reset-colors-button-text',
// 			)
// 		);

// 		register_setting(
// 			'style_settings', // settings group name
// 			'reset_colors_button', // field name
// 			'sanitize_text_field' // sanitization function
// 		);
		
		add_settings_section(
			'shopoptions_section', // section ID
			__( 'Shop Options', 'peleman-reseller-theme' ),
			'', // callback function
			'shopoptions-slug' // page slug
		);
		
		add_settings_field(
			'orderby_select',
			__( 'Order products by', 'peleman-reseller-theme' ),
			'orderby_select_html', // function which prints the field
			'shopoptions-slug', // page slug
			'shopoptions_section', // section ID
			array( 
				'label_for' => 'orderby_select',
				'class' => 'orderby-select',
			)
		);
		
		register_setting(
			'shopoptions_settings', // settings group name
			'orderby_select', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_section(
			'slider_1_section', // section ID
			__( 'Slide 1', 'peleman-reseller-theme' ),
			'', // callback function
			'slider-slug' // page slug
		);
		
		add_settings_field(
			'slider_1_checkbox',
			__( 'Show slide 1', 'peleman-reseller-theme' ),
			'slider_1_checkbox_html', // function which prints the field
			'slider-slug', // page slug
			'slider_1_section', // section ID
			array( 
				'label_for' => 'slider_1_checkbox',
				'class' => 'slider-1-checkbox',
			)
		);
		
		register_setting(
			'slider_settings', // settings group name
			'slider_1_checkbox', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'slider_1_image',
			__( 'Slide 1 - Image', 'peleman-reseller-theme' ),
			'slider_1_image_html', // function which prints the field
			'slider-slug', // page slug
			'slider_1_section', // section ID
			array( 
				'label_for' => 'slider_1_image',
				'class' => 'slider-1-image',
			)
		);
		
		register_setting(
			'slider_settings', // settings group name
			'slider_1_image', // field name
			'sanitize_text_field' // sanitization function
		);
		
		if(!empty(get_option('slider_1_image'))){
			add_settings_field(
				'slider_1_image_preview',
				__( 'Slide 1 - Image - Preview', 'peleman-reseller-theme' ),
				'slider_1_image_preview_html', 
				'slider-slug', 
				'slider_1_section'
			);
		}
		
		add_settings_field(
			'slider_1_subtext',
			__( 'Slide 1 - Subtext', 'peleman-reseller-theme' ),
			'slider_1_subtext_html', // function which prints the field
			'slider-slug', // page slug
			'slider_1_section', // section ID
			array( 
				'label_for' => 'slider_1_subtext',
				'class' => 'slider-1-subtext',
			)
		);
		
		register_setting(
			'slider_settings', // settings group name
			'slider_1_subtext', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'slider_1_maintext',
			__( 'Slide 1 - Main Text', 'peleman-reseller-theme' ),
			'slider_1_maintext_html', // function which prints the field
			'slider-slug', // page slug
			'slider_1_section', // section ID
			array( 
				'label_for' => 'slider_1_maintext',
				'class' => 'slider-1-maintext',
			)
		);
		
		register_setting(
			'slider_settings', // settings group name
			'slider_1_maintext', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'slider_1_button_1',
			__( 'Slide 1 - Button 1 Text', 'peleman-reseller-theme' ),
			'slider_1_button_1_html', // function which prints the field
			'slider-slug', // page slug
			'slider_1_section', // section ID
			array( 
				'label_for' => 'slider_1_button_1',
				'class' => 'slider-1-button-1',
			)
		);
		
		register_setting(
			'slider_settings', // settings group name
			'slider_1_button_1', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'slider_1_button_1_url',
			__( 'Slide 1 - Button 1 URL', 'peleman-reseller-theme' ),
			'slider_1_button_1_url_html', // function which prints the field
			'slider-slug', // page slug
			'slider_1_section', // section ID
			array( 
				'label_for' => 'slider_1_button_1_url',
				'class' => 'slider-1-button-url',
			)
		);
		
		register_setting(
			'slider_settings', // settings group name
			'slider_1_button_1_url', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'slider_1_button_2',
			__( 'Slide 1 - Button 2 Text', 'peleman-reseller-theme' ),
			'slider_1_button_2_html', // function which prints the field
			'slider-slug', // page slug
			'slider_1_section', // section ID
			array( 
				'label_for' => 'slider_1_button_2',
				'class' => 'slider-1-button-2',
			)
		);
		
		register_setting(
			'slider_settings', // settings group name
			'slider_1_button_2', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'slider_1_button_2_url',
			__( 'Slide 1 - Button 2 URL', 'peleman-reseller-theme' ),
			'slider_1_button_2_url_html', // function which prints the field
			'slider-slug', // page slug
			'slider_1_section', // section ID
			array( 
				'label_for' => 'slider_1_button_url',
				'class' => 'slider-1-button-2-url',
			)
		);
		
		register_setting(
			'slider_settings', // settings group name
			'slider_1_button_2_url', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_section(
			'slider_2_section', // section ID
			__( 'Slide 2', 'peleman-reseller-theme' ),
			'', // callback function
			'slider-slug' // page slug
		);
		
		add_settings_field(
			'slider_2_checkbox',
			__( 'Show slide 2', 'peleman-reseller-theme' ),
			'slider_2_checkbox_html', // function which prints the field
			'slider-slug', // page slug
			'slider_2_section', // section ID
			array( 
				'label_for' => 'slider_2_checkbox',
				'class' => 'slider-2-checkbox',
			)
		);
		
		register_setting(
			'slider_settings', // settings group name
			'slider_2_checkbox', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'slider_2_image',
			__( 'Slide 2 - Image', 'peleman-reseller-theme' ),
			'slider_2_image_html', // function which prints the field
			'slider-slug', // page slug
			'slider_2_section', // section ID
			array( 
				'label_for' => 'slider_2_image',
				'class' => 'slider-2-image',
			)
		);
		
		register_setting(
			'slider_settings', // settings group name
			'slider_2_image', // field name
			'sanitize_text_field' // sanitization function
		);
		
		if(!empty(get_option('slider_2_image'))){
			add_settings_field(
				'slider_2_image_preview',
				__( 'Slide 2 - Image - Preview', 'peleman-reseller-theme' ),
				'slider_2_image_preview_html', 
				'slider-slug', 
				'slider_2_section'
			);
		}
		
		add_settings_field(
			'slider_2_subtext',
			__( 'Slide 2 - Subtext', 'peleman-reseller-theme' ),
			'slider_2_subtext_html', // function which prints the field
			'slider-slug', // page slug
			'slider_2_section', // section ID
			array( 
				'label_for' => 'slider_2_subtext',
				'class' => 'slider-2-subtext',
			)
		);
		
		register_setting(
			'slider_settings', // settings group name
			'slider_2_subtext', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'slider_2_maintext',
			__( 'Slide 2 - Main Text', 'peleman-reseller-theme' ),
			'slider_2_maintext_html', // function which prints the field
			'slider-slug', // page slug
			'slider_2_section', // section ID
			array( 
				'label_for' => 'slider_2_maintext',
				'class' => 'slider-2-maintext',
			)
		);
		
		register_setting(
			'slider_settings', // settings group name
			'slider_2_maintext', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'slider_2_button_1',
			__( 'Slide 2 - Button 1 Text', 'peleman-reseller-theme' ),
			'slider_2_button_1_html', // function which prints the field
			'slider-slug', // page slug
			'slider_2_section', // section ID
			array( 
				'label_for' => 'slider_2_button_1',
				'class' => 'slider-2-button-1',
			)
		);
		
		register_setting(
			'slider_settings', // settings group name
			'slider_2_button_1', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'slider_2_button_1_url',
			__( 'Slide 2 - Button 1 URL', 'peleman-reseller-theme' ),
			'slider_2_button_1_url_html', // function which prints the field
			'slider-slug', // page slug
			'slider_2_section', // section ID
			array( 
				'label_for' => 'slider_2_button_1_url',
				'class' => 'slider-2-button-url',
			)
		);
		
		register_setting(
			'slider_settings', // settings group name
			'slider_2_button_1_url', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'slider_2_button_2',
			__( 'Slide 2 - Button 2 Text', 'peleman-reseller-theme' ),
			'slider_2_button_2_html', // function which prints the field
			'slider-slug', // page slug
			'slider_2_section', // section ID
			array( 
				'label_for' => 'slider_2_button_2',
				'class' => 'slider-2-button-2',
			)
		);
		
		register_setting(
			'slider_settings', // settings group name
			'slider_2_button_2', // field name
			'sanitize_text_field' // sanitization function
		);
		
		add_settings_field(
			'slider_2_button_2_url',
			__( 'Slide 2 - Button 2 URL', 'peleman-reseller-theme' ),
			'slider_2_button_2_url_html', // function which prints the field
			'slider-slug', // page slug
			'slider_2_section', // section ID
			array( 
				'label_for' => 'slider_2_button_url',
				'class' => 'slider-2-button-2-url',
			)
		);
		
		register_setting(
			'slider_settings', // settings group name
			'slider_2_button_2_url', // field name
			'sanitize_text_field' // sanitization function
		);
		
// 		add_settings_section(
// 			'slider_3_section', // section ID
// 			'Slide 3', // title
// 			'', // callback function
// 			'slider-slug' // page slug
// 		);
		
// 		add_settings_field(
// 			'slider_3_checkbox',
// 			'Show slide 3',
// 			'slider_3_checkbox_html', // function which prints the field
// 			'slider-slug', // page slug
// 			'slider_3_section', // section ID
// 			array( 
// 				'label_for' => 'slider_3_checkbox',
// 				'class' => 'slider-3-checkbox',
// 			)
// 		);
		
// 		register_setting(
// 			'slider_settings', // settings group name
// 			'slider_3_checkbox', // field name
// 			'sanitize_text_field' // sanitization function
// 		);
		
// 		add_settings_field(
// 			'slider_3_image',
// 			'Slide 3 - Image',
// 			'slider_3_image_html', // function which prints the field
// 			'slider-slug', // page slug
// 			'slider_3_section', // section ID
// 			array( 
// 				'label_for' => 'slider_3_image',
// 				'class' => 'slider-3-image',
// 			)
// 		);
		
// 		register_setting(
// 			'slider_settings', // settings group name
// 			'slider_3_image', // field name
// 			'sanitize_text_field' // sanitization function
// 		);
		
// 		add_settings_field(
// 			'slider_3_subtext',
// 			'Slide 3 - Subtext',
// 			'slider_3_subtext_html', // function which prints the field
// 			'slider-slug', // page slug
// 			'slider_3_section', // section ID
// 			array( 
// 				'label_for' => 'slider_3_subtext',
// 				'class' => 'slider-3-subtext',
// 			)
// 		);
		
// 		register_setting(
// 			'slider_settings', // settings group name
// 			'slider_3_subtext', // field name
// 			'sanitize_text_field' // sanitization function
// 		);
		
// 		add_settings_field(
// 			'slider_3_maintext',
// 			'Slide 3 - Main Text',
// 			'slider_3_maintext_html', // function which prints the field
// 			'slider-slug', // page slug
// 			'slider_3_section', // section ID
// 			array( 
// 				'label_for' => 'slider_3_maintext',
// 				'class' => 'slider-3-maintext',
// 			)
// 		);
		
// 		register_setting(
// 			'slider_settings', // settings group name
// 			'slider_3_maintext', // field name
// 			'sanitize_text_field' // sanitization function
// 		);
		
// 		add_settings_field(
// 			'slider_3_button_1',
// 			'Slide 3 - Button 1 text',
// 			'slider_3_button_1_html', // function which prints the field
// 			'slider-slug', // page slug
// 			'slider_3_section', // section ID
// 			array( 
// 				'label_for' => 'slider_3_button_1',
// 				'class' => 'slider-3-button-1',
// 			)
// 		);
		
// 		register_setting(
// 			'slider_settings', // settings group name
// 			'slider_3_button_1', // field name
// 			'sanitize_text_field' // sanitization function
// 		);
		
// 		add_settings_field(
// 			'slider_3_button_1_url',
// 			'Slide 3 - Button 1 URL',
// 			'slider_3_button_1_url_html', // function which prints the field
// 			'slider-slug', // page slug
// 			'slider_3_section', // section ID
// 			array( 
// 				'label_for' => 'slider_3_button_1_url',
// 				'class' => 'slider-3-button-url',
// 			)
// 		);
		
// 		register_setting(
// 			'slider_settings', // settings group name
// 			'slider_3_button_1_url', // field name
// 			'sanitize_text_field' // sanitization function
// 		);
		
// 		add_settings_field(
// 			'slider_3_button_2',
// 			'Slide 3 - Button 2 text',
// 			'slider_3_button_2_html', // function which prints the field
// 			'slider-slug', // page slug
// 			'slider_3_section', // section ID
// 			array( 
// 				'label_for' => 'slider_3_button_2',
// 				'class' => 'slider-3-button-2',
// 			)
// 		);
		
// 		register_setting(
// 			'slider_settings', // settings group name
// 			'slider_3_button_2', // field name
// 			'sanitize_text_field' // sanitization function
// 		);
		
// 		add_settings_field(
// 			'slider_3_button_2_url',
// 			'Slide 3 - Button 2 URL',
// 			'slider_3_button_url_html', // function which prints the field
// 			'slider-slug', // page slug
// 			'slider_3_section', // section ID
// 			array( 
// 				'label_for' => 'slider_3_button_url',
// 				'class' => 'slider-3-button-2-url',
// 			)
// 		);
		
// 		register_setting(
// 			'slider_settings', // settings group name
// 			'slider_3_button_2_url', // field name
// 			'sanitize_text_field' // sanitization function
// 		);
		
// 		add_settings_section(
// 			'slider_4_section', // section ID
// 			'Slide 4', // title
// 			'', // callback function
// 			'slider-slug' // page slug
// 		);
		
// 		add_settings_field(
// 			'slider_4_checkbox',
// 			'Show slide 4',
// 			'slider_4_checkbox_html', // function which prints the field
// 			'slider-slug', // page slug
// 			'slider_4_section', // section ID
// 			array( 
// 				'label_for' => 'slider_4_checkbox',
// 				'class' => 'slider-4-checkbox',
// 			)
// 		);
		
// 		register_setting(
// 			'slider_settings', // settings group name
// 			'slider_4_checkbox', // field name
// 			'sanitize_text_field' // sanitization function
// 		);
		
// 		add_settings_field(
// 			'slider_4_image',
// 			'Slide 4 - Image',
// 			'slider_4_image_html', // function which prints the field
// 			'slider-slug', // page slug
// 			'slider_4_section', // section ID
// 			array( 
// 				'label_for' => 'slider_4_image',
// 				'class' => 'slider-4-image',
// 			)
// 		);
		
// 		register_setting(
// 			'slider_settings', // settings group name
// 			'slider_4_image', // field name
// 			'sanitize_text_field' // sanitization function
// 		);
		
// 		add_settings_field(
// 			'slider_4_subtext',
// 			'Slide 4 - Subtext',
// 			'slider_4_subtext_html', // function which prints the field
// 			'slider-slug', // page slug
// 			'slider_4_section', // section ID
// 			array( 
// 				'label_for' => 'slider_4_subtext',
// 				'class' => 'slider-4-subtext',
// 			)
// 		);
		
// 		register_setting(
// 			'slider_settings', // settings group name
// 			'slider_4_subtext', // field name
// 			'sanitize_text_field' // sanitization function
// 		);
		
// 		add_settings_field(
// 			'slider_4_maintext',
// 			'Slide 4 - Main Text',
// 			'slider_4_maintext_html', // function which prints the field
// 			'slider-slug', // page slug
// 			'slider_4_section', // section ID
// 			array( 
// 				'label_for' => 'slider_4_maintext',
// 				'class' => 'slider-4-maintext',
// 			)
// 		);
		
// 		register_setting(
// 			'slider_settings', // settings group name
// 			'slider_4_maintext', // field name
// 			'sanitize_text_field' // sanitization function
// 		);
		
// 		add_settings_field(
// 			'slider_4_button_1',
// 			'Slide 4 - Button 1 text',
// 			'slider_4_button_1_html', // function which prints the field
// 			'slider-slug', // page slug
// 			'slider_4_section', // section ID
// 			array( 
// 				'label_for' => 'slider_4_button_1',
// 				'class' => 'slider-4-button-1',
// 			)
// 		);
		
// 		register_setting(
// 			'slider_settings', // settings group name
// 			'slider_4_button_1', // field name
// 			'sanitize_text_field' // sanitization function
// 		);
		
// 		add_settings_field(
// 			'slider_4_button_1_url',
// 			'Slide 4 - Button 1 URL',
// 			'slider_4_button_1_url_html', // function which prints the field
// 			'slider-slug', // page slug
// 			'slider_4_section', // section ID
// 			array( 
// 				'label_for' => 'slider_4_button_1_url',
// 				'class' => 'slider-4-button-url',
// 			)
// 		);
		
// 		register_setting(
// 			'slider_settings', // settings group name
// 			'slider_4_button_1_url', // field name
// 			'sanitize_text_field' // sanitization function
// 		);
		
// 		add_settings_field(
// 			'slider_4_button_2',
// 			'Slide 4 - Button 2 text',
// 			'slider_4_button_2_html', // function which prints the field
// 			'slider-slug', // page slug
// 			'slider_4_section', // section ID
// 			array( 
// 				'label_for' => 'slider_4_button_2',
// 				'class' => 'slider-4-button-2',
// 			)
// 		);
		
// 		register_setting(
// 			'slider_settings', // settings group name
// 			'slider_4_button_2', // field name
// 			'sanitize_text_field' // sanitization function
// 		);
		
// 		add_settings_field(
// 			'slider_4_button_2_url',
// 			'Slide 4 - Button 2 URL',
// 			'slider_4_button_url_html', // function which prints the field
// 			'slider-slug', // page slug
// 			'slider_4_section', // section ID
// 			array( 
// 				'label_for' => 'slider_4_button_url',
// 				'class' => 'slider-4-button-2-url',
// 			)
// 		);
		
// 		register_setting(
// 			'slider_settings', // settings group name
// 			'slider_4_button_2_url', // field name
// 			'sanitize_text_field' // sanitization function
// 		);
		
// 		add_settings_section(
// 			'reset_slider_section', // section ID
// 			'Reset slider to standard values', // title
// 			'display_reset_settings_message', // callback function
// 			'slider-slug' // page slug
// 		);
		
// 		add_settings_field(
// 			'reset_slider_button',
// 			'Reset slider',
// 			'reset_slider_button_html', // function which prints the field
// 			'slider-slug', // page slug
// 			'reset_slider_section', // section ID
// 			array( 
// 				'label_for' => 'reset_slider_button',
// 				'class' => 'reset-companydetails-button-text',
// 			)
// 		);

// 		register_setting(
// 			'slider_settings', // settings group name
// 			'reset_slider_button', // field name
// 			'sanitize_text_field' // sanitization function
// 		);

	}

	function display_companydetails_settings_message() {
		?>
			<p><?php _e( 'Fill out your company details to show them on the website.', 'peleman-reseller-theme' ); ?></p>
		<?php
	}

	function display_logo_settings_message() {
		?>
			<p><?php _e( 'Upload or choose your company logo', 'peleman-reseller-theme' ); ?></p>
		<?php
	}

	function display_socialmedia_settings_message() {
		?>
			<p><?php _e( 'Fill in the URL of your social media. Leave it empty to hide on the website.', 'peleman-reseller-theme' ); ?></p>
		<?php
	}

	function display_style_settings_message() {
		?>
			<p><?php _e( 'Change style of your website', 'peleman-reseller-theme' ); ?></p>
		<?php
	}

	function display_reset_settings_message() {
		?>
			<p><?php _e( 'Reset the website to the standard demo values.<br/>Please do this after or before every demo.', 'peleman-reseller-theme' ); ?></p>
		<?php
	}

	function company_name_field_html() {
		$company_name = get_option( 'company_name' );
		echo '<input type="text" id="company_name" name="company_name" value="'.$company_name.'" />';
	}

	function address_text_field_html() {
		$banner_text = get_option( 'address_text' );
		echo '<input type="text" id="address_text" name="address_text" value="'.$banner_text.'" />';
	}

	function postal_text_field_html() {
		$postal_text = get_option( 'postal_text' );
		echo '<input type="text" id="postal_text" name="postal_text" value="'.$postal_text.'" />';
	}

	function city_text_field_html() {
		$city_text = get_option( 'city_text' );
		echo '<input type="text" id="city_text" name="city_text" value="'.$city_text.'" />';
	}

	function country_text_field_html() {
		$country_text = get_option( 'country_text' );
// 		echo '<input type="text" id="country_text" name="country_text" value="'.$country_text.'" />';
		$html = '<select id="country_text" name="country_text">';
			$html .= '<option value="default">Select a country</option>';		
			$html .= '<option value="AT"' . selected( $country_text, 'AT', false) . '>Austria</option>';
			$html .= '<option value="BE"' . selected( $country_text, 'BE', false) . '>Belgium</option>';
			$html .= '<option value="BG"' . selected( $country_text, 'BG', false) . '>Bulgaria</option>';
			$html .= '<option value="HR"' . selected( $country_text, 'HR', false) . '>Croatia</option>';
			$html .= '<option value="CY"' . selected( $country_text, 'CY', false) . '>Cyprus</option>';
			$html .= '<option value="CZ"' . selected( $country_text, 'CZ', false) . '>Czech Republic</option>';
			$html .= '<option value="DK"' . selected( $country_text, 'DK', false) . '>Denmark</option>';
			$html .= '<option value="EE"' . selected( $country_text, 'EE', false) . '>Estonia</option>';
			$html .= '<option value="FI"' . selected( $country_text, 'FI', false) . '>Finland</option>';
			$html .= '<option value="FR"' . selected( $country_text, 'FR', false) . '>France</option>';
			$html .= '<option value="DE"' . selected( $country_text, 'DE', false) . '>Germany</option>';
			$html .= '<option value="GR"' . selected( $country_text, 'GR', false) . '>Greece</option>';
			$html .= '<option value="HU"' . selected( $country_text, 'HU', false) . '>Hungary</option>';
			$html .= '<option value="IE"' . selected( $country_text, 'IE', false) . '>Ireland</option>';
			$html .= '<option value="IT"' . selected( $country_text, 'IT', false) . '>Italy</option>';
			$html .= '<option value="LV"' . selected( $country_text, 'LV', false) . '>Latvia</option>';
			$html .= '<option value="LT"' . selected( $country_text, 'LT', false) . '>Lithuania</option>';
			$html .= '<option value="LU"' . selected( $country_text, 'LU', false) . '>Luxembourg</option>';
			$html .= '<option value="MT"' . selected( $country_text, 'MT', false) . '>Malta</option>';
			$html .= '<option value="NL"' . selected( $country_text, 'NL', false) . '>The Netherlands</option>';
			$html .= '<option value="PL"' . selected( $country_text, 'PL', false) . '>Poland</option>';
			$html .= '<option value="PT"' . selected( $country_text, 'PT', false) . '>Portugal</option>';
			$html .= '<option value="RO"' . selected( $country_text, 'RO', false) . '>Romania</option>';
			$html .= '<option value="SK"' . selected( $country_text, 'SK', false) . '>Slovakia</option>';
			$html .= '<option value="SI"' . selected( $country_text, 'SI', false) . '>Slovenia</option>';
			$html .= '<option value="ES"' . selected( $country_text, 'ES', false) . '>Spain</option>';
			$html .= '<option value="SE"' . selected( $country_text, 'SE', false) . '>Sweden</option>';
		$html .= '</select>';

		echo $html;
	}

	function email_text_field_html() {
		$banner_text = get_option( 'email_text' );
		echo '<input type="text" id="email_text" name="email_text" value="'.$banner_text.'" />';
	}

	function phone_number_text_field_html() {
		$banner_text = get_option( 'phone_number_text' );
		echo '<input type="text" id="phone_number_text" name="phone_number_text" value="'.$banner_text.'" />';
	}

	function facebook_text_field_html() {
		$facebook_text = get_option( 'facebook_text' );
		echo '<input id="facebook_text" name="facebook_text" type="text" value="'.$facebook_text.'" />';
	}

	function twitter_text_field_html() {
		$twitter_text = get_option( 'twitter_text' );
		echo '<input id="twitter_text" name="twitter_text" type="text" value="'.$twitter_text.'" />';
	}

	function instagram_text_field_html() {
		$instagram_text = get_option( 'instagram_text' );
		echo '<input id="instagram_text" name="instagram_text" type="text" value="'.$instagram_text.'" />';
	}

	function linkedin_text_field_html() {
		$linkedin_text = get_option( 'linkedin_text' );
		echo '<input id="linkedin_text" name="linkedin_text" type="text" value="'.$linkedin_text.'" />';
	}

	function notification_header_field_html() {
		$notification_text = get_option( 'notification_text' );
		echo '<input id="notification_text" name="notification_text" type="text" value="'.$notification_text.'" />';
	}

	function about_text_field_html() {
		$about_text = get_option( 'about_text' );
		
		echo "<div style='width:50%;'>";
		wp_editor($about_text,"about_text", array('textarea_rows'=>10, 'editor_class'=>'about_text'));
		echo "</div>";
	}

	function termsconditions_text_field_html() {
		$termsconditions_text = get_option( 'termsconditions_text' );
		
		echo "<div style='width:50%;'>";
		wp_editor($termsconditions_text,"termsconditions_text", array('textarea_rows'=>10, 'editor_class'=>'termsconditions_text'));
		echo "</div>";
	}

	function main_color_field_html() {
		$main_color = get_option( 'main_color' );
		echo '<input id="main_color" name="main_color" class="color-field" type="text" value="'.$main_color.'" />';
	}

	function secondary_color_field_html() {
		$secondary_color = get_option( 'secondary_color' );
		echo '<input type="text" id="secondary_color" name="secondary_color" class="color-field" value="'.$secondary_color.'" />';
	}

	function main_text_color_field_html() {
		$main_text_color = get_option( 'main_text_color' );
		echo '<input id="main_text_color" name="main_text_color" class="color-field" type="text" value="'.$main_text_color.'" />';
	}

	function menu_text_color_field_html() {
		$menu_text_color = get_option( 'menu_text_color' );
		echo '<input type="text" name="menu_text_color" value="'.$menu_text_color.'" id="menu_text_color" class="color-field">';
	}

	function wptuts_setting_logo_field_html() {
		$wptuts_options = get_option( 'wptuts_setting_logo' );
		?>
			<div class="upload_field">
<!-- 				<input type="text" name="upload_one" id="upload_one" class="upload" value="" />
				<input type="button" class="upload-button" value="Upload Image" /> -->
				
				<input type="hidden" id="upload_one" name="wptuts_setting_logo" value="<?php echo esc_url( $wptuts_options ); ?>" />
				
				<?php empty($wptuts_options) ? $text_button_upload = __( 'Upload logo', 'peleman-reseller-theme' ) : $text_button_upload = __( 'Choose another logo', 'peleman-reseller-theme' ) ?>
				<input id="upload_logo_button" class="button upload-button" type="button" value="<?php _e( $text_button_upload, 'peleman-reseller-theme' ); ?>" />
				<?php if ( !empty($wptuts_options) ): ?>
				<input id="delete_logo_button" name="theme_wptuts_options[delete_logo]" type="submit" onclick="document.getElementById('upload_one').value = ''" class="button" value="<?php _e( 'Delete logo', 'peleman-reseller-theme' ); ?>" />
				<?php else: ?>
				<span class="description"><?php _e('Upload or choose your logo.', 'peleman-reseller-theme' ); ?></span>
				<?php endif; ?>
			</div>
		<?php
	}

	function wptuts_setting_logo_preview() {
		$wptuts_options = get_option( 'wptuts_setting_logo' );  ?>
		<div id="upload_logo_preview" style="min-height: 100px;">
			<?php if (!empty($wptuts_options)){ ?>
			<img style="max-width:100%;" src="<?php echo esc_url( $wptuts_options ); ?>" />
			<?php }else { echo '<p>Image will be generated after saving your changes.</p>';} ?>
		</div>
		<?php
	}

	function wptuts_setting_logo_white_field_html() {
		$wptuts_options2 = get_option( 'wptuts_setting_logo_white' );
		?>
			<div class="upload_field">
				<input type="hidden" id="upload_two" name="wptuts_setting_logo_white" value="<?php echo esc_url( $wptuts_options2 ); ?>" />

				<?php empty($wptuts_options2) ? $text_button_upload = _e( 'Upload logo', 'peleman-reseller-theme' ) : $text_button_upload = __( 'Choose another logo', 'peleman-reseller-theme' ) ?>
				<input id="logo_white_uploader" type="button" class="button upload-button" value="<?php _e( $text_button_upload, 'peleman-reseller-theme' ); ?>" />
				<?php if ( !empty($wptuts_options2) ): ?>
				<input id="delete_logo_button" name="theme_wptuts_options[delete_logo]" type="submit" onclick="document.getElementById('upload_two').value = ''" class="button" value="<?php _e( 'Delete logo', 'peleman-reseller-theme' ); ?>" />
				<?php else: ?>
				<span class="description"><?php _e('Upload or choose your logo.', 'peleman-reseller-theme' ); ?></span>
				<?php endif; ?>
			</div>
		<?php
	}

	function wptuts_setting_logo_white_preview() {
		$wptuts_options2 = get_option( 'wptuts_setting_logo_white' );  ?>
		<div id="white_logo_preview" style="min-height: 100px;">
			<?php if (!empty($wptuts_options2)){ ?>
			<img style="max-width:100%;" src="<?php echo esc_url( $wptuts_options2 ); ?>" />
			<?php }else { echo '<p>Image will be generated after saving your changes.</p>';} ?>
		</div>
		<?php
	}

	function h1_text_field_html() {
		$h1_text = get_option( 'h1_text' );
		echo '<input id="h1_text" name="h1_text" type="number" value="'.$h1_text.'" min="1" max="999" /><span class="description">px</span>';
	}

	function h2_text_field_html() {
		$h2_text = get_option( 'h2_text' );
		echo '<input id="h2_text" name="h2_text" type="number" value="'.$h2_text.'" min="1" max="999" /><span class="description">px</span>';
	}

	function h3_text_field_html() {
		$h3_text = get_option( 'h3_text' );
		echo '<input id="h3_text" name="h3_text" type="number" value="'.$h3_text.'" min="1" max="999" /><span class="description">px</span>';
	}

	function h4_text_field_html() {
		$h4_text = get_option( 'h4_text' );
		echo '<input id="h4_text" name="h4_text" type="number" value="'.$h4_text.'" min="1" max="999" /><span class="description">px</span>';
	}

	function h5_text_field_html() {
		$h5_text = get_option( 'h5_text' );
		echo '<input id="h5_text" name="h5_text" type="number" value="'.$h5_text.'" min="1" max="999" /><span class="description">px</span>';
	}

	function h6_text_field_html() {
		$h6_text = get_option( 'h6_text' );
		echo '<input id="h6_text" name="h6_text" type="number" value="'.$h6_text.'" min="1" max="999" /><span class="description">px</span>';
	}

	function orderby_select_html() {
		$orderby_select = get_option( 'orderby_select' );
		$html = '<select id="orderby_select" name="orderby_select">';
			$html .= '<option value="popularity"' . selected( $orderby_select, 'popularity', false) . '>'.__( 'Popularity - By number of sales', 'peleman-reseller-theme' ).'</option>';
			$html .= '<option value="date"' . selected( $orderby_select, 'date', false) . '>'.__( 'Latest - Recently added products will be displayed first', 'peleman-reseller-theme' ).'</option>';
			$html .= '<option value="price"' . selected( $orderby_select, 'price', false) . '>'.__( 'Price ascending - cheapest products displayed first', 'peleman-reseller-theme' ).'</option>';
			$html .= '<option value="price-desc"' . selected( $orderby_select, 'price-desc', false) . '>'.__( 'Price descending - most expensive products first', 'peleman-reseller-theme' ).'</option>';
			$html .= '<option value="alphabetical"' . selected( $orderby_select, 'alphabetical', false) . '>'.__( 'Alphabetical order - Products from A to Z', 'peleman-reseller-theme' ).'</option>';
			$html .= '<option value="alphabetical-desc"' . selected( $orderby_select, 'alphabetical-desc', false) . '>'.__( 'Alphabetical order - Products from Z to A', 'peleman-reseller-theme' ).'</option>';
			$html .= '<option value="rand"' . selected( $orderby_select, 'rand', false) . '>'.__( 'Random - Random order', 'peleman-reseller-theme' ).'</option>';
		$html .= '</select>';

		echo $html;
	}

	function slider_1_checkbox_html() {
		$slider_1_checkbox = get_option( 'slider_1_checkbox' );
		echo '<input type="checkbox" id="slider_1_checkbox" name="slider_1_checkbox" value="1"' . checked( 1, $slider_1_checkbox, false ) . '/><label for="slider_1_checkbox">Show this slide on the homepage</label>';
	}

	function slider_1_image_html() {
		$wptuts_options = get_option( 'slider_1_image' );
		?>
			<div class="upload_field">
 				<input type="hidden" id="upload_three" name="slider_1_image" value="<?php echo esc_url( $wptuts_options ); ?>" />
				
				<?php empty($wptuts_options) ? $text_button_upload = 'Upload image' : $text_button_upload = 'Choose another image' ?>
				<input id="upload_logo_button" class="button upload-button" type="button" value="<?php _e( $text_button_upload, 'peleman-reseller-theme' ); ?>" />
				<?php if ( !empty($wptuts_options) ): ?>
				<input id="delete_logo_button" name="theme_wptuts_options[delete_logo]" type="submit" onclick="document.getElementById('upload_three').value = ''" class="button" value="<?php _e( 'Delete image', 'peleman-reseller-theme' ); ?>" />
				<?php else: ?>
				<span class="description"><?php _e('Upload or choose your image for the slide.', 'peleman-reseller-theme' ); ?></span>
				<?php endif; ?>
			</div>
		<?php
	}

	function slider_1_image_preview_html() {
		$wptuts_options = get_option( 'slider_1_image' );  ?>
		<div id="upload_logo_preview" style="min-height: 100px;">
			<?php if (!empty($wptuts_options)){ ?>
			<img style="max-width:25%;" src="<?php echo esc_url( $wptuts_options ); ?>" />
			<?php }else { echo '<p>Image will be generated after saving your changes.</p>';} ?>
		</div>
		<?php
	}

	function slider_1_subtext_html() {
		$slider_1_subtext = get_option( 'slider_1_subtext' );
		echo '<input id="slider_1_subtext" name="slider_1_subtext" type="text" value="'.$slider_1_subtext.'" />';
	}

	function slider_1_maintext_html() {
		$slider_1_maintext = get_option( 'slider_1_maintext' );
		echo '<input id="slider_1_maintext" name="slider_1_maintext" type="text" value="'.$slider_1_maintext.'" />';
	}

	function slider_1_button_1_html() {
		$slider_1_button_1 = get_option( 'slider_1_button_1' );
		echo '<input id="slider_1_button_1" name="slider_1_button_1" type="text" value="'.$slider_1_button_1.'" />';
	}

	function slider_1_button_1_url_html() {
		$slider_1_button_1_url = get_option( 'slider_1_button_1_url' );
		echo '<input id="slider_1_button_1_url" name="slider_1_button_1_url" type="text" value="'.$slider_1_button_1_url.'" />';
	}

	function slider_1_button_2_html() {
		$slider_1_button_2 = get_option( 'slider_1_button_2' );
		echo '<input id="slider_1_button_2" name="slider_1_button_2" type="text" value="'.$slider_1_button_2.'" />';
	}

	function slider_1_button_2_url_html() {
		$slider_1_button_2_url = get_option( 'slider_1_button_2_url' );
		echo '<input id="slider_1_button_2_url" name="slider_1_button_2_url" type="text" value="'.$slider_1_button_2_url.'" />';
	}

	function slider_2_checkbox_html() {
		$slider_2_checkbox = get_option( 'slider_2_checkbox' );
		echo '<input type="checkbox" id="slider_2_checkbox" name="slider_2_checkbox" value="1"' . checked( 1, $slider_2_checkbox, false ) . '/><label for="slider_2_checkbox">Show this slide on the homepage</label>';
	}

	function slider_2_image_html() {
		$wptuts_options = get_option( 'slider_2_image' );
		?>
			<div class="upload_field">
 				<input type="hidden" id="upload_four" name="slider_2_image" value="<?php echo esc_url( $wptuts_options ); ?>" />
				
				<?php empty($wptuts_options) ? $text_button_upload = 'Upload image' : $text_button_upload = 'Choose another image' ?>
				<input id="upload_logo_button" class="button upload-button" type="button" value="<?php _e( $text_button_upload, 'peleman-reseller-theme' ); ?>" />
				<?php if ( !empty($wptuts_options) ): ?>
				<input id="delete_logo_button" name="theme_wptuts_options[delete_logo]" type="submit" onclick="document.getElementById('upload_four').value = ''" class="button" value="<?php _e( 'Delete image', 'peleman-reseller-theme' ); ?>" />
				<?php else: ?>
				<span class="description"><?php _e('Upload or choose your image for the slide.', 'peleman-reseller-theme' ); ?></span>
				<?php endif; ?>
			</div>
		<?php
	}

	function slider_2_image_preview_html() {
		$wptuts_options = get_option( 'slider_2_image' );  ?>
		<div id="upload_logo_preview" style="min-height: 100px;">
			<?php if (!empty($wptuts_options)){ ?>
			<img style="max-width:25%;" src="<?php echo esc_url( $wptuts_options ); ?>" />
			<?php }else { echo '<p>Image will be generated after saving your changes.</p>';} ?>
		</div>
		<?php
	}

	function slider_2_subtext_html() {
		$slider_2_subtext = get_option( 'slider_2_subtext' );
		echo '<input id="slider_2_subtext" name="slider_2_subtext" type="text" value="'.$slider_2_subtext.'" />';
	}

	function slider_2_maintext_html() {
		$slider_2_maintext = get_option( 'slider_2_maintext' );
		echo '<input id="slider_2_maintext" name="slider_2_maintext" type="text" value="'.$slider_2_maintext.'" />';
	}

	function slider_2_button_1_html() {
		$slider_2_button_1 = get_option( 'slider_2_button_1' );
		echo '<input id="slider_2_button_1" name="slider_2_button_1" type="text" value="'.$slider_2_button_1.'" />';
	}

	function slider_2_button_1_url_html() {
		$slider_2_button_1_url = get_option( 'slider_2_button_1_url' );
		echo '<input id="slider_2_button_1_url" name="slider_2_button_1_url" type="text" value="'.$slider_2_button_1_url.'" />';
	}

	function slider_2_button_2_html() {
		$slider_2_button_2 = get_option( 'slider_2_button_2' );
		echo '<input id="slider_2_button_2" name="slider_2_button_2" type="text" value="'.$slider_2_button_2.'" />';
	}

	function slider_2_button_2_url_html() {
		$slider_2_button_2_url = get_option( 'slider_2_button_2_url' );
		echo '<input id="slider_2_button_2_url" name="slider_2_button_2_url" type="text" value="'.$slider_2_button_2_url.'" />';
	}

	function slider_3_checkbox_html() {
		$slider_3_checkbox = get_option( 'slider_3_checkbox' );
		echo '<input type="checkbox" id="slider_3_checkbox" name="slider_3_checkbox" value="1"' . checked( 1, $slider_3_checkbox, false ) . '/><label for="slider_3_checkbox">Show this slide on the homepage</label>';
	}

	function slider_4_checkbox_html() {
		$slider_4_checkbox = get_option( 'slider_4_checkbox' );
		echo '<input type="checkbox" id="slider_4_checkbox" name="slider_4_checkbox" value="1"' . checked( 1, $slider_4_checkbox, false ) . '/><label for="slider_4_checkbox">Show this slide on the homepage</label>';
	}

	function reset_companydetails_button_html(){
		?>
			<div>
				<button id="reset_details" type="button" class="button button-secondary" style="button">
					Reset company details
				</button>
			</div>
		<?php
	}

	function reset_logo_button_html(){
		?>
			<div>
				<button id="reset_logos" type="button" class="button button-secondary" style="button">
					Reset logo's
				</button>
			</div>
		<?php
	}

	function reset_colors_button_html(){
		?>
			<div>
				<button id="reset_colors" type="button" class="button button-secondary" style="button">
					Reset styling
				</button>
			</div>
		<?php
	}

	function reset_slider_button_html(){
		?>
			<div>
				<button id="reset_slider" type="button" class="button button-secondary" style="button">
					Reset slider
				</button>
			</div>
		<?php
	}
	
	// Replace button text inside Media Uploader
	function wptuts_options_setup() {
		global $pagenow;

		if ( 'media-upload.php' == $pagenow || 'async-upload.php' == $pagenow ) {
			// Now we'll replace the 'Insert into Post Button' inside Thickbox
			add_filter( 'gettext', 'replace_thickbox_text'  , 1, 3 );
		}
	}
	add_action( 'admin_init', 'wptuts_options_setup' );

	function replace_thickbox_text($translated_text, $text, $domain) {
		if ('Insert into Post' == $text) {
			$referer = strpos( wp_get_referer(), 'wptuts-settings' );
			if ( $referer != '' ) {
				return __('I want this to be my logo!', 'peleman-reseller-theme' );
			}
		}
		return $translated_text;
	}

	add_action( 'admin_notices', 'rudr_notice' );
	function rudr_notice() {
		if(
			isset( $_GET[ 'page' ] ) 
			&& 'peleman_reseller_theme_options' == $_GET[ 'page' ]
			&& isset( $_GET[ 'settings-updated' ] ) 
			&& true == $_GET[ 'settings-updated' ]
		) {
			?>
				<div class="notice notice-success is-dismissible">
					<p>
						<strong>Changes saved succesfully</strong>
					</p>
				</div>
			<?php
		}
	}

// Shortcode to output custom PHP in Visual Composer
function wpc_vc_shortcode( $atts ) {
	ob_start();
	echo get_option('company_name').'<br/>'.get_option('address_text').'<br/>'.get_option('postal_text').' '.get_option('city_text').', '.get_option('country_text');
	return ob_get_clean();
}
add_shortcode( 'copyshop_address', 'wpc_vc_shortcode');

function wpc_vc_shortcode_termsconditions( $atts ) {
	ob_start();
	echo get_option('termsconditions_text');
	return ob_get_clean();
}
add_shortcode( 'terms_conditions_shortcode', 'wpc_vc_shortcode_termsconditions');

// Shortcode to output custom PHP in Visual Composer
function wpc_vc_shortcode2( $atts ) {
	ob_start();
	echo 'E-mail: <a href="mailto:'.get_option('email_text').'">'.get_option('email_text').'</a><br/>Tel: <a href="tel:'.get_option('phone_number_text').'">'.get_option('phone_number_text').'</a>';
	return ob_get_clean();
}
add_shortcode( 'copyshop_contact', 'wpc_vc_shortcode2');

// Shortcode to output custom PHP in Visual Composer
function wpc_vc_shortcode3( $atts ) {
	ob_start();
	$address_map = get_option('address_text').'%20'.get_option('postal_text').'%20'.get_option('city_text');

	echo '<div style="width: 100%; margin-top: 10px;"><iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q='.$address_map.'+()&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/sport-gps/">hiking gps</a></iframe></div>';
	return ob_get_clean();
}
add_shortcode( 'maps_address', 'wpc_vc_shortcode3');

// Shortcode to output custom PHP in Visual Composer
function wpc_vc_shortcode4( $atts ) {
	ob_start();
	echo get_option('about_text');
	return ob_get_clean();
}
add_shortcode( 'copyshop_about_text', 'wpc_vc_shortcode4');

// Shortcode to output custom PHP in Visual Composer
function wpc_vc_shortcode5( $atts ) {
	ob_start();
	if (!empty(get_option('wptuts_setting_logo_white'))){
		echo '<img loading="lazy" src="'.get_option('wptuts_setting_logo_white').'" alt="Logo" width="50%" style="margin-bottom: 10px;">';
	}
	return ob_get_clean();
}
add_shortcode( 'copyshop_white_logo', 'wpc_vc_shortcode5');

// Shortcode to output custom PHP in Visual Composer
function wpc_vc_shortcode6( $atts ) {
	ob_start();
	echo '<div class="row">';
		echo '<div class="col-md-6">';
			echo get_option('company_name').'<br/>'.get_option('address_text').'<br/>'.get_option('postal_text').' '.get_option('city_text').', '.get_option('country_text');
		echo '</div>';
	
		echo '<div class="col-md-6">';
			echo 'E-mail: <a href="mailto:'.get_option('email_text').'">'.get_option('email_text').'</a><br/>Tel: <a href="tel:'.get_option('phone_number_text').'">'.get_option('phone_number_text').'</a>';
		echo '</div>';
	echo '</div>';
	return ob_get_clean();
}
add_shortcode( 'copyshop_contactdetails_2rows', 'wpc_vc_shortcode6');