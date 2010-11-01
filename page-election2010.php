<?php
/*
Template Name: Special Project - Election 2010
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
#mosaic{
	margin:20px 0;
}
li.mug-shot-link{
	float:left;
	margin:5px 10px 0 0;
}
li.mug-shot-link-feature{
	float:left;
	margin:5px 10px 10px 0;
}
li.mug-shot-link a, li.mug-shot-link a img{
	width:100px;
	height:100px;
}
li.mug-shot-link-feature a, li.mug-shot-link-feature a img{
	width:115px;
	height:115px;
	margin-right:15px;
	float:left;
}
li.mug-shot-link-feature p{
	margin-top:5px;
}
.black_overlay{
	display: none;
	position: absolute;
	top: 0%;
	left: 0%;
	width: 100%;
	height: 100%;
	background-color: black;
	z-index:1001;
	-moz-opacity: 0.8;
	opacity:.80;
	filter: alpha(opacity=80);
}
 
.white_content {
	display: none;
	position: absolute;
	margin:auto;
	width: 50%;
	min-width:670px;
	padding: 16px;
	border: 16px solid #F28719;
	background-color: white;
	z-index:1002;
	overflow: auto;
}
</style>

<?php get_header(); ?>

<div id="content" class="clearfix">
    <div id="special-event-content">
		<h1><?php the_title(); ?></h1>
		<div id="mosaic">
			<ul class="mug-shot-list clearfix">
				<?php if ( have_posts() ) : ?>
				<?php $recentPosts = new WP_Query(); $recentPosts->query("posts_per_page=30&category_name=election-2010&paged=$paged"); ?>
					<?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
						<li class="mug-shot-link">
							<a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">
							<img class="size-medium wp-image-73" title="Antennae" src="http://nycitynewsservice.com/files/2010/10/Saturn-Cassini.jpg" alt="" />
							</a>
						</li>
						<div id="light" class="white_content the_content">
							<h2><?php the_title(); ?></h2>
							<?php the_content(); ?>
							<?php if( $video_code = get_post_meta($post->ID, 'video_code', true) ) { ?>
								<iframe src="http://player.vimeo.com/video/<?php echo $video_code; ?>?title=0&amp;byline=0&amp;portrait=0" width="650" height="488" frameborder="0"></iframe>
							<?php } ?>
							<a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a></div>
						<div id="fade" class="black_overlay"></div>
					<?php endwhile; endif; ?>
			</ul>
		</div>
		<?php if ( class_exists('GeoMashup') ) { echo GeoMashup::map('zoom=11&height=500&width=650&auto_info_open=false&add_overview_control=false&add_map_type_control=false&map_content=global&map_cat=election-2010');	} ?>
	</div>
	<div id="sidebar-special">
		<h1>Intro</h1>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); the_content(); endwhile; endif; ?>
		<h1>Tag Cloud!</h1>
			<?php if ( function_exists('wp_tag_cloud') ) : ?>
				<ul>
					<?php wp_tag_cloud('smallest=8&largest=22&include=1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,21,23,24,25,26'); ?>
				</ul>
			<?php endif; ?>
		<h1>Featured Posts</h1>
		<?php if ( have_posts() ) : ?>
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
			<?php endwhile; endif; ?>
	</div>
</div>
<?php get_footer(); ?>