<?php
  include_once 'db_connect.php';
  if(!isset($_SESSION))
  {
      session_start();
  }
  $name=$_SESSION['user'];
    $to = 'f31ee@localhost';
    $email_from = 'f31ee@localhost';
    $message='hello from php mail';
    $email_subject = 'New Appointment Confirmation - MedArt Clinic';
    //$email_body = "Dear $name,\n You have successfully made an appointment to MedArt Clinic."."Here is the details:\n $message". "Feel free to modify it anytime at our website: http://localhost/EE4717webapp/project/status.php".;
    $headers = 'From: $email_from'. "\r\n".'Reply-To: $user_email'. "\r\n".'X-Mailer: PHP/'.phpversion();
    mail($to,$email_subject,$message,$headers,'ff31ee@localhost');
    echo ('mail sent to :'.$to);
?>
