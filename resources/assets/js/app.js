/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.use(require('vue-resource'));

Vue.component('follow', require('./components/Search.vue'));
Vue.component('allq', require('./components/AllQ.vue'));
Vue.component('answers', require('./components/Answers.vue'));
Vue.component('allqtimer', require('./components/AllQTimer.vue'));
Vue.component('answeringtimer', require('./components/AnsweringTimer.vue'));
Vue.component('answers_expired', require('./components/AnswersExpired.vue'));
Vue.component('answers_expired_owner', require('./components/AnswersExpiredOwner.vue'));

Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
const app = new Vue({
  el: '#app',

  data: {
     
  },
  methods: {
    follow: function (id) {
      //  $.post('follow',  )
      var formData = {
        'user_id': id
      }
      this.$http.post('/follow', formData).then((response) => {

        $("#follow_" + id).addClass('hide')
        $("#unfollow_" + id).removeClass('hide')
        //alert('ss')
        // success callback
      }, (response) => {
        // error callback
      });



    },

    unfollow: function (id) {
      //  $.post('unfollow',  )
      var formData = {
        'user_id': id
      }
      this.$http.post('/unfollow', formData).then((response) => {

        $("#follow_" + id).removeClass('hide')
        $("#unfollow_" + id).addClass('hide')
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


});
