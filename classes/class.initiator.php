<?php 
require_once "class.load.php";

class Initiator extends Database {

	/*** Add initiator***/
	public function add_initiator($initiatoremail,$inviteeemail,$initiatorname,$inviteename,$usertype){

		
		$sql = "INSERT INTO tbl_users(initiator_email,initiator_name,invitee_email,invitee_name,user_type) 
           VALUES ('$initiatoremail','$initiatorname','$inviteeemail','$inviteename','$usertype')";
            $result = mysqli_query($this->con,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
            $last_id = mysqli_insert_id($this->con);
			return $last_id;
		
	}

	/*** Add ratings***/
	public function add_ratings($initiatorid,$rating, $itemids,$usertype){

       foreach($itemids as $key=>$val){

        $ratings = mysqli_real_escape_string($this->con,$rating[$key]); 
        $itemid  = mysqli_real_escape_string($this->con,$val); 

        $sql = "INSERT INTO tbl_ratings(user_id,rating_value,user_type,item_id) 
            VALUES ('$initiatorid','$ratings','$usertype','$itemid')";
            $result = mysqli_query($this->con,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
        }
	   return $result;
     }

     /*Get items list*/
	public function get_itemsdata(){

		
		$sql1="SELECT* from lutbl_items WHERE item_category = 'A'";
		$array = array();
		$query = mysqli_query($this->con,$sql1);
		while($row = mysqli_fetch_assoc($query))
		{
			$array[] = $row;
		}

		return $array;
		
	}

	  /*Get items list*/
	public function get_itemsdataB(){

		
		$sql1="SELECT* from lutbl_items WHERE item_category = 'B'";
		$array = array();
		$query = mysqli_query($this->con,$sql1);
		while($row = mysqli_fetch_assoc($query))
		{
			$array[] = $row;
		}

		return $array;
		
	}

	  /*Get items list*/
	public function get_itemsdataC(){

		
		$sql1="SELECT* from lutbl_items WHERE item_category = 'C'";
		$array = array();
		$query = mysqli_query($this->con,$sql1);
		while($row = mysqli_fetch_assoc($query))
		{
			$array[] = $row;
		}

		return $array;
		
	}

	public function mail_invitee($initiatoremail,$inviteeemail,$initiatorid)
	 {     
		 

        $initiatorid = base64_encode($initiatorid);
		$to = $inviteeemail;
		$subject = $initiatoremail." "."has invited you to complete a do-ix";


		$message = '<html><body>';
		$message .= '<p>Hello there,</p>';
		$message .= '<p style="font-size:14px;font-family:Calibri;">Welcome to do-ix! '.$initiatoremail.' has invited you to discover the common food that you both love.</p>';
		$message .= '<p style="font-size:14px;font-family:Calibri;"> Do-ix is a fun experiment that couples can do to discover what they love most in common.</p>';
		$message .= '<p style="line-height:20px;font-size:14px;font-family:Calibri;">Go ahead and click on the link below to complete the do-ix and we will do all the rest!</p>';
		$message .= '<a href="http://do-ix.date/views/invitee.php?initiator='.$initiatorid.'" target="_blank">Click Here to complete the do-ix</a><br><br>';
		$message .= '<span><a href="http://do-ix.date" target="_blank"><img src="http://do-ix.date/assets/logos/do-ix.png"  height="100px" width="100px" alt="do-ix" ></a></span>';
		$message .= '</body></html>';

		// Set content-type header for sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// Additional headers
		$headers .= 'From: do-ix<info@do-ix.date>' . "\r\n";
		//$headers .= 'Cc: welcome@example.com' . "\r\n";
		//$headers .= 'Bcc: welcome2@example.com' . "\r\n";
		// //Send email
		if(mail($to,$subject,$message,$headers)):
		return true;
		else:
		return false;
		endif;
		

}

}


$initiatorobj =  new Initiator();
?>