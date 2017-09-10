var counter = document.getElementById("counter");
// counter.innerHTML = "0";
var score = 0;

function upVote() {
  // score++;
  // counter.innerHTML = score;
  // checkScore();
}

function checkScore() {
  // if (score > 0) {
  //   counter.style.color = "#70C1B3";
  // }
}




$(".jsvote").mouseup(function(e){
  clearTimeout(pressTimer);
  
  if(!longpress){
    var $icon
    var $parent 
    $parent = $(e.target).parents(".jsvote")
    $icon = $parent.find(".icon")


    $icon.hasClass("icon-minus") && $icon.removeClass("icon-minus") 
    $icon.hasClass("icon-thumbs-down") && $icon.removeClass("icon-thumbs-down") 

    if( $icon.hasClass("icon-thumbs-up") ){
      $icon.removeClass("icon-thumbs-up") &&
      $icon.addClass("icon-minus") 
    } else{
      $icon.addClass("icon-thumbs-up")
    }
  }
})

$(".jsvote").mousedown(function(e){
  longpress = 0 
  pressTimer = window.setTimeout(function() { 
    longpress = 1  

    var $icon
    var $parent 

    $parent = $(e.target).parents(".jsvote")

    $icon = $parent.find(".icon")

    $icon.hasClass("icon-minus") && $icon.removeClass("icon-minus") 
    $icon.hasClass("icon-thumbs-up") && $icon.removeClass("icon-thumbs-up") 
    $icon.addClass("icon-thumbs-down")
  },500);
})



// console.log("here")
// $( ".jsvote" ).on( "mousedown", "#jsvote", function(e) {
//   e.stopPropagation();
//   if(e.target.id == "jsvote"){
//     console.log(event.target)
//     console.log("here")
//   }
// });

var dotsInterval

$(".open-footer").click(function(){
  if(! $(".footer-toggle").hasClass("footer-opened")){
    displayLoader()
    $('.close-footer').css("display" , "block")
  }
  console.log("open")
  $(".footer-toggle").hasClass("footer-closed") && $(".footer-toggle").removeClass("footer-closed")
  $(".footer-toggle").addClass("footer-opened")
  $(".footer-textarea").focus() 
})


$(".close-footer").click(function(e){
  $(".click-to-reply").css("display" , "block")
  $("#wait").css("display" , "none")
  clearInterval( dotsInterval )

  $('.close-footer').css("display" , "none")

  $(".footer-toggle").hasClass("footer-opened") && $(".footer-toggle").removeClass("footer-opened")
  $(".footer-toggle").addClass("footer-closed")
  e.stopPropagation()
})


function displayLoader(){
  var wait = document.getElementById("wait");

  $(".click-to-reply").css("display" , "none")
  $("#wait").css("display" , "block")

  dotsInterval =  window.setInterval( function() {
    if ( wait.innerHTML.length > 3 ) 
      wait.innerHTML = ".";
    else 
      wait.innerHTML += ".";
  }, 400);
}

// charlimit current max 


