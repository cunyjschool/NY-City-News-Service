<?php /*
List template
This template returns the related posts as a comma-separated list.
Author: mitcho (Michael Yoshitaka Erlewine)
*/
?>

<div class="related-posts">
<h4>Related Posts</h4>

<?php
if ( $related_query->have_posts() ):
	echo '<ul>';
	while ( $related_query->have_posts()) : $related_query->the_post();
		echo '<li><a href="'.get_permalink().'" rel="bookmark">'.get_the_title().'</a> <span class="post-author">By ';
		if ( function_exists( 'coauthors' ) ) {
			coauthors();
		} else {
			the_author();
		}
		echo '</span></li>';
	endwhile;
	echo '</ul>';
else:?>
<p>No related posts.</p>
<?php endif; ?>

</div>