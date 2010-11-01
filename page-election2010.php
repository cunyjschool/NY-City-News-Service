<?php
/*
Template Name: Special Project - Election 2010
*/
?>

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