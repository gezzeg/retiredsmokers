$(function () {
  $('[data-toggle="tooltip"]').tooltip();


$("#symptoms").click(function () {
    $(".checkBoxClass").prop('checked', $(this).prop('checked'));
});

$("#records").click(function () {
    $(".checkBoxClass").prop('checked', $(this).prop('checked'));
});

})


