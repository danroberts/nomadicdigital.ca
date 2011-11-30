<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	<div id='content-test'>
			<?php the_content(); ?>	
	</div> <!-- .post -->

<?php endwhile; endif; ?>
