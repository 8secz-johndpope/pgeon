
(function ($) {

    $.fn.html5Uploader = function (options) {

        var crlf = '\r\n';
        var boundary = "iloveigloo";
        var dashes = "--";

        var settings = {
            "name": "uploadedFile",
            "postUrl": "Upload.aspx",
            "token": $('meta[name="csrf-token"]').attr('content'),
            "onClientAbort": null,
            "onClientError": null,
            "onClientLoad": null,
            "onClientLoadEnd": null,
            "onClientLoadStart": null,
            "onClientProgress": null,
            "onServerAbort": null,
            "onServerError": null,
            "onServerLoad": null,
            "onServerLoadStart": null,
            "onServerProgress": null,
            "onServerReadyStateChange": null,
            "onSuccess": null
        };

        if (options) {
            $.extend(settings, options);
        }

        return this.each(function (options) {
            var $this = $(this);
            if ($this.is("[type='file']")) {
                $this
                .bind("change", function () {
                    var files = this.files;
                    for (var i = 0; i < files.length; i++) {
                        fileHandler(files[i]);
                    }
                });
            } else {
                $this
                .bind("dragenter dragover", function () {
                    $(this).addClass("hover");
                    return false;
                })
                .bind("dragleave", function () {
                    $(this).removeClass("hover");
                    return false;
                })
                .bind("drop", function (e) {
                    $(this).removeClass("hover");
                    var files = e.originalEvent.dataTransfer.files;
                    for (var i = 0; i < files.length; i++) {
                        fileHandler(files[i]);
                    }
                    return false;
                });
            }
        });

        function fileHandler(file) {
            var fileReader = new FileReader();
            fileReader.onabort = function (e) {
                if (settings.onClientAbort) {
                    settings.onClientAbort(e, file);
                }
            };
            fileReader.onerror = function (e) {
                if (settings.onClientError) {
                    settings.onClientError(e, file);
                }
            };
            fileReader.onload = function (e) {
                if (settings.onClientLoad) {
                    settings.onClientLoad(e, file);
                }
            };
            fileReader.onloadend = function (e) {
                if (settings.onClientLoadEnd) {
                    settings.onClientLoadEnd(e, file);
                }
            };
            fileReader.onloadstart = function (e) {
                if (settings.onClientLoadStart) {
                    settings.onClientLoadStart(e, file);
                }
            };
            fileReader.onprogress = function (e) {
                if (settings.onClientProgress) {
                    settings.onClientProgress(e, file);
                }
            };
            fileReader.readAsDataURL(file);

            var xmlHttpRequest = new XMLHttpRequest();
            xmlHttpRequest.upload.onabort = function (e) {
                if (settings.onServerAbort) {
                    settings.onServerAbort(e, file);
                }
            };
            xmlHttpRequest.upload.onerror = function (e) {
                if (settings.onServerError) {
                    settings.onServerError(e, file);
                }
            };
            xmlHttpRequest.upload.onload = function (e) {
                if (settings.onServerLoad) {
                    settings.onServerLoad(e, file);
                }
            };
            xmlHttpRequest.upload.onloadstart = function (e) {
                if (settings.onServerLoadStart) {
                    settings.onServerLoadStart(e, file);
                }
            };
            xmlHttpRequest.upload.onprogress = function (e) {
                if (settings.onServerProgress) {
                    settings.onServerProgress(e, file);
                }
            };
            xmlHttpRequest.onreadystatechange = function (e) {
                if (settings.onServerReadyStateChange) {
                    settings.onServerReadyStateChange(e, file, xmlHttpRequest.readyState);
                }
                if (settings.onSuccess && xmlHttpRequest.readyState == 4 && xmlHttpRequest.status == 200) {
                    settings.onSuccess(e, file, xmlHttpRequest.responseText);
                }
            };
            xmlHttpRequest.open("POST", settings.postUrl, true);

            if (file.getAsBinary) { // Firefox

                var data = dashes + boundary + crlf +
                    "Content-Disposition: form-data;" +
                    "name=\"" + settings.name + "\";" +
                    "filename=\"" + unescape(encodeURIComponent(file.name)) + "\"" + crlf +
                    "Content-Type: application/octet-stream" + crlf + crlf +
                    file.getAsBinary() + crlf +
                    dashes + boundary + dashes;

                xmlHttpRequest.setRequestHeader("Content-Type", "multipart/form-data;boundary=" + boundary);
                xmlHttpRequest.sendAsBinary(data);

            } else if (window.FormData) { // Chrome

                var formData = new FormData();
                formData.append(settings.name, file);
                formData.append("_token", settings.token);
                xmlHttpRequest.send(formData);

            }
        }

    };

})(jQuery);


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

  $("#file-avatar").html5Uploader({
	  name: "avatar",
	  postUrl: "/profile",
	  onClientLoad: function(e) {
		  $(".alert-success").remove() && $(".pr-loading").removeClass("hidden")  && $(".pr-image").addClass("hidden");
		  src =  e.target.result
		  $(".prof-avatar .vue-avatar--wrapper span").remove()
		  $(".prof-avatar .vue-avatar--wrapper").css('background', 'url(' + src + ') 0% 0% / 30px 30px no-repeat scroll content-box border-box transparent')

	  },onSuccess: function() {
		  $(".pr-loading").addClass("hidden") ;
		  // && $(".pr-image").removeClass("hidden");
		  $(".vue-avatar--wrapper span").remove()
		  $(".vue-avatar--wrapper").css('background', 'url(' + src + ') 0% 0% / 30px 30px no-repeat scroll content-box border-box transparent')
	  //	alert(src)
		  $('#item-img-output').attr('src',src);
		  $(".profile_upload").append('<div class="alert alert-success alert-dismissible">			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Done!</div>')
	  }	
  });


})
