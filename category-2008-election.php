<?php get_header(); ?>

<div id="content" class="clearfix">
	<div id="col1">
  
		<div id="violin">
			<?php $lead_arg = array( 'p'=>3407 );
			$lead_page = new WP_Query( $lead_arg );
			?>
  	<?php if ( $lead_page->have_posts() ) : while ( $lead_page->have_posts() ) : $lead_page->the_post(); ?>
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<?php global $more; $more = 0; the_content(); ?>
    <?php endwhile; else: ?>
		<?php endif; ?>
    </div>
    
  	<?php
		$featured_arg = array(
			'category_name'=>'election-2008-featured',
			'showposts'=>1
		);
	$featured_post = new WP_Query( $featured_arg );
	?>
  	<?php if ( $featured_post->have_posts() ) : while ( $featured_post->have_posts() ) : $featured_post->the_post(); ?>

		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

		<?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( array( 530, 250 ) ); ?></a>
		<?php endif; ?>
	
		<div class="caption"><?php the_excerpt(); ?> <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Read more &raquo;</a></div>

	<?php endwhile; else: ?>

	<?php endif; ?>


    <div id="efeatured">
<h2 id="efeaturedhead">Featured</h2>
	<?php $featured_arg = array(
							'category_name'=>'election-2008-featured',
							'showposts'=>8,
							'offset'=>1
						);
	$featured_posts = new WP_Query( $featured_arg );
	while ($featured_posts->have_posts()) : $featured_posts->the_post(); ?>
	<div>
	
		<?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( array( 220, 150 ) ); ?></a>
		<?php endif; ?>

		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</div>
	<?php endwhile; ?>  


<h2 id="blogshead">Best of the Blogs</h2>
<ul id="bestofblogs">
<?php wp_list_bookmarks('title_li=0&limit=10&categorize=0&orderby=id&order=ASC&category=2308&before=<li>&after=</li>&title_li=&show_description=1&between=<br />'); ?>
</ul>
    </div>
    
    <div id="elatest">
    
    <h2 id="evideoshead">Videos</h2>
     <ul style="margin-top: 5px;">
		<?php $video_arg = array(
								'category_name'=>'election-2008-video',
								'showposts'=>5
							);
		$video_posts = new WP_Query( $video_arg );
 		if ( $video_posts->have_posts() ) : while ( $video_posts->have_posts() ) : $video_posts->the_post(); ?>
  
    <li style="margin-bottom: 20px; padding-bottom: 5px;">
		<?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( array( 250, 150 ) ); ?></a>
		<?php endif; ?>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</li>

	<?php endwhile; else: ?>
		<li>There are currently no stories.</li>
	<?php endif; ?>
	</ul>


<h2 id="elatesthead">Latest Election News</h2>
<ul>
	<?php $args = array(
							'category_name'=>'2008-election',
							'showposts'=>35
						);
	$latest_posts = new WP_Query( $args );
	if ( $latest_posts->have_posts() ) : while ( $latest_posts->have_posts() ) : $latest_posts->the_post(); ?>
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