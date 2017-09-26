
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
        		
        		var [topA,name] = [$(`[data-index=${currentSlide}]`).attr('data-topA'),$(`[data-index=${currentSlide}]`).attr('data-name')] 
        		
        		
        		$(".user-info-count").html(topA)
        		$(".user-info-name").html(name)
        		
        		
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
         //   $(".user-dropdown-search").off("input"  , filterUsers) 
        })


   

 

