var i = 1;
$(document).on('click', '.add-todo', function (e) {
    e.preventDefault()
    var todoInputData = $(this).siblings('input').val();
    var todoListData = `
              <div class="row-parent">
              <div class="list-row d-flex align-items-center form-group">
              <div class="list-num">`+i+`.</div>
              <input value="`+ todoInputData +`" type="text" name="names[]" class="form-control" placeholder="Enter name">
              <div class="remove-todo">&#x2715;</div>
              </div>
              <div class="list-error"></div></div>
            `;
    if ($.trim(todoInputData) == '') {
        $(this).parents('.card-body').find('.error').text('You must enter something!');
    } else {
        $(this).parents('.card-body').find('.todo-list').append(todoListData);
        i++
        $(this).parents('.card-body').find('.error').empty();
    }
    $(this).siblings('input').val('')
});
// add on pressing Enter key
$(document).keydown(function (event) {
    if (event.which == 13) {
        event.preventDefault();
        $('.add-todo').click();

    }
});
// remove
$(document).on('click', '.remove-todo', function () {
    $(this).parent('.list-row').remove();
})
// catch change
$(document).on('input', 'input[name^="names"]', function () {
    if(!$(this).val()){
        $(this).parent('.list-row').remove();
    }

})

$(document).on('change', '.checking', function () {
    var id   = $(this).attr('data-id');
    $.ajax({
        url: "/admin/attribute-groups/change-status/" + id,
        success: function(result){
            console.log('Success!')
        }});
})


