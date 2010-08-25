<?php get_header(); ?>

    <div id="content" class="clearfix">
      <div class="clearfix" id="brooklyn">
      
        <div id="brooklyn-intro">
<p class="dropcap">In Sunset Park, Chinese and Latino congregations <a href="/2009/06/05/cd-7-praising-the-lord-in-mandarin/">share a church</a> built a century ago for Norwegians. In Canarsie, South Asian and Caribbean immigrants <a href="/2009/06/05/cd-13-staying-in-the-game/">flock to the city's only indoor cricket batting cage</a>. Nearby, at the Brooklyn Terminal Market, you'll <a href="/2009/06/05/cd-18-new-beginning-for-terminal/">find both West Indian and Italian products</a> on the shelves of A &amp; J Wholesale Foods.</p>

<p>One in six Americans, it's been said, can trace family roots to Brooklyn. The borough continues to be the first - and sometimes final - stopping point in the U.S. for new waves of immigrants.</p>

<p>With Census figures nine years old, the NYCity News Service looked at the latest available public elementary school statistics to get an idea of where immigrant families are settling. Then we hit Brooklyn's 18 community districts to put faces to the numbers.</p>

<p>Here are some of the stories we found...</p>

<p style="font-size: 10px; color: #666;"><a href="http://www.flickr.com/photos/smcgee/351136186/">Brooklyn Bridge</a> photo by Sarah McGee | Brooklyn map courtesy <a href="http://www.nycsubway.org/">NYCSubway.org</a></p>
        </div>
          
        <div style="margin: 0 auto; width: 930px;" class="clearfix">        
  <ul>
	<?php $args = array( 'category_name' => '2009-brooklyn-immigration-project',
							'showposts' => 18
					);
	$posts = new WP_Query( $args );
	
	?>
  <?php if ( $posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
  <li>
<a href="<?php the_permalink(); ?>">
<?php
    echo yapb_get_thumbnail(
      '', // HTML before image tag
      array(
        'alt' => '', // image tag alt attribute
        'rel' => 'lightbox'                      // image tag rel attribute
      ),
      '',               // HTML after image tag
      array('w=130', 'h=100', 'q=100', 'zc=1'), // phpThumb configuration parameters
      ''             // image tag custom css class
    );
?>
</a>
          
<h4 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
  </li>
            
  <?php endwhile; else: ?><p>There are currently no stories.</p>
<?php endif; ?>
</ul> 
        </div>   
       
        <div id="brooklyn-map"> 
<iframe width="920" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps/ms?ie=UTF8&amp;hl=en&amp;msa=0&amp;msid=100874764743459524252.000469e191adde4020b6f&amp;ll=40.661369,-73.949661&amp;spn=0.208348,0.205994&amp;z=12&amp;output=embed"></iframe>    
        </div>
      </div>
    </div>
<?php get_footer(); ?>