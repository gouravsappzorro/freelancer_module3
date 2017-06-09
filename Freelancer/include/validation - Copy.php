<script>
	
	$(document).ready(function(){
		
		
		$("#signup").click(function(e){
			
				var uname=$('#username').val();
				if(uname=="")
				{
					$('#uname_error').html('Please Enter username!');
					//$("#username").focus();
					return false;
				}
				else
				{
					$('#uname_error').html('');
				}
			
			
		});
		$("#signup").click(function(e){
			
			if($('input[name=terms]:checked').length<=0)
			{
 				$('#terms_error').html('Please select terms!');
				return false;
			}
			else
			{
					$('#terms_error').html('');
			}	
			
			
		});
		$("#signup").click(function(e){
			var pass=$("#password").val();
			if(pass=="")
			{
				$('#password_error').html('Please Enter password!');
				//$("#password").focus();
				return false;
			}else
			{
				$('#password_error').html('');
			}
		});
		$("#signup").click(function(){
		
			var repass=$("#repassword").val();
			var pass=$("#password").val();
			if(repass=="")
			{
				$('#confirm_error').html('Please re Enter pass!');
				//$("#repassword").focus();
				return false;
			}
			else if(pass!=repass)
			{
				$('#confirm_error').html('Please confirm pass!');
				//$("#repassword").focus();
				return false;
			}
			else
			{
				$('#confirm_error').html('');
			}
		});
		$("#signup").click(function(){
		
			var email=$("#email").val();
			var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
			if(email=="")
			{
				$('#Email_error').html('Please Enter Email!');
				//$("#email").focus();
				return false;
			}
			else if(!re.test(email))
			{
				$('#Email_error').html('Please Enter Valid Email Id!');
				//$("#email").focus();
				return false;
				
			}
			else
			{
						var email=$("#email").val();
						$.ajax
  						({
   						type: "POST",
   						url: "email_check.php",
  						data:"email="+email,
  			    		cache: false,
   						success: function(msg)
   						{
    				 		 if(msg!=0)
							 {
							 	$('#Email_error').html(msg);
								return false;
							}
							else
							{
								$('#Email_error').html('');
								return true;
								
							}	
   						} 
   				});
				
				//$('#Email_error').html('');
			}
		});
		$("#signup").click(function(){
		
			var fname=$("#fname").val();
			if(fname=="")
			{
				$('#fname_error').html('Please Enter first name!');
				//$("#fname").focus();
				return false;
			}else
			{
				$('#fname_error').html('');
			}
		});
		
		
		$("#signup").click(function(){
		
			var lname=$("#lname").val();
			if(lname=="")
			{
				$('#lname_error').html('Please Enter last name!');
				//$("#lname").focus();
				return false;
			}else
			{
				$('#lname_error').html('');
			}
		});
		$("#country").change(function()
 		{
 		
			//alert();
			 var id=$(this).val();
 			 var dataString = 'id='+ id;
 		
  			$.ajax
  			({
   				type: "POST",
   				url: "get_city.php",
  				data: dataString,
  			    cache: false,
   				success: function(html)
   				{
					
    				  $("#city").html(html);
   				} 
   			});
  		});
		
		$("#signup").click(function(){
				
				if($('#country option:selected').val()=="select country")
 				 {
  					$('#country_error').html('Please Select Country!');
  					 return false;

  				 }
				 else
				 {
					$('#country_error').html('');
				 } 
			
		});
		$("#signup").click(function(){
				
				if($('#city option:selected').val()=="select city")
 				 {
  					$('#city_error').html('Please Select City!');
  					 return false;

  				 }
				 else
				 {
					$('#city_error').html('');
				 } 
			
		});
		/*$('#register').submit(function() {

$.post("verify_captcha.php?"+$("#register").serialize(), { }, function(response){
if(response==1){
$(".imgcaptcha").attr("src","demo_captcha.php?_="+((new Date()).getTime()));
    clear_form();
    alert("Data Submitted Successfully.")
}else{
    alert("wrong captcha code!");
}
});
return false;
});*/
/*$("#signup").click(function()
 {
 		// e.preventDefault();
		 var captcha=$("#captcha").val();
		 if(captcha=='')
		 {
		 	$('#captcha_error').html('Please Enter Captcha!');
				//$("#email").focus();
				return false;
		 }
		 else
		 {
				
			 var captcha=$("#captcha").val();
			 $.ajax
  						({
   						type: "POST",
   						url: "verify_captcha.php",
  						data:"captcha="+captcha,
  			    		cache: false,
   						success: function(msg)
   						{
    				 		
							 if(msg==0)
							 {
							 	
								$('#captcha_error').html('wrong captha');
								
								
								
								return false;
																
								
								
							}
							else
							{
								$('#captcha_error').html('');
								
								
								$('#register').submit();
								
								
								
							}	
   						}
						 
   				});
				return false;
				
			}
  		});*/
		


});
	
		
	
	
</script>
 
		
		
		
		