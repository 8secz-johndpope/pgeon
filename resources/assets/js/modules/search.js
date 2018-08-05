// $(".search-item").on("click", (e) => {
//   $(".search-input").val(e.target.innerText)
// })

// $(".search-header > button").on("click", e => {
//   $(".search-input").val("")
// })

$(function () {

  $(".follow").click(function () {
    //
    var button = $(this) 
    $.post( "/follow", {user_id: $(this).attr('rel'), _token : $('meta[name="csrf-token"]').attr('content')}, function( data ) {
      $(button).parent().find(".unfollow").removeClass('dn')
  
      $(button).parent().find(".follow").addClass('dn')
  
      });
  })
   
  
  $(".unfollow").click(function () {
  //
  var button = $(this) 
  $.post( "/unfollow", {user_id: $(this).attr('rel'), _token : $('meta[name="csrf-token"]').attr('content')}, function( data ) {
  
    $(button).parent().find(".unfollow").addClass('dn')
    $(button).parent().find(".follow").removeClass('dn')
  
    });
  })

  
})

