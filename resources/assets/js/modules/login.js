// import {validate} from "isemail"

// import {handleEmailInput, isPasswordValid} from "./global/forms"
// const $fpForm = jQuery("#forgot_password_form")

// function forgotPasswordMessage(m) {
//   $fpForm.find(".pgn-textfield").addClass("pgn-textfield-error")
//   $fpForm.find(".pgn-textfield-errorMessage").text(m)
// }

// const handleForgotPasswordSubmit = (e) => {
//   e.preventDefault()
//   let email = $("#forgot_password_email").val() || ""
//   // email is missing
//   if (email.trim().length === 0) {
//     forgotPasswordMessage("Email is missing.")
//     return
//   }
//   if (!validate(email)) {
//     forgotPasswordMessage("Email is not valid.")
//     return
//   }

//   if (email.toLowerCase() == "russ@pgeon.com") {
//     window.location.href = "/login/forgotPassword/confirm"
//   } else {
//     forgotPasswordMessage("Email address not registered.")
//   }
// }

// const handleLoginSubmit = (e) => {
//   const $passContainer = jQuery("#login_password").parent()
//   let pass = $passContainer.find("input").val() || ""
//   let email = $("#login_email").val() || ""
//   const isPassEmpty = pass.length > 0
//   const isEmailValid = validate(email)

//   if (!isPassEmpty) {
//     e.preventDefault()
//     $passContainer.addClass("pgn-textfield-error")
//     $passContainer.find(".pgn-textfield-errorMessage").text("Password missing.")
//   }

//   if (!isEmailValid) {
//     $("[data-error=email]")
//       .parent()
//       .addClass("pgn-textfield-error")
//     $("[data-error=email]").text(`Invalid email address.`)
//   }

//   if (!(email.toLowerCase() === "russ@pgeon.com" && pass === "secret123")) {
//     e.preventDefault()
//     $passContainer.addClass("pgn-textfield-error")
//     $passContainer.find(".pgn-textfield-errorMessage").text("Incorrect Password.")
//   }
// }

// const removeError = (e) => {
//   $(e.target)
//     .parent()
//     .removeClass("pgn-textfield-error")
// }

// const handleValidatePassword = (e) => {
//   console.log("Here")
//   const $passContainer = jQuery("#login_password").parent()
//   let pass = $passContainer.find("input").val() || ""
//   console.log("pass", pass)
//   const isPassValid = isPasswordValid(pass)
//   console.log("ispassvalid", isPassValid)

//   if (!isPassValid) {
//     e.preventDefault()
//     $passContainer.addClass("pgn-textfield-error")
//     $passContainer.find(".pgn-textfield-errorMessage").text("Password Invalid.")
//   }
// }

export default () => {
  // //- TODO this needs serious refactoring.
  // jQuery("#login_email").on("focusout", (e) => e.target.value !== "" && handleEmailInput(e))
  // jQuery("#login_password").on("focusout", (e) => e.target.value !== "" && handleValidatePassword(e))
  // // jQuery("#forgotPassword_email").on("focusout", handleEmailInput)
  // jQuery("#login__form").on("submit", handleLoginSubmit)
  // jQuery("#forgot_password_form").on("submit", handleForgotPasswordSubmit)

  // jQuery("#forgot_password_email").on("focusout", handleForgotPasswordSubmit)
  // jQuery("#login_password, #login_email, #forgot_password_email").on("focus", removeError)
  // // todo: might not been needed.
  // // jQuery("#login_password, #login_email",).on("input", removeError)
}
