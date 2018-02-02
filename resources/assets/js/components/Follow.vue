<template>
<div>



<div id="exTab1" class="container">

   <ul class="nav nav-bordered">
                    <li class="active">
                        <a  href="#1a" v-on:click="setcurrenttab('iam_following')" data-toggle="tab">Following <span>{{iam_following_count}}</span></a>
                    </li>
                    <li>
                        <a href="#2a" v-on:click="setcurrenttab('my_followers')"  data-toggle="tab">
    Followers<span> {{my_followers_count}}</span></a>
                    </li>

                     <li style="float: right">
                      
                        <a href="/search">
                        
 
                        <span class="fal fa-search" style="font-size: 24px;position: relative;right: 10px;bottom:0px"></span></a>
                    </li>
                    <li style="float: right;margin-top:5px;" v-on:click="sort()">
                           <svg width="18" height="18">
              <use   v-if="current_order===false" class="f-sort" xlink:href='/img/sprites/light.svg#sort'></use>
               <use   v-else-if="current_order=='ASC'"  class="f-sort" xlink:href='/img/sprites/solid.svg#sort-up'></use>
                <use  v-else class="f-sort" xlink:href='/img/sprites/solid.svg#sort-down'></use>
              </svg>
                    </li>
                   

                   
                </ul>





     <div class="tab-content clearfix">
       <div class="tab-pane active" id="1a">
       
       
        <div class="row">
                <div class="row">
                    <div class="col-md-12" style="margin-top: 5px">
                        <ul class="media-list media-list-users list-group">
                        
                        
                        
                              <li class="list-group-item" v-for="item in iam_following">

                        

                                <div class="media">
                                    <a class="media-left"  :href="item.url">
                                        <img class="media-object img-circle" :src="item.avatar"  />
                                    </a>
                                    <div class="media-body">
                                        <button v-on:click="unfollow(item.user_id)"  class="btn btn-md btn-link pull-right">
                                             <span class="fal fa-check"></span>
                                        </button>
                                        <strong>{{ item.url }}</strong>
                                        <small>{{ item.last_posted }}</small>
                                        <strong>[{{ item.convo_count }}]</strong>

                                    </div>
                                </div>
                            </li>
                           
                        
                        </ul>
                    </div>
                </div>
            </div>
            
            
       


       </div>
       <div class="tab-pane" id="2a">
       <div class="row">
       
            <div class="row">
                    <div class="col-md-12" style="margin-top: 5px">
                        <ul class="media-list media-list-users list-group">
                            <li class="list-group-item" v-for="item in my_followers">
                                <div class="media">
                                     <a class="media-left" :href="item.url">
                             <img class="media-object img-circle" :src="item.avatar" alt="">

                             </a>
                                    <div class="media-body">
                                        <button  v-if="!isExistsinFollowing(item.user_id)" v-on:click="follow(item.user_id, $event)" class="btn btn-md btn-link pull-right">
                                            <span class="fal fa-plus"></span>
                                        </button>
                                          <button  v-else class="btn btn-md btn-link pull-right">
                                            <span class="fal fa-check text-muted"></span>
                                        </button>
                                          <strong>{{ item.url }}</strong>
                                 <small>{{ item.last_posted }}</small>
                                  <strong>[{{ item.convo_count }}]</strong>
                                    </div>
                                </div>
                            </li>
                    
                      
                        </ul>
                    </div>
            </div>
            
            
       
       
       
               
            </div>

       </div>

     </div>
  </div>


  </div>




</template>

<script>
    export default {

    data: function(){
        return {
            iam_following: [],
            my_followers: [],
            iam_following_count : 0,
            my_followers_count : 0,
            current_tab: "iam_following",
            current_order: false,
        };
    },
        mounted() {
         //   console.log('Component mounted.')

        },
        created: function(){
            this.fetchData()
        },

        methods: {
            setcurrenttab(tab) {
                this.current_tab = tab
                
            },
            sort() {
                if(!this.current_order ||  this.current_order == 'ASC') {
                    this.current_order = 'DESC'
                    this[this.current_tab].sort(function(a, b){
                        return b.convo_count - a.convo_count;
                    });
                }else if(this.current_order == 'DESC') {
                    this.current_order = 'ASC'
                    this[this.current_tab].sort(function(a, b){
                        return a.convo_count - b.convo_count;
                    });
                     
                }
                
            },
        	fetchData() {
        		$.getJSON('/followers', function(response){
                    this.my_followers = response.my_followers;
                    this.iam_following = response.iam_following;
                      this.iam_following_count = response.iam_following_count
                      this.my_followers_count = response.my_followers_count
                   // console.log(response.iam_following_count)
                }.bind(this ));
        	},
        	
        	isExistsinFollowing(user_id) {
        		for(var k in this.iam_following) {
        			   if (user_id == (this.iam_following[k].user_id))
        				   return true;
        			}
        		return false	;
        	},
        	getBubbleCount() {
        		this.$http.get('/bubble').then((response) => {
        			if (parseInt(response.data) > 0) 
        				$(".bubble").html(response.data)
        	 
        	        //alert('ss')
        	        // success callback
        	      }, (response) => {
        	        // error callback
        	      });
        	},  
            follow: function (id, event) {
              //  $.post('follow',  )
              $(event.target).children().remove()
              var formData = {
                'user_id': id
              }
              this.$http.post('/follow', formData).then((response) => {
            	 	 this.fetchData()
                // success callback
                
              }, (response) => {
            	  console.log(response)
                // error callback
              });



            },

            unfollow: function (id) {
              //  $.post('unfollow',  )
              var formData = {
                'user_id': id
              }
              this.$http.post('/unfollow', formData).then((response) => {

	            	  this.fetchData()
              }, (response) => {
                	
              });



            },




          }


    }
</script>
