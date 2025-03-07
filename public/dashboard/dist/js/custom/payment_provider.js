$(document).on('change', '.checking', function () {
    var id   = $(this).attr('data-id');
    $.ajax({
        url: "/admin/payment/providers/change-status/" + id,
        success: function(result){
            console.log('Success!')
        }});
})
$(document).on('change', '.checkingMode', function () {
    var id   = $(this).attr('data-id');
    $.ajax({
        url: "/admin/payment/providers/change-mode/" + id,
        success: function(result){
            console.log('Success!')
        }});
})
