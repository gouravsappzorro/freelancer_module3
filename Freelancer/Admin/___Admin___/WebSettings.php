<?php include "../MyInclude/Db_Conn.php"; ?>
<?php include "../MyInclude/MyConfig.php"; ?>
						<?php	/**================================================================================||
								||      *Developer : Green Cubes Solutions										   ||
								||      *Website   : www.greencubes.co.in										   ||
								||      *Date      : 25-11-2014													   ||
								||																				   ||
								||      *  NOTICE OF LICENSE  *													   ||
								|| 																				   ||
								|| 																				   ||
								||		   This source file is subject to the Company Copyright 				   ||
								||		   and its use by any other party without concern of Greencubes        	   ||
								||  	   or trying to sell this code will be considered illegal 				   ||
								||		   and any legal actions can be undertaken.								   ||
								||		   If you want to receive a copy of the license, please send an email      ||
								||  	   to info@greencubes.co.in, for further procedure						   ||
								||=================================================================================**/?>
<?php if(isset($_SESSION['UserName']) && isset($_SESSION['Email']) && isset($_SESSION['UserId']) ) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Admin Panel Dashboard</title>
    <?php include "../MyInclude/MyEditor.php"; ?>
	    <style>
        section {
            width: 100%;
            margin: auto;
            text-align: left;
        }
    </style>
	<?php include "../MyInclude/HomeScript.php"; ?>
		<script type="text/javascript" src="BoxValid.js"></script>
		<script type="text/javascript" src="DefaultHeaderValid.js"></script>
		<script type="text/javascript" src="SeoMetaValid.js"></script>
		<script type="text/javascript" src="Form4Valid.js"></script>
		<script type="text/javascript" src="Form5Valid.js"></script>
		<script type="text/javascript" src="SliderValid.js"></script>
		<script type="text/javascript" src="whyuse.js"></script>
		<style>
		.error{ color:#FF0000;  }
		</style>
</head>
<body>
	<?php include "../MyInclude/HomeHeader.php"; ?>
	<div id="container">
		<div id="sidebar" class="sidebar-fixed">
			<div id="sidebar-content">
				<?php include "../MyInclude/HomeSearch.php"; ?>
				<?php include "../MyInclude/HomeNavigation.php"; ?>
			</div>
			<div id="divider" class="resizeable"></div>
		</div>
		<div id="content">
			<div class="container">
				<?php include "../MyInclude/HomeSubheader.php"; ?>
				<br /><br />
				<div class="row">
				<?php  if(isset($_SESSION['SliderSu']) && $_SESSION['SliderSu'] == 'Done' )
									{
											echo  '<div class="alert alert-success fade in">
													<i class="icon-remove close" data-dismiss="alert"></i>
													<strong>Your Slider Image Update Successfully!</strong>.
													</div>';
									}	
						  if(isset($_SESSION['DefaultSu']) && $_SESSION['DefaultSu'] == 'Done' )
									{
											echo  '<div class="alert alert-success fade in">
													<i class="icon-remove close" data-dismiss="alert"></i>
													<strong>Your Default Settings Update Successfully!</strong>.
													</div>';
									}
						if(isset($_SESSION['BoxSu']) && $_SESSION['BoxSu'] == 'Done' )
									{
											echo  '<div class="alert alert-success fade in">
													<i class="icon-remove close" data-dismiss="alert"></i>
													<strong>Your Update Successfully!</strong>.
													</div>';
									}	
						if(isset($_SESSION['IconSu']) && $_SESSION['IconSu'] == 'Done' )
									{
											echo  '<div class="alert alert-success fade in">
													<i class="icon-remove close" data-dismiss="alert"></i>
													<strong>Your Icon Title And Link Update Successfully!</strong>.
													</div>';
									}	
												
						  if(isset($_SESSION['Form5']) && $_SESSION['Form5'] == 'Done' )
									{
											echo  '<div class="alert alert-success fade in">
													<i class="icon-remove close" data-dismiss="alert"></i>
													<strong>Your Services Providing  Update Successfully!</strong>.
													</div>';
									}
									
						 if(isset($_SESSION['Form4']) && $_SESSION['Form4'] == 'Done' )
									{
											echo  '<div class="alert alert-success fade in">
													<i class="icon-remove close" data-dismiss="alert"></i>
													<strong>Homepage Step Settings Update Successfully!</strong>.
													</div>';
									}																	
				?>
					<div class="col-md-6">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i>Slider Image Uploads</h4>
							</div>
							<div class="widget-content">
								<?php  if(isset($_SESSION['SliderSu']) && $_SESSION['SliderSu'] == 'Done' )
									{
											echo  '<div class="alert alert-success fade in">
													<i class="icon-remove close" data-dismiss="alert"></i>
													<strong>Your Slider Image Update Successfully!</strong>.
													</div>';
												unset($_SESSION['SliderSu']);
									}	
										$Su1  = mysql_fetch_array(mysql_query("Select * from admin_slider"));									
									?>
							<form name="individual_signup" class="form-horizontal row-border"  id="validate-2"  onSubmit="return MyAnuJayCretedForm(this);"  method="post" action="SliderUpload.php" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-md-3 control-label">Image 1 <span class="required">*</span></label>
										<div class="col-md-7"><label for="Simage1" class="error" id="Simage1_error"></label>
											<input type="file" name="SImage1" id="" title="Slider Image 1"   class="form-control bs-tooltip"><br />
<input type="hidden" name="hSimage1" id="Simage1" value="<?php echo $Su1['Slider1']; ?>" onFocus="if(this.value == 'Simage1') {this.value = '';}" onBlur="Simage1Check(this.value)" >
											<input type="hidden" name="CodeId" id="Simage1" value="<?php echo $Su1['CodeId']; ?>" >
										</div>
<a class="bs-tooltip" title="Click View for Show Image" href="javascript:openwindow('./SliderImage/<?php echo $Su1['Slider1'] ?>')"><font color="red"><b>View</b></font></a>
										<label class="col-md-3 control-label">Title1<span class="required">*</span></label>
										<div class="col-md-9">
											<label for="title1" class="error" id="title1_error"></label>
											<input type="text" name="title1" id="title1" title="Title1" value="<?php echo $Su1['Title1'];  ?>"  onFocus="if (this.value == 'title1') {this.value = '';}" onBlur="title1Check(this.value)" class="form-control bs-tooltip" >
										</div>
                                        <label class="col-md-3 control-label">SubTitle1<span class="required">*</span></label>
										<div class="col-md-9">
											<label for="subtitle1" class="error" id="subtitle1_error"></label>
											<input type="text" name="subtitle1" id="subtitle1" title="SubTitle1" value="<?php echo $Su1['SubTitle1'];  ?>"  onFocus="if (this.value == 'subtitle1') {this.value = '';}" onBlur="subtitle1Check(this.value)" class="form-control bs-tooltip" >
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Image 2 <span class="required">*</span></label>
										<div class="col-md-7"><label for="Simage2" class="error" id="Simage2_error"></label>
											<input type="file" name="SImage2" title="Slider Image 2" class="form-control bs-tooltip"><br />
<input type="hidden" name="hSimage2" id="Simage2" value="<?php echo $Su1['Slider2']; ?>" onFocus="if(this.value == 'Simage2') {this.value = '';}" onBlur="Simage2Check(this.value)" >
										</div>
	<a class="bs-tooltip" title="Click View for Show Image" href="javascript:openwindow('./SliderImage/<?php echo $Su1['Slider2'] ?>')"><font color="red"><b>View</b></font></a> 
										<label class="col-md-3 control-label">Title2<span class="required">*</span></label>
										<div class="col-md-9">
											<label for="title2" class="error" id="title2_error"></label>
											<input type="text" name="title2" id="title2" title="Title2" value="<?php echo $Su1['Title2'];  ?>" onFocus="if (this.value == 'title2') {this.value = '';}" onBlur="title2Check(this.value)" class="form-control bs-tooltip" >
										</div>
                                         <label class="col-md-3 control-label">SubTitle2<span class="required">*</span></label>
										<div class="col-md-9">
											<label for="subtitle2" class="error" id="subtitle2_error"></label>
											<input type="text" name="subtitle2" id="subtitle2" title="SubTitle2" value="<?php echo $Su1['SubTitle2'];  ?>"  onFocus="if (this.value == 'subtitle2') {this.value = '';}" onBlur="subtitle2Check(this.value)" class="form-control bs-tooltip" >
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Image 3 <span class="required">*</span></label>
										<div class="col-md-7"><label for="Simage3" class="error" id="Simage3_error"></label>
										<input type="file" name="SImage3" title="Slider Image 3"  class="form-control bs-tooltip"><br />
<input type="hidden" name="hSimage3" id="Simage3" value="<?php echo $Su1['Slider3']; ?>" onFocus="if(this.value == 'Simage3') {this.value = '';}" onBlur="Simage3Check(this.value)" >
										</div>
	<a class="bs-tooltip" title="Click View for Show Image" href="javascript:openwindow('./SliderImage/<?php echo $Su1['Slider3'] ?>')"><font color="red"><b>View</b></font></a> 
									 <label class="col-md-3 control-label">Title3<span class="required">*</span></label>
										<div class="col-md-9">
											<label for="title3" class="error" id="title3_error"></label>
											<input type="text" name="title3" id="title3" title="Title3" value="<?php echo $Su1['Title3'];  ?>" onFocus="if (this.value == 'title3') {this.value = '';}" onBlur="title3Check(this.value)" class="form-control bs-tooltip" >
										</div>
                                         <label class="col-md-3 control-label">SubTitle3<span class="required">*</span></label>
										<div class="col-md-9">
											<label for="subtitle3" class="error" id="subtitle3_error"></label>
											<input type="text" name="subtitle3" id="subtitle3" title="SubTitle3" value="<?php echo $Su1['SubTitle3'];  ?>"  onFocus="if (this.value == 'subtitle3') {this.value = '';}" onBlur="subtitle3Check(this.value)" class="form-control bs-tooltip" >
										</div>
									</div>
									<div class="form-actions">
									<input type="submit" id="submit-visit"  name="SliderUpdate" value="Update" class="btn btn-primary pull-right">
									</div>
								</form>								
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i>Default Settings</h4>
							</div>
							<div class="widget-content">
							<?php  if(isset($_SESSION['DefaultSu']) && $_SESSION['DefaultSu'] == 'Done' )
									{
											echo  '<div class="alert alert-success fade in">
													<i class="icon-remove close" data-dismiss="alert"></i>
													<strong>Your Default Settings Update Successfully!</strong>.
													</div>';
													unset($_SESSION['DefaultSu']);
									}
									$Su2  = mysql_fetch_array(mysql_query("Select * from admin_header_footer_data"));	
									
									?>
 <form class="form-horizontal row-border" id="validate-1" action="DefaultHeaderUpload.php" method="post" onSubmit="return validateForm1(this);" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-md-3 control-label">Email<span class="required">*</span></label>
										<div class="col-md-9"><label for="dEmail" class="error" id="dEmail_error"></label>
											<input type="text" name="DEmail" id="dEmail" title="Web Email Address" value="<?php  echo $Su2['DEmail']; ?>" onFocus="if (this.value == 'DEmail') {this.value = '';}" onBlur="dEmailCheck(this.value)" class="form-control bs-tooltip" >
											<input type="hidden" name="CodeId" value="<?php  echo $Su2['CodeId']; ?>" >
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Phone<span class="required">*</span></label>
										<div class="col-md-9"><label for="dPhone" class="error" id="dPhone_error"></label>
											<input type="text" name="DPhone" id="dPhone" title="Web Office Phone No." value="<?php  echo $Su2['DPhone']; ?>" onFocus="if (this.value == 'dPhone') {this.value = '';}" onBlur="dPhoneCheck(this.value)" class="form-control bs-tooltip" >
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Address<span class="required">*</span></label>
										<div class="col-md-9"><label for="dAddress" class="error" id="dAddress_error"></label>
										<input type="text" name="DAddress" id="dAddress" title="Address For Web Office" value="<?php  echo $Su2['DAddress']; ?>" onFocus="if (this.value == 'dAddress') {this.value = '';}" onBlur="dAddressCheck(this.value)" class="form-control bs-tooltip" >
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Facebook Link<span class="required">*</span></label>
										<div class="col-md-9"><label for="dFacebook" class="error" id="dFacebook_error"></label>
											<input type="text" name="DFacebook" title="Facebook Link For Web Account" id="dFacebook" value="<?php  echo $Su2['DFacebook']; ?>"  onFocus="if (this.value == 'DFacebook') {this.value = '';}" onBlur="dFacebookCheck(this.value)"class="form-control bs-tooltip" >
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Twitter Link<span class="required">*</span></label>
										<div class="col-md-9"><label for="dTwitter" class="error" id="dTwitter_error"></label>
											<input type="text" name="DTwitter" title="Twitter Link For Web Account" id="dTwitter" value="<?php  echo $Su2['DTwitter']; ?>" onFocus="if (this.value == 'DTwitter') {this.value = '';}" onBlur="dTwitterCheck(this.value)" class="form-control bs-tooltip" >
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Google Plus Link<span class="required">*</span></label>
										<div class="col-md-9"><label for="dGoogle" class="error" id="dGoogle_error"></label>
											<input type="text" name="DGoogle" title="Google Plus Link For Web Account" id="dGoogle" value="<?php  echo $Su2['DTwitter']; ?>" onFocus="if (this.value == 'DGoogle') {this.value = '';}" onBlur="dGoogleCheck(this.value)" class="form-control bs-tooltip" >
										</div>
									</div>
									<div class="form-actions">
										<input type="submit" id="submit-visit" name="DefaultUpdate" value="Update" class="btn btn-primary pull-right">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i>GetWork</h4>
							</div>
							<div class="widget-content">
							<?php  if(isset($_SESSION['getworksu']) && $_SESSION['getworksu'] == 'Done' )
									{
											echo  '<div class="alert alert-success fade in">
													<i class="icon-remove close" data-dismiss="alert"></i>
													<strong>Your Update Successfully!</strong>.
													</div>';
												unset($_SESSION['getworksu']);
									}	
									$Su3  = mysql_fetch_array(mysql_query("Select * from admin_getwork"));
									?>
							<form name="individual_signup" class="form-horizontal row-border"  id="validate-2" action="GetWork.php" method="post" onSubmit="return validateForm(this);" enctype="multipart/form-data">
									<div class="form-group">
										<input type="hidden" name="CodeId" value="<?php echo $Su3['CodeId']; ?>" >
										<label class="col-md-3 control-label">Title<span class="required">*</span></label>
										<div class="col-md-9"><label for="Title" class="error" id="Title_error"></label>
											<input type="text" name="Title" title=" Title  .." id="Title" value="<?php echo $Su3['Title']; ?>" onFocus="if (this.value == 'Title') {this.value = '';}" onBlur="TitleCheck(this.value)" placeholder="Type Title .." class="form-control bs-tooltip" >
										</div>	
										<label class="col-md-3 control-label">Description<span class="required">*</span></label>
										<div class="col-md-9"><label for="Description" class="error" id="Description_error"></label>
											<textarea name="Description" id="Description"  rows="2" title="Description" onFocus="if (this.value == 'Description') {this.value = '';}" onBlur="DescriptionCheck(this.value)" placeholder="Type Your Description here... " class="form-control bs-tooltip" ><?php echo $Su3['Description']; ?></textarea>
										</div>	
									</div>
									<div class="form-actions">
									<input type="submit" id="submit-visit" name="GetWork" value="Update" class="btn btn-primary pull-right">
									</div>
								</form>
							</div>
						</div>
					</div>
                   
					<div class="col-md-6">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i>Logo Uploads</h4>
							</div>
							<div class="widget-content">
                             <?php 
						if(isset($_POST['LogoUpdate']))
						{
						  if($_FILES['SImage1']['name'] == "")
						  {
							  echo '<div class="alert alert-danger fade in">
										<i class="icon-remove close" data-dismiss="alert"></i>
										<strong>Full Fill Requirement</strong> .
									</div>';
						  }
						  else
						  {
							$img			  = $_FILES['SImage1']['name'];
							$CodeId           = rand(100000, 999999);
							if($img)
							{
move_uploaded_file($_FILES["SImage1"]["tmp_name"],"./Logo/".$img);
$name1 = $img;
							}
							$Insert ="INSERT INTO `admin_logo`(`CodeId`, `Logo`) VALUES ('".$CodeId."','".$name1."')";					
							$InData           = mysql_query($Insert); 	
							if($InData)
							{
								echo  '<div class="alert alert-success fade in">
													<i class="icon-remove close" data-dismiss="alert"></i>
													<strong>Your Data Insert Successfully!</strong>.
									   </div>';
							}	
						  }
						}				
				?>				
								<?php  if(isset($_SESSION['LogoSu']) && $_SESSION['LogoSu'] == 'Done' )
									{
												echo  '<div class="alert alert-success fade in">
													<i class="icon-remove close" data-dismiss="alert"></i>
													<strong>Your Update Successfully!</strong>.
													</div>';
												unset($_SESSION['LogoSu']);
									}	
																
									?>
							<form name="individual_signup" class="form-horizontal row-border"  id="validate-2"  onSubmit="return MyAnuJayCretedForm(this);"  method="post" action="" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-md-3 control-label">Logo<span class="required">*</span></label>
										<div class="col-md-7"><label for="Simage1" class="error" id="Simage1_error"></label>
											<input type="file" name="SImage1" id="SImage1" title="Logo"   class="form-control bs-tooltip"><br />
										</div>
											</div>
							<div class="form-actions">
									<input type="submit" id="submit-visit"  name="LogoUpdate" value="Submit" class="btn btn-primary pull-right">
									</div>
								</form>								
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i>SEO Meta Tag Settings</h4>
							</div>
							<div class="widget-content">
							<?php  if(isset($_SESSION['SEoMEtaSu']) && $_SESSION['SEoMEtaSu'] == 'Done' )
									{
											echo  '<div class="alert alert-success fade in">
													<i class="icon-remove close" data-dismiss="alert"></i>
													<strong>Your SEO Meta Tag Settings Update Successfully!</strong>.
													</div>';
												unset($_SESSION['SEoMEtaSu']);
									}	
									$Su4  = mysql_fetch_array(mysql_query("Select * from admin_seo_meta_tag_data"));	
									?>
							<form name="individual_signup" class="form-horizontal row-border"  id="validate-2" action="SeoMetaUpload.php" method="post" onSubmit="return JayCreatedValidForm(this);" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-md-3 control-label">Title<span class="required">*</span></label>
										<div class="col-md-9"><label for="PageTitle" class="error" id="PageTitle_error"></label>
											<input type="text" name="PageTitle" id="PageTitle" value="<?php echo $Su4['PageTitle']; ?>" title="Title" onFocus="if (this.value == 'PageTitle') {this.value = '';}" onBlur="PageTitleCheck(this.value)" placeholder="Type Your Title here..." class="form-control bs-tooltip" >
											<input type="hidden" name="CodeId" value="<?php echo $Su4['CodeId']; ?>" >
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Meta Description<span class="required">*</span></label>
										<div class="col-md-9"><label for="MetaDescription" class="error" id="MetaDescription_error"></label>
					<textarea name="MetaDescription" id="MetaDescription"  title="Meta Description" onFocus="if (this.value == 'MetaDescription') {this.value = '';}" onBlur="MetaDescriptionCheck(this.value)" placeholder="Type Your Meta Description here... " class="form-control bs-tooltip" ><?php echo $Su4['MetaDescription']; ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Meta Keywords<span class="required">*</span></label>
										<div class="col-md-9"><label for="MetaKeywords" class="error" id="MetaKeywords_error"></label>
											<textarea name="MetaKeywords" id="MetaKeywords" title="Meta Keywords" onFocus="if (this.value == 'MetaKeywords') {this.value = '';}" onBlur="MetaKeywordsCheck(this.value)" placeholder="Type Your Meta Keywords here..." class="form-control bs-tooltip" ><?php echo $Su4['MetaKeywords']; ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Location<span class="required">*</span></label>
										<div class="col-md-9"><label for="Location" class="error" id="Location_error"></label>
											<textarea name="Location" id="Location" title="Location" onFocus="if (this.value == 'Location') {this.value = '';}" onBlur="LocationCheck(this.value)" placeholder="Type Your Location here ..." class="form-control bs-tooltip" ><?php echo $Su4['Location']; ?></textarea>
										</div>
									</div>
									<div class="form-actions">
										<input type="submit" id="submit-visit" name="SeoMetaUpdate" value="Update" class="btn btn-primary pull-right">
									</div>
								</form>
							</div>
						</div>
                    </div>
                    </div>
				<div class="row">
					<div class="col-md-6">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i>WE SPECIALISE IN</h4>
							</div>
							<div class="widget-content">
							<?php  if(isset($_SESSION['BoxSu']) && $_SESSION['BoxSu'] == 'Done')
									{
											echo  '<div class="alert alert-success fade in">
													<i class="icon-remove close" data-dismiss="alert"></i>
													<strong>Your Update Successfully!</strong>.
													</div>';
												unset($_SESSION['BoxSu']);
									}	
									$Su5  = mysql_fetch_array(mysql_query("Select * from admin_box_image"));
									?>
							<form name="individual_signup" class="form-horizontal row-border"  id="validate-2" action="BoxUpload.php" method="post" onSubmit="return validateForm(this);" enctype="multipart/form-data">
									<div class="form-group">
										<input type="hidden" name="CodeId" value="<?php echo $Su5['CodeId']; ?>" >
										<label class="col-md-3 control-label">Title 1<span class="required">*</span></label>
										<div class="col-md-9"><label for="Title1" class="error" id="Title1_error"></label>
											<input type="text" name="Title1" title=" Title 1 .." id="Title1" value="<?php echo $Su5['Title1']; ?>" onFocus="if (this.value == 'Title1') {this.value = '';}" onBlur="Title1Check(this.value)" placeholder="Type Title 1 .." class="form-control bs-tooltip" >
										</div>	
										<label class="col-md-3 control-label">SubTitle 1<span class="required">*</span></label>
										<div class="col-md-9"><label for="SubTitle1" class="error" id="SubTitle1_error"></label>
											<textarea name="SubTitle1" id="SubTitle1"  rows="2" title="SubTitle1" onFocus="if (this.value == 'SubTitle1') {this.value = '';}" onBlur="SubTitle1Check(this.value)" placeholder="Type Your SubTitle1 here... " class="form-control bs-tooltip" ><?php echo $Su5['SubTitle1']; ?></textarea>
										</div>	
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Title 2<span class="required">*</span></label>
										<div class="col-md-9"><label for="Title2" class="error" id="Title2_error"></label>
											<input type="text" name="Title2" title="Title 2 .." id="Title2" value="<?php echo $Su5['Title2']; ?>" onFocus="if (this.value == 'Title2') {this.value = '';}" onBlur="Title2Check(this.value)" placeholder="Type Title 2 .." class="form-control bs-tooltip" >
										</div>	
										<label class="col-md-3 control-label">SubTitle 2<span class="required">*</span></label>
										<div class="col-md-9"><label for="SubTitle2" class="error" id="SubTitle2_error"></label>
											<textarea name="SubTitle2" id="SubTitle2"  rows="2" title="SubTitle2" onFocus="if (this.value == 'Description2') {this.value = '';}" onBlur="SubTitle2Check(this.value)" placeholder="Type Your SubTitle 2 here... " class="form-control bs-tooltip"><?php echo $Su5['SubTitle2']; ?></textarea>
										</div>	
									</div>
									<div class="form-group">
										 <label class="col-md-3 control-label">Title 3<span class="required">*</span></label>
										<div class="col-md-9"><label for="Title3" class="error" id="Title3_error"></label>
											<input type="text" name="Title3" title=" Title 3 .." id="Title3" value="<?php echo $Su5['Title3']; ?>" onFocus="if (this.value == 'Title3') {this.value = '';}" onBlur="Title3Check(this.value)" placeholder="Type Title 3 .." class="form-control bs-tooltip" >
										</div>	
										<label class="col-md-3 control-label">SubTitle 3<span class="required">*</span></label>
										<div class="col-md-9"><label for="SubTitle3" class="error" id="SubTitle3_error"></label>
											<textarea name="SubTitle3" id="SubTitle3" rows="2" title="SubTitle3" onFocus="if (this.value == 'SubTitle3') {this.value = '';}" onBlur="SubTitle3Check(this.value)" placeholder="Type Your SubTitle 3 here... " class="form-control bs-tooltip" ><?php echo $Su5['SubTitle3']; ?></textarea>
										</div>
									</div>
										<div class="form-group">
										 <label class="col-md-3 control-label">Title 4<span class="required">*</span></label>
										<div class="col-md-9"><label for="Title4" class="error" id="Title4_error"></label>
											<input type="text" name="Title4" title="Title 4.." id="Title4" value="<?php echo $Su5['Title4']; ?>" onFocus="if (this.value == 'Title4') {this.value = '';}" onBlur="Title4Check(this.value)" placeholder="Type Title 4 .." class="form-control bs-tooltip" >
										</div>	
										<label class="col-md-3 control-label">SubTitle 4<span class="required">*</span></label>
										<div class="col-md-9"><label for="SubTitle4" class="error" id="SubTitle4_error"></label>
											<textarea name="SubTitle4" id="SubTitle4"  rows="2" title="SubTitle4" onFocus="if (this.value == 'SubTitle4') {this.value = '';}" onBlur="SubTitle4Check(this.value)" placeholder="Type Your  SubTitle 4 here... " class="form-control bs-tooltip" ><?php echo $Su5['SubTitle4']; ?></textarea>
										</div>
									</div>
									<div class="form-actions">
									<input type="submit" id="submit-visit" name="BoxUpdate" value="Update" class="btn btn-primary pull-right">
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i>Browse Projects</h4>
							</div>
							<div class="widget-content">
							<?php  if(isset($_SESSION['usebarbond']) && $_SESSION['usebarbond'] == 'Done' )
									{
											echo  '<div class="alert alert-success fade in">
													<i class="icon-remove close" data-dismiss="alert"></i>
													<strong>Your Update Successfully!</strong>.
													</div>';
												unset($_SESSION['usebarbond']);
									}	
									$Su6  = mysql_fetch_array(mysql_query("Select * from admin_projects"));	
									?>
							<form name="individual_signup" class="form-horizontal row-border"  id="validate-2"  method="post" onSubmit="return checkdata(this);" action="usebarbond.php" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-md-3 control-label">Image 1 <span class="required">*</span></label>
										<div class="col-md-7"><label for="Simage1" class="error" id="Simage1_error"></label>
											<input type="file" name="SImage1" id="" title="Browse Image 1"   class="form-control bs-tooltip"><br />
<input type="hidden" name="hSimage1" id="Simage1" value="<?php echo $Su6['Image1']; ?>" onFocus="if (this.value == 'Simage1') {this.value = '';}" onBlur="Simage1Check(this.value)" >
											<input type="hidden" name="CodeId" id="Simage1" value="<?php echo $Su6['CodeId']; ?>" >
										</div>
<a class="bs-tooltip" title="Click View for Show Image" href="javascript:openwindow('./ProjectsImage/<?php echo $Su6['Image1'] ?>')"><font color="red"><b>View</b></font></a>
										<label class="col-md-3 control-label">Title1<span class="required">*</span></label>
										<div class="col-md-9">
											<label for="title1" class="error" id="title1_error"></label>
											<input type="text" name="title1" id="title1" title="Title1" value="<?php echo $Su6['Title1'];  ?>"  onFocus="if (this.value == 'title1') {this.value = '';}" onBlur="title1Check(this.value)" class="form-control bs-tooltip" >
										</div>
                                        <label class="col-md-3 control-label">SubTitle1<span class="required">*</span></label>
										<div class="col-md-9">
											<label for="subtitle1" class="error" id="subtitle1_error"></label>
											<input type="text" name="subtitle1" id="subtitle1" title="SubTitle1" value="<?php echo $Su6['SubTitle1'];  ?>"  onFocus="if (this.value == 'subtitle1') {this.value = '';}" onBlur="subtitle1Check(this.value)" class="form-control bs-tooltip">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Image 2 <span class="required">*</span></label>
										<div class="col-md-7"><label for="Simage2" class="error" id="Simage2_error"></label>
											<input type="file" name="SImage2" title="Browse Image 2" class="form-control bs-tooltip"><br />
<input type="hidden" name="hSimage2" id="Simage2" value="<?php echo $Su6['Image2']; ?>" onFocus="if (this.value == 'Simage2') {this.value = '';}" onBlur="Simage2Check(this.value)" >
										</div>
<a class="bs-tooltip" title="Click View for Show Image" href="javascript:openwindow('./ProjectsImage/<?php echo $Su6['Image2'] ?>')"><font color="red"><b>View</b></font></a> 
										<label class="col-md-3 control-label">Title2<span class="required">*</span></label>
										<div class="col-md-9">
											<label for="title2" class="error" id="title2_error"></label>
											<input type="text" name="title2" id="title2" title="Title2" value="<?php echo $Su6['Title2'];  ?>" onFocus="if (this.value == 'title2') {this.value = '';}" onBlur="title2Check(this.value)" class="form-control bs-tooltip" >
										</div>
                                         <label class="col-md-3 control-label">SubTitle2<span class="required">*</span></label>
										<div class="col-md-9">
											<label for="subtitle2" class="error" id="subtitle2_error"></label>
											<input type="text" name="subtitle2" id="subtitle2" title="SubTitle2" value="<?php echo $Su6['SubTitle2'];  ?>"  onFocus="if (this.value == 'subtitle2') {this.value = '';}" onBlur="subtitle2Check(this.value)" class="form-control bs-tooltip" >
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Image 3 <span class="required">*</span></label>
										<div class="col-md-7"><label for="Simage3" class="error" id="Simage3_error"></label>
										<input type="file" name="SImage3" title="Browse Image 3"  class="form-control bs-tooltip"><br />
<input type="hidden" name="hSimage3" id="Simage3" value="<?php echo $Su6['Image3']; ?>" onFocus="if(this.value == 'Simage3') {this.value = '';}" onBlur="Simage3Check(this.value)" >
										</div>
<a class="bs-tooltip" title="Click View for Show Image" href="javascript:openwindow('./ProjectsImage/<?php echo $Su6['Image3'] ?>')"><font color="red"><b>View</b></font></a> 
									 <label class="col-md-3 control-label">Title3<span class="required">*</span></label>
										<div class="col-md-9">
											<label for="title3" class="error" id="title3_error"></label>
											<input type="text" name="title3" id="title3" title="Title3" value="<?php echo $Su6['Title3'];  ?>" onFocus="if (this.value == 'title3') {this.value = '';}" onBlur="title3Check(this.value)" class="form-control bs-tooltip" >
										</div>
                                         <label class="col-md-3 control-label">SubTitle3<span class="required">*</span></label>
										<div class="col-md-9">
											<label for="subtitle3" class="error" id="subtitle3_error"></label>
											<input type="text" name="subtitle3" id="subtitle3" title="SubTitle3" value="<?php echo $Su6['SubTitle3'];  ?>"  onFocus="if (this.value == 'subtitle3') {this.value = '';}" onBlur="subtitle3Check(this.value)" class="form-control bs-tooltip" >
										</div>
									</div>
									<div class="form-actions">
									<input type="submit" id="submit-visit"  name="Update" value="Update" class="btn btn-primary pull-right">
									</div>
								</form>								
							</div>
						</div>
					</div>
					</div>
							<?php  if(isset($_SESSION['CopySu']) && $_SESSION['CopySu'] == 'Done' )
									{
											echo  '<div class="alert alert-success fade in">
													<i class="icon-remove close" data-dismiss="alert"></i>
													<strong>Your Copyright Content Update Successfully!</strong>.
													</div>';
												unset($_SESSION['CopySu']);
									}	
									?>
									
							<form name="individual_signup" class="form-horizontal row-border"  id="validate-2"  method="post" onSubmit="return copyrightform(this);" action="copyright.php" enctype="multipart/form-data">
									<div class="form-group">
									<label class="col-md-3 control-label">Copyright<span class="required">*</span></label>
										<div class="col-md-9"><label for="whyus_title1" class="error" id="copyrit_error"></label>
											<input type="text" name="copyrights" title="CopyRight" value="<?php echo $Su2['Copyright']; ?>" id="copyrights"  onFocus="if (this.value == 'copyrights') {this.value = '';}" onBlur="copyrightsCheck(this.value)" class="form-control bs-tooltip" placeholder="copyrights"   />
                                            <input type="hidden" name="CodeId" value="<?php echo $Su2['CodeId']; ?>" >
										</div>
									</div>
									<div class="form-actions">
										<input type="submit" id="submit-visit" name="copyright" value="Update" class="btn btn-primary pull-right">
									</div>
								</form>
							</div>
						</div>
						</div>
					</div>
					</div> 
					</div>
			</div>
		</div>
	</div>
<script language="javascript" type="text/javascript">
function openwindow(path)
{
artclasses = window.open (  path, "artclasses", " location = 1, resizable = yes, status = 1, scrollbars = 1, width = 500, height=300 ");
artclasses.moveTo (200,100);
}
</script>
</body>
</html>
<?php }else { echo '<div align="center"> <img src="./MyInclude/green.gif" /> </div>	<meta http-equiv="refresh" content="0; url=../LogIn.php"/> ';} ?>
		<?php	/**================================================================================||
				||      *Developer : Green Cubes Solutions										   ||
				||      *Website   : www.greencubes.co.in										   ||
				||      *Date      : 25-11-2014													   ||
				||																				   ||
				||      *  NOTICE OF LICENSE  *													   ||
				|| 																				   ||
				|| 																				   ||
				||		   This source file is subject to the Company Copyright 				   ||
				||		   and its use by any other party without concern of Greencubes        	   ||
				||  	   or trying to sell this code will be considered illegal 				   ||
				||		   and any legal actions can be undertaken.								   ||
				||		   If you want to receive a copy of the license, please send an email      ||
				||  	   to info@greencubes.co.in, for further procedure						   ||
				||=================================================================================**/?>