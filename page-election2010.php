<?php
/*
Template Name: Election 2010
*/
?>

<style>
#special-event-content{
	float: left;
	width: 670px;
	margin: 0 10px 20px 0;
	
}
#sidebar-special{
	float: left;
	width: 250px;
	border-left: 1px solid #eee;
	margin-left: 0;
	padding-left: 20px;
}
ul.mug-shot-list, ul.mug-shot-list-feature{
	margin-top:15px;
}
#mosaic{
	background:#eeeeee;
	border:1px solid #dddddd;
	margin:20px 10px;
	display:block;
}
#mosaic > p, #mosaic #mug-shot-filters{
	margin-left: 20px;
}
ul.mug-shot-list{
	padding-left:18px;
	height:510px;
}
li.mug-shot-link{
	float:left;
	margin:5px 15px 5px 0;
}
li.mug-shot-link-feature{
	float:left;
	margin:5px 10px 10px 0;
}
li.mug-shot-link a, li.mug-shot-link a img{
	width:110px;
	height:110px;
}
li.mug-shot-link-feature a, li.mug-shot-link-feature a img{
	width:110px;
	height:110px;
	margin-right:15px;
	float:left;
}
li.mug-shot-link-feature p{
	margin-top:5;
}
.the_video{
	padding:0 10px;
}
</style>

<?php get_header(); ?>

<div id="content" class="clearfix">
    <div id="special-event-content">
		<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
      
		<?php if( $video_code = get_post_meta($post->ID, 'video_code', true) ) { ?>
			<div class="the_video">
				<iframe src="http://player.vimeo.com/video/<?php echo $video_code; ?>?title=0&amp;byline=0&amp;portrait=0" width="650" height="488" frameborder="0"></iframe>
			</div>
		<?php } ?>
		
		<div id="mosaic">
			<p><?php the_content(); endwhile; endif; ?></p>
			<?php if ( function_exists('wp_tag_cloud') ) : ?><ul id="mug-shot-filters"><?php wp_tag_cloud(); ?></ul><?php endif; ?>
			<ul class="mug-shot-list" style="clear:both">
				<?php $recentPosts = new WP_Query(); $recentPosts->query("posts_per_page=15&category_name=election-2010&paged=$paged"); ?>
					<?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
						<li class="mug-shot-link">
							<a href="<?php the_permalink(); ?>">
								<img class="size-medium wp-image-73" title="Antennae" src="http://nycitynewsservice.com/files/2010/10/Saturn-Cassini.jpg" alt="" />
							</a>
						</li>
					<?php endwhile; ?>
				<?php next_posts_link('« Older Entries'); ?>
				<?php previous_posts_link('Newer Entries »'); ?>
			</ul>
		</div>
	</div>
	<div id="sidebar-special">
		<!-- <h1>Tag Cloud!</h1>
			<?php if ( function_exists('wp_tag_cloud') ) : ?>
				<ul>
					<?php wp_tag_cloud('smallest=8&largest=22&include=1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,21,23,24,25,26'); ?>
				</ul>
			<?php endif; ?> -->
		<h1>Featured Posts</h1>
		<?php $featuredPosts = new WP_Query(); $featuredPosts->query("posts_per_page=15&category_name=election-2010-feature&paged=$paged"); ?>
			<?php while ($featuredPosts->have_posts()) : $featuredPosts->the_post(); ?>
				<ul class="mug-shot-list-feature">
					<li class="mug-shot-link-feature">
						<div>
							<a href="<?php the_permalink(); ?>"><img class="size-medium wp-image-73" title="Antennae" src="http://nycitynewsservice.com/files/2010/10/Saturn-Cassini.jpg" alt="" /></a>
							<h2><?php the_title(); ?></h2>
							<?php the_excerpt(); ?>
						</div>
					</li>
				</ul>
			<?php endwhile; ?>
	</div>
</div>
<?php get_footer(); ?>