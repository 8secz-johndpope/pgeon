import { log } from "util";




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
						$(".password-error").removeClass('dn')
					}else if (data.status == 1) {
						$(".password-error").html('Account deleted. Redirecting..').removeClass('dn')
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
	



  var src=""



//   $("#file-avatar").change(function () {


// 	var file = $(this).prop('files')[0]
// 	var fileReader = new FileReader();
 
	
// 	 fileReader.onload = function (e) {
// 		 alert
// 	 	console.log('====================================');
// 		 console.log(file);
// 		 console.log('====================================');

// 	 };
   
//   }) 



  $( '#file-avatar' ).change( function () {
	
	
		var file = $(this).prop('files')[0]; // The file
		var fr = new FileReader(); // FileReader instance
		fr.onload = function (e) {
			// Do stuff on onload, use fr.result for contents of file
			//$( '#file-content' ).append( $( '<div/>' ).html( fr.result ) )
			//alert('dd')

			$(".alert-success").remove() && $(".pr-loading").removeClass("hidden");
					   src =  e.target.result
			 		  $(".prof-avatar .vue-avatar--wrapper span").remove()
					   $(".vue-avatar--wrapper").css('background', 'url(' + src + ') 0% 0% / 80px 80px no-repeat scroll content-box border-box transparent')
					   

		};
		//fr.readAsText( file );
		fr.readAsDataURL( file );

		//   fileReader.readAsDataURL(file);

   var xmlHttpRequest = new XMLHttpRequest();
   xmlHttpRequest.open("POST", "/profile", true);

   xmlHttpRequest.onreadystatechange = function (e) {
};

   if (file.getAsBinary) { // Firefox

	var fname = 'avatar'
		  var data = dashes + boundary + crlf +
			  "Content-Disposition: form-data;" +
			  "name=\"" + fname + "\";" +
			  "filename=\"" + unescape(encodeURIComponent(file.name)) + "\"" + crlf +
			  "Content-Type: application/octet-stream" + crlf + crlf +
			  file.getAsBinary() + crlf +
			  dashes + boundary + dashes;
	
		  xmlHttpRequest.setRequestHeader("Content-Type", "multipart/form-data;boundary=" + boundary);
		  xmlHttpRequest.sendAsBinary(data);
	
	  } else if (window.FormData) { // Chrome
		  var formData = new FormData();

		  formData.append(fname, file);
		  formData.append("_token", $('meta[name="csrf-token"]').attr('content'));
		  xmlHttpRequest.send(formData);
		  	
	  }
} );

 
 
  
$(".switch-toggle-input").click(function () {
	
	var subscribed = 0;
	subscribed = ($("#news-updates").prop("checked"))?1:0; 
	$.post( "/profile", {subscribed_to_newsletter: subscribed, _token : $('meta[name="csrf-token"]').attr('content')}, function( data ) {
		//alert('ss')
		//button.remove()
	});
	
})



//   $("#file-avatar").html5Uploader({
// 	  name: "avatar",
// 	  postUrl: "/profile",
// 	  onClientLoad: function(e) {
// 		  $(".alert-success").remove() && $(".pr-loading").removeClass("hidden")  && $(".pr-image").addClass("hidden");
// 		  src =  e.target.result
// 		  $(".prof-avatar .vue-avatar--wrapper span").remove()
// 		  $(".prof-avatar .vue-avatar--wrapper").css('background', 'url(' + src + ') 0% 0% / 30px 30px no-repeat scroll content-box border-box transparent')

// 	  },onSuccess: function() {
// 		  $(".pr-loading").addClass("hidden") ;
// 		  // && $(".pr-image").removeClass("hidden");
// 		  $(".vue-avatar--wrapper span").remove()
// 		  $(".vue-avatar--wrapper").css('background', 'url(' + src + ') 0% 0% / 30px 30px no-repeat scroll content-box border-box transparent')
// 	  //	alert(src)
// 		  $('#item-img-output').attr('src',src);
// 		  $(".profile_upload").append('<div class="alert alert-success alert-dismissible">			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Done!</div>')
// 	  }	
//   });


})
