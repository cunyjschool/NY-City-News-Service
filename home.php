<?php get_header(); ?>

<?php /* This is a test change */ ?>

<div id="content" class="clearfix">
  <div id="homeleft">
    <div id="topstories" class="clearfix">

      <div id="top-digest">

		<h3>Top Stories</h3>

		<ul>
		<?php query_posts('cat=1&showposts=8'); ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<li><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php if(get_post_meta($post->ID, 'video_file', true) != "") { ?><span class="top-video"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/icons/color_bars.png"></span><?php } ?>
			<?php if(get_post_meta($post->ID, 'multimedia_url', true) != "") { ?><span class="top-multi"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/icons/photos.png"></span><?php } ?>
			<?php if(get_post_meta($post->ID, 'audio_url', true) != "") { ?><span class="top-audio"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/icons/sound.png"></span><?php } ?>
			</li>
			<?php endwhile; else: ?><p>There are currently no stories.</p>
			<?php endif; ?>
		</ul>

      </div>
      <div id="networked">
<h3>Networked</h3>
<ul>
  <li id="blip"><a href="http://nycitynewsservice.blip.tv/">Blip.tv</a></li>
  <li id="facebook"><a href="http://www.facebook.com/cunyjschool">Facebook</a></li>
  <li id="flickr"><a href="http://www.flickr.com/groups/nycitysnapshot/">Flickr</a></li>
  <li id="twitter"><a href="http://twitter.com/nycitynews/">Twitter</a></li>
  <li id="youtube"><a href="http://www.youtube.com/user/nycitynewsservice">YouTube</a></li>
  <li id="vimeo"><a href="http://vimeo.com/album/3753">Vimeo</a></li>
</ul>
      </div>
    </div>

<ul class="more clearfix">
  <li class="gomore"><a href="/category/top-stories/">More Top Stories</a></li>
  <li class="feed"><a href="/category/top-stories/feed/">Top Stories Feed</a></li>
</ul>


	<div id="featured" class="clearfix">
		<h3>Featured</h3>
		<?php query_posts('cat=17&showposts=3'); ?>
  		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="featured-tease clearfix">
<?php
	// Only show the thumbnail image if it the functionality exists
	if (function_exists('yapb_is_photoblog_post')) {
 		if (yapb_is_photoblog_post()) {
			echo '<a href="';
			the_permalink();
			echo '">';
    		echo yapb_get_thumbnail(
      			'', // HTML before image tag
      		array(
        		'alt' => '', // image tag alt attribute
        		'rel' => 'lightbox' // image tag rel attribute
      			),
      '', // HTML after image tag
      array('w=150', 'h=100', 'q=100', 'zc=1'), // phpThumb configuration parameters
      'thumbnail' // image tag custom css class
		
    );
	echo '</a>';
	}
	}
 	?>

  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <?php the_excerpt(); ?>  
      </div>
  <?php endwhile; else: ?><p>There are currently no stories.</p>
<?php endif; ?>
    </div>

<ul class="more clearfix">
  <li class="gomore"><a href="<?php bloginfo('url'); ?>/category/featured/">More Featured Stories</a></li>
  <li class="feed"><a href="<?php bloginfo('url'); ?>/category/featured/feed/">Featured Stories Feed</a></li>
</ul>  


<?php
if (function_exists('SimplePieWP')) {
echo SimplePieWP('http://isnapny.com/feed/', array(
	'template' => 'isnapny',
	'items' => 4,
	'processing' => 'images_only',
	'cache_duration' => 1800
	));
}
?>


    <div id="multimedia">
			<h3>Multimedia</h3>
		
			<?php query_posts('cat=28&showposts=2'); ?>
  		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <div class="featured-tease clearfix">
	<?php
	if (function_exists('yapb_is_photoblog_post')) {
		if (yapb_is_photoblog_post()) {
			echo '<a href="';
			the_permalink();
			echo '">';
			echo yapb_get_thumbnail(
      '', // HTML before image tag
      array(
        'alt' => '', // image tag alt attribute
        'rel' => 'lightbox'                      // image tag rel attribute
      ),
      '',               // HTML after image tag
      array('w=100', 'h=75', 'q=100', 'zc=1'), // phpThumb configuration parameters
      'thumbnail'             // image tag custom css class
    );
		echo '</a>';
   }
	} ?>


  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <?php the_excerpt(); ?>  
      </div>
  <?php endwhile; else: ?><p>There are currently no stories.</p>
<?php endif; ?>

<ul class="more clearfix">
  <li class="gomore"><a href="<?php bloginfo('url'); ?>/category/multimedia/">More Multimedia</a></li>
  <li class="feed"><a href="<?php bloginfo('url'); ?>/category/multimedia/feed/">Multimedia Feed</a></li>
</ul> 
    </div>


		<div id="featured" class="clearfix">
			
			<h3>Special Projects</h3>

      <div id="promos">
<a href="/projects/industrynyc/" target="_blank"><img src="<?php bloginfo('url'); ?>/wp-content/uploads/2010/06/industry-thumb.gif" alt="Industry NYC" class="thumbnail" /></a>
<a href="http://2010stimulus.org/" target="_blank"><img src="<?php bloginfo('url'); ?>/wp-content/uploads/2010/06/stimulus-thumb.gif" alt="State of the Stimulus: NYC" class="thumbnail" /></a>

<a href="http://nycitynewsservice.com/projects/homelesswithhomework/" target="_blank"><img src="<?php bloginfo('url'); ?>/wp-content/uploads/2010/07/homeless-with-homework.png" alt="Homeless with Homework" class="thumbnail" /></a>
<a href="<?php bloginfo('url'); ?>/projects/talkingnewyork/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/projects/talking-new-york_h200.png" alt="Talking New York" height="150px" width="200px" class="thumbnail" /></a>

<a href="<?php bloginfo('url'); ?>/special-projects/nycity-snapshot-2009-economic-pulse/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/projects/nycity-snapshot_h200.png" alt="NYCity Snapshot" class="thumbnail" /></a>
<a href="<?php bloginfo('url'); ?>/category/election2008/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/promo-election.jpg" alt="Election 2008" class="thumbnail" /></a>

<a href="<?php bloginfo('url'); ?>/category/queens-immigration-2008/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/promo-queens.jpg" alt="2008 Queens Immigration Project" class="thumbnail" /></a>
<a href="<?php bloginfo('url'); ?>/category/brooklyn-immigration-2009" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/promo-brooklyn.jpg" alt="2009 Brooklyn Immigration Project" class="thumbnail" /></a>
      </div>
		
		</div>

<ul class="more clearfix">
  <li class="gomore"><a href="/special-projects/">More Special Projects</a></li>
</ul>  

    <div class="clearfix" id="featured">
      <div id="about">
<h3>About</h3>
The NYCity News Service is a new multi-media, Web-based wire service that feeds New York neighborhood stories to news organizations - including newspapers, broadcast stations, wire services and Internet service providers throughout the world. The student-powered News Service is based at the <a href="http://www.journalism.cuny.edu/">City University of New York Graduate School of Journalism</a>.
      </div>
    </div>
  </div>



  <div id="homeright">
  
<object width="480" height="320"><param name="movie" value="/mediaplayer.swf"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="/mediaplayer.swf" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="480" height="320"></embed></object>
      



    <div id="video">

  
  
<h3>Video</h3>


<?php query_posts('cat=16&showposts=1'); ?>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

     
       <?php if(get_post_meta($post->ID, 'video_file', true) != "") { ?>
    <div id="video-player"> 
      <div id="container"><a href="http://www.macromedia.com/go/getflashplayer">Get the Flash Player</a> to see this player.</div>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/swfobject.js"></script>

	<script type="text/javascript">
		var s1 = new SWFObject("<?php bloginfo('stylesheet_directory'); ?>/player.swf","ply","440","340","9","#FFFFFF");
		s1.addParam("allowfullscreen","true");
		s1.addParam("allowscriptaccess","always");
		s1.addParam("flashvars","controlbar=over&stretching=fill&file=<?php echo get_post_meta( $post->ID, 'video_file', $single=true ) ; ?>&image=<?php echo get_post_meta( $post->ID,'video_screenshot', $single=true ) ; ?>");
		s1.write("container");
	</script>
    
      <div id="video-caption">
  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<?php if(get_post_meta($post->ID, 'video_headline', true) != "") { ?><h2>Video: <?php echo get_post_meta( $post->ID,"video_headline", $single=true ) ; ?></h2><?php } ?>
<?php echo get_post_meta( $post->ID,"video_caption", $single=true ) ; ?>
<span class="side-credit">Reported by <?php echo get_post_meta( $post->ID,"video_credit", $single=true ) ; ?></span>
      </div>
    </div>
  <?php } ?>

  <?php endwhile; else: ?><p>There are currently no stories.</p>
<?php endif; ?>






<?php query_posts('cat=16&showposts=2&offset=1'); ?>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <div class="featured-tease clearfix">
<?php if (function_exists('yapb_is_photoblog_post')) {
	 if (yapb_is_photoblog_post()) {
		echo '<a href="';
		the_permalink();
		echo '">';
    echo yapb_get_thumbnail(
      '', // HTML before image tag
      array(
        'alt' => '', // image tag alt attribute
        'rel' => 'lightbox'                      // image tag rel attribute
      ),
      '',               // HTML after image tag
      array('w=100', 'h=75', 'q=100', 'zc=1'), // phpThumb configuration parameters
      'thumbnail'             // image tag custom css class
    );
		echo '</a>';
  }
} ?>

  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <?php the_excerpt(); ?>  
      </div>
  <?php endwhile; else: ?><p>There are currently no stories.</p>
<?php endif; ?>

<ul class="more clearfix">
  <li class="gomore"><a href="/category/video/">More Videos</a></li>
  <li class="feed"><a href="/category/video/feed/">Videos Feed</a></li>
</ul> 
    </div>


    <div id="audio">
<h3>Audio</h3>
<?php query_posts('cat=18&showposts=2'); ?>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <div class="featured-tease clearfix">
<a href="<?php the_permalink(); ?>">
<?php if (function_exists('yapb_is_photoblog_post')) {
	if (yapb_is_photoblog_post()) {
		echo '<a href="';
		the_permalink();
		echo '">';
    echo yapb_get_thumbnail(
      '', // HTML before image tag
      array(
        'alt' => '', // image tag alt attribute
        'rel' => 'lightbox'                      // image tag rel attribute
      ),
      '',               // HTML after image tag
      array('w=100', 'h=75', 'q=100', 'zc=1'), // phpThumb configuration parameters
      'thumbnail'             // image tag custom css class
    );
		echo '</a>';
  	}
}?>


  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <?php the_excerpt(); ?>  
      </div>
  <?php endwhile; else: ?><p>There are currently no stories.</p>
<?php endif; ?>

<ul class="more clearfix">
  <li class="gomore"><a href="/category/audio/">More Audio</a></li>
  <li class="feed"><a href="/category/audio/feed/">Audio Feed</a></li>
</ul> 
    </div>
    
    <div id="audio">
<h3>Related Sites</h3>
<ul>
<li><a href="http://www.motthavenherald.com/" target="_blank">Mott Haven Herald</a></li>
<li><a href="http://fort-greene.blogs.nytimes.com/" target="_blank">NYTimes - The Local: Fort Greene</a></li>
<li><a href="http://www.theluvbiz.com/" target="_blank">The Luv Biz</a></li>
<li><a href="http://www.quirkynyc.com/" target="_blank">Quirky NYC</a></li>
<li><a href="http://www.nyctracks.com/" target="_blank">NYC Tracks</a></li>
<li><a href="http://www.explaintheplan.com/" target="_blank">Explain the Plan</a></li>
<li><a href="http://www.dirtyhandsny.com/" target="_blank">Dirty Hands NY</a></li>
<li><a href="http://www.deportationdialogue.com/" target="_blank">Deportation Dialogue</a></li>
<li><a href="http://www.graveyardshiftnyc.com/" target="_blank">Graveyard Shift</a></li>
<li><a href="http://www.thecitygreens.com/" target="_blank">The City Greens</a></li>
</ul>
    </div>
  </div>
</div>

<?php get_footer(); ?>
