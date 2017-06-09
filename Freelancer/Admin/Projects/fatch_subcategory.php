<?php 

	include "../MyInclude/MyConfig.php";
if($_POST['id'])
{
	
	$sql="select * from admin_subcategory where Category_Id='".$_POST['id']."'";
	
	$res=mysql_query($sql);
	$cnt=mysql_num_rows($res);
	?>
		<label class="col-md-2 control-label">sub category of work<span class="required">*</span></label>
        <div class="col-md-6">
            <label for="Sub Category" class="error" id="subCategory_error"></label>
                <div class="input-group">
    <?php
	if($cnt!=0)
	{
		while($row=mysql_fetch_array($res))
		{
?>
	        
	        <input type="checkbox" value="<?php echo $row['SubCategory']; ?>" name="subcategory[]" onBlur="subcategoryCheck(this.value)">  <?php echo $row['SubCategory']; ?></br>
<?php
		}
	}
	else
	{
		?>
		<div>No sub category available
			<input type="checkbox" value="Not available" name="subcategory[]" style="display:none;"> 
		</div>
<?php		
	}
	?>
    	</div>
	</div>


    <?php	
}
?>