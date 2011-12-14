<?php get_header(); ?>

		<?php if(have_posts()) : ?>
	
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php /* If this is a category archive */ if (is_category()) { ?>
		<h4 class="pagetitle">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h4>
		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<div id="filterNav"><h5>Projects tagged with: <?php single_tag_title(); ?> | <a href="?page_id=5">remove filter</a></h5></div>
		
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h4 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h4>
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h4 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h4>
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h4 class="pagetitle">Archive for <?php the_time('Y'); ?></h4>
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h4 class="pagetitle">Author Archive</h4>
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h4 class="pagetitle">Blog Archives</h4>
		<?php } ?>
		
		<?php while(have_posts()) : the_post(); ?>
		
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
	
		<?php endwhile; else : ?>

		<div class="post">
		
			<h2>Page Not Found</h2>
			
			<p>Looks like the page you're looking for isn't here anymore. Try browsing the <a href="">categories</a>, <a href="">archives</a>, or using the search box below.</p>
			
			<?php include(TEMPLATEPATH.'/searhform.php'); ?>
		
		</div> <!-- .post -->

		<?php endif; ?>
	
		<div class="navigation clear">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>