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
    	//https://stackoverflow.com/questions/13903897/javascript-return-number-of-days-hours-minutes-seconds-between-two-dates
   
    	
	var delta =   this.current
	var days = Math.floor(delta / 86400);
	delta -= days * 86400;
	
	var hours = Math.floor(delta / 3600) % 24;
	delta -= hours * 3600;
	
	var minutes = Math.floor(delta / 60) % 60;
	delta -= minutes * 60;
	
	var seconds = delta % 60;  // in theory the modulus is not required

    	
	var t_str = '';
	if(days > 0)
		t_str += days + ' days ' 
	if(hours > 0)
		t_str += hours + ' hr ' 
	if(minutes > 0)
		t_str += minutes + ' min '
	//if(seconds > 0)
		t_str += seconds + ' sec ' 
				
      return t_str
      
      //return  days + ' days ' + hours+' hr '+minutes +' min '+seconds +' sec';
    },
    
    onInterval() {
      this.current = this.current -= this.interval
      
      
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
