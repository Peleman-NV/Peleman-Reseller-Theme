<?php global $woocommerce; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?php wp_head(); ?>
		
		<?php include_once('assets/css/theme-style-options.php'); ?>
	</head>

	<body <?php body_class(); ?>>
  		<div class="body-inner">
			
			<?php if(empty(get_option('notification_text')) && empty(get_option('twitter_text')) && empty(get_option('facebook_text')) && empty(get_option('instagram_text')) && empty(get_option('linkedin_text'))){
			}else { ?>
			<div id="top-bar" class="top-bar">
				<div class="container">
				  <div class="row">
					  <div class="col-lg-8 col-md-8">
						<ul class="top-info text-center text-md-left">
							<?php if(!empty(get_option('notification_text'))){ ?>
							<li>
								<i class="icon-bell"></i> <p class="info-text"><?= get_option('notification_text'); ?></p>
							</li>
							<?php }; ?>
						</ul>
					  </div>
					  <!--/ Top info end -->

					  <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
						<ul class="list-unstyled">
							<li>

								<?php if(!empty(get_option('facebook_text'))){ ?>
								<a title="Facebook" href="<?php echo get_option('facebook_text'); ?>" target="_blank">
									<span class="social-icon"><i class="icon-social-facebook"></i></span>
								</a>
								<?php }; ?>

								<?php if(!empty(get_option('twitter_text'))){ ?>
								<a title="Twitter" href="<?php echo get_option('twitter_text'); ?>" target="_blank">
								  <span class="social-icon"><i class="icon-social-twitter"></i></span>
								</a>
								<?php }; ?>

								<?php if(!empty(get_option('instagram_text'))){ ?>
								<a title="Instagram" href="<?php echo get_option('instagram_text'); ?>" target="_blank">
								  <span class="social-icon"><i class="icon-social-instagram"></i></span>
								</a>
								<?php }; ?>

								<?php if(!empty(get_option('linkedin_text'))){ ?>
								<a title="Linkedin" href="<?php echo get_option('linkedin_text'); ?>" target="_blank">
								  <span class="social-icon"><i class="icon-social-linkedin"></i></span>
								</a>
								<?php }; ?>
							</li>
						</ul>
					  </div>
					  <!--/ Top social end -->
				  </div>
				  <!--/ Content row end -->
				</div>
				<!--/ Container end -->
			</div>
			<?php } ?>

			<header id="header" class="header-one">
			  <div class="bg-white">
				<div class="container">
				  <div class="logo-area">
					  <div class="row align-items-center">
						<div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
							<a class="d-block" href="<?php echo home_url(); ?>">
								<?php if ( !empty(get_option('wptuts_setting_logo')) ): ?>
									<img loading="lazy" src="<?= get_option('wptuts_setting_logo'); ?>" alt="Logo">
								<?php else: ?>
									<img loading="lazy" src="/wp-content/uploads/2022/09/logo-color.png" alt="Constra">
								<?php endif; ?>
							</a>
						</div>

						<div class="col-lg-9 header-right">
								<ul class="top-info-box">
								  <li>
									<div class="info-box">
									  <div class="info-box-content">
										  <p class="info-box-title"><?php echo __('Call us','peleman-reseller-theme') ?></p>
										  <p class="info-box-subtitle"><a href="tel: <?php echo get_option('phone_number_text'); ?>"><?php echo get_option('phone_number_text'); ?></a></p>
									  </div>
									</div>
								  </li>
								  <li>
									<div class="info-box">
									  <div class="info-box-content">
										  <p class="info-box-title"><?php echo __('E-mail us','peleman-reseller-theme') ?></p>
										  <p class="info-box-subtitle"><a href="mailto: <?php echo get_option('email_text'); ?>"><?php echo get_option('email_text'); ?></a></p>
									  </div>
									</div>
								  </li>

								<li class="header-get-a-quote" style="">

									<?php get_search_form(); ?>

									<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>"><span class="header-icon icon-user"></span></a>

									<a href="#" id="cart dropdownMenuButton" class="cart-contents" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span class="header-icon icon-basket" value="<?php echo WC()->cart->get_cart_contents_count(); ?>"></span>
									</a>

									<div class="dropdown-menu mini-basket-dropdown dropdown-menu-right dropdown-cart dropdown cart-dropdown badge-type inline-type" aria-labelledby="dropdownMenuButton">
										<?php woocommerce_mini_cart() ?>
									</div>

									<a class="btn btn-primary btn-header-secondary" style="border-radius: 0; padding: 12px 30px !important;" href="<?php echo home_url(); ?>/contact"><?php echo __('Contact us','peleman-reseller-theme') ?></a>
								</li>
							</ul>
						  </div>
						</div>
				  </div>
				</div>
			  </div>

			  <div class="site-navigation">
				<div class="container">
					<div class="row">
					  <div class="col-lg-12">
						  <nav class="navbar navbar-expand-lg navbar-dark p-0">
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>

							<?php wp_nav_menu( array(
								'theme_location' => 'main-menu', 
								'menu_class' => 'nav navbar-nav mr-auto',
								'container' => "div",
								'container_class' => "collapse navbar-collapse",
								'container_id' => "navbar-collapse",
								'add_li_class'  => 'nav-item',
								'link_class'   => 'nav-link'
							) ); ?>

						  </nav>
					  </div>
					</div>
				</div>
			  </div>
			</header>