<header>
	<?php wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'main-menu', 'theme_location' => 'primary' ) ); ?>
	<div class="fixed">
		<div class="container">
			<a class="icon-logo" href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
			<i class='icon-menu'></i>		
		</div>
	</div>
</header>
<?php if ( is_page( 'our-work' ) ) : ?>

	<div class="featured-hero">
		<?php 
			if ( get_query_var('paged') ) $paged = get_query_var('paged');  
	 
			$query = new WP_Query( array( 'posts_per_page' => 1, 'post_type' => 'portfolio', 'featured' => 'main', 'paged' => $paged ) );
	 
			if ( $query->have_posts() ) : ?>
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>	
				<h1>Our Work</h1>
				<p class="title">Featured Work: <?php the_title(); ?></p>
				<a class="view" href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark">View Project</a>
			<?php endwhile; wp_reset_postdata(); ?>
		<?php endif; ?>
	</div>
	
<?php elseif ( is_front_page() ) : ?>
	<div class="home hero">
		<h1><?php the_title(); ?></h1>
		<?php bloginfo( 'description' ); ?>	
	</div>
<?php elseif ( is_author() ) : ?>
<div class="author-hero <?php the_author_meta( 'nicename' ); ?>">
	<h1><?php the_author_meta( 'display_name' ); ?></h1>
	<p><?php the_author_meta( 'title' ); ?></p>
</div>
<?php else : ?>
	<?php if( is_home() || is_category() || is_archive() ) {
		echo '<span class="no-hero"></span>';
	} else {
		if( has_post_thumbnail() && !is_single() ) {
			echo '<div class="hero"><h1>'; the_title(); echo '</h1></div>';
		} elseif( has_post_thumbnail() ) {
			echo '<div class="hero"></div>';
		} else {
			echo '<span class="no-hero"></span>';
		}
	} ?>
<?php endif; ?>
