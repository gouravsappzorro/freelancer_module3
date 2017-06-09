<SCRIPT TYPE="text/javascript">
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
function fileCheck(value){
		if (typeof FileReader !== "undefined") {
			//var limit=10485760;
			var limit=620544;
    		var size = document.getElementById('file').files[0].size;
		}
		var val = value.toLowerCase();
		var regex = new RegExp("(.*?)\.(jpg|jpeg|png|gif)$");
		
		if(!(regex.test(val)))
		{
				//var val = value.toLowerCase();
				//var regex = new RegExp("(.*?)\.(jpg|jpeg|png|gif)$");
				document.getElementById("file").value='';
				document.getElementById("file_error").className = "error";
				document.getElementById("file_error").innerHTML = 'Invalide file!';
				flag=0;
  				return false;
		}
		else if(size>limit)
		{
			document.getElementById("file_error").innerHTML = 'Max fileupload size is 10mb';
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
function cityFetch(country){
	
	var id = document.getElementById("country").value;
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

function profileValidation(){
	
	
	var a = fnameCheck(document.getElementById("fname").value);
	var b = lnameCheck(document.getElementById("lname").value);
	//var c = countryCheck(document.getElementById("country").value);
	//var d = cityCheck(document.getElementById("city").value);
	//var e = blankCheck(document.getElementById("profile_title").value,document.getElementById("profile_title").id);
	
	if(a && b && flag==1){
	
		return true;	
	}
	else{
		return false;	
	}
}
</SCRIPT>