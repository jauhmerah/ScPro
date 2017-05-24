function priceRate() {
	bootbox.dialog({
		message : $("#priceRate").html()
	});
}
function addBtn() {
	$('#addBtn').attr('disabled', 'disabled');
}
$(document).ready(function() {
	$('#flavDiv').on('change', '#flav', function() {
		if ($(this).val() != -1) {
			$('#addBtn').removeProp('disabled');
		}else{
			addBtn();
		}			
	});
	$('#cat').change(function() {
        m = $(this).val();
        $.when($('#loading').removeProp('hidden')).then(function(){
            $.post(urlsite+'getAjaxFlavor', {m : m}, function(data) {
                $.when($('#flavDiv').html(data)).then(function(){
                    $('#loading').attr('hidden', 'hidden');
                    addBtn();
                });                    
            });
        });
    });
	$('#addBtn').click(function() {
		var id = $('#flavDiv').children('#flav').val();
		$.post(urlsite+'getAjaxItem', {id : id}, function(data) {
			$.when($('#loading').removeProp('hidden')).then(function(){
				$.when($('#orderList').append(data)).then(function(){
					$('#loading').attr('hidden', 'hidden');
				});				
			});			
		});
	});
});
