<?php get_header();
	$theme_options = nycns_get_theme_options();
?>

	<div id="content">
		
		<div class="intro">
			
			<?php if ( $theme_options['housing2011_lead_story'] ): ?>
			
			<div class="lead-story">
				
				<?php $lead_story = get_post( $theme_options['housing2011_lead_story'] );  ?>
				
				<h3><?php echo $lead_story->post_title; ?></h3>
				
				<?php if ( !empty( $theme_options['housing2011_lead_story_description'] ) ) {
					echo wpautop( $theme_options['housing2011_lead_story_description'] );
				} else {
					echo wpautop( $lead_story->post_excerpt );
				} ?>
				
				<p class="read-more"><a href="<?php the_permalink( $theme_options['housing2011_lead_story'] ); ?>">Read the whole story</a></p>
				
			</div>
			
			<?php endif; // END if ( $theme_options['housing2011_lead_story'] ) ?>
			
			<?php if ( $theme_options['housing2011_soundslides_url'] ): ?>
				
			<div class="featured-soundslides">
				<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="500" height="400" id="soundslider"><param name="movie" value="<?php echo rtrim( $theme_options['housing2011_soundslides_url'], '/' ); ?>/soundslider.swf?size=1&format=xml&embed_width=500&embed_height=400&autoload=false" /><param name="allowScriptAccess" value="always" /><param name="quality" value="high" /><param name="allowFullScreen" value="true" /><param name="menu" value="false" /><param name="bgcolor" value="#000000" /><embed src="<?php echo rtrim( $theme_options['housing2011_soundslides_url'], '/' ); ?>/soundslider.swf?size=1&format=xml&embed_width=500&embed_height=400&autoload=false" quality="high" bgcolor="#000000" width="500" height="400" menu="false" allowScriptAccess="sameDomain" allowFullScreen="true" type="application/x-shockwave-flash"></embed></object>
			</div>
				
			<?php endif; ?>
			
			<div class="clear-both"></div>
			
		</div>
		
		<div class="interior-stories">
			
		<?php
			$args = array(		
				'tax_query' => array(
					array(
						'taxonomy' => 'nycns_projects',
						'field' => 'slug',
						'terms' => '2011-housing-project',
					)
				),
				'showposts' => 6,
				'post__not_in' => array(
					$theme_options['housing2011_lead_story'],
				),
			);
			$project_posts = new WP_Query( $args );
		?>

			<?php if ( $project_posts->have_posts() ) : ?>

			<ul class="posts">	

			<?php while ( $project_posts->have_posts()) : $project_posts->the_post(); ?>

				<li class="post float-left">

				<?php if ( has_post_thumbnail() ) : ?>
					<div class="featured-image">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail' ); ?></a>
					</div>
				<?php endif; ?>						

				<h4><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h4>
				
				<div class="entry">
					<?php the_excerpt(); ?>
				</div>

				</li><!-- END .post -->

			<?php endwhile; ?>

			</ul>
			
			<?php else: ?>
				
				<div class="message info">No stories have been published yet.</div>
				
			<?php endif; ?>
			
			<div class="clear-both"></div>
			
		</div>
		
	</div>

<?php get_footer(); ?>