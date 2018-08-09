

jQuery(function ($) {



	$(".update-card").on("click", () => {
		$(".update-card-container").toggleClass('dn')
	})

	$("[name=payment-method]").on("change", (e) => {
		$(".payment-container").addClass('dn')
		let $target = $(e.target)
		$target.prop("checked")
		  ? $target
			  .parents(".payment-method-body")
			  .next()
			  .removeClass('dn')
		  : $target
			  .parents(".payment-method-body")
			  .next()
			  .addClass('dn')
	
	  })


	var STRIPE_SECRET = "pk_test_vXMC20UiQF6daFo1sK5j0Fbm"
if(typeof(Stripe) !== "undefined")
	Stripe.setPublishableKey(STRIPE_SECRET);
var stripeResponseHandler = function (status, response) {
  var $form = $('#payment-form');

  if (response.error) {
    // Show the errors on the form
    $form.find('.payment-errors').text(response.error.message);
    $form.find('button').prop('disabled', false);
  } else {
    // token contains id, last4, and card type
    var token = response.id;
    // Insert the token into the form so it gets submitted to the server
    $form.append($('<input type="hidden" name="stripeToken" />').val(token));
    // and re-submit
    $form.get(0).submit();
  }
};

var stripeUpdateResponseHandler = function (status, response) {
	var $form = $('#update-form');
  
	if (response.error) {
	  // Show the errors on the form
	  $form.find('.payment-errors').text(response.error.message);
	  $form.find('button').prop('disabled', false);
	} else { 
	  // token contains id, last4, and card type
	  var token = response.id;
	  // Insert the token into the form so it gets submitted to the server
	  $form.append($('<input type="hidden" name="stripeToken" />').val(token));
	  // and re-submit
	  $form.get(0).submit();
	}
  };



	$('#payment-form').submit(function (e) {
	 
	  var $form = $(this);
  
	  // Disable the submit button to prevent repeated clicks
	  $form.find('button').prop('disabled', true);
  
	  Stripe.card.createToken($form, stripeResponseHandler);
  
	  // Prevent the form from submitting with the default action
	  return false;
	});
  
  
  
	$('#update-form').submit(function (e) {
    var $form = $(this);
  
	  // Disable the submit button to prevent repeated clicks
	  $form.find('button').prop('disabled', true);
  
	  Stripe.card.createToken($form, stripeUpdateResponseHandler);
  
	  // Prevent the form from submitting with the default action
	  return false;
	});
  
  
  });
