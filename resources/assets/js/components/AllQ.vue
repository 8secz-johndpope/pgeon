<template>
<div>





 <main class="landing-main mw6 m-auto pl15 pr15" v-if="Object.keys(questions).length < 1">

		<div class="container text-center m-t-5p">

	<div  v-if="still_deciding_count"> 
     
    </div>
				 <div v-else>
         <div class="empty-notifications">
    <p class="m0">
      <span>💬</span>
      <span>There are currently no<br> questions to display</span>
    </p>
  </div>
				</div>
		</div>
	</main>




 <main class="landing-main mw6 m-auto pl15 pr15">
    <div class="p-b-15" v-for="user_qs in questions">
      <div class="open-question__container" v-for="(question,index) in user_qs">
        <div class="open-question__left">
          <!-- image only for the first elem...rest will be added as stack -->
           <a :href="question.slug" v-if="index==0">
          <avatar :size="42"  :src="question.avatar" :username="(question.name)?question.name:question.slug"></avatar>
           </a>
           <div v-else class="avatar-occupy"></div>

        </div>
        <div class="open-question__right">
          <div class="open-question__meta" v-if="index==0">
            <a :href="question.slug" class="open-question__author">{{question.slug}}</a>
            <span class="open-question__time">

              <allqtimer :initial="question.expiring_at"
								:question_id="question.id" @event="deleteQ"></allqtimer>

            </span>
          </div>
          <span v-on:click="redirect(question.id)"  class="open-question__content selected mt5p m0">
            <p> {{question.question}}</p>
          </span>
        </div>
      </div>

</div>


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


<div class="FAB-button__container mw6 m-auto" v-if="role_id==3">
          <a href="/my-questions" class="FAB-button">
			  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M436 238H242V44c0-6.6-5.4-12-12-12h-12c-6.6 0-12 5.4-12 12v194H12c-6.6 0-12 5.4-12 12v12c0 6.6 5.4 12 12 12h194v194c0 6.6 5.4 12 12 12h12c6.6 0 12-5.4 12-12V274h194c6.6 0 12-5.4 12-12v-12c0-6.6-5.4-12-12-12z"></path></svg>
          </a>
        </div>

  </main>



</div>


</template>

<script>
import {CommonMixin} from '../mixins/CommonMixin.js';
import Avatar from 'vue-avatar'

  export default {

    data: function() {
      return {
        questions: {},
        current_filter: 'everyone',
		paginate:12,
		currently_fetched_records_count:0,
		current_page:0,
		still_deciding_count: true,
		still_deciding_paging: false,
      };
    },
    props: ['role_id'],
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
			this.questions = {}
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

               console.log(response)

              //this will not exists after first time...
							 $(".spinner").remove()

					    this.still_deciding_paging = false
    				  this.currently_fetched_records_count = 0
   		        if (Object.keys(response).length > 0) {
                this.currently_fetched_records_count = Object.keys(response).length
                this.questions = response
                //this.questions.push(...response)
                this.loading_txt = "more"
              }
				 	//if this is empty even after .push?
				 	    if (Object.keys(this.questions).length < 1)
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

      this.featured_questions()


    },


  }

</script>
