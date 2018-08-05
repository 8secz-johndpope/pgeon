<template>

<div>

  <header class="landing_header relative">
    <div class="mw6 m-auto landing_header__inner flex items-center top__header relative pr15 pl15">
      <a href="/pending" class="question-details__close pointer">

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
      <div class="question-details__profile">
        <p class="m0">All Responses</p>
      </div>
      <div class="pointer save_button">
        <span v-on:click="saveChosenAnswer()">Save</span>
      </div>
    </div>
    <div class="details__dropdown__container mw6 m-auto">
    
    </div>
    <div class="details__overlay standard-overlay"></div>
  </header>






 <main class="landing-main mw6 m-auto pl15 pr15">
    
    <div class="open-question__right">
      <div class="open-question__meta">
        <span class="open-question__author">{{uname}}</span>
        <span class="open-question__time">Ended {{ex_date}}</span>
      </div>
      <a href="/question/234/details" class="open-question__content mt5p m0">
        <p>	{{question}}</p>
      </a>
    </div>

    <div class="open-question__seperator mt15p mb15p">
      <div class="open-question__seperator__inner open-question__seperator__inner--fullwidth"></div>
    </div>

    <div class="open-question__responses">


      <div class="open-question__response pointer" v-for="answer in answers" v-bind:class="{'chosen': answer.id == answer_id}" :id="answer.id" v-on:click="selectAnswer(answer.id)" >
        <p>{{answer.answer}}</p>
        <div class="mr10p"> {{ checkVoted(answer.id)}} </div>
      </div>

  
    </div>
  </main>
</div>
   


</template>

<script>
  export default {

    data: function() {
      return {
        answers: [],
        my_votes: [],
        csrf: "",
        uname: "",
        question: "",
          ex_date: "",	
          answer_id: 0
      };
    },
    props: ['topanswer', 'question_id', 'top_a'],
    
    mounted() {
              this.csrf = $('meta[name="csrf-token"]').attr('content');
              

    },
    
    methods: {

    	
     	
    	fetchRecords() {
        

         this.answer_id = this.top_a
    		 $.getJSON('/question/' + this.question_id + '/json', function(response) {
                this.question = response.q.question
                this.uname = response.uname
                this.ex_date = response.ex_date
                this.answers = response.answers

                
    		    //    console.log(response);
                
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
    	        		location.href=`/pending/${this.question_id}/${this.answer_id}`
    	        }, (response) => {
    	          alert('error submitting')
    	        });
    	  
      },
 
      
      checkVoted(answer_id) {
         for (var i = 0; i < this.my_votes.length; i++) {
            if (this.my_votes[i]["answer_id"] == answer_id) {
            		return this.my_votes[i]["votecount"];
            }
         }
        return 0;
      },
   
      
    }

    ,
    created: function() {

      this.fetchRecords()
      
    },


  }

</script>
