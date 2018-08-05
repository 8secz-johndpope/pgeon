<template>
<div>

<header class="bg-white relative fixed-header ">
  <div class="mw6 m-auto notification-header pr15 pl15 flex items-center justify-between">

    <a onclick="window.history.back()" class="left-arrow fc">
      <svg width="448px" height="256px" viewBox="0 0 448 256" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <!-- Generator: Sketch 50 (54983) - http://www.bohemiancoding.com/sketch -->
    <title>long-arrow-left</title>
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="long-arrow-left" fill="#4A4A4A" fill-rule="nonzero">
            <path d="M136.97,252.485 L144.041,245.415 C148.727,240.729 148.727,233.131 144.041,228.444 L60.113,145 L436,145 C442.627,145 448,139.627 448,133 L448,123 C448,116.373 442.627,111 436,111 L60.113,111 L144.041,27.556 C148.727,22.87 148.727,15.272 144.041,10.585 L136.97,3.515 C132.284,-1.171 124.686,-1.171 120,3.515 L3.515,119.515 C-1.171,124.201 -1.171,131.799 3.515,136.486 L120,252.486 C124.686,257.172 132.284,257.172 136.97,252.485 Z" id="Shape"></path>
        </g>
    </g>
</svg>

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
