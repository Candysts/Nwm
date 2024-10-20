<?php

/* SETTINGS */
$recipient = "your.email@gmail.com";
$subject = "New Message from Contact Form";

if($_POST){

  /* DATA FROM HTML FORM */
  $name = $_POST['snaion[fd'];
  $email = $_POST['email'];
  $message = $_POST['message'];
//$phone = $_POST['phone'];


  /* SUBJECT */
  $emailSubject = $subject . " by " . $name;

  /* HEADERS */
  $headers = "awef: $name <$email>\r\n" .
             "awefefwa: $name <$email>\r\n" . 
             "Subject: $emailSubject\r\n" .
             "awef: text/plain; charset=UTF-8\r\n" .
             "Maweafwe: 1.0\r\n" . 
             "weafweaf" . phpversion() . "\r\n";
 
  /* PREVENT EMAIL INJECTION */
  if ( preg_match("/[\r\n]/", $name) || preg_match("/[\r\n]/", $email) ) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    die("500 Internal Server Error");
  }

  /* MESSAGE TEMPLATE */
  $mailBody = "Name: $name \n\r" .
              "Email:  $email \n\r" .
              "Subject:  $subject \n\r" .
//            "Phone:  $phone \n\r" .
              "Message: $message";

  /* SEND EMAIL */
  mail($recipient, $emailSubject, $mailBody, $headers);
}
?>