<?php get_header(); ?>

	<div id="content" class="clearfix">
      <div id="homeleft">
	
			<h1><?php single_cat_title(''); ?></h1>


<?php query_posts($query_string . "&showposts=1"); ?>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  
        <div id="featured-photo">
<a href="<?php the_permalink(); ?>">
<?php
if ( function_exists('yapb_get_thumbnail') ) {
	
    echo yapb_get_thumbnail(
      '', // HTML before image tag
      array(
        'alt' => '', // image tag alt attribute
        'rel' => 'lightbox'                      // image tag rel attribute
      ),
      '',               // HTML after image tag
      array('w=485', 'h=250', 'q=100', 'zc=1'), // phpThumb configuration parameters
      ''             // image tag custom css class
    );
}
?>
</a>
  <?php if( get_post_meta($post->ID, 'photo_credit', true) ) { ?><div class="credit"><?php echo get_post_meta( $post->ID,"photo_credit", $single=true ) ; ?></div><?php } ?>
  <?php if( get_post_meta($post->ID, 'photo_caption', true) ) { ?><div class="caption"><?php echo get_post_meta( $post->ID,"photo_caption", $single=true ) ; ?>  </div><?php } ?>      
          </div>

	      <div class="post">
<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<small><?php the_time('l, F jS, Y') ?></small>

            <div class="entry">
<?php the_content() ?>
            </div>
          </div>
            
  <?php endwhile; else: ?><p>There are currently no stories.</p>
<?php endif; ?>


<?php query_posts($query_string . "&showposts=3&offset=1"); ?>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  
  
  	      <div class="post" id="archive-subpost">

<a href="<?php the_permalink(); ?>">
<?php
if ( function_exists('yapb_get_thumbnail') ) {
    echo yapb_get_thumbnail(
      '', // HTML before image tag
      array(
        'alt' => '', // image tag alt attribute
        'rel' => 'lightbox'                      // image tag rel attribute
      ),
      '',               // HTML after image tag
      array('w=150', 'h=150', 'q=100', 'zc=1'), // phpThumb configuration parameters
      'archive-thumb'             // image tag custom css class
    );
}
?>
</a>     


<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
<small><?php the_time('l, F jS, Y') ?></small>

            <div class="entry">
<?php the_content() ?>
            </div>
          </div>
            
  <?php endwhile; else: ?><p>There are currently no stories.</p>
<?php endif; ?>

<?php query_posts($query_string . "&showposts=5&offset=4"); ?>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  
  
  	      <div class="post" id="archive-subpost">
<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
<small><?php the_time('l, F jS, Y') ?></small>
          </div>
            
  <?php endwhile; else: ?><p>There are currently no other stories.</p>
<?php endif; ?>
 
  </div>
<?php include (TEMPLATEPATH . '/category-sidebar.php'); ?>

<?php get_footer(); ?>