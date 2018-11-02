

const openDeleteAccountModal = e => {
  e.preventDefault()
  $(".delete-account-modal").addClass("delete-account-modal--visible")
}
const closeDeleteAccountModal = e => {
  $(".delete-account-modal").removeClass("delete-account-modal--visible")
  console.log("closeDeleteAccountModal")
}



$(function () {


  $("#save-account").click(function () {
    $("#frm-account").submit()
  })

	$("#save-email").click(function () {
		
		$alert = $("#frmChangeEmail .alert")
		$alert.addClass('hidden').html('')
		$nw_email = $("#nw_email").val()
		$old_email = $("#old_email").val()
		//$c_pwd = $("#c_pwd").val()


		if( $nw_email != $old_email) {
			$("#frmChangeEmail #submit strong").css('color', "#C9CCD4")
			$("#frmChangeEmail #submit").prop('disabled',true)

			var jqxhr = $.post( "/changeemail", {email:$nw_email, _token : $('meta[name="csrf-token"]').attr('content')})
				.done(function(response) {
				  //alert( "second success" );
				  $alert.removeClass('hidden').addClass('alert-success').html(response.message)		
				//  setTimeout(function(){ $('#changeE').modal('hide'); }, 2000);
				  
				})
				.fail(function(response) {
					console.log(response.responseJSON.error);
					$("#frmChangeEmail #submit strong").css('color', "#3fc3ad")
					$("#frmChangeEmail #submit").removeProp('disabled')
					$alert.removeClass('hidden').addClass('alert-danger').html(response.responseJSON.error)
				})
				

		
		}else {
			$alert.removeClass('hidden').addClass('alert-danger').html("Emails don't match")
		}


  })
	


  $(".delete-account").on("click", openDeleteAccountModal)
  $(".delete-account-modal-overlay").on("click", closeDeleteAccountModal)
  $(".keep-account").on("click", closeDeleteAccountModal)



  $("#delete-acc").click(function () {
		
	
		$(".password-error").addClass('hide')
		if($("#acc-passwd").val().length>1) {
			$.ajax({
				url: "/user",
				type: 'DELETE',
				data: {id: $(this).data("id"),password:  $("#acc-passwd").val(),_token : $('meta[name="csrf-token"]').attr('content')},
				success: function(data) {
				//play with data
					if(data.status == 0) {
						vm.exterror('Password did not match','error') 
						
					}else if (data.status == 1) {
						vm.exterror('Account deleted. Redirecting..','error') 
						setTimeout(function(){ window.location.reload() }, 2000);

					}
				}, error:function () {
					vm.exterror('something wrong!','error') 
					//alert('something wrong!')
				}
			});
		}
		
	})


	$("#delete-sso").click(function () {
		
			$.ajax({
				url: "/usersso",
				type: 'DELETE',
				data: {id: $(this).data("id"),_token : $('meta[name="csrf-token"]').attr('content')},
				success: function(data) {
					if (data.status == 1) {
						vm.exterror('Account deleted. Redirecting..','error')
						setTimeout(function(){ window.location.reload() }, 2000);

					}
				}, error:function () {
					vm.exterror('something wrong!','error')
				}
			});
		
  })
	



  var src=""






  $( '#file-avatar' ).change( function () {

	var ns = $("#name_or_slug").val().charAt(0)
	$(".profile-preview__avatar .vue-avatar--wrapper").css('background', 'none')
						$(".profile-preview__avatar .vue-avatar--wrapper").html(`<span>${ns}</span>`)
	


			$('#frm_avatar').submit();



} );

 
 
  
$(".switch-toggle-input").click(function () {
	
	var subscribed = 0;
	subscribed = ($("#news-updates").prop("checked"))?1:0; 
	$.post( "/profile", {subscribed_to_newsletter: subscribed, _token : $('meta[name="csrf-token"]').attr('content')}, function( data ) {
		//alert('ss')
		//button.remove()
	});
	
})






})
