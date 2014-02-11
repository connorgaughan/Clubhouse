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
			if ( get_query_var('page') ) $paged = get_query_var('page');
			 
			$query = new WP_Query( array( 'post_type' => 'portfolio', 'paged' => $paged ) );
			 
			if ( $query->have_posts() ) : ?>
			<ul class="project-list">
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>	
				
					<li><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark">
						<?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'thumbnail-image'); endif; ?>
					</a></li>
				
				<?php endwhile; wp_reset_postdata(); ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>