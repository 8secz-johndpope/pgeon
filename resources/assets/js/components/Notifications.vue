<template>
<div>
<div class="h3 m-b-5">Notifications
                              <button v-if="notifications.length>0" v-on:click="clear_all"  class="btn-sm btn-link p-x-0 text-uppercase">Clear all</button>
                          </div>
                          
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
         <div v-else>
 <ul  class="list-group media-list media-list-stream">

    
    		<li class="alert alert-info new_notif_bar" v-on:click="fetchRecords"  v-if="bubble>0">You have <b>{{bubble}}</b> new notifications</li>
    
    
    
 
 	<li class="list-group-item media p-a noselect" v-on:click="redirect(notification.link_to)" style="cursor: pointer;" v-for="notification in notifications">
                            <div class="media-left">
                                <span class="fa text-muted" :class="notification.class"></span>
                            </div>
                            <div class="media-body">
                                <div class="media-heading">{{notification.message}}
                                    <small class="pull-right text-muted">{{notification.ago}}..</small> 
                                </div>
                            </div>
                        </li>
                        
                        

  </ul>
</div>

</div>

</template>

<script>
  export default {

    data: function() {
      return {
        bubble: 0,
        notifications: [],
      still_deciding_count: true,
      };
    },
    mounted() {


    },

    methods: {

      redirect: function(url) {
        location.href = url
      },


      clear_all() {
	    	  this.$http.delete('/notification').then((response) => {
	    		  	this.still_deciding_count = false
	    		  	this.notifications =  []
	             // this.fetchRecords()
	            }, (response) => {
	              alert('error clearing')
	            });
      },
      
      fetchRecords() {
    	  	
    	  	this.still_deciding_count = true
    		$.getJSON('/notifications/json', function(response) {
    			
    			this.notifications = response
    			this.still_deciding_count = false
    			this.bubble = 0 //will be updated on live updates
   			$(".bubble").html('')
   			$(".fa-bell").removeClass('red')
   		    $("title").html('Pgeon')
    	    }.bind(this));
    	  
    	 
  },
     

   


    },
    created: function() {

 
    	  
    	 this.fetchRecords();
    	 
    	var com = this	
    	
    	 if (socket) {
    		 socket.on('bubble', function (bubble) {
    			 	 com.bubble = bubble 
    		      });  	   	
        }
    	 
	   
    	
	    	

       

     }


  }

</script>
