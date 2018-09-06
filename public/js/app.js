var table = $('#mainJobTable').DataTable({
	"ajax":{
		"url": "api/unarchived_jobs",
		"dataSrc" : ""
 	}, 
 	"responsive":"true",
	"columns": [
		{"data": 'id'},
		{"data": 'status'},
		{"data": 'customer.name'},
		{"data": 'customer.phone_number'},
		{"data": 'customer.email'},
		{"data": 'address.area'},
		{"data": 'address.address'}
	]
});

$('#mainJobTable tbody').on('click', 'td:not(:first-child)', function() {
	$('#editJobModal').modal();
	$('.editHeader').empty();
	var data = table.row($(this).parents('tr')).data();
	$.getJSON("api/get_job?id=" + data.id , function(data){
		$.each(data, function(key, val){
			$('.editHeader').append('EDIT JOB ' + val.id);
			$('#custNameEdit').val(val.customer.name);
			$('#custEmailEdit').val(val.customer.email);
			$('#custPhoneEdit').val(val.customer.phone_number);
			$('#jobSuburbEdit').val(val.address.area);
			$('#jobAddressEdit').val(val.address.address);
			$('#jobStatusEdit').val(val.status);
			$('#roofTypeEdit').val(val.roof_type);
			$('#jobTypeEdit').val(val.job_type);
			$('#jobAreaEdit').val(val.job_area);
			$('#jobPriceEdit').val(val.price);
			$('#jobDescriptionEdit').val(val.notes);
		});
	});
});






