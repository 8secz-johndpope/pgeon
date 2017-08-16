<template>
    <div id="answers_container">
      
      <div class="col-md-12 subtract-margin-left">
                    <ul class="media-list media-list-conversation c-w-md fa-ul">
                        <li class="media m-b-md">
                            <a class="media-left">
                                <button id="vote" onclick="upVote()" class="btn-borderless">
                                    <h1 id="counter">-</h1>
                                </button>
                            </a>
                            <div class="media-body">
                                <ul class="media-list media-list-conversation c-w-md">
                                    <li class="media media-current-user m-b-md media-divider">
                                        <div class="media-body">
                                            <div class="media-body-text media-response media-user-response" style="background: #E8EFF7;;</span></butt;</span></button>;</span></button>;</span></button>;">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <span style="display: block">
   estas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</span>
                                            </div>
                                        </div>
                          
                        </li>
                    </ul>
                </div>
  </li></ul></div>
      
                <div class="col-md-12 subtract-margin-left">
                    <ul class="media-list media-list-conversation c-w-md fa-ul">
                        <li class="media m-b-md">
                            <a class="media-left">
                                <button id="vote" onclick="upVote()" class="btn-borderless">
                                    <h1 id="counter">-</h1>
                                </button>
                            </a>
                            <div class="media-body">
                                <ul class="media-list media-list-conversation c-w-md">
                                    <li class="media media-current-user m-b-md media-divider">
                                        <div class="media-body">
                                            <div class="media-body-text media-response media-response-margin" onclick="upVote();" style="cursor: pointer;">
                                                estas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
</div>
                                        </div>
                            
                        </li>
                    </ul>
                </div>
  </li></ul></div>
      
        <div class="col-md-12 subtract-margin-left" v-for="answer in answers">
            <ul class="media-list media-list-conversation c-w-md fa-ul">
                <li class="media m-b-md">
                    <a class="media-left">
                        <button id="vote" onclick="upVote()" class="btn-borderless">
                            <h1 id="counter"></h1>
                        </button>
                    </a>
                    <div class="media-body">
                        <ul class="media-list media-list-conversation c-w-md">
                            <li class="media media-current-user m-b-md media-divider">
                                <div class="media-body">
                                    <div class="media-body-text media-response media-user-response"  style="cursor: pointer; background: #E8EFF7;">
                                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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

      };
    },
    props: ['question_id', 'current_user_id', 'question_owner_id'],
    mounted() {
      console.log('answers mounted.')


    },
    watch: {
      answers() {

        console.log('fored')

        for (var i = 0; i < this.answers.length; i++) {
          console.log(this.answers[i]["user_id"])
          if (this.answers[i]["user_id"] == this.current_user_id) {
            console.log('answerwerd')
            this.already_answered = true
            this.placeholder = "You already have posted an answer"
            break;
          }

        }

      },
    },
    methods: {

      scrollToEnd: function() {
        var container = this.$el

        container.scrollTop = container.scrollHeight - container.clientHeight;

      },
      submit_answer: function() {
        // if (this.already_answered)
        // return false;

        var formData = {
          'question_id': this.question_id,
          'answer': this.submitted_text,
        }
        this.$http.post('/answer', formData).then((response) => {
          this.submitted_text = ''
        }, (response) => {
          alert('error submitting')
        });
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
      }

      $.getJSON('/question/' + this.question_id + '/json', function(response) {
        this.answers = response
      }.bind(this));
    },


  }

</script>
