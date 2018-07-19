$(".slide-menu__trigger").on("click", () => {
  // const scrollBar = $("body")
  //   .height() > $(window ).height()

  $("body").css("overflow", "hidden")
  // $(".slide-menu__outer")
  //   .css("overflow", scrollBar ? "scroll" : "hidden")
  $("body").addClass("slide-menu--active")
})

$(".slide-menu__close").on("click", () => {
  $("body").css("overflow", "auto")
  $("body").removeClass("slide-menu--active")

  // $(".slide-menu__outer").css("overflow", "auto")
})

$(".delete-account").on("click", e => {
  e.preventDefault()
})

const editSlug = () => {
  $(".edit-icon").addClass("edit-icon--active")
  $(".user-slug-input").attr("disabled", false).focus()
}
$(".user-slug-input").on("focus", e => {
  const val = e.target.value
  e.target.value = ""
  e.target.value = val
})

const doneEditingSlug = () => {
  $(".edit-icon").removeClass("edit-icon--active")
  $(".user-slug-input").attr("disabled", true)
}

$(".edit-icon > .edit-icon-pencil").on("click", editSlug )
$(".user-slug-input").on("blur", doneEditingSlug )
$(".edit-icon > .edit-icon-times").on("click", doneEditingSlug)




// select image modal
const openSelectImageModal = () => {
  $(".select-image").addClass("select-image--visible")
}
const closeSelectImageModal = () => {
  $(".select-image").removeClass("select-image--visible")
}

$(".profile-prefiew__change-avatar").on("click", openSelectImageModal)
$(".select-image__overlay").on("click", closeSelectImageModal)
$(".select-image__header svg").on("click", closeSelectImageModal)



