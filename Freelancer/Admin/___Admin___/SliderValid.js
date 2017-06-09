

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












function title1Check(title1){
	
	if (title1 == ''){
			
			//document.getElementById("title1").addClass("error");
			document.getElementById("title1_error").innerHTML = 'Reqiuerd';
			return false;
	}
	else
	{
		document.getElementById("title1_error").innerHTML = '';
		//document.getElementById("title1").removeClass = "error";
		return true;		
		
	}
	
	
}

 function title2Check(title2){
	
	if (title2 == ''){
			
			//document.getElementById("title1").addClass("error");
			document.getElementById("title2_error").innerHTML = 'Reqiuerd';
			return false;
	}
	else
	{
		document.getElementById("title2_error").innerHTML = '';
		//document.getElementById("title1").removeClass = "error";
		return true;		
		
	}
	
	
}

	function title3Check(title3){
	
	if (title3 == ''){
			
			//document.getElementById("title1").addClass("error");
			document.getElementById("title3_error").innerHTML = 'Reqiuerd';
			return false;
	}
	else
	{
		document.getElementById("title3_error").innerHTML = '';
		//document.getElementById("title1").removeClass = "error";
		return true;		
		
	}
	
	
}
	
function title4Check(title4){
	
	if (title4 == ''){
			
			//document.getElementById("title1").addClass("error");
			document.getElementById("title4_error").innerHTML = 'Reqiuerd';
			return false;
	}
	else
	{
		document.getElementById("title4_error").innerHTML = '';
		//document.getElementById("title1").removeClass = "error";
		return true;		
		
	}
	
	
}



















function MyAnuJayCretedForm(){



	var a = title1Check(document.getElementById("title1").value);
	var b = title2Check(document.getElementById("title2").value);
	var c = title3Check(document.getElementById("title3").value);
	var d = title4Check(document.getElementById("title4").value);
	
	/*var e = Simage5Check(document.getElementById("Simage5").value);*/

	
	if(a && b && c && d){
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

