$(document).ready(function() {
	$('#estates').change(function(){
		var estate_id = $(this).val();
		$('.cities_form_div').hide();
		$.ajax({
			type: 'POST',
			url: '/ajax/execute/get_cities/',
			data:"estate="+estate_id,
			success: function(data) {
				$('.cities_form_div').show();
				$('.cities_form').html(data);
			}
		});		
	});

	$('.mini-delete').click(function(){
		var action = $(this).attr('action');
		var actionid = $(this).attr('actionid');

		$.ajax({
			type: 'POST',
			url: '/ajax/execute/drop_venue_gallery_image',
			data:"action="+action+"&actionid="+actionid,
			success: function(data){
				$('#'+actionid).fadeOut();
			}
		});
	});
});

function getEvents(id) {
	$.ajax({
		type: 'POST',
		url: '/ajax/execute/get_events_user/',
		data:"id="+id,
		success: function(data) {
			$('#events').html(data);
		}
	});		
}