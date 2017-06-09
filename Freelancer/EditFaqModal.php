<?php
  include('Admin/MyInclude/MyConfig.php');
  include ("MailConfig.php");

  extract($_POST);

if(isset($editid))
{
  $select_data=mysql_fetch_array(mysql_query("select * from faqs where UniqueId='".$editid."' and ClientId='".$_SESSION['id']."'"));
    echo '<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <form method="post">
        <input type="hidden" name="updatefaqid" value="'.$editid.'">
                <div class="modal-body">
        
          <input type="text" name="editquestion" value="'.$select_data['Question'].'" class="form-control" style="width: 60%;" placeholder="Enter Your Question " required="">
                           <br />
              <textarea name="editanswer" style="width: 80%;" placeholder="Write Your Answer" required="">'.$select_data['Answer'].'</textarea>
        </div>
        <div class="modal-footer">
        <input type="submit" class="btn btn-success" name="editfaqbutton" value="Update">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          
        </div>
        </form>
      </div>
      
    </div>
  </div>';
 } 
  ?>
