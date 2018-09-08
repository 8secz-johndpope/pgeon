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
})
