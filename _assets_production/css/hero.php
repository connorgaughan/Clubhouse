<?php
 	$absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
 	$wp_load = $absolute_path[0] . 'wp-load.php';
 	require_once($wp_load);

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
	

	header('Content-type: text/css');
	header('Cache-control: must-revalidate');
?>


.hero { background-image: url(<?php echo $thumbnailURL ?>); padding-top:3em; padding-bottom:2em; background-size:cover; background-repeat:none; background-position:top center; }	
@media screen and (min-width: 36em){ .hero{ background-image: url(<?php echo $smallURL ?>); padding-top:6em; padding-bottom:6em; } }	
@media screen and (min-width: 48em){ .hero{ background-image: url(<?php echo $mediumURL ?>); padding-top:9em; padding-bottom:9em; } }	
@media screen and (min-width: 60em){ .hero{ background-image: url(<?php echo $largeURL ?>); padding-top:12em; padding-bottom:12em; } }
@media screen and (min-width: 80em){ .hero{ background-image: url(<?php echo $fullURL ?>); padding-top:15em; padding-bottom:15em; } }