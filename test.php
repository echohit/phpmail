<?php
/*
 * Created on 2013-7-8
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 //function send_mail ($title,$content,$from,$to,$charset='gbk',$attachment ='')
 include "PHPMailer.class.php";
 function send_mail ($charset='gbk',$attachment ='')
{

	header('Content-Type: text/html; charset='.$charset);

	$from = "hexiaoyuhit@163.com";
	$title = "Hi echo";
	$content = "This is a test";
	$to = "test@163.com";
	$mail = new PHPMailer();
	$mail->CharSet = $charset; //设置采用gb2312中文编码
	$mail->IsSMTP(); //设置采用SMTP方式发送邮件
	$mail->Host = "smtp.163.com"; //设置邮件服务器的地址
	$mail->Port = 25; //设置邮件服务器的端口，默认为25
	$mail->From = $from; //设置发件人的邮箱地址
	$mail->FromName = "echo"; //设置发件人的姓名
	$mail->SMTPAuth = true; //设置SMTP是否需要密码验证，true表示需要
	$mail->Username = $from; //设置发送邮件的邮箱
	$mail->Password = "haha"; //设置邮箱的密码
	$mail->Subject = $title; //设置邮件的标题
	$mail->AltBody = "text/html"; // optional, comment out and test
	$mail->Body = $content; //设置邮件内容
	$mail->IsHTML(true); //设置内容是否为html类型
	$mail->WordWrap = 50; //设置每行的字符数
	$mail->AddReplyTo("test@163.com","名字"); //设置回复的收件人的地址
	$mail->AddAddress($to); //设置收件的地址
	if ($attachment != '') //设置附件
	{
	$mail->AddAttachment($attachment, $attachment);
	}
	if($mail->Send())
	{
		echo "OK";
	}
	else
	{
		echo "NO";
	}
}

echo send_mail();

?>
