export var AnswerMixin = {

    data: {
        topAnswers: [],
        selected_user: null
    },

    created: function() {
  
       // this.logged_user = JSON.parse(this.logged_user);
    },
    
      methods: {
	    getTopAnswers: function () {
	    		if(this.selected_user) {
				$.getJSON(`/user/${this.selected_user}/topanswers`, function(response) {
     				this.topAnswers = response
   				}.bind(this));	    			
  			}
	    		
	    		
	    		
	    },
	    resetTopAnswers: function(user_id) {
	    		this.selected_user=user_id
	    		this.topAnswers = null
	    }
    }

};