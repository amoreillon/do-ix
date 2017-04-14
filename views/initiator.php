  
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
<div class="col-sm-12">
<p class="paraclassitems">Great! Now just rate your preferences from hate to love and we will do the rest!</p>
</div>
</div><br>
<div class="row">  
<div class="col-sm-12">
<form  id="myform" novalidate="novalidate">
	<?php 
   if(isset($_SESSION['itemids'])){
		$row = $_SESSION['itemids'];
	}	

	if(isset($row) && !empty($row)){
		if(!$row){
			echo "<div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert'>&times;</a>No items found to rate!</div>";
			exit;
		}
		foreach ($row  as $key => $data) 
		{ 
			$dataarr =  explode(',',$data); 
			?>  
			<div class="row">
				<div class="form-group">
					<span class="control-label col-md-3 col-sm-3 col-xs-12 text-center sliderstext" for="name" ><?php if(isset($dataarr) && !empty($dataarr)){ echo $dataarr[1];} ?>
					</span>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text"  class="range"  name="item[]">
						<input type="hidden" value="<?php if(!empty($dataarr) && !empty($dataarr)){echo $dataarr[0];} ?>"  name="itemid[]">
						<span class="titlecolor">Hate</span><span class="pull-right titlecolor">Love</span>
					</div>
				</div></div><br>
				<?php } }else{ echo "Select Items first!";}?><br>
				<div id="loader" class="text-center" style="color:#ff4747;"></div>
				<div class="row" id="showhidediv">
					<div class="col-sm-12" id="result">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<button type="button" id="submit" class="btn btn-primary btn-sliders pull-right"> Submit  </button>
						<input type="hidden" name="initiatorratings">
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
<script src="includes/inititaorpost.js"></script>
<!-- /footer content -->
