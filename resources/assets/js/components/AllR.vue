<template>
<div>


            
            <div class="second-nav-container">
	<ul class="container nav nav-bordered second-nav">
		<div class="iconav-slider">
			<ul class="nav nav-pills iconav-nav">
				<li class="tab "><a href="/questions" data-container="body"><small>Questions</small></a>
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

            
            
          <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="media-list media-list-conversation c-w-md"  v-for="question in questions">
                        <li class="media m-b">
                            <a class="media-left" href="#">
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
                                            <div class="media-body-text  media-question">
                                            {{question.question}}
</div>
                                            <ul class="media-list  media-secondary media-list-conversation c-w-md">
                                                <li class="media media-current-user media-divider">
                                                    <div class="media-body">
                                                        <div class="media-body-text media-response media-response-margin" onclick="location.href='';" style="cursor: pointer;">
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
  export default {

	  data: function() {
	      return {
	        all_questions: [],
	        questions: [],
	        current_filter: 'everyone',
	        uf: {}
	        
	      };
	    },
	    props: ['user_id','user_followings'],
	    mounted() {
			this.uf = JSON.parse(this.user_followings)
			//console.log(this.uf )
			//this.filter_questions()
	    },

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
