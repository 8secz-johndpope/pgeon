// publishedResponses



//response details bubble meta display on click.
$(function() {

    $(".response-details-bubble").on("click", (e) => {
        var meta = $(e.currentTarget).find(".open-question__meta")
        if(meta.hasClass('shrunk') || meta.hasClass('shrink')) {
            meta.removeClass("shrunk").removeClass("shrink").addClass("expand")
        }else if(meta.hasClass('expand')) {
            meta.removeClass("expand").addClass("shrink")
        }
    })

    // $(".response-details-bubble").on("click", (e) => {

    //     console.log("here")
    //     $(e.currentTarget).find(".open-question__meta").removeClass("shrunk").addClass("expand")
    //    // $(e.currentTarget).find(".open-question__meta").slideToggle("slow");
    //   })
})
