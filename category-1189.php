<?php get_header(); ?>

	<div id="content" class="clearfix">
      <div id="homeleft" style="width: 400px; margin-right: 20px;">
	
    <div style="background: #f9f9f9; font-size: 90%; padding: 10px; margin-bottom: 20px; border-top: 5px solid #cc3300;">Nearly 30 years ago, Ronald Reagan famously asked Americans, "Are you better off now than you were four years ago?" More than 60 NYCity News Service reporters fanned out through the city in the days before the historic Nov. 4 election to ask New Yorkers:
      <div style="font-size: 175%; line-height: 150%; margin-top: 10px;">"Where do you want this country to be four years from now?"</div></div>
      
      <object id="NewYorkMap" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="400" height="600">
        <param name="movie" value="<?php bloginfo('stylesheet_directory'); ?>/newyorkmap.swf" />
        <!--[if !IE]>-->
        <object type="application/x-shockwave-flash" data="<?php bloginfo('stylesheet_directory'); ?>/newyorkmap.swf" width="400" height="600">
        <!--<![endif]-->
          <p>Alternative content</p>
        <!--[if !IE]>-->
        </object>
        <!--<![endif]-->
      </object> 
 
  </div>
  
  <div style="float: left; width: 380px; margin-top: 20px; padding-left: 20px; border-left: 1px solid #eee; border-right: 1px solid #eee; padding-right: 20px; margin-right: 20px;">
    <h1><?php single_cat_title(''); ?></h1>

		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
        
				<div class="clearfix" style="border-bottom: 1px solid #eee; padding-bottom: 20px; margin-bottom: 20px;">

        <?php 
				if (function_exists('yapb_is_photoblog_post')) {
				if (yapb_is_photoblog_post()) {
    			echo yapb_get_thumbnail(
      			'', // HTML before image tag
      		array(
        		'alt' => '', // image tag alt attribute
        		'rel' => 'lightbox' // image tag rel attribute
      			),
      		'', // HTML after image tag
      array('w=100', 'h=150', 'q=100', 'zc=1'), // phpThumb configuration parameters
      'election-mug' // image tag custom css class
    	);
			}	
		}
  ?>
  <?php else: ?>
<?php endif ?>


				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>

				<div class="entry">
					<?php the_content() ?>
				</div>

	      </div>



		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
  </div>
  
  <div style="width: 100px; margin-top: 20px; float: left;">
  <?php wp_list_categories('child_of=148&title_li=Sort By'); ?> 
  </div>
</div>

<?php get_footer(); ?>