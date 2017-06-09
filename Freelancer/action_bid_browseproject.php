<?php include('Admin/MyInclude/MyConfig.php'); ?>
<?php

extract($_POST);

if($project_id)
{
	
?>
<form method="post" action="bid_action.php" onSubmit="return bidValidation(this);">
       <input name="project_id" id="project_id" type="hidden" value="<?php echo $project_id?>">
       <input name="list" id="list" type="hidden" value="1">
      
       
       <input name="cost" id="cost" type="text"  onBlur="costCheck(this.value)" value="" class="username" placeholder="Your Cost"/>
       <div style="color:RED;" id="cost_error" class="error"></div><br>
       <input name="duration" id="duration" type="text"  onBlur="durationCheck(this.value)" value="" class="username" placeholder="Your Time Duration"/>
       <div style="color:RED;" id="duration_error" class="error"></div><br>
       
       <textarea style="width:100%;" name="bid_message" id="bid_message" type="text"  onBlur="blankCheck(this.value,this.id)" placeholder="Biding Message"></textarea>
       
       <div style="color:RED;" id="bid_message_error" class="error"></div><br>
       <div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		<input type="submit" name="save_bid" value="Submit">
      	  	</div>
         </form>
<?php
}
?>