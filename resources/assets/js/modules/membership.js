const cardContainer = $(".payment-card-container")
const redeemCodeContainer = $(".redeem-code-container")
const paymentContainer = $(".payment-container")

$(function () {

  $("[name=payment-method]").on("change", (e) => {
    let $target = $(e.target)
    $target.prop("checked")
      ? $target
          .parents(".payment-method-body")
          .next()
          .show()
      : $target
          .parents(".payment-method-body")
          .next()
          .hide()
    // paymentContainer.css("display", "none")
    // let id = e.target.id
    // if (id == "payment-method-card") {
    //   cardContainer.css("display", "block")
    // } else if (id == "payment-method-gift") {
    //   redeemCodeContainer.css("display", "block")
    // }
  })
  
})


//  handle add your card button click
$(".payment-card-btn").on("click", function(e) {
  this.classList.add("btn-loading--active")
  this.setAttribute("disabled", true)
  setTimeout(() => {
    showNotification("Card Details Added")
    this.removeAttribute("disabled")
    this.classList.remove("btn-loading--active")
  }, 1000)
})

$(".redeem-code-btn").on("click", function(e) {
  this.classList.add("btn-loading--active")
  this.setAttribute("disabled", true)
  setTimeout(() => {
    showNotification("Code has been redeemed idk??")
    this.removeAttribute("disabled")
    this.classList.remove("btn-loading--active")
  }, 1000)
})

function showNotification(msg) {
  let notifInner = `<span>${msg}</span>`
  let notif = document.createElement("div")
  notif.classList = "notification notification--success"
  notif.innerHTML = notifInner
  document.body.appendChild(notif)
  setTimeout(() => notif.classList.add("notification--add"), 0)
  setTimeout(() => {
    notif.classList.remove("notification--add")
    setTimeout(() => {
      notif.parentElement.removeChild(notif)
      // 300 is roughly the same as the transition duration.
    }, 300)
  }, 3000)
}

const showEditModal = () => {
  $(".edit-card-modal").addClass("edit-card-modal--show")
  fillCardNumbers(cardNumber)
}
const hideEditModal = () => {
  $(".edit-card-modal").removeClass("edit-card-modal--show")
}

// handle edit card modal.
$(".payment-edit-visa").on("click", showEditModal)
$(".edit-card-modal .modal-overlay").on("click", hideEditModal)
$(".edit-card-cancel").on("click", hideEditModal)
$(".edit-card-save").on("click", hideEditModal)

// ●●●
const cardNumber = "0404"
const fillCardNumbers = (numbers) => {
  // not sure how we'll be getting the numbers from the server.
  document.querySelector(".edit-visa-card__numbers").textContent = `●●●● ●●●● ●●●● ${numbers}`
}
