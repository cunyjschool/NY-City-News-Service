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

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<?php if (is_category('election2008')): ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/election.css" type="text/css">	
<?php endif; ?>

<?php if (is_category(2307)): ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/queens.css" type="text/css">
<?php endif; ?>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico" />

<?php /* <script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAT2bDbwEKVzCFUBFEpSN_QBQm8H9qC3jB5bWWopYgeCkZ0FTgHRQY_bvprvoRIw3Rv54Tpws22l4RPg&sensor=false" type="text/javascript"></script> */ ?>

<?php wp_head(); ?>
</head>

<body>

<div class="clearfix" id="jlogo">
  <div style="float: left; width: 500px;">
A student-powered service at the <a href="http://www.journalism.cuny.edu">CUNY Graduate School of Journalism</a>
  </div>
  
  <div id="search">
<?php include (TEMPLATEPATH . '/searchform.php'); ?>
  </div>
</div>

<div class="wrap clearfix" id="globalwrap">
  <div style="float: left; width: 476px;">
<a href="/"><img src="<?php bloginfo('template_directory'); ?>/img/logo2.jpg" alt="NY City News Service" id="logo" /></a>
  </div>
  
  <div id="partner-sites">
<a href="http://219mag.com/"><img src="<?php bloginfo('template_directory'); ?>/img/sites/219-logo-thumb.jpg" alt="219 Magazine" /></a>
<a href="http://motthavenherald.com/"><img src="<?php bloginfo('template_directory'); ?>/img/sites/mott-logo-thumb.jpg" alt="Mott Haven Herald" /></a>
<a href="http://fort-greene.thelocal.nytimes.com/"><img src="<?php bloginfo('template_directory'); ?>/img/sites/nyt-local-thumb.jpg" alt="The Local" /></a>
<a href="http://isnapny.com/"><img src="<?php bloginfo('template_directory'); ?>/img/sites/isnap-logo-thumb.jpg" alt="ISnapNY Photoblog" /></a>
<a href="http://cuny.tv/series/219west/listen.lasso?year=2009"><img src="<?php bloginfo('template_directory'); ?>/img/sites/219-west-logo.jpg" alt="219 West" /></a>
  </div>
</div>

<div id="nav">
  <div class="clearfix" id="navwrap">
<ul>
  <li id="homenav"><a href="<?php bloginfo('url'); ?>/">Front Page</a></li>
  <li id="bronxnav"><a href="<?php bloginfo('url'); ?>/category/bronx/">Bronx</a></li>
  <li id="brooklynnav"><a href="<?php bloginfo('url'); ?>/category/brooklyn/">Brooklyn</a></li>
  <li id="manhattannav"><a href="<?php bloginfo('url'); ?>/category/manhattan/">Manhattan</a></li>
  <li id="queensnav"><a href="<?php bloginfo('url'); ?>/category/queens/">Queens</a></li>
  <li id="statenislandnav"><a href="<?php bloginfo('url'); ?>/category/staten-island/">Staten Island</a></li>
  <li id="specialprojects"><a href="<?php bloginfo('url'); ?>/special-projects/">Special Projects</a></li>
  <li id="podcastnav"><a href="<?php bloginfo('url'); ?>/category/audio/">Audio</a></li>
  <li id="mapnav"><a href="<?php bloginfo('url'); ?>/news-map/">News Map</a></li>
  <li id="aboutnav"><a href="<?php bloginfo('url'); ?>/about/">About</a></li>
  <li id="staffnav"><a href="<?php bloginfo('url'); ?>/staff/">Staff</a></li>
  <li id="rssnav"><a href="<?php bloginfo('url'); ?>/rss-feeds/" style="background: #f28719; no-repeat bottom left;">RSS Feeds</a></li>
</ul>
  </div>
</div>

 

