<?php get_header(); ?>

<div id="content" class="clearfix">
    
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="post" id="post-<?php the_ID(); ?>">
  
  <?php edit_post_link('Edit this entry.','',''); ?>

  <h2><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
 
 
<?php if(get_post_meta($post->ID, subhead, true) != "") { ?><h2 class="subhead"><?php echo get_post_meta( $post->ID,"subhead", $single=true ) ; ?></h2><?php } ?>

     <div class="entry">
      <div class="byline">
By <?php the_author_posts_link('namefl'); ?> <?php if(get_post_meta($post->ID, add_author, true) != "") { ?>, <?php echo get_post_meta( $post->ID,"add_author", $single=true ) ; ?><?php } ?><?php if(get_post_meta($post->ID, add_author2, true) != "") { ?>, <?php echo get_post_meta( $post->ID,"add_author2", $single=true ) ; ?><?php } ?> | <span><?php the_time('F jS, Y') ?> | <?php if (function_exists('sharethis_button')) { sharethis_button(); } ?> | <a href="JavaScript:window.print();"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/icons/printer.png"> Print</a></span>
      </div>  
        

	  <?php if(get_post_meta($post->ID, publication, true) != "") { ?>
      <div id="publication">
<ul>
  <li id="newspaper">Published in: <a href="<?php echo get_post_meta( $post->ID,"publication_url", $single=true ) ; ?>"><?php echo get_post_meta( $post->ID, "publication", $single=true ) ; ?></a>
</ul>
      </div>
	  <?php } ?>
      
      
      <?php if(get_post_meta($post->ID, seenon, true) != "") { ?>
      <div id="publication">
<ul>
  <li>As seen on: <a href="<?php echo get_post_meta( $post->ID,"seenon_url", $single=true ) ; ?>"><?php echo get_post_meta( $post->ID, "seenon", $single=true ) ; ?></a>
</ul>
      </div>
	  <?php } ?>
      
      
      
      <div id="featured-photo">
<?php
    echo yapb_get_thumbnail(
      '', // HTML before image tag
      array(
        'alt' => '', // image tag alt attribute
        'rel' => 'lightbox'                      // image tag rel attribute
      ),
      '',               // HTML after image tag
      array('w=485', 'h=250', 'q=100', 'zc=1'), // phpThumb configuration parameters
      'thumbnail'             // image tag custom css class
    );
?>
  <?php if(get_post_meta($post->ID, photo_credit, true) != "") { ?><div class="credit"><?php echo get_post_meta( $post->ID,"photo_credit", $single=true ) ; ?></div><?php } ?>
  <?php if(get_post_meta($post->ID, photo_caption, true) != "") { ?><div class="caption"><?php echo get_post_meta( $post->ID,"photo_caption", $single=true ) ; ?>  </div><?php } ?>      </div>

      <div>
<?php if(get_post_meta($post->ID, dateline, true) != "") { ?><div id="dateline"><?php echo get_post_meta( $post->ID,"dateline", $single=true ) ; ?> -</div><?php } ?> 

        <div style="float: right; width: 100px; margin: 0 0 10px 10px;">
<a href="javascript:q=(document.location.href);t=(document.title); s=(document.getSelection());void(open('http://www.nyc.is/node/add/drigg?url='+escape(q)+'&title='+escape(t),'','resizable,location,menubar,toolbar,scrollbars,status'));" mce_href="javascript:q=(document.location.href);t=(document.title);void(open('http://WWW.nyc.is/node/add/drigg?url='+escape(q)+'&amp;title='+escape(t),'','resizable,location,menubar,toolbar,scrollbars,status'));" title="Submit to nyc.is" alt="Submit to nyc.is"><img src="http://WWW.nyc.is/images/bookmarklet.gif" mce_src="http://WWW.nyc.is/images/bookmarklet.gif" alt="Submit to nyc.is"/></a> 
        </div>


<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
      </div>

      <div class="postmetadata alt">
<ul>
  <li id="date">This story was posted on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>.</li>
  <li id="sections">Categories: <?php the_category(', ') ?></li>
  <li id="tags"><?php the_tags('Tags: ', ', ', ''); ?></li>
  <li id="feed">You can follow any responses to this story through the <?php comments_rss_link('RSS 2.0'); ?> feed.</li>
<?php if(get_post_meta($post->ID, street_address, true) != "") { ?><li id="mapicon"><a href="http://maps.google.com/maps?ll=<?php echo get_post_meta( $post->ID,"street_address", $single=true ) ; ?>&q=<?php the_title(); ?>@<?php echo get_post_meta( $post->ID,"street_address", $single=true ) ; ?>&spn=0.005025,0.008500&t">Map this story</a>.</li><?php } ?> 
  <li id="comment">

<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {

// Both Comments and Pings are open ?>				
You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(true); ?>" rel="trackback">trackback</a> from your own site.

<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
// Only Pings are Open ?>

Responses are currently closed, but you can <a href="<?php trackback_url(true); ?> " rel="trackback">trackback</a> from your own site

<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
// Comments are open, Pings are not ?>						

You can skip to the end and leave a response. Pinging is currently not allowed.

<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {

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
