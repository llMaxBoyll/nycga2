<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ) ?>; charset=<?php bloginfo( 'charset' ) ?>" />
		<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>
		<meta name="description" content="<?php bloginfo('description'); ?>" />
		<?php do_action( 'bp_head' ) ?>

		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ) ?>" />
		
		<?php
			if ( is_singular() && bp_is_blog_page() && get_option( 'thread_comments' ) )
				wp_enqueue_script( 'comment-reply' );

			wp_head();
		?>
		<?php remove_filter('the_excerpt', 'wpautop'); ?>
	</head>

	<body <?php body_class() ?> id="bp-default">
	

		<div id="header-section">
			<?php do_action( 'bp_before_header' ) ?>
			
			<!--#search-bar-->
			<div id="search-bar">

				<!-- #search-form -->
				<form action="<?php echo bp_search_form_action() ?>" method="post" id="search-form">
					<label for="search-terms" class="accessibly-hidden"><?php _e( 'Search for:', 'buddypress' ); ?></label>
					<input type="search" id="search-terms" name="search-terms" value="<?php echo isset( $_REQUEST['s'] ) ? esc_attr( $_REQUEST['s'] ) : ''; ?>" />
					
					<?php echo bp_search_form_type_select() ?>
					
					<input type="submit" name="search-submit" id="search-submit" value="<?php _e( 'Search', 'buddypress' ) ?>" />
					
					<?php wp_nonce_field( 'bp_search_form' ) ?>
				
				</form><!-- /#search-form -->
				
				<?php do_action( 'bp_search_login_bar' ) ?>


			</div>
			<!-- /#search-bar-->

			
			<div id="header">
			
					<div id="header-link"><a href="<?php echo home_url(); ?>" title="<?php _ex( 'Home', 'Home page banner link title', 'buddypress' ); ?>"></a></div>
					<h2 id="description" role="tagline"><a href="<?php echo home_url(); ?>" title="<?php _ex( 'Home', 'Home page banner link title', 'buddypress' ); ?>">#OccupyWallStreet</a></h2>
					<h1 id="logo" role="banner"><a href="<?php echo home_url(); ?>" title="<?php _ex( 'Home', 'Home page banner link title', 'buddypress' ); ?>"><?php bp_site_name(); ?></a></h1>
					<h3 id="description" role="description"><a href="<?php echo home_url(); ?>" title="<?php _ex( 'Home', 'Home page banner link title', 'buddypress' ); ?>"><?php bloginfo('description'); ?></a></h3>
						
			

			<div id="navigation" role="navigation">
				<?php wp_nav_menu( array( 'container' => false, 'menu_id' => 'nav', 'theme_location' => 'primary', 'fallback_cb' => 'bp_dtheme_main_nav' ) ); ?>
			</div>

			<?php do_action( 'bp_header' ) ?>

		</div><!-- #header -->
		</div> <!-- header-section -->
				
		<!-- BEGIN: announcement bar -->

		<?php locate_template( array( 'announcement.php' ), true ) ?>

		<!-- //END: announcement bar -->

        
		<?php do_action( 'bp_after_header' ) ?>
		<?php do_action( 'bp_before_container' ) ?>
		
		<div id="container">