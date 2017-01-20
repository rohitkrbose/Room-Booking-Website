<?php

// $Id$

require "defaultincludes.inc";
require_once "version.inc";
require_once "mrbs_sql.inc";
require_once "functions_ical.inc";
require 'phpmailer/PHPMailerAutoload.php';


print_header($day, $month, $year, $area, isset($room) ? $room : "");

$email = $_POST["usermail"];

$sql = "SELECT email
            FROM $tbl_users
           WHERE " .
         sql_syntax_casesensitive_equals('email', mb_strtolower($email)) .
         "
           LIMIT 1";

$verify = sql_query1($sql);

if ($email == $verify)
{
  $sql = "SELECT password_hash
              FROM $tbl_users
             WHERE " .
           sql_syntax_casesensitive_equals('email', mb_strtolower($email)) .
           "
             LIMIT 1";

  $pass = sql_query1($sql);

  $mail = new PHPMailer;

  //$mail->SMTPDebug = 3;                               // Enable verbose debug output

  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = 'smtp.cc.iitk.ac.in;mmtp.iitk.ac.in';  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = 'rohitkb';                 // SMTP username
  $mail->Password = 'Vortex123';                           // SMTP password
  //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 25;                                    // TCP port to connect to

  $booker_mail = $email;

  $mail->setFrom('rohitkb@iitk.ac.in', 'IME Department, IIT Kanpur');
  $mail->addAddress($booker_mail, 'Booker');     // Add a recipient

  $mail->isHTML(true);                                  // Set email format to HTML

  $mail->Subject = 'Password Recovery';
  $mail->Body    = 'Your password is \'' . $pass . '\'';
  $mail->AltBody = 'Your password is \'' . $pass . '\'';

  $mail->send();
  echo "<meta http-equiv='refresh' content='0;url=success_pass.php'>";
}
else
{
  echo "<meta http-equiv='refresh' content='0;url=fail_pass.php'>";
  exit;
}