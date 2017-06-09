<?php
session_start();
if($_POST['captcha'])
{
if(($_POST['captcha']!=$_SESSION['vercode'])){
  
  echo '1';
}else{
  echo '0';
}
}
?>