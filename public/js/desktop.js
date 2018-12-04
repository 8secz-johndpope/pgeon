const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

Node.prototype.on = window.on = function(name, fn) {
  this.addEventListener(name, fn);
};

NodeList.prototype.__proto__ = Array.prototype; // eslint-disable-line

NodeList.prototype.on = NodeList.prototype.addEventListener = function(
  name,
  fn
) {
  this.forEach(elem => {
    elem.on(name, fn);
  });
};
//

const hamburgerIcon = $(".hamburger-icon");
const mainNav = $(".main-nav");
const signupSection = $(".signup");
const signupBtn = $(".btn-signup");
const loginBtn = $(".btn-login")

const openMobileNav = e => {
  mainNav.classList.add("main-nav--open");
};

const closeMobileNavOnWindowClick = e => {
  !mainNav.contains(e.target) && !hamburgerIcon.contains(e.target)
    ? mainNav.classList.remove("main-nav--open")
    : null;
};

const closeSignup = e => {
  !signupSection.contains(e.target) &&
  !signupBtn.contains(e.target) &&
  !loginBtn.contains(e.target)
    ? signupSection.classList.remove("signup--show")
    : null;
};

hamburgerIcon.on("click", openMobileNav);
window.on("click", e => {
  closeMobileNavOnWindowClick(e);
  closeSignup(e);
});

// dropdown select
const countrySelect = $("#country-select");
countries.forEach(function(country) {
  const option = document.createElement("option");
  option.innerText = `${country.ISO.toUpperCase()} +${country.Code}`;
  countrySelect.appendChild(option);
});

$("#tel-number") &&
  $("#tel-number").on("input", e => {
    console.log("here");
    $(".btn-send-link").classList.remove("hidden-o");
  });



$(".signup__close").on("click", e => {
  $(".signup").classList.remove("signup--show");
})


document.addEventListener("keyup",function(e) {
    if (e.keyCode == 27) {
    $(".signup").classList.remove("signup--show");
  }
});


$(".btn-signup").on("click", e => {
  $(".signup").classList.add("signup--show");
  swapsigninSignup()
});

$(".btn-login").on("click", e => {
  $(".signup").classList.add("signup--show");
  swapsignupSignin()
});


$(".signin-text a").on("click", e => {
  e.preventDefault()
  swapsignupSignin()
})

function swapsignupSignin() {
  $(".social-login").classList.add("hidden")
  $(".signin-section").classList.remove("hidden")
}

function swapsigninSignup() {
  $(".social-login").classList.remove("hidden")
  $(".signin-section").classList.add("hidden")
}





// input
$$(".pgn__input").on("blur", function() {
  console.log("here")
  var $tmpval = this.value
  if ($tmpval.trim().length == 0) {
    this
      .parentNode
      .classList.add("empty")
    this
      .parentNode
      .classList.remove("is_dirty")
  } else {
    this
      .parentNode
      .classList.add("is_dirty")
    this
      .parentNode
      .classList.remove("empty")
  }
})

jQuery("#tel-number").focus(function () {
  jQuery("#lbl-msg").html("Get the link via text message")
})

$(".btn-send-link").on("click", e => {
 // const success = Math.random() >= 0.5

 var tel =  jQuery("#tel-number").val();
   if(tel.length < 6) {
      jQuery("#lbl-msg").html("Does not looks like a valid phone number")
   } else {

           
    $(".btn-send-link > img").style.display = "initial"
    $(".btn-send-link > span").style.display = "none"

    jQuery.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
      }
    });
    

    jQuery.ajax({
      url: '/sendsms',
      type: 'POST',
      data : {'message': "Here is the Pgeon link http://m.pgeon.com", 'num':tel} ,
      success: function(data) {
        $(".btn-send-link > img").style.display = "none"
        $(".btn-send-link > span").innerText = "Message Sent!" 
        $(".btn-send-link > span").style.display = "initial"

          //do stuff
      },
      error: function(data) {
        $(".btn-send-link > img").style.display = "none"
        $(".btn-send-link > span").innerText = "Please Try Again..."
        $(".btn-send-link > span").style.display = "initial"


          //do stuff
      },
    
  });

   }
  

  


  // setTimeout(() => {
  //   $(".btn-send-link > img").style.display = "none"
  //   $(".btn-send-link > span").innerText = success ? "Message Sent!" : "Please Try Again..."
  //   $(".btn-send-link > span").style.display = "initial"
  // }, 2000);

})
