<?php 
require_once "class.load.php";

class Invitee extends Database {

	/*** Add invitee***/
	public function add_invitee($initiatorid,$inviteeemail,$inviteename,$usertype){

		
		$sql = "INSERT INTO tbl_users(parent_id,invitee_email,invitee_name,user_type) 
		VALUES ('$initiatorid','$inviteeemail','$inviteename', '$usertype')";
		$result = mysqli_query($this->con,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
		$last_id = mysqli_insert_id($this->con);
		return $last_id;
		
	}

	/*** Add ratings***/
	public function add_ratings($inviteeid,$rating, $itemids,$usertype,$initiatorid){

		foreach($itemids as $key=>$val){

			$ratings = mysqli_real_escape_string($this->con,$rating[$key]); 
			$itemid  = mysqli_real_escape_string($this->con,$val); 

			$sql = "INSERT INTO tbl_ratings(user_id,parent_id,rating_value,user_type,item_id) 
			VALUES ('$inviteeid','$initiatorid','$ratings','$usertype','$itemid')";
			$result = mysqli_query($this->con,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
		}
		return $result;
	}

	/*** Add result***/
	public function add_result($data) {
		if (!$data) {
			return false;
		}
		$sql = "INSERT INTO tbl_result (initiator_id, invitee_id, item_id, category, score)
		VALUES ('".$data['initiator_id']."', '".$data['invitee_id']."', '".$data['item_id']."', '".$data['category']."', '".$data['score']."')";  

		$result = mysqli_query($this->con,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result;
		
	}

 /*Get items invitee list*/
	public function get_itemsinviteedata($id){

		
		//$sql1="SELECT* from lutbl_items";
	$sql1 = 	"SELECT * FROM tbl_ratings
       LEFT OUTER JOIN lutbl_items  ON
     lutbl_items.item_id = tbl_ratings.item_id
       WHERE user_id = '$id'";
		$array = array();
		$query = mysqli_query($this->con,$sql1);
		while($row = mysqli_fetch_assoc($query))
		{
			$array[] = $row;
		}

		return $array;
		
	}

	/*Get items list*/
	public function get_itemsdata(){

		
		$sql1="SELECT* from lutbl_items";
		$array = array();
		$query = mysqli_query($this->con,$sql1);
		while($row = mysqli_fetch_assoc($query))
		{
			$array[] = $row;
		}

		return $array;
		
	}
	/*Get result  NEW*/
	public function get_ratingresultnew($initiatorid,$inviteeid){

		$sql1 = "SELECT  item_name,initiator_name,invitee_name,rating_value from tbl_result
		 LEFT OUTER JOIN lutbl_items ON tbl_result.item_id = lutbl_items.item_id
		 LEFT OUTER JOIN tbl_users ON tbl_result.initiator_id = tbl_users.user_id
		 LEFT OUTER JOIN tbl_ratings ON tbl_result.item_id = tbl_ratings.item_id
		  WHERE initiator_id = $initiatorid AND invitee_id = $inviteeid ORDER BY score ASC";

		  echo $sql1;exit;
		// $sql1="SELECT * from tbl_result
		// LEFT OUTER JOIN  lutbl_items ON
		// tbl_result.item_id = lutbl_items.item_id
		// WHERE initiator_id = $initiatorid AND invitee_id = '$inviteeid' AND category = 'A'
		// ORDER BY score ASC";
		$array = array();
		$query = mysqli_query($this->con,$sql1);
		while($row = mysqli_fetch_assoc($query))
		{
			$array[] = $row;
		}

		return $array;
		
	}

	public function getResult($initiatorid,$inviteeid){

		$sql1 = "SELECT r.*, it.`item_name`, u.`initiator_name`, u.`invitee_name`
		FROM tbl_result r
		LEFT JOIN lutbl_items it ON (r.`item_id` = it.`item_id`)
		LEFT JOIN tbl_users u ON (r.`initiator_id` = u.`user_id`)
		WHERE initiator_id = $initiatorid AND invitee_id = $inviteeid
		ORDER BY score ASC";
		$array = array();
		$query = mysqli_query($this->con,$sql1);
		while($row = mysqli_fetch_assoc($query))
		{
			$array[] = $row;
		}
		if (isset($array) && is_array($array)) {
			foreach ($array as  &$value) {
				$value['initator_rating'] = $this->getItemRating($value['item_id'], $value['initiator_id']);
				$value['invitee_rating'] = $this->getItemRating($value['item_id'], $value['invitee_id']);
			}
		}
		return $array;
		
	}

	public function getItemRating($item_id, $user_id)
	{
		if (!$item_id || !$user_id) {
			return false;
		}
		$sql1 = "SELECT rating_value FROM tbl_ratings

		WHERE item_id = $item_id AND user_id = $user_id";
		$query = mysqli_query($this->con, $sql1);
		if ($row = mysqli_fetch_assoc($query))
		{
			return $row['rating_value'];
		}
		return false;
	}
	/*Get result  A*/
	public function get_ratingresulta($initiatorid,$inviteeid){

		
		$sql1="SELECT * from tbl_result
		LEFT OUTER JOIN  lutbl_items ON
		tbl_result.item_id = lutbl_items.item_id
		WHERE initiator_id = $initiatorid AND invitee_id = '$inviteeid' AND category = 'A'
		ORDER BY score ASC";
		$array = array();
		$query = mysqli_query($this->con,$sql1);
		while($row = mysqli_fetch_assoc($query))
		{
			$array[] = $row;
		}

		return $array;
		
	}
	/*Get result  B*/
	public function get_ratingresultb($initiatorid,$inviteeid){

		
		$sql1="SELECT * from tbl_result
		LEFT OUTER JOIN  lutbl_items ON
		tbl_result.item_id = lutbl_items.item_id
		WHERE initiator_id = $initiatorid AND invitee_id = '$inviteeid' AND category = 'B'
		ORDER BY score ASC";
		$array = array();
		$query = mysqli_query($this->con,$sql1);
		while($row = mysqli_fetch_assoc($query))
		{
			$array[] = $row;
		}

		return $array;
		
	}
	/*Get result C*/
	public function get_ratingresultc($initiatorid,$inviteeid){

		
		$sql1="SELECT * from tbl_result
		LEFT OUTER JOIN  lutbl_items ON
		tbl_result.item_id = lutbl_items.item_id
		WHERE initiator_id = $initiatorid AND invitee_id = '$inviteeid' AND category = 'C'
		ORDER BY score ASC";
		$array = array();
		$query = mysqli_query($this->con,$sql1);
		while($row = mysqli_fetch_assoc($query))
		{
			$array[] = $row;
		}

		return $array;
		
	}

	/*Get init data*/
	public function get_initiatordata($initiatorId){

		
		$sql1="SELECT user_id,initiator_email,initiator_name,invitee_email,invitee_name from tbl_users WHERE user_id = '$initiatorId'";
		$array = array();
		$query = mysqli_query($this->con,$sql1);
		$row = mysqli_fetch_array($query);
		return $row;
		
	}
	/*Get user ratings*/
	public function get_user_ratings($user_id, $parent_id = null) {

		$sql1="SELECT * from tbl_ratings WHERE user_id ='$user_id'";
		if ($parent_id) {
			$sql1 .= " AND parent_id = '$parent_id'";
		} else {
			$sql1 .= " AND parent_id IS NULL";
		}

		$array = array();
		$query = mysqli_query($this->con,$sql1);
		while($row = mysqli_fetch_assoc($query))
		{
			$array[] = $row;
		}

		return $array;
		
	}
	/*Get user by email*/
	public function get_user_by_email($email, $parent_id) {

		if (empty($email) || !$email) {
			return false;
		}

		$sql1="SELECT * from tbl_users WHERE parent_id ='$parent_id' AND invitee_email = '$email' ";

		$array = array();
		$query = mysqli_query($this->con,$sql1);
		if($row = mysqli_fetch_assoc($query)) {
			return $row;
		}
		return false;
		
	}

	public function mail_result($initiatoremail,$inviteeemail,$initiatorid,$inviteeid)
	{     
		

		$initiatorid = base64_encode($initiatorid);
		$inviteeid   = base64_encode($inviteeid); 
		$to = $inviteeemail.','.$initiatoremail;
		$subject = "Yay, your do-ix results are out!";


		$message = '<html><body>';
		$message .= '<p>Hello you,</p>';
		$message .= '<p style="font-size:14px;font-family:Calibri;">Looks like you are both keen to embark on new discoveries!</p>';
		$message .= '<p style="font-size:14px;font-family:Calibri;">Go ahead and click on the link below to see which are the food you both love!</p>';
		$message .= '<a href="http://do-ix.date/views/result.php?init='.$initiatorid.'&iniv='.$inviteeid.'" target="_blank">Click Here to view do-ix result.</a><br><br>';
		$message .= '<span><a href="http://do-ix.date" target="_blank"><img src="http://do-ix.date/assets/logos/do-ix.png" height="100px" width="100px" alt="do-ix" ></a></span>';
		$message .= '</body></html>';

		// Set content-type header for sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// Additional headers
		$headers .= 'From: do-ix<info@do-ix.date>' . "\r\n";
		//$headers .= 'Cc: welcome@example.com' . "\r\n";
		//$headers .= 'Bcc: welcome2@example.com' . "\r\n";
     
		//Send email
		if(mail($to,$subject,$message,$headers)):
			return true;
		else:
			return false;
		endif;
		
	}




}


$inviteobj =  new Invitee();
?>