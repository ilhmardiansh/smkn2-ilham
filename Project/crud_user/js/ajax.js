$(document).ready(function(){	
	
	var dataRecords = $('#recordListing').DataTable({
		"scrollX": true,
		"lengthChange": false,
		"processing":true,
		"serverSide":true,
		'processing': true,
		'serverSide': true,
		stateSave: true,
		// 'serverMethod': 'post',		
		"order":[],
		"ajax":{
			url:"ajax_action.php",
			type:"POST",
			data:{action:'listRecords'},
			dataType:"json"
		},
		"columnDefs":[
			{
				// "targets":[0, 6, 7],
				"orderable":false,
			},
		],
		"pageLength": 10
	});	
	
});