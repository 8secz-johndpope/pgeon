$(function () {
 

	$("#question-input").on("input", function () {
		updatecounter($(this), $("#question_counter"), 150)
	})
	$("#question-input").on("paste", function () {
		updatecounter($(this), $("#question_counter"), 150)
	})


	function updatecounter(ele, target, max){
		var len =  ele.val().length

	  len  >= max  && 
	  ele.val(ele.val().substring(0, max))
	  
	  target.text(ele.val().length)
	  
	}
	$("#q_next").on("click", function () {
		$(".error").addClass('hidden')
		if($("#question-input").val().trim().length < 1 ) {
			return false;
		}
		if($("#question-input").val().indexOf('?')<0) {
			$(".error").removeClass('hidden')
			return false;
		}
	})
	
	$("#q_preview").on("click", function () {
		$('#sp_hr').text($("#hour-select").val());
		$('#sp_mn').text($("#minute-select").val());
		
		$("#q_preview_text").text($("#question-input").val())
	})
	
	
	$("#end_now").on("click", function () {
		var att_id = $(this).attr('rel')
		$.post("/end_now/"+att_id, { _token : $('meta[name="csrf-token"]').attr('content')}, function () {

			socket.emit('end_now', att_id);

			setTimeout(function(){ location.reload(); }, 1000);

		})
		
	})
	

	
	$("#cancel_now").on("click", function () {
		var att_id = $(this).attr('rel')
		
		$.ajax({
		    url: '/question/'+att_id,
		    method: 'DELETE',
		    contentType: 'application/json',
		    headers: { 
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	        },
		  //  data: { _token : $('meta[name="csrf-token"]').attr('content') },
		    success: function(result) {
		    		
		    		//notify all the opened window that question is deleted
		    		socket.emit('cancel_now', att_id);
		    		setTimeout(function(){ location.href = "/my-questions"; }, 1000);
		    },
		    error: function(request,msg,error) {
		        // handle failure
		    }
		});
		
	
	})
	
	
	
		$("#delete").on("click", function () {
		var att_id = $(this).attr('rel')
		
		$.ajax({
		    url: '/question/'+att_id,
		    method: 'DELETE',
		    contentType: 'application/json',
		    headers: { 
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	        },
		  //  data: { _token : $('meta[name="csrf-token"]').attr('content') },
		    success: function(result) {
	    		
		    		setTimeout(function(){ location.href = "/my-questions"; }, 1000);
		    },
		    error: function(request,msg,error) {
		        // handle failure
		    }
		});
		
	
	})
	
	
	   $(".display-published").on("click", function (e) {

      e.preventDefault()
      $(".edit").removeClass("hidden")
      $(".published").removeClass("hidden")
      $(".pending").addClass("hidden")
      $(".display-published").parent().addClass("active");
      $(".display-pending").parent().removeClass("active");
    })

    $(".display-pending").on("click", function (e) {

      e.preventDefault()
      $(".edit").addClass("hidden")
      $(".pending").removeClass("hidden")
      $(".published").addClass("hidden")
      $(".display-published").parent().removeClass("active");
      $(".display-pending").parent().addClass("active");
    })
    
    
     $(".edit").on("click", function () {
    	 	$(".custom-checkbox").removeClass("hidden")
    	 	$(this).addClass('hidden')
    	 	$("#done").removeClass("hidden")
     })
     
     $("#done").on("click", function () {
	    	 var str = ""
	    	 var q = [];	 
	    	 $(".toggleOverlay:checked").each(function() {
	             q.push(this.value);
	         });
	    	 if(q.length > 0) {
	    		str = q.join(",")
				
			$.ajax({
			    url: '/delete_questions/'+str,
			    method: 'DELETE',
			    contentType: 'application/json',
			    headers: { 
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
		        },
			  //  data: { _token : $('meta[name="csrf-token"]').attr('content') },
			    success: function(result) {
		    		
			    		setTimeout(function(){ location.href = "/my-questions"; }, 1000);
			    },
			    error: function(request,msg,error) {
			        // handle failure
			    }
			});
				
			
			
	    	 }
     })
     
     
     
     
     
     $(".toggleOverlay").on("change" , function(){
    	    (this.checked) ?
    	        $(this).closest(".answer-bubble").addClass("checked") :
    	        $(this).closest(".answer-bubble").removeClass("checked")

    	        $(".number-checked").show()

    	        $(".number-checked button").text(
    	            `delete ${ numberCheckedBoxes() } selected`
    	        )

    	        numberCheckedBoxes() == 0 &&  $(".number-checked").hide();
    	  })
    	  // run on start up


    	  function numberCheckedBoxes(){
    	    var num = 0 ;

    	    document.querySelectorAll(".toggleOverlay").forEach(checkbox => {
    	        checkbox.checked && num ++
    	    })

    	    return num
    	  }


    	    $(".number-checked").hide();

    	    $(".confirm").on("click" , ()=> {
    	        $(".answer-bubble.checked").addClass("deleted")
    	        $(".toggleOverlay").attr("checked", false);

    	        // hide delete items again
    	        $(".number-checked").hide();

    	        // if there is no answers display "..."
    	        setTimeout(() => {
    	            if( $(".answer-bubble:not(.deleted)").length === 0 ){
    	                $(".answer-bubbles-container").html(`
    	                    <p> You don’t have anything published </p>
    	                `)
    	            }
    	        } ,550)
    	    })
     
	
})
