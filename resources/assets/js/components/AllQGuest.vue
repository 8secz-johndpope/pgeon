<template>
<div>


<div class="nav_all">




<nav class="navbar navbar-inverse app-navbar">
            <div class="container nav-container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">
                        <img src="/img/pgeon-logo-mobile.svg" alt="Pgeon">
                    </a>
                </div>
                <div class="navbar-right" id="navbar-collapse-main">
                    <ul class="nav navbar-nav m-r-0" style="width: 125px;">
                        <li>
                            <a href="/register" type="button" style="color: #676D7A; font-size: 12px;" class="btn-link">Sign up</a>
                        </li>
                        <li>
                            <div>
                                <a href="/login" class="btn btn-sm btn-default" style="margin-top: 4px;">Log in</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>







<div class="second-nav-container">
	<ul class="container nav nav-bordered second-nav">
		<div class="iconav-slider">
			<ul class="nav nav-pills iconav-nav">
				<li class="tab active"><a href="#" data-container="body"><small>Questions</small></a>
				</li>
				<li class="tab"><a href="/responses"><small>Responses</small></a>
				</li>


				<li  class="f-right small"><span class="f-right-text">All</span>
					&nbsp; <span class="fa fa-sort"></span></li>
			</ul>
		</div>
	</ul>
</div>
</div>


	<div class="container content"  v-if="questions.length<1">
		<div class="container text-center m-t-5p">
			<img src="/img/chat-bubble.svg" />
			<h4 class="text-muted m-t-0">
			
				No live questions to display. <br>Please check back soon!
			</h4>
		</div>
	</div>




        <div class="container content">
            <div class="row">
                <div class="col-md-12">
                
                    <ul class="media-list media-list-conversation c-w-md" v-for="question in questions">
                        <li class="media m-b">
                            <a class="media-left" href="#">
                                <img class="media-object img-circle" :src="question.avatar"  id="user-profile-image-link">
                            </a>
                            <div class="media-body">
                                <div class="h5 m-b-5">
                                    <span>{{question.name}}</span>
                                    <span class="text-muted time-align"><allqtimer :initial="question.expiring_at"
								:question_id="question.id" @event="deleteQ"></allqtimer></span>
                                </div>
                                <ul class="media-list media-list-conversation c-w-md">
                                    <li class="media">
                                        <div class="media-body">
                                            <div class="media-body-text live-media-question"  v-on:click="redirect(question.id)"  @mousedown="addResponseFocus($event)" @mouseup="removeResponseFocus($event)" @mouseleave="removeResponseFocus($event)" style="cursor: pointer;">
                                            {{question.question}}
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
  
  
                </div>
            </div>
        </div>








</div>




</template>

<script>
import {CommonMixin} from '../mixins/CommonMixin.js';

  export default {

    data: function() {
      return {
        questions: [],
        current_filter: 'everyone',
        uf: {}
        
      };
    },
    props: ['user_id', 'role_id', 'avatar', 'slug', 'csrf_field'],
    mounted() {
	//	this.uf = JSON.parse(this.user_followings)
		//this.filter_questions()
    },
    
    mixins: [CommonMixin],
    

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
            com.decide_questions()
          }.bind(com));


        });


      $.getJSON('/questions/json', function(response) {
    	  //console.log(response)
        if (response[0]['id'] !== undefined)
          this.questions = response
      }.bind(this));
    },


  }

</script>
