jQuery(document).ready(function() {

	/**
	 * If a user clicks on a mug shot, load the content for that mugshot in an overlay
	 */
	jQuery('li.mug-shot-link').click(function() {
		if ( jQuery(this).hasClass('active') ) {
			jQuery(this).removeClass('active');
		} else {
			jQuery('li.mug-shot-link').removeClass('active');
			jQuery(this).addClass('active');
			var media_content = jQuery(this).find('.content-single').html();
			jQuery('#content-single-zone').empty().html(media_content);
			jQuery('#content-single-zone').show();
		}
		
		jQuery('#content-single-zone a.back').click(function() {
			jQuery('li.mug-shot-link').removeClass('active');			
			jQuery('#content-single-zone').hide();		
			return false;
		});
		
		return false;		
	});
	
	/**
	 * If a user clicks on a filter, then add the 'active-filter' class to all of the
	 * mug shots with the same value and 'hidden-filter' class to all of the mugshots
	 * without
	 */
	jQuery('dd.filters-list a.filter').click(function() {
		jQuery('dd.filters-list a.filter').removeClass('active');
		jQuery(this).addClass('active');
		var filter = jQuery(this).attr('id');
		jQuery('li.mug-shot-link').removeClass('active-filter');
		jQuery('li.mug-shot-link').removeClass('hidden-filter');
		jQuery('li.mug-shot-link').removeClass('active');			
		jQuery('#content-single-zone').hide();
		jQuery('li.mug-shot-link').each(function(index) {
			if ( jQuery(this).hasClass(filter) ) {
				jQuery(this).addClass('active-filter');
			} else {
				jQuery(this).addClass('hidden-filter');
			}
		});
		return false;
	});
	
	/**
	 * Reset all filters
	 */
	jQuery('dd.filters-list a.reset-filters').click(function() {
		jQuery('dd.filters-list a.filter').removeClass('active');
		jQuery('li.mug-shot-link').removeClass('active');			
		jQuery('#content-single-zone').hide();
		jQuery('li.mug-shot-link').removeClass('active-filter');
		jQuery('li.mug-shot-link').removeClass('hidden-filter');
		return false;		
	});
	
});