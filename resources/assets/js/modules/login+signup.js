export const handlePasswordInput = (e) => {
  const value = e.target.value
  let $tv = jQuery(e.target) .parents(".pgn-textfield")

  value.length > 0 ?
  $tv.find("#show_password").removeClass("dn")
  :
  $tv.find("#show_password").addClass("dn")
}

const togglePasswordShow = function(e , $el){
  let type = $el.attr("type")
  let $span = jQuery(e.target)
  let text = $span.text()
  const to = type === "password" ? "text" : "password"
  $el.attr("type", to )
  $span.text( text.toLowerCase() == "show" ?  "Hide" : "Show" )
}



export default () => {
  // jQuery("#password_showable input").on("input", handlePasswordInput)
  jQuery("#show_password").on("click",
    (e) => togglePasswordShow(e , $("#login_password"))
  )
  jQuery("#login_password").on("input", handlePasswordInput )
}