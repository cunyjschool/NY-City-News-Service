<?php get_header(); ?>

<div id="content" class="clearfix">
    
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="post" id="post-<?php the_ID(); ?>">
  
  <?php edit_post_link( 'Edit','','' ); ?>

  <h2><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
 
 
<?php if ( $subhead = get_post_meta( $post->ID, 'subhead', true ) ) { ?><h2 class="subhead"><?php echo $subhead; ?></h2><?php } ?>

     <div class="entry">
      <div class="byline">
By <?php if ( function_exists( 'coauthors_posts_links' ) ) { coauthors_posts_links(); } else { the_author_posts_link(); } ?> | <span><?php the_time('F jS, Y') ?> | <a href="JavaScript:window.print();"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/icons/printer.png"> Print</a></span>
      </div>  
        

	  <?php if( get_post_meta( $post->ID, 'publication', true ) ) { ?>
      <div id="publication">
<ul>
  <li id="newspaper">Published in: <a href="<?php echo get_post_meta( $post->ID, "publication_url", true ) ; ?>"><?php echo get_post_meta( $post->ID, "publication", true ) ; ?></a>
</ul>
      </div>
	  <?php } ?>
      
      
      <?php if( $seenon = get_post_meta( $post->ID, 'seenon', true ) ) { ?>
      <div id="publication">
<ul>
  <li>As seen on: <a href="<?php echo get_post_meta( $post->ID,'seenon_url', true ) ; ?>"><?php echo $seenon; ?></a>
</ul>
      </div>
	  <?php } ?>
      
	<div id="featured-photo">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'post-primary', array( 'class' => 'thumbnail' ) ); ?>
		<?php endif; ?>

		<?php if ( $photo_credit = get_post_meta( $post->ID, 'photo_credit', true ) ) { ?><div class="credit"><?php echo $photo_credit; ?></div><?php } ?>
		<?php if( $photo_caption = get_post_meta( $post->ID, 'photo_caption', true ) ) { ?><div class="caption"><?php echo $photo_caption; ?></div><?php } ?>
	</div>

      <div>
		<?php if ( $dateline = get_post_meta( $post->ID, 'dateline', true ) ) { ?><div id="dateline"><?php echo $dateline; ?> -</div><?php } ?> 
		<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
      </div>

		<?php if ( function_exists( 'related_posts' ) ): ?>
		<?php related_posts(); ?>
		<?php endif; ?>

      <div class="postmetadata alt">
		<ul>
			<li id="date">This story was posted on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>.</li>
			<?php if ( $topics = get_the_term_list( get_the_id(), 'nycns_topics', false, ', ' ) ): ?>
				<li id="topics">Topics: <?php echo $topics; ?></li>
			<?php endif; ?>
			<?php if ( $places = get_the_term_list( get_the_id(), 'nycns_places', false, ', ' ) ): ?>
				<li id="places">Places: <?php echo $places; ?></li>
			<?php endif; ?>
			<?php if ( $media = get_the_term_list( get_the_id(), 'nycns_media', false, ', ' ) ): ?>
				<li id="media">Media: <?php echo $media; ?></li>
			<?php endif; ?>
			<li id="feed">You can follow any responses to this story through the <?php comments_rss_link('RSS 2.0'); ?> feed.</li>
			<?php if(get_post_meta($post->ID, 'street_address', true) != "") { ?><li id="mapicon"><a href="http://maps.google.com/maps?ll=<?php echo get_post_meta( $post->ID,"street_address", $single=true ) ; ?>&q=<?php the_title(); ?>@<?php echo get_post_meta( $post->ID,"street_address", $single=true ) ; ?>&spn=0.005025,0.008500&t">Map this story</a>.</li><?php } ?> 
  			<li id="comment">

<?php if (('open' == $post->comment_status) && ('open' == $post->ping_status)) {

// Both Comments and Pings are open ?>				
You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(true); ?>" rel="trackback">trackback</a> from your own site.

<?php } elseif (!('open' == $post->comment_status) && ('open' == $post->ping_status)) {
// Only Pings are Open ?>

Responses are currently closed, but you can <a href="<?php trackback_url(true); ?> " rel="trackback">trackback</a> from your own site

<?php } elseif (('open' == $post->comment_status) && !('open' == $post->ping_status)) {
// Comments are open, Pings are not ?>						

You can skip to the end and leave a response. Pinging is currently not allowed.

<?php } elseif (!('open' == $post->comment_status) && !('open' == $post->ping_status)) {

// Neither Comments, nor Pings are open ?>
						
Both comments and pings are currently closed.
  </li>
</ul>

<?php } edit_post_link('Edit this entry.','',''); ?>
        </div>
        
        
	<?php comments_template(); ?>

	<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
	  </div>
    </div>
<?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>
