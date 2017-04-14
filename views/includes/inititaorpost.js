$(document).ready(function(){
		$("#submit").click(function(event){

			event.preventDefault();
			$("#loader").html("<span><b> Please wait.. </b></span>");
			$("#result").empty();
			var itemid = '';
		       itemid =  $("#myform").serialize();
			$.ajax({
				type: "POST",
				url: "../classes/src/initiator.php",
				data: itemid,
				dataType:"html",
				success: function(data,textStatus) {
					
					$("#loader").empty();
					if(data==3){
						 window.location="userinfo.php";  
				     }
					else{ 
						 $("#result").html('<div class="alert alert-danger alert-dismissable"><a href="#"" class="close" data-dismiss="alert">&times;</a>' +data+ '</div>');
					 }
	             },
	           error: function(response) {
	           	$("#loader").empty();
	    	 }

	       });
       });

    });