
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.use(require('vue-resource'));
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('example', require('./components/Example.vue'));
Vue.component('follow', require('./components/Search.vue'));

Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
const app = new Vue({
    el: '#app',
    methods : {
        follow: function (id) {
          $.post('follow',  )
          var formData =  {'user_id': id}
          this.$http.post('/follow', formData).then((response) => {

                  $("#follow_"+id).addClass('hide')
                  $("#unfollow_"+id).removeClass('hide')
                    //alert('ss')
                    // success callback
                }, (response) => {
                    // error callback
                });



        },

        unfollow: function (id) {
          $.post('unfollow',  )
          var formData =  {'user_id': id}
          this.$http.post('/unfollow', formData).then((response) => {

                  $("#follow_"+id).removeClass('hide')
                  $("#unfollow_"+id).addClass('hide')
                    //alert('ss')
                    // success callback
                }, (response) => {
                    // error callback
                });



        }
    }
});
