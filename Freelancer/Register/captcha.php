<?php
session_start();
function getRandomWord($len = 5) {
$word = array_merge(range('0', '9'), range('A', 'Z'));
shuffle($word);
return substr(implode($word), 0, $len);
}

$ranStr = getRandomWord();
$_SESSION["vercode"] = $ranStr;

$height = 35; //CAPTCHA image height
$width = 150; //CAPTCHA image width
$font_size = 24; //CAPTCHA Font size

$image_p = imagecreate($width, $height);
$graybg = imagecolorallocate($image_p, 245, 245, 245);
$textcolor = imagecolorallocate($image_p, 34, 34, 34);

imagefttext($image_p, $font_size, -2, 15, 26, $textcolor, 
'../fonts/Anonymous.ttf', $ranStr);
imagepng($image_p);
/*session_start();
$code=rand(1000,9999);
$_SESSION["code"]=$code;
$im = imagecreatetruecolor(50, 24);
$bg = imagecolorallocate($im, 22, 86, 165); //background color blue
$fg = imagecolorallocate($im, 255, 255, 255);//text color white
imagefill($im, 0, 0, $bg);
imagestring($im, 5, 5, 5,  $code, $fg);
header("Cache-Control: no-cache, must-revalidate");
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);*/
?>