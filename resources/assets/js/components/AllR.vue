<template>
<div>


            
            
            
                   <ul class=" container nav nav-bordered second-nav">
                <div class="iconav-slider">
                    <ul class="nav nav-pills iconav-nav">
                        <li class="active">
                            <a href="/questions" data-placement="right" data-container="body"><span class="fa fa-comment"></span><small class="iconav-nav-label visible-xs-block"> questions</small></a>
                        </li>
                        <li>
                            <a href="#" data-placement="right" data-container="body"><span class="fa fa-comments"></span><small class="iconav-nav-label visible-xs-block"> responses</small></a>
                        </li>
                        
                        
                        
                            <li class="dropdown pull-right small" style="margin-left:auto;">
                            <div v-if="current_filter == 'follow'" class="dropdown-toggle small" data-toggle="dropdown" role="button" aria-expanded="false" style="display:table-cell;
height:33px;
vertical-align:bottom">followed
                                <span class="caret"></span>
                            </div>
                             <div v-if="current_filter == 'everyone'" class="dropdown-toggle small" data-toggle="dropdown" role="button" aria-expanded="false" style="display:table-cell;
height:33px;
vertical-align:bottom">everyone
                                <span class="caret"></span>
                            </div>
                            <!-- if there isn't a user_id there won't be follow menu -->
                            <ul class="dropdown-menu" role="menu" v-if="user_id > 0">
                                <li  class="dropdown-header">display replies</li>
                                <li v-on:click=filter_questions() v-if="current_filter == 'everyone'">
                                    <a href="#" >from followed</a>
                                </li>
                                <li v-on:click="unfilter_questions()"  v-if="current_filter == 'follow'">
                                    <a href="#">from everyone</a>
                                </li>
                            </ul>
                        </li>
                        
                        
                    </ul>
                </div>
            </ul>

            
       
                
    
    <div class="row">
                <div class="col-md-12">
                    <ul class="media-list media-list-conversation c-w-md" v-for="question in questions">
                        <li class="media m-b">
                            <a class="media-left" href="#">
                                <img class="media-object img-circle" :src="question.avatar" alt="" id="user-profile-image-link">
                            </a>
                            <div class="media-body">
                                <small class="text-muted h6"><a href="#" style="margin-right: 3px">{{question.name}}</a> </small>
                                <ul class="media-list media-list-conversation c-w-md">
                                    <li class="media">
                                        <div class="media-body">
                                            <div v-on:click="redirect(question.id)" class="media-body-text media-question">{{question.question}}
</div>
                                            <ul class="media-list media-list-conversation c-w-md">
                                                <li class="media media-current-user media-divider">
                                                    <div class="media-body">
                                                        <div class="media-body-text media-response media-response-margin" onclick="location.href='';" style="cursor: pointer;">
                                                        {{question.answer.answer}}
                                                           
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
