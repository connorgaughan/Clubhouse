<?php
/*
Template Name: Our Work
*/
?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<section class="page">
	<div class="container">
		<?php 
			if ( get_query_var('paged') ) $paged = get_query_var('paged');  
			 
			$query = new WP_Query( array( 'post_type' => 'portfolio', 'paged' => $paged ) );
			 
			if ( $query->have_posts() ) : ?>
			<ul class="project-list">
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>	
				
					<li><a class="cover" href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark">
						<div class="top">
						<?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'thumbnail-image'); endif; ?>
					</div>
					<div class="bottom">
						<h3><?php the_title(); ?></h3>
					</div>
					</a></li>
				
				<?php endwhile; wp_reset_postdata(); ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>