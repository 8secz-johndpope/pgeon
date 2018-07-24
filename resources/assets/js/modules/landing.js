import { log } from "util";

const openDropdown = () => {
  const $header = jQuery(".landing_header")
  $header.addClass("dropdown--active")
}

const closeDropdown = () => {
  const $header = jQuery(".landing_header")
  $header.removeClass("dropdown--active")
}



const showPremiumModal = (e) => {
  e.preventDefault()
  closeDropdown()
  jQuery(".upgrade-modal").addClass("upgrade-modal--visible")
}

const hidePremiumModal = () => {
  jQuery(".upgrade-modal").removeClass("upgrade-modal--visible")
}





jQuery( function()  {
  jQuery(".openQuestion__title").on("click", e => {
    
    const $header = jQuery(".landing_header")
    const open = $header.hasClass("dropdown--active")
    open ? closeDropdown() : openDropdown()
  })
  
  jQuery("#overlay").on("click", closeDropdown)

  jQuery(".myQuestion-premium-button").on("click", showPremiumModal)
  jQuery(".upgrade-modal .modal-overlay").on("click", hidePremiumModal)

})






