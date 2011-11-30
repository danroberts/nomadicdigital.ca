<?php get_header(); ?>



	<?php while(have_posts()) : the_post(); ?>
		<?php if ( in_category('Portfolio') ):?>
			<div id="portfolio" class="portfolio-page">
		<?php else: ?>
			<div class="post" id="<?php the_ID(); ?>">
		<?php endif; ?>
		
			
			<div class="entry">
				<?php the_content(); ?>
			</div>
		
		</div> <!-- .post -->
		
	

	<?php endwhile; ?>
	
	

<?php get_sidebar(); ?>

<?php get_footer(); ?>