<?php
/**
 * @package Brawny
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php brawny_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">      
		<?php if( get_theme_mod( 'single-featured-image' ) ) : ?>
		<?php if( has_post_thumbnail() && ! post_password_required() ) : ?>
			<div class="post-thumb">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php endif; ?>
	<?php endif; ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'brawny' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php brawny_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
