$(function () {


	$("#copy_to_cb").click(function () {
		var copyText = $("#txt_current_url");
		copyText.select();
		document.execCommand("Copy");
	})


	$("#report_question").click(function () {
		$qid = ""
			//alert('ss')
		$(this).html('Reported')
		$parent = $(this)
		$.post("/reportQ", { _token : $('meta[name="csrf-token"]').attr('content'), qid: $(this).data('qid')}, function () {
			$parent.removeAttr("id")
		})
	})


	$("#q_next").on("click", function () {
		$(".error").addClass('hidden')
		if($("#question-input").val().trim().length < 1 ) {
			return false;
		}
		if($("#question-input").val().indexOf('?')<0) {
			$(".error").removeClass('hidden')
			return false;
		}
		$('#sp_days').text($("#day-select").val());
		$('#sp_hr').text($("#hour-select").val());
		$('#sp_mn').text($("#minute-select").val());

		$("#q_preview_text").text($("#question-input").val())
	})









    //
	  //  $(".display-published").on("click", function (e) {
    //
    //   e.preventDefault()
    //   $(".edit").removeClass("hidden")
    //   $(".published").removeClass("hidden")
    //   $(".pending").addClass("hidden")
    //   $(".display-published").parent().addClass("active");
    //   $(".display-pending").parent().removeClass("active");
    // })
    //
    // $(".display-pending").on("click", function (e) {
    //
    //   e.preventDefault()
    //   $(".edit").addClass("hidden")
    //   $(".pending").removeClass("hidden")
    //   $(".published").addClass("hidden")
    //   $(".display-published").parent().removeClass("active");
    //   $(".display-pending").parent().addClass("active");
    // })
    //


    $(".toggleOverlay").on("change", function() {
      this.checked ?
        $(this).closest(".answer-bubble").addClass("checked") :
        $(this).closest(".answer-bubble").removeClass("checked")

        $(".cancel_edit").addClass("hidden")

        $(".deleteNum").css("display" , "block")
        $(".deleteNum").text(
            $(".deleteNum").text().replace("#" , numberCheckedBoxes() )
        )

      $(".number-checked button").text(
        `delete ${ numberCheckedBoxes() } selected`
      )

      numberCheckedBoxes() == 0 &&
        $(".deleteNum").css("display" , "none") &&
         $(".cancel_edit").removeClass("hidden")
    })


    function numberCheckedBoxes() {

      var num = 0;
      document.querySelectorAll(".toggleOverlay").forEach(checkbox => {
        checkbox.checked && num++
      })
      return num

    }


    $(".number-checked").hide();

    $(".confirm").on("click", () => {
      $(".answer-bubble.checked").addClass("deleted")
      $(".toggleOverlay").attr("checked", false);

      // hide delete items again
      $(".number-checked").hide();

      // if there is no answers display "..."
      setTimeout(() => {
        if ($(".answer-bubble:not(.deleted)").length === 0) {
          $(".answer-bubbles-container").html(`
          <p> You don’t have anything published </p>
          `)
        }
      }, 550)
    })

    $(".media-response").click(checkToggleOverlay )
    $(".media-question").click(checkToggleOverlay )

    function checkToggleOverlay(){
        $(".toggleOverlay").trigger("click");
    }

    $(".closest-overlay").click(function(e){
        if(e.target.id == "overlay"){
            checkToggleOverlay()
        }
    })




     $(".edit").on("click", function () {
    	 	$(".custom-checkbox").removeClass("hidden")
    	 	$(this).addClass('hidden') && $(".cancel_edit").removeClass("hidden")
     })

      $(".cancel_edit").on("click", function () {
    	  	$(".custom-checkbox").addClass("hidden") && $(this).addClass('hidden') && $(".edit").removeClass("hidden")
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

			    		setTimeout(function(){ location.href = "/published"; }, 1000);
			    },
			    error: function(request,msg,error) {
			        // handle failure
			    }
			});



	    	 }
     })



    /*

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
     */



     $(".toggleOverlay").on("change", function() {
       this.checked ?
         $(this).closest(".answer-bubble").addClass("checked") :
         $(this).closest(".answer-bubble").removeClass("checked")

         $(".deleteNum").css("display" , "block")
         $(".deleteNum").text(
        		 `delete ${ numberCheckedBoxes() } selected`
         )

       $(".number-checked button").text(
         `delete ${ numberCheckedBoxes() } selected`
       )

       numberCheckedBoxes() == 0 &&
         $(".deleteNum").css("display" , "none")
     })



     function numberCheckedBoxes() {
    		var num = 0;
       document.querySelectorAll(".toggleOverlay").forEach(checkbox => {
         checkbox.checked && num++

       })

       return num

     }


     $(".number-checked").hide();

     $(".confirm").on("click", () => {
       $(".answer-bubble.checked").addClass("deleted")
       $(".toggleOverlay").attr("checked", false);

       // hide delete items again
       $(".number-checked").hide();

       // if there is no answers display "..."
       setTimeout(() => {
         if ($(".answer-bubble:not(.deleted)").length === 0) {
           $(".answer-bubbles-container").html(`
           <p> You don’t have anything published </p>
           `)
         }
       }, 550)
     })

     $(".goto-qdetail").click(function () {
       location.href=`/question/${$(this).data('id')}`
     })

})



// 
//
//
//     $(".media-response").click(checkToggleOverlay )
//     $(".media-question").click(checkToggleOverlay )
//
//     function checkToggleOverlay(){
//         $(".toggleOverlay").trigger("click");
//     }
//
//     $(".closest-overlay").click(function(e){
//         if(e.target.id == "overlay"){
//             checkToggleOverlay()
//         }
//     })
//
//
// function addResponseFocus(){
//   $(this).addClass("active-response-container")
// }
//
// function removeResponseFocus(){
//   $(this).hasClass("active-response-container") &&
//   $(this).removeClass("active-response-container")
// }
//
// $(".live-response").mousedown( addResponseFocus )
// $(".live-response" ).mouseup( removeResponseFocus )
// $(".live-response" ).mouseleave( removeResponseFocus )
