<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<section class="padded">
	<div class="container">
		<div class="lead large">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
		</div>
	</div>
</section>
<?php if(is_page(7)) :?>
	<section class="padded">
		<div class="container">
			<ul class="team-members">
			<?php
			    $blogusers = get_users('orderby=nicename&role=editor');
			    foreach ($blogusers as $user) {
			    	$url = get_the_author_meta( 'image', $user->ID );
			    	$title = get_the_author_meta( 'title', $user->ID );
			    	$location = get_the_author_meta( 'location', $user->ID );
			    	$twitter = get_the_author_meta( 'twitter', $user->ID );
			    	$linkedin = get_the_author_meta( 'linkedin', $user->ID );
			    	$instagram = get_the_author_meta( 'instagram', $user->ID );
			    	$dribbble = get_the_author_meta( 'dribbble', $user->ID );
			    	$link = get_author_posts_url( $user->ID, $user->user_nicename );
			    	$projects = count_user_posts_by_type( $user->ID );
			    	$posts = count_user_posts( $user->ID );

			    	echo '<li class="team-member"><div class="top"><img src="' . $url . '" alt="' . $user->display_name . '" title="' . $user->display_name . '"></div>';
			    	echo '<div class="bottom"><h3>' . $user->display_name . '</h3>';
			    	echo '<p class="team-title">' . $title . '</p><p class="team-location">' . $location . '</p>';
			    	echo '<ul class="icons">';
			    	if ($twitter){
			    		echo '<li><a href="' . $twitter . '" title="Twitter"><i class="icon-twitter"></i></a></li>';
			    	}
			    	if($linkedin){
			    		echo '<li><a href="' . $linkedin . '" title="Linkedin"><i class="icon-linkedin"></i></a></li>';
			    	}
			    	if($instagram){
			    		echo '<li><a href="' . $instagram . '" title="Instagram"><i class="icon-instagram"></i></a></li>';
			    	}
			    	if($dribbble){
			    		echo '<li><a href="' . $dribbble . '" title="Dribbble"><i class="icon-dribbble"></i></a></li>';
			    	}
			    	echo '<li><a href="mailto:' . $user->user_email . '" title="Email ' . $user->display_name . '"><i class="icon-mail"></i></a></li>';
			    	echo '</ul>';
			    	echo '<div class="container snippets"><div class="snippet"><p class="number">' . $posts . '</p><p>posts</p></div><div class="snippet"><p class="number">' . $projects . '</p><p>projects</p></div></div>';
			    	echo '<a class="view small"href="' . $link . '" title="View' . $user->disaply_name . '&rsquo;s Profile">View Profile</a>';
			    	echo '</div>';
			        echo '</li>';
			    }
			?>
			</ul>
		</div>
		<div class="container">
			<div class="lead">
				<h2>Our Team</h2>
				<?php the_excerpt(); ?> 
			</div>
		</div>
	</section>
<?php endif; ?>

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>