<template>
    <div >
      
      
        <div class="container">
            <!-- starting here -->
      
            <div class="vote-item flex-center " v-for="answer in answers">
                <input  type="radio"  :id=answer.id name="select" v-on:click="selectAnswer(answer.id)" >
                <label :for=answer.id class="vote_count"  >
                    <a class="vote-count">
                        <button id="vote" class="btn-borderless btn-container">
                            <h1 id="counter"> <span> {{checkVoted(answer.id)}}</span></h1>
                        </button>
                    </a>
                    <p class="flexone">
 						{{answer.answer}}
                         </p>
                </label>
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

      };
    },
    props: ['question_id'],
    mounted() {
              this.csrf = $('meta[name="csrf-token"]').attr('content');


    },
    
    methods: {

      selectAnswer(answer_id) {
    	  
    		$("#reponse-updated").hide()
    	  	var formData = {
    	          'question_id': this.question_id,
    	          'answer_id': answer_id,
    	        }
    	        this.$http.post('/set_chosen_answer', formData).then((response) => {
    	        	$("#reponse-updated").show()
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


   

      $.getJSON('/question/' + this.question_id + '/json', function(response) {
        this.answers = response
        
        // var com = this
        $.getJSON('/get_votes_with_count/'+this.question_id, function(votes) {
       //   com.my_votes = votes
            this.my_votes = votes
          
            console.log(this.my_votes[0].votecount)
          
      }.bind(this));
        
      }.bind(this));
      
       
      
    },


  }

</script>
