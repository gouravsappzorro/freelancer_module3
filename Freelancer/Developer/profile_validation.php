<script type="text/javascript">
$(document).ready(function(e) {
    var serailnumber=$("#serial_number").val();
	if(serailnumber=='')
	{
		$("#company_serial").hide();
	}
});

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
	else if(fname.length<2 || fname.length > 30)
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
	else if(lname.length<2 || lname.length>30)
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

function cityFetch(country,id){
	
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
					
    				  $("#city"+id).html(html);
   				} 
   			});

	
}
function profileTitleCheck(value,id)
{
	if (value == '')
	{
		document.getElementById(id+"_error").className = "error";
		document.getElementById(id+"_error").innerHTML = ' This field is required.';
		return false;
	}
	else if(value.length >30 || value.length < 2)
	{
		document.getElementById(id+"_error").className = "error";
		document.getElementById(id+"_error").innerHTML = ' Profile Title between 2 to 30 characters long.';
		return false;	
	}
	else
	{
		document.getElementById(id+"_error").innerHTML = '';
		return true;		
		
	}
}
function CompanyNameCheck(value,id)
{
	if (value == '')
	{
		document.getElementById(id+"_error").className = "error";
		document.getElementById(id+"_error").innerHTML = ' This field is required.';
		return false;
	}
	else if(value.length >30 || value.length < 2)
	{
		document.getElementById(id+"_error").className = "error";
		document.getElementById(id+"_error").innerHTML = ' Company Name between 2 to 30 characters long.';
		return false;	
	}
	else
	{
		document.getElementById(id+"_error").innerHTML = '';
		return true;		
		
	}
}

function SerialCheck(value,id)
{
	if (value == '')
	{
		document.getElementById(id+"_error").className = "error";
		document.getElementById(id+"_error").innerHTML = ' This field is required.';
		return false;
	}
	else if(value.length >30 || value.length < 2)
	{
		document.getElementById(id+"_error").className = "error";
		document.getElementById(id+"_error").innerHTML = ' Serial Number between 2 to 30 characters long.';
		return false;	
	}
	else
	{
		document.getElementById(id+"_error").innerHTML = '';
		return true;		
	}
}
function blankCheck(value,id){
	
	if (value == ''){
			
			document.getElementById(id+"_error").className = "error";
			document.getElementById(id+"_error").innerHTML = ' This field is required.';
			return false;
	}
	
	else
	{
		document.getElementById(id+"_error").innerHTML = '';
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
function cityCheck(city){
	
	
	if (city == 'select'){
			
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
 function skillsCheck(){
 	
  var chk=document.getElementsByName('skills[]');
  var hasChecked=false;
  for (var i = 0; i < chk.length; i++)
	{
		if (chk[i].checked)
		{
				hasChecked = true;
				break;
		}
	}
	if (hasChecked==false)
	{
				
			document.getElementById("skill_error").innerHTML = 'Please select skills.' ; 
   			return false;
	}else
	{
			document.getElementById("skill_error").innerHTML = '' ; 
   			return true;
	}
  
 
 }
 function typeCheck(){
 
  	var chk=document.getElementsByName('type');
  	var name=$("input[name=type]:checked").val();
	
	if(name=='Freelancer')
	{  
		$("#company_serial").hide();
		$("#serial_number").val('');
	}
	if(name=='Company')
	{
		$("#company_serial").show();
	}
 
 	var hasChecked=false;
	for (var i = 0; i < chk.length; i++)
	{ 
		if (chk[i].checked)
		{
				hasChecked = true;
				break;
		}
	}
	//alert(hasChecked);
	if (hasChecked==false)
	{
				
			document.getElementById("type_error").innerHTML = 'Please Check Any One Option.' ; 
			document.getElementById("type").focus();
   			return false;
			alert();
	}else
	{
			document.getElementById("type_error").innerHTML = '' ; 
   			return true;
	}
 
 }
 function fileCheck(value){
		if (typeof FileReader !== "undefined") {
			var limit=10485760;
			//var limit=620544;
    		var size = document.getElementById('file').files[0].size;
		}
		
		var allowedFiles = [".jpg", ".jpeg", ".png", ".gif"];
		var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
        
		if(size>limit)
		{
			document.getElementById("file_error").innerHTML = 'Max fileupload size is 10mb';
			flag=0;
			return false;
		} 
		else if (!regex.test(value.toLowerCase())) {
			document.getElementById("file_error").innerHTML = 'Invalide file!';
			flag=0;
  			return false;
		}
		
		else
		{
			document.getElementById("file_error").innerHTML = '';
			flag=1;
			return true;
		}
				
}
function profileValidation(){
	var a = fnameCheck(document.getElementById("fname").value);
	var b = lnameCheck(document.getElementById("lname").value);
	var c = countryCheck(document.getElementById("country").value);
	var d = cityCheck(document.getElementById("city").value);
	var e = profileTitleCheck(document.getElementById("profile_title").value,document.getElementById("profile_title").id);
	var f = blankCheck(document.getElementById("shortdescr").value,document.getElementById("shortdescr").id);
	var g = CompanyNameCheck(document.getElementById("company").value,document.getElementById("company").id);
	
	var h= skillsCheck();
	var j=typeCheck();
	
	var name=$("input[name=type]:checked").val();
	
	k=true;
	
	if($("input[name=type]:checked").val()=='Company')
	{
		var k = SerialCheck(document.getElementById("serial_number").value,document.getElementById("serial_number").id);
	}

	if(a && b && c && d && e && f && g && h && j && k && flag==1)
	{
		return true;	
	}
	else
	{
		return false;	
	}
}
</SCRIPT>