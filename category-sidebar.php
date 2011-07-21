<div id="sidebar" class="float-right">
	<div id="sidebar1">
		<h3>Archives</h3>
		<ul id="archives">
			<?php wp_get_archives('type=monthly'); ?>
		</ul>
	</div>
	
	<div id="sidebar2">
		<h3>Latest News</h3>
		<ul>
			<?php $latest_args = array(
				'category_name' => 'top-stories',
				'showposts' => 8
			);
				$latest_posts = new WP_Query( $latest_args ); ?>	
			<?php if ( $latest_posts->have_posts() ) : while ( $latest_posts->have_posts() ) : $latest_posts->the_post(); ?>
			<li><a href="<?php the_permalink(); ?>"
title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></li>
			<?php endwhile; else: ?> <?php endif; ?>
		</ul>
		<div id="cats">		
		<h3>Topics</h3>
		<?php $args = array( 'theme_location' => 'primary_topics', 'fallback_cb' => false, 'container' => false, ); wp_nav_menu( $args ); ?>
		<h4>Places</h4>
		<?php $args = array( 'theme_location' => 'primary_places', 'fallback_cb' => false, 'container' => false, ); wp_nav_menu( $args ); ?>
		<h4>Media</h4>
		<?php $args = array( 'orderby' => 'name', ); $media_terms = get_terms( 'nycns_media', $args );?>
		<ul class="sub-navigation">
			<?php foreach ( $media_terms as $media_term ): ?>
			<li><a href="<?php bloginfo( 'url' ); ?>/media/<?php echo $media_term->slug; ?>/"><?php echo $media_term->name;
?></a></li> 
			<?php endforeach; ?>
		</ul>
	</div>
	</div>
</div>