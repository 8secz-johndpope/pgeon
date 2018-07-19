$(".search-item").on("click", (e) => {
  $(".search-input").val(e.target.innerText)
})

$(".search-header > button").on("click", e => {
  $(".search-input").val("")
})