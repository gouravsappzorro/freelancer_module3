<?php include('Admin/MyInclude/MyConfig.php'); ?>
<?php

extract($_POST);
if($value==2)
{
	mysql_query("delete from user_bids where project_id='".$Project_Id."' and uid='".$_SESSION['id']."'");
}

if($value==1)
{
	$sql_sel=mysql_query("select * from user_bids where project_id='".$Project_Id."' and uid='".$_SESSION['id']."'");
	$row_sel=mysql_fetch_array($sql_sel);
	$row=mysql_fetch_array(mysql_query("select * from post_projects where project_id='".$Project_Id."'"));
	?>
    
      <form method="post" action="bid_action.php" onSubmit="return bidValidation(this);">
       <input name="project_id" id="project_id" type="hidden" value="<?php echo $row_sel['project_id']; ?>">
       <input name="list" id="list" type="hidden" value="1">
      
       
       <input name="cost" id="cost" type="text"  onBlur="costCheck(this.value)" class="username" <?php if($row['type_of_project']=='fixed'){ ?> value="<?php echo $row_sel['cost']; ?>"  placeholder="Enter Cost in <?php echo $row['currency'];?>" <?php }else{?> placeholder="Enter Cost in <?php echo $row['currency'];?> for one hour" <?php }?> value="<?php if(isset($row_sel['cost'])){ echo $row_sel['cost'] / $row_sel['duration'];} ?>"/>
       <div style="color:RED;" id="cost_error" class="error"></div><br>
       <input name="duration" id="duration" type="text"  onBlur="durationCheck(this.value)" value="<?php echo $row_sel['duration']; ?>" class="username" <?php if($row['type_of_project']=='fixed'){ ?> placeholder="Enter No. of Days" <?php }else{?> placeholder="Enter No. of hours" <?php }?>/>
       <div style="color:RED;" id="duration_error" class="error"></div><br>
       
       <textarea style="width:100%;" name="bid_message" id="bid_message" type="text"  onBlur="blankCheck(this.value,this.id)" placeholder="Biding Message"><?php echo $row_sel['bid_message']; ?></textarea>
       
       <div style="color:RED;" id="bid_message_error" class="error"></div><br>
       <div class="modal-footer">
        		<button type="button" class="btn btn-default" onclick="window.location.reload()" data-dismiss="modal">Close</button>
        		<input type="submit" name="save_bid" value="Submit">
      	  	</div>
         </form>  
       
    <?php
}
?>