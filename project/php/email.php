<?php
  include_once 'db_connect.php';

    $email_from = 'xingmengpan2013@gmail.com';
    $email_subject = "New Appointment Confirmation - MedArt Clinic";
    $email_body = "Dear $name,\n You have successfully made an appointment to MedArt Clinic.".
                            "Here is the details:\n $message". "Feel free to modify it anytime at our website: http://localhost/EE4717webapp/project/status.php".;
    $to = "$user_email";
    $headers = "From: $email_from \r\n";
    $headers .= "Reply-To: $user_email \r\n";
    mail($to,$email_subject,$email_body,$headers);

?>
