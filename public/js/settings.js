$(function () {
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
					

						$('.item-img').on('change', function () { readURL(this) });
				// End upload preview image