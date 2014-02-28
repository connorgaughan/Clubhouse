<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<article class="container intro-wrap">
		<div class="single-article">
			<header>
				<h2><?php the_title(); ?></h2>
				<p class="post-description">
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_meta( 'display_name' ); ?></a> wrote this on <time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_date('M, d'); ?> </time> | posted in <?php the_category(' / '); ?>
				</p>
			</header>
			<?php the_content(); ?>			
			<?php comments_template( '', true ); ?>
		</div>
	</article>
	<section class="project-footer">
		<div class="container">
			<div class="prev">
				<?php previous_post('%', '<i class="icon-prev"></i>', 'false'); ?>
			</div>
			<div class="all-work">
				<a href="<?php print bloginfo('url'); ?>/news"><i class="icon-view-all-work"></i></a>
			</div>	
			<div class="next">
				<?php next_post('%', '<i class="icon-next"></i>', 'false'); ?>
			</div>
		</div>
	</section>
<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>