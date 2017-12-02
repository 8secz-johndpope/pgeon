<template>
<div>
<div class="nav_all">

<nav class="navbar navbar-inverse navbar-fixed-top app-navbar">
            <div class="container nav-container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">
                        <img src="/img/pgeon-logo-mobile.svg" alt="Pgeon">
                    </a>
                    <ul class="nav navbar-nav">
                        <li v-if="role_id==3">
                            <form class="navbar-form">
                                <div>
                                    <a href="/my-questions" class="my-questions btn btn-sm btn-primary-outline"><span>My Questions</span></a>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="navbar-right" id="navbar-collapse-main">
                    <ul class="nav navbar-nav m-r-0">
                        <li>
                            <a href="/people" class="app-notifications-icon"><span class="fal fa-users"></span><span class="fa fa-users"></span></a>
                        </li>
                        <li>
                            <a href="/notifications" class="app-notifications-icon"><span class="fal fa-bell"></span><span class="fa fa-bell"></span></a>
                        </li>
                        <li>
                            <button id="profile-button" class="btn btn-default navbar-btn navbar-btn-avitar" data-toggle="popover">
                                <img class="img-circle" :src="avatar">
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <ul class="mobile-dropdown no-height">
            <li>
                <a :href="slug">Profile</a>
            </li>
            <li>
                <a href="/profile">Settings</a>
            </li>
            <!-- <li>
                <a href="">Help</a>
            </li> -->
            <li>
             <a href="/logout"          onclick="event.preventDefault();   document.getElementById('logout-form').submit();">
           	  Logout
             </a>

            </li>
        </ul>
          <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                             <input type="hidden" name="_token" :value="csrf_field">
                                             
                                         </form>



            
            <div class="second-nav-container">
	<ul class="container nav nav-bordered second-nav">
		<div class="iconav-slider">
			<ul class="nav nav-pills iconav-nav">
				<li class="tab"><a href="/questions" data-container="body"><small>Questions</small></a>
				</li>
				<li class="tab active"><a href="#"><small>Responses</small></a>
				</li>
				<li v-if="user_id > 0" class="f-right small">
				
				<span class="f-right-text"  v-on:click=filter_questions() v-if="current_filter == 'everyone'">Followed</span>
				<span class="f-right-text"  v-on:click="unfilter_questions()"  v-if="current_filter == 'follow'">Everyone</span>
					&nbsp; <span class="fa fa-sort"></span>
					
					</li>
					
				<li v-else class="f-right small"><span class="f-right-text">Everyone</span>
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
                    <ul class="media-list media-list-conversation c-w-md"  v-for="question in questions">
                        <li class="media m-b">
                            <a class="media-left" :href="question.slug">
                                <img class="media-object img-circle" :src="question.avatar" id="user-profile-image-link">
                            </a>
                            <div class="media-body">
                                <div class="h5 m-b-5">
                                    <span>{{question.name}}</span>
                                    <span class="fa fa-long-arrow-left text-muted"></span>
                                    <span>{{question.answered_by}}</span>
                                    <span class="text-muted time-align">{{question.ago}}</span>
                                </div>
                                <ul class="media-list media-list-conversation c-w-md">
                                    <li class="media">
                                        <div class="media-body">
                                            <div class="media-body-text  media-question" v-on:click="redirect(question.id)"  @mousedown="addResponseFocus($event)" @mouseup="removeResponseFocus($event)" @mouseleave="removeResponseFocus($event)"  style="cursor: pointer;">
                                            {{question.question}}
</div>
                                            <ul class="media-list  media-secondary media-list-conversation c-w-md">
                                                <li class="media media-current-user media-divider">
                                                    <div class="media-body">
                                                        <div class="media-body-text media-response media-response-margin" style="cursor: pointer;">
                                                        {{question.answer}}
</div>
                                                    </div>
                                                </li>
                                            </ul>
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
	        all_questions: [],
	        questions: [],
	        current_filter: 'everyone',
	        uf: {}
	        
	      };
	    },
	    props: ['user_id','user_followings', 'role_id', 'avatar', 'slug', 'csrf_field'],
	    mounted() {
			this.uf = JSON.parse(this.user_followings)
			//console.log(this.uf )
			//this.filter_questions()
	    },
	    mixins: [CommonMixin],
	    
	    methods: {
	    	
	    		decide_questions: function () {
	    			if(this.current_filter == 'follow') {
	   				 this.filter_questions()
	    			}else{
	    				this.unfilter_questions()
	    			}
	    		},
	    		
	    		filter_questions: function() {
	    		//	console.log(this.uf)
	    			var filtered_questions = []
	    			this.current_filter = 'follow'	
	    			for (var i=0; i < this.all_questions.length; i++) {
	    				console.log(this.all_questions[i])
	    				if (this.uf.indexOf(this.all_questions[i].user_id) != -1) {
	    					filtered_questions.push(this.all_questions[i])
	    				}
	    			}
	    		//	console.log(filtered_questions)
	    			//filtered_questions
	    			this.questions = filtered_questions
	    			
	    			
	    		},
	    	
	    		unfilter_questions: function() {
	    			this.questions = this.all_questions
	    		},
	      redirect: function(id) {
	        location.href = 'question/' + id
	      },


	



	    },
	    created: function() {

     



      $.getJSON('/responses/json', function(response) {

    	  	
        if (response[0]['id'] !== undefined)
          this.all_questions = response
          this.decide_questions()			
      }.bind(this));
    },


  }

</script>
