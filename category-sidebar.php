    <div id="sidebar">
      <div id="sidebar1">


<?php
if ( is_category(array('bronx','brooklyn','manhattan','queens','staten-island')) ) {
	echo '<ul id="blogroll">';
	echo single_cat_title('<h2>') . " Blogroll</h2>";
} ?>

  <?php 
if ( is_category('bronx') ) { wp_list_bookmarks('title_li=0&categorize=0&category=5&before=<li>&after=</li>&title_li='); }
elseif ( is_category('brooklyn') ) { wp_list_bookmarks('title_li=0&categorize=0&category=6&before=<li>&after=</li>&title_li='); }
elseif ( is_category('manhattan') ) { wp_list_bookmarks('title_li=0&categorize=0&category=20&before=<li>&after=</li>&title_li='); }
elseif ( is_category('queens') ) { wp_list_bookmarks('title_li=0&categorize=0&category=28&before=<li>&after=</li>&title_li='); }
elseif ( is_category('staten-island') ) { wp_list_bookmarks('title_li=0&categorize=0&category=31&before=<li>&after=</li>&title_li='); }
  ?>
  
<?php
if ( is_category(array(2,3,4,5,6)) ) {
	echo "</ul>";
	}
?>
      

<ul id="archives">
  <h2>Archives</h2>
<?php wp_get_archives('type=monthly'); ?>
</ul>
      </div>
      
      
      <div id="sidebar2">
<ul>
  <h2>Latest News</h2>
	<?php
		$latest_args = array(	'category_name' => 'top-stories',
								'showposts' => 8
						);
	
		$latest_posts = new WP_Query( $latest_args );
	?>
      <?php if ( $latest_posts->have_posts() ) : while ( $latest_posts->have_posts() ) : $latest_posts->the_post(); ?>
  <li><a href="<?php the_permalink(); ?>" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></li>
      <?php endwhile; else: ?>
    <?php endif; ?>
</ul>

<ul id="cats">
		<h4>Topics</h4>
		<?php 
		$args = array(
			'theme_location' => 'primary_topics',
			'fallback_cb' => false,
			'container' => false,
		);
		wp_nav_menu( $args );
		?>
		
		<h4>Places</h4>
		<?php 
		$args = array(
			'theme_location' => 'primary_places',
			'fallback_cb' => false,
			'container' => false,
		);
		wp_nav_menu( $args );
		?>
		
		<h4>Media</h4>
		<?php
			$args = array(
				'orderby' => 'name',
			);
			$media_terms = get_terms( 'nycns_media', $args );
		
		?>
		<ul class="sub-navigation">
			<?php foreach ( $media_terms as $media_term ): ?>
				<li><a href="<?php bloginfo( 'url' ); ?>/media/<?php echo $media_term->slug; ?>/"><?php echo $media_term->name; ?></a></li>
			<?php endforeach; ?>
		</ul>
      </div>
    </div>
  </div>