
  $(document).ready(function(){

   $("#submit").click(function(event){
 
      event.preventDefault();
      var itemid = '';
      itemid =  $("#itemlistform").serialize();
      $.ajax({
        type: "POST",
        url: "../classes/src/initiator.php",
        data: itemid,
        dataType:"html",
        success: function(response) {
       
        if(response == 1)
            {   
              $("#checkboxesmsg").html('<div class="alert alert-danger alert-dismissable"><a href="#"" class="close" data-dismiss="alert">&times;</a>Only 10 items allowed!</div>');
        }
        else if(response == 2){
          window.location="initiator.php"; 
        }else{  $("#checkboxesmsg").html('<div class="alert alert-danger alert-dismissable"><a href="#"" class="close" data-dismiss="alert">&times;</a>Atleast one item must be selected!</div>');

         }
          },
             error: function(response) {
         }

         });
       });

    $("#submita").click(function(event){
       event.preventDefault();
       var itemid = '';
       itemid =  $("#itemlistforma").serialize();
       $.ajax({
        type: "POST",
        url: "../classes/src/initiator.php",
        data: itemid,
        dataType:"html",
        success: function(response) {
           if(response == 1)
            {   
              $("#checkboxesmsga").html('<div class="alert alert-danger alert-dismissable"><a href="#"" class="close" data-dismiss="alert">&times;</a>Only 10 items allowed!</div>');
        }
        else if(response == 2){
          window.location="initiator.php"; 

        }else{  $("#checkboxesmsga").html('<div class="alert alert-danger alert-dismissable"><a href="#"" class="close" data-dismiss="alert">&times;</a>Atleast one item must be selected!</div>');

         }
          },
             error: function(response) {
            
         }

         });
       });

   $("#submitb").click(function(event){
     event.preventDefault();
     var itemid = '';
     itemid =  $("#itemlistformb").serialize();
      $.ajax({
        type: "POST",
        url: "../classes/src/initiator.php",
        data: itemid,
        dataType:"html",
        success: function(response) { 
            if(response == 1)
            {   
              $("#checkboxesmsgb").html('<div class="alert alert-danger alert-dismissable"><a href="#"" class="close" data-dismiss="alert">&times;</a>Only 10 items allowed!</div>');
        }
        else if(response == 2){
          window.location="initiator.php"; 
        }else{
         $("#checkboxesmsgb").html('<div class="alert alert-danger alert-dismissable"><a href="#"" class="close" data-dismiss="alert">&times;</a>Atleast one item must be selected!</div>');
          }
           },
             error: function(response) {
         }

         });
       });


    });