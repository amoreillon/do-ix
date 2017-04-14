	      
<!-- css  -->
<?php include_once "includes/header.php" ?>
<?php include_once "includes/browsercheck.php" ?>
<?php include_once "../classes/class.load.php" ?>
<!-- /css -->
<!-- page content --> 
<div class="container"> 
	<div class="row">
  <div class="col-sm-3 pull-left logomargin">
   <a href="index.php"><img src="../assets/logos/do-ix.png" width="70px" height="70px" alt="logo"></a>
  </div>
  <div class="col-sm-9 pull-left">
    <h4 class="logotext">do ix</h4>
  </div>
</div>
<br><br>  
<div class="row">
<div class="col-sm-12">
<p class="paraclassitems">Good to have you back! Here are your results - from most to least awesome for both of you.!</p>
</div>
</div><br>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel-group accordion" id="accordion3">
				<div class="panel panel-default">
					<div id="collapse_3_1" class="panel-collapse in">
						<div class="panel-body">

					    <?php if(isset($_GET['init']) && isset($_GET['iniv'])){ 

						$initid = base64_decode(urldecode($_GET['init']));
						$inivid = base64_decode(urldecode($_GET['iniv']));
						$row  = $inviteobj->getResult($initid, $inivid);
                        $value = 10;
                        $valuen = -10;
                        
						  foreach($row as $data)
                     {        
                    	    echo "<hr>";
                          echo "<div class='sliderstext'>".$data['item_name']."</b></br><br>";
                          if($data['initator_rating'] > 0 && $data['invitee_rating'] > 0 ){
                          echo "<div class='initiatorp' style='width:".$data['initator_rating'] * $value."%;'>".substr($data['initiator_name'],0,10)."</div><br>";
                          echo "<div class='inviteep' style='width:".$data['invitee_rating'] * $value."%;'>".$data['invitee_name']."</div><br></hr>";
                         }elseif($data['initator_rating'] < 0 && $data['invitee_rating'] < 0){
                         	 echo "<div class='initiatorn' style='width:".$data['initator_rating'] * $valuen."%;'>".$data['initiator_name']."</div><br>";
                             echo "<div class='inviteen' style='width:".$data['invitee_rating'] * $valuen."%;'>".$data['invitee_name']."</div><br>";

                         }elseif($data['initator_rating'] > 0 && $data['invitee_rating'] < 0){
                                 echo "<div class='initiatorp' style='width:".$data['initator_rating'] * $value."%;'>".substr($data['initiator_name'],0,10)."</div><br>";
                                 echo "<div class='inviteen'  style='width:".$data['invitee_rating'] * $valuen."%;'>".substr($data['invitee_name'],0,10)."</div><br>";
                         }elseif($data['initator_rating'] < 0 && $data['invitee_rating'] > 0){
                                 echo "<div class='initiatorn'  style='width:".$data['initator_rating'] * $valuen."%;'>".$data['initiator_name']."</div><br>";
                                 echo "<div class='inviteep' style='width:".$data['invitee_rating'] * $value."%;'>".$data['invitee_name']."</div><br>";
                         }
                         elseif($data['initator_rating'] == 0 && $data['invitee_rating'] > 0){
                                 echo "<div class='initiatorp' style='width:0%;'></div><br>";
                                 echo "<div class='inviteep' style='width:".$data['invitee_rating'] * $value."%;'>".$data['invitee_name']."</div><br>";
                         }
                         elseif($data['initator_rating'] > 0 && $data['invitee_rating'] == 0){
                                echo "<div class='initiatorp' style='width:".$data['initator_rating'] * $value."%;'>".$data['initiator_name']."</div><br>";
                                echo "<div class='inviteep' style='width:0%'><br></div><br>";
                         }
                         elseif($data['initator_rating'] == 0 && $data['invitee_rating'] < 0){
                                 echo "<div class='initiatorp' style='width:0%;'></div><br>";
                                 echo "<div class='inviteen' style='width:".$data['invitee_rating'] * $valuen."%;'>".$data['invitee_name']."</div><br><br>";
                         }
                         elseif($data['initator_rating'] < 0 && $data['invitee_rating'] == 0){
                               echo "<div class='initiatorn' style='width:".$data['initator_rating'] * $valuen."%;'>".$data['initiator_name']."</div><br>";
                               echo "<div class='inviteep' style='width:0%'><br></div><br><br>";
                         }
                          else{
                         	   echo "<div class='initiatorp' style='width:0%;'></div><br>";
                         	   echo "<div class='inviteep' style='width:0%'></div><br><br>";
                         }
                        }



					   // if($initid > 0 && $inivid > 0){
					   // 	$row = $inviteobj->get_ratingresulta($initid,$inivid);
					   // 		if(!$row){
        //              	echo "No item found!";
        //               }
        //           foreach($row as $data)
        //             {
        //                   echo $data['item_name']."<br>";
        //              }
					   
					   // }else{
					   // 	   	echo "<div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert'>&times;</a>No result found!</div>";
					   // }
                   }?>
                  </div>
					</div>
				</div>
					</div>
				</div>
			</div>

		</div>
	</div>


</div>
<!-- /page content -->

<!-- footer content -->
<?php include_once "includes/footer.php" ?>
<!-- /footer content -->


