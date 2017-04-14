
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
<form  id="userinfoform" novalidate="novalidate">
<div class="row well wellclass">
<div class="row">
<div class="item form-group">
	<span class="control-label col-md-3 col-sm-3 col-xs-12"  style="margin-bottom: 10px;">About you
	</span>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input  type="text" id="name" class="form-control col-md-7 col-xs-12" placeholder="Your first name"  name="initiatorname"  required="required">
	</div></div></div>
	<div class="row">
		<div class="item form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"></label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input  type="email" id="email" class="form-control col-md-7 col-xs-12" placeholder="Your e-mail address"  name="initiatoremail"  required="required">
			</div>
		</div></div></div>
		<div class="row well wellclass">
			<div class="row">
				<div class="item form-group">
					<span class="control-label col-md-3 col-sm-3 col-xs-12" style="margin-bottom: 10px;">About your partner
					</span>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input  type="text" id="name" class="form-control col-md-7 col-xs-12" placeholder="Your partner’s first name"  name="inviteename"  required="required">
					</div>
				</div></div>
				<div class="row">
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="email" id="email" class="form-control col-md-7 col-xs-12" placeholder="Your partner’s e-mail address"  name="inviteeemail"  required="required">
						</div>
					</div>
				</div></div>
				<br>
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
							<button type="button" id="submit" class="btn btn-primary btn-sliders pull-right"> Submit</button>
							<input type="hidden" name="userinfo">
						</div>
					</div>

				</div>
			</form>
		</div>
	</div> 

</div>
<!-- /page content -->

<!-- footer content -->
<?php include_once "includes/footer.php" ?>
<script src="../assets/validator/validator.js"></script>
<script src="../assets/validator/initvalidator.js"></script>
<script src="includes/userinfo.js"></script>
<!-- /footer content -->
