    <div id="sidebar">
      <div id="sidebar1">


<?php
if ( is_category(array(2,3,4,5,6)) ) {
	echo '<ul id="blogroll">';
	echo single_cat_title('<h2>') . " Blogroll</h2>";
} ?>

  <?php 
if ( is_category('2') ) { wp_list_bookmarks('title_li=0&categorize=0&category=2&before=<li>&after=</li>&title_li='); }
elseif ( is_category('3') ) { wp_list_bookmarks('title_li=0&categorize=0&category=3&before=<li>&after=</li>&title_li='); }
elseif ( is_category('4') ) { wp_list_bookmarks('title_li=0&categorize=0&category=4&before=<li>&after=</li>&title_li='); }
elseif ( is_category('5') ) { wp_list_bookmarks('title_li=0&categorize=0&category=5&before=<li>&after=</li>&title_li='); }
elseif ( is_category('6') ) { wp_list_bookmarks('title_li=0&categorize=0&category=6&before=<li>&after=</li>&title_li='); }
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
    <?php query_posts('cat=1&showposts=8'); ?>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <li><a href="<?php the_permalink(); ?>" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></li>
      <?php endwhile; else: ?>
    <?php endif; ?>
</ul>

<ul id="cats">
  <h2>Sections</h2>
  <li><a href="/category/arts-culture/">Arts &amp; Culture</a></li>
  <li><a href="/category/audio/">Audio</a></li>
  <li><a href="/category/business/">Business</a></li>
  <li><a href="/category/education/">Education</a></li>
  <li><a href="/category/election2008/">Election 2008</a></li>
  <li><a href="/category/environment/">Environment</a></li>
  <li><a href="/category/health/" title="View all posts filed under Health">Health</a></li>
  <li><a href="/category/housing/" title="View all posts filed under Housing">Housing</a></li>
  <li><a href="/category/jstream/" title="View all posts filed under JStream">JStream</a></li>
  <li><a href="/category/multimedia/" title="View all posts filed under Multimedia">Multimedia</a></li>
  <li><a href="/category/nypulse/" title="View all posts filed under NYPulse">NYPulse</a></li>
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