// delete modal
const openDeleteAccountModal = e => {
  e.preventDefault()
  $(".delete-account-modal").addClass("delete-account-modal--visible")
}
const closeDeleteAccountModal = e => {
  $(".delete-account-modal").removeClass("delete-account-modal--visible")
  console.log("closeDeleteAccountModal")
}

$(".delete-account").on("click", openDeleteAccountModal)
$(".delete-account-modal-overlay").on("click", closeDeleteAccountModal)
$(".confirm-deletion").on("click", closeDeleteAccountModal)
$(".keep-account").on("click", closeDeleteAccountModal)