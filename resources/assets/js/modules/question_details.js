$(function () {
    $(".goto-qdetail").click(function () {
        location.href=`/question/${$(this).data('id')}`
      })

    $(".question-details__more").click((e) => {
    const open = $(".landing_header").hasClass("details__dropdown--active");
    open ? closeDetailsDropdown() : openDetailsDropdown();
    });
    
    const closeDetailsDropdown = () => {
    $(".landing_header").removeClass("details__dropdown--active");
    closeSharedLinks();
    };
    
    const openDetailsDropdown = () => {
    $(".landing_header").addClass("details__dropdown--active");
    };


    const openSharedLinks = () => {
    $(".details-share").addClass("details-share--visible");
    $(".details__dropdown").addClass("dn");
    };
    const closeSharedLinks = () => {
        $(".details-share").removeClass("details-share--visible");
        $(".details__dropdown").removeClass("dn");
      };
      
     $(".details__overlay").on("click", closeDetailsDropdown);
     $(".details__dropdown_item--share").on("click", openSharedLinks);
     $(".details-share__header").on("click", closeDetailsDropdown);

     $q = $("#share_q").html()
     $q_url = window.location.href
     $(".details-share__item--fb").on("click", () => {
     // https://twitter.com/intent/tweet?text=Hello%20world
     
       FB.ui({
        method: 'share',
        display: 'popup',
        href: $q_url,
        quote: decodeURI($q)
      }, function(response){

      });
  
     })
     $(".details-share__item--twitter").on("click", () => {
       window.open(`https://twitter.com/intent/tweet?text=${$q}&url=${$q_url}`,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250');
     })
     
     $(".details-share__item--linkedin").on("click", () => {
      window.open(`http://www.linkedin.com/shareArticle?mini=true&url=${$q_url}`,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250');
     })

     $(".details-share__item--reddit").on("click", () => {
        window.open(` http://www.reddit.com/submit?title=${$q}&url=${$q_url}`,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250');
     })

     $(".details-share__item--link").on("click", () => {

            var input = document.createElement('input');
            input.setAttribute('value', $q_url);
            document.body.appendChild(input);
            input.select();
            var result = document.execCommand('copy');
            document.body.removeChild(input)
            return result;
            
     })
    
     ;

     

})
