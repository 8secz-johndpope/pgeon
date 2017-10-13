<template>
    <div id="answers_container">
      
      
           <div style="width: auto;box-shadow: inset 0px 0px .05 black;">
            <div class="container sub-nav2">
            
        
            
                
                <div  v-for="answer in answers">
                
         
                
                
                
           
           
           
           
                <div class="media-list media-list-conversation c-w-md jsvote">
                
                
                    <div class="media media-divider">
                        <div class="media-body">
                            <div class="media-body-text media-response media-response-margin flex-center">
                      
                                <p class="flexone">
                                {{answer.answer}}
                      </p>
                            </div>
                        </div>
                    </div>
                </div>
               </div>
           
             
                         </div>
        </div>
        
        
      








    </div>





</template>

<script>
var longpress;
var pressTimer;
  export default {

    data: function() {
      return {
        answers: [],
        submitted_text: '',
        already_answered: false,
        placeholder: "Enter your response here",
        my_votes: []

      };
    },
    props: ['question_id',  'question_owner_id'],
    mounted() {


    },

    methods: {
     
   
     
      scrollToEnd: function() {
        var container = this.$el

        container.scrollTop = container.scrollHeight - container.clientHeight;

      },
     

     
      
      fetchRecords() {
	    	  $.getJSON('/question/' + this.question_id + '/json', function(response) {
	    	        this.answers = response
	    	        
	    	        // var com = this
	    	        $.getJSON('/get_votes/'+this.question_id, function(votes) {
	    	       //   com.my_votes = votes
	    	            this.my_votes = votes
	    	          
	    	           // console.log(this.my_votes[0])
	    	          
	    	      }.bind(this));
	    	        
	    	      }.bind(this));
    	  
      },
      
      
      //will be called from timer comp
      deleteQ: function() {

      		location.reload()
      },
 
 
      
    }


    ,
    created: function() {
      var com = this

      //got some new questions inserted
      if (socket) {
        //just specific to this question id
        socket.emit('connect_me', 'Q_' + this.question_id);
        socket.on('new_answers', function(response) {
          com.answers.push(response)
          com.scrollToEnd();
        });

        socket.on('answer_deleted', function(id) {

          for (var i = 0; i < com.answers.length; i++) {
            if (com.answers[i]["id"] == id) {
              com.answers.splice(i, 1);
              com.already_answered = false
              com.placeholder = "Enter your response here"
              break;
            }

          }
        });
        
        
        socket.on('question_ended', function(id) {
        		alert("Sorry! this question has been ended manually by the asker")
        		location.reload();
        })
        
       
         socket.on('question_cancelled', function(id) {
        		alert("Sorry! this question has been removed manually by the asker")
        		location.href = "/"
        		//location.reload();
        })
        

      }

      this.fetchRecords();
      
      
       
      
    },


  }

</script>
