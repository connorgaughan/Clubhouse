<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<section class="recent flexslider">
	<div class="container">
		<h2>Recent Work</h2>
		<?php 
			if ( get_query_var('paged') ) $paged = get_query_var('paged');  
			
			if ( get_query_var('page') ) $paged = get_query_var('page');
		 
			$query = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page'=> 5, 'paged' => $paged ) );
		 
			if ( $query->have_posts() ) : ?>
			

			<ul class="slides">
			
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>	
				
				<li class="recent-work">
				
					<div class="left">
						<h3 class="title"><?php the_title(); ?></h3>
						<a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><button class="view small">View Project</button></a>
					</div>
					
					<div class="right">
						<?php 
		
							if (class_exists('MultiPostThumbnails')) : 
							
						    $url = MultiPostThumbnails::get_post_thumbnail_url('portfolio', 'recent-work-image', NULL, 'resp-large');
							
							echo do_shortcode( '[rimg src="' . $url . '"]' );
							
							endif;
							
						?>
						<?php endwhile; wp_reset_postdata(); ?>
					</div>
				</li>
			<?php endif; ?>
		</ul>
	</div>
</section>

<section class="tinted padded">
	<div class="container">
		<div class="lead">
			<h2>Who We Are</h2>
			
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					
				<?php the_content(); ?>
				<a href="<?php print bloginfo('url'); ?>/about" title="Permalink to About Us" rel="bookmark"><button class="view small">About Us</button></a>
	  
			<?php endwhile; ?>
		</div>
	</div>
</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>