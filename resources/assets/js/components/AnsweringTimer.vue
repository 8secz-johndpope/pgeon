
<template>
 <span>   {{formatted}}</span> 
  </template>


<script>

    export default {
      
      
   props: {
    interval: {
      type: Number,
      default: 1
    },
    initial: {
      type: String
    },
 
    
     
  },
  
  data() {
    return {
      current: this.initial,
      timerInterval: null,
      formatted:'...'
    }
  },
  methods: {
    to_time() {
      var sec_num = parseInt(this.current, 10); // don't forget the second param
      var hours   = Math.floor(sec_num / 3600);
      var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
      var seconds = sec_num - (hours * 3600) - (minutes * 60);

      if (hours   < 10) {hours   = "0"+hours;}
      if (minutes < 10) {minutes = "0"+minutes;}
      if (seconds < 10) {seconds = "0"+seconds;}
      return hours+' hr '+minutes +' min '+seconds +' sec';
    },
    
    onInterval() {
      this.current = this.current -= this.interval
      
    //  console.log(this.current)
      
      this.formatted = this.to_time()
      if (this.current <= 0) {
        clearInterval(this.timerInterval)
        this.current = 0
        location.reload();

      }
    }
  },
  mounted() {
    this.timerInterval = setInterval(this.onInterval, this.interval * 1000)
  }


    }
</script>
