

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


function UserMessageValidation()
{
	$("#Files").val('');
	var Message=$('#Message').val();
	var developer_id=$('#developer_id').val();
	var client_id=$('#client_id').val();
	var project_id=$('#project_id').val();
	
	if(Message=='')
	{
		$('#Message_error').html('This field is required');
	}
	else
	{
		
		$('#atc').hide();
		$('#Message_error').html('');
		$.ajax({
			type:"POST",
			url:"DeveloperSaveMessage.php",
			data:{Message:Message,developer_id:developer_id,client_id:client_id,project_id:project_id},
			success:function(msg)
			{		
				if(msg==0){
				
					$('#Message').val('');
					//$('.message_box').load(document.URL +  ' .message_box');
					location.reload();

				}
			}
		});
	}
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

