$(document).ready(function(){
	$("#submit").click(function(event){

		event.preventDefault();
		$("#loader").html("<span><b> Please wait.. </b></span>");
		$("#result").empty();
		var itemid = '';
		itemid =  $("#inivteeform").serialize();
		$.ajax({
			type: "POST",
			url: "../classes/src/invitee.php",
			data: itemid,
			dataType:"html",
			success: function(data,textStatus) {
				
				 $("#loader").empty();
				 if(data)
				{    
					//$("#result").html('<div class="alert alert-danger alert-dismissable"><a href="#"" class="close" data-dismiss="alert">&times;</a>' +data+ '</div>');
                        window.location="result.php?"+data; 
				} 
				// if(data == 1){
				// 	$("#result").html('<div class="alert alert-info alert-dismissable"><a href="#"" class="close" data-dismiss="alert">&times;</a>Rating Submitted Please check your email for the result!</div>');
				// 	 window.location="inviteewait.php"; 
				// }else if(data)
				// {    
				// 	$("#result").html('<div class="alert alert-danger alert-dismissable"><a href="#"" class="close" data-dismiss="alert">&times;</a>' +data+ '</div>');

				// } 
				// else{ 
				// 	$("#result").html('<div class="alert alert-danger alert-dismissable"><a href="#"" class="close" data-dismiss="alert">&times;</a>Email sending failed..</div>');
				// }
			},
			error: function(response) {
				$("#loader").empty();
			}

		});
	});

});