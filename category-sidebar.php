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
  <h2>Sections</h2>
  <li><a href="<?php bloginfo('url'); ?>/category/arts-culture/">Arts &amp; Culture</a></li>
  <li><a href="<?php bloginfo('url'); ?>/category/audio/">Audio</a></li>
  <li><a href="<?php bloginfo('url'); ?>/category/business/">Business</a></li>
  <li><a href="<?php bloginfo('url'); ?>/category/education/">Education</a></li>
  <li><a href="<?php bloginfo('url'); ?>/category/election2008/">Election 2008</a></li>
  <li><a href="<?php bloginfo('url'); ?>/category/environment/">Environment</a></li>
  <li><a href="<?php bloginfo('url'); ?>/category/health/" title="View all posts filed under Health">Health</a></li>
  <li><a href="<?php bloginfo('url'); ?>/category/housing/" title="View all posts filed under Housing">Housing</a></li>
  <li><a href="<?php bloginfo('url'); ?>/category/jstream/" title="View all posts filed under JStream">JStream</a></li>
  <li><a href="<?php bloginfo('url'); ?>/category/multimedia/" title="View all posts filed under Multimedia">Multimedia</a></li>
  <li><a href="<?php bloginfo('url'); ?>/category/nypulse/" title="View all posts filed under NYPulse">NYPulse</a></li>
  <li><a href="<?php bloginfo('url'); ?>/category/politics/" title="View all posts filed under Politics">Politics</a></li>
  <li><a href="<?php bloginfo('url'); ?>/category/public-safety/" title="View all posts filed under Public Safety">Public Safety</a></li>
  <li><a href="<?php bloginfo('url'); ?>/category/special-projects/" title="View all posts filed under Special Projects">Special Projects</a></li>
  <li><a href="<?php bloginfo('url'); ?>/category/super-tuesday-2008/" title="View all posts filed under Super Tuesday 2008">Super Tuesday 2008</a></li>
  <li><a href="<?php bloginfo('url'); ?>/category/top-stories/">Top Stories</a></li>
  <li><a href="<?php bloginfo('url'); ?>/category/transportation/">Transportation</a></li>
  <li><a href="<?php bloginfo('url'); ?>/category/video/">Video</a></li>
</ul>
      </div>
    </div>
  </div>