<template>
<div>

	<!-- 
     
         <ul class=" container nav nav-bordered second-nav">
                <div class="iconav-slider">
                    <ul class="nav nav-pills iconav-nav">
                        <li class="active">
                            <a href="#" data-placement="right" data-container="body"><span class="fa fa-comment"></span><small class="iconav-nav-label visible-xs-block"> questions</small></a>
                        </li>
                        <li>
                            <a href="/responses" data-placement="right" data-container="body"><span class="fa fa-comments"></span><small class="iconav-nav-label visible-xs-block"> responses</small></a>
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
	<!-- 
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
             -->
<div class="second-nav-container">
	<ul class="container nav nav-bordered second-nav">
		<div class="iconav-slider">
			<ul class="nav nav-pills iconav-nav">
				<li class="tab active"><a href="#" data-container="body"><small>Questions</small></a>
				</li>
				<li class="tab"><a href="/responses"><small>Responses</small></a>
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

	<div class="container"  v-if="questions.length<1">
		<div class="container text-center m-t-5p">
			<img src="/img/chat-bubble.svg" />
			<h4 class="text-muted m-t-0">
				No live questions to display. <br>Please check back soon!
			</h4>
		</div>
	</div>




        <div class="container">
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
                                            <div class="media-body-text live-media-question" onclick="" style="cursor: pointer;">
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
    				if (this.uf.indexOf(this.all_questions[i].user_id) != -1) {
    					filtered_questions.push(this.all_questions[i])
    				}
    			}
    			
    			//filtered_questions
    			this.questions = filtered_questions
    			
    			
    		},
    	
    		unfilter_questions: function() {
    			this.questions = this.all_questions
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


      $.getJSON('/questions/json', function(response) {
        if (response[0]['id'] !== undefined)
          this.all_questions = response
          this.decide_questions()	
      }.bind(this));
    },


  }

</script>
