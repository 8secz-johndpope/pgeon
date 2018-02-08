$(function () {
	$("#delete-acc").click(function () {
		
		// $.delete( "/user", {id: $(this).data("id"),password:  $("#acc-passwd").val(),_token : $('meta[name="csrf-token"]').attr('content')}, function( data ) {
		// 	//alert('ss')
		// 	//button.remove()
		// });
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
					}
				}, error:function () {
					alert('something wrong!')
				}
			});
		}
		return false;
		
	})
})
$(".slider").click(function () {
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