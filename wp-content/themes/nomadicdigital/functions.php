<?php
if ( function_exists('register_sidebar') )
register_sidebar(array(
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h4>',
'after_title' => '</h4>',
));
?>
<?php
if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails' ); 
}?>

<?php
function wp_get_all_tags( $args = '' ) {

  $tags = get_terms('post_tag');
  $numItems = count($tags);
  $i = 0;
  foreach ( $tags as $key => $tag ) {
	if($tags [ $key ]->name == "Websites" ||
	$tags [ $key ]->name == "Design"	||
		$tags [ $key ]->name == "Flash"||
		$tags [ $key ]->name == "Identity"||
		$tags [ $key ]->name == "Interactive"||
		$tags [ $key ]->name == "Electronics"
	) {
      if ( 'edit' == 'view' )
          $link = get_edit_tag_link( $tag->term_id, 'post_tag' );
      else
          $link = get_term_link( intval($tag->term_id), 'post_tag' );
      if ( is_wp_error( $link ) )
          return false;

      $tags[ $key ]->link = $link;
      $tags[ $key ]->id = $tag->term_id;
      $tags[ $key ]->name = $tag->name;
      echo ' <a href="'. $link .'">' . $tag->name . '</a>';
	  if ($i+1 != $numItems && $tags [ $key ]->name != "Websites" ) {
		  echo ' | ';
	  }
	  $i++;
	}
  }
  return $tags;
}
?>

<?php
function pagination($pages = '', $range = 2) 
{
	$showitems = ($range * 2) + 1;
	
	global $paged; 
	if(empty($paged)) $paged = 1;
	
	if($pages == '')
	{
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages)
		{
			$pages = 1;
		}
	}
	
	if(1 != $pages) 
	{
		echo "<div class='pagination'>";
		if($paged > 2 && $paged > $range + 1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;<a/>";
		if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged-1)."'>&lsaquo;</a>";
		
		for($i=1; $i <= $pages; $i++) 
		{
			if(1 != $pages &&(!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems))
			{
				echo ($paged == $i) ? "<span class='current'>".$i."</span>" : "<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
			}
		}
		
		if($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>@rsaquo;</a>";
		if($paged < $pages && $paged+$range+1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>@raquo;</a>";
		echo "</div>\n";
		
	}
}


?>

<?php // for sidebar.php if needed (remove the // below the if() statement) ?>
<?php // if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : endif; ?>