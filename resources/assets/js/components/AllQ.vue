<template>
<div>









<div class="second-nav-container  navbar-inverse navbar-fixed-top">
	<ul class="container nav nav-bordered second-nav">
		<div class="iconav-slider">
			<ul class="nav nav-pills iconav-nav">
				<li class="tab active">
                    <router-link class="small" to="/questions">Questions</router-link>
				</li>
				<li class="tab">
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
				 <h4 class="text-muted m-t-0">No live questions to display. <br>Please check back soon!</h4>
				</div>
			
		</div>
	</div>




        <div class="container scroll-content mt-50">
            <div class="row">
                <div class="col-md-12">

                    <ul class="media-list media-list-conversation c-w-md" v-for="question in questions">
                        <li class="media">
                            <a class="media-left" :href="question.slug">
                                <avatar :size="42"  :src="question.avatar" :username="question.slug"></avatar>

                            </a>
                            <div class="media-body">
                                <div class="h5 m-b-5">
                                    <span><a :href="question.slug">{{question.slug}}</a></span>
                                    <span class="text-muted time-align"><allqtimer :initial="question.expiring_at"
								:question_id="question.id" @event="deleteQ"></allqtimer></span>
                                </div>
                                <ul class="media-list media-list-conversation c-w-md">
                                    <li class="media">
                                        <div class="media-body">
                                            <div class="media-body-text live-media-question"  v-on:click="redirect(question.id)"  @mousedown="addResponseFocus($event)" @mouseup="removeResponseFocus($event)" @mouseleave="removeResponseFocus($event)" style="cursor: pointer;">
											<table class="bkword">
											<tr>
											<td>
    	                                        {{question.question}}
											</td></tr></table>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    
                    



                    <ul class="load_more" v-if="currently_fetched_records_count>=paginate && still_deciding_paging"><li>
									      <div   class="spinner p-rel">
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
						</li></ul>
                </div>
            </div>
        </div>








</div>




</template>

<script>
import {CommonMixin} from '../mixins/CommonMixin.js';
import Avatar from 'vue-avatar'

  export default {

    data: function() {
      return {
        questions: [],
        current_filter: 'follow',
		paginate:12,
		currently_fetched_records_count:0,
		current_page:0,
		still_deciding_count: true,
		still_deciding_paging: false,
      };
    },
    props: ['user_id', 'role_id', 'avatar', 'slug', 'csrf_field', 'eligible_to_ask'],
    mounted() {
		
			$(".up50").removeClass("up50")
			$(window).bind('scroll',this.handleScroll);

	},
        components: {
				Avatar
		},
	

    mixins: [CommonMixin],


    methods: {
    	handleScroll: function () {
	
			if($(window).scrollTop() + $(window).height() == $(document).height()) {
				//if scroll hits bottom
				if ($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
					this.get_paginated_results()
				}
			}
		},
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
			this.still_deciding_paging = true
			if (this.current_filter == 'follow') {
				this.get_paginated_qff()
			}else {
				this.get_paginated_featured()
			}
		},
    	
		get_paginated_qff: function () {
			 $.getJSON(`/qff/${this.paginate}/${this.current_page}`, function(response) {
				 	this.still_deciding_paging = false
				 	this.currently_fetched_records_count = 0
			        if (response[0]['id'] !== undefined) {
			        		this.currently_fetched_records_count = response.length
			        		this.questions.push(...response)
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
    			 $.getJSON(`/featuredq/${this.paginate}/${this.current_page}`, function(response) {
					 this.still_deciding_paging = false
    				  this.currently_fetched_records_count = 0
   		          if (response[0]['id'] !== undefined) {
   		        	 	this.currently_fetched_records_count = response.length
   		          	this.questions.push(...response)
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
