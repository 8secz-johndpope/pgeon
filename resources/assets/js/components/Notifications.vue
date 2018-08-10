<template>
<div >

<header class="bg-white relative fixed-header ">
  <div class="mw6 m-auto notification-header pr15 pl15 flex items-center justify-between">

    <a onclick="window.history.back()" class="left-arrow fc">
<svg version="1.1" viewBox="0 0 448 256" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><g fill="#4A4A4A" fill-rule="nonzero"><path d="m136.97 252.48l7.071-7.07c4.686-4.686 4.686-12.284 0-16.971l-83.928-83.444h375.89c6.627 0 12-5.373 12-12v-10c0-6.627-5.373-12-12-12h-375.89l83.928-83.444c4.686-4.686 4.686-12.284 0-16.971l-7.071-7.07c-4.686-4.686-12.284-4.686-16.97 0l-116.48 116c-4.686 4.686-4.686 12.284 0 16.971l116.48 116c4.686 4.686 12.284 4.686 16.97-1e-3z"></path></g></g></svg>
    </a>
    <h4 class="header-title m0">Notifications</h4>
    <button class="btn clear-all" v-if="notifications.length>0" v-on:click="clear_all"  >
      Clear All
      <!-- {{bubble}} -->
    </button>

    </div>

</header>






           <main class="notification-main mw6 m-auto">

             <div  v-if="still_deciding_count" class="spinner">
            <div class="b1 se"></div>
            <div class="b2 se"></div>
            <div class="b3 se"></div>
            <div class="b4 se"></div>
            <div class="b5 se"></div>
            <div class="b6 se"></div>
            <div class="b7 se"></div>
            <div class="b8 se"></div>
            <div class="b9 se"></div>
            <div class="b10 se"></div>
            <div class="b11 se"></div>
            <div class="b12 se"></div>
        </div>





         <div class="m-b-5" v-else>

<div class="notifications-item pr15 pl15" v-on:click="fetchRecords"  v-if="new_recs_in>0" >
  You have new notifications
  </div>


 <div class="notifications-item pr15 pl15"  v-on:click="redirect(notification)"  v-bind:class="{ 'notifications-item--unseen':  notification.seen != 1}"  v-for="notification in notifications">

      <span class="fa text-muted" :class="notification.class"></span>
      <div class="notifications-body">
        <h5 class="notification-title m0">
          {{notification.message}}
        </h5>
        <span class="notification-time">
            {{notification.ago}}
        </span>
      </div>
    </div>

















  </div>
</main>

<main class="notification-main mw6 m-auto"  v-if="notifications.length<1 && still_deciding_count == false">
  <div class="empty-notifications">
    <p class="m0">
      <span>🎉</span>
      <span>You’re all caught up!</span>
    </p>
  </div>
</main>


</div>

</template>

<script>

  export default {

    data: function() {
      return {
        notifications: [],
      still_deciding_count: true,
      new_recs_in: false,
      bubble: 0
      };
    },
    props: ['current_user_id'],
    mounted() {
		//alert(window.bubbleCount)

    },

    methods: {

      redirect: function(notification) {

	//if already seen..just redirct it
    	  if (notification.seen == 1) {
    		  location.href = notification.link_to
    	  }else {
    		  //mark that rec as seen.
    		  var formData = {
    	                'id': notification.id
    	              }
    	    	  	this.bubble -= 1
    	        this.$http.post('/markasseen', formData).then((response) => {
    	        		//	this.$emit('bubbleCountChanged', this.bubble-1)
    	        	 		location.href = notification.link_to
    	          }, (response) => {
    	            alert('error navigating')
    	          });
    	  }

      },


      clear_all() {

	    	  this.$http.delete('/notification').then((response) => {
	    		  	this.still_deciding_count = false
              this.notifications =  []
              this.bubble = 0;
	              if (socket) {
                  //this will just emit a cleared event from server to all the clients to clear themselves
                  socket.emit('clearbubble', this.current_user_id);
                  }
	            }, (response) => {
	              alert('error clearing')
	            });
      },

      fetchRecords() {

    	  	this.new_recs_in=false
    	  	this.still_deciding_count = true
    		$.getJSON('/notifications/json', function(response) {


    			this.notifications = response
    		 	var com = this
    			response.forEach(function(val,index) {
         //   console.log(val.seen);
            
    					if(val.seen == 0 )
    						com.bubble++;
    				})
    			this.still_deciding_count = false

    	    }.bind(this));


  },





    },
    created: function() {



    	 this.fetchRecords();

    	var com = this

    	 if (socket) {
    		 socket.on('bubble', function (bubble) {
    			 //total unseen
    			 	 com.new_recs_in = bubble
    			 	 com.bubble = bubble
    		      });
        }








     }


  }

</script>
