<?php
/*
Template Name: Special Project - Election 2010
*/
?>

<?php get_header(); ?>

<div id="content" class="clearfix">
	
    <div id="election2010" class="page">
	
		<h1><?php the_title(); ?></h1>
		
		<div id="mosaic">
			<?php
				$args = array(	'category_name' => 'election-2010',
							);
			
				$election_mosaic = new WP_Query( $args );
				$all_metadata = array();
			
			?>
				<?php if ( $election_mosaic->have_posts() ) : ?>
				<ul class="mug-shot-list clearfix">					
				<?php while ( $election_mosaic->have_posts() ) : $election_mosaic->the_post(); ?>
					<?php
						$meta = array();
						// Get all of the data from the post meta fields
						$meta['first_time_voter'] = get_post_meta( get_the_id(), 'first_time_voter', true );
						$meta['the_age'] = get_post_meta( get_the_id(), 'the_age', true );
						$meta['gender'] = get_post_meta( get_the_id(), 'gender', true );			
						$meta['the_nabe'] = get_post_meta( get_the_id(), 'the_nabe', true );
						$meta['the_occupation'] = get_post_meta( get_the_id(), 'the_occupation', true );
						$meta['the_party'] = get_post_meta( get_the_id(), 'the_party', true );
						
						// Add metadata to our counts of posts
						$all_filters['first_time_voter'][$meta['first_time_voter']][] = get_the_id();
						$all_filters['the_age'][$meta['the_age']][] = get_the_id();
						$all_filters['gender'][$meta['gender']][] = get_the_id();
						$all_filters['the_nabe'][$meta['the_nabe']][] = get_the_id();
						$all_filters['the_party'][$meta['the_party']][] = get_the_id();
						
						// Adding the meta fields is what drives our filtering										
					?>
					<li class="mug-shot-link<?php echo ' ' . implode( ' ', $meta ); ?>">
					<?php the_post_thumbnail( 'election-2010-thumb' ); ?>
					<div class="content-single">
						<h3><?php the_title(); ?></h3>
						<p class="byline-pubdate"><?php the_author(); ?></p>
							<?php the_content(); ?>
						<p class="meta">
							
						</p>
					</div>
					</li>
				<?php endwhile;?>
				</ul>					
				<?php endif; ?>
		</div><!-- END - #mosaic -->
		<?php if ( class_exists('GeoMashup') ) { echo GeoMashup::map('zoom=11&height=500&width=650&auto_info_open=false&add_overview_control=false&add_map_type_control=false&map_content=global&map_cat=election-2010');	} ?>
	</div>
	<div id="sidebar-election2010" class="sidebar">
		
		<div id="content-single-zone">
			
		</div>
		
		<div class="intro">
			<h3>Intro</h3>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); the_content(); endwhile; endif; ?>
		</div>	
		
		<div class="filters">
		<h3>Filters</h3>
		<dl>
			<?php foreach ( $all_filters as $key => $filters ):
				$filter_type_label = '';
				switch ( $key ):
					case 'first_time_voter':
						$filter_type_label = 'First time voter';
						break;
					case 'the_age':
						$filter_type_label = 'Age';
						break;
					case 'gender':
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
			?>
		</dl>
		</div>
	
		<h3>Featured Posts</h3>
		<?php if ( have_posts() ) : ?>
		<?php $featuredPosts = new WP_Query(); $featuredPosts->query("posts_per_page=15&category_name=election-2010-feature&paged=$paged"); ?>
			<?php while ($featuredPosts->have_posts()) : $featuredPosts->the_post(); ?>
				<ul class="mug-shot-list-feature">
					<li class="mug-shot-link-feature">
						<div>
							<a href="<?php the_permalink(); ?>"><img class="size-medium wp-image-73" title="Antennae" src="http://nycitynewsservice.com/files/2010/10/Saturn-Cassini.jpg" alt="" /></a>
							<h2><?php the_title(); ?></h2>
							<?php the_excerpt(); ?>
						</div>
					</li>
				</ul>
			<?php endwhile; endif; ?>
	</div>
</div>
<?php get_footer(); ?>