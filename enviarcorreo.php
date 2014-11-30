<?php

//error_reporting(E_ALL);
//error_reporting(E_STRICT);
function enviarcorreo($cuerpo, $destinatario, $titulo){
date_default_timezone_set('America/Caracas');
require_once('PHPMailer/class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();

//$body             = file_get_contents('contents.html');
//$body             = preg_replace('/[\]/','',$body);
$body=$cuerpo;
$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.yourdomain.com"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "kinesiostudiomgta@gmail.com";  // GMAIL username
$mail->Password   = "sofia01.";            // GMAIL password

$mail->SetFrom('kinesiostudiomgta@gmail.com', 'Kinesio Studio');


$mail->Subject    = $titulo;

//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$address =$destinatario;
$mail->AddAddress($address, "");
$mail->SMTPDebug = false;
$mail->do_debug = 0;
//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
try{
    $mail->Send();}
    catch(Exception $e){}
}
?>

