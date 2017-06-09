<?php
//session_start();

//Include Facebook SDK
require_once 'inc/facebook.php';

/*
 * Configuration and setup FB API
 */
$appId = '1186808888082817'; //Facebook App ID
$appSecret = '2a16ef8325532c1eb2f2ffb7559fadb6'; // Facebook App Secret
$redirectURL = 'http://greencubes.co.in/Projects/Freelancer/Register/register.php'; // Callback URL
$fbPermissions = 'email';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret
));
$fbUser = $facebook->getUser();
?>