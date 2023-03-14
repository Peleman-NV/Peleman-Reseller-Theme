<footer id="footer" class="footer">
	<div class="footer-main">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-6 col-md-6 footer-widget footer-about">
					<?php if ( is_active_sidebar( 'footer-column-1' ) ) { dynamic_sidebar( 'footer-column-1' ); } ?>
				</div>

          		<div class="col-lg-3 col-md-6 footer-widget">
            		<?php if ( is_active_sidebar( 'footer-column-2' ) ) { dynamic_sidebar( 'footer-column-2' ); } ?>
          		</div>

          		<div class="col-lg-3 col-md-6 footer-widget">
           			<?php if ( is_active_sidebar( 'footer-column-3' ) ) { dynamic_sidebar( 'footer-column-3' ); } ?>
          		</div>
        	</div>
			
			<div class="row align-items-center" style="margin-top: 30px;">
				<div class="col-md-8">
					<div class="copyright-info">
						<span><?php echo __('Copyright &copy; <script>document.write(new Date().getFullYear())</script> by','peleman-reseller-theme') ?> <a href="https://peleman.com" target="_blank">Peleman Industries NV</a> | <?php echo __('All rights reserved','peleman-reseller-theme') ?> | <?php echo __('We protect your data according to our Privacy Policy','peleman-reseller-theme') ?></span>
					</div>
				</div>
				
				<div class="col-md-4 top-social text-center text-md-right">
					<ul class="list-unstyled">
						<li>

							<?php if(!empty(get_option('facebook_text'))){ ?>
							<a title="Facebook" href="<?php echo get_option('facebook_text'); ?>" target="_blank" style="color: white !important;">
								<span class="social-icon"><i class="icon-social-facebook"></i></span>
							</a>
							<?php }; ?>

							<?php if(!empty(get_option('twitter_text'))){ ?>
							<a title="Twitter" href="<?php echo get_option('twitter_text'); ?>" target="_blank" style="color: white !important;">
							  <span class="social-icon"><i class="icon-social-twitter"></i></span>
							</a>
							<?php }; ?>

							<?php if(!empty(get_option('instagram_text'))){ ?>
							<a title="Instagram" href="<?php echo get_option('instagram_text'); ?>" target="_blank" style="color: white !important;">
							  <span class="social-icon"><i class="icon-social-instagram"></i></span>
							</a>
							<?php }; ?>

							<?php if(!empty(get_option('linkedin_text'))){ ?>
							<a title="Linkedin" href="<?php echo get_option('linkedin_text'); ?>" target="_blank" style="color: white !important;">
							  <span class="social-icon"><i class="icon-social-linkedin"></i></span>
							</a>
							<?php }; ?>
						</li>
					</ul>
				</div>
		  	</div>
      	</div>
	</div>
	
	<div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
		<button class="btn btn-primary" title="Back to Top">
			<i class="fa fa-angle-double-up"></i>
    	</button>
  	</div>
</footer>

<?php wp_footer(); ?>
</div>
</body>
</html>