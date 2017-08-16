<template>
<div>
    
  
  
<ul class="media-list media-list-conversation c-w-md" v-for="question in questions">
    
     
        <li class="media p-a">
                <a class="media-left" href="#">
                  <img class="media-object img-circle" :src="question.avatar" alt="">


                </a>
                <div class="media-body">
                    <div class="media-header">
                      <small class="text-muted"><a href="#" id="user-profile-text-link">{{question.name}}</a> </small>
                         <allqtimer :initial="question.expiring_at" :question_id="question.id" @event="deleteQ"></allqtimer>

                    </div>
                  
                    <ul class="media-list media-list-conversation c-w-md">
                        <li class="media m-b-md">
                            <div class="media-body">
                                <div class="media-body-text media-question" v-on:click="redirect(question.id)"  v-html="question.question" style="cursor: pointer;"> 
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            
    
    
           </ul>

  </div>




</template>

<script>
  export default {

    data: function() {
      return {
        questions: [],
      };
    },
    mounted() {



    },

    methods: {

      redirect: function(id) {
        location.href = 'question/' + id
      },


      //will be called from timer comp
      deleteQ: function(id) {

        let i = 0
        while (i < this.questions.length) {
          if (this.questions[i]["id"] == id) {
            this.questions.splice(i, 1)
          }
          i++;
        }
      }



    },
    created: function() {

      var com = this
      //got some new questions inserted
      if (socket)
        socket.on('new_question', function(response_id) {

          //once we get the new qid inserted we use ajax to get the details
          $.getJSON('/question_details/' + response_id, function(response) {
            //this.questions = response
            com.questions.push(response)
          }.bind(com));


        });


      $.getJSON('/questions/json', function(response) {
        console.log('dd')
        console.log(response[0]['id'])

        if (response[0]['id'] !== undefined)
          this.questions = response

      }.bind(this));
    },


  }

</script>
