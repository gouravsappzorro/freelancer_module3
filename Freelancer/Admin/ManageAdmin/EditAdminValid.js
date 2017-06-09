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
	
	var emailTest =/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	
	if (Email == ''){
			
			document.getElementById("Email_error").className = "error";
			document.getElementById("Email_error").innerHTML = 'This field is required.';
			return false;
	}
	
	else if(!emailTest.test(Email)){
			
		document.getElementById("Email_error").className = "error";
		document.getElementById("Email_error").innerHTML = 'Please enter a valid email address.';
		return false;	
			
	}
	
	else{
			
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


function PaypalAccountCheck(paypal)
{
	if(paypal == '')
	{
		document.getElementById("Paypal_error").innerHTML="This field is required.";
		return false;
	}
	else
	{
		document.getElementById("Password_error").innerHTML='';
		return true;
	}
}

function OldPasswordCheck(OldPassword){
	
	var Edit = document.getElementById("EditPassword").value;
	
	if(OldPassword == '')
	{
		document.getElementById("OldPassword_error").innerHTML = "This field is required.";
		return false;
	}
	else if(OldPassword != Edit)
	{
		document.getElementById("OldPassword_error").innerHTML = 'Please enter a valid Password Your Password not match.';
		return false;
	}
	
	else
	{
		document.getElementById("OldPassword_error").innerHTML = '';
		return true;
	}
}

function PasswordCheck(Password)
{
	if(Password == '')
	{
		document.getElementById("Password_error").innerHTML = 'This field is required.';
		return false;
	}
	if(Password.length < 5 || Password.length > 15)
	{
		document.getElementById("Password_error").innerHTML = 'Password Length is Minimum 5 and Maximim 10 characters long.';
		return false;
	}
	else
	{
		document.getElementById("Password_error").innerHTML = '';
		return true;
	}
}
function ConfirmPasswordCheck(ConfirmPassword){
	
	var Checker = document.getElementById("Password").value;
	
	if (ConfirmPassword == '')
	{
		document.getElementById("ConfirmPassword_error").innerHTML = 'This field is required.';
		return false;
	}
	else if(Checker != ConfirmPassword)
	{
		
		document.getElementById("ConfirmPassword_error").innerHTML = 'Please enter a valid Password Your Password not match.';
		return false;
		
	}
	else
	{
			document.getElementById("ConfirmPassword_error").innerHTML = '';
			return true;		
	}
}

function adminProfileValidation(){
	var a = EmailCheck(document.getElementById("Email").value);
	
	var d = AddressCheck(document.getElementById("Address").value);
	var e = ContactNoCheck(document.getElementById("ContactNo").value);
	var f = MemberNameCheck(document.getElementById("MemberName").value);
		
	if(a && d && e && f ){
		return true;	
	}
	else{
		return false;	
	}
}

function adminPasswordValidation()
{
	var g = ConfirmPasswordCheck(document.getElementById("ConfirmPassword").value);
	var h = OldPasswordCheck(document.getElementById("OldPassword").value);
	var i = PasswordCheck(document.getElementById("Password").value);
	
	if( g && h && i)
	{
		return true;
	}
	else
	{
		return false;
	}
}
function IsNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}


function matchString(str1,str2){
	if(str1==str2)
		return true;	
	else
		return false;
}

function checkStringMinLength(strlength,chklength){
    if(strlength.length > chklength)
        return true;
    else
        return false; 
}

function checkStringMaxLength(strlength,chklength){
    if(strlength.length <= chklength)
        return true;
    else
        return false; 
}

function chkRegExpression(string,regExpn){
    var patt=new RegExp(regExpn);
		if(!(patt.test(string)))
                    return false;
                else
                    return true;
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
