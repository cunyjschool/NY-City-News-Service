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
li.mug-shot-link{
	float:left;
	margin:5px 10px;
}
li.mug-shot-link a, li.mug-shot-link a img{
	width:112px;
	height:112px;
}
</style>

<?php get_header(); ?>

	<div id="content" class="clearfix">
    <div id="special-event-content">
      <h1><?php the_title(); ?></h1>
      
      <?php query_posts("category_name=election-2010"); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      	  <ul class="mug-shot-list">
            <li class="mug-shot-link">
              <a href="<?php the_permalink(); ?>">
				<img class="size-medium wp-image-73" title="Antennae" src="http://nycitynewsservice.com/files/2010/10/Saturn-Cassini.jpg" alt="" />
              </a>
            </li>
          </ul>
          <?php endwhile; else: ?><p>There are currently no stories.</p>
          <?php endif; wp_reset_query(); ?>
  </div>
  <div id="sidebar-special">
	<?php the_content(); ?>
    <h1>Tag Cloud!</h1>
	<?php if ( function_exists('wp_tag_cloud') ) : ?>
		<ul>
			<?php wp_tag_cloud('smallest=8&largest=22'); ?>
		</ul>
	<?php endif; ?>
  </div>
</div>
<?php get_footer(); ?>