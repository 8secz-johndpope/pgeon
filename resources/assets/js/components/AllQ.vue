<template>
<div>


<div class="nav_all">
<nav class="navbar navbar-inverse app-navbar">
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
				<li class="tab active"><a href="#" data-container="body"><small>Questions</small></a>
				</li>
				<li class="tab"><a href="/responses"><small>Responses</small></a>
				</li>
				<li v-if="current_filter == 'follow'" class="f-right small"  v-on:click="featured_questions()"  >

				<span class="f-right-text" >Following</span>
					&nbsp; <span class="fa fa-sort"></span>

					</li>

			<li v-if="current_filter == 'everyone'" class="f-right small" v-on:click="followed_questions()" >

				<span class="f-right-text"  >Featured</span>
				
					&nbsp; <span class="fa fa-sort"></span>

					</li>
			
			</ul>
		</div>
	</ul>
</div>
</div>


	<div class="container content"  v-if="questions.length<1">
		<div class="container text-center m-t-5p">
			<img src="/img/chat-bubble.svg" />
			<h4 class="text-muted m-t-0">
				 <img v-if="still_deciding_count" src='/img/loader.gif' />
				 <span v-else>No live questions to display. <br>Please check back soon!</span>
			</h4>
		</div>
	</div>




        <div class="container content">
            <div class="row">
                <div class="col-md-12">

                    <ul class="media-list media-list-conversation c-w-md" v-for="question in questions">
                        <li class="media m-b">
                            <a class="media-left" :href="question.slug">
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
                    
                    
                    <ul class="load_more" v-if="currently_fetched_records_count>=paginate"><li class="" v-on:click="get_paginated_results()">{{loading_txt}}</li></ul>


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
        current_filter: 'follow',
		paginate:12,
		currently_fetched_records_count:0,
		current_page:0,
		loading_txt: "more",
		still_deciding_count: true,
      };
    },
    props: ['user_id', 'role_id', 'avatar', 'slug', 'csrf_field'],
    mounted() {
    		console.log(this.still_deciding_count)
    },

    mixins: [CommonMixin],


    methods: {
    
		reset: function () {
			this.questions = []
			this.current_page = 0
			this.currently_fetched_records_count = 0
			//questions.length will be zero but not finalized yet until push to array
			this.still_deciding_count = true
		},
		
		get_paginated_results: function () {
		//	console.log(this.currently_fetched_records_count)
			//pagination counters will be reset when we click on filters
			this.current_page ++;
			if (this.current_filter == 'follow') {
				this.get_paginated_qff()
			}else {
				this.get_paginated_featured()
			}
		},
    	
		get_paginated_qff: function () {
			 this.loading_txt = "loading.."	
			 $.getJSON(`/qff/${this.paginate}/${this.current_page}`, function(response) {
				 	this.currently_fetched_records_count = 0
			        if (response[0]['id'] !== undefined) {
			        		this.currently_fetched_records_count = response.length
			        		this.questions.push(...response)
			        		this.loading_txt = "more"	
			        }
				 	//if this is empty even after .push?
				 	if (this.questions.length < 1)
				 		this.still_deciding_count = false
			      }.bind(this));
		},
    		followed_questions: function() {
    			this.reset()
    			this.current_filter = 'follow'
    			this.get_paginated_qff()	 

    		},
    		/** will be called only from load more links as well**/
    		get_paginated_featured: function () {
    			this.loading_txt = "loading.."	
    			 $.getJSON(`/featuredq/${this.paginate}/${this.current_page}`, function(response) {
    				  this.currently_fetched_records_count = 0
   		          if (response[0]['id'] !== undefined) {
   		        	 	this.currently_fetched_records_count = response.length
   		          	this.questions.push(...response)
   		         	this.loading_txt = "more"	
   		          }
    				  if (this.questions.length < 1)
  				 		this.still_deciding_count = false
   		        }.bind(this));
    		},
    		
    		/** will be called only from onclick..so to reset everything**/
    		featured_questions: function() {
    			this.reset()
    			this.current_filter = 'everyone'
    			this.get_paginated_featured()
			
    		
    		},
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
            com.all_questions.push(response)
            com.decide_questions()
          }.bind(com));


        });

      this.followed_questions()

    
    },


  }

</script>
