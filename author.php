<?php
/**
 * The template for displaying Author Archive pages
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ): the_post(); ?>
<section class="padded">
	<div class="container">
		<div class="lead large">
			<p><?php the_author_meta( 'description' ); ?></p>
		</div>
	</div>
</section>
<section class="page">
	<div class="container">
		<ul class="list">
		<?php rewind_posts(); while ( have_posts() ) : the_post(); ?>
			<li class="post">
				<?php if ( has_post_thumbnail() ) {
					echo '<a href="'; the_permalink(); echo '" title="Permalink to'; the_title(); echo '" rel="bookmark">';
					the_post_thumbnail('small');
					echo '</a>';
				} ?>
				<?php if ( 'portfolio' == get_post_type() ) { ?>
					<span class="project-category">Project</span>
				<?php } else { ?>
					<span class="project-category">Post</span>
				<?php } ?>

				<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<?php
					$content = get_the_excerpt();
					$trimmed_content = wp_trim_words( $content, 20, '...' );
					echo '<p>&mdash;</p><p>' . $trimmed_content . '</p>';
				?>
			</li>
		<?php endwhile; ?>
		</ul>
	</div>
</section>

<?php else: ?>
<h2>No posts to display for <?php echo get_the_author() ; ?></h2>	
<?php endif; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>