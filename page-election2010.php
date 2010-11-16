<?php
/*
Template Name: Special Project - Election 2010
@author danielbachhuber
*/
?>

<?php get_header(); ?>

<div id="content" class="clearfix">
	
    <div id="election2010" class="page">

		<h2><?php the_title(); ?></h2>
		
		<div id="mosaic">
			
			<?php
				// We're getting a maximum of 100 posts for this election mosaic
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
						// Used for the content overlay as well as to build filtering
						$meta['first_time_voter'] = get_post_meta( get_the_id(), 'first_time_voter', true );
						$meta['the_age'] = get_post_meta( get_the_id(), 'the_age', true );
						$meta['the_gender'] = get_post_meta( get_the_id(), 'the_gender', true );			
						$meta['the_nabe'] = get_post_meta( get_the_id(), 'the_nabe', true );
						$meta['the_occupation'] = get_post_meta( get_the_id(), 'the_occupation', true );
						$meta['the_party'] = get_post_meta( get_the_id(), 'the_party', true );
						
						// Add metadata to our counts of posts
						if ( $meta['first_time_voter'] ) {
							$all_filters['first_time_voter'][$meta['first_time_voter']][] = get_the_id();
						}
						if ( $meta['the_age'] ) {
							$all_filters['the_age'][$meta['the_age']][] = get_the_id();
						}
						if ( $meta['the_gender'] ) {
							$all_filters['the_gender'][$meta['the_gender']][] = get_the_id();
						}
						if ( $meta['the_party'] ) {
							$all_filters['the_party'][$meta['the_party']][] = get_the_id();
						}
						if ( $meta['the_nabe'] ) {
							$all_filters['the_nabe'][$meta['the_nabe']][] = get_the_id();
						}
						
						// Add a background color to the thumbnail based on it's position
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
					<div class="mug-shot-overlay"><?php the_title(); echo ', <span class="meta-party">' . $meta['the_party'] . '</span>'; ?></div>
					<?php the_post_thumbnail( 'election-2010-thumb', array( 'title' => false, ) ); ?>
					<?php /* Build the presentation of the content to be manipulated by JS */ ?>
					<div class="content-single" id="<?php the_id(); ?>">
						<h3><a href="#" class="back">Close</a><?php the_title(); ?></h3>
						<?php
							// List out all of the labels and values for election metadata
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
						<div class="actions"><a href="#" class="back">&#60; Back</a> | Interview by <?php if ( function_exists( 'coauthors_posts_links' ) ) { coauthors_posts_links(); } else { the_author_posts_link(); } ?> | <a href="<?php the_permalink(); ?>">Permalink</a></div>
					</div>
					</li>
				<?php
					// Our mosaic is 7 columns wide and infinitely long
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
			<?php
				// Introductory text from the page itself
				if ( have_posts() ) : 
				while ( have_posts() ) : the_post();
				the_content();
				endwhile;
				endif; ?>
		</div>
		
		<div id="filters">
		<dl>
			<?php
			/**
			 * Build our filtering functionality. Each filter is an empty link with
			 * the appropriate filter class. Filtering is handled by Javascript
			 */
			if ( isset( $all_filters ) ): 
			foreach ( $all_filters as $key => $filters ):
				$filter_type_label = '';
				ksort( $filters );
				switch ( $key ):
					case 'first_time_voter':
						$filter_type_label = 'First time voter:';
						break;
					case 'the_age':
						$filter_type_label = 'Age:';
						break;
					case 'the_gender':
						$filter_type_label = 'Gender:';
						break;
					case 'the_nabe':
						$filter_type_label = 'Community district:';
						// Link to a help page on community districts
						$filter_type_label .= '<br /><a class="help" href="' . get_bloginfo('url') . '/category/nycsnapshots/election-nycsnapshots/">What are these CDs?</a>';
						break;
					case 'the_party':
						$filter_type_label = 'Political affiliation:';
						break;																				
					default:
						$filter_type_label = 'Fix this field';
						break;
				endswitch;
			
				echo '<dt class="filter-label">' . $filter_type_label . '</dt> <dd class="filters-list">';
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