$(document).ready(function() {
	$("#cat").change(function() {
		$.post('', {param1: 'value1'}, function(data, textStatus, xhr) {
			/*optional stuff to do after success */
		});
	});
});

function priceRate() {
	bootbox.dialog({
		message : $("#priceRate").html()
	});
}