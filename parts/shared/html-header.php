<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]--> 
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
	<head>
		<title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<script type="text/javascript" src="//use.typekit.net/teh4ghd.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
		<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':1377/livereload.js?snipver=1"></' + 'script>')</script>
		<?php wp_head(); ?>
		<?php
	// Header for Pages
			if (has_post_thumbnail()) {
			
				$imgID = get_post_thumbnail_id($post->ID);
				
				$full = wp_get_attachment_image_src($imgID, 'full' );
				$fullURL = $full['0'];
				
				$large = wp_get_attachment_image_src($imgID, 'large' );
				$largeURL = $large['0'];
				
				$medium = wp_get_attachment_image_src($imgID, 'medium' );
				$mediumURL = $medium['0'];
				
				$small = wp_get_attachment_image_src($imgID, 'small' );
				$smallURL = $small['0'];
				
				$thumbnail = wp_get_attachment_image_src($imgID, 'thumb' );
				$thumbnailURL = $thumbnail[0];
				
				$full2 = wp_get_attachment_image_src($imgID, 'full2' );
				$full2URL = $full2['0'];
				
				$large2 = wp_get_attachment_image_src($imgID, 'large2' );
				$large2URL = $large2['0'];
				
				$medium2 = wp_get_attachment_image_src($imgID, 'medium2' );
				$medium2URL = $medium2['0'];
				
				$small2 = wp_get_attachment_image_src($imgID, 'small2' );
				$small2URL = $small2['0'];
				
				$thumbnail2 = wp_get_attachment_image_src($imgID, 'thumb2' );
				$thumbnail2URL = $thumbnail2[0];
			
				?>
				<style type="text/css">
			    	.hero { background-image: url(<?php echo $thumbnailURL ?>); padding-top:3em; padding-bottom:2em; background-size:cover; background-repeat:none; background-position:top center; }
					@media screen and (min-width: 36em){ .hero{ background-image: url(<?php echo $smallURL ?>); padding-top:6em; padding-bottom:6em; } }
					@media screen and (min-width: 48em){ .hero{ background-image: url(<?php echo $mediumURL ?>); padding-top:9em; padding-bottom:9em; } }
					@media screen and (min-width: 50em){ .hero{ background-image: url(<?php echo $largeURL ?>); padding-top:12em; padding-bottom:12em; } }
					@media screen and (min-width: 60em){ .hero{ background-image: url(<?php echo $large2URL ?>); padding-top:12em; padding-bottom:12em; } }
					@media screen and (min-width: 70em){ .hero{ background-image: url(<?php echo $fullURL ?>); padding-top:15em; padding-bottom:15em; } }
					@media screen and (min-width: 80em){ .hero{ background-image: url(<?php echo $full2URL ?>); padding-top:15em; padding-bottom:15em; } }
				</style>
			
			<?php }//end if
		?>
		<?php 
	// Header for Front Page
			if(is_front_page()){

			$thumb = array("_assets_production/images/hero/JL_cover-450x286.jpg","_assets_production/images/hero/SS_cover-450x286.jpg");
			$it = rand(0, count($thumb)-1);
  			$thumbBG = "$thumb[$it]";

  			$small = array("_assets_production/images/hero/JL_cover-600x381.jpg","_assets_production/images/hero/SS_cover-600x381.jpg");
			$is = rand(0, count($small)-1);
  			$smallBG = "$small[$is]";

  			$medium = array("_assets_production/images/hero/JL_cover-800x509.jpg","_assets_production/images/hero/SS_cover-800x509.jpg");
			$im = rand(0, count($medium)-1);
  			$mediumBG = "$medium[$im]";

  			$large = array("_assets_production/images/hero/JL_cover-1000x636.jpg","_assets_production/images/hero/SS_cover-1000x636.jpg");
			$il = rand(0, count($large)-1);
  			$largeBG = "$large[$il]";

  			$largetwo = array("_assets_production/images/hero/JL_cover-1000x636.jpg","_assets_production/images/hero/SS_cover-1200x763.jpg");
			$iltwo = rand(0, count($largetwo)-1);
  			$largetwoBG = "$largetwo[$iltwo]";

			$full = array("_assets_production/images/hero/JL_cover-1400x890.jpg","_assets_production/images/hero/SS_cover-1400x890.jpg");
			$if = rand(0, count($full)-1);
  			$fullBG = "$full[$if]";
			
			?>
			<style type="text/css">
				.home.hero{ background-image: url(<?php echo get_stylesheet_directory_uri() . '/' . $thumbBG; ?>); background-size:cover; background-repeat:none; background-position:top center;}
				@media screen and (min-width: 36em){ .home.hero{ background-image: url(<?php echo get_stylesheet_directory_uri() . '/' . $smallBG; ?>); padding-top:6em; padding-bottom:6em; } }
				@media screen and (min-width: 48em){ .home.hero{ background-image: url(<?php echo get_stylesheet_directory_uri() . '/' . $mediumBG; ?>); padding-top:9em; padding-bottom:9em; } }
				@media screen and (min-width: 60em){ .home.hero{ background-image: url(<?php echo get_stylesheet_directory_uri() . '/' . $largeBG; ?>); padding-top:12em; padding-bottom:12em; } }
				@media screen and (min-width: 70em){ .home.hero{ background-image: url(<?php echo get_stylesheet_directory_uri() . '/' . $largetwoBG; ?>); padding-top:12em; padding-bottom:12em; } }
				@media screen and (min-width: 80em){ .home.hero{ background-image: url(<?php echo get_stylesheet_directory_uri() . '/' . $fullBG; ?>); padding-top:15em; padding-bottom:15em; } }
			</style>
			<?php }//endif
		?>
		<?php 
	// Header For Posts and Portfolio
			if(! is_front_page()){
			if ( get_query_var('paged') ) $paged = get_query_var('paged');  
			$query = new WP_Query( array( 'post_type' => 'portfolio', 'featured' => 'main', 'paged' => $paged ) );
			if ( $query->have_posts() ) : ?>
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>	
			<?php if (has_post_thumbnail()) {
				$imgID = get_post_thumbnail_id($post->ID);
				
				$full = wp_get_attachment_image_src($imgID, 'full' );
				$fullURL = $full['0'];
				
				$large = wp_get_attachment_image_src($imgID, 'large' );
				$largeURL = $large['0'];
				
				$medium = wp_get_attachment_image_src($imgID, 'medium' );
				$mediumURL = $medium['0'];
				
				$small = wp_get_attachment_image_src($imgID, 'small' );
				$smallURL = $small['0'];
				
				$thumbnail = wp_get_attachment_image_src($imgID, 'thumb' );
				$thumbnailURL = $thumbnail[0];
				
				$full2 = wp_get_attachment_image_src($imgID, 'full2' );
				$full2URL = $full2['0'];
				
				$large2 = wp_get_attachment_image_src($imgID, 'large2' );
				$large2URL = $large2['0'];
				
				$medium2 = wp_get_attachment_image_src($imgID, 'medium2' );
				$medium2URL = $medium2['0'];
				
				$small2 = wp_get_attachment_image_src($imgID, 'small2' );
				$small2URL = $small2['0'];
				
				$thumbnail2 = wp_get_attachment_image_src($imgID, 'thumb2' );
				$thumbnail2URL = $thumbnail2[0];

			?>
			<style type="text/css">
				.featured-hero { background-image: url(<?php echo $thumbnailURL ?>); padding-top:3em; padding-bottom:2em; background-size:cover; background-repeat:none; background-position:top center; }
				@media screen and (min-width: 36em){ .featured-hero{ background-image: url(<?php echo $smallURL ?>); padding-top:6em; padding-bottom:6em; } }
				@media screen and (min-width: 48em){ .featured-hero{ background-image: url(<?php echo $mediumURL ?>); padding-top:9em; padding-bottom:9em; } }
				@media screen and (min-width: 50em){ .featured-hero{ background-image: url(<?php echo $largeURL ?>); padding-top:12em; padding-bottom:12em; } }
				@media screen and (min-width: 60em){ .featured-hero{ background-image: url(<?php echo $large2URL ?>); padding-top:12em; padding-bottom:12em; } }
				@media screen and (min-width: 70em){ .featured-hero{ background-image: url(<?php echo $fullURL ?>); padding-top:15em; padding-bottom:15em; } }
				@media screen and (min-width: 80em){ .featured-hero{ background-image: url(<?php echo $full2URL ?>); padding-top:15em; padding-bottom:15em; } }
			</style>
			<?php } ?>
			<?php endwhile; wp_reset_postdata(); ?>

		<?php endif; ?>
		<?php }//end if
		?>
	</head>
	<body <?php body_class(); ?>>