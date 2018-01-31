<template>
<div>
<div class="h3 m-b-5">Notifications
                              <button v-if="notifications.length>0" v-on:click="clear_all"  class="btn-sm btn-link p-x-0 text-uppercase">Clear all</button>
                              <span class="bubble badge pull-right m-x-sm" style="margin-top: 5px;">{{bubble}}</span>
                              
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

    
    		<li class="alert alert-info new_notif_bar" v-on:click="fetchRecords"  v-if="new_recs_in>0">You have new notifications</li>
    
    
    
 
 	<li class="list-group-item media p-a noselect" v-on:click="redirect(notification)" style="cursor: pointer;" v-bind:class="{ 'bold':  notification.seen == 0}"  v-for="notification in notifications">
                            <div class="media-left">
                                <span class="fa text-muted" :class="notification.class"></span>
                            </div>
                            <div class="media-body">
                                <div class="media-heading">{{notification.message}}
                                    <small class="pull-right text-muted">{{notification.ago}}</small> 
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
        notifications: [],
      still_deciding_count: true,
      new_recs_in: false,
      bubble: 0
      };
    },
   // props: ['bubble'],
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
    	    	  	console.log(formData)
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
	             // this.fetchRecords()
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
