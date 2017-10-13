<template>
    <div id="answers_container">
      		<div style="width: auto;box-shadow: inset 0px 0px .05 black;" v-if="answers.length<1">
            <div class="container text-center m-t-10p">
                <img src="file:///Users/russfranklin/Dropbox/Pgeon/Pgeon_UI/assets/img/tumbleweed.svg" />
                <h4 class="text-muted m-t-0">
   No responses yet.. </h4>
            </div>
        </div>
      
           <div style="width: auto;box-shadow: inset 0px 0px .05 black;" v-else>
            <div class="container sub-nav2">
            
            
         
         
            
                
                <div  v-for="answer in answers">
                
                
                   <div class="media-list media-list-conversation c-w-md" v-if="ownerOfAnswer(answer.user_id)">
                    <div class="media media-divider">
                        <div class="media-body">
                         <div class="media-header">
                                            <small class="text-muted"><a href="#" id="user-profile-text-link" style="margin-left: 3px">My reply</a></small>
                                            <small class="text-muted pull-right  hidden">3 min ago..</small>
                                        </div>
                            <div class="media-body-text live-response flex-center" style="background-color: #e8eff7;">
                                <a class="media-left">
                                    
                                </a>
                                <p class="flexone">
                 			{{answer.answer}}
                 </p>
                 <button type="button" data-dismiss="alert" aria-label="Close" class="close" v-on:click="delete_answer(answer.id)">
                                                <span aria-hidden="true">×</span>
                                            </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
           
           
           
           
                <div class="media-list media-list-conversation c-w-md jsvote" @mousedown="mdown(answer.id, $event)" @mouseup="mup(answer.id, $event)"  v-if="!ownerOfAnswer(answer.user_id)">
                
                
                    <div class="media media-divider">
                        <div class="media-body">
                            <div class="media-body-text live-response flex-center">
                                <a class="media-left">
                                    <button id="vote"  class="btn-borderless" v-bind:class="{ 'thumbs-up': checkVoted(answer.id) == 1, 'thumbs-down': checkVoted(answer.id) == -1, 'window-minimize':  (checkVoted(answer.id) === false || checkVoted(answer.id) === 0)}">
                          			
                                 
                                  <svg width="16" height="16">
   <use class="thumbs-up" v-if="checkVoted(answer.id) == 1" xlink:href='/img/sprites/solid.svg#thumbs-up'></use>
      <use class="thumbs-down" v-if="checkVoted(answer.id) == -1" xlink:href='/img/sprites/solid.svg#thumbs-down'></use>
         <use class="window-minimize" v-if="(checkVoted(answer.id) === false || checkVoted(answer.id) === 0)" xlink:href='/img/sprites/solid.svg#window-minimize'></use>
 </svg>
                                    </button>
                                    
                                    
                                    
                                    
                                      
                                </a>
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
        
        



        <div v-if="!already_answered"  class="fixed-bottom-footer">
                <div class="navbar-fixed-bottom footer-toggle off-screen">
                    <div class="container m-t-15">
                        <ul class="media-list media-list-conversation c-w-md">
                            <li class="media media-divider">
                                <div class="media-body">
                                    <ul class="media-list media-list-conversation c-w-md">
                                        <li class="media media-current-user">
                                            <div class="input-group ">
                                                <textarea v-model="submitted_text"  id="footer-textarea" overflow="hidden" rows="1" class="footer-textarea form-control custom-control"></textarea>
                                                <span  v-on:click="submit_answer()" class="input-group-addon btn btn-primary footer-btn"><span class="fa fa-paper-plane response-icon"></span></span>
                                            </div>
                                            <small class="charlimit"><span class="current">0</span>/<span class="max">150</span></small>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
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
    props: ['question_id', 'current_user_id', 'question_owner_id','votecount'],
    mounted() {


    },
    watch: {
      answers() {


        for (var i = 0; i < this.answers.length; i++) {
      
          if (this.answers[i]["user_id"] == this.current_user_id) {
            this.already_answered = true
            this.placeholder = "You already have posted an answer"
            break;
          }

        }

      },
    },
    methods: {
     
      	 mup(answer_id, e) {
      		  clearTimeout(pressTimer);
      		  
      		  
      		  
      		  if( !longpress ){
      		    var $icon
      		    var $parent 

      		    $parent = $(e.target).parents(".jsvote")
      		    $icon = $parent.find("#vote")

      		    $icon.hasClass("minus") && $icon.removeClass("minus") 
      		    $icon.hasClass("thumbs-down") && $icon.removeClass("thumbs-down") 

      		    if( $icon.hasClass("thumbs-up") ){
      		      $icon.removeClass("thumbs-up") &&
      		
      		 //      console.log('u to -')
      		    	  this.downVote(answer_id)
      		    } else{
//      		      console.log('- to u')
    		    	  		this.upVote(answer_id)
      		   
      		    }
      		  }
      	
      	
    	 }	,   	
    	 mdown(answer_id, e) {
    		 var el = e.target
    		 longpress = 0 
    		  var com = this
    		  
    		  
    		  pressTimer = window.setTimeout(function() { 
    			    longpress = 1  

    			    var $icon
    			    var $parent 

    			    $parent = $(e.target).parents(".jsvote")

    			    $icon = $parent.find("#vote")

    			    $icon.hasClass("minus") && $icon.removeClass("minus") 
    			    $icon.hasClass("thumbs-up") && $icon.removeClass("thumbs-up") 
    		//	      console.log('- to d')
    		    		com.downVote(answer_id)
    			
    			  },500);
    		 
    		  
    		  

    	 }	,
      ownerOfAnswer: function(user_id) {
        return this.current_user_id == user_id
      },
      scrollToEnd: function() {
        var container = this.$el

        container.scrollTop = container.scrollHeight - container.clientHeight;

      },
      submit_answer: function() {


        var formData = {
          'question_id': this.question_id,
          'answer': this.submitted_text,
        }
        this.$http.post('/answer', formData).then((response) => {
          this.ted_text = ''
          this.fetchRecords()
        }, (response) => {
          alert('error submitting')
        });
      },
      delete_answer: function(id) {


        var formData = {
          'id': id

        }
        this.$http.delete('/answer/' + id, formData).then((response) => {
          this.submitted_text = ''
          location.reload()
         // this.fetchRecords()
        }, (response) => {
          alert('error submitting')
        });
      },

      upVote: function(answer_id) {
        var formData = {
          'answer_id': answer_id,
          'user_id': this.current_user_id,
          'vote_direction': 'up'  
        }
        this.$http.post('/vote' , formData).then((response) => {
          this.updateVotesArray(answer_id, response['data'].vote)
        }, (response) => {
          alert('error submitting')
        });
      },
       
  
      downVote: function(answer_id) {
          var formData = {
            'answer_id': answer_id,
            'user_id': this.current_user_id,
            'vote_direction': 'down'  
          }
          this.$http.post('/vote' , formData).then((response) => {
              this.updateVotesArray(answer_id, response['data'].vote)
          }, (response) => {
            alert('error submitting')
          });
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
      
      
   
      
      //will return either -1 or 1 because this is current user's vote..not all users count..
      checkVoted(answer_id) {
         for (var i = 0; i < this.my_votes.length; i++) {
            if (this.my_votes[i]["answer_id"] == answer_id) {
         
            	return this.my_votes[i]["vote"];
              break;
            }
         }
        return false;
      },



        //will be called from timer comp
        deleteQ: function() {

        		location.reload()
        },
        
      updateVotesArray(answer_id, vote) {
        var i = 0;
        while ( i < this.my_votes.length) {
            if (this.my_votes[i]["answer_id"] == answer_id) {
               this.my_votes[i]["vote"] = vote; 
               return
              
            }
          i++;
         }
        
        //if that vote didn't exist yet push that to array
        var newVote = {}
        newVote = {"answer_id" :  answer_id, "vote" : vote};
        this.my_votes.push (newVote); 
      }
      
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
