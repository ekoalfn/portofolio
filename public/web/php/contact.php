<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

/*
*  CONFIGURATION
*/

// Recipients
$fromEmail = $_POST['email']; // Email address that will be in the from field of the message.
$fromName = $_POST['name']; // Name that will be in the from field of the message.
$sendToEmail = 'info@ninedragonlabs.com'; // Email address that will receive the message with the output of the form
$sendToName = 'Nine Dragon Labs'; // Name that will receive the message with the output of the form

// Subject
$subject = 'Message from Sandbox contact form';

// Fields - Value of attribute name => Text to appear in the email
$fields = array('name' => 'Name', 'surname' => 'Surname', 'phone' => 'Phone', 'email' => 'Email', 'message' => 'Message', 'department' => 'Department');

// Success and error alerts
$okMessage = 'We have received your inquiry. Stay tuned, we’ll get back to you very soon.';
$errorMessage = 'There was an error while submitting the form. Please try again later';

// SMTP settings
$smtpUse = false; // Set to true to enable SMTP authentication
$smtpHost = ''; // Enter SMTP host ie. smtp.gmail.com
$smtpUsername = ''; // SMTP username ie. gmail address
$smtpPassword = ''; // SMTP password ie gmail password
$smtpSecure = 'tls'; // Enable TLS or SSL encryption
$smtpAutoTLS = false; // Enable Auto TLS
$smtpPort = 587; // TCP port to connect to

// reCAPTCHA settings
$recaptchaUse = false; // Set to true to enable reCAPTHCA
$recaptchaSecret = 'YOUR_SECRET_KEY'; // enter your secret key from https://www.google.com/recaptcha/admin

/*
*  LET'S DO THE SENDING
*/

// if you are not debugging and don't need error reporting, turn this off by error_reporting(0);
error_reporting(E_ALL & ~E_NOTICE);
// error_reporting(0);
try {
  $emailTextHtml = "";
  $mail = new PHPMailer;
  if(count($_POST) == 0) throw new \Exception('Form is empty');
  if($recaptchaUse == true) {
    require('recaptcha/src/autoload.php');
    if (!isset($_POST['g-recaptcha-response'])) {
      throw new \Exception('ReCaptcha is not set.');
    }
    $recaptcha = new \ReCaptcha\ReCaptcha($recaptchaSecret, new \ReCaptcha\RequestMethod\CurlPost());
    // we validate the ReCaptcha field together with the user's IP address
    $response = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
    if (!$response->isSuccess()) {
      throw new \Exception('ReCaptcha was not validated.');
    }
  }
  $message = nl2br($_POST['message']);
  $emailTextHtml .= "$message";
  // foreach ($fields as $fieldName => $fieldText) {
  //   if (isset($_POST[$fieldName]) && !empty($_POST[$fieldName])) {
  //     $fieldValue = trim($_POST[$fieldName]);
  //     $emailTextHtml .= "<tr><td><strong>" . $fieldText . ":</strong></td><td>" . $fieldValue . "</td></tr>";
  //   }
  // }
  $mail->setFrom(trim($fromEmail ?? ''), trim($fromName ?? ''));
  $mail->addAddress(trim($sendToEmail ?? ''), trim($sendToName ?? ''));
  $mail->addReplyTo(trim($fromEmail ?? ''), trim($fromName ?? ''));
  $mail->isHTML(true);
  $mail->CharSet = 'UTF-8';
  $mail->Subject = $subject;
  $mail->Body = "<p>$emailTextHtml</p>";
  $mail->AltBody = "This is the plain text version of the email content";
  $mail->msgHTML($emailTextHtml);

  if($smtpUse == true) {
    // Tell PHPMailer to use SMTP
    $mail->isSMTP();
    // Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->Debugoutput = function ($str, $level) use (&$mailerErrors) {
      $mailerErrors[] = [ 'str' => $str, 'level' => $level ];
    };
    $mail->SMTPDebug = 3;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = $smtpSecure;
    $mail->SMTPAutoTLS = $smtpAutoTLS;
    $mail->Host = $smtpHost;
    $mail->Port = $smtpPort;
    $mail->Username = $smtpUsername;
    $mail->Password = $smtpPassword;
  }
  if(!$mail->send()) {
    throw new \Exception('I could not send the email.' . $mail->ErrorInfo);
  }
  $responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e) {
  $responseArray = array('type' => 'danger', 'message' => $e->getMessage());
}
// if requested by AJAX request return JSON response
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
  $encoded = json_encode($responseArray); 
  header('Content-Type: application/json');
  echo $encoded;
}
// else just display the message
else {
  echo $responseArray['message'];
}