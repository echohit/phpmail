<?php
/*
 * Created on 2013-7-8
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 require_once("PHPMailer.class.php");
try {
    $mail = new PHPMailer(true); //New instance, with exceptions enabled

    $body             = file_get_contents('test.php');
    $body             = preg_replace('/\\\\/','', $body); //Strip backslashes

    $mail->IsSMTP();                           // tell the class to use SMTP
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->Port       = 25;                    // set the SMTP server port
    $mail->Host       = "smtp.163.com"; // SMTP server
    $mail->Username   = "bilibo";     // SMTP server username
    $mail->Password   = "qq250572316";            // SMTP server password

    $mail->IsSendmail();  // tell the class to use Sendmail

    $mail->AddReplyTo("wsblb2008@163.com","First Last");

    $mail->From       = "bilibo@ifensi.com";
    $mail->FromName   = "First Last";

    $to = "wsblb2008@163.com";

    $mail->AddAddress($to);

    $mail->Subject  = "First PHPMailer Message";

    $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
    $mail->WordWrap   = 80; // set word wrap

    $mail->MsgHTML($body);

    $mail->IsHTML(true); // send as HTML

    $mail->Send();
    echo 'Message has been sent.';
} catch (phpmailerException $e) {
		echo "No";
    echo $e->errorMessage();
}
?>