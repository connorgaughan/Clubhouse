<?php wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'main-menu', 'theme_location' => 'primary' ) ); ?>
<header>
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
	 
			$query = new WP_Query( array( 'post_type' => 'portfolio', 'featured' => 'main', 'paged' => $paged ) );
	 
			if ( $query->have_posts() ) : ?>
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>	
				<h2 class="title"><?php the_title(); ?></h2>
				<a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><button class="view">View Project</button></a>
			<?php endwhile; wp_reset_postdata(); ?>
		<?php endif; ?>
	</div>
	
<?php elseif ( is_front_page() ) : ?>
	<div class="hero">
		<h1><?php the_title(); ?></h1>
		<?php bloginfo( 'description' ); ?>	
	</div>
<?php elseif ( is_author() ) : ?>
<div class="author-hero <?php the_author_meta( 'nicename' ); ?>">

	<div class="author-meta">
		<?php 
			echo '<h1>' . get_the_author_meta('display_name') . '<span class="title">' . get_the_author_meta('title') . '</h1>';
		?>
		<?php echo count_user_posts(); echo count_user_posts_by_type(get_the_author_meta('ID')); ?>
	</div>
</div>
<?php else : ?>
	<div class="hero"></div>
<?php endif; ?>
