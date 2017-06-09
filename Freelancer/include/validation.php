<script type="text/javascript">

/*function reloadCaptcha()
{
	document.getElementById("reload").src="captcha.php";
	
}
*/
function termCheck(){

 var terms=$('input[name=terms]:checked').val();

  if(terms=='')
  
  {
  	 
   document.getElementById("terms_error").innerHTML = 'This field is required.' ; 
   return false;
  }
  else
  {
   
    document.getElementById("terms_error").innerHTML = '' ; 
   return true;  
  }
 
 }
function usernameCheck(username){
	//var regex = /G[a-b].*/;
	if (username == ''){
			
			document.getElementById("username_error").className = "error";
			document.getElementById("username_error").innerHTML = ' This field is required.';
			return false;
	}
	
	if(username.length<5 || username.length>30 )
	{
			document.getElementById("username_error").className = "error";
			document.getElementById("username_error").innerHTML = 'Username between 5 to 30 characters long.';
			return false;
	}
	else if(username!="")
	{
		$.ajax
		({
			type: "POST",
			url: "username_check.php",
			data:"username="+username,
    		cache: false,
			success: function(msg)
   			{
				if(msg==1)
				{
					document.getElementById("username_error").className = "error";
					document.getElementById("username_error").innerHTML = ' Username already in use.';
					document.getElementById("username_err").value=1;
					return false;
				}
				else
				{
					document.getElementById("username_error").innerHTML = '';
					document.getElementById("username_err").value=0;
					return true;
				}	
			} 
		});
  		if(document.getElementById("username_err").value==0)
  		{
			return true;
  		}
  		else
  		{
  			return false;
		}
	}
	else
	{
		document.getElementById("username_error").innerHTML = '';
		return true;		
		
	}
}
function passwordCheck(password){
	
	if (password == ''){
			
			document.getElementById("password_error").className = "error";
			document.getElementById("password_error").innerHTML = ' This field is required.';
			return false;
	}
	else if(password.length<6 || password.length>30)
	{
			document.getElementById("password_error").className = "error";
			document.getElementById("password_error").innerHTML = 'Password between 6 to 30 characters Long.';
			return false;
	}
	else if(password.search(/[a-zA-Z]/) == -1)
	{
			document.getElementById("password_error").className = "error";
			document.getElementById("password_error").innerHTML = 'Password must contain letters.';
			return false;
	}
	else if(password.search(/\d/) == -1)
	{
			document.getElementById("password_error").className = "error";
			document.getElementById("password_error").innerHTML = 'Password must contain numbers.';
			return false;
	}
	else
	{
		document.getElementById("password_error").innerHTML = '';
		return true;		
		
	}
}
function confirmpassCheck(confirmpass){
	
	var password = document.getElementById("password").value;
	if (confirmpass == ''){
			
			document.getElementById("confirmpass_error").className = "error";
			document.getElementById("confirmpass_error").innerHTML = ' This field is required.';
			return false;
	}
	if(password!=confirmpass)
	{

			document.getElementById("confirmpass_error").className = "error";
			document.getElementById("confirmpass_error").innerHTML = 'Confirm password not match with password.';
			return false;
	}
	else
	{
		document.getElementById("confirmpass_error").innerHTML = '';
		return true;		
		
	}
}
function emailCheck(email){
	
	if (email == ''){
			
			document.getElementById("email_error").className = "error";
			document.getElementById("email_error").innerHTML = ' This field is required.';
			return false;
	}
	
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(!regex.test(email)){

		document.getElementById("email_error").innerHTML = 'Please Enter Valid Email id.';
		return false;		
	}
	
	else if(email!="")
	{
		var terms=$('input[name=terms]:checked').val();
		$.ajax({
			type: "POST",
			url: "email_check.php",
			data:{email:email,terms:terms},
			//cache: false,
			success: function(msg)
			{
				if(msg==1)
				{
					document.getElementById("email_error").className = "error";
					document.getElementById("email_error").innerHTML = ' Email-Id Already Exist.';
					document.getElementById("email_err").value=1;
					return false;
				}
				else
				{
					document.getElementById("email_error").innerHTML = '';
					document.getElementById("email_err").value=0;
					return true;
				}	
			} 
   		});
  		
		if(document.getElementById("email_err").value==0)
  		{
  			return true;
  		}
  		else
  		{
  			return false;
  		}
	}
	else
	{
		document.getElementById("email_error").innerHTML = '';
		return false;		
	}
}

function fnameCheck(fname){
	var regex=/^[A-Za-z]+$/;
	if (fname == ''){
			
			document.getElementById("fname_error").className = "error";
			document.getElementById("fname_error").innerHTML = ' This field is required.';
			return false;
	}
	else if(!regex.test(fname))
	{
			document.getElementById("fname_error").className = "error";
			document.getElementById("fname_error").innerHTML = 'Please enter only letters.';
			return false;
	}
	else if(fname.length<2 || fname.length>30)
	{
		document.getElementById("fname_error").className = "error";
		document.getElementById("fname_error").innerHTML = 'Firstname between 2 to 30 characters long.';
		return false;
	}
	else
	{
		document.getElementById("fname_error").innerHTML = '';
		return true;		
		
	}
}
function lnameCheck(lname){
	var regex=/^[A-Za-z]+$/;
	if (lname == ''){
			
			document.getElementById("lname_error").className = "error";
			document.getElementById("lname_error").innerHTML = ' This field is required.';
			return false;
	}
	else if(!regex.test(lname))
	{
			document.getElementById("lname_error").className = "error";
			document.getElementById("lname_error").innerHTML = 'Please enter only letters.';
			return false;
	}
	else if(lname.length<2 || lname>30)
	{
		document.getElementById("lname_error").className = "error";
		document.getElementById("lname_error").innerHTML = 'Lastname between 2 to 30 characters long.';
		return false;
	}
	else
	{
		document.getElementById("lname_error").innerHTML = '';
		return true;		
		
	}
}
function countryCheck(country){
	

	if (country == 'select'){
			
			document.getElementById("country_error").className = "error";
			document.getElementById("country_error").innerHTML = ' This field is required.';
			return false;
	}
	
	else
	{
		document.getElementById("country_error").innerHTML = '';
		return true;		
		
	}
}
function cityFetch(country){
	// var id = document.getElementById("country").value;
	var dataString = 'id='+ country;	
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

}

function cityCheck(city,id){
	
	
	if (city =='select' || city==null || city==''){
			
			document.getElementById("city_error").className = "error";
			document.getElementById("city_error").innerHTML = ' This field is required.';
			return false;
	}
	
	else
	{
		document.getElementById("city_error").innerHTML = '';
		return true;		
		
	}
}
/*function captchaCheck(captcha){
	

	if (captcha == ''){
			
			document.getElementById("captcha_error").className = "error";
			document.getElementById("captcha_error").innerHTML = ' This field is required.';
			return false;
	}
	else if(captcha!="")
	{

			
						$.ajax
  						({
   						type: "POST",
   						url: "verify_captcha.php",
  						data:"captcha="+captcha,
  			    		cache: false,
   						success: function(msg)
   						{
   							//alert(msg);

    				 		 if(msg==1)
							 {
							 	document.getElementById("captcha_error").className = "error";
								document.getElementById("captcha_error").innerHTML = 'Captcha Not Matched.';
							 	document.getElementById("captcha_err").value=1;
								return false;
							}
							else
							{
								
								document.getElementById("captcha_error").innerHTML = '';
								document.getElementById("captcha_err").value=0;
								return true;
								
							}
							
   						} 
   						
   				});
   				var tempdata=document.getElementById("captcha_err").value;
	
				if(tempdata==0){
					
					return true;	
					
					}
					else
					{
						return false;
						
					}
  						
	}
	else
	{
		document.getElementById("captcha_error").innerHTML = '';
		return true;		
		
	}
}*/

function captchaCheck()
{
	var flag;
	var captcha_response = grecaptcha.getResponse();
	if(captcha_response.length == 0)
	{
		document.getElementById("captcha_error").innerHTML="Please Select Captcha";
		flag=0;
		return false;
	}
	else
	{
		document.getElementById("captcha_error").innerHTML="";
		flag=1;
		return true;
	}	
}
function form_validation(){
				
	var a = usernameCheck(document.getElementById("username").value);
	var b = passwordCheck(document.getElementById("password").value);
	var c = confirmpassCheck(document.getElementById("confirmpass").value);
	var d = emailCheck(document.getElementById("email").value);
	var e = fnameCheck(document.getElementById("fname").value);
	var f = lnameCheck(document.getElementById("lname").value);
	var g = countryCheck(document.getElementById("country").value);
	var h = cityCheck(document.getElementById("city0").value);
	//var i = captchaCheck(document.getElementById("captcha").value);
	/*var tempdata=$("#captcha_err").val();
	var l=false;
	
	if(tempdata==0){
	
		l=true;
	}
	else{
		l=false;
	}*/
	
	//var j = emailCheck(document.getElementById("email_err").value);
	//var k = termCheck(document.getElementByName("terms").value);

	var k= termCheck();
	var i = captchaCheck();
	
	
	if(a && b && c && d && e && f && g && h  && k && i){
		return true;
			
	}
	else{
		return false;	
	}
	
}
</script>