$("#accountRegistration").click( function(){
		$.post( $("#frmAccount").attr("action"), 
			$("#frmAccount :input").serializeArray(),
			function(info) {
				$("#answerField").empty();
				$("#answerField").html(info);
			});
			
		$("#frmAccount").submit(function(){
			return false;
		});
});
