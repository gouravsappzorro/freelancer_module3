

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










function Simage1Check(SImage1){
	
	if (SImage1 == ''){
			
			document.getElementById("Simage1_error").className = "error";
			document.getElementById("Simage1_error").innerHTML = 'Reqiuerd';
			return false;
	}
	else
	{
		document.getElementById("Simage1_error").innerHTML = '';
		return true;		
		
	}
	
	
}

/*function title1Check(title1){
	
	if (title1 == ''){
			
			document.getElementById("title1_error").className = "error";
			document.getElementById("title1_error").innerHTML = 'Reqiuerd';
			return false;
	}
	else
	{
		document.getElementById("title1_error").innerHTML = '';
		return true;		
		
	}
	
	
}*/

 

function Simage2Check(SImage2){
	
	if (SImage2 == ''){
			
			document.getElementById("Simage2_error").className = "error";
			document.getElementById("Simage2_error").innerHTML = 'Reqiuerd';
			return false;
	}
	else
	{
		document.getElementById("Simage2_error").innerHTML = '';
		return true;		
		
	}
	
	
}






function Simage3Check(SImage3){
	
	if (SImage3 == ''){
			
			document.getElementById("Simage3_error").className = "error";
			document.getElementById("Simage3_error").innerHTML = 'Reqiuerd';
			return false;
	}
	else
	{
		document.getElementById("Simage3_error").innerHTML = '';
		return true;		
		
	}
	
	
}

function Simage4Check(SImage4){
	
	if (SImage4 == ''){
			
			document.getElementById("Simage4_error").className = "error";
			document.getElementById("Simage4_error").innerHTML = 'Reqiuerd';
			return false;
	}
	else
	{
		document.getElementById("Simage4_error").innerHTML = '';
		return true;		
		
	}
	
	
}

/*

function Simage5Check(SImage5){
	
	if (SImage5 == ''){
			
			document.getElementById("Simage5_error").className = "error";
			document.getElementById("Simage5_error").innerHTML = 'Reqiuerd';
			return false;
	}
	else
	{
		document.getElementById("Simage5_error").innerHTML = '';
		return true;		
		
	}
	
	
}



*/





function MyAnuJayCretedForm(){



	var a = Simage1Check(document.getElementById("Simage1").value);
	var b = Simage2Check(document.getElementById("Simage2").value);
	var c = Simage3Check(document.getElementById("Simage3").value);
	var d = Simage4Check(document.getElementById("Simage4").value);
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

