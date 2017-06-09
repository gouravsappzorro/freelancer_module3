

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












function descriptionCheck(description){
	
	if (description == ''){
			
			
			document.getElementById("description_error").innerHTML = 'Reqiuerd';
			return false;
	}
	else
	{
		document.getElementById("description_error").innerHTML = '';
	
		return true;		
		
	}
	
	
}

function titleboxCheck1(title_box1){
	
	if (title_box1 == ''){

			
			
			document.getElementById("whyus_title_error1").innerHTML = 'Reqiuerd';
			return false;
	}
	else
	{
		document.getElementById("whyus_title_error1").innerHTML = '';
		
		return true;		
		
	}
	
	
}


function descriptionCheck1(description1){
	
	if (description1 == ''){
			
			
			document.getElementById("description_error1").innerHTML = 'Reqiuerd';
			return false;
	}
	else
	{
		document.getElementById("description_error1").innerHTML = '';
	
		return true;		
		
	}
	
	
}
 



function titleboxCheck2(title_box2){
	
	if (title_box2 == ''){

			
			
			document.getElementById("whyus_title_error2").innerHTML = 'Reqiuerd';
			return false;
	}
	else
	{
		document.getElementById("whyus_title_error2").innerHTML = '';
		
		return true;		
		
	}
	
	
}


function descriptionCheck2(description2){
	
	if (description2 == ''){
			
			
			document.getElementById("description_error2").innerHTML = 'Reqiuerd';
			return false;
	}
	else
	{
		document.getElementById("description_error2").innerHTML = '';
	
		return true;		
		
	}
	
	
}
 



function titleboxCheck3(title_box3){
	
	if (title_box3 == ''){

			
			
			document.getElementById("whyus_title_error3").innerHTML = 'Reqiuerd';
			return false;
	}
	else
	{
		document.getElementById("whyus_title_error3").innerHTML = '';
		
		return true;		
		
	}
	
	
}


function descriptionCheck3(description3){
	
	if (description3 == ''){
			
			
			document.getElementById("description_error3").innerHTML = 'Reqiuerd';
			return false;
	}
	else
	{
		document.getElementById("description_error3").innerHTML = '';
	
		return true;		
		
	}
	
	
}
 

function titleboxCheck4(title_box4){
	
	if (title_box4 == ''){

			
			
			document.getElementById("whyus_title_error4").innerHTML = 'Reqiuerd';
			return false;
	}
	else
	{
		document.getElementById("whyus_title_error4").innerHTML = '';
		
		return true;		
		
	}
	
	
}


function descriptionCheck4(description4){
	
	if (description4 == ''){
			
			
			document.getElementById("description_error4").innerHTML = 'Reqiuerd';
			return false;
	}
	else
	{
		document.getElementById("description_error4").innerHTML = '';
	
		return true;		
		
	}
	
	
}
 
function titleboxCheck5(title_box5){
	
	if (title_box5 == ''){

			
			
			document.getElementById("whyus_title_error5").innerHTML = 'Reqiuerd';
			return false;
	}
	else
	{
		document.getElementById("whyus_title_error5").innerHTML = '';
		
		return true;		
		
	}
	
	
}


function descriptionCheck5(description5){
	
	if (description5 == ''){
			
			
			document.getElementById("description_error5").innerHTML = 'Reqiuerd';
						return false;
	}
	else
	{
		document.getElementById("description_error5").innerHTML = '';
	
		return true;		
		
	}
	
	
}
 
 function titleboxCheck6(title_box6){
	
	if (title_box6 == ''){

			
			
			document.getElementById("whyus_title_error6").innerHTML = 'Reqiuerd';
			return false;
	}
	else
	{
		document.getElementById("whyus_title_error6").innerHTML = '';
		
		return true;		
		
	}
	
	
}


function descriptionCheck6(description6){
	
	if (description6 == ''){
			
			
			document.getElementById("description_error6").innerHTML = 'Reqiuerd';
						return false;
	}
	else
	{
		document.getElementById("description_error6").innerHTML = '';
	
		return true;		
		
	}
	
	
}
 


function checkdata(){



	var a = descriptionCheck(document.getElementById("description").value);

	var b = titleboxCheck1(document.getElementById("title_box1").value);
	var c = descriptionCheck1(document.getElementById("description1").value);

	var d = titleboxCheck2(document.getElementById("title_box2").value);
	var e = descriptionCheck2(document.getElementById("description2").value);
	
	var f = titleboxCheck3(document.getElementById("title_box3").value);
	var g = descriptionCheck3(document.getElementById("description3").value);

	var h = titleboxCheck4(document.getElementById("title_box4").value);
	var i = descriptionCheck4(document.getElementById("description4").value);

	var j = titleboxCheck5(document.getElementById("title_box5").value);
	var k = descriptionCheck5(document.getElementById("description5").value);

	var l = titleboxCheck6(document.getElementById("title_box6").value);
	var m = descriptionCheck6(document.getElementById("description6").value);
	
	/*var e = Simage5Check(document.getElementById("Simage5").value);*/

	
	if(a && b && c && d && e && f && g && h && i && j && k && l && m){
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

