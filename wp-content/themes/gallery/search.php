<?php get_header() ?>
	<?php if($bp_existed == 'true') : ?>
		<?php do_action( 'bp_before_blog_search' ) ?>
	<?php endif; ?>
	<script type="text/javascript">
	  jQuery.noConflict();
	 jQuery(document).ready(function() {
	       		jQuery("a[rel=exhibition_gallery]").fancybox({
					'overlayShow'	: true,
					'overlayOpacity' : 0.9,
					'overlayColor' : '#111111',
					'transitionIn'	: 'elastic',
					'transitionOut'	: 'elastic'
				});
	   });
	   </script>
	<div id="site-container">
		<div id="content"><!-- start #content -->
		<div class="padder">
			<div class="page" id="blog-search"><!-- start #blog-search -->
						<?php if (have_posts()) : ?>
								<?php locate_template( array( '/library/components/headers.php' ), true ); ?>
											<?php if( $bp_existed == 'true' ) { ?>
												<?php do_action( 'bp_before_blog_post' ) ?>			
												<?php bp_wpmu_excerptloop(); ?>
														<?php do_action( 'bp_after_blog_post' ) ?>
											<?php } else { ?>
													<?php wpmu_excerptloop(); ?>
											<?php } ?>
								<?php locate_template( array( '/library/components/pagination.php' ), true ); ?>
				<?php else: ?>
						<?php locate_template( array( '/library/components/messages.php' ), true ); ?>
				<?php endif; ?>
			</div><!-- end #blog-search -->
		</div>
	</div><!-- end #content -->
	<?php get_sidebar('blog'); ?>
	<div class="clear"></div>
	</div>
<?php if($bp_existed == 'true') : ?>
	<?php do_action( 'bp_after_blog_search' ) ?>
<?php endif; ?>
<?php get_footer() ?>