/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vuex from 'vuex'
import VueRouter from 'vue-router'

Vue.use(Vuex)

var VueTouch = require('vue-touch')
Vue.use(VueTouch, {name: 'v-touch'})
Vue.use(require('vue-resource'));
/** router logic
 * homepage (/), questions, response will go to questioncontroller.index which simply has routerview to display contents
 * path const down here dictates which url fetches respective components and loaded into the routerview..
 * just straightforward approach as in vue-router doc
 * 
 */
Vue.use(VueRouter)

import {AnswerMixin} from './mixins/AnswerMixin.js';

import InvisibleRecaptcha from 'vue-invisible-recaptcha';
import Longpress from 'vue-longpress';
import Avatar from 'vue-avatar'

Vue.component('follow', require('./components/Follow.vue'));
const allq = Vue.component('allq', require('./components/AllQ.vue'));
const allqguest = Vue.component('allqguest', require('./components/AllQGuest.vue'));
const allr = Vue.component('allr', require('./components/AllR.vue'));
const allrguest = Vue.component('allrguest', require('./components/AllRGuest.vue'));


Vue.component('ask', require('./components/Ask.vue'));
Vue.component('answers', require('./components/Answers.vue'));
Vue.component('answers_guest', require('./components/AnswersGuest.vue'));
Vue.component('allqtimer', require('./components/AllQTimer.vue'));
Vue.component('localtimezone', require('./components/LocalTimeZone.vue'));
Vue.component('answeringtimer', require('./components/AnsweringTimer.vue'));
Vue.component('answers_expired', require('./components/AnswersExpired.vue'));
Vue.component('answers_live_owner', require('./components/AnswersLiveOwner.vue'));

Vue.component('answers_expired_owner', require('./components/AnswersExpiredOwner.vue'));
Vue.component('notifications', require('./components/Notifications.vue'));

Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
var defqcomp = allq
var defrcomp = allr
	if(typeof user !== "undefined") {
		defqcomp = allq
		defrcomp = allr
	}
	else{
		defqcomp = allqguest
		defrcomp = allrguest
	}


	const routes = [
		{ path: '/questions', component:defqcomp },
		{ path: '/', component:defqcomp },
		{ path: '/responses', component: defrcomp }
	]

	const router = new VueRouter({
		mode: 'history',

		routes // short for `routes: routes`
	})

	const app = new Vue({
		router,

		el: '#app',
		mixins: [AnswerMixin],

		data: {
			bubble: 0,
			captcha_loading: true,
			coupon: {
				code : "",
				loading: false,
				applied:false,
				error: "",
				type: false,
				//only for local subscriptions
				local_coupon_id : 0,
				lc_confirmed: false
			}
			
		},
		
		components: {
				"invisible-recaptcha": InvisibleRecaptcha,
				"longpress" : Longpress,
				Avatar
		},
		
		mounted() {
			this.getBubbleCount()
			//this.$refs.allR.lo()
		
		},

	
		created: function() {

			
		
		/** bubble FLOW
		 * 
		* on page load bubblecount will be updated
		* this socket will receive the new notifications..there is one more listener on Notif.vue
		* bubble_wrap in three places now.
		* 
		* **/

		//if there is a live notification
		if(socket) {
		socket.on('bubble', function (bubble) {
					this.bubble = bubble
					$(".bubble_wrap").removeClass('hidden')
					//  $("title").html('Pgeon ('+bubble+') ')
					}); 

					
		socket.on('bubblecleared', function () {
			//this.bubble = bubble
			$(".bubble_wrap").addClass('hidden')
			//  $("title").html('Pgeon ('+bubble+') ')
			}); 

		}
		
					

			

		},

		methods: {
			validateCoupon() {
				if(this.coupon.code.trim() != "" ) {
					this.coupon.loading = true;
					this.coupon.error = "";
					this.$http.get(`/coupon/apply/${this.coupon.code}`).then((response) => {
					//location.href = "/pending"; 
						this.coupon.applied = true;
						this.coupon.loading = false;
						this.coupon.type = 	response.data.type
						//will be zero if it is a stripe call
						this.coupon.local_coupon_id = response.data.local_coupon_id
					}, (response) => {
						
						this.coupon.error = response.data.error
						this.coupon.applied = false;
						this.coupon.loading = false;
						this.coupon.type = null;
					});
				}
			},
			removeAppliedCoupon() {
						this.coupon.code = "";
						this.coupon.applied = false;
						this.coupon.type = null;
			},
			
			confirmLocalCouponSubscription() {
				if(this.coupon.local_coupon_id > 0) {
					this.coupon.loading = true;
					this.$http.post(`/coupon/subscribe/${this.coupon.local_coupon_id}`).then((response) => {
							this.coupon.lc_confirmed = true
							this.coupon.loading = false;
						}, (response) => {
							
							this.coupon.error = response.data.error
							this.coupon.loading = false;
							
						});
				}
			},
			deleteQ(id) {

				this.$http.delete(`/question/${id}`).then((response) => {
					location.href = "/pending"; 
					}, (response) => {
						// error callback
					});
				
				
			},
			captcha_callback(recaptchaToken) {
				$("#frm_register").submit()
			},
			captcha_validate() {
				this.captcha_loading = true
			},
			callChildPendingAnswers($question_id, $uname, $question, $ex_date, $top_a) {
				var child = app.$refs.answersexpiredowner
				child.fetchRecords($question_id, $uname, $question, $ex_date, $top_a)
					
			},
			
			bubbleChangedFromChild (value) {
				//  this.bubble=(value) // someValue
			//    alert(value)
				},

			
		getBubbleCount() {
			this.$http.get('/bubble').then((response) => {
				if (parseInt(response.data) > 0)  {
					this.bubble = response.data 
					$(".bubble_wrap").removeClass('hidden')
				}
		
						//alert('ss')
						// success callback
					}, (response) => {
						// error callback
					});
		},  



		reload() {
			location.reload()
		}
		


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


});




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
  
  jQuery(function ($) {
	$('#update-form').submit(function (e) {
	  var $form = $(this);
  
	  // Disable the submit button to prevent repeated clicks
	  $form.find('button').prop('disabled', true);
  
	  Stripe.card.createToken($form, stripeUpdateResponseHandler);
  
	  // Prevent the form from submitting with the default action
	  return false;
	});
  
  
  });

 


import "./modules/global/forms"
import "./modules/global/switch-toggle"
import "./modules/custom"

import "./modules/landing"
import "./modules/question_details"
import "./modules/published"
import "./modules/publishedResponses"
import "./modules/slideMenu"
import "./modules/membership"
import "./modules/responseDetails"
import "./modules/my-account"

import "./modules/search"
import "./modules/notifications"
