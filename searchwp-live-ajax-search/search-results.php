<?php
/**
 * Search results are contained within a div.searchwp-live-search-results
 * which you can style accordingly as you would any other element on your site
 *
 * Some base styles are output in wp_footer that do nothing but position the
 * results container and apply a default transition, you can disable that by
 * adding the following to your theme's functions.php:
 *
 * add_filter( 'searchwp_live_search_base_styles', '__return_false' );
 *
 * There is a separate stylesheet that is also enqueued that applies the default
 * results theme (the visual styles) but you can disable that too by adding
 * the following to your theme's functions.php:
 *
 * wp_dequeue_style( 'searchwp-live-search' );
 *
 * You can use ~/searchwp-live-search/assets/styles/style.css as a guide to customize
 */
?>

<style>
	.searchwp-live-search-result:hover {
		margin-left: 20px !important;
		transition: margin-left 0.4s ease-out 100ms;
	}
	
	.searchwp-live-search-results {
		overflow-x: hidden;
	}
	
</style>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php $post_type = get_post_type_object( get_post_type() ); ?>
		<?php 
			$product_id = get_the_ID();
        	$product = wc_get_product( $product_id );
		?>
		<a style="searchwp-live-search-result-hover" href="<?php echo esc_url( get_permalink() ); ?>">		
			<div class="searchwp-live-search-result" style="white-space: nowrap; border-bottom: 1px solid rgba(30,30,30,0.1) !important;">
				<span style="display: inline-block; margin-left: 5px;"><?php echo( get_the_post_thumbnail( $post->ID, array( 75, 75) ) ) ?></span>
				<span style="display: inline-block; margin-left: 10px;">
					<p style="border: none !important; margin-top: 10px !important; font-size: 14px !important; ">
						<strong><?php the_title(); ?></strong><br/><?php echo get_woocommerce_currency_symbol(); ?> <?php echo $product->get_price(); ?> <?php echo $product->get_price_suffix(); ?>
					</p>
				</span>
			</div>
		</a>
	<?php endwhile; ?>
<?php else : ?>
	<p class="searchwp-live-search-no-results" role="option">
		<em><?php esc_html_e( 'No results found', 'peleman-reseller-theme' ); ?></em>
	</p>
<?php endif; ?>
