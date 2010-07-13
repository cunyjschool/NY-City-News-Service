<?php get_header(); ?>

<div id="content" class="clearfix">
  <div id="queens" class="clearfix">
    <div id="intro">
    
<img src="<?php bloginfo('template_directory'); ?>/img/unisphere2.jpg" id="unisphere">

<h2 style="font-size: 200%;">Queens' Changing World <span style="font-size: 10px;">A NYCity News Service Special Report</span></h2>
<p>Queens is the most diverse county in the country - and the borough's only constant is change.</p>

<p>With Census figures eight years old, the NYCity News Service looked at the latest available public elementary school statistics to get an idea of where immigrant families are settling in Queens. We discovered that at least one of every 12 of Queens' 122,000 elementary school students is a recent arrival. The youngsters represent more than 50 countries, with Guyana, China and Mexico leading the charge.</p>

<p>We mapped out the stats by community district and hit the streets - putting faces and names to the only-in-New-York stories behind the numbers. Here's what we found:</p>

<p style="font-size: 10px;">PHOTO CREDITS: Unisphere photo (right) from <a href="http://en.wikipedia.org/wiki/Image:Flushing_Meadows_Globe.jpg">Wikipedia</a> and Unisphere photo (background) by <a href="http://www.flickr.com/photos/joeshlabotnik/">Peter Dutton</a>.</p>
    </div>

    <div style="width: 270px; float: left;">
      <div class="frost" style="margin-bottom: 20px;">
<h2><a href="/2008/05/29/send-us-your-queens-stories/#respond">Got a Story? &raquo;</a></h2>
Let us know what's happening in your neighborhood, tell us what's on your mind or feel free to share stories of days past. <a href="/2008/05/29/send-us-your-queens-stories/#respond">Leave a comment &raquo;</a>
      </div>

      <div class="frost">
<h2><a href="http://flickr.com/groups/nycitysnapshot/">Submit a Photo &raquo;</a></h2>
Show us how Queens is changing. Upload photos of your neighborhood and neighbors, past and present.<br />
<a href="http://flickr.com/groups/nycitysnapshot/">Post a photo &raquo;</a>
      </div>
    </div>

    <div class="frost" style="width: 650px; float: left;">
<iframe width="650" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps/ms?ie=UTF8&amp;hl=en&amp;s=AARTsJr_3X9aVQOcpG6V2KsqJxjxdhxD1g&amp;msa=0&amp;msid=100874764743459524252.00044dec9265688be5d8e&amp;ll=40.693134,-73.808899&amp;spn=0.208249,0.590515&amp;z=11&amp;output=embed"></iframe><br />
    </div>

   
    <div id="stories">
    
<?php query_posts('cat=695,-840&showposts=14'); ?>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="frost" id="post-<?php the_ID(); ?>">
<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
<img src="<?php echo get_post_meta( $post->ID,"alt_thumb", $single=true ) ; ?>">
<?php the_excerpt(); ?>
      </div>
    <?php endwhile; else: ?>
<?php endif; ?>

    </div>
  </div>
</div>


<?php get_footer(); ?>