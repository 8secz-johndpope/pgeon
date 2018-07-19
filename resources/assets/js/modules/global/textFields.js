
export default () => {

  setTimeout(() => {
    $("input.pgn__input").val("")
    $("input.pgn__input").prop("disabled", false)
  }, 50)

  $("input.pgn__input").on("blur", function() {
    var $tmpval = $(this).val()
    if ($tmpval.trim().length == 0) {
      $(this)
        .parent(".pgn-textfield")
        .addClass("empty")
      $(this)
        .parent(".pgn-textfield")
        .removeClass("is_dirty")
    } else {
      $(this)
        .parent(".pgn-textfield")
        .addClass("is_dirty")
      $(this)
        .parent(".pgn-textfield")
        .removeClass("empty")
    }
  })

}
