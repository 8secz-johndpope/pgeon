<template>
<div>

         <div class="container">
             <ul class="media-list  m-b-0">
                 <li class="media media-divider">
                     <div class="h5 m-b-5">
                         <span>{{question_user_slug}}</span>
                         <span class="text-muted time-align">
                

                            <span class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-caret-down"></i>
                            <answeringtimer :initial="parseInt(initial)"></answeringtimer>
                          </a>
                            <ul class="dropdown-menu pull-right" role="menu">
                                    <li>
                                        <a v-on:click="endnow()">End now <span class="fal fa-stop dropdown-icon"></span></a>
                                    </li>

                                    <li>
                                        <a v-on:click="cancelnow()">Cancel <span class="fal fa-eject dropdown-icon"></span></a>
                                    </li>
                            </ul>
                          </span>
                         </span>
                     </div>
                     <ul class="media-list media-list-conversation c-w-md">
                         <li class="media">
                             <div class="media-body">
                                 <div class="media-body-text live-media-question" style="border-bottom: transparent;">
                     
                                    
                                    {{question}}
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
         
                                           
                            <v-touch   v-bind:class="[{ 'fadeIn':  answer.id == pushed_id }, 'media-list media-list-conversation c-w-md jsvote animated'] " >
                <div class="media media-divider">
                    <div class="media-body">
                            
                            
                            
                            
                                  <div  class="media-body-text live-response flex-center">
                                  
                             
   

                                                     <table>
<tr>
<td>{{answer.answer}}</td>
</tr>
</table>

               <div id="vote"  class="voting_container vote-none" >
              <svg width="12" height="12" class="c-up" >
       
              </svg>
  <div class="v_count" >{{(answer.vote_count)?answer.vote_count:0 }}</div>
   <svg width="12" height="12" class="c-down" >
           
              </svg>
              
              </div>    

                        </div>
                            
               
                    </div>
                </div>
            </v-touch>
            
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
        my_votes: [],
        voted_now : 0,
        vote_count: 0,
        records_loaded: false,
        //animateion will work only for the new items coming in not while refreshing the page...
		pushed_id:0,
		submit_error: false,
		error_class: "danger",
		lock_voting: false,
      };
    },
    //votecount will be inc'ted or dec'ted when the user cast a vote..but accurate vote can be viewed only on page refresh
    props: ['question_id', 'hits',  'initial',    'question_user_slug', 'question'],
    mounted() {


    },
    
    watch: {
    
    },
    methods: {
     
    
    
    	
    	clearError() {
    		this.submit_error = false	
    	},
      		
    
      
      scrollToEnd: function() {
        var container = this.$el

        container.scrollTop = container.scrollHeight - container.clientHeight;

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
      
      
   
     




        endnow: function () {

        this.$http.post(`/end_now/${this.question_id}`).then((response) => {
           socket.emit('end_now', this.question_id);
           setTimeout(function(){ location.reload(); }, 1000);
        }, (response) => {
          alert('error submitting')
        });


          
        },
        
             cancelnow: function () {

        this.$http.delete(`/question/${this.question_id}`).then((response) => {
           socket.emit('cancel_now', this.question_id);
           setTimeout(function(){ location.href = "/my-questions"; }, 1000);
        }, (response) => {
          alert('error submitting')
        });


          
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
          //owner don't react..
        })
        
       
         socket.on('question_cancelled', function(id) {
        	          //owner don't react..

        })
        

      }

      this.fetchRecords();
      this.getVoteCount();
      
      
       
      
    },


  }

</script>
