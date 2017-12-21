<template>

    <div class="modal-content">
    
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <button type="button" class="btn btn-sm btn-primary pull-right app-new-msg js-newMsg"  v-on:click="saveChosenAnswer()" >Save</button>
        <h4 class="modal-title">All Responses</h4>
      </div>
      <div class="modal-header">
        <div>
          <ul class="media-list media-list-conversation c-w-md">
            <li class="media media-divider">
              <div class="media-body">
                <div class="media-header">
                  <small class="text-muted"><a href="#" id="user-profile-text-link">{{uname}}</a></small>
                  <small class="text-muted pull-right"> Ended: {{ex_date}}</small>
                </div>
                <ul class="media-list media-list-conversation c-w-md">
                  <li class="media">
                    <div class="media-body">
                      <div class="media-body-text live-media-question">
                      	{{question}}
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="modal-body p-a-0 js-modalBody">
        <div class="modal-body-scroller">
        <div style="margin: 15px;">
       
            
          
            <div class="vote-item flex-center" v-for="answer in answers">
              <input type="radio" class="pending-radio"  :id=answer.id name="select" v-on:click="selectAnswer(answer.id)" >
              <label :for=answer.id class="vote_count">
              <!-- 
              <a class="vote-count">
                        <button id="vote" class="btn-borderless btn-container">
                            <h1 id="counter"> <span> {{checkVoted(answer.id)}}</span></h1>
                        </button>
                    </a>
                    -->
                                     <p>
            		{{answer.answer}}
            </p>
                                </label>
            </div>
 
          </div>
        
          
        </div>

      </div>
    </div>


</template>

<script>
  export default {

    data: function() {
      return {
        answers: [],
        my_votes: [],
        csrf: "",
        question_id: 0,
        uname: "",
        question: "",
        	ex_date: ""	
      };
    },
    
    mounted() {
              this.csrf = $('meta[name="csrf-token"]').attr('content');


    },
    
    methods: {

    	
     	
    	fetchRecords(question_id, uname, question, ex_date) {
    		this.question_id = question_id
    		this.uname = uname
    		this.question = question
    		this.ex_date = ex_date
    		 $.getJSON('/question/' + this.question_id + '/json', function(response) {
    		        this.answers = response
    		        
    		        // var com = this
    		        $.getJSON('/get_votes_with_count/'+this.question_id, function(votes) {
    		       //   com.my_votes = votes
    		            this.my_votes = votes
    		          
    		          
    		      }.bind(this));
    		        
    		      }.bind(this));	
    	},
    	
      selectAnswer(answer_id) {
    	  
    	  	this.answer_id = answer_id
    	  	
      },
   
      saveChosenAnswer() {
    	  
    	  var formData = {
    	          'question_id': this.question_id,
    	          'answer_id': this.answer_id,
    	        }
    	        this.$http.post('/set_chosen_answer', formData).then((response) => {
    	        		location.reload()
    	        }, (response) => {
    	          alert('error submitting')
    	        });
    	  
      },
 
      
      checkVoted(answer_id) {
         for (var i = 0; i < this.my_votes.length; i++) {
            if (this.my_votes[i]["answer_id"] == answer_id) {
            		if(this.my_votes[i]["votecount"] > 0 )
            		  	return '+'+this.my_votes[i]["votecount"];
            		return this.my_votes[i]["votecount"];
              
            }
         }
        return "-";
      },
   
      
    }

    ,
    created: function() {

       
      
    },


  }

</script>
