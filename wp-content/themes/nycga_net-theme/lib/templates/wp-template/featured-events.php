<?php
//**
//Featured Events Template
//**
?>

<div id="feat-content">
	<div class="feat-articles">
		<div class="feat-post">
		
		<?php
		$home_featured_block_style = get_option('tn_buddycorp_home_featured_block_style');
		$home_featured_block_cat = get_option('tn_buddycorp_home_featured_block_cat');
		$home_featured_block_count = get_option('tn_buddycorp_home_featured_block_count');
		$home_featured_block_custom_field = get_option('tn_buddycorp_home_featured_block_custom_field');
		$home_featured_block_attach_type = get_option('tn_buddycorp_home_featured_block_attach_type');
		$get_post_counter = get_the_current_blog_post_count();
		
		if($home_featured_block_cat == 'Choose a category' || $home_featured_block_cat == '') { $home_featured_block_cat = ''; }
		if($home_featured_block_count == 'Select a number' || $home_featured_block_count == '') { $home_featured_block_count = '5'; }
		
		//$featured_count = dev_multi_category_count($catslugs = $home_featured_block_cat);
		
		//$cat_query = new WP_Query('cat='. $home_featured_block_cat . '&' . 'showposts=' . $home_featured_block_count);
		//while ($cat_query->have_posts()) : $cat_query->the_post();
		//$the_post_ids = $post->ID;
		//$do_not_duplicate = $post->ID;
		//$bc == 0;
		
		/* $args = array( 'post_type' => 'incsub_event','cat='. $home_featured_block_cat . '&' . 'showposts=' . $home_featured_block_count ); */
		
		$args = array(
			 	'post_type' => 'incsub_event',
			 	'cat=' => $home_featured_block_cat,
			 	'showposts=' => $home_featured_block_count,
				'suppress_filters' => true, 
				'posts_per_page' => -1,
				'meta_query' => array(
					array(
		    			'key' => 'incsub_event_status',
		    			'value' => Eab_EventModel::STATUS_OPEN,
					),
				)
			);
		
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
		 $the_post_ids = $post->ID;
		 $do_not_duplicate = $post->ID;
		?>
		
		<?php if($bc < 1) { ?>
		
		<h3> Featured <a href="<?php echo site_url() . '/' . get_the_page_template_slug('template-blog.php'); ?>">
		<?php _e('Events', TEMPLATE_DOMAIN); ?></a> <!-- | --> <?php// the_time('l, F jS') ?></h3>
		<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
		<div class="feat-tag"><?php the_tags(__('tagged in&nbsp;', TEMPLATE_DOMAIN), ', ', ''); ?></div>
		<div class="feat-post-content">
		<?php the_post_thumbnail(array(432,999), array('class' => 'feat-post-thumbnail')); ?>
		<?php echo Eab_Template::get_event_dates($post); ?>
		<?php echo the_content(125); ?>
		</div>
		
		<?php if($featured_count != '1' && $get_post_counter > '2') { ?>
		<!-- <h2><?php _e( 'More Events', TEMPLATE_DOMAIN) ?></h2> -->
		<ul class="more-article">
		<?php } ?>
		
		<?php } elseif($bc > 1 || $featured_count != '1') { ?>
		
		<li><div class="alignleft"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
		<div class="alignright"><?php echo Eab_Template::get_event_dates($post); ?><?php //the_time('l, F jS') ?></div></li>
		
		<?php } ?>
		
		<?php $bc++; endwhile; ?>
		
		<?php if($featured_count != '1') { ?></ul><?php } ?>
		
		</div>
	</div>
</div>



<!-- Test -->

