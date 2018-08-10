
const activateOverlappingImagesModal = () => {
  $(".double-avatar").addClass("double-avatar--active")
}

const deactivateOverlappingImagesModal = () => {
  $(".double-avatar").removeClass("double-avatar--active")
}

$(function () {
  $(".response-images").on("click", activateOverlappingImagesModal)
  $(".double-avatar__overlay").on("click", deactivateOverlappingImagesModal)
})
