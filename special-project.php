<?php
/*
Template Name: Special Project Template
*/
?>

<style>
#special-event-content{
	float: left;
	width: 670px;
	margin: 0 10px 20px 0;
}
#special-event-content .entry > div{
	display:none;
}
#sidebar-special{
	float: left;
	width: 250px;
	border-left: 1px solid #eee;
	margin-left: 0;
	padding-left: 20px;
}
#special-event-content .post-special-event{
  width:325px;
  float:left;
  padding:20px 0;
  border-top:1px solid #eee;
}
#special-event-content .post-special-event .entry{
  padding:0 10px;
}
.special-project-post-title{
  position:absolute;
  padding:10px;
  margin-top:170px;
  background:#000000;
  z-index:100;
  width:295px;
}

</style>


<?php get_header(); ?>

	<div id="content" class="clearfix">
    <div id="special-event-content">
      <h1><?php the_title(); ?></h1>
      
      <?php query_posts("cat=3"); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      	  <div class="post-special-event" style="width:315px;margin-right:20px;float:left;">
            <div id="band-photo">
              <h2 class="special-project-post-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
              <a href="<?php the_permalink(); ?>">
                <?php
                  echo yapb_get_thumbnail(
                    '', // HTML before image tag
                    array(
                      'alt' => '', // image tag alt attribute
                      'rel' => 'lightbox'                      // image tag rel attribute
                    ),
                    '',               // HTML after image tag
                    array('w=315', 'h=236', 'q=100', 'zc=1'), // phpThumb configuration parameters
                    ''             // image tag custom css class
                  );
                ?>
              </a>
            </div>
            <div class="entry">
              <ul class="band-details">
                <small>Date: <?php the_time('l, F jS, Y') ?></small>
                <?php if(get_post_meta($post->ID, band_venue, true) != "") { ?><li><small>Venue: <?php echo get_post_meta( $post->ID,"band_venue", $single=true ) ; ?></span><?php } ?></small></li>
                <?php if(get_post_meta($post->ID, band_genre, true) != "") { ?><li><small>Genre: <?php echo get_post_meta( $post->ID,"band_genre", $single=true ) ; ?></span><?php } ?></small></li> 
              </ul>
              <?php the_excerpt() ?>
            </div>
          </div>
          <?php endwhile; else: ?><p>There are currently no stories.</p>
          <?php endif; wp_reset_query(); ?>
  </div>
  <div id="sidebar-special">
    <h1><span style="color:#F28719;">2,000</span> Foo.</h1>
    <h1><span style="color:#F28719;">18</span> Bar.</h1>
    <h1><span style="color:#F28719;">1</span> Baz.</h1>
    <?php the_content(); ?>
  </div>
</div>
<?php get_footer(); ?>