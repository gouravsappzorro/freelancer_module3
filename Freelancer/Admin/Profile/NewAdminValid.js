						     	/**================================================================================||
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
								||=================================================================================**/


function EmailCheck(Email){
	
	var emailpattern=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

	if (Email == ''){
			
			document.getElementById("Email_error").className = "error";
			document.getElementById("Email_error").innerHTML = 'This field is required.';
			return false;
	}
	
	else if(!emailpattern.test(Email)){
			
		document.getElementById("Email_error").innerHTML = 'Please enter a valid email address.';
		return false;		
	}
	else{
			
		document.getElementById("Email_error").className = "error";
		document.getElementById("Email_error").innerHTML = '';
		return true;	
	}
}

 
function MemberNameCheck(MemberName){
	
	if (MemberName== ''){
			
			document.getElementById("MemberName_error").className = "error";
			document.getElementById("MemberName_error").innerHTML = 'This field is required.';
			return false;
	}
	else
	{
		document.getElementById("MemberName_error").innerHTML = '';
		return true;		
	}
}

function ContactNoCheck(ContactNo){
	
	if (ContactNo == ''){
			
			document.getElementById("ContactNo_error").className = "error";
			document.getElementById("ContactNo_error").innerHTML = 'This field is required.';
			return false;
	}
	else
	{
		document.getElementById("ContactNo_error").innerHTML = '';
		return true;		
	}
}


function AddressCheck(Address){
	
	if (Address == ''){
			
			document.getElementById("Address_error").className = "error";
			document.getElementById("Address_error").innerHTML = 'This field is required.';
			return false;
	}
	else
	{
		document.getElementById("Address_error").innerHTML = '';
		return true;		
		
	}
}

function OldPasswordCheck(oldpassword)
{
	if (oldpassword == ''){
			
			document.getElementById("OldPassword_error").className = "error";
			document.getElementById("OldPassword_error").innerHTML = 'This field is required.';
			return false;
	}
	else
	{
		document.getElementById("OldPassword_error").innerHTML = '';
		return true;		
		
	}
}

function PasswordCheck(Password){
	
	if (Password == ''){
			
			document.getElementById("Password_error").className = "error";
			document.getElementById("Password_error").innerHTML = 'This field is required.';
			return false;
	}
	else
	{
		document.getElementById("Password_error").innerHTML = '';
		return true;		
	}
}

function ConfirmPasswordCheck(ConfirmPassword){
	
	if (ConfirmPassword == ''){
			
			document.getElementById("ConfirmPassword_error").className = "error";
			document.getElementById("ConfirmPassword_error").innerHTML = 'This field is required.';
			return false;
	}
	
	var Checker = document.getElementById("Password").value;
	//alert(Checker);
	
	if(Checker == ConfirmPassword)
	{
		document.getElementById("ConfirmPassword_error").innerHTML = '';
		return true;		
	}
	else
	{
			document.getElementById("ConfirmPassword_error").className = "error";
			document.getElementById("ConfirmPassword_error").innerHTML = 'Please enter a valid Password.';
			return false;
	}
}

function adminvalidation(){
	var a = EmailCheck(document.getElementById("Email").value);
	var c = AddressCheck(document.getElementById("Address").value);
	var d = ContactNoCheck(document.getElementById("ContactNo").value);
	var e = MemberNameCheck(document.getElementById("MemberName").value);
	
	if(a && c && d && e){
		return true;	
	}
	else{
		return false;	
	}
}
function password_Validatin()
{
	var a = PasswordCheck(document.getElementById("Password").value);
	var b = ConfirmPasswordCheck(document.getElementById("ConfirmPassword").value);
	var c = OldPasswordCheck(document.getElementById("OldPassword").value);
	
	if(a && b && c)
	{
		return true;
	}
	else
	{
		return false;
	}
}



						     	/**================================================================================||
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
								||=================================================================================**/
