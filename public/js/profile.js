 var oldHeader=$(".top-header h4").text()
    var votePointsOldContent=$(".vote-points").html()

    /*
    $(".top-content-item").click(function (e) {

    	  $("#g_back").addClass('hidden');	
    	  $("#profile_back").removeClass('hidden');
    	  

	 
      e.preventDefault()
     
      $answered_by = $(this).attr('data-answered-by')
      $question_by = $(this).attr('data-question-by')
      $q_name = $(".nav-contain h4").html()
      $a_name = $(this).find('h5').html()
      
      fillResponses($answered_by, $question_by, $q_name, $a_name)

      $(".responses-to-display").addClass("show-responses").removeClass("hide")
      $(".back-btn").removeClass("hide");
      var resps=$(this).find(".responses-count").text()
      $(".top-header h4").text(resps)

      $imgSrc=$(this).find("img").attr("src")

      $(".vote-points").html(`
        <img alt="" src="${$imgSrc}" class="avatar avatar-96 photo" height="96" width="96" style=" border-radius: 50%; ">
      `)


    })
    */
    
   /* $(".nav_back").on('click', function (e){
    	alert('ss')
    		return 
    		//alert('s')
    })*/
    

    
      $("#profile_back").on('click', function (e){
 		 e.preventDefault();
 		 $(".r-top-content").removeClass('hide')	
 	      $(".responses-to-display").removeClass("show-responses").addClass("hide")
 	      $(".back-btn").addClass("hide");
 	      $(".top-header h4").text(oldHeader)
 	      $(".vote-points").html(votePointsOldContent)
 	      $(".responses-to-display").html('')
 	     $("#g_back").removeClass('hidden');	
 	      $("#profile_back").addClass('hidden');
 		
	 })
	 

    $(".back-btn").click(function (e) {
    	  $(".r-top-content").removeClass('hide')	
      $(".responses-to-display").removeClass("show-responses").addClass("hide")
      $(".back-btn").addClass("hide");
      $(".top-header h4").text(oldHeader)

      $(".vote-points").html(votePointsOldContent)

      $(".arrow-back").removeClass("hide")
      $(".arrow-forward").removeClass("hide")
      $(".responses-to-display").html('')
    })


    function fillResponses($answered_by, $question_by, $q_name, $a_name) {
	 //change the back functionality once in..	
	
 
      $(".responses-to-display").css("height", $(".top-content-container").height()+"px")
      $(".responses-to-display").css("overflow", "scroll")
      
      $.getJSON(`/fetchconvo/${$answered_by}/${$question_by}`, function(result){
    	  	var responseHtml = ""
          $.each(result, function(i, field){
              
        	  	responseHtml += `<li class="media">
  <div class="media-body">
    <div class="h5 m-b-5">
      <span>  ${($question_by == field.q_by)?$q_name:$a_name}</span>
      <svg class="svg-inline--fa fa-long-arrow-left fa-w-14 text-muted" aria-hidden="true" data-prefix="fa" data-icon="long-arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
        <path fill="currentColor" d="M193.456 357.573L127.882 292H424c13.255 0 24-10.745 24-24v-24c0-13.255-10.745-24-24-24H127.882l65.574-65.573c9.373-9.373 9.373-24.569 0-33.941l-16.971-16.971c-9.373-9.373-24.569-9.373-33.941 0L7.029 239.029c-9.373 9.373-9.373 24.568 0 33.941l135.515 135.515c9.373 9.373 24.569 9.373 33.941 0l16.971-16.971c9.373-9.372 9.373-24.568 0-33.941z"></path>
      </svg>
      <span> ${($answered_by == field.ans_by)?$a_name:$q_name}</span>
      <span class="text-muted time-align">${field.expiring_at}..</span>
    </div>
    <ul class="media-list media-list-conversation c-w-md">
      <li class="media">
        <div class="media-body">
          <div class="media-body-text media-question">
          ${field.question}
          </div>
          <ul class="media-list media-list-conversation c-w-md">
            <li class="media media-current-user media-divider">
              <div class="media-body">
                <div class="media-body-text media-response media-response-margin"  style="cursor: pointer;">
                  ${field.answer}
                </div>
              </div>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</li>`
              
          });
    	    $(".responses-to-display").html(`
    	    	      <ul class="media-list media-list-stream c-w-md" style="margin: 0 auto; max-width: 750px; padding: 15px;">
    	    	        ${ responseHtml}
    	    	      </ul>
    	    	    `)
      });
      
    
    }


    
 
 


    // handle left and right arrows clicks

    $(".most-responded").css("height", $(".top-content-container").height()+"px")
    $(".user-info").css("height", $(".top-content-container").height()+"px")
    $(".top-responders").css("height", $(".top-content-container").height()+"px")


    var tabs=["user-info", "top-responders", "most-responded"]
    var activeIndex=1

   



    function renderuserinfo() {
      $("."+tabs[activeIndex]).removeClass("hide")
      $(".top-header h4").text("profile")
      // user-responded

    }

    function rendertopresponders() {
      $("."+tabs[activeIndex]).removeClass("hide")
      $(".top-header h4").text("responders")
      // top-responded

    }

    function rendermostresponded() {
      $("."+tabs[activeIndex]).removeClass("hide")
      $(".top-header h4").text("responded")
      // most-responded
    }

    
    
    
    
    
    
    
    $(".r-top-content-item").click(function (e) {

      e.preventDefault()

      $('.r-top-content').addClass('hide')
      $answered_by = $(this).attr('data-answered-by')
      $question_by = $(this).attr('data-question-by')
      $a_name = $(".nav-contain h4").html()
      $q_name = $(this).find('h5').html()
      fillResponses($answered_by, $question_by, $q_name, $a_name)

      $(".responses-to-display").addClass("show-responses").removeClass("hide")
      $(".back-btn").removeClass("hide");
      var resps=$(this).find(".responded-count").text()
      $(".top-header h4").text(resps)

      $imgSrc=$(this).find("img").attr("src")

      $(".vote-points").html(`
        <img alt="" src="${$imgSrc}" class="avatar avatar-96 photo" height="96" width="96" style=" border-radius: 50%; ">
      `)

      $(".arrow-back").addClass("hide")
      $(".arrow-forward").addClass("hide")

    })





