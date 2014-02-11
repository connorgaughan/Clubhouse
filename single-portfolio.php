<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<section class="container intro-wrap">
		<aside class="project-details">
			<span class="project-category"><?php $terms = the_terms($post->ID, 'project_type'); echo $term->name; ?></span>
			<h2><?php the_title(); ?></h2>
			<ul>
				<li>&mdash;</li>
				<?php 
					$url = get_post_meta($post->ID, 'dbt_url', true);
					$client_name = get_post_meta($post->ID, 'dbt_client_name', true);
					$designers = get_post_meta($post->ID, 'dbt_designers', true);
					$photographers = get_post_meta($post->ID, 'dbt_photographers', true);
					
					echo "<li><b>Project Lead:</b> ";
					the_author_posts_link();
					echo "</li>";
					
					if ($designers) {
						echo "<li><b>Designers:</b> $designers</li>";
					}
					
					if ($photographers) {
						echo "<li><b>Photographers:</b> $photographers</li>";
					}
	    	
					if ($url) { 
						echo "<li><b>Client:</b> <a href='$url' target='_blank'>$client_name</a></li>"; 
					} else {
						echo "<li><b>Client:</b> $client_name</li>";
					}
				?>
				<li><b>Year:</b> <?php the_date('Y'); ?></li>
			</ul>
		</aside>
		<div class="intro">
			<?php the_excerpt(); ?>
		</div>
	</section>
	<section class="project-images container">
		<?php the_content(); ?>
	</section>
	<footer class="project-footer">
		<div class="container">
			<div class="prev">
				<?php previous_post('%', '<i class="icon-prev"></i>', 'false'); ?>
			</div>
			<div class="all-work">
				<a href="<?php print bloginfo('url'); ?>/our-work"><i class="icon-view-all-work"></i></a>
			</div>	
			<div class="next">
				<?php next_post('%', '<i class="icon-next"></i>', 'false'); ?>
			</div>
		</div>
	</footer>
	
<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>