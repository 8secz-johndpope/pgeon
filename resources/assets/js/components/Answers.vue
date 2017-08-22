<template>
    <div id="answers_container">
      
    
        <div class="col-md-12 subtract-margin-left" v-for="answer in answers">
            <ul class="media-list media-list-conversation c-w-md fa-ul">
                <li class="media m-b-md">
                    <a class="media-left" v-if="question_owner_id != current_user_id">
                        
                        <span v-bind:class="{ voted : checkVoted(answer.id) == 1 }" v-on:click="upVote(answer.id,$event)"  v-if="!ownerOfAnswer(answer.user_id)" class="icon icon-thumbs-up"></span>
                        <span v-bind:class="{ voted : checkVoted(answer.id) == -1 }" v-on:click="downVote(answer.id,$event)" v-if="!ownerOfAnswer(answer.user_id)"  class="icon icon-thumbs-down" ></span>
                        <span  v-if="ownerOfAnswer(answer.user_id)" style="color:#eaeaea">{{votecount}}</span>
                        
                    </a>
                    <div class="media-body">
                        <ul class="media-list media-list-conversation c-w-md">
                            <li class="media media-current-user m-b-md media-divider">
                                <div class="media-body">
                                    <div v-bind:class="[ ownerOfAnswer(answer.user_id) ? 'your_answer' : '']" class="media-body-text media-response media-user-response"  style="cursor: point">
                                         <button  v-if="ownerOfAnswer(answer.user_id)" type="button" class="close" data-dismiss="alert" aria-label="Close" v-on:click="delete_answer(answer.id)" >
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        {{answer.answer}}
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

        <div v-if="question_owner_id != current_user_id"> 
            <div class="footer navbar-fixed-bottom">
                <div class="col-md-12">

                    <form v-on:submit.prevent="submit_answer()" class='form-horizontal'>
                        <ul class="media-list">
                            <li class="media m-b-md media-divider">
                                <div class="media-body">
                                    <li class="media media-current-user m-b-md">
                                        <div class="input-group">
                                            <input v-model="submitted_text" class="form-control response-form" :placeholder="placeholder"  :disabled="already_answered"  type="text" maxlength="150" />
                                            <span class="input-group-btn"><button  class="btn btn-default response-button" type="submit">
                      <span class="icon icon-circle-with-plus response-icon"></span>
                                            </button>
                                            </span>
                                        </div>
                                        <div class="media-footer text-right">
                                        </div>
                                    </li>
                                </div>
                            </li>
                        </ul>
                    </form>
                </div>
                <!-- /input-group -->
            </div>
        </div>

    </div>





</template>

<script>
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
          this.submitted_text = ''
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
        }, (response) => {
          alert('error submitting')
        });
      },

      upVote: function(answer_id,e) {
        var formData = {
          'answer_id': answer_id,
          'user_id': this.current_user_id,
          'vote_direction': 'up'  
        }
     //   var el = e.target
        this.$http.post('/vote' , formData).then((response) => {
            //it is upvoted.. remove other down vote highlited if any
          this.updateVotesArray(answer_id, response['data'].vote)
            
      //     $(el).parent().find('.icon-thumbs-down').removeClass('voted')
       //    $(el).addClass('voted')
        }, (response) => {
          alert('error submitting')
        });
      },
       
      downVote: function(answer_id,e) {
        var formData = {
          'answer_id': answer_id,
          'user_id': this.current_user_id,
          'vote_direction': 'down'  
        }
     //   var el = e.target
        this.$http.post('/vote' , formData).then((response) => {
            this.updateVotesArray(answer_id, response['data'].vote)
      //    $(el).parent().find('.icon-thumbs-up').removeClass('voted')
       //   $(el).addClass('voted')
        }, (response) => {
          alert('error submitting')
        });
      },
      
      checkVoted(answer_id) {
         for (var i = 0; i < this.my_votes.length; i++) {
            if (this.my_votes[i]["answer_id"] == answer_id) {
              return this.my_votes[i]["vote"];
              break;
            }
         }
        return false;
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

      }

      $.getJSON('/question/' + this.question_id + '/json', function(response) {
        this.answers = response
        
        // var com = this
        $.getJSON('/get_votes/'+this.question_id, function(votes) {
       //   com.my_votes = votes
            this.my_votes = votes
          
            console.log(this.my_votes[0])
          
      }.bind(this));
        
      }.bind(this));
      
       
      
    },


  }

</script>
