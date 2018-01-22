$(function () {
 
    $(".follow").click(function () {
    		//
    		var button = $(this) 
    		$.post( "/follow", {user_id: $(this).attr('rel'), _token : $('meta[name="csrf-token"]').attr('content')}, function( data ) {
          $(button).parent().find(".unfollow").removeClass('hidden')

          $(button).parent().find(".follow").addClass('hidden')

    			});
    })
       

    $(".unfollow").click(function () {
      //
      var button = $(this) 
      $.post( "/unfollow", {user_id: $(this).attr('rel'), _token : $('meta[name="csrf-token"]').attr('content')}, function( data ) {

        $(button).parent().find(".unfollow").addClass('hidden')
        $(button).parent().find(".follow").removeClass('hidden')

        });
  })


      /*
      unfollow: function (id) {
        //  $.post('unfollow',  )
        var formData = {
          'user_id': id
        }
        this.$http.post('/unfollow', formData).then((response) => {

          $("#follow_" + id).removeClass('hide')
          $("#unfollow_" + id).addClass('hide')
          //alert('ss')
          // success callback
        }, (response) => {
          // error callback
        });



      },
      */
      
})
