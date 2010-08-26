  <div id="sidebar">
   
  
  <?php if(get_post_meta($post->ID, 'video_file', true) != "") { ?>
    <div id="video-player"> 
      <div id="container"><a href="http://www.macromedia.com/go/getflashplayer">Get the Flash Player</a> to see this player.</div>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/swfobject.js"></script>

	<script type="text/javascript">
		var s1 = new SWFObject("<?php bloginfo('template_directory'); ?>/player.swf","ply","450","340","9","#FFFFFF");
		s1.addParam("allowfullscreen","true");
		s1.addParam("allowscriptaccess","always");
		s1.addParam("flashvars","controlbar=over&stretching=fill&file=<?php echo get_post_meta( $post->ID,"video_file", $single=true ) ; ?>&image=<?php echo get_post_meta( $post->ID,"video_screenshot", $single=true ) ; ?>");
		s1.write("container");
	</script>
    
      <div id="video-caption">
<?php if(get_post_meta($post->ID, 'video_headline', true)) { ?><h2>Video: <?php echo get_post_meta( $post->ID,"video_headline", $single=true ) ; ?></h2><?php } ?>
<?php echo get_post_meta( $post->ID,"video_caption", $single=true ) ; ?>
<span class="side-credit">Reported by <?php echo get_post_meta( $post->ID,"video_credit", $single=true ) ; ?></span>
      </div>
    </div>
  <?php } ?>
  
  
  
  
    <?php if(get_post_meta($post->ID, 'video2_file', true) != "") { ?>
    <div id="video-player"> 
      <div id="container2"><a href="http://www.macromedia.com/go/getflashplayer">Get the Flash Player</a> to see this player.</div>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/swfobject.js"></script>

	<script type="text/javascript">
		var s1 = new SWFObject("<?php bloginfo('template_directory'); ?>/player.swf","ply","450","340","9","#FFFFFF");
		s1.addParam("allowfullscreen","true");
		s1.addParam("allowscriptaccess","always");
		s1.addParam("flashvars","controlbar=over&stretching=fill&file=<?php echo get_post_meta( $post->ID,"video2_file", $single=true ) ; ?>&image=<?php echo get_post_meta( $post->ID,"video2_screenshot", $single=true ) ; ?>");
		s1.write("container2");
	</script>
    
      <div id="video-caption">
<?php if(get_post_meta($post->ID, video2_headline, true) != "") { ?><h2>Video: <?php echo get_post_meta( $post->ID,"video2_headline", $single=true ) ; ?></h2><?php } ?>
<?php echo get_post_meta( $post->ID,"video2_caption", $single=true ) ; ?>
<span class="side-credit">Reported by <?php echo get_post_meta( $post->ID,"video2_credit", $single=true ) ; ?></span>
      </div>
    </div>
  <?php } ?>
  
  

  <?php if(get_post_meta($post->ID, multimedia_url, true) != "") { ?>
<a href="<?php echo get_post_meta( $post->ID,"multimedia_url", $single=true ) ; ?>"><img src="<?php echo get_post_meta( $post->ID,"multimedia_screenshot", $single=true ) ; ?>" class="multimedia-screenshot"></a>

    <div id="multimedia-caption">
<h2><a href="<?php echo get_post_meta( $post->ID,"multimedia_url", $single=true ) ; ?>"><?php echo get_post_meta( $post->ID,"multimedia_headline", $single=true ) ; ?></a></h2>

    <?php if(get_post_meta($post->ID, multimedia_caption, true) != "") { ?><?php echo get_post_meta( $post->ID,"multimedia_caption", $single=true ) ; ?><?php } ?>
<span class="side-credit"><?php if(get_post_meta($post->ID, multimedia_credit, true) != "") { ?>By <?php echo get_post_meta( $post->ID,"multimedia_credit", $single=true ) ; ?><?php } ?></span>
    </div>	
  <?php } ?>
  
  
  
  <?php if(get_post_meta($post->ID, multimedia2_url, true) != "") { ?>
<a href="<?php echo get_post_meta( $post->ID,"multimedia2_url", $single=true ) ; ?>"><img src="<?php echo get_post_meta( $post->ID,"multimedia2_screenshot", $single=true ) ; ?>"></a>

    <div id="multimedia-caption">
<h2><a href="<?php echo get_post_meta( $post->ID,"multimedia2_url", $single=true ) ; ?>"><?php echo get_post_meta( $post->ID,"multimedia2_headline", $single=true ) ; ?></a></h2>

    <?php if(get_post_meta($post->ID, multimedia2_caption, true) != "") { ?><?php echo get_post_meta( $post->ID,"multimedia2_caption", $single=true ) ; ?><?php } ?>
<span class="side-credit"><?php if(get_post_meta($post->ID, multimedia2_credit, true) != "") { ?>By <?php echo get_post_meta( $post->ID,"multimedia2_credit", $single=true ) ; ?><?php } ?></span>

    </div>	
  <?php } ?>
  
  
    <?php if(get_post_meta($post->ID, multimedia3_url, true) != "") { ?>
<a href="<?php echo get_post_meta( $post->ID,"multimedia3_url", $single=true ) ; ?>"><img src="<?php echo get_post_meta( $post->ID,"multimedia3_screenshot", $single=true ) ; ?>"></a>

    <div id="multimedia-caption">
<h2><a href="<?php echo get_post_meta( $post->ID,"multimedia3_url", $single=true ) ; ?>"><?php echo get_post_meta( $post->ID,"multimedia3_headline", $single=true ) ; ?></a></h2>

    <?php if(get_post_meta($post->ID, multimedia3_caption, true) != "") { ?><?php echo get_post_meta( $post->ID,"multimedia3_caption", $single=true ) ; ?><?php } ?>
<span class="side-credit"><?php if(get_post_meta($post->ID, multimedia3_credit, true) != "") { ?>By <?php echo get_post_meta( $post->ID,"multimedia3_credit", $single=true ) ; ?><?php } ?></span>

    </div>	
  <?php } ?>
  
  
  
  
<?php if(get_post_meta($post->ID, audio_url, true) != "") { ?><div id="audio-col1"><?php } ?>


  <?php if(get_post_meta($post->ID, audio_url, true) != "") { ?>
    <div id="audio-caption">
	<?php if(get_post_meta($post->ID, audio_screenshot, true) != "") { ?><img src="<?php echo get_post_meta( $post->ID,"audio_screenshot", $single=true ) ; ?>" /><?php } ?>

	  <div id="audioplayer_side_1">Alternative content</div>  
<script type="text/javascript">  
AudioPlayer.embed("audioplayer_side_1", {
	soundFile: "<?php echo get_post_meta( $post->ID,"audio_url", $single=true ) ; ?>",
    titles: "<?php echo get_post_meta( $post->ID,"audio_headline", $single=true ) ; ?>", 
	transparentpagebg: "yes",
	bg: "f9f9f9",
	width: "175",
	}); 
</script>  

<h2><?php echo get_post_meta( $post->ID,"audio_headline", $single=true ) ; ?></h2>
(<a href="<?php echo get_post_meta( $post->ID,"audio_url", $single=true ) ; ?>">Download MP3</a>)
<span class="side-credit"><?php if(get_post_meta($post->ID, audio_credit, true) != "") { ?>By <?php echo get_post_meta( $post->ID,"audio_credit", $single=true ) ; ?><?php } ?></span>
    </div> 
  <?php } ?>
  
  
  
    <?php if(get_post_meta($post->ID, audiob_url, true) != "") { ?>
    <div id="audio-caption">
	<?php if(get_post_meta($post->ID, audiob_screenshot, true) != "") { ?><img src="<?php echo get_post_meta( $post->ID,"audiob_screenshot", $single=true ) ; ?>" /><?php } ?>

	  <div id="audioplayer_side_1b">Alternative content</div>  
<script type="text/javascript">  
AudioPlayer.embed("audioplayer_side_1b", {
	soundFile: "<?php echo get_post_meta( $post->ID,"audiob_url", $single=true ) ; ?>",
    titles: "<?php echo get_post_meta( $post->ID,"audiob_headline", $single=true ) ; ?>", 
	transparentpagebg: "yes",
	bg: "f9f9f9",
	width: "175",
	}); 
</script>  

<h2><?php echo get_post_meta( $post->ID,"audiob_headline", $single=true ) ; ?></h2>
(<a href="<?php echo get_post_meta( $post->ID,"audiob_url", $single=true ) ; ?>">Download MP3</a>)
<span class="side-credit"><?php if(get_post_meta($post->ID, audiob_credit, true) != "") { ?>By <?php echo get_post_meta( $post->ID,"audiob_credit", $single=true ) ; ?><?php } ?></span>
    </div> 
  <?php } ?>
  
  
  
  
      <?php if(get_post_meta($post->ID, audioc_url, true) != "") { ?>
    <div id="audio-caption">
	<?php if(get_post_meta($post->ID, audioc_screenshot, true) != "") { ?><img src="<?php echo get_post_meta( $post->ID,"audioc_screenshot", $single=true ) ; ?>" /><?php } ?>

	  <div id="audioplayer_side_1c">Alternative content</div>  
<script type="text/javascript">  
AudioPlayer.embed("audioplayer_side_1c", {
	soundFile: "<?php echo get_post_meta( $post->ID,"audioc_url", $single=true ) ; ?>",
    titles: "<?php echo get_post_meta( $post->ID,"audioc_headline", $single=true ) ; ?>", 
	transparentpagebg: "yes",
	bg: "f9f9f9",
	width: "175",
	}); 
</script>  

<h2><?php echo get_post_meta( $post->ID,"audioc_headline", $single=true ) ; ?></h2>
(<a href="<?php echo get_post_meta( $post->ID,"audioc_url", $single=true ) ; ?>">Download MP3</a>)
<span class="side-credit"><?php if(get_post_meta($post->ID, audioc_credit, true) != "") { ?>By <?php echo get_post_meta( $post->ID,"audioc_credit", $single=true ) ; ?><?php } ?></span>
    </div> 
  <?php } ?>
  
  
  
  <?php if(get_post_meta($post->ID, audio3_url, true) != "") { ?>
    <div id="audio-caption">
	<?php if(get_post_meta($post->ID, audio3_screenshot, true) != "") { ?><img src="<?php echo get_post_meta( $post->ID,"audio3_screenshot", $single=true ) ; ?>" /><?php } ?>

	  <div id="audioplayer_side_3">Alternative content</div>  
<script type="text/javascript">  
AudioPlayer.embed("audioplayer_side_3", {
	soundFile: "<?php echo get_post_meta( $post->ID,"audio3_url", $single=true ) ; ?>",
    titles: "<?php echo get_post_meta( $post->ID,"audio3_headline", $single=true ) ; ?>", 
	transparentpagebg: "yes",
	bg: "f9f9f9",
	width: "175",
	}); 
</script>  

<h2><?php echo get_post_meta( $post->ID,"audio3_headline", $single=true ) ; ?></h2>
(<a href="<?php echo get_post_meta( $post->ID,"audio3_url", $single=true ) ; ?>">Download MP3</a>)
<span class="side-credit"><?php if(get_post_meta($post->ID, audio3_credit, true) != "") { ?>By <?php echo get_post_meta( $post->ID,"audio3_credit", $single=true ) ; ?><?php } ?></span>
    </div> 
  <?php } ?>
  

  
  <?php if(get_post_meta($post->ID, audio5_url, true) != "") { ?>
    <div id="audio-caption">
	<?php if(get_post_meta($post->ID, audio5_screenshot, true) != "") { ?><img src="<?php echo get_post_meta( $post->ID,"audio5_screenshot", $single=true ) ; ?>" /><?php } ?>

	  <div id="audioplayer_side_5">Alternative content</div>  
<script type="text/javascript">  
AudioPlayer.embed("audioplayer_side_5", {
	soundFile: "<?php echo get_post_meta( $post->ID,"audio5_url", $single=true ) ; ?>",
    titles: "<?php echo get_post_meta( $post->ID,"audio5_headline", $single=true ) ; ?>", 
	transparentpagebg: "yes",
	bg: "f9f9f9",
	width: "175",
	}); 
</script>  

<h2><?php echo get_post_meta( $post->ID,"audio5_headline", $single=true ) ; ?></h2>
(<a href="<?php echo get_post_meta( $post->ID,"audio5_url", $single=true ) ; ?>">Download MP3</a>)
<span class="side-credit"><?php if(get_post_meta($post->ID, audio5_credit, true) != "") { ?>By <?php echo get_post_meta( $post->ID,"audio5_credit", $single=true ) ; ?><?php } ?></span>
    </div> 
  <?php } ?>
  
  

<?php if(get_post_meta($post->ID, audio_url, true) != "") { ?></div><?php } ?>

  
  
  
<?php if(get_post_meta($post->ID, audio2_url, true) != "") { ?><div id="audio-col2"><?php } ?>

   <?php if(get_post_meta($post->ID, audio2_url, true) != "") { ?>
    <div id="audio-caption">
	<?php if(get_post_meta($post->ID, audio2_screenshot, true) != "") { ?><img src="<?php echo get_post_meta( $post->ID,"audio2_screenshot", $single=true ) ; ?>" /><?php } ?>
	  <div id="audioplayer_side_2">Alternative content</div>  
<script type="text/javascript">  
AudioPlayer.embed("audioplayer_side_2", {
	soundFile: "<?php echo get_post_meta( $post->ID,"audio2_url", $single=true ) ; ?>",
    titles: "<?php echo get_post_meta( $post->ID,"audio2_headline", $single=true ) ; ?>", 
	transparentpagebg: "yes",
	bg: "f9f9f9",
	width: "175",
	}); 
</script>  

<h2><?php echo get_post_meta( $post->ID,"audio2_headline", $single=true ) ; ?></h2>
(<a href="<?php echo get_post_meta( $post->ID,"audio2_url", $single=true ) ; ?>">Download MP3</a>)
<span class="side-credit"><?php if(get_post_meta($post->ID, audio2_credit, true) != "") { ?>By <?php echo get_post_meta( $post->ID,"audio2_credit", $single=true ) ; ?><?php } ?></span>
    </div> 
  <?php } ?>
  
  
  
   <?php if(get_post_meta($post->ID, audio2b_url, true) != "") { ?>
    <div id="audio-caption">
	<?php if(get_post_meta($post->ID, audio2b_screenshot, true) != "") { ?><img src="<?php echo get_post_meta( $post->ID,"audio2_screenshot", $single=true ) ; ?>" /><?php } ?>
	  <div id="audioplayer_side_2b">Alternative content</div>  
<script type="text/javascript">  
AudioPlayer.embed("audioplayer_side_2b", {
	soundFile: "<?php echo get_post_meta( $post->ID,"audio2b_url", $single=true ) ; ?>",
    titles: "<?php echo get_post_meta( $post->ID,"audio2b_headline", $single=true ) ; ?>", 
	transparentpagebg: "yes",
	bg: "f9f9f9",
	width: "175",
	}); 
</script>  

<h2><?php echo get_post_meta( $post->ID,"audio2b_headline", $single=true ) ; ?></h2>
(<a href="<?php echo get_post_meta( $post->ID,"audio2b_url", $single=true ) ; ?>">Download MP3</a>)
<span class="side-credit"><?php if(get_post_meta($post->ID, audio2b_credit, true) != "") { ?>By <?php echo get_post_meta( $post->ID,"audio2b_credit", $single=true ) ; ?><?php } ?></span>
    </div> 
  <?php } ?>
  
  
  <?php if(get_post_meta($post->ID, audio2c_url, true) != "") { ?>
    <div id="audio-caption">
	<?php if(get_post_meta($post->ID, audio2c_screenshot, true) != "") { ?><img src="<?php echo get_post_meta( $post->ID,"audio2c_screenshot", $single=true ) ; ?>" /><?php } ?>
	  <div id="audioplayer_side_2c">Alternative content</div>  
<script type="text/javascript">  
AudioPlayer.embed("audioplayer_side_2c", {
	soundFile: "<?php echo get_post_meta( $post->ID,"audio2c_url", $single=true ) ; ?>",
    titles: "<?php echo get_post_meta( $post->ID,"audio2c_headline", $single=true ) ; ?>", 
	transparentpagebg: "yes",
	bg: "f9f9f9",
	width: "175",
	}); 
</script>  

<h2><?php echo get_post_meta( $post->ID,"audio2c_headline", $single=true ) ; ?></h2>
(<a href="<?php echo get_post_meta( $post->ID,"audio2c_url", $single=true ) ; ?>">Download MP3</a>)
<span class="side-credit"><?php if(get_post_meta($post->ID, audio2c_credit, true) != "") { ?>By <?php echo get_post_meta( $post->ID,"audio2c_credit", $single=true ) ; ?><?php } ?></span>
    </div> 
  <?php } ?>
  
  
  <?php if(get_post_meta($post->ID, audio4_url, true) != "") { ?>
    <div id="audio-caption">
	<?php if(get_post_meta($post->ID, audio4_screenshot, true) != "") { ?><img src="<?php echo get_post_meta( $post->ID,"audio4_screenshot", $single=true ) ; ?>" /><?php } ?>
	  <div id="audioplayer_side_4">Alternative content</div>  
<script type="text/javascript">  
AudioPlayer.embed("audioplayer_side_4", {
	soundFile: "<?php echo get_post_meta( $post->ID,"audio4_url", $single=true ) ; ?>",
    titles: "<?php echo get_post_meta( $post->ID,"audio4_headline", $single=true ) ; ?>", 
	transparentpagebg: "yes",
	bg: "f9f9f9",
	width: "175",
	}); 
</script>  

<h2><?php echo get_post_meta( $post->ID,"audio4_headline", $single=true ) ; ?></h2>
(<a href="<?php echo get_post_meta( $post->ID,"audio4_url", $single=true ) ; ?>">Download MP3</a>)
<span class="side-credit"><?php if(get_post_meta($post->ID, audio4_credit, true) != "") { ?>By <?php echo get_post_meta( $post->ID,"audio4_credit", $single=true ) ; ?><?php } ?></span>
    </div> 
  <?php } ?>
  
  
  
<?php if(get_post_meta($post->ID, audio2_url, true) != "") { ?></div><?php } ?>

  
  
  <?php if(get_post_meta($post->ID, street_address, true) != "") { ?>

<div id="map" style="width: 450px; height: 250px; margin-bottom: 20px;"></div>

<script type="text/javascript">
    //<![CDATA[
    
    if (GBrowserIsCompatible()) { 
      function createMarker(point) {
        var marker = new GMarker(point);
        return marker;
     }

     // Display the map, with some controls and set the initial location 
      var map = new GMap2(document.getElementById("map"));
      map.addControl(new GSmallMapControl());
     map.setCenter(new GLatLng(<?php echo get_post_meta( $post->ID,"street_address", $single=true ) ; ?>),13); 
     var point = new GLatLng(<?php echo get_post_meta( $post->ID,"street_address", $single=true ) ; ?>);
     var marker = createMarker(point)
      map.addOverlay(marker);

    }
    
    // display a warning if the browser was not compatible
    else {
      alert("Sorry, the Google Maps API is not compatible with this browser");
   }

   //]]>
    </script>
   <?php } ?>
   
   
	<div id="global-side">
		<div id="latest-news">
			<h2>Latest News</h2>

			<ul id="latest-images" style="margin-bottom: 10px;">
				<?php
					$latest_args = array(	'category_name' => 'top-stories',
											'showposts' => 2
										);
	
					$latest_posts = new WP_Query( $latest_args );
				?>
    		<?php if ( $latest_posts->have_posts() ) : while ( $latest_posts->have_posts() ) : $latest_posts->the_post(); ?>
  			<li><a href="<?php the_permalink(); ?>"> 
<?php if (yapb_is_photoblog_post()): ?>
  <?php
    echo yapb_get_thumbnail(
      '', // HTML before image tag
      array(
        'alt' => '', // image tag alt attribute
        'rel' => 'lightbox' // image tag rel attribute
      ),
      '', // HTML after image tag
      array('w=225', 'h=100', 'q=100', 'zc=1'), // phpThumb configuration parameters
      '' // image tag custom css class
    );
  ?>
</a>
  <?php else: ?>
<?php endif ?>

<a href="<?php the_permalink(); ?>" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></li>
    <?php endwhile; else: ?>
  <?php endif; ?>
</ul>

<ul id="latest">
	<?php
		$latest_args = array(	'category_name' => 'top-stories',
								'showposts' => 6,
								'offset' => 2
							);

		$latest_posts = new WP_Query( $latest_args );
	?>
    <?php if ( $latest_posts->have_posts() ) : while ( $latest_posts->have_posts() ) : $latest_posts->the_post(); ?>
  <li><a href="<?php the_permalink(); ?>" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></li>
    <?php endwhile; else: ?>
  <?php endif; ?>
</ul>


      </div>
      
      <div id="side-sections">
<h2>Sections</h2>
<ul>
  <li><a href="/category/arts-culture/">Arts &amp; Culture</a></li>
  <li><a href="/category/audio/">Audio</a></li>
  <li><a href="/category/business/">Business</a></li>
  <li><a href="/category/education/">Education</a></li>
  <li><a href="/category/election2008/">Election 2008</a></li>
  <li><a href="/category/environment/">Environment</a></li>
  <li><a href="/category/health/" title="View all posts filed under Health">Health</a></li>
  <li><a href="/category/housing/" title="View all posts filed under Housing">Housing</a></li>
  <li><a href="/category/multimedia/" title="View all posts filed under Multimedia">Multimedia</a></li>
  <li><a href="/category/politics/" title="View all posts filed under Politics">Politics</a></li>
  <li><a href="/category/public-safety/" title="View all posts filed under Public Safety">Public Safety</a></li>
  <li><a href="/category/special-projects/" title="View all posts filed under Special Projects">Special Projects</a></li>
  <li><a href="/category/super-tuesday-2008/" title="View all posts filed under Super Tuesday 2008">Super Tuesday 2008</a></li>
  <li><a href="/category/top-stories/">Top Stories</a></li>
  <li><a href="/category/transportation/">Transportation</a></li>
  <li><a href="/category/video/">Video</a></li>
</ul>
      </div>
    </div>


  </div>

