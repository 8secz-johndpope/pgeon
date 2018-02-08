<template>
<div>
<div>


     


            
            <div class="second-nav-container navbar-inverse navbar-fixed-top">
	<ul class="container nav nav-bordered second-nav">
		<div class="iconav-slider">
			<ul class="nav nav-pills iconav-nav">
				<li class="tab">
                                       <router-link class="small" to="/questions">Questions</router-link>

				</li>
				<li class="tab active">
                     <router-link class="small" to="/responses">Responses</router-link>
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


	<div class="container scroll-content mt-50"  v-if="questions.length<1">
		<div class="container text-center m-t-5p">
				      <div  v-if="still_deciding_count" class="spinner">
            <div class="b1 se"></div>
            <div class="b2 se"></div>
            <div class="b3 se"></div>
            <div class="b4 se"></div>
            <div class="b5 se"></div>
            <div class="b6 se"></div>
            <div class="b7 se"></div>
            <div class="b8 se"></div>
            <div class="b9 se"></div>
            <div class="b10 se"></div>
            <div class="b11 se"></div>
            <div class="b12 se"></div>
        </div>
				 <div v-else>
				 <img src="/img/chat-bubble.svg" />
				 <h4 class="text-muted m-t-0">Nothing to display. <br>Please check back soon!</h4>
				</div>
		</div>
	</div>




        <div class="container scroll-content mt-50">
            <div class="row">
                <div class="col-md-12">
                    <ul class="media-list media-list-conversation c-w-md"  v-for="question in questions">
                        <li class="media">
                            <a class="media-left" :href="question.slug">
                                <img class="media-object img-circle" :src="question.avatar" id="user-profile-image-link">
                            </a>
                            <div class="media-body">
                                <div class="h5 m-b-5">
                                    <span><a :href="'r/'+question.rslug">{{question.rslug_formatted}}</a></span>
                                    <span><a :href="question.answered_by">{{question.answered_by}}</a></span>
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
                    
                    <ul class="load_more" v-if="currently_fetched_records_count>=paginate"><li class="btn btn-sm btn-default-outline" v-on:click="get_paginated_results()">{{loading_txt}}</li></ul>
                    
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
			paginate:6,
			currently_fetched_records_count:0,
			current_page:0,
			loading_txt: "more",
			still_deciding_count: true,
	        
	      };
	    },
	    props: ['user_id', 'role_id', 'avatar', 'slug', 'csrf_field','eligible_to_ask'],
	    mounted() {
			$(".up50").removeClass("up50")
		
		},
		

	    mixins: [CommonMixin],
	    
	    methods: {
	    	
	    	reset: function () {
				this.questions = []
				this.current_page = 0
				this.currently_fetched_records_count = 0
				//questions.length will be zero but not finalized yet until push to array
				this.still_deciding_count = true
				$(".up50").removeClass("up50") && $(".up0").removeClass("up0")

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
					 $.getJSON(`/rff/${this.paginate}/${this.current_page}`, function(response) {
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
		    			 $.getJSON(`/featuredr/${this.paginate}/${this.current_page}`, function(response) {
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


	



	    },
	    created: function() {

     


	    	
	  this.followed_questions()  	

      $.getJSON('/responses/json', function(response) {

    	  	
        if (response[0]['id'] !== undefined)
          this.all_questions = response
          this.decide_questions()			
      }.bind(this));
    },


  }

</script>
