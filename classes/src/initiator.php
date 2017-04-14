		<?php
		session_start();
		include_once "../class.load.php";

		
		if(isset($_POST['itemadd']) && !empty($_POST['itemid']))
			{   $_SESSION['itemids'] = $_POST['itemid'];
		        if(sizeof($_SESSION['itemids']) > 10){
		               
		               echo 1;
		               exit;
	              }else{
	              	    echo 2;
	              }

	          }
	  
	  if(isset($_POST["initiatorratings"])){

		$_SESSION['ratings'] = $_POST['item'];
		$_SESSION['itemids'] = $_POST['itemid'];
		$tmp = array_filter($_SESSION['ratings']);
		if(empty($tmp)){
			echo "*Please rate your preferences!";
			exit;
		}else{ echo 3; }
	}

	if(isset($_POST["userinfo"]) && isset($_POST["initiatoremail"]) && isset($_POST["inviteeemail"])){

		$usertype = INITIATOR; //constant
		$initiatoremail = mysqli_real_escape_string($dbobj->con,$_POST['initiatoremail']);
		$inviteeemail   = mysqli_real_escape_string($dbobj->con,$_POST['inviteeemail']);
		$initiatorname  = mysqli_real_escape_string($dbobj->con,$_POST['initiatorname']);
		$inviteename    = mysqli_real_escape_string($dbobj->con,$_POST['inviteename']);

		if(empty($inviteename) || empty($initiatorname))
		{
			echo "*Provide your and your partner's name!<br>";
			exit;

		}elseif(empty($initiatoremail) || empty($inviteeemail)){
			   echo "*Email fields shouldn't be empty!<br>";
			   exit;
		} 
		elseif($initiatoremail == $inviteeemail){
			echo "*Email of your and your's partner shouldn't be same!";
			exit;
		}
		else{ 

			$initiatorid = $initiatorobj->add_initiator($initiatoremail,$inviteeemail,$initiatorname,$inviteename,$usertype);
			if ($initiatorid > 0) {
				$ratings = $initiatorobj->add_ratings($initiatorid,$_SESSION['ratings'], $_SESSION['itemids'] ,$usertype);
				if(isset($ratings) && isset($initiatorid) &&(!empty($initiatorid)) && $ratings){

				 $email = $initiatorobj->mail_invitee($initiatoremail,$inviteeemail,$initiatorid);
				 if($email){

				 	echo 4;
				 	session_destroy();
				 	exit;
				 }else{

				 	echo "Email sending Failed!";
				 	exit;
				 }

		     	}

			}

		}


	}

	?>