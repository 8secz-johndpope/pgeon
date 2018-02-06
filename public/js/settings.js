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