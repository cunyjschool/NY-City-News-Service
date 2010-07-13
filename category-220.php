<?php get_header(); ?>

<div id="content" class="clearfix">
	<div id="col1">
  
		<div id="violin">
		<?php query_posts('p=3407'); ?>
  	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<?php global $more; $more = 0; the_content(); ?>
    <?php endwhile; else: ?>
		<?php endif; ?>
    </div>
    
  
    <?php query_posts('cat=413&showposts=1'); ?>
  	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>


<?php if (yapb_is_photoblog_post()): ?>
<a href="<?php the_permalink(); ?>">
  <?php
    echo yapb_get_thumbnail(
      '', // HTML before image tag
      array(
        'alt' => '', // image tag alt attribute
        'rel' => 'lightbox' // image tag rel attribute
      ),
      '', // HTML after image tag
      array('w=530', 'h=250', 'q=100', 'zc=1'), // phpThumb configuration parameters
      '' // image tag custom css class
    );
  ?>
</a>
  <?php else: ?>
<?php endif ?>
	

    <div class="caption"><?php the_excerpt(); ?> <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Read more &raquo;</a></div>

  <?php endwhile; else: ?>
<?php endif; ?>


    <div id="efeatured">
<h2 id="efeaturedhead">Featured</h2>
     <?php $my_query = new WP_Query('cat=413&showposts=3&offset=1'); while ($my_query->have_posts()) : $my_query->the_post(); ?>
      <div><a href="<?php the_permalink(); ?>">

<?php if (yapb_is_photoblog_post()): ?>
<a href="<?php the_permalink(); ?>">
  <?php
    echo yapb_get_thumbnail(
      '', // HTML before image tag
      array(
        'alt' => '', // image tag alt attribute
        'rel' => 'lightbox' // image tag rel attribute
      ),
      '', // HTML after image tag
      array('w=220', 'h=150', 'q=100', 'zc=1'), // phpThumb configuration parameters
      '' // image tag custom css class
    );
  ?>
</a>
  <?php else: ?>
<?php endif ?>

<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </div>
  <?php endwhile; ?>  


<h2 id="blogshead">Best of the Blogs</h2>
<ul id="bestofblogs">
<?php wp_list_bookmarks('title_li=0&limit=10&categorize=0&orderby=id&order=DESC&category=1227&before=<li>&after=</li>&title_li=&show_description=1&between=<br />'); ?>
</ul>
    </div>
    
    <div id="elatest">
    
    <h2 id="evideoshead">Videos</h2>
     <ul style="margin-top: 5px;">
<?php query_posts('cat=414&showposts=2'); ?>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  
    <li style="margin-bottom: 20px; padding-bottom: 5px;">
  <?php if (yapb_is_photoblog_post()): ?>
<a href="<?php the_permalink(); ?>">
  <?php
    echo yapb_get_thumbnail(
      '', // HTML before image tag
      array(
        'alt' => '', // image tag alt attribute
        'rel' => 'lightbox' // image tag rel attribute
      ),
      '', // HTML after image tag
      array('w=250', 'h=150', 'q=100', 'zc=1'), // phpThumb configuration parameters
      '' // image tag custom css class
    );
  ?>
</a>
  <?php else: ?>
<?php endif ?>


<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

  <?php endwhile; else: ?><p>There are currently no stories.</p>
<?php endif; ?>
</ul>


<h2 id="elatesthead">Latest Election News</h2>
<ul>
<?php query_posts('cat=220&showposts=35'); ?>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php endwhile; else: ?>
<?php endif; ?>
</ul>

    </div>
  </div>
  
  
  <div id="col2">

<h2>Scenes of Celebration</h2>
<object width="400" height="300"> <param name="flashvars" value="&offsite=true&intl_lang=en-us&page_show_url=%2Fphotos%2Fcunyjschool%2Fsets%2F72157608669569819%2Fshow%2F&page_show_back_url=%2Fphotos%2Fcunyjschool%2Fsets%2F72157608669569819%2F&set_id=72157608669569819&jump_to="></param> <param name="movie" value="http://www.flickr.com/apps/slideshow/show.swf?v=61927"></param> <param name="allowFullScreen" value="true"></param><embed type="application/x-shockwave-flash" src="http://www.flickr.com/apps/slideshow/show.swf?v=61927" allowFullScreen="true" flashvars="&offsite=true&intl_lang=en-us&page_show_url=%2Fphotos%2Fcunyjschool%2Fsets%2F72157608669569819%2Fshow%2F&page_show_back_url=%2Fphotos%2Fcunyjschool%2Fsets%2F72157608669569819%2F&set_id=72157608669569819&jump_to=" width="400" height="300"></embed></object>

  
    <div id="snapshotmap">
<h2 id="maphead">NYCity Snapshot: <a href="http://nycitynewsservice.com/category/nycitysnapshots/election-nycsnapshots/">Life in Four More Years</a></h2>

<a href="http://nycitynewsservice.com/category/nycitysnapshots/election-nycsnapshots/"><img src="<?php bloginfo('template_directory'); ?>/img/snapshot-map.jpg"></a>
      <div>
In 1980, Ronald Reagan asked Americans, "Are you better off now than you were four years ago?" More than 60 NYCity News Service reporters hit the streets to ask New Yorkers: <strong><a href="http://nycitynewsservice.com/category/nycitysnapshots/election-nycsnapshots/">"Where do you want this country to be four years from now?"</a></strong>
      </div>
    </div>

<embed src="http://blip.tv/play/Adf1UQA" type="application/x-shockwave-flash" width="400" height="300" allowscriptaccess="always" allowfullscreen="true"></embed>

<h2 id="flickrhead"><a href="http://www.flickr.com/photos/tags/cunyvoterturnout/">What a Difference a Year Makes</a></h2>
Last November, NYCity News Service reporters snapped photos of mostly empty polling places on a sleepy Election Day. This year, our staff photographed packed polling spots as New Yorkers casted ballots in the historic presidential election. 

    <div id="flickrrss">
<?php get_flickrRSS(); ?>

<ul>
  <li style="padding: 10px; text-align: right;"><a href="http://www.flickr.com/photos/tags/cunyvoterturnout/">See More Photos &raquo;</a></li>
</ul>
    </div>
  </div>  
</div>

<?php get_footer(); ?>