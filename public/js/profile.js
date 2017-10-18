 var oldHeader=$(".top-header h4").text()
    var votePointsOldContent=$(".vote-points").html()

    $(".top-content-item").click(function (e) {

      e.preventDefault()

      fillResponses( /* */)

      $(".responses-to-display").addClass("show-responses").removeClass("hide")
      $(".back-btn").removeClass("hide");
      var resps=$(this).find(".responses-count").text()
      $(".top-header h4").text(resps)

      $imgSrc=$(this).find("img").attr("src")

      $(".vote-points").html(`
        <img alt="" src="${$imgSrc}" class="avatar avatar-96 photo" height="96" width="96" style=" border-radius: 50%; ">
      `)

      $(".arrow-back").addClass("hide")
      $(".arrow-forward").addClass("hide")

    })

    $(".back-btn").click(function (e) {

      $(".responses-to-display").removeClass("show-responses").addClass("hide")
      $(".back-btn").addClass("hide");
      $(".top-header h4").text(oldHeader)

      $(".vote-points").html(votePointsOldContent)

      $(".arrow-back").removeClass("hide")
      $(".arrow-forward").removeClass("hide")
    })


    function fillResponses() {
      $(".responses-to-display").css("height", $(".top-content-container").height()+"px")
      $(".responses-to-display").css("overflow", "scroll")
      $(".responses-to-display").html(`
      <ul class="media-list media-list-stream c-w-md" style="margin: 0 auto; max-width: 750px; padding: 15px;">
        ${ [1, 2, 3, 4].map(num => responseHtml).join("")}
      </ul>
    `)
    }


    var responseHtml=`
<li class="media">
  <div class="media-body">
    <div class="h5 m-b-5">
      <span>Display-name</span>
      <svg class="svg-inline--fa fa-long-arrow-left fa-w-14 text-muted" aria-hidden="true" data-prefix="fa" data-icon="long-arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
        <path fill="currentColor" d="M193.456 357.573L127.882 292H424c13.255 0 24-10.745 24-24v-24c0-13.255-10.745-24-24-24H127.882l65.574-65.573c9.373-9.373 9.373-24.569 0-33.941l-16.971-16.971c-9.373-9.373-24.569-9.373-33.941 0L7.029 239.029c-9.373 9.373-9.373 24.568 0 33.941l135.515 135.515c9.373 9.373 24.569 9.373 33.941 0l16.971-16.971c9.373-9.372 9.373-24.568 0-33.941z"></path>
      </svg>
      <span>Display-name</span>
      <span class="text-muted time-align">3 min ago..</span>
    </div>
    <ul class="media-list media-list-conversation c-w-md">
      <li class="media">
        <div class="media-body">
          <div class="media-body-text media-question">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</div>
          <ul class="media-list media-list-conversation c-w-md">
            <li class="media media-current-user media-divider">
              <div class="media-body">
                <div class="media-body-text media-response media-response-margin" onclick="location.href='';" style="cursor: pointer;">
                  estas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
                </div>
              </div>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</li>`



    // handle left and right arrows clicks

    $(".most-responded").css("height", $(".top-content-container").height()+"px")
    $(".user-info").css("height", $(".top-content-container").height()+"px")
    $(".top-responders").css("height", $(".top-content-container").height()+"px")


    var tabs=["user-info", "top-responders", "most-responded"]
    var activeIndex=1

    $(".arrow-back").click(navigate)
    $(".arrow-forward").click(navigate)

    function navigate(e) {

      if ($(e.currentTarget).hasClass("disabled")) return;

      // hide current
      $("."+tabs[activeIndex]).addClass("hide")

      if ($(e.currentTarget).hasClass("arrow-back")) {
        activeIndex--
        $(".arrow-forward").removeClass("disabled")
        activeIndex==0&&$(e.currentTarget).addClass("disabled")
        // $("." +  tabs[activeIndex] ).removeClass("hide")
      }

      if ($(e.currentTarget).hasClass("arrow-forward")) {
        activeIndex++
        $(".arrow-back").removeClass("disabled")
        activeIndex==(tabs.length-1)&&$(e.currentTarget).addClass("disabled")
        // $("." +  tabs[activeIndex] ).removeClass("hide")
      }

      // var render = ("render" + )
      render=new Function(
        "render"+tabs[activeIndex].replace("-", "")+"()"
      )();
    }

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


/*
      $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            // asNavFor: '.slider-for',
            dots: false,
            arrows: true,
            centerMode: true,
            centerPadding: '60px',
            focusOnSelect: true,
            draggable: true ,
            slidesToScroll: true ,
            swipeToSlide: true
        });

        

        $('.slider-nav').on('beforeChange', function(event, slick, currentSlide){
            $(".slick-slide").removeClass("activated")
        })

        $('.slider-nav').on('afterChange', function(event, slick, currentSlide){
        		
        		var [topA,name,slug] = [$(`[data-index=${currentSlide}]`).attr('data-topA'),$(`[data-index=${currentSlide}]`).attr('data-name'),$(`[data-index=${currentSlide}]`).attr('data-slug')] 
        		
        		
        		$(".user-info-count").html(topA)
        		$(".user-info-name").html(name)
        		$(".a_user-info-name").attr('href',slug)
        		
            $(".slick-slide img").css("border" , "none")
            $(".slick-current img").css("border" , "2px solid #24c4bc")
            $(".slick-current").addClass("activated")

          $(".answers-replies-info").hasClass("no-height") && setTimeout(() => {
                $(".answers-replies-info").removeClass("no-height").css("max-height" , "500px")
                setTimeout(() => {
                		
                    $(".answers-replies-info").removeClass("overflow-hidden")
                },500)
            }, 100)
        });

        $('.user-info').on("click" , ".unselectUser" , function(){
	        		
	        	$(".slick-current img").css("border" , "none")
	        $(".answers-replies-info").addClass("no-height").addClass("overflow-hidden").css("max-height" , "0")
	        $(".slick-slide").removeClass("activated")
	        
	        
            // search remove event listener
         // $(".user-dropdown-search").off("input" , filterUsers)
        })


   */

 

