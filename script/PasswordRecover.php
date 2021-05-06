<?php
include "conn_init.php";
require_once "Mail.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";
$from = 'buziofficial00001@gmail.com'; //change this to your email address
$to = 'aldomob00@gmail.com'; // change to address
$subject = 'Insert subject here'; // subject of mail
$body = "Hello world! this is the content of the email"; //content of mail

$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'buziofficial00001@gmail.com', //your gmail account
        'password' => 'AnilaITI3@' // your password
    ));

// Send the mail
$mail = $smtp->send($to, $headers, $body);

//check mail sent or not
if (PEAR::isError($mail)) {
    echo '<p>'.$mail->getMessage().'</p>';
} else {
    echo '<p>Message successfully sent!</p>';
}
?>