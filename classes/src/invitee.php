	<?php
	session_start();
	include_once "../class.load.php";


	if(isset($_POST["initiatorid"])){

	$usertype = INVITEE; 
	$initiatorid  = mysqli_real_escape_string($dbobj->con,$_POST['initiatorid']);
	$inviteeemail = mysqli_real_escape_string($dbobj->con,$_POST['inviteeemail']);
	$initiatoremail = mysqli_real_escape_string($dbobj->con,$_POST['initiatoremail']);
	$inviteename = mysqli_real_escape_string($dbobj->con,$_POST['inviteename']);
	$itemids  = $_POST['itemid'];
	$rating   = $_POST['item'];



	if(isset($initiatorid) && empty($initiatorid)){
		echo "Something went Wrong please try again later";
		
	}
	elseif((isset($inviteeemail) && empty($inviteeemail)) || (isset($initiatoremail) && empty($initiatoremail)))
	{
		echo "Something went Wrong please try again later";
	}else{ 
	 $tmp = array_filter($rating);
           if(empty($tmp)){
			echo "*Please rate your preferences!";
			exit;
		} else{

			$inviteeid = $inviteobj->add_invitee($initiatorid,$inviteeemail,$inviteename,$usertype);
			if (isset($inviteeid) &&  $inviteeid > 0) {
				$ratings = $inviteobj->add_ratings($inviteeid,$rating,$itemids,$usertype,$initiatorid);
			}
			
			if (isset($ratings) && $ratings) {
				$sender_data = $inviteobj->get_user_ratings($initiatorid);
				if (isset($sender_data) && $sender_data) {
					$inv2 = $inviteobj->get_user_by_email($inviteeemail, $initiatorid);
					$receiver_data = $inviteobj->get_user_ratings($inv2['user_id'], $inv2['parent_id']);
					$result = array(
						'initiator_id' => 0,
						'invitee_id' => 0,
						'item_id' => 0,
						'category' => 0,
						'score' => 0
						);
					if (isset($sender_data) && isset($receiver_data)) {
						foreach ($sender_data as $key => $value) {
	 				$result['initiator_id'] = $initiatorid;//initiatorid;
	 				$result['invitee_id'] = $inv2['user_id'];
	 				if ($value['item_id'] == $receiver_data[$key]['item_id']) {
	 					$usr1rating =$value['rating_value'];
	 					$user2ratings = $receiver_data[$key]['rating_value']; 
	 					$res1 = (5-($usr1rating));
	 					$power1 =  (pow($res1,2));
	 					$res2 = (5-($user2ratings));
	 					$power2 =  (pow($res2,2));
	 					$resultscore = $power1+$power2;
	 					$finalscore = sqrt($resultscore);
	 					$result['item_id'] = $value['item_id'];
	 					if ($value['rating_value'] > 0 && $receiver_data[$key]['rating_value'] > 0) {
	 						// category A
	 						$result['category'] = 'A';
	 					} elseif ($value['rating_value'] < 0 && $receiver_data[$key]['rating_value'] < 0) {
	 						//Category C
	 						$result['category'] = 'C';
	 					} elseif(($value['rating_value'] < 0 || $receiver_data[$key]['rating_value'] < 0) && ($value['rating_value'] != 0 && $receiver_data[$key]['rating_value'] != 0))
	 					{
	 						//category B
	 						$result['category'] = 'B';
	 					}else {
	 						 //category B
	 						$result['category'] = 'D';
	 					}
	 				}
	 				$result['score'] = $finalscore;
	 				// insert data
	 				$inviteadd = $inviteobj->add_result($result);
	 			}
	 		}
	 		
	 	}
	 }

	 if(isset($inviteadd) && $inviteadd){
	 	$email = $inviteobj->mail_result($initiatoremail,$inviteeemail,$initiatorid,$inviteeid);
	 }
	 if(isset($email) && $email) {
        // http://do-ix.date/views/result.php?init='.$initiatorid.'&iniv='.$inviteeid.
        $initiatorid = base64_encode($initiatorid);
		$inviteeid   = base64_encode($inviteeid);
		echo "init=".$initiatorid."&iniv=".$inviteeid;
	 	//header("Location:../../views/result.php?init=$initiatorid&iniv=$inviteeid");

	 	//echo 1;
	 	session_destroy();
	 	exit;
	 	
	 }else{
	 	
	 	echo 0;
	 	exit;
	 }


	} 
	}

	}else { echo "Failed to Submit Ratings!"; 
	           exit; }?>
