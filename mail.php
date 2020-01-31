
<?php
include ('credential.php');

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])){

   $name=$_POST['name'];
   $email=$_POST['email'];
   $subject="[From : ";
   $subject .=$email;
   $subject .=" ] ";
   $subject .=$_POST['subject'];
   $message=$_POST['message'];
   $to ="plmn855000@gmail.com";
   //$to =EMAIL;
   require_once "PHPMailer/PHPMailer.php";
   require_once "PHPMailer/SMTP.php";
   require_once "PHPMailer/Exception.php";

   $mail = new PHPMailer;

   //$mail->SMTPDebug = 4;                               // Enable verbose debug output
   //SMTP Settings
   $mail->isSMTP();                                      // Set mailer to use SMTP
   $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
   $mail->SMTPAuth = true;                               // Enable SMTP authentication
   $mail->Username = $gmail_id;                 // SMTP username
   $mail->Password = $gmail_pw;                           // SMTP password
   $mail->Port = 465;//587;                                    // TCP port to connect to
   $mail->SMTPSecure = "ssl"; //'tls';                         // Enable TLS encryption, `ssl` also accepted
   $mail->CharSet = "utf-8";
   $mail->SMTPOptions = array(
          'ssl' => array(
              'verify_peer' => false,
              'verify_peer_name' => false,
              'allow_self_signed' => true
          )
      );
   //Email Settings
   $mail->setFrom($email,$name);
   $mail->addAddress($to);     // Add a recipient
   $mail->addReplyTo(EMAIL);
   //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
   //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
   $mail->isHTML(true);                                  // Set email format to HTML



   $mail->Subject =$subject;
   $mail->Body    =$message;


   if($mail->send()) {
      $response="success";
   } else {
      $response= "Something is wrong: " . $mail->ErrorInfo;
   }

   exit(json_encode(array("response" =>   $response)));
}

?>
