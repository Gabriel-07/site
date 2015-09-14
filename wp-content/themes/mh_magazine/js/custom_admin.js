jQuery(document).ready(function($){
	
	/***** Simply Countable plugin - character counter for any text input or textarea *****/
	
	$('#mh-seo-title').simplyCountable({
		counter: '#counter-1',
		maxCount: 70
	});	
	$('#mh-meta-desc').simplyCountable({
		counter: '#counter-2',
		maxCount: 160
	});
	
});