var $input = $('<div class="modal-body"><input type="text" class="form-control" placeholder="Message"></div>')

$(document).on('click', '.js-msgGroup', function () {
  $('.js-convers').addClass('hide')
  $('.js-conversation').removeClass('hide')
  $('.modal-title').html('<a href="#" class="js-gotoMsgs">Back</a>')
  $input.insertBefore('.js-modalBody')
})

$(function () {
  function getRight() {
    return ($(window).width() - ($('[data-toggle="popover"]').offset().left + $('[data-toggle="popover"]').outerWidth()))
  }

  $(window).on('resize', function () {
    var instance = $('[data-toggle="popover"]').data('bs.popover')
    if (instance) {
      instance.options.viewport.padding = getRight()
    }
  })

  $('[data-toggle="popover"]').popover({

    template: '<div class="popover user-popover" role="tooltip"><div class="arrow"></div><div class="popover-content p-x-0" style="padding:0;"></div></div>',
    title: '',
    html: true,
    trigger: 'manual',
    placement:'bottom',
    viewport: {
      selector: 'body',
      padding: getRight()
    },
    content: function () {
      if(window.innerWidth <= 500 ){
        $(".mobile-dropdown").toggleClass("no-height")
        $(".navbar-btn-avitar").toggleClass("active")
        return;
      }
      // var $nav = $('.app-navbar .navbar-nav:last-child').clone()
      return $("#profile_popup_js").html()
    }
  })

  $('[data-toggle="popover"]').on('click', function (e) {
    e.stopPropagation()
    if ($('[data-toggle="popover"]').data('bs.popover').tip().hasClass('in')) {
      $('[data-toggle="popover"]').popover('hide')
      $(document).off('click.app.popover')

    } else {
      $('[data-toggle="popover"]').popover('show')

      setTimeout(function () {
        $(document).one('click.app.popover', function () {
          $('[data-toggle="popover"]').popover('hide')
        })
      }, 1)
    }
  })

})

$(document).on('click', '.js-gotoMsgs', function () {
  $input.remove()
  $('.js-conversation').addClass('hide')
  $('.js-msgGroup, .js-newMsg').removeClass('hide')
  $('.modal-title').html('Messages')
})

$(document).on('click', '[data-action=growl]', function (e) {
  e.preventDefault()

  $('#app-growl').append(
    '<div class="alert alert-dark alert-dismissible fade in" role="alert">'+
      '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
        '<span aria-hidden="true">×</span>'+
      '</button>'+
      '<p>Please check your registered email to complete this process.</p>'+
    '</div>'
  )
})

$(document).on('focus', '[data-action="grow"]', function () {
  if ($(window).width() > 1000) {
    $(this).animate({
      width: 300
    })
  }
})

$(document).on('blur', '[data-action="grow"]', function () {
  if ($(window).width() > 1000) {
    var $this = $(this).animate({
      width: 180
    })
  }
})

// back to top button - docs
$(function () {
  if ($('.docs-top').length) {
    _backToTopButton()
    $(window).on('scroll', _backToTopButton)
    function _backToTopButton () {
      if ($(window).scrollTop() > $(window).height()) {
        $('.docs-top').fadeIn()
      } else {
        $('.docs-top').fadeOut()
      }
    }
  }
})

$(function () {
    // doc nav js
    var $toc    = $('#markdown-toc')
    var $window = $(window)

    if ($toc[0]) {

      maybeActivateDocNavigation()
      $window.on('resize', maybeActivateDocNavigation)

      function maybeActivateDocNavigation () {
        if ($window.width() > 768) {
          activateDocNavigation()
        } else {
          deactivateDocNavigation()
        }
      }

      function deactivateDocNavigation() {
        $window.off('resize.theme.nav')
        $window.off('scroll.theme.nav')
        $toc.css({
          position: '',
          left: '',
          top: ''
        })
      }

      function activateDocNavigation() {

        var cache = {}

        function updateCache() {
          cache.containerTop   = $('.docs-content').offset().top - 40
          cache.containerRight = $('.docs-content').offset().left + $('.docs-content').width() + 45
          measure()
        }

        function measure() {
          var scrollTop = $window.scrollTop()
          var distance =  Math.max(scrollTop - cache.containerTop, 0)

          if (!distance) {
            $($toc.find('li')[1]).addClass('active')
            return $toc.css({
              position: '',
              left: '',
              top: ''
            })
          }

          $toc.css({
            position: 'fixed',
            left: cache.containerRight,
            top: 40
          })
        }

        updateCache()

        $(window)
          .on('resize.theme.nav', updateCache)
          .on('scroll.theme.nav', measure)

        $('body').scrollspy({
          target: '#markdown-toc',
          selector: 'li > a'
        })

        setTimeout(function () {
          $('body').scrollspy('refresh')
        }, 1000)
      }
    }
})

// Count down text_area
$("#question-input").on("input" , handleInput)
$("#question-input").on("paste" , handleInput)

function handleInput(e){

  const maxLength = 150
  const currentLength = e.target.value.length

  if(currentLength > maxLength ){ // exceded
    e.target.value = e.target.value.substring(0, maxLength);
    return;
  }

  $(".current-length").text(currentLength)
}


// hide and display nav on scroll up and down v3
var lastScrollTop = $(window).scrollTop();
$(window).scroll(function(event){
  var st = $(this).scrollTop();
  //console.log(st);
  if(st < 50 ) return ;


  if ( st - lastScrollTop > 5 ){
    !$(".nav_all").hasClass("up50") && $(".nav_all").addClass("up50")
    !$(".second-nav-container").hasClass("up0") && $(".second-nav-container").addClass("up0")
  //  $(".scroll-content").hasClass("mt-50") && $(".scroll-content").removeClass("mt-50")
//    !$(".scroll-content").hasClass("mt-50") && $(".scroll-content").addClass("mt-50")
    !$(".mobile-dropdown").hasClass("no-height") && $("#profile-button").click()
    !$(".user-popover").hasClass("out") && $(".user-popover").removeClass("in") && $(".user-popover").addClass("out")
  } else if( lastScrollTop - st > 2 ){
    $(".nav_all").hasClass("up50") && $(".nav_all").removeClass("up50")
    $(".second-nav-container").hasClass("up0") && $(".second-nav-container").removeClass("up0")
  //  !$(".scroll-content").hasClass("mt-50") && $(".scroll-content").addClass("mt-50")

  }
  lastScrollTop = st;
})

function addFocus(){
  $(this).addClass("active-container")
}

function removeFocus(){
  $(this).hasClass("active-container") &&
  $(this).removeClass("active-container")
}

function addResponseFocus(){
  $(this).addClass("active-response-container")
}

function removeResponseFocus(){
  $(this).hasClass("active-response-container") &&
  $(this).removeClass("active-response-container")
}

$(".live-media-question").mousedown(addFocus)
$(".live-media-question" ).mouseup(removeFocus)
$(".live-media-question" ).mouseleave(removeFocus)

// //media-body-text  media-question
// $(".media-question").mousedown(addFocus)
// $(".media-question" ).mouseup(removeFocus)
// $(".media-question" ).mouseleave(removeFocus)

// // media-list-conversation
// $(".media-response").mousedown( addResponseFocus )
// $(".media-response" ).mouseup( removeResponseFocus )
// $(".media-response" ).mouseleave( removeResponseFocus )

// live-response
$(".live-response").mousedown( addResponseFocus )
$(".live-response" ).mouseup( removeResponseFocus )
$(".live-response" ).mouseleave( removeResponseFocus )





// number abbreviations
function nFormatter(num) {
    isNegative = false
    if (num < 0) {
        isNegative = true
    }
    num = Math.abs(num)
    if (num >= 1000000000) {
        formattedNumber = (num / 1000000000).toFixed(1).replace(/\.0$/, '') + 'G';
    } else if (num >= 1000000) {
        formattedNumber =  (num / 1000000).toFixed(1).replace(/\.0$/, '') + 'M';
    } else  if (num >= 1000) {
        formattedNumber =  (num / 1000).toFixed(1).replace(/\.0$/, '') + 'K';
    } else {
        formattedNumber = num;
    }
    if(isNegative) { formattedNumber = '-' + formattedNumber }
    return formattedNumber;
}
