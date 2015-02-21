$("#accountRegistration").click( function(){
		$.post( $("#frmAccount").attr("action"), 
			$("#frmAccount :input").serializeArray(),
			function(info) {
				$("#answerField").empty();
				$("#answerField").html(info);
				clear();
			});
			
		$("#frmAccount").submit(function(){
			return false;
		});
});

function clear(){
	$("#frmAccount :input").each( function(){
		$(this).val("");
	});
}
