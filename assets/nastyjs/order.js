function priceRate() {
    bootbox.dialog({
        message : $("#priceRate").html()
    });
}
function addBtn() {
    $('#addBtn').attr('disabled', 'disabled');
}
var num = 0;
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
        num++;
        $.post(urlsite+'getAjaxItem', {id : id , num : num}, function(data) {
            $.when($('#loading').removeProp('hidden')).then(function(){
                $.when($('#orderList').append(data)).then(function(){
                    $('#loading').attr('hidden', 'hidden');
                });             
            }); 
        });
    });
    list.on('click', '.delBtn', function() {
        var r = $(this).data('row');
        $('#'+r).remove();
        totalCount();
    });
    
    list.on('change', '.inputQty', function() {    
        totalCount();       
    });
    $('.shipClick').click(function(event) {
        var c = $(this).data('c');
        var id = $(this).data('add_id');
        var trS = $("#add_id").data('tr');
        var 
    });

});

function totalCount(x) {
    var sum = 0;
    var n = 0;
    var price;
    list.find('.inputQty').each(function() {
        n = $(this).val();
        if (n != null && n != '') {
            sum += parseInt(n);
        }
    });    
    if(x !== null ){
        $('#totalQty').html(sum);
    }else{
        return sum;
    }
    var lim = parseInt(100-sum);
    if (lim < 0) {
        text = "<span class = 'font-red'>"+lim+"</span>";
    }else{
        text = lim;
    }
    $("#limit").html(text);
    $.post(urlsite+'getAjaxPriceRate', {qty: sum}, function(data) {
        price = data;
        if (price == "-1" || price == "0.00") {
            //when low 20
            $('#priceTag').html("xx.xx");
            $('#totalPrice').html("xx.xx");
            $('#qtyBar').css('width', sum+'%');
            $('#proceedBtn').attr('disabled', 'disabled');

        }else{
            temp = parseFloat(price)*parseFloat(sum);
            $('#proceedBtn').removeAttr('disabled');
            $('#totalPrice').html(temp);
            $('#priceTag').html(price);
            $('#qtyBar').css('width', sum+'%');
        }
    });    
}
function checkAll(x) {
    var tot = 0;
    list.find('.inputQty').each(function() {
        n = $(this).val();
        if (n != null && n != '') {
            tot += parseInt(n);
        }
    });
    list.find('.inputQty').each(function() {
        n = $(this).val();
        if (n == null || n == ''  || n == 0) {
            ob = $(this);
            $.when($(this).addClass('red')).then(function(){
                setTimeout(function() {
                    ob.removeClass('red');
                }, 1000);
            });
            $(this).focus();
            return false;
        }        
    });
    if (tot > 19) {
        return confirm("Are you sure?");
    }else{
        return false;
    }
}
