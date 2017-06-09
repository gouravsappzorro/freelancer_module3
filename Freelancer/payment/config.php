<?php
require_once('lib/Stripe.php');

$stripe = array(
  "secret_key"      => "sk_test_Hh4ddf4Xv4Xp8cIzkj61zTaq",
  "publishable_key" => "pk_test_3QuBvdo8OT8R6r7Ed45rRJuO"
);

Stripe::setApiKey($stripe['secret_key']);
?>
