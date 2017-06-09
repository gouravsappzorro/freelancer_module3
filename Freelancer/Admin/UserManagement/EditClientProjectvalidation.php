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
		return false;
		
	}else
	{
			document.getElementById("subcategory_error").innerHTML = '' ; 
   			return true;
	}
 }

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

		var val = value.toLowerCase();
		var regex = new RegExp("(.*?)\.(jpg|jpeg|png|gif|docx|doc)$");
		if(val=="")
		{
			document.getElementById("file_error").innerHTML = '';
			return true;
		}
		else if(!(regex.test(val)))
		{
			document.getElementById("file").value='';
			document.getElementById("file_error").className = "error";
			document.getElementById("file_error").innerHTML = 'Invalide file!';
			return false;
		}
		else
		{
			document.getElementById("file_error").innerHTML = '';
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
	else
	{
		document.getElementById("budget_error").innerHTML = '';
		return true;		
		
	}
}
function offerCheck(){
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
	if (hasChecked==false)
	{
		document.getElementById("accept_offers_error").innerHTML = 'Please Check Any One Option.' ; 
		return false;
			
	}else
	{
		document.getElementById("accept_offers_error").innerHTML = '' ; 
		return true;
	}
}
function project_typeCheck(){
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
	if (hasChecked==false)
	{
		document.getElementById("project_type_error").innerHTML = 'Please Check Any One Option.' ; 
		return false;
		alert();
	}else
	{
		document.getElementById("project_type_error").innerHTML = '' ; 
		return true;
	}
}

function termCheck(){
	if(document.post_project.terms.checked==false)
  	{
	   	document.getElementById("term_error").innerHTML = 'Please accept terms and condition.' ; 
 		return false;
	}
  	else
  	{
		document.getElementById("term_error").innerHTML = '' ; 
		return true;  
	}
}

function ProjectValidation(){
	
	var a = categoryCheck(document.getElementById("category").value);
	var b = fileCheck(document.getElementById("file").value)
	var c = currencyCheck(document.getElementById("currency").value);
	var d = blankCheck(document.getElementById("project_title").value,document.getElementById("project_title").id);
	var e = blankCheck(document.getElementById("project_des").value,document.getElementById("project_des").id);
	var f = offerCheck();
	var g = project_typeCheck();
	var h = budgetCheck(document.getElementById("budget").value);
	var i = termCheck();
	var j = blankCheck(document.getElementById("location").value,document.getElementById("location").id);
	
	
	if(!a && !b && !c && !d && !e && !f && !g && !h && !i && !j){
		document.getElementById("category").focus();
	}
	else if(!a)
	{
		document.getElementById("category").focus();
	}
	else if(!c)
	{
		document.getElementById("currency").focus();
	}
	
	else if(!d)
	{
		document.getElementById("project_title").focus();
	}
	else if(!e)
	{
		document.getElementById("project_des").focus();
	}
	else if(!b)
	{
		document.getElementById("file").focus();
	}
	else if(!f)
	{
		document.getElementById("accept_offers").focus();
	}
	else if(!g)
	{
		document.getElementById("project_type").focus();
	}
	else if (!h)
	{
		document.getElementById("budget").focus();
	}
	else if(!i)
	{
		document.getElementById("term").focus();
	}
	else if(!j)
	{
		document.getElementById("location").focus();
	}
	
	
	if(a && b && c && d && e && f && g && h && i && j){
		return true;	
	}
	else{
		return false;	
	}
}
	</script>