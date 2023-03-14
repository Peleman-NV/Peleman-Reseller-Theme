<?php get_header(); ?>

<section class="no-padding">
  <div class="container">

	  <?php if ( is_front_page() ): ?>
	  <div class="banner-carousel banner-carousel-1 mb-50" style="margin-bottom: 40px;">	  
		  <?php if(get_option('slider_1_checkbox')): ?>
		  <div class="banner-carousel-item" style="background-image:url(<?= get_option('slider_1_image'); ?>)">
			  <div class="slider-content">
				  <div class="container h-100">
					  <div class="row align-items-center h-100">
						  <div class="col-md-12 text-center">
							  <h2 class="slide-title" style="text-shadow: 2px 2px 4px #595959;"><?= get_option('slider_1_subtext'); ?></h2>
							  <h3 class="slide-sub-title" style="text-shadow: 2px 2px 4px #595959;"><?= get_option('slider_1_maintext'); ?></h3>
							  <p>
								  <?php if(!empty(get_option('slider_1_button_1'))): ?>
								  	<a href="<?= get_option('slider_1_button_1_url'); ?>" class="slider btn btn-primary" style="color: white; background-color: <?= get_option('main_color'); ?>;"><?= get_option('slider_1_button_1'); ?></a>
								  <?php endif; ?>
								  
								  <?php if(!empty(get_option('slider_1_button_2'))): ?>
									  <a href="<?= get_option('slider_1_button_2_url'); ?>" class="slider btn btn-primary border" style="color: white; background-color: <?= get_option('secondary_color'); ?>;"><?= get_option('slider_1_button_2'); ?></a>
								  <?php endif; ?>
							  </p>
						  </div>
					  </div>
				  </div>
			  </div>
		  </div>
		  <?php endif; ?>
		  
		  <?php if(get_option('slider_2_checkbox')): ?>
		  <div class="banner-carousel-item" style="background-image:url(<?= get_option('slider_2_image'); ?>)">
			  <div class="slider-content">
				  <div class="container h-100">
					  <div class="row align-items-center h-100">
						  <div class="col-md-12 text-center">
							  <h2 class="slide-title" style="text-shadow: 2px 2px 4px #595959;"><?= get_option('slider_2_subtext'); ?></h2>
							  <h3 class="slide-sub-title" style="text-shadow: 2px 2px 4px #595959;"><?= get_option('slider_2_maintext'); ?></h3>
							  <p>
								  <?php if(!empty(get_option('slider_2_button_1'))): ?>
								  	<a href="<?= get_option('slider_2_button_1_url'); ?>" class="slider btn btn-primary" style="color: white; background-color: <?= get_option('main_color'); ?>;"><?= get_option('slider_2_button_1'); ?></a>
								  <?php endif; ?>
								  
								  <?php if(!empty(get_option('slider_2_button_2'))): ?>
									  <a href="<?= get_option('slider_2_button_2_url'); ?>" class="slider btn btn-primary" style="color: white; background-color: <?= get_option('secondary_color'); ?>;"><?= get_option('slider_2_button_2'); ?></a>
								  <?php endif; ?>
							  </p>
						  </div>
					  </div>
				  </div>
			  </div>
		  </div>
		  <?php endif; ?>
		  
		  <?php if(get_option('slider_3_checkbox')): ?>
		  <div class="banner-carousel-item" style="background-image:url(<?= get_option('slider_3_image'); ?>)">
			  <div class="slider-content">
				  <div class="container h-100">
					  <div class="row align-items-center h-100">
						  <div class="col-md-12 text-center">
							  <h2 class="slide-title" style="text-shadow: 2px 2px 4px #595959;"><?= get_option('slider_3_subtext'); ?></h2>
							  <h3 class="slide-sub-title" style="text-shadow: 2px 2px 4px #595959;"><?= get_option('slider_3_maintext'); ?></h3>
							  <p>
								  <?php if(!empty(get_option('slider_3_button_1'))): ?>
								  	<a href="<?= get_option('slider_3_button_1_url'); ?>" class="slider btn btn-primary" style="color: white; background-color: <?= get_option('main_color'); ?>;"><?= get_option('slider_3_button_1'); ?></a>
								  <?php endif; ?>
								  
								  <?php if(!empty(get_option('slider_3_button_2'))): ?>
									  <a href="<?= get_option('slider_3_button_2_url'); ?>" class="slider btn btn-primary" style="color: white; background-color: <?= get_option('secondary_color'); ?>;"><?= get_option('slider_3_button_2'); ?></a>
								  <?php endif; ?>
							  </p>
						  </div>
					  </div>
				  </div>
			  </div>
		  </div>
		  <?php endif; ?>
		  
		  <?php if(get_option('slider_4_checkbox')): ?>
		  <div class="banner-carousel-item" style="background-image:url(<?= get_option('slider_4_image'); ?>)">
			  <div class="slider-content">
				  <div class="container h-100">
					  <div class="row align-items-center h-100">
						  <div class="col-md-12 text-center">
							  <h2 class="slide-title" style="text-shadow: 2px 2px 4px #595959;"><?= get_option('slider_4_subtext'); ?></h2>
							  <h3 class="slide-sub-title" style="text-shadow: 2px 2px 4px #595959;"><?= get_option('slider_4_maintext'); ?></h3>
							  <p>
								  <?php if(!empty(get_option('slider_4_button_1'))): ?>
								  	<a href="<?= get_option('slider_4_button_1_url'); ?>" class="slider btn btn-primary" style="color: white; background-color: <?= get_option('main_color'); ?>;"><?= get_option('slider_4_button_1'); ?></a>
								  <?php endif; ?>
								  
								  <?php if(!empty(get_option('slider_4_button_2'))): ?>
									  <a href="<?= get_option('slider_4_button_2_url'); ?>" class="slider btn btn-primary" style="color: white; background-color: <?= get_option('secondary_color'); ?>;"><?= get_option('slider_4_button_2'); ?></a>
								  <?php endif; ?>
							  </p>
						  </div>
					  </div>
				  </div>
			  </div>
		  </div>
		  <?php endif; ?>
	  </div>
	  <?php endif; ?>
	  
	  <?php 
	 	if ( have_posts() ) { 
	 		while ( have_posts() ) : the_post();
	  ?>
	 
	 <?php the_content();?>
	 
	  <?php
	 		endwhile;
	 	} 
	  ?>
  </div><!-- Container end -->
</section><!-- Action end -->

<?php get_footer(); ?>