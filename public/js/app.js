function reloadCustomerList(){
	$('#customer_list').empty();
	$.getJSON("api/customers", function(data){
	$.each(data, function(key, val){
			var value = val.name + ' id:' + val.id;
			var text = "(" + val.email + ")"
	 		$('#customer_list').append($("<option>").attr({"data-value": val.id, "value": value}).text(text));
		});
	})
}

function reloadSuburbList(){
	$('#suburb_list').empty();
	$.getJSON("api/suburbs", function(data){
		$.each(data, function(key, val){
			$('#suburb_list').append($("<option>").attr({"value": val.area}))
		});
	});
}

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
			$('#jobId').val(val.id);
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


$("#custName").on('input', function(){
	var str = $(this).val();
	var index = str.lastIndexOf("id:");
	if(index != -1){
		var id = str.substring(index + 3);
		$.getJSON('api/customer?id=' + id, function(data){
			$("#custEmail").val(data.email);
			$("#custPhone").val(data.phone_number);
			$("#custName").val(str.substring(0, index));
		});
	}
	else {
		$("#custEmail").val(null);
		$("#custPhone").val(null);
	}
	
});

$('#editJobForm').submit(function(e){
	e.preventDefault();
	$.ajax({
		url:'api/job',
		type:'put',
		data:$('#editJobForm').serialize(),
		success:function(msg, status, jqXHR){
			alert(msg);
			$('#editJobModal').modal('toggle');
			table.ajax.reload();
		}
	})
});

$("#jobSuburb").on('input', function(){
	$("#address_list").empty();
	var suburb = $("#jobSuburb").val();
	$.getJSON('api/address_from_suburb?area=' + suburb, function(data){
		$.each(data, function(key, val){
	 		$('#address_list').append($("<option>").attr({'value': val.address}));
	 		//$('#customer_list').append($("<option>").attr({"data-value": val.id, "value": value}).text(text));
		});
	});
});


$('#addNewJobForm').submit(function(e) {
    e.preventDefault();
    $.ajax({
        url:'api/create_job',
        type:'post',
        data:$('#addNewJobForm').serialize(),
        success:function(msg, status, jqXHR){
        	alert(msg);
        	$('#newJobModal').modal('toggle');
        	$('#addNewJobForm').trigger('reset');
        	reloadCustomerList();
        	reloadSuburbList();
        	table.ajax.reload();
        }
    });
});

reloadCustomerList();
reloadSuburbList();






