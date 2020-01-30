
<?php
echo "mail.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])){
echo "mail.php2";
   $name=$_POST['name'];
   $email=$_POST['email'];
   $subject=$_POST['subject'];
   $message=$_POST['message'];
   $to ='plmn855000@gmail.com';
   require_once "PHPMailer/PHPMailer.php";
   require_once "PHPMailer/SMTP.php";
   require_once "PHPMailer/Exception.php";

   $mail = new PHPMailer;

   //$mail->SMTPDebug = 4;                               // Enable verbose debug output
   //SMTP Settings
   $mail->isSMTP();                                      // Set mailer to use SMTP
   $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
   $mail->SMTPAuth = true;                               // Enable SMTP authentication
   $mail->Username = "plmn855000@gmail.com";                 // SMTP username
   $mail->Password = '';                           // SMTP password
   $mail->Port = 465;//587;                                    // TCP port to connect to
   $mail->SMTPSecure = "ssl"; //'tls';                         // Enable TLS encryption, `ssl` also accepted
   $mail->CharSet = "utf-8";

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
      $response="Email is sent!";
   } else {
      $response= "Something is wrong:<br><br>" . $mail->ErrorInfo;
   }

   exit(json_encode(array("response" =>   $response)));
}

 // $name=$_POST['name'];
 // $to ='plmn855000@gmail.com';
 // $subject=$_POST['subject'];
 // $message="<h1>".$_POST['message']."</h1>";
 //  $headers="Content-type:text/html; charset=utf-8\r\n";
 //  $headers .="From: The Sender Name <plmn855000@gmail.com>\r\n";
 //  $headers .="Reply-to: replyto@smdkfmlsdkmfks.com\r\n";
 //
 // echo $headers;
 //
 // mail($to,$subject,$message,$headers);

// $mail = new PHPMailer;
//
// $mail->SMTPDebug = 4;                               // Enable verbose debug output
//
// $mail->isSMTP();                                      // Set mailer to use SMTP
// $mail->Host = 'smtp1.gmail.com';  // Specify main and backup SMTP servers
// $mail->SMTPAuth = true;                               // Enable SMTP authentication
// $mail->Username = EMAIL;                 // SMTP username
// $mail->Password = PASS;                           // SMTP password
// $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
// $mail->Port = 587;                                    // TCP port to connect to
//
// $mail->setFrom(EMAIL, 'JiEunSon Mail');
// $mail->addAddress($to);     // Add a recipient
// $mail->addReplyTo(EMAIL);
// //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
// $mail->isHTML(true);                                  // Set email format to HTML
//
// $mail->Subject =$_POST['subject'];
// $mail->Body    = '<div style="border:2px solid red">This is the HTML message body <b>in bold!</b></div>';
// $mail->AltBody = $_POST['message'];
//
// if(!$mail->send()) {
//     echo 'Message could not be sent.';
//     echo 'Mailer Error: ' . $mail->ErrorInfo;
// } else {
//     echo 'Message has been sent';
// }

?>
