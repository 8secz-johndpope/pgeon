const publishedEditing = () => {
  $(".live-header").addClass("published-editing")
  $(".live-main").addClass("published-main-editing")
}

const publishedNormal = () => {
  $(".live-header").removeClass("published-editing")
  $(".live-main").removeClass("published-main-editing")
}


const checkShowDelete = () => {
  if( $(".q-bubble-container--checked").length > 0 ){
    $(".published-delete").addClass("published-delete--show")
  } else {
    $(".published-delete").removeClass("published-delete--show")
  }
}


$(function () {


    $(".published-edit").on("click", publishedEditing )
    $(".published-cancel").on("click", publishedNormal )

    $(".published-select-all").on("click", () => {
      const selected = $(".published-select-all").hasClass("published-select-all--selected")
      if(selected){
        $(".published-select-all").removeClass("published-select-all--selected")
        $(".q-bubble-container").removeClass("q-bubble-container--checked")
      }else {
        $(".published-select-all").addClass("published-select-all--selected")
        $(".q-bubble-container").addClass("q-bubble-container--checked")
      }
      checkShowDelete()
    })

    // handling the deletion modal.
    $(".published-delete").on("click", () => {

      $(".published-main").addClass("confirming-modal--active")
      
      

    })


    $(".confirmation-modal__overlay, .confirmation-modal__cancel, .confirmation-modal__danger ").on("click", () => {

      $(".published-main").removeClass("confirming-modal--active")



    })

    $(".confirmation-modal__danger").on("click", () => {
      //  $(".published-main").removeClass("confirming-modal--active")

        var str = ""
        var q = [];


        $(".q-bubble-container--checked").each(function() {
   //           alert($(this).data('id'))
              q.push($(this).data('id'));
          });
        if(q.length > 0) {
         str = q.join(",")

      $.ajax({
          url: '/delete_questions/'+str,
          method: 'DELETE',
          contentType: 'application/json',
          headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
        //  data: { _token : $('meta[name="csrf-token"]').attr('content') },
          success: function(result) {

              setTimeout(function(){ location.href = "/published"; }, 1000);
          },
          error: function(request,msg,error) {
              // handle failure
          }
      });



        }
    })

    // select clicked question.
    $(".q-bubble-container--clickable").on("click", e => {
      let $el
      if ($(e.target).hasClass("q-bubble-container")){
        $el = $(e.target)
      }else{
        $el = $(e.target).parents(".q-bubble-container")
      }
      if ($el.hasClass("q-bubble-container--checked")){
        $el.removeClass("q-bubble-container--checked")
        $(".published-select-all").removeClass("published-select-all--selected")
      }else{
        $el.addClass("q-bubble-container--checked")
      }
      checkShowDelete()
    })




    // live-question modal
    $(".open-question__stop").on("click", () => {
      $(".landing-main").addClass("confirming-modal--active")
    })

    $(".confirmation-modal__overlay, .confirmation-modal__cancel, .confirmation-modal__danger ").on("click", () => {
      $(".landing-main").removeClass("confirming-modal--active")
    })



})



