<template>
<div>

         <div class="container">
             <ul class="media-list  m-b-0">
                 <li class="media media-divider">
                     <div class="h5 m-b-5">
                         <span><a :href="'/'+question_user_slug">{{question_user_slug}}</a></span>
                         <span class="text-muted time-align">
                         <allqtimer :initial="parseInt(initial)" :question_id="parseInt(question_id)" @event="reload"></allqtimer>
                         </span>
                     </div>
                     <ul class="media-list media-list-conversation c-w-md">
                         <li class="media">
                             <div class="media-body">
                                 <div class="media-body-text live-media-question" style="border-bottom: transparent; border: 1px solid #D1D4D5;">
                     
                                                                                       <table  class="bkword">
<tr>
<td> 
                                    {{question}}</td>
</tr>
</table>
                                 </div>
                                 
                                   <div class="media-footer">
                                <small class="text-muted">
                                <div class="divide tc relative m-t-5">
                                        <div  class="stats dib bg-F8F9F9 ph3 pull-right">
                                            <span data-toggle="tooltip" title="Views" class="number"> {{hits}} <i class="fal fa-eye"></i>&nbsp;</span>
                                            <span data-toggle="tooltip" title="Responses" class="number">{{answers.length}} <i class="fal fa-comments"></i>&nbsp;</span>
                                            <span data-toggle="tooltip" title="Votes" class="number">{{vote_count}} <i class="fal fa-check-square"></i></span>
                                        </div>
                                    </div></small>
                            </div>
                             </div>
                             
                             
                         </li>
                     </ul>
                 </li>
             </ul>
         </div>
         
         
         
          <div class="container">
              <div  v-for="answer in answers">
             
                                          <div class="media-list media-list-conversation c-w-md jsvote animated" v-bind:class="{ 'fadeIn':  answer.id == pushed_id}"  v-if="ownerOfAnswer(answer.user_id)">
                <div class="media media-divider">
                    <div class="media-body">
                    
                       <div class="media-body-text live-response flex-center">
                             
       
                                                    <table>
<tr>
<td>{{answer.answer}}</td>
</tr>
</table>
   <a  style="color: rgba(177, 179, 182, 0.6);"  v-on:click="delete_answer(answer.id)">
                                    
                                                 <span  class="fal fa-trash"></span>
                                </a>
                                
          
                            </div>
                            
                            </div>
                            </div></div>
                            

                
                
                </div>
                 </div>
     

    <div id="answers_container">
    
      		<div style="width: auto;box-shadow: inset 0px 0px .05 black;" v-if="records_loaded && answers.length<1">
            <div class="container text-center m-t-10p">
                <img src="/img/tumbleweed.svg" />
                          
                <h4 class="text-muted m-t-0" >
   No responses yet.. </h4>
  
            </div>
        </div>
      
           <div style="width: auto;box-shadow: inset 0px 0px .05 black;" v-else>
            <div class="container">
            
            <div  v-for="(answer, index) in answers"  v-bind:key="answer">
         
                                           
                            <v-touch v-on:tap="mup(answer.id, $event, index)"  v-on:press="mdown(answer.id, $event, index)"  v-bind:press-options="{ time: '500' }"  v-bind:class="[{ 'fadeIn':  answer.id == pushed_id }, 'media-list media-list-conversation c-w-md jsvote animated'] "  v-if="!ownerOfAnswer(answer.user_id)">
                <div class="media media-divider">
                    <div class="media-body">
                            
                            
                            
                            
                                  <div  class="media-body-text live-response flex-center">
                                  
                             
   

                                                     <table>
<tr>
<td>{{answer.answer}}</td>
</tr>
</table>

               <div id="vote"  class="voting_container" v-bind:class="{ 'vote-up': checkVoted(answer.id) == 1, 'vote-down': checkVoted(answer.id) == -1, 'vote-none':  (checkVoted(answer.id) === false || checkVoted(answer.id) === 0)}">
              <svg width="12" height="12" class="c-up" >
              <use  v-bind:class="{ 'vote-up': checkVoted(answer.id) == 1 }"  class="caret-up" xlink:href='/img/sprites/solid.svg#caret-up'></use>
              </svg>
  <div class="v_count"  > &nbsp;</div>
   <svg width="12" height="12" class="c-down" >
              <use  v-bind:class="{ 'vote-down': checkVoted(answer.id) == -1 }"  class="caret-down" xlink:href='/img/sprites/solid.svg#caret-down'></use>
              </svg>
              
              </div>    

                        </div>
                            
               
                    </div>
                </div>
            </v-touch>
            
           </div>
           
           
                         </div>
        </div>
        
        



        <div v-if="!already_answered" class="fixed-bottom-footer">
                                           <div class="alert container" :class="'alert-'+submit_error.class" v-if="submit_error">
                                        <a href="#" class="close" v-on:click="clearError()">&times;</a>
   <b>{{this.submit_error.title}}</b>{{this.submit_error.error}}
</div>
            <div class="navbar-fixed-bottom footer-toggle" v-else>
                <div class="container m-t-15">
                    <ul class="media-list media-list-conversation c-w-md">
                        <li class="media media-divider">
                            <div class="media-body">
                                <ul class="media-list media-list-conversation c-w-md">
                                    <li class="media media-current-user">
     

                                        <div class="input-group" >

                                          <div class="card">
  <div class="ans-composer">
    <textarea  v-model="submitted_text" @input="maxHighlight"  class="editor-textarea js-keeper-editor footer-textarea "  style="border-right: none;" :placeholder="'Responding as '+current_user_slug + '..'" autofocus id="footer-textarea" overflow="hidden" rows="1"></textarea>
        <div class="js-keeper-placeholder-back" v-html="placeholder_content"></div>

  </div>
</div>

                                            <span v-if=is_valid v-on:click="submit_answer()" class="input-group-addon footer-btn ll">

                                               <svg width="16" height="16" class="response-icon" >
              <use  xlink:href='/img/sprites/solid.svg#paper-plane'></use>
              </svg>

                                            </span>
                                             <span v-else class="input-group-addon footer-btn">                       <svg width="16" height="16" class="response-icon-grey" >
              <use  xlink:href='/img/sprites/solid.svg#paper-plane'></use>
              </svg>
                                            </span>
                                        </div>
                                        
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
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
        placeholder_content: "",
        my_votes: [],
        voted_now : 0,
        vote_count: 0,
        records_loaded: false,
        is_valid:false,
        //animateion will work only for the new items coming in not while refreshing the page...
		pushed_id:0,
		submit_error: false,
		error_class: "danger",
		lock_voting: false,
      };
    },
    //votecount will be inc'ted or dec'ted when the user cast a vote..but accurate vote can be viewed only on page refresh
    props: ['question_id', 'hits', 'current_user_id', 'question_owner_id', 'initial', 'question_id',   'question_user_slug', 'question', 'current_user_slug'],
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
     
        //callback 

    	reload() {
    		location.reload()
    	}
      ,
      maxHighlight() {
        var currentValue = this.submitted_text
         var realLength = 120;
         var remainingLength = 120 - currentValue.length;
          if (0 > remainingLength) {
                // Split value if greater than 
                var allowedValuePart = currentValue.slice(0, realLength),
                    refusedValuePart = currentValue.slice(realLength)
                ;
                this.is_valid = false;
                
                // Fill the hidden div.
                this.placeholder_content = allowedValuePart + '<em>' + refusedValuePart + '</em>'
              } else {
                this.placeholder_content = ''
                this.is_valid = (currentValue.length>0)
                  
              }
      },
          
     
    	
    	clearError() {
    		this.submit_error = false	
    	},
      	 mup(answer_id, e, i) {
      		  
    		console.log (this.lock_voting)
    				if (this.lock_voting) return
    				//convert null to 0
    				this.answers[i].vote_count =  this.answers[i].vote_count || 0
    				this.lock_voting = true
      		    var $icon
      		    var $parent 

      		    $parent = $(e.target).parents(".jsvote")
      		    $icon = $parent.find("#vote")

      		    $icon.hasClass("vote-none") && $icon.removeClass("vote-none") 
      		    
      		    if( $icon.hasClass("vote-up") ){
      		      $icon.removeClass("vote-up") &&
      		    	  this.castVote(answer_id, 0)
      		    	  this.answers[i].vote_count =  this.answers[i].vote_count-1 
      		//    	   console.log('u to -')
      		    } else{ //up voting
      		    	//	    console.log('- to u')
      		    		//are we upvoting from a down vote..ie. long press..then we need a +2 bcz from -1 it should go to +1 not 0
      		    		if ($icon.hasClass("vote-down") && $icon.removeClass("vote-down")) {
      		    		//  	console.log('+2 voting')
      		    			this.answers[i].vote_count =  parseInt(this.answers[i].vote_count)+2
      		    		} else {
      		    			this.answers[i].vote_count =  parseInt(this.answers[i].vote_count)+1
      		    		}
      		    	  this.castVote(answer_id, 1)
      		   
      		    }
      	
      	
    	 }	,   	
    	 mdown(answer_id, e, i) {
    		 if (this.lock_voting) return
    		//convert null to 0
		this.answers[i].vote_count =  this.answers[i].vote_count || 0
    		 this.lock_voting = true
    		 var el = e.target
    		  var com = this
    		  
    		  

    			    var $icon
    			    var $parent 

    			    $parent = $(e.target).parents(".jsvote")

    			    $icon = $parent.find("#vote")

    			    $icon.hasClass("vote-none") && $icon.removeClass("vote-none") 
    			    
    			  
    			  	if(!$icon.hasClass("vote-down")) { 
    			  		
	    			    //  console.log('- to d')
		           //are we longpressing from an up vote..then we need a -2 bcz from 1 it should go to -1 not 0

	    			    if ($icon.hasClass("vote-up") && $icon.removeClass("vote-up"))  {
	    			    	  	com.answers[i].vote_count =  com.answers[i].vote_count-2	
	    			      }else {
	    			    	  	com.answers[i].vote_count =  com.answers[i].vote_count-1		  	
	    			      }
    			  		com.castVote(answer_id, -1)
        			    
    			  	} else {
    			  		//-1 achieved no futher downpressing allowd..but lock will not release becz we never hit db
    			  		 this.lock_voting = false
    			  	}
    			    
    		 
    		  
    		  

    	 }	,
      ownerOfAnswer: function(user_id) {
        return this.current_user_id == user_id
      },
      scrollToEnd: function() {
        var container = this.$el

        container.scrollTop = container.scrollHeight - container.clientHeight;

      },
      submit_answer: function() {

         // console.log( this.submitted_text);
      
        var formData = {
          'question_id': this.question_id,
          'answer': this.submitted_text,
        }
        this.$http.post('/answer', formData).then((response) => {
          this.ted_text = ''
          this.fetchRecords()
        }, (response) => {
        	 	this.submit_error = response.body
        	 //	console.log(response.body.error)
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

      castVote: function(answer_id, vote) {
        var formData = {
          'answer_id': answer_id,
          'user_id': this.current_user_id,
          'vote':  vote 
        }
        this.$http.post('/vote' , formData).then((response) => {
          this.updateVotesArray(answer_id, response['data'].vote)
       	  this.getVoteCount();
          this.lock_voting = false
        }, (response) => {
          alert('error submitting')
        });
      },
       
      getVoteCount() {
    	  	  var com = this	
          $.getJSON('/get_vote_count_for_question/'+this.question_id, function(votes) {
          		com.vote_count = votes['vote_count']
          }, (response) => {
              alert('error fetching vote counts')
          });
      }
      ,
      fetchRecords() {
	    	  $.getJSON('/question/' + this.question_id + '/json', function(response) {
	    	        this.answers = response
	    	        
	    	        // var com = this
	    	        $.getJSON('/get_votes/'+this.question_id, function(votes) {
	    	       //   com.my_votes = votes
	    	            this.my_votes = votes
	    	          	this.records_loaded = true
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
        	
        //	if(vote == 0 )
        	
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
        	  com.pushed_id = response.id;	
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
      this.getVoteCount();
      
      
       
      
    },


  }

</script>
