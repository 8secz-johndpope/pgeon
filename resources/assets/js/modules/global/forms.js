import {validate} from "isemail"

import textFields from "./textFields"
import login from "../login"
import signup from "../signup"
import slCommon from "../login+signup"

export const isPasswordValid = (p) => p && p.length >= 6

export const handleEmailInput = (e) => {
  // if(e.target.value === "") return
  const isValid = validate(e.target.value)
  const $tv = jQuery(e.target).parents(".pgn-textfield")
  if (!isValid) {
    $tv.find(".pgn-textfield-errorMessage").text("Invalid email address.")
    $tv.addClass("pgn-textfield-error")
  } else {
    $tv.removeClass("pgn-textfield-error")
  }
}

$(document).ready(function() {
  textFields()
  slCommon()
  login()
  signup()
})
