$(document).ready(function() {
	$('.shipClick').click(function() {
		$(this).addClass('success');
		var newTd = $(this).data('c');
		var newTr = $(this).prop('id');
		removeSelect();
		$("#"+newTd).html('<span class="font-green"><button class="btn btn-circle btn-xs"><i class="fa fa-check"></i></button></span>');
		$("#add_id").data('tr' , newTr);
		$("#add_id").val($(this).data('add_id'));		
	});
	$("#add_new_address").click(function() {
		$(this).addClass('success');		
		$.when(removeSelect()).then( function(){
			$.post(urlsite+'getAjaxAddShipment', {}, function(data) {
				$("#addAddress").html(data);
				$("#add_id").val('-1');
				$("#add_id").data('tr' , "add_new_address");
			});
		});
	});
});	

function removeSelect(){
	var currentTr = $("#add_id").data('tr');	
	$("#"+currentTr).removeClass('success');
	var currentTd = $("#"+currentTr).data('c');
	$("#"+currentTd).html("");
	$("#addAddress").html("");
}
