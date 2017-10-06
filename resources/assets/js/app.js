/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.use(require('vue-resource'));

import {AnswerMixin} from './mixins/AnswerMixin.js';

Vue.component('follow', require('./components/Follow.vue'));
Vue.component('allq', require('./components/AllQ.vue'));
Vue.component('allr', require('./components/AllR.vue'));
Vue.component('answers', require('./components/Answers.vue'));
Vue.component('allqtimer', require('./components/AllQTimer.vue'));
Vue.component('answeringtimer', require('./components/AnsweringTimer.vue'));
Vue.component('answers_expired', require('./components/AnswersExpired.vue'));
Vue.component('answers_expired_owner', require('./components/AnswersExpiredOwner.vue'));
Vue.component('notifications', require('./components/Notifications.vue'));

Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');


const app = new Vue({
  el: '#app',

  mixins: [AnswerMixin],

  data: {
     
  },
  mounted() {

	  this.getBubbleCount()
	  //this.$refs.allR.lo()
  },
  methods: {
	

	  
	getBubbleCount() {
		this.$http.get('/bubble').then((response) => {
			if (parseInt(response.data) > 0) 
				$(".bubble").html(response.data)
	 
	        //alert('ss')
	        // success callback
	      }, (response) => {
	        // error callback
	      });
	},  



	


  }
});

var STRIPE_SECRET = "pk_test_vXMC20UiQF6daFo1sK5j0Fbm"


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

jQuery(function ($) {
  $('#payment-form').submit(function (e) {
    var $form = $(this);

    // Disable the submit button to prevent repeated clicks
    $form.find('button').prop('disabled', true);

    Stripe.card.createToken($form, stripeResponseHandler);

    // Prevent the form from submitting with the default action
    return false;
  });

  function removeBubbles() {
		 $(".bubble").html('')
	     $("title").append('Pgeon')
	}
});



//if there is a live notification
if(socket) {
 socket.on('bubble', function (bubble) {
        $(".bubble").html(bubble)
        
         $("title").append(' ('+bubble+') ')
      }); 
}
 
