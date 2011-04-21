<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title>
  <?php if (is_single()) {
    the_title();
  } else if (is_home()) {
    bloginfo('name');
  } else {
    bloginfo('name');
    wp_title();
  } ?>
</title>

<meta name="description" content="<?php

  if (is_single()) {
    the_excerpt();
  } else {
    bloginfo('description');
  }

?>" />

<?php
/**
 * All stylesheets are enqueued in functions.php
 */
?>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="clearfix" id="jlogo">
  <div style="float: left; width: 500px;">
A student-powered service at the <a href="http://www.journalism.cuny.edu">CUNY Graduate School of Journalism</a>
  </div>
  
  <div id="search">
	<?php include (TEMPLATEPATH . '/searchform.php'); ?>
  </div>
</div>

<div class="wrap clearfix" id="globalwrap">
	
	<div class="logo-wrap">
		<a href="<?php bloginfo( 'url' ); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/logo2.jpg" alt="NY City News Service" id="logo" /></a>
	</div>

	<div id="partner-sites">
		<a href="http://219mag.com/"><img src="<?php bloginfo('template_directory'); ?>/img/sites/219-logo-thumb.jpg" alt="219 Magazine" /></a>
		<a href="http://motthavenherald.com/"><img src="<?php bloginfo('template_directory'); ?>/img/sites/mott-logo-thumb.jpg" alt="Mott Haven Herald" /></a>
		<a href="http://fort-greene.thelocal.nytimes.com/"><img src="<?php bloginfo('template_directory'); ?>/img/sites/nyt-local-thumb.jpg" alt="The Local" /></a>
		<a href="http://isnapny.com/"><img src="<?php bloginfo('template_directory'); ?>/img/sites/isnap-logo-thumb.jpg" alt="ISnapNY Photoblog" /></a>
		<a href="http://219tvmagazine.journalism.cuny.edu/"><img src="<?php bloginfo('template_directory'); ?>/img/sites/219-west-logo.jpg" alt="219 West" /></a>
	</div><!-- END #partner-sites -->
	
</div>

<div id="primary-navigation-wrap" class="wrap">
	<ul id="primary-navigation" class="navigation inline-navigation">
		<li class="navigation-topics primary-item"><a href="#">Topics</a>
			<ul class="sub-navigation">
				<li><a href="<?php bloginfo( 'url' ); ?>/topics/arts-culture/">Arts &amp; Culture</a></li>
				<li><a href="<?php bloginfo( 'url' ); ?>/topics/business/">Business</a></li>
				<li><a href="<?php bloginfo( 'url' ); ?>/topics/education/">Education</a></li>
				<li><a href="<?php bloginfo( 'url' ); ?>/topics/environment/">Environment</a></li>
				<li><a href="<?php bloginfo( 'url' ); ?>/topics/food/">Food</a></li>
				<li><a href="<?php bloginfo( 'url' ); ?>/topics/health/">Health</a></li>
				<li><a href="<?php bloginfo( 'url' ); ?>/topics/housing/">Health</a></li>
				<li><a href="<?php bloginfo( 'url' ); ?>/topics/i-team/">I-Team</a></li>
				<li><a href="<?php bloginfo( 'url' ); ?>/topics/transportation/">Transportation</a></li>				
			</ul>
		</li>
		<li class="navigation-places primary-item"><a href="#">Places</a>
			<ul class="sub-navigation">
				<li><a href="<?php bloginfo( 'url' ); ?>/places/bronx/">Bronx</a></li>
				<li><a href="<?php bloginfo( 'url' ); ?>/places/brooklyn/">Brooklyn</a></li>
				<li><a href="<?php bloginfo( 'url' ); ?>/places/brooklyn/">Queens</a></li>
				<li><a href="<?php bloginfo( 'url' ); ?>/places/manhattan/">Manhattan</a></li>
				<li><a href="<?php bloginfo( 'url' ); ?>/places/staten-island/">Staten Island</a></li>
				<li><a href="<?php bloginfo( 'url' ); ?>/places/beyond-new-york/">Beyond New York</a></li>			
			</ul>
		</li>
		<li class="navigation-media primary-item"><a href="#">Media</a>
			<?php
				$args = array(
					'orderby' => 'name',
				);
				$media_terms = get_terms( 'nycns_media', $args );
			
			?>
			<ul class="sub-navigation">
				<?php foreach ( $media_terms as $media_term ): ?>
					<li><a href="<?php bloginfo( 'url' ); ?>/media/<?php echo $media_term->slug; ?>/"><?php echo $media_term->name; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</li>
		<li class="navigation-special-projects primary-item"><a href="<?php bloginfo( 'url' ); ?>/special-projects/">Special Projects</a>
			<ul class="sub-navigation">
				<li><a href="<?php bloginfo( 'url' ); ?>/special-projects/election-2010/">NYCity Snapshot: Issues and Impact of Election 2010</a></li>
				<li><a href="<?php bloginfo( 'url' ); ?>/special-projects/cmj-2010/">CMJ 2010: Time to Face the Music</a></li>
				<li><a href="http://industrynyc.journalism.cuny.edu/">Industry NYC</a></li>
				<li><a href="http://homelesswithhomework.journalism.cuny.edu/">Homeless With Homework</a></li>
				<li><a href="http://2010stimulus.org/">State Of The Stimulus: NYC</a></li>								
			</ul>
		</li>
		<li class="navigation-staff float-right secondary-item"><a href="<?php bloginfo( 'url' ); ?>/staff/">Staff</a></li>		
		<li class="navigation-about float-right secondary-item"><a href="<?php bloginfo( 'url' ); ?>/about/">About</a></li>	
	</ul>
</div><!-- END #primary-navigation-wrap -->

