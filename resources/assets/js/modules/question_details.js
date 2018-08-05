$(function () {
    $(".goto-qdetail").click(function () {
        location.href=`/question/${$(this).data('id')}`
      })
})
