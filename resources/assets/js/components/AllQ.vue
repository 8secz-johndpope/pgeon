<template>
<div>

<ul class="media-list media-list-conversation c-w-md" v-for="question in questions">
        
        <li class="media p-a">
                <a class="media-left" href="#">
                  <img class="media-object img-circle" :src="avatar(question.avatar)" alt="">


                </a>
                <div class="media-body">
                    <div class="media-header">
                        <small class="text-muted"><a href="#" id="user-profile-text-link">{{question.name}}</a> <span class="question_clock">Validity :   {{question.expiring_at}}
</span> </small>
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

    data: function(){
        return {
            questions: [],
            
        };
    },
        mounted() {
            console.log('Component mounted.')
           

        },
         methods: {
            redirect: function (id) {
                location.href='question/'+id
            },
             avatar: function(avatar) {
                 return avatar ? '/uploads/avatars/'+avatar :  '/img/profile-placeholder.svg';
             }
          }
        ,
        created: function(){
            
            var com = this
            //got some new questions inserted
            if (socket)
            socket.on('new_question', function(response){
                //console.log(com.questions)  
                
                com.questions.push(response)

                });
            
            
            $.getJSON('/questions/json', function(response){
             this.questions = response
          }.bind(this ));
        },


    }
</script>
