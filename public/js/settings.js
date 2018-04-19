$(function () {


	$("#frmChangeEmail").submit(function (e) {
		e.preventDefault()
		$alert = $("#frmChangeEmail .alert")
		$alert.addClass('hidden').html('')
		$nw_email = $("#nw_email").val()
		$cf_email = $("#cf_email").val()
		$c_pwd = $("#c_pwd").val()
		

		if( $nw_email == $cf_email) {
			var jqxhr = $.post( "/changeemail", {email:$nw_email, pwd: $c_pwd,_token : $('meta[name="csrf-token"]').attr('content')})
				.done(function(response) {
				  //alert( "second success" );
			  
				  $alert.removeClass('hidden').addClass('alert-success').html(response.message)		
				})
				.fail(function(response) {
					console.log(response.responseJSON.error);
					$alert.removeClass('hidden').addClass('alert-danger').html(response.responseJSON.error)
				})
				

		
		}else {
			$alert.removeClass('hidden').addClass('alert-danger').html("Emails don't match")
		}
		

	})

	var src=""

	$("#file-avatar").html5Uploader({
		name: "avatar",
		postUrl: "/profile",
		onClientLoad: function(e) {
			$(".alert-success").remove() && $(".pr-loading").removeClass("hidden")  && $(".pr-image").addClass("hidden");
			src =  e.target.result
			$(".prof-avatar .vue-avatar--wrapper span").remove()
			$(".prof-avatar .vue-avatar--wrapper").css('background', 'url(' + src + ') 0% 0% / 30px 30px no-repeat scroll content-box border-box transparent')

		},onSuccess: function() {
			$(".pr-loading").addClass("hidden")  && $(".pr-image").removeClass("hidden");
			$(".vue-avatar--wrapper span").remove()
			$(".vue-avatar--wrapper").css('background', 'url(' + src + ') 0% 0% / 30px 30px no-repeat scroll content-box border-box transparent')
		//	alert(src)
			$('#item-img-output').attr('src',src);
			$(".profile_upload").append('<div class="alert alert-success alert-dismissible">			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Done!</div>')
		}	
	});

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
						$(".password-error").removeClass('hide')
					}else if (data.status == 1) {
						$(".password-error").html('Account deleted. Redirecting..').removeClass('hide')
						setTimeout(function(){ window.location.reload() }, 2000);

					}
				}, error:function () {
					alert('something wrong!')
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
						$(".password-error").html('Account deleted. Redirecting..').removeClass('hide')
						setTimeout(function(){ window.location.reload() }, 2000);

					}
				}, error:function () {
					alert('something wrong!')
				}
			});
		
	})
})
$(".switch").click(function () {
	var subscribed = 0;
	subscribed = ($("#chk_nws").prop("checked"))?0:1; 
	
	$.post( "/profile", {subscribed_to_newsletter: subscribed, _token : $('meta[name="csrf-token"]').attr('content')}, function( data ) {
		//alert('ss')
		//button.remove()
	});
	
})


// Start upload preview image
				
//del this
function readURL(input) {
	
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#item-img-output')
				.attr('src', e.target.result);
		};

		reader.readAsDataURL(input.files[0]);
	}
}
					

			//			$('.item-img').on('change', function () { readURL(this) });
				// End upload preview image