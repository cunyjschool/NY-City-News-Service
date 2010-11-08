<?php
/*
Template Name: Special Project - Election 2010
*/
?>

<?php get_header(); ?>

<div id="content" class="clearfix">
	
    <div id="election2010" class="page">

		<h2><?php the_title(); ?></h2>
		
		<div id="mosaic">
			
			<?php
				$args = array(	'category_name' => 'election-2010',
								'showposts' => 100
							);
			
				$election_mosaic = new WP_Query( $args );
				$all_metadata = array();
				$row_counter = 1;
				$column_counter = 1;
			
			?>
				<?php if ( $election_mosaic->have_posts() ) : ?>
				<ul class="mug-shot-list clearfix">					
				<?php while ( $election_mosaic->have_posts() ) : $election_mosaic->the_post(); ?>
					<?php
						
						$meta = array();
						// Get all of the data from the post meta fields
						$meta['first_time_voter'] = get_post_meta( get_the_id(), 'first_time_voter', true );
						$meta['the_age'] = get_post_meta( get_the_id(), 'the_age', true );
						$meta['the_gender'] = get_post_meta( get_the_id(), 'the_gender', true );			
						$meta['the_nabe'] = get_post_meta( get_the_id(), 'the_nabe', true );
						$meta['the_occupation'] = get_post_meta( get_the_id(), 'the_occupation', true );
						$meta['the_party'] = get_post_meta( get_the_id(), 'the_party', true );
						
						// Add metadata to our counts of posts
						$all_filters['first_time_voter'][$meta['first_time_voter']][] = get_the_id();
						$all_filters['the_age'][$meta['the_age']][] = get_the_id();
						$all_filters['the_gender'][$meta['the_gender']][] = get_the_id();
						$all_filters['the_party'][$meta['the_party']][] = get_the_id();						
						$all_filters['the_nabe'][$meta['the_nabe']][] = get_the_id();
						
						if ( $row_counter <= 3 && $column_counter <= 3 ) {
							$bg_color = 'blue';
						} else if ( $column_counter & 1 ) {
							$bg_color = 'white';
						} else {
							$bg_color = 'red';
						}
						
						// Adding the meta fields is what drives our filtering										
					?>
					<li class="mug-shot-link<?php echo ' ' . implode( ' ', $meta ); echo ' ' . $bg_color; ?>">
					<?php the_post_thumbnail( 'election-2010-thumb' ); ?>
					<div class="content-single">
						<h3><?php the_title(); ?></h3>	
						<?php the_content(); ?>
						<?php
							$meta_html = '<p class="meta">';
							foreach ( $meta as $key => $value ):
								$meta_label = '';
								switch ( $key ):
									case 'first_time_voter':
										$meta_label = 'First time voter';
										break;
									case 'the_age':
										$meta_label = 'Age';
										break;
									case 'the_gender':
										$meta_label = 'Gender';
										break;
									case 'the_nabe':
										$meta_label = 'Community district';
										break;
									case 'the_party':
										$meta_label = 'Political affiliation';
										break;
									case 'the_occupation':
										$meta_label = 'Occupation';
										break;																													
									default:
										$meta_label = 'Fix this field';
										break;
								endswitch;

								$meta_html .= '<label>' . $meta_label . ':</label> ';
								$meta_html .= '<span>' . $value . '</span>, ';

							endforeach;
							$meta_html = rtrim( $meta_html, ', ' );
							$meta_html .= '</p>';
							echo $meta_html;
						
						?>					
						<div class="actions"><a href="#" class="back">&#60; Back</a> | Interview by <?php the_author_posts_link(); ?> | <a href="<?php the_permalink(); ?>">Permalink</a></div>
					</div>
					</li>
				<?php 
					$column_counter++;
					if ( $column_counter == 8 ) {
						$row_counter++;
						$column_counter = 1;
					}
				endwhile;?>
				</ul>					
				<?php endif; ?>
		</div><!-- END - #mosaic -->
		
		<div id="content-single-zone">
			
		</div>		
		
	</div>
	<div id="sidebar-election2010" class="sidebar">
		
		<div id="intro">
			<?php if ( have_posts() ) : 
				while ( have_posts() ) : the_post();
				the_content();
				endwhile;
				endif; ?>
		</div>
		
		<div id="filters">
		<dl>
			<?php
			if ( isset( $all_filters ) ):
			foreach ( $all_filters as $key => $filters ):
				$filter_type_label = '';
				switch ( $key ):
					case 'first_time_voter':
						$filter_type_label = 'First time voter';
						break;
					case 'the_age':
						$filter_type_label = 'Age';
						break;
					case 'the_gender':
						$filter_type_label = 'Gender';
						break;
					case 'the_nabe':
						$filter_type_label = 'Community district';
						break;
					case 'the_party':
						$filter_type_label = 'Political affiliation';
						break;																				
					default:
						$filter_type_label = 'Fix this field';
						break;
				endswitch;
			
				echo '<dt class="filter-label">' . $filter_type_label . ':</dt> <dd class="filters-list">';
				$filters_html = '';
				foreach ( $filters as $filter_label => $filter_posts ):
					$filters_html .= '<a href="#" class="filter" id="' . $filter_label . '">';
					$filters_html .= $filter_label . ' (' . count( $filter_posts ) . ')</a>, ';
				endforeach;
				echo rtrim( $filters_html, ', ' );
				echo '</dd>';
			
				endforeach;
				echo '<dt class="filter-label"></dt><dd class="filters-list"><a href="#" class="reset-filters">See all posts</a></dd>';
				endif;
			?>
		</dl>
		</div>
	
	</div>
</div>
<?php get_footer(); ?>