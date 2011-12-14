<?php
/**
 * The loop that displays a page.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-page.php.
 *
 */
?>

	<?php if(is_home()):?>
		<div id="filterNav"><h5>Filter by: <?php wp_get_all_tags(); ?></h5></div>
	<?php endif; ?>

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		
			<?php if ( is_front_page() || is_page(167) ): ?>
	
				<?php the_content(); ?>
	
			<?php endif; ?>
			
			<?php if ( in_category('Portfolio') ): ?>		
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<a href='<?php the_permalink() ?>'>
						<div class="thumb_holder">
							<?php if (has_post_thumbnail( $post->ID ) ): ?>
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
								<img width ='250' height='140' src="<?php echo $image[0]; ?>">
					
							<?php else: ?>
								<img width ='250' height='140' src="no_image.jpg">
							<?php endif; ?>
							<h4><?php the_title() ?></h4>
						</div>
					</a>
					<h5><?php the_tags('', ', ', '')?>
				</div><!-- #post-## -->
			
				
			<?php endif; ?>
				
		<?php endwhile; // end of the loop. ?>
		
		<?php pagination() ?>
