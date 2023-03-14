<?php get_header(); ?>

<?php 
	$s=get_search_query();
	$args = array('s' =>$s);
	// The Query
	$the_query = new WP_Query( $args );
?>

<section class="no-padding">
  <div class="container">
	  <div class="row">
		  <div class="col-lg-12 col-md-12">
			  <header class="woocommerce-products-header">
				  <h1 class="woocommerce-products-header__title page-title">Search results for: <?php echo get_query_var('s') ?></h1>
			  </header>
		  </div>
	  </div>
	  
	  	<?php
		
	  	if ($the_query->have_posts()) {

        
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
					?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php
			}
    	} else{
	  ?>	
		  <h2 style='font-weight:bold;color:#000'>Nothing Found</h2>
		  <div class="alert alert-info">
			  <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
		  </div>
	  <?php } ?>
	  
  </div><!-- Container end -->
</section><!-- Action end -->

<?php get_footer(); ?>