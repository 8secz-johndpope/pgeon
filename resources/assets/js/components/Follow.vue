<template>
<div>



<div id="exTab1" class="container">

   <ul class="nav nav-bordered">
                    <li class="active">
                        <a  href="#1a" data-toggle="tab">Following <span style="font-weight: 900">{{iam_following_count}}</span></a>
                    </li>
                    <li>
                        <a href="#2a"  data-toggle="tab">
    Followers<span style="font-weight: 900"> {{my_followers_count}}</span></a>
                    </li>
                    <li style="float: right">
                        <a href="search.html"><span class="icon icon-magnifying-glass" style="font-size: 24px;position: relative;right: 10px;bottom:0px"></span></a>
                    </li>
                </ul>



     <div class="tab-content clearfix">
       <div class="tab-pane active" id="1a">
       <div class="row">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="media-list media-list-users list-group">


                         <li class="list-group-item" v-for="item in iam_following">

                         <div class="media">
                             <a class="media-left" :href="item.url">

                                 <img class="media-object img-circle" :src="item.avatar" alt="">
                             </a>
                             <div class="media-body">
                                 <button class="btn btn-primary-outline btn-sm pull-right active"> Following
     </button>
                                 <strong>{{ item.user }}</strong>
                                 <small>{{ item.bio }}...</small>
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
                    <div class="col-md-12">
                        <ul class="media-list media-list-users list-group">


                         <li class="list-group-item" v-for="item in my_followers">

                         <div class="media">
                             <a class="media-left" :href="item.url">
                             <img class="media-object img-circle" :src="item.avatar" alt="">

                             </a>
                             <div class="media-body">
                                 <button class="btn btn-primary-outline btn-sm pull-right active"> Following
     </button>
                                 <strong>{{ item.user }}</strong>
                                 <small>{{ item.bio }}.</small>
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
            my_followers_count : 0
        };
    },
        mounted() {
            console.log('Component mounted.')

        },
        created: function(){
            $.getJSON('/followers', function(response){
              this.my_followers = response.my_followers;
              this.iam_following = response.iam_following;
                this.iam_following_count = response.iam_following_count
                this.my_followers_count = response.my_followers_count
              console.log(response.iam_following_count)
          }.bind(this ));
        },


    }
</script>
