<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<?php if (is_category(220)): ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/election.css" type="text/css">	
<?php endif; ?>

<?php if (is_category(695)): ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/queens.css" type="text/css">
<?php endif; ?>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="icon" href="/favicon.ico" type="image/x-icon">
 

<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAA8p2YRvDm0VzJPo-GKHh1rBRdNiYMfyiyzlOLbu4XACNLPr1dfhSSENqUX1IXWb6cotmNwlu-iFpXGw" type="text/javascript"></script>
<?php wp_head(); ?>
</head>

<body onunload="GUnload()">


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
<a href="http://219mag.com/"><img src="<?php bloginfo('template_directory'); ?>/img/219-logo-thumb.jpg" alt="219 Magazine" /></a>
<a href="http://motthavenherald.com/"><img src="<?php bloginfo('template_directory'); ?>/img/mott-logo-thumb.jpg" alt="Mott Haven Herald" /></a>
<a href="http://fort-greene.thelocal.nytimes.com/"><img src="/wp-content/uploads/2010/02/local-thumb.jpg" alt="The Local" /></a>
<a href="http://isnapny.com/"><img src="<?php bloginfo('template_directory'); ?>/img/isnap-logo-thumb.jpg" alt="ISnapNY Photoblog" /></a>
<a href="http://cuny.tv/series/219west/listen.lasso?year=2009"><img src="<?php bloginfo('template_directory'); ?>/img/219-west-logo.jpg" alt="219 West" /></a>
  </div>
</div>

<div id="nav">
  <div class="clearfix" id="navwrap">
<ul>
  <li id="homenav"><a href="/">Front Page</a></li>
  <li id="bronxnav"><a href="/category/bronx/">Bronx</a></li>
  <li id="brooklynnav"><a href="/category/brooklyn/">Brooklyn</a></li>
  <li id="manhattannav"><a href="/category/manhattan/">Manhattan</a></li>
  <li id="queensnav"><a href="/category/queens/">Queens</a></li>
  <li id="statenislandnav"><a href="/category/staten-island/">Staten Island</a></li>
  <li id="specialprojects"><a href="/special-projects/">Special Projects</a></li>
  <li id="podcastnav"><a href="/category/audio/">Audio</a></li>
  <li id="mapnav"><a href="/news-map/">News Map</a></li>
  <li id="aboutnav"><a href="/about/">About</a></li>
  <li id="staffnav"><a href="/staff/">Staff</a></li>
  <li id="rssnav"><a href="/rss-feeds/" style="background: #f28719; no-repeat bottom left;">RSS Feeds</a></li>
</ul>
  </div>
</div>

 

