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
	$mail->CharSet = $charset; //���ò���gb2312���ı���
	$mail->IsSMTP(); //���ò���SMTP��ʽ�����ʼ�
	$mail->Host = "smtp.163.com"; //�����ʼ��������ĵ�ַ
	$mail->Port = 25; //�����ʼ��������Ķ˿ڣ�Ĭ��Ϊ25
	$mail->From = $from; //���÷����˵������ַ
	$mail->FromName = "echo"; //���÷����˵�����
	$mail->SMTPAuth = true; //����SMTP�Ƿ���Ҫ������֤��true��ʾ��Ҫ
	$mail->Username = $from; //���÷����ʼ�������
	$mail->Password = "haha"; //�������������
	$mail->Subject = $title; //�����ʼ��ı���
	$mail->AltBody = "text/html"; // optional, comment out and test
	$mail->Body = $content; //�����ʼ�����
	$mail->IsHTML(true); //���������Ƿ�Ϊhtml����
	$mail->WordWrap = 50; //����ÿ�е��ַ���
	$mail->AddReplyTo("test@163.com","����"); //���ûظ����ռ��˵ĵ�ַ
	$mail->AddAddress($to); //�����ռ��ĵ�ַ
	if ($attachment != '') //���ø���
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
