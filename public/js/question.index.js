$(function () {
 

	$("#question-input").on("input", function () {
		updatecounter($(this), $("#question_counter"), 150)
	})
	$("#question-input").on("paste", function () {
		updatecounter($(this), $("#question_counter"), 150)
	})


	function updatecounter(ele, target, max){
		var len =  ele.val().length

	  len  >= max  && 
	  ele.val(ele.val().substring(0, max))
	  
	  target.text(ele.val().length)
	  
	}
	
	$("#q_preview").on("click", function () {
		$('#sp_hr').text($("#hour-select").val());
		$('#sp_mn').text($("#minute-select").val());
		$("#q_preview_text").text($("#question-input").val())
	})
	
})
