<?php get_header(); ?>

	<div id="content">
		
		<div class="intro">
			
			<div class="lead-story">
				
				<h3>The Lead Story</h3>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus aliquet rhoncus dolor, at suscipit orci porttitor ut. Nunc scelerisque tortor eu ligula condimentum consectetur. Suspendisse semper mi sed magna vehicula sagittis. Vivamus nec orci libero, cursus eleifend ipsum. In mattis euismod consequat.</p>
				<p>Sed lacus erat, luctus at tempus quis, aliquam ac tellus. Donec pretium fringilla diam ut molestie. Morbi lectus elit, ornare vel convallis vitae, imperdiet pulvinar dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sem risus, rhoncus vitae scelerisque vel, pulvinar at tellus. Aliquam erat volutpat. Aliquam et erat at justo ultrices imperdiet. Nulla facilisi.</p>
				
				<p class="read-more"><a href="#">Read the whole story</a></p>
				
			</div>
			
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
				'showposts' => 5,
				'post__not_in' => array(
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
			
			<?php endif; ?>
			
			<div class="clear-both"></div>
			
		</div>
		
		<div class="google-map">
		<iframe width="980" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://www.google.com/maps/ms?ie=UTF8&amp;hl=en&amp;msa=0&amp;msid=206017862824146952348.0004a3813a1f62f330655&amp;ll=40.793698,-73.930436&amp;spn=0.104262,0.120249&amp;output=embed"></iframe>
		</div>
		
	</div>

<?php get_footer(); ?>