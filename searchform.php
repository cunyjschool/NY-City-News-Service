<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
<input type="image" id="button" value="Search" alt="Search" src="<?php bloginfo('stylesheet_directory'); ?>/img/search.png" />
</form>
