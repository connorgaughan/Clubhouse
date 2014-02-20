<?php
/**
 * The template for displaying Category Archive pages
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<section class="page">
	<div class="container">
		<?php if ( have_posts() ): ?>
		<ul class="project-list">
		<?php while ( have_posts() ) : the_post(); ?>
			<li class="post">
				<?php if ( has_post_thumbnail() ) {
					echo '<a href="'; the_permalink(); echo '" title="Permalink to'; the_title(); echo '" rel="bookmark">';
					the_post_thumbnail('small');
					echo '</a>';
				} ?>
				<span class="project-category"><?php the_category(' / '); ?></span>
				<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<?php
					$content = get_the_excerpt();
					$trimmed_content = wp_trim_words( $content, 20, '...' );
					echo '<p>&mdash;</p><p>' . $trimmed_content . '</p>';
				?>
			</li>
		<?php endwhile; ?>
		</ul>
<?php else: ?>
		<h2>No posts to display</h2>
<?php endif; ?>
	</div>
</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>