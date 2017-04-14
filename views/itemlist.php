          
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
<p class="paraclassitems">Please select a theme and add the items you want to compare!</p>
</div>
</div><br>
<div class="row">
<div class="col-sm-12">
  <ul class="nav nav-pills pills">
    <li><a data-toggle="pill" class="alink" href="#activities" style="border-radius: 15px; padding: 14px 16px;">Activities</a></li>
    <li class="active" ><a data-toggle="pill" class="alink"  href="#food" style="border-radius: 15px; padding: 14px 16px;">Food</a></li>
    <li><a data-toggle="pill" class="alink"  href="#vacations" style="border-radius: 15px; padding: 14px 16px;">Vacations</a></li>
  </ul>
  <div class="tab-content">
    <div id="activities" class="tab-pane fade pills"><br>
        <div class="row">
     <div class="col-sm-12">
     <form   id="itemlistforma" novalidate="novalidate">
       <div id="checkboxesmsga"></div>
       <?php 
        $row = $initiatorobj->get_itemsdataB(); 
        if(isset($row) && !empty($row)){
          foreach($row as $data)
           { 
             ?>
             <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-default <?php if($data['item_id'] == 31 || $data['item_id'] == 32 || $data['item_id'] == 33 ||  $data['item_id'] == 34 ||  $data['item_id'] == 35) echo 'active'; ?>" style="margin-top:10px; margin-left: 4px; z-index: 0;">
              <input type="checkbox" value="<?php  echo $data['item_id'].",".$data['item_name']; ?>"  name="itemid[]" class="single-checkbox"  <?php if($data['item_id'] == 31 || $data['item_id'] == 32 ||  $data['item_id'] == 33 ||  $data['item_id'] == 34 ||  $data['item_id'] == 35) echo "checked=\"checked\" class='active'"; ?>><?php echo wordwrap($data['item_name'],5,"<br>\n") ?>
              </label>
               </div>
              <?php }?><br><br>
             <br><br><br>
              <div class="itemlistmain">
             <span class="itemtext">Select up to 10 items!</span>
            <button type="button" class="btn btn-primary btn-items" id="submita">Next</button>
            <input type="hidden" name="itemadd">
          </div>
      <?php 
        }else{ echo "No data!";}?>
     </form>
     </div>
    </div>
    </div>
    <div id="food" class="tab-pane fade  in active pills"><br>
     <div class="row">
     <div class="col-sm-12">
     <form   id="itemlistform" novalidate="novalidate">
       <div id="checkboxesmsg"></div>
       <?php 
        $row = $initiatorobj->get_itemsdata();
         if(isset($row) && !empty($row)){ 
         foreach($row as $data)
           { 
             ?>
             <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-default <?php if($data['item_id'] == 1 || $data['item_id'] == 2 || $data['item_id'] == 3 ||  $data['item_id'] == 7 ||  $data['item_id'] == 12) echo 'active'; ?>" style="margin-top:10px; margin-left: 4px; z-index: 0;">
              <input type="checkbox" value="<?php  echo $data['item_id'].",".$data['item_name']; ?>"  name="itemid[]" class="single-checkbox"  <?php if($data['item_id'] == 1 || $data['item_id'] == 2 ||  $data['item_id'] == 3 ||  $data['item_id'] == 7 ||  $data['item_id'] == 12) echo "checked=\"checked\" class='active'"; ?>><?php echo wordwrap($data['item_name'],8,"<br>"); ?>
              </label>
               </div>
              <?php }?><br><br>
              <br><br><br>
              <div  class="itemlistmain">
             <span class="itemtext">Select up to 10 items!</span>
            <button type="button" class="btn btn-primary btn-items pull-right" id="submit">Next</button>
            <input type="hidden" name="itemadd">
          </div>
         <?php 
        }else{ echo "No data!";}?>
     </form>
     </div>
    </div>
    </div>
    <div id="vacations" class="tab-pane fade pills"><br>
        <div class="row">
     <div class="col-sm-12">
     <form   id="itemlistformb" novalidate="novalidate">
     <div id="checkboxesmsgb"></div>
       <?php 
        $row = $initiatorobj->get_itemsdataC(); 
        if(isset($row) && !empty($row)){ 
         foreach($row as $data)
           { 
             ?>
             <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-default <?php if($data['item_id'] == 61 || $data['item_id'] == 62 || $data['item_id'] == 63 ||  $data['item_id'] == 64 ||  $data['item_id'] == 65) echo 'active'; ?>" style="margin-top:10px; margin-left: 4px; z-index: 0; ">
              <input type="checkbox" value="<?php  echo $data['item_id'].",".$data['item_name']; ?>"  name="itemid[]" class="single-checkbox"  <?php if($data['item_id'] == 61 || $data['item_id'] == 62 ||  $data['item_id'] == 63 ||  $data['item_id'] == 64 ||  $data['item_id'] == 65) echo "checked=\"checked\" class='active'"; ?>><?php echo wordwrap($data['item_name'],6,"<br>\n") ?>
              </label>
               </div>
              <?php }?><br><br>
               <br><br><br>
              <div class="itemlistmain">
             <span class="itemtext">Select up to 10 items!</span>
        <button type="button" class="btn btn-primary btn-items" id="submitb">Next</button>
        <input type="hidden" name="itemadd">
       </div>
        <?php 
        }else{ echo "No data!";}?>
     </form>
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
<script src="includes/itemselection.js"></script>
<!-- /footer content -->


