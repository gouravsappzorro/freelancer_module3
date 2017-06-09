<?php 

	include "../Admin/MyInclude/MyConfig.php";
if($_POST['id'])
{
	
	$sql="select * from admin_subcategory where Category_Id='".$_POST['id']."'";
	
	$res=mysql_query($sql);
	$cnt=mysql_num_rows($res);
	?>
	<div class="row-fluid">
       <div class="span8">
		<div class="control-wrap"> 
		<span class="icon"><i class="fa fa-envelope-o"></i></span>
    	<label><strong>Select sub category of work:</strong></label><br />
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
    	<div style="margin: 0px 0px 0px -130px;<?php if($cnt==0){echo "display: none;";}?>" class="bs-example " >
                                                    <ul class="list-inline cat-tooltip" style="display:none">
                                                        <li>
                                                            <a data-toggle="tooltip" data-html="true" data-placement="right" title="Enter SubCategory" class="right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a>
                                                        </li>
                                                    </ul>
                                                </div>
	

    <?php	
}
?>