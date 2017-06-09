

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



<!----------------------------------------- Images Validation ---------------------------------- -->


function Step1TitleCheck(Step1Title){
	
	if (Step1Title == ''){
			
			document.getElementById("Step1Title_error").className = "error";
			document.getElementById("Step1Title_error").innerHTML = 'Reqiuerd';
			return false;
	}
	else
	{
		document.getElementById("Step1Title_error").innerHTML = '';
		return true;		
		
	}
	
	
}

function Step2TitleCheck(Step2Title){
	
	if (Step2Title == ''){
			
			document.getElementById("Step2Title_error").className = "error";
			document.getElementById("Step2Title_error").innerHTML = 'Reqiuerd';
			return false;
	}
	else
	{
		document.getElementById("Step2Title_error").innerHTML = '';
		return true;		
		
	}
	
	
}


function Step3TitleCheck(Step3Title){
	
	if (Step3Title == ''){
			
			document.getElementById("Step3Title_error").className = "error";
			document.getElementById("Step3Title_error").innerHTML = 'Reqiuerd';
			return false;
	}
	else
	{
		document.getElementById("Step3Title_error").innerHTML = '';
		return true;		
		
	}
	
	
}










function Step1LinkCheck(Step1Link){
	
	if (Step1Link == ''){
			
			document.getElementById("Step1Link_error").className = "error";
			document.getElementById("Step1Link_error").innerHTML = 'Reqiuerd';
			return false;
	}
	else
	{
		document.getElementById("Step1Link_error").innerHTML = '';
		return true;		
		
	}
	
	
}


function Step2LinkCheck(Step2Link){
	
	if (Step2Link == ''){
			
			document.getElementById("Step2Link_error").className = "error";
			document.getElementById("Step2Link_error").innerHTML = 'Reqiuerd';
			return false;
	}
	else
	{
		document.getElementById("Step2Link_error").innerHTML = '';
		return true;		
		
	}
	
	
}


function Step3LinkCheck(Step3Link){
	
	if (Step3Link == ''){
			
			document.getElementById("Step3Link_error").className = "error";
			document.getElementById("Step3Link_error").innerHTML = 'Reqiuerd';
			return false;
	}
	else
	{
		document.getElementById("Step3Link_error").innerHTML = '';
		return true;		
		
	}
	
	
}





















function JayForm4ValidCretedForm(){
	

	
	var a = Step1TitleCheck(document.getElementById("Step1Title").value);
	var b = Step2TitleCheck(document.getElementById("Step2Title").value);
	var c = Step3TitleCheck(document.getElementById("Step3Title").value);
	
	var d = Step1LinkCheck(document.getElementById("Step1Link").value);
	var e = Step2LinkCheck(document.getElementById("Step2Link").value);
	var f = Step3LinkCheck(document.getElementById("Step3Link").value);
	
	
	if(a && b && c && d && e && f )
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

