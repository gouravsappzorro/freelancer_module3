<script>
		
function categoryCheck(category){
	
	if (category == 'Select'){
			
			document.getElementById("category_error").className = "error";
			document.getElementById("category_error").innerHTML = ' This field is required.';
			return false;
			
	}
	
	else
	{
		document.getElementById("category_error").innerHTML = '';
		return true;		
		
	}
}
/*function subcategoryCheck(subcategory){
	
	if (category == 'Select'){
			
			document.getElementById("subcategory_error").className = "error";
			document.getElementById("subcategory_error").innerHTML = ' This field is required.';
			return false;
	}
	
	else
	{
		document.getElementById("subcategory_error").innerHTML = '';
		return true;		
		
	}
}*/

function subcategoryCheck(){
 	
  var chk=document.getElementsByName('subcategory[]');
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
				
			document.getElementById("subcategory_error").innerHTML = 'Please select subcategory.' ;
			//document.getElementById("subcategory").focus(); 
   			return false;
			
	}else
	{
			document.getElementById("subcategory_error").innerHTML = '' ; 
   			return true;
	}
  
 
 }
/*function experienceCheck(experience){
	
	if (experience == 'Select'){
			
			document.getElementById("exp_error").className = "error";
			document.getElementById("exp_error").innerHTML = ' This field is required.';
			return false;
	}
	
	else
	{
		document.getElementById("exp_error").innerHTML = '';
		return true;		
		
	}
}*/
function currencyCheck(currency){
	
	if (currency == 'Select'){
			
			document.getElementById("currency_error").className = "error";
			document.getElementById("currency_error").innerHTML = ' This field is required.';
			return false;
	}
	
	else
	{
		document.getElementById("currency_error").innerHTML = '';
		return true;		
		
	}
}
function fileCheck(value){
		
		if(value!='')
		{
			var limit=10485760;
			//var limit=620544;
			var size = document.getElementById('file').files[0].size;
		}
		var val = value.toLowerCase();
		var regex = new RegExp("(.*?)\.(jpg|jpeg|png|gif|docx|doc|pdf|xls|xlsx)$");
		if(val=="")
		{
			document.getElementById("file_error").innerHTML = '';
			return true;
		}
		else if(!(regex.test(val)))
		{

				//var val = value.toLowerCase();
				//var regex = new RegExp("(.*?)\.(jpg|jpeg|png|gif)$");
				//document.getElementById("file").value='';
				document.getElementById("file_error").className = "error";
				document.getElementById("file_error").innerHTML = 'Invalide file!';
				//document.getElementById("file").focus();
  				return false;
		}
		else if(size>limit)
		{
			document.getElementById("file_error").innerHTML = 'Max fileupload size is 10mb';
			return false;
		}
		else
		{

			document.getElementById("file_error").innerHTML = '';
			return true;
		}
				
}
function TitleCheck(value,id)
{
	if (value == '')
	{
		document.getElementById(id+"_error").className = "error";
		document.getElementById(id+"_error").innerHTML = ' This field is required.';
		return false;
		//$('#'+id).toggle().find('input').first().focus();
	}
	else if(value.length >200 || value.length <3)
	{
		document.getElementById(id+"_error").innerHTML = ' Title of the project between 3 to 200 characters long.';
		return false;
	}
	else
	{
		document.getElementById(id+"_error").innerHTML = '';
		return true;		
		
	}
}

function DescriptionCheck(value,id)
{
	if (value == '')
	{
		document.getElementById(id+"_error").className = "error";
		document.getElementById(id+"_error").innerHTML = ' This field is required.';
		return false;
		//$('#'+id).toggle().find('input').first().focus();
	}
	else if(value.length >1000)
	{
		document.getElementById(id+"_error").innerHTML = ' Description of the project is upto 1000 characters long.';
		return false;
	}
	else
	{
		document.getElementById(id+"_error").innerHTML = '';
		return true;		
		
	}
}

function blankCheck(value,id)
{
	if (value == '')
	{
		document.getElementById(id+"_error").className = "error";
		document.getElementById(id+"_error").innerHTML = ' This field is required.';
		return false;
		//$('#'+id).toggle().find('input').first().focus();
	}
	else
	{
		document.getElementById(id+"_error").innerHTML = '';
		return true;		
		
	}
}

function LocationCheck(value,id)
{
	if (value == '')
	{
		document.getElementById(id+"_error").className = "error";
		document.getElementById(id+"_error").innerHTML = ' This field is required.';
		return false;
		//$('#'+id).toggle().find('input').first().focus();
	}
	else
	{
		document.getElementById(id+"_error").innerHTML = '';
		return true;		
		
	}
}

function SkillCheck(Value)
{
	alert('');
}
function budgetCheck(value){
	regex=/^[0-9\-]+$/;
	
	if (value == ''){
			
			document.getElementById("budget_error").className = "error";
			document.getElementById("budget_error").innerHTML = ' This field is required.';
			return false;
	}
	else if(!regex.test(value))
	{
			
			document.getElementById("budget_error").innerHTML = ' Please Enter valide budget value.';
			return false;
	}
	else if(parseInt(value)<=0)
	{
		document.getElementById("budget_error").innerHTML = ' Budget value should be greater then 0 (Zero).';
	}
	else
	{
		document.getElementById("budget_error").innerHTML = '';
		return true;		
		
	}
}
/*function fetchSkills(abc){
	
	if(abc=='select#tokenize_placehoder'){
		
        var options = $('#tokenize_placehoder > option:selected');
       	if(options.length == 0){
           document.getElementById("required_skill_error").innerHTML = ' Please select skills.';
           return false;
        }
		else
		{
			document.getElementById("required_skill_error").innerHTML = '';
			return true;
		}
	}else if(abc=='select#location')
	{
		
		 var option = $('#location > option:selected');
        if(option.length == 0){
           document.getElementById("location_error").innerHTML = ' Please select location.';
           return false;
        }
		else
		{
			document.getElementById("location_error").innerHTML = '';
			return true
		}	
	}
}*/

/*function locationCheck(){
        var options = $('#location > option:selected');
        if(options.length == 0){
           document.getElementById("location_error").innerHTML = ' Please select skills.';
           return false;
        }
		else
		{
			document.getElementById("location_error").innerHTML = '';
			return true
		}	 
}*/
function offerCheck(){
 /*var value=$('input[name=accept_offers]:checked').val();

  if(value=='')
  //if(document.post_project.accept_offers.checked==false)
  {
  	 
   document.getElementById("accept_offers_error").innerHTML = 'Please Checked Any One Option.' ; 
   return false;
  }
  else
  {
   
    document.getElementById("accept_offers_error").innerHTML = '' ; 
   return true;  
  }*/
  var chk=document.getElementsByName('accept_offers');
 
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
				
			document.getElementById("accept_offers_error").innerHTML = 'Please Check Any One Option.' ; 
			//document.getElementById("accept_offers").focus();
   			return false;
			
	}else
	{
			document.getElementById("accept_offers_error").innerHTML = '' ; 
   			return true;
	}
 
 }
 /*function competibleCheck(){
	
  var chk=document.getElementsByName('competible[]');
 
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
				
			document.getElementById("competible_error").innerHTML = 'Please select Competibility.' ; 
   			return false;
			alert();
	}else
	{
			document.getElementById("competible_error").innerHTML = '' ; 
   			return true;
	}
 
 }*/

  function project_typeCheck(){
 	//alert();
 /*var project_type=$('input[name=project_type]:checked').val();

  if(project_type=='')
  
  {
  	 
   document.getElementById("project_type_error").innerHTML = 'Please Checked Any One Option.' ; 
   return false;
  }
  else
  {
   
    document.getElementById("project_type_error").innerHTML = '' ; 
   return true;  
  }*/
  var chk=document.getElementsByName('project_type');
 
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
				
			document.getElementById("project_type_error").innerHTML = 'Please Check Any One Option.' ; 
			//document.getElementById("project_type").focus();
   			return false;
			alert();
	}else
	{
			document.getElementById("project_type_error").innerHTML = '' ; 
   			return true;
	}
 
 }
 function termCheck(){
 	//alert();
 //var project_type=$('input[name=project_type]:checked').val();
//var chk=document.getElementsByName('terms');
//alert();
  if(document.post_project.terms.checked==false)
  {
   document.getElementById("term_error").innerHTML = 'Please accept terms and condition.' ; 
 //  document.getElementById("term").focus();
   return false;
  }
  else
  {
   
    document.getElementById("term_error").innerHTML = '' ; 
   return true;  
  }
 
 }


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

function PostprojectValidation(){
	
	var a = categoryCheck(document.getElementById("category").value);
	var b=fileCheck(document.getElementById("file").value)
	var d = currencyCheck(document.getElementById("currency").value);
	var e = TitleCheck(document.getElementById("project_title").value,document.getElementById("project_title").id);
	var g = DescriptionCheck(document.getElementById("project_des").value,document.getElementById("project_des").id);
	var i= offerCheck();
	var l= project_typeCheck();
	var m = budgetCheck(document.getElementById("budget").value);
	var n= termCheck();
	var o= LocationCheck(document.getElementById("location").value,document.getElementById("location").id);
	var c = captchaCheck();	
	
	if(!a && !b && !d && !e && !g && !i && !l && !m && !n && !o){
		document.getElementById("category").focus();
	}
	else if(!a)
	{
		document.getElementById("category").focus();
	}
	else if(!d)
	{
		document.getElementById("currency").focus();
	}
	
	else if(!e)
	{
		document.getElementById("project_title").focus();
	}
	else if(!g)
	{
		document.getElementById("project_des").focus();
	}
	else if(!b)
	{
		document.getElementById("file").focus();
	}
	else if(!i)
	{
		document.getElementById("accept_offers").focus();
	}
	else if(!l)
	{
		document.getElementById("project_type").focus();
	}
	else if (!m)
	{
		document.getElementById("budget").focus();
	}
	else if(!n)
	{
		document.getElementById("term").focus();
	}
	else if(!o)
	{
		document.getElementById("location").focus();
	}
	
	if(a && b && c && d && e && g && i && l && m && n && o){
	
		return true;	
	}
	else{
		
		 
		return false;	
	}
}
	</script>
