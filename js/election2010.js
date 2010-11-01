jQuery(document).ready(function() {

	jQuery('li.mug-shot-link img').click(function() {
		if ( jQuery(this).parent().hasClass('active') ) {
			jQuery(this).parent().removeClass('active');
		} else {
			jQuery('li.mug-shot-link').removeClass('active');
			jQuery(this).parent().addClass('active');	
			jQuery('#sidebar-election2010 #intro').hide();
			var media_content = jQuery(this).parent().find('.content-single').html();
			jQuery('#sidebar-election2010 #content-single-zone').empty().html(media_content);
			jQuery('#sidebar-election2010 #content-single-zone').show();
		}
		return false;		
	});
	
	
	jQuery('dd.filters-list a.filter').click(function() {
		jQuery('dd.filters-list a.filter').removeClass('active');
		jQuery(this).addClass('active');
		var filter = jQuery(this).attr('id');
		jQuery('li.mug-shot-link').removeClass('active-filter');
		jQuery('li.mug-shot-link').removeClass('hidden-filter');
		jQuery('li.mug-shot-link').each(function(index) {
			if ( jQuery(this).hasClass(filter) ) {
				jQuery(this).addClass('active-filter');
			} else {
				jQuery(this).addClass('hidden-filter');
			}
		});
		return false;
	});
	
	jQuery('dd.filters-list a.reset-filters').click(function() {
		jQuery('dd.filters-list a.filter').removeClass('active');
		jQuery('li.mug-shot-link').removeClass('active-filter');
		jQuery('li.mug-shot-link').removeClass('hidden-filter');
		return false;		
	});
	
});