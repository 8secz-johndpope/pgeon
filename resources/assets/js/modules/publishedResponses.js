// publishedResponses



// response details bubble meta display on click.
$(".response-details-bubble").on("click", (e) => {
  console.log("here")
  $(e.currentTarget).find(".open-question__meta").toggle("hidden")
})