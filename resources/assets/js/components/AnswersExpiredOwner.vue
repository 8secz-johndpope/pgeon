<template>
    <div id="answers_container">
      
    
        <div class="col-md-12 subtract-margin-left" v-for="answer in answers">
            <ul class="media-list media-list-conversation c-w-md fa-ul">
                <li class="media m-b-md">
                    <a class="media-left" >
                        
                        
                        <span >  {{checkVoted(answer.id)}}</span>
                        
                    </a>
                    <div class="media-body">
                        <ul class="media-list media-list-conversation c-w-md">
                            <li class="media media-current-user m-b-md media-divider">
                                <div class="media-body">
                                    <div v-bind:class="[ accepted_answer == answer.id ? 'accepted_answer' : '']" class="media-body-text media-response media-user-response"  style="cursor: point">
                                     
                                        {{answer.answer}}
                                    </div>
                                </div>
                              
                               <form v-if="accepted_answer < 1" method="post" class='form-horizontal' action="/accept_answer"> 
                                  <input type="hidden" :value="answer.id" name="answer_id" >
                                 <input type="hidden" name="_token" :value="csrf">
                                 <input type="hidden" name="question_id" :value="question_id" >
                                 <button type="submit"  class="btn pull-right">Accept</button>
                                </form>
                              
                              
                              
                            </li>
                        </ul>
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
        answers: [],
        my_votes: [],
        csrf: "",

      };
    },
    props: ['question_id','accepted_answer'],
    mounted() {
              this.csrf = $('meta[name="csrf-token"]').attr('content');


    },
    
    methods: {

      
   
 
      
      checkVoted(answer_id) {
         for (var i = 0; i < this.my_votes.length; i++) {
            if (this.my_votes[i]["answer_id"] == answer_id) {
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
