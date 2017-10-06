(function ($) {
    "use strict";

	$(document).ready(function() {
       $('#nav').on('click', function(){
           $('#nav-expanded').slideToggle();
       });

       $('#sort-ico').on('click', function(){
           $(this).toggleClass('sort-ico-selected');

           $('.sorted-by').slideToggle();
       });

       $('#search_icon').on('click', function(){

           $('.search_box').addClass('search_box_axpanded');
       });

       $('#sbi_close').on('click', function(){

           $('.search_box').removeClass('search_box_axpanded');
       });

       var s = $(".pgeon_header");
        var pos = s.position();
        $(window).scroll(function() {
            var windowpos = $(window).scrollTop();
            if (windowpos >= pos.top+1) {
                s.addClass("pgeon-is-sticky");
                $('section').addClass('margin-top');
            } else {
                s.removeClass("pgeon-is-sticky");
                $('section').removeClass('margin-top');
            }
        });

	});


// input type files
var inputs = document.querySelectorAll( '.inputfile' );
Array.prototype.forEach.call( inputs, function( input )
{
	var label	 = input.nextElementSibling,
		labelVal = label.innerHTML;

	input.addEventListener( 'change', function( e )
	{
		var fileName = '';
		if( this.files && this.files.length > 1 )
			fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
		else
			fileName = e.target.value.split( '\\' ).pop();

		if( fileName )
			label.querySelector( 'span' ).innerHTML = fileName;
		else
			label.innerHTML = labelVal;
	});
});


// ===== Scroll to Top ====
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});
$('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});


})(jQuery);