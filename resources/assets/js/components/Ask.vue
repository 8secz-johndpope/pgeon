<template>
<div>





<main class="mw6 m-auto question-main">

 <div class="post-question-box mb20p" >
                        <form class="form-horizontal" action="/question" method="POST">
 <input type="hidden" name="_token" :value="csrf">


                                            <textarea class="post-question-textarea orange-caret" :placeholder="lq_created_at"  data-gramm_editor="false" autofocus maxlength="200" name="question" v-model="question" @input="maxHighlight"></textarea>

                                              <!-- <div class="js-keeper-placeholder-back" v-html="placeholder_content"></div> -->


                                                      <div class="post-question-share ">
                                            <div class="post-question-share__meta flex justify-between">
                                                <div class="flex align-center">
                                                <!-- <div class="md-checkbox fc">
                                                    <input id="i1" class="auto-share-checkbox" type="checkbox">
                                                    <label for="i1">Auto Share <small style="opacity: .5;"> (coming soon)</small></label>
                                                </div> -->
                                                </div>
                                                <div class="post-question-count" v-bind:class="[ remainingLength < 0 ? 'redish1' : '']" >{{remainingLength}}</div>
                                            </div>
                                            </div>

                                                <div class="post-question-share flex auto-share-toggle dn" >
      <a href="/connected-accounts" class="share-add share-circle fc mr20p">
         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M436 238H242V44c0-6.6-5.4-12-12-12h-12c-6.6 0-12 5.4-12 12v194H12c-6.6 0-12 5.4-12 12v12c0 6.6 5.4 12 12 12h194v194c0 6.6 5.4 12 12 12h12c6.6 0 12-5.4 12-12V274h194c6.6 0 12-5.4 12-12v-12c0-6.6-5.4-12-12-12z"></path></svg>
      </a>
      <input class="social-share-cb dn" type="checkbox" id="twitter-share" checked>
      <label class="share-social share-circle mr15p" for="twitter-share">
        <img src="http://via.placeholder.com/38x38">
        <div class="svg-container svg-container--twitter fc">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>
        </div>
      </label>
      <input class="social-share-cb dn" type="checkbox" id="facebook-share">
      <label class="share-social share-circle" for="facebook-share" >
        <img src="http://via.placeholder.com/38x38">
        <div class="svg-container svg-container--fb  fc">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M448 56.7v398.5c0 13.7-11.1 24.7-24.7 24.7H309.1V306.5h58.2l8.7-67.6h-67v-43.2c0-19.6 5.4-32.9 33.5-32.9h35.8v-60.5c-6.2-.8-27.4-2.7-52.2-2.7-51.6 0-87 31.5-87 89.4v49.9h-58.4v67.6h58.4V480H24.7C11.1 480 0 468.9 0 455.3V56.7C0 43.1 11.1 32 24.7 32h398.5c13.7 0 24.8 11.1 24.8 24.7z"></path></svg>

        </div>
      </label>
    </div>


 <div class="post-question-action">
      <div>
        <div class="post-question-action__date">

             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 64h-48V12c0-6.6-5.4-12-12-12h-8c-6.6 0-12 5.4-12 12v52H128V12c0-6.6-5.4-12-12-12h-8c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM48 96h352c8.8 0 16 7.2 16 16v48H32v-48c0-8.8 7.2-16 16-16zm352 384H48c-8.8 0-16-7.2-16-16V192h384v272c0 8.8-7.2 16-16 16zM148 320h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm96 0h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm96 0h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm-96 96h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm-96 0h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm192 0h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12z"></path></svg>
                                              <span class="pt2">

            <span class="pointer">
                                            <select name="days" id="day-select" v-model="dd"  class="no-r">
                                                <option value="00">00 days</option>
                                                <option value="01">01 days</option>
                                                <option value="02">02 days</option>
                                                <option value="03">03 days</option>
                                                <option value="04">04 days</option>
                                                <option value="05">05 days</option>
                                                <option value="06">06 days</option>
                                            </select>

            </span> :
            <span class="pointer">
                                            <select name="hours" id="hour-select" v-model="hh" class="no-r">
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
                                            <select name="mins" id="minute-select" v-model="mm" class="no-r">
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
                                     </span>
          </span>
                                        </div>

                                    </div>
                                    <button :disabled="!is_valid">Post Question</button>
    </div>





 </form>
  </div>
            <!-- <div class="error alert alert-warning animated shake" role="alert">

    Please include at-least one question mark.
    </div>   -->
 </main>

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
      is_valid:false,
      placeholder_content: "",
      remainingLength: 150,
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
         maxHighlight() {
        var currentValue = this.question
         var realLength = 150;
         this.remainingLength = 150 - currentValue.length;
       //  console.log(remainingLength);
          if (0 > this.remainingLength) {
                // Split value if greater than
                var allowedValuePart = currentValue.slice(0, realLength),
                    refusedValuePart = currentValue.slice(realLength)
                ;
                this.is_valid = false;




                // Fill the hidden div.
                //this.placeholder_content = allowedValuePart + '<em>' + refusedValuePart + '</em>'
              } else {
                this.placeholder_content = ''
                this.is_valid = (currentValue.length>0)

              }
      },




  },
  mounted() {
   $(".question-stats").removeClass('dn')
    
  }


    }
</script>
