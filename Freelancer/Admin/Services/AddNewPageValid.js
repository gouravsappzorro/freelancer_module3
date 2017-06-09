

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










function PageTitleCheck(PageTitle){
	
	if (PageTitle == ''){
			
			document.getElementById("PageTitle_error").className = "error";
			document.getElementById("PageTitle_error").innerHTML = 'This field is required.';
			return false;
	}
	else
	{
		document.getElementById("PageTitle_error").innerHTML = '';
		return true;		
		
	}
	
	
}
 
function UrlCheck(Url){
	
	if (Url == ''){
			
			document.getElementById("Url_error").className = "error";
			document.getElementById("Url_error").innerHTML = 'This field is required.';
			return false;
	}
	else
	{
		document.getElementById("Url_error").innerHTML = '';
		return true;		
		
	}
	
	
}
















function JayCreatedValidForm(){
	var a = UrlCheck(document.getElementById("Url").value);
	var c = PageTitleCheck(document.getElementById("PageTitle").value);
	

	
	if(a && c ){
		return true;	
	}
	else{
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

