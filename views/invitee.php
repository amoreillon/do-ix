	          
<!-- css  -->
<?php include_once "includes/header.php" ?>
<?php include_once "includes/browsercheck.php" ?>
<?php session_start();?>
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
<?php if(isset($_GET['initiator'])){ 

			$id = base64_decode(urldecode($_GET['initiator']));
			if(isset($_GET['initiator']) && $id > 0)
				{ $initiatorrec = $inviteobj->get_initiatordata($id); }
			else{  
				echo "<div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert'>&times;</a>Not a valid Invitation Link!</div>";
				exit;
			}
		}else{echo "<div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert'>&times;</a>Not a valid Invitation Link!</div>";
		exit;} ?>
<div class="col-sm-12">
<p class="paraclassitems">Hello <b><?php echo $initiatorrec['invitee_name']?></b>! Rate your preferences<br> from Hate to Love and we will do the rest!</p>
</div>
</div><br>
	<br><br>
	<div class="row">  
		
		<div class="col-sm-12">
			<form id="inivteeform" novalidate>
				<?php 
				$row = $inviteobj->get_itemsinviteedata($id);
				if(isset($row) && !empty($row) && $row){
				if(!$row){
					echo "<div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert'>&times;</a>No items found to rate!</div>";
					exit;
				}
				foreach($row as $data)
					{?>  
				<div class="row">
					<div class="form-group">
						<span class="control-label col-md-3 col-sm-3 col-xs-12 text-center sliderstext" for="name"><?php echo $data['item_name']; ?>
						</span>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" class="range"  name="item[]">
							<input type="hidden" value="<?php echo $data['item_id']; ?>"  name="itemid[]">
							<span class="titlecolor">Hate</span><span class="pull-right titlecolor">Love</span>
						</div>
					</div></div><br>
					<?php }}?><br>

					<div id="loader" class="text-center" style="color:#ff4747;"></div>
					<div class="row" id="showhidediv">
						<div class="col-sm-12" id="result">
						</div>
					</div>
					<div class="row">
					<div class="col-sm-5 pull-left">
						<p class="disclaim">By clicking submit, you<br> confirm that you have read<br> and accept our privacy policy</p>
						</div>
						<div class="col-sm-7">
							<input type="hidden" name ="initiatorid" value="<?php echo $id ?>">
							<input type="hidden" name ="inviteeemail" value="<?php echo $initiatorrec['invitee_email']?>">
							<input type="hidden" name ="initiatoremail" value="<?php echo $initiatorrec['initiator_email']?>">
							<input type="hidden" name ="inviteename" value="<?php echo $initiatorrec['invitee_name']?>">
							<button type="submit" id="submit" class="btn btn-primary btn-sliders pull-right"> Submit  </button>
						</div>
					</div>
				</form>
			</div>
		</div> 

	</div>
	<!-- /page content -->

	<!-- footer content -->
	<?php include_once "includes/footer.php" ?>
	<script src="includes/slideroptions.js"></script>
	<script src="includes/invitee.js"></script>
	<!-- /footer content -->
