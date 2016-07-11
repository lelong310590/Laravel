jQuery(document).ready(function($) {
	$('body').on('change', '#checkAllCategory', function() {
		$(".checkCategory").prop('checked', $(this).prop("checked"));
	    if ($(this).is(':checked')) {
	    	$('#deleteAll').attr({
				href: '#deleteAllDialog',
				'data-toggle': 'modal'
			});
	    } else {
	    	$('#deleteAll').attr('href', '#selectEmpty');
	    }
	});

	$('body').on('change', '.checkCategory', function() {
		if ($('.checkCategory').is(':checked')) {
			$('#deleteAll').attr({
				href: '#deleteAllDialog',
				'data-toggle': 'modal'
			});
		}else {
			$('#deleteAll').attr('href', '#selectEmpty');
		}
	});
});