$(function () {
 
    $(".follow").click(function () {
    		//
    		var button = $(this) 
    		$.post( "/follow", {user_id: $(this).attr('rel'), _token : $('meta[name="csrf-token"]').attr('content')}, function( data ) {
   			
    			button.remove()
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