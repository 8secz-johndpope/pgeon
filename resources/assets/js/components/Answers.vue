<template>
<div>

       <div class="col-md-12 subtract-margin-left" v-for="answer in answers">
         <ul class="media-list media-list-conversation c-w-md fa-ul">
             <li class="media m-b-md">
                 <a class="media-left">
                     <button id="vote" onclick="upVote()" class="btn-borderless fa vote-arrow-up fa-arrow-up">
                         <h1 id="counter"></h1>
                     </button>
                 </a>
                 <div class="media-body">
                     <ul class="media-list media-list-conversation c-w-md">
                         <li class="media media-current-user m-b-md media-divider">
                             <div class="media-body">
                                 <div class="media-body-text media-response media-user-response">
                                   <div class="media-footer"><small class="text-muted"> <mark>{{answer.name}}</mark></small></div>
                                     {{answer.answer}}
</div>
                             </div>
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

    data: function(){
        return {
            answers: []
        };
    },
        mounted() {
            console.log('answers mounted.')
           

        },
         methods: {
            
             
          }
        ,
        created: function(){
            
            var current_qid = parseInt(window.location.pathname.split("/")[2]);
            var com = this
         
               
            //got some new questions inserted
            if (socket) {
                //just specific to this question id
                socket.emit('connect_me', 'Q_'+current_qid);    
                socket.on('new_answers', function(response){
                        com.answers.push(response)
                    });
            }
            
            $.getJSON('/question/'+current_qid+'/json', function(response){
                console.log( this.answers)
                this.answers = response
                console.log( this.answers)
          }.bind(this ));
        },


    }
</script>
