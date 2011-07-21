<?php get_header(); 
	$theme_options = nycns_get_theme_options();
?>

	<!-- Pingdom check -->

<div id="content" class="clearfix">
  <div id="homeleft">
    <div id="topstories" class="clearfix">
	
		<?php if ( $theme_options['home_highlighted_text'] && $theme_options['home_highlighted_url'] ): ?>
		<div id="special-recent-project">
		<a href="<?php echo $theme_options['home_highlighted_url']; ?>"><?php echo $theme_options['home_highlighted_text']; ?></a>
		</div>
		<?php endif; // END if ( $theme_options['home_highlighted_text'] ) ?>

      <div id="top-digest">

		<h3>Latest Stories</h3>
		<?php
			$top_args = array( 'category_name' => 'top-stories',
									'showposts' => 8
							);
			$top_posts = new WP_Query( $top_args );
		?>
		<ul>
			<?php if ( $top_posts->have_posts() ) : while ( $top_posts->have_posts() ) : $top_posts->the_post(); ?>
			<li><h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			<?php if ( get_post_meta( $post->ID, 'video_file', true ) ) : ?><span class="top-video"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/icons/color_bars.png"></span><?php endif; ?>
			<?php if ( get_post_meta( $post->ID, 'multimedia_url', true ) ) : ?><span class="top-multi"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/icons/photos.png"></span><?php endif; ?>
			<?php if ( get_post_meta( $post->ID, 'audio_url', true ) ) : ?><span class="top-audio"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/icons/sound.png"></span><?php endif; ?>
			</li>
			<?php endwhile; else: ?><p>There are currently no stories.</p>
			<?php endif; ?>
		</ul>

      </div>
	<div id="networked">
		<h3>Networked</h3>
		<ul>
			<li id="facebook"><a href="http://www.facebook.com/cunyjschool">Facebook</a></li>
			<li id="flickr"><a href="http://www.flickr.com/groups/nycitysnapshot/">Flickr</a></li>
			<li id="twitter"><a href="http://twitter.com/nycitynews">Twitter</a></li>
			<li id="youtube"><a href="http://www.youtube.com/user/nycitynewsservice">YouTube</a></li>
			<li id="vimeo"><a href="http://vimeo.com/album/3753">Vimeo</a></li>
			<li id="blip"><a href="http://nycitynewsservice.blip.tv/">Blip.tv</a></li>
		</ul>
	</div>

</div>

<ul class="more clearfix">
  <li class="gomore"><a href="<?php bloginfo('url'); ?>/category/top-stories/">More Top Stories</a></li>
  <li class="feed"><a href="<?php bloginfo('url'); ?>/category/top-stories/feed/">Top Stories Feed</a></li>
</ul>


	<div id="featured" class="clearfix">
		<h3>Featured</h3>
		<?php
			$featured_args = array( 'category_name' => 'featured',
									'showposts' => 3
							);
			$featured_posts = new WP_Query( $featured_args );
		?>
  		<?php if ( $featured_posts->have_posts() ) : while ( $featured_posts->have_posts() ) : $featured_posts->the_post(); ?>
		<div class="featured-tease clearfix">
			<?php if ( has_post_thumbnail() ) : ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail-primary', array( 'class' => 'thumbnail' ) ); ?></a>
			<?php endif; ?>
			<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			<?php the_excerpt(); ?>  
		</div>
  	<?php endwhile; else: ?>
		<p>There are currently no stories.</p>
	<?php endif; ?>
    </div>

<ul class="more clearfix">
  <li class="gomore"><a href="<?php bloginfo('url'); ?>/category/featured/">More Featured Stories</a></li>
  <li class="feed"><a href="<?php bloginfo('url'); ?>/category/featured/feed/">Featured Stories Feed</a></li>
</ul>

    <div id="multimedia">
		<h3>Multimedia</h3>
	<?php
		$multimedia_args = array(
			'tax_query' => array(
				array(
					'taxonomy' => 'nycns_media',
					'field' => 'slug',
					'terms' => 'multimedia'
				)
			),
			'showposts' => 2,
		);
		$multimedia_posts = new WP_Query( $multimedia_args );
	?>
  	<?php if ( $multimedia_posts->have_posts() ) : while ( $multimedia_posts->have_posts() ) : $multimedia_posts->the_post(); ?>

	<div class="featured-tease clearfix">
		<?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail-secondary', array( 'class' => 'thumbnail' ) ); ?></a>
		<?php endif; ?>


  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
  <?php the_excerpt(); ?>  
      </div>
  <?php endwhile; else: ?><p>There are currently no stories.</p>
<?php endif; ?>

<ul class="more clearfix">
  <li class="gomore"><a href="<?php bloginfo('url'); ?>/media/multimedia/">More Multimedia</a></li>
  <li class="feed"><a href="<?php bloginfo('url'); ?>/media/multimedia/feed/">Multimedia Feed</a></li>
</ul> 
    </div>


		<div id="featured" class="clearfix">
			
			<h3>Special Projects</h3>

      <div id="promos">
<a href="<?php bloginfo('url'); ?>/special-projects/election-2010/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/projects/election2010_h200_v2.jpg" alt="Election 2010" class="thumbnail" height="150px" width="200px" /></a>
<a href="<?php bloginfo('url'); ?>/special-projects/cmj-2010/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/projects/cmj-thumb.gif" alt="CMJ 2010" class="thumbnail" height="150px" width="200px" /></a>
<a href="http://industrynyc.journalism.cuny.edu/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/projects/industry-thumb.gif" alt="Industry NYC" class="thumbnail" height="150px" width="200px" /></a>

<a href="http://2010stimulus.org/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/projects/stimulus-thumb.gif" alt="State of the Stimulus: NYC" class="thumbnail" height="150px" width="200px" /></a>
<a href="http://homelesswithhomework.journalism.cuny.edu/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/projects/homeless-with-homework.png" alt="Homeless with Homework" class="thumbnail" height="150px" width="200px" /></a>

<a href="http://talkingnewyork.journalism.cuny.edu/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/projects/talking-new-york_h200.png" alt="Talking New York" height="150px" width="200px" class="thumbnail" /></a>
<a href="<?php bloginfo('url'); ?>/category/2008-election/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/promo-election.jpg" alt="Election 2008" class="thumbnail" height="150px" width="200px" /></a>

<a href="<?php bloginfo('url'); ?>/category/2008-queens-immigration-project/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/promo-queens.jpg" alt="2008 Queens Immigration Project" class="thumbnail" height="150px" width="200px" /></a>
<a href="<?php bloginfo('url'); ?>/category/brooklyn-immigration-2009" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/promo-brooklyn.jpg" alt="2009 Brooklyn Immigration Project" class="thumbnail" height="150px" width="200px" /></a>
      </div>
		
		</div>

<ul class="more clearfix">
  <li class="gomore"><a href="/special-projects/">More Special Projects</a></li>
</ul>  

	<div class="clearfix" id="featured">
		<div id="about">
			<h3>About</h3>
			<p>The NYCity News Service is a new multi-media, Web-based wire service that feeds New York neighborhood stories to news organizations - including newspapers, broadcast stations, wire services and Internet service providers throughout the world. The student-powered News Service is based at the <a href="http://www.journalism.cuny.edu/">City University of New York Graduate School of Journalism</a>.
		</div>
	</div>
	</div>

  <div id="homeright">
  
	<?php echo do_shortcode('[nggallery id=1 template="newsservice" images=0]'); ?>
      
    <div id="video">

		<h3>Video</h3>
	<?php
		$video_args = array(
			'tax_query' => array(
				array(
					'taxonomy' => 'nycns_media',
					'field' => 'slug',
					'terms' => 'video'
				)
			),
			'showposts' => 1,
		);
		$video_posts = new WP_Query( $video_args );
	?>
	
	
	<?php if ( $video_posts->have_posts() ) : while ( $video_posts->have_posts() ) : $video_posts->the_post(); ?>
 
	<?php if ( $vimeo_url = get_post_meta($post->ID, 'vimeo_url', true) ) { ?>
	<?php
		$args = array(
			'width' => 450,
			'height' => 340,
		);
		$vimeo_data = cunyj_get_vimeo_data( $vimeo_url, $args );
	
	?>	
		
    <div id="video-player">
	
		<?php if ( isset($vimeo_data['html']) ) {
			echo $vimeo_data['html'];
			
		} ?>
    
      <div id="video-caption">
		<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
<?php if ( isset($vimeo_data['description']) ) { echo $vimeo_data['description']; } ?>
<?php if ( $video_credit = get_post_meta( $post->ID,"video_credit", true ) ) { ?><span class="side-credit">Reported by <?php echo $video_credit; ?></span><?php } ?>
      </div>
    </div>
  <?php } ?>

  <?php endwhile; else: ?><p>There are currently no stories.</p>
<?php endif; ?>

<?php
	$video_args = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'nycns_media',
				'field' => 'slug',
				'terms' => 'video'
			)
		),
		'showposts' => 2,
		'offset' => 1,
	);
	$video_posts = new WP_Query( $video_args );
?>

	<?php if ( $video_posts->have_posts() ) : while ( $video_posts->have_posts() ) : $video_posts->the_post(); ?>
		<div class="featured-tease clearfix">
		
			<?php if ( has_post_thumbnail() ) : ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail-secondary', array( 'class' => 'thumbnail' ) ); ?></a>
			<?php endif; ?>

 			<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				<?php the_excerpt(); ?>  
      	</div>
	<?php endwhile; else: ?>
		<p>There are currently no stories.</p>
	<?php endif; ?>

	<ul class="more clearfix">
		<li class="gomore"><a href="<?php bloginfo('url'); ?>/media/video/">More Videos</a></li>
		<li class="feed"><a href="<?php bloginfo('url'); ?>/media/video/feed/">Videos Feed</a></li>
	</ul> 
</div>


    <div id="audio">
<h3>Audio</h3>
<?php
	$audio_args = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'nycns_media',
				'field' => 'slug',
				'terms' => 'audio'
			)
		),
		'showposts' => 2,
	);
	$audio_posts = new WP_Query( $audio_args );
?>
	<?php if ( $audio_posts->have_posts() ) : while ( $audio_posts->have_posts() ) : $audio_posts->the_post(); ?>
	<div class="featured-tease clearfix">

		<?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail-secondary', array( 'class' => 'thumbnail' ) ); ?></a>
		<?php endif; ?>

		<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			<?php the_excerpt(); ?>  
	</div>
	<?php endwhile; else: ?>
		<p>There are currently no stories.</p>
	<?php endif; ?>

		<ul class="more clearfix">
			<li class="gomore"><a href="<?php bloginfo('url'); ?>/media/audio/">More Audio</a></li>
			<li class="feed"><a href="<?php bloginfo('url'); ?>/media/audio/feed/">Audio Feed</a></li>
		</ul> 
    </div>
    
    <div id="audio">
		<h3>Related Sites</h3>
		<ul>
			<li><a href="http://www.motthavenherald.com/">Mott Haven Herald</a></li>
			<li><a href="http://fort-greene.blogs.nytimes.com/" >NYTimes - The Local: Fort Greene</a></li>
			<li><a href="http://www.theluvbiz.com/">The Luv Biz</a></li>
			<li><a href="http://www.quirkynyc.com/">Quirky NYC</a></li>
			<li><a href="http://nyctracks.journalism.cuny.edu/" >NYC Tracks</a></li>
			<li><a href="http://www.explaintheplan.com/">Explain the Plan</a></li>
			<li><a href="http://www.dirtyhandsny.com/">Dirty Hands NY</a></li>
			<li><a href="http://www.deportationdialogue.com/">Deportation Dialogue</a></li>
			<li><a href="http://www.graveyardshiftnyc.com/">Graveyard Shift</a></li>
			<li><a href="http://www.thecitygreens.com/">The City Greens</a></li>
		</ul>
    </div>
  </div>
</div>

<?php get_footer(); ?>
