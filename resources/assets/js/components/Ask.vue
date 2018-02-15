<template>
<div>
 <div class="question-container" >
                        <form class="form-horizontal" action="/question" method="POST">
 <input type="hidden" name="_token" :value="csrf">

            <div class="csslider infinity" id="slider1">
       
              <input type="radio" name="slides" checked="checked" id="slides_1" />
                        <input type="radio" name="slides" id="slides_2" />
                        <!-- <input type="radio" name="slides" id="slides_3" /> -->
                        <ul>
                            <li>
                                <div class="va_slider_detail">
                                    <div>
                                        <div class="va_slider_heading">
                                            <textarea @focus="validate(true)" class="form-control question-input" rows="3"  :placeholder="lq_created_at" style="border-radius: 0 10px 0 0;text-align: left; font-family: inherit; padding: 15px; font-size: 16px; height: 130px;" name="question" v-model="question"></textarea>
                                        </div>
                                    </div>
                                    <div class="nxtbtn">

                                        <div class="pull-left" style="padding-top: 2px;">
                                          
                                            <select name="days" id="day-select" v-model="dd"  class="custom-select time-select">
                                                <option value="00">00 days</option>
                                                <option value="01">01 days</option>
                                                <option value="02">02 days</option>
                                                <option value="03">03 days</option>
                                                <option value="04">04 days</option>
                                                <option value="05">05 days</option>
                                                <option value="06">06 days</option>
                                            </select>
                                            <span class="fa fa-sort text-muted" style="vertical-align: text-bottom;margin-left: -3px;"></span>
                                            <select name="hours" id="hour-select" v-model="hh"  class="custom-select time-select">
                                                <option value="00">00 hrs</option>
                                                <option value="01">01 hrs</option>
                                                <option value="02">02 hrs</option>
                                                <option value="03">03 hrs</option>
                                                <option value="04">04 hrs</option>
                                                <option value="05">05 hrs</option>
                                                <option value="06">06 hrs</option>
                                                <option value="07">07 hrs</option>
                                                <option value="08">08 hrs</option>
                                                <option value="09">09 hrs</option>
                                                <option value="10">10 hrs</option>
                                                <option value="11">11 hrs</option>
                                                <option value="12">12 hrs</option>
                                                <option value="13">13 hrs</option>
                                                <option value="14">14 hrs</option>
                                                <option value="15">15 hrs</option>
                                                <option value="16">16 hrs</option>
                                                <option value="17">17 hrs</option>
                                                <option value="18">18 hrs</option>
                                                <option value="19">19 hrs</option>
                                                <option value="20">20 hrs</option>
                                                <option value="21">21 hrs</option>
                                                <option value="22">22 hrs</option>
                                                <option value="23">23 hrs</option>
                                            </select>
                                            <span class="fa fa-sort text-muted" style="vertical-align: text-bottom;"></span>
                                            <select name="mins" id="minute-select" v-model="mm" class="custom-select time-select">
                                                <option value="00" :disabled=lt5_disabled>00 min</option>
                                                <option value="01" :disabled=lt5_disabled>01 min</option>
                                                <option value="02" :disabled=lt5_disabled>02 min</option>
                                                <option value="03" :disabled=lt5_disabled>03 min</option>
                                                <option value="05">05 min</option>
                                                <option value="10">10 min</option>
                                                <option value="15">15 min</option>
                                                <option value="20">20 min</option>
                                                <option value="25">25 min</option>
                                                <option value="30">30 min</option>
                                                <option value="35">35 min</option>
                                                <option value="40">40 min</option>
                                                <option value="45">45 min</option>
                                                <option value="50">50 min</option>
                                                <option value="55">55 min</option>
                                            </select>
                                            <span class="fa fa-sort text-muted" style="vertical-align: text-bottom;"></span>
                                        </div>
                                         <label v-if="hasQMark" for="slides_2"  id="" style="font-size: 28px;margin-right: 5px;margin-top: -2px;">
                                            <a ><span class="fal fa-arrow-circle-right"></span></a>
                                        </label>

                                        <label v-else @click=validate(false) id="" style="font-size: 28px;margin-right: 5px;margin-top: -2px;">
                                            <a ><span class="fal fa-arrow-circle-right"></span></a>
                                        </label>
                                    </div>
                                    
                                </div>
             
                            </li>

                            <li>
                                <div class="va_slider_detail_inner">
                                    <div class="media-body-text" style="padding: 15px; font-size: 16px; height: 130px;">
                                       {{this.question}} 
                                    </div>
                                    <div class="nxtbtn">
                                        <label for="slides_1" style="font-size: 28px; margin-right: 10px; margin-top: -3px;">
                                            <a> <span class="fal fa-arrow-circle-left"></span></a>
                                        </label>

    
                            <input type="submit" value="Submit" class = 'btn btn-sm btn-primary pull-right'                             style = "font-size: 15px;display: inline-block;margin-top: 2px;"  />
                                        <div class="pull-left" style="font-size: 16px;margin-top: 6px;"><span id="sp_days"> {{dd}}</span>
                                            <small style="margin-left: -3px;">d</small> <span id="sp_hr">{{hh}}</span>
                                            <small style="margin-left: -3px;">h</small> <span id="sp_mn">{{mm}}</span>
                                            <small style="margin-left: -3px;">m</small>

                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                       
    </div>
    
           
 </form>
 </div>
            <div v-if="!valid" class="error alert alert-warning animated shake" role="alert">
                        
    Please include at-least one question mark.
    </div>  
 
</div>
  </template>


<script>
  export default {
      
  
  data() {
    return {
      question: "",
      dd:"01",
      hh: "00",
      mm:"00",
      lt5_disabled:false,
      csrf: $('meta[name="csrf-token"]').attr('content'),
      hasQMark:false,
      valid:true
    }
  },
   props: ['lq_created_at'],
   computed: {
    // get only
   
   },
  watch: {
    question: function (nval) {
      
      if(nval.indexOf("?") >= 0)
        this.hasQMark =  true
       else
        this.hasQMark =  false
    },

    dd: function () {
      if ((this.dd == "00")  && (this.mm != "00")  && (parseInt(this.mm) <= 5) && (this.hh == "00")) {
         this.mm = "05"
         this.lt5_disabled = true

       }else if ((this.dd == "00")  && (this.mm == "00")  && (this.hh == "00")) { 
          this.hh = "01"
          this.lt5_disabled = true
       } else {

         this.lt5_disabled = false
       }
    }, hh: function () {
       if ((this.dd == "00")  && (parseInt(this.mm) <= 5)  && (this.hh == "00")) { 
          this.mm = "05"
          this.lt5_disabled = true
       }else {
         this.lt5_disabled = false
       }
    }
  },
  methods: {
   
   
     validate: function (flag) {
      this.valid = flag
    }
   
  },
  mounted() {
  }


    }
</script>