import { handleEmailInput } from "./global/forms"
import { validate } from "isemail"

const handleSignupMailBlur = e => {
  const email = e.target.value
  if(!validate(email)){ return }
  jQuery.ajax({
    type: "POST",
    url: "/api/checkmail",
    data: { email },
    success: () => {
      // could add a green border
      // $(e.target).parents(".pgn-textfield").addClass("pgn-textfield-success")
    },
    error: () => {
      const $tv = jQuery(e.target).parents(".pgn-textfield")
      $tv.addClass("pgn-textfield-error")
      $tv.find(".pgn-textfield-errorMessage").text("Email Already Exists")
    },
    dataType: "json"
  });
}

export default () => {
  $("#signup_email input").on("input", handleEmailInput )
  $("#signup_email").on("focusout", handleSignupMailBlur )
  // $("#signup_password").on("input", validatePassword )
 }