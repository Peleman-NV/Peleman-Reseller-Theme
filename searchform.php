<div class="search-container">
	<form role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="search-products">
		<input data-swplive="true" class="searchfunction expandright" id="searchright" type="text" name="s" placeholder="<?php echo __( 'Search for ...', 'peleman-reseller-theme' ) ?>" value="<?php echo get_search_query(); ?>">
		<input type="hidden" name="post_type" value="product" />
		
		<label class="button searchbutton" for="searchright" style="padding-top: 14px;">
			<span id="searchfunc" class="header-icon icon-magnifier"></span>
		</label>
	</form>
</div>
<span id="results-loop"></span>