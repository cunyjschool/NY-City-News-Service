<?php get_header(); ?>

	<div id="content" class="clearfix">
      <div id="homeleft">
	

<?php
	global $wp_query;
	$curauth = $wp_query->get_queried_object();
?>


<div style="float:right;">
<?php echo get_avatar($curauth->user_email,'80'); ?>
</div>

<?php if($curauth->first_name !="" && $curauth->last_name !="") { ?>
  <h2><?php echo $curauth->first_name. ' ' . $curauth->last_name ?></h2>
<?php } ?>

<dl>
<?php if($curauth->aim !="") { ?>
   <dt>AIM</dt>
      <dd><?php echo $curauth->aim; ?></dd>
<?php } ?>
<?php if($curauth->yim !="") { ?>
   <dt>Yahoo! Messenger</dt>
      <dd><?php echo $curauth->ym; ?></dd>
<?php } ?>
<?php if($curauth->jabber !="") { ?>
   <dt>Google Talk / Jabber</dt>
      <dd><?php echo $curauth->jabber; ?></dd>
<?php } ?>
<?php if($curauth->user_url !=""
               && $curauth->user_url !="http://") { ?>
   <dt>Website</dt>
      <dd><a href="<?php echo $curauth->user_url; ?>">
            <?php echo $curauth->user_url; ?></a></dd>
<?php } ?>
<?php if($curauth->description !="") { ?>
   <dt>Bio</dt>
      <dd><?php echo $curauth->description; ?></dd>
<?php } ?>
</dl>

<h2>Latest Stories by <?php echo $curauth->first_name. ' ' . $curauth->last_name ?></h2>
<ul>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<li>
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
<?php the_title(); ?></a>
</li>
<?php endwhile; else: ?>
<p><?php _e('No posts by this author.'); ?></p>
<?php endif; ?>
</ul>

	


  
 
  </div>
<?php include (TEMPLATEPATH . '/category-sidebar.php'); ?>

<?php get_footer(); ?>