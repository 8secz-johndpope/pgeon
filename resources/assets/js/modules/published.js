const publishedEditing = () => {
  $(".live-header").addClass("published-editing")
  $(".live-main").addClass("published-main-editing")
}

const publishedNormal = () => {
  $(".live-header").removeClass("published-editing")
  $(".live-main").removeClass("published-main-editing")
}

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

// select clicked question.
$(".q-bubble-container--clickable").on("click", e => {
  console.log(e.target)
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

const checkShowDelete = () => {
  if( $(".q-bubble-container--checked").length > 0 ){
    $(".published-delete").addClass("published-delete--show")
  } else {
    $(".published-delete").removeClass("published-delete--show")
  }
}


// live-question modal
$(".open-question__stop").on("click", () => {
  $(".landing-main").addClass("confirming-modal--active")
})

$(".confirmation-modal__overlay, .confirmation-modal__cancel, .confirmation-modal__danger ").on("click", () => {
  $(".landing-main").removeClass("confirming-modal--active")
})





