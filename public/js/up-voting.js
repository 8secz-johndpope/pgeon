var score = 0;



$(".respond-li").click(function(e){

	  $(".footer-toggle").hasClass("off-screen") && $(".footer-toggle").removeClass("off-screen") && 
	    $(this).addClass("hidden") && $(".hide-li").removeClass("hidden")

	  $(".footer-textarea").focus() 
	})
	
	
$(".hide-li").click(function(e){
  !$(".footer-toggle").hasClass("off-screen") && $(".footer-toggle").addClass("off-screen") && 
    $(this).addClass("hidden") && $(".respond-li").removeClass("hidden")
})	


autosize($("#footer-textarea"));




function displayLoader(){
	  var wait = document.getElementById("wait");

	  $(".click-to-reply").css("display" , "none")
	  $("#wait").css("display" , "block")

	 
	}

$("#copy_to_cb").click(function () {
	var copyText = $("#txt_current_url");
	copyText.select();
	document.execCommand("Copy");
})




