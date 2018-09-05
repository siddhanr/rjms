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
	$('.editHeader').append('EDIT JOB ' + data.id);
});





