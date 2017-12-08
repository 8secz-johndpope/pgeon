<template>
<div>

            <div class="nav_all">




<nav class="navbar navbar-inverse navbar-fixed-top app-navbar">
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
                                <a href="/login" class="btn btn-sm btn-primary-outline" style="margin-top: 4px; font-weight: 600;">Log In</a>
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
				<li class="tab "><a href="/questions" data-container="body"><small>Questions</small></a>
				</li>
				<li class="tab active"><a href="#"><small>Responses</small></a>
				</li>
			
					
						<li  class="f-right small"><span class="f-right-text">Featured</span>
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
				 <img v-if="still_deciding_count" src='/img/slider.gif' />
				 <span v-else>No responses to display. <br>Please check back soon!</span>
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
                    	<ul class="load_more" v-if="currently_fetched_records_count>=paginate"><li class="btn btn-sm btn-default-outline"  v-on:click="get_paginated_results()">{{loading_txt}}</li></ul>
                    
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
	          paginate:6,
	  		currently_fetched_records_count:0,
	  		current_page:0,
	  		loading_txt: "more",
			still_deciding_count: true,
	        
	      };
	    },
	    props: ['user_id'],
	    mounted() {
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
				this.get_paginated_featured()
			},
			
	      redirect: function(id) {
	        location.href = 'question/' + id
	      },


	

	  	/** will be called only from load more links as well**/
			get_paginated_featured: function () {
				this.loading_txt = "loading.."	
				 $.getJSON(`/featuredr/${this.paginate}/${this.current_page}`, function(response) {
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
			
			/** will be called only from onclick..so to reset everything**/
			featured_questions: function() {
				this.reset()
				this.current_filter = 'everyone'
				this.get_paginated_featured()
			
			
			},


	    },
	    created: function() {

     



	    	this.featured_questions()
    },


  }

</script>
