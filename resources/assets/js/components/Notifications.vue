<template>
<div>
    
         <li class="list-group-item media p-a"  v-for="question_posted in questions_created">
                            <div class="media-left">
                                <span class="icon text-muted icon-message"></span>
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <a><strong>{{question_posted.uname}}</strong></a>
                                    <small class="pull-right text-muted"> hrs ago..</small> posted a new question
                                </div>
                                <div class="media-body">
                                    <ul class="media-list media-list-conversation c-w-md">
                                        <li class="media m-b-md">
                                            <div class="media-body">
                                                <div class="media-body-text media-question" v-on:click="redirect(question_posted.question_id)"   v-html="question_posted.question"  style="cursor: pointer;">
</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>

  </div>




</template>

<script>
  export default {

    data: function() {
      return {
        questions_created: [],
        x: [{uname: "Jacob Thornton", question: "<p>labr</p>"}]
      };
    },
    mounted() {


    },

    methods: {

      redirect: function(id) {
        location.href = 'question/' + id
      },


     



    },
    created: function() {

	    	$.getJSON('/notifications/json', function(response) {
	            this.questions_created = response
	  		
	          }.bind(this));
    	
    	//       var com = this
//       //got some new questions inserted
//       if (socket)
//         socket.on('new_question', function(response_id) {

//           //once we get the new qid inserted we use ajax to get the details
//           $.getJSON('/question_details/' + response_id, function(response) {
//             //this.questions = response
//             com.questions.push(response)
//           }.bind(com));


//         });


//       $.getJSON('/questions/json', function(response) {
//         console.log('dd')
//         console.log(response[0]['id'])

//         if (response[0]['id'] !== undefined)
//           this.questions = response

//       }.bind(this));
     }


  }

</script>
